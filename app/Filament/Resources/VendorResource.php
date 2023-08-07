<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $recordTitleAttribute = 'subdomain';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subdomain')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('logo'),
                Forms\Components\FileUpload::make('favicon'),
                Forms\Components\Repeater::make('contacts')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('phone')->required(),
                        Forms\Components\TextInput::make('coords')
                            ->required(),
                    ])
                    ->columns(3),
                Forms\Components\Repeater::make('socials')
                    ->schema([
                        Forms\Components\Select::make('social')
                            ->options([
                                'fb' => 'Facebook',
                                'ig' => 'Instagram',
                                'tg' => 'Telegram',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('url')->required(),
                    ])
                    ->columns(2),
                Forms\Components\Select::make('languages')
                    ->multiple()
                    ->options([
                        'uz' => 'O\'zbek',
                        'ru' => 'Русский',
                        'en' => 'English',
                        'tr' => 'Türk',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('subdomain'),
                Tables\Columns\ImageColumn::make('logo'),
                // Tables\Columns\ImageColumn::make('favicon'),
                // Tables\Columns\TextColumn::make('contacts'),
                // Tables\Columns\TextColumn::make('socials'),
                // Tables\Columns\TextColumn::make('languages'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ])
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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->ownedBy(auth()->user());
    }
}
