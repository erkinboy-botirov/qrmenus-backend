<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Models\Vendor;
use App\Rules\Contains;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $recordTitleAttribute = 'subdomain';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Vendor')->tabs([
                Tab::make('Main')->schema([
                    Fieldset::make('Essentials')->schema([
                        TextInput::make('name')->maxLength(255)->required(),
                        TextInput::make('subdomain')->maxLength(255)->required()->unique(ignoreRecord: true),
                        CheckboxList::make('languages')
                            ->options(config('app.languages'))
                            ->default(['ru'])
                            ->columns(2)
                            ->required()
                            ->rule(new Contains('ru')),
                    ])->columnSpan(1)->columns(1),
                    Fieldset::make('Brand graphics')->schema([
                        FileUpload::make('logo')->imagePreviewHeight('96'),
                        FileUpload::make('favicon')->imagePreviewHeight('96'),
                    ])->columnSpan(1)->columns(1),
                ])->columns(2),
                Tab::make('Meta')->schema([
                    Repeater::make('contacts')->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('phone')->required(),
                        TextInput::make('latitude')->placeholder('41.311081')->required(),
                        TextInput::make('longitude')->placeholder('69.240562')->required(),
                    ])->columns(2),
                    Repeater::make('socials')->schema([
                        Select::make('social')->options(config('app.socials'))->required(),
                        TextInput::make('url')->required(),
                    ])->columns(2),
                ])->columns(2),
            ])->columnSpan(2)->persistTabInQueryString(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('subdomain'),
                ImageColumn::make('logo'),
                // Tables\Columns\ImageColumn::make('favicon'),
                // TextColumn::make('contacts'),
                // TextColumn::make('socials'),
                TextColumn::make('languages'),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
