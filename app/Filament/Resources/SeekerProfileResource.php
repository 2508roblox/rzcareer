<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeekerProfileResource\Pages;
use App\Filament\Resources\SeekerProfileResource\RelationManagers;
use App\Models\SeekerProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeekerProfileResource extends Resource
{
    protected static ?string $model = SeekerProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Profiles & Views';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->required()
                ->relationship('user', 'full_name') // Assuming 'full_name' is a readable field
                ->preload()
                ->searchable()
                ->label('User'),

            Forms\Components\Select::make('location_id')
                ->required()
                ->relationship('location', 'address') // Assuming 'address' is a readable field in CommonLocation
                ->preload()
                ->searchable()
                ->label('Location'),

            Forms\Components\TextInput::make('phone')
                ->tel()
                ->required()
                ->maxLength(15)
                ->label('Phone'),

            Forms\Components\DatePicker::make('birthday')
                ->required()
                ->label('Birthday'),

            Forms\Components\Select::make('gender')
                ->required()
                ->options([
                    'M' => 'Male',
                    'F' => 'Female',
                    'O' => 'Other', // Adjust options as needed
                ])
                ->label('Gender'),

            Forms\Components\Select::make('marital_status')
                ->required()
                ->options([
                    'S' => 'Single',
                    'M' => 'Married',
                    'D' => 'Divorced',
                    'W' => 'Widowed', // Adjust options as needed
                ])
                ->label('Marital Status'),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthday')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('marital_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSeekerProfiles::route('/'),
            'create' => Pages\CreateSeekerProfile::route('/create'),
            'edit' => Pages\EditSeekerProfile::route('/{record}/edit'),
        ];
    }
}
