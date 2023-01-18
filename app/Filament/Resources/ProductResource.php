<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-cake';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->options(fn (Product $record) => Category::where('branch_id', $record->category->branch_id)->get()->pluck('name.ru', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('display_price')
                    ->required(),
                Forms\Components\FileUpload::make('image'),
                Forms\Components\Toggle::make('is_active')
                    ->inline(False),
                Forms\Components\KeyValue::make('name')
                    ->required(),
                Forms\Components\KeyValue::make('ingredients'),
                Forms\Components\KeyValue::make('description'),
                Forms\Components\Repeater::make('portions')
                    ->schema([
                        Forms\Components\TextInput::make('text')->placeHolder('1x')->required(),
                        Forms\Components\TextInput::make('price')->placeHolder('10000')->required(),
                    ])
                    ->columns(2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name.ru'),
                Tables\Columns\TextColumn::make('name.ru')->label('Name ru'),
                Tables\Columns\TextColumn::make('name.uz')->label('Name uz'),
                Tables\Columns\TextColumn::make('display_price'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
