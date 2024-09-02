<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SavedJobPostResource\Pages;
use App\Filament\Resources\SavedJobPostResource\RelationManagers;
use App\Models\SavedJobPost;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class SavedJobPostResource extends Resource
{
    protected static ?string $model = SavedJobPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Resumes & Saved Items';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Section for Job Post Selection
            Section::make('Job Post Details')
            ->schema([
                Card::make([
                    Select::make('job_post_id')
                        ->label('Job Post')
                        ->searchable()
                        ->preload()
                        ->options(function () {
                            return \App\Models\JobPost::all()->pluck('job_name', 'id')->toArray();
                        })
                        ->required()
                        ->placeholder('Select a Job Post')
                        ->hint('Select the job post related to this entry.')
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            // Handle state changes
                        })
                        ->prefixIcon('heroicon-o-briefcase'), // Optional: add a leading icon
                ])->columnSpanFull(),

                TextInput::make('user_id')
                    ->label('User ID')
                    ->required()
                    ->numeric()
                    ->default(Auth::id())
                    ->disabled()
                    ->dehydrated()
                    ->placeholder('Admin ID')
                    ->hint('The ID of the user creating this entry.')
                    ->maxLength(10) // Limit the maximum length
                    ->suffixIcon('heroicon-o-user'), // Optional: add a trailing icon
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            // Display job post name instead of ID
            Tables\Columns\TextColumn::make('jobPost.job_name') // Adjust this based on your actual relationship and field names
                ->label('Job Post Name')
                ->sortable()
                ->searchable(),

            // Additional columns related to JobPost
            Tables\Columns\TextColumn::make('jobPost.company.company_name') // Access company_name through the jobPost relationship
            ->label('Company Name')
            ->sortable()
            ->searchable(),


            Tables\Columns\TextColumn::make('jobPost.salary_max') // Adjust based on actual column names in JobPost model
                ->label('Salary Max')
                ->sortable()
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
            // Define any filters here if needed
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
            'index' => Pages\ListSavedJobPosts::route('/'),
            'create' => Pages\CreateSavedJobPost::route('/create'),
            'edit' => Pages\EditSavedJobPost::route('/{record}/edit'),
        ];
    }
}
