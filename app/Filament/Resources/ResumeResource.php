<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Resume;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ResumeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\ResumeResource\RelationManagers;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Set;
use Joaopaulolndev\FilamentPdfViewer\Forms\Components\PdfViewerField;
use Joaopaulolndev\FilamentPdfViewer\Infolists\Components\PdfViewerEntry;

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'Resumes & Saved Items';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make(3)
                ->schema([
                    Section::make('Seeker and User Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('user_id')
                                    ->label('User ID')
                                    ->disabled()
                                    ->dehydrated(),

                                Select::make('seeker_profile_id')
                                    ->label('Seeker Profile')
                                    ->required()
                                    ->preload()
                                    ->live()
                                    ->relationship('seekerProfile', 'id')
                                    ->searchable()
                                    ->afterStateUpdated(function ($state, Set $set) {
                                        $seekerProfile = \App\Models\SeekerProfile::find($state);
                                        if ($seekerProfile) {
                                            $set('user_id', $seekerProfile->user_id);
                                            $user = \App\Models\User::find($seekerProfile->user_id);
                                            $set('user_name', $user->full_name);
                                        } else {
                                            $set('user_id', null);
                                            $set('user_name', null);
                                        }
                                    }),
                                TextInput::make('user_name')
                                    ->label('User Name')
                                    ->live()
                                    ->disabled()
                                    ->dehydrated(false),
                            ]),
                    ]),
                    Section::make('Location and Career')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('city_id')
                                    ->label('City')
                                    ->required()
                                    ->preload()
                                    ->relationship('city', 'name')
                                    ->searchable(),
                                Select::make('career_id')
                                    ->label('Career')
                                    ->required()
                                    ->preload()
                                    ->relationship('career', 'name')
                                    ->searchable(),
                            ]),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(200)
                            ->live(255)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $slug = \Illuminate\Support\Str::slug($state);
                                $set('slug', $slug);
                            })
                            ->columnSpan(2),
                        TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255)
                           ,
                    ]),
                ]),


            // Group for Job Details
            Section::make('Job Details')
                ->schema([
                    Textarea::make('description')
                        ->required()
                        ->label('Description')
                        ->columnSpanFull(),
                    Grid::make(2)
                        ->schema([
                            TextInput::make('salary_min')
                                ->required()
                                ->numeric()
                                ->label('Minimum Salary'),
                            TextInput::make('position')
                                ->required()
                                ->maxLength(50)
                                ->label('Position'),
                            TextInput::make('experience')
                                ->required()
                                ->maxLength(50)
                                ->label('Experience'),
                            TextInput::make('academic_level')
                                ->required()
                                ->maxLength(50)
                                ->label('Academic Level'),
                            TextInput::make('type_of_workplace')
                                ->required()
                                ->maxLength(50)
                                ->label('Type of Workplace'),
                            TextInput::make('job_type')
                                ->required()
                                ->maxLength(50)
                                ->label('Job Type'),
                        ]),
                    TextInput::make('is_active')
                        ->required()
                        ->numeric()
                        ->default(1)
                        ->label('Active Status'),
                ])
                ->columnSpanFull(),

            // Group for Media Uploads
            Section::make('Media Uploads')
                ->schema([
                    FileUpload::make('image_url')
                        ->image()
                        ->label('Profile Image'),
                        PdfViewerField::make('file_url')
                        ->label('View the PDF')
                        ->minHeight('40svh'),
                        FileUpload::make('file_url')
                        ->label('Upload PDF')
                        ->acceptedFileTypes(['application/pdf']) // Restrict to PDF files only
                        ->maxSize(5024) // Set maximum file size in KB (optional)
                        ->preserveFilenames() // Preserve the original filename if needed
                        ->directory('resumes') // Optional: Define a directory where the files will be stored
                        ->storeFileNamesIn('file_url') // Store the file path in the 'file_url' field
                        ->required() // Make it required if necessary
                        ->columnSpanFull(),

                    TextInput::make('public_id')
                        ->maxLength(255)
                        ->default(null)
                        ->label('Public ID'),
                ])
                ->columnSpanFull(),

            // Group for Resume Type
            Section::make('Resume Type')
            ->schema([
                Select::make('type')
                    ->label('Type of Resume')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options([
                        'primary' => 'Primary',   // Option for the primary resume
                        'secondary' => 'Secondary', // Option for the secondary resume
                    ])
                    ->default('primary') // Set a default value if needed
                    ->placeholder('Select Resume Type') // Optional: Add a placeholder text
                    ->columnSpanFull(),
                    ]),


            // Group for Education Details
            Repeater::make('educationDetails')
            ->relationship('educationDetails')
            ->schema([
                TextInput::make('training_place')
                    ->required()
                    ->label('Institution Name'),
                TextInput::make('degree_name')
                    ->required()
                    ->label('Degree'),
                TextInput::make('major')
                    ->required()
                    ->label('Field of Study'),
                TextInput::make('start_date')
                    ->required()
                    ->label('Start Date')
                    ->type('date'),
                TextInput::make('completed_date')
                    ->label('End Date')
                    ->type('date'),
                Textarea::make('description')
                    ->label('Description'),
            ])
            ->label('Education Details')
            ->columnSpanFull(),


            // Group for Certificates
            Repeater::make('certificates')
            ->relationship('certificates')
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Certificate Name'),
                TextInput::make('training_place')
                    ->required()
                    ->label('Issued By'),
                TextInput::make('start_date')
                    ->required()
                    ->label('Issue Date')
                    ->type('date'),
                TextInput::make('expiration_date')
                    ->label('Expiration Date')
                    ->type('date'),
                Textarea::make('description')
                    ->label('Description'),
            ])
            ->label('Certificates')
            ->columnSpanFull(),


            // Group for Experience Details
            Repeater::make('experienceDetails')
            ->relationship('experienceDetails')
            ->schema([
                TextInput::make('company_name')
                    ->required()
                    ->label('Company Name'),
                TextInput::make('job_name') // Updated to match the fillable attribute
                    ->required()
                    ->label('Job Title'),
                TextInput::make('start_date')
                    ->required()
                    ->label('Start Date')
                    ->type('date'),
                TextInput::make('end_date')
                    ->label('End Date')
                    ->type('date'),
                Textarea::make('description') // Updated to match the fillable attribute
                    ->required()
                    ->label('Responsibilities'),
            ])
            ->label('Experience Details')
            ->columnSpanFull(),


            // Group for Language Skills
            Repeater::make('languageSkills')
            ->relationship('languageSkills')
            ->schema([
                TextInput::make('language')
                    ->required()
                    ->label('Language'),
                TextInput::make('level') // Updated to match the fillable attribute
                    ->required()
                    ->label('Proficiency Level'),
            ])
            ->label('Language Skills')
            ->columnSpanFull(),

        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                ->label('User Name')
                ->formatStateUsing(function ($record) {
                    return $record->user ? $record->user->full_name : 'N/A';
                })
                ->sortable()
               ,
              
                Tables\Columns\TextColumn::make('seeker_profile_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),



            Tables\Columns\TextColumn::make('city')
            ->label('City')
            ->formatStateUsing(function ($record) {
                return $record->city ? $record->city->name : 'N/A';
            })
            ->sortable()
            ,

        Tables\Columns\TextColumn::make('career')
            ->label('Career')
            ->formatStateUsing(function ($record) {
                return $record->career ? $record->career->name : 'N/A';
            })
            ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('salary_min')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('position')
                    ->searchable(),

                Tables\Columns\TextColumn::make('experience')
                    ->searchable(),

                Tables\Columns\TextColumn::make('academic_level')
                    ->searchable(),

                Tables\Columns\TextColumn::make('type_of_workplace')
                    ->searchable(),

                Tables\Columns\TextColumn::make('job_type')
                    ->searchable(),

                Tables\Columns\TextColumn::make('is_active')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('image_url'),

                Tables\Columns\TextColumn::make('file_url')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('public_id')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('type')
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
            'index' => Pages\ListResumes::route('/'),
            'create' => Pages\CreateResume::route('/create'),
            'edit' => Pages\EditResume::route('/{record}/edit'),
        ];
    }
}
