<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\Branch;
use App\Models\User;
use App\Models\Vendor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('vendor_id')
                    ->label('Vendor')
                    ->options(Vendor::pluck('name', 'id'))
                    ->searchable()
                    ->default(auth()->user()->vendor_id)
                    ->disabled(auth()->user()->is_not_admin)
                    ->required()
                    ->live(),
                Select::make('branch_id')
                    ->helperText('Leave blank to create a vendor owner')
                    ->label('Branch')
                    ->options(function (Get $get): Collection {
                        $builder = $get('vendor_id')
                            ? Branch::where('vendor_id', $get('vendor_id'))
                            : Branch::query();

                        return $builder->pluck('name_ru', 'id');
                    })
                    // ->searchable()
                    ->default(auth()->user()->branch_id)
                    ->hidden(auth()->user()->is_branch_owner),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->maxLength(255)
                    ->same('password_confirmation'),
                TextInput::make('password_confirmation')
                    ->required(fn (string $operation): bool => $operation === 'create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vendor.name')
                    ->default('-')
                    ->sortable()
                    ->hidden(auth()->user()->is_not_admin),
                TextColumn::make('branch.name_ru')
                    ->default('-')
                    ->sortable()
                    ->hidden(auth()->user()->is_branch_owner),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                // ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
                // ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
