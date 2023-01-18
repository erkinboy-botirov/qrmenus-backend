<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Branch;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-menu-alt-1';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('branch_id')
                    ->label('Branch')
                    ->options(Branch::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                Forms\Components\KeyValue::make('name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('branch.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('order'),
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategories::route('/'),
        ];
    }    
}
