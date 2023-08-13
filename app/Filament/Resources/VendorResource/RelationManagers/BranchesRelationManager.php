<?php

namespace App\Filament\Resources\VendorResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Validation\Rules\Unique;

class BranchesRelationManager extends RelationManager
{
    protected static string $relationship = 'branches';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->default('main')
                    ->unique(
                        ignoreRecord: true,
                        modifyRuleUsing: fn (Unique $rule, Get $get): Unique => $rule->where('vendor_id', $get('vendor_id'))
                    ),
                TextInput::make('name_ru')
                    ->required()
                    ->maxLength(255),
                TextInput::make('name_uz')
                    ->required(fn (RelationManager $livewire): bool => $livewire->ownerRecord->hasLanguage('uz'))
                    ->hidden(fn (RelationManager $livewire): bool => ! $livewire->ownerRecord->hasLanguage('uz'))
                    ->maxLength(255),
                TextInput::make('name_en')
                    ->required(fn (RelationManager $livewire): bool => $livewire->ownerRecord->hasLanguage('en'))
                    ->hidden(fn (RelationManager $livewire): bool => ! $livewire->ownerRecord->hasLanguage('en'))
                    ->maxLength(255),
                TextInput::make('name_tr')
                    ->required(fn (RelationManager $livewire): bool => $livewire->ownerRecord->hasLanguage('tr'))
                    ->hidden(fn (RelationManager $livewire): bool => ! $livewire->ownerRecord->hasLanguage('tr'))
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('slug')
            ->columns([
                TextColumn::make('vendor.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('name_ru')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
