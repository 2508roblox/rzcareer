<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('package_name')->required(),
            Forms\Components\TextInput::make('illustration_image')->nullable(),
            Forms\Components\Textarea::make('description')->nullable(),
            Forms\Components\TextInput::make('price')->required()->numeric(),
            Forms\Components\TextInput::make('duration')->required()->numeric(),
            Forms\Components\TextInput::make('job_post_count')->required()->numeric(),
            Forms\Components\Checkbox::make('highlight_post')->default(false),
            Forms\Components\Checkbox::make('top_sector')->default(false),
            Forms\Components\Checkbox::make('border_effect')->default(false),
            Forms\Components\Checkbox::make('hot_effect')->default(false),
            Forms\Components\Checkbox::make('highlight_logo')->default(false),
            Forms\Components\Checkbox::make('homepage_banner')->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('package_name'),
            Tables\Columns\TextColumn::make('price')->money('usd'),
            Tables\Columns\TextColumn::make('duration'),
            Tables\Columns\TextColumn::make('created_at')->date(),
            Tables\Columns\TextColumn::make('updated_at')->date(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
