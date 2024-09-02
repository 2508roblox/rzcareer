<?php

namespace App\Filament\RecruiterPanel\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\JobPost;
use Filament\Forms\Form;
use App\Models\CommonCity;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\CommonDistrict;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\RecruiterPanel\Resources\JobPostResource\Pages;
use App\Filament\RecruiterPanel\Resources\JobPostResource\RelationManagers;
use App\Filament\RecruiterPanel\Resources\JobPostResource\Pages\EditJobPost;
use App\Filament\RecruiterPanel\Resources\JobPostResource\Pages\ListJobPosts;
use App\Filament\RecruiterPanel\Resources\JobPostResource\Pages\CreateJobPost;
use App\Models\CommonLocation;
use App\Models\Company;
use Filament\Forms\Components\Component;
use Filament\Forms\Get;
use Illuminate\Support\Facades\Auth;

class JobPostResource extends Resource
{
    protected static ?string $model = JobPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {


        return $form
        ->schema([
            // Group: Basic Information
            Forms\Components\Section::make('Basic Information')
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('career_id')
                            ->required()
                            ->relationship('career', 'name')
                            ->preload()
                            ->searchable()
                            ->label('Career'),


                        Forms\Components\Select::make('district_id')
                            ->required()
                            ->options(CommonDistrict::all()->pluck('name', 'id'))
                            ->label('District')
                            ->preload()
                            ->searchable()
                            ->reactive()
                            ->live(100)
                            ->default(null)
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $set('location_id', null);

                                if ($state && $get('city_id')) {
                                    $location = static::updateLocation($get);
                                    if ($location) {
                                        $set('location_id', $location->id);
                                        $set('lat', $location->lat);
                                        $set('lng', $location->lng);
                                    } else {
                                        $set('lat', '');
                                        $set('lng', '');
                                    }
                                }
                            }),

                        Forms\Components\Select::make('city_id')
                            ->required()
                            ->options(CommonCity::all()->pluck('name', 'id'))
                            ->label('City')
                            ->preload()
                            ->searchable()
                            ->reactive()
                            ->live(100)
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $set('location_id', null);

                                if ($state) {
                                    $location = static::updateLocation($get);
                                    if ($location) {
                                        $set('location_id', $location->id);
                                        $set('lat', $location->lat);
                                        $set('lng', $location->lng);
                                    } else {
                                        $set('lat', '');
                                        $set('lng', '');
                                    }
                                }
                            }),

                        Forms\Components\TextInput::make('location_id')
                            ->disabled()
                            ->dehydrated()
                            ->label('Location'),

                        Forms\Components\TextInput::make('lat')
                            ->label('Latitude')
                            ->live(255)
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $location = static::createNewLocation($get);
                                if ($location) {
                                    $set('location_id', $location->id);
                                }
                            })
                            ->disabled(fn(Component $component) => $component->getState('location_id') != null)
                            ->hint('Enter the latitude coordinate.'),

                        Forms\Components\TextInput::make('lng')
                            ->label('Longitude')
                            ->live(255)
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $location = static::createNewLocation($get);
                                if ($location) {
                                    $set('location_id', $location->id);
                                }
                            })
                            ->disabled(fn(Component $component) => $component->getState('location_id') != null)
                            ->hint('Enter the longitude coordinate.'),


                    ]),
                ]),


            // Group: Job Details
            Forms\Components\Section::make('Job Details')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('job_name')
                                ->required()
                                ->maxLength(255)
                                ->live(255)
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $slug = \Illuminate\Support\Str::slug($state);
                                    $set('slug', $slug);
                                })
                                ->label('Job Name'),

                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(300)
                                ->disabled()
                                ->dehydrated()
                                ->unique(JobPost::class, 'slug', ignoreRecord: true)
                                ->label('Slug'),

                            Forms\Components\DatePicker::make('deadline')
                                ->required()
                                ->label('Deadline'),

                            Forms\Components\TextInput::make('quantity')
                                ->required()
                                ->numeric()
                                ->label('Quantity'),

                            Forms\Components\Select::make('gender_required')
                                ->required()
                                ->searchable()
                                ->prefixIcon('heroicon-o-user')
                                ->options([
                                    0 => 'None',
                                    1 => 'Male',
                                    2 => 'Female',
                                ])
                                ->default(0)
                                ->placeholder('Select Gender')
                                ->label('Gender Required'),

                            Forms\Components\RichEditor::make('job_description')
                                ->required()
                                ->columnSpanFull()
                                ->label('Job Description'),

                            Forms\Components\MarkdownEditor::make('job_requirement')
                                ->required()
                                ->columnSpanFull()
                                ->label('Job Requirement'),

                            Forms\Components\MarkdownEditor::make('benefits_enjoyed')
                                ->required()
                                ->columnSpanFull()
                                ->label('Benefits Enjoyed'),
                        ]),
                ]),

            // Group: Job Specifications
            Forms\Components\Section::make('Job Specifications')
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('position')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->options([
                                'Manager' => 'Manager',
                                'Developer' => 'Developer',
                                'Designer' => 'Designer',
                                'Analyst' => 'Analyst',
                                'Support' => 'Support',
                            ])
                            ->placeholder('Select Position')
                            ->label('Position')
                            ->helperText('Choose the job position for this role.')
                            ->hint('The position title within the company.')
                            ->default('Developer') // Set a default value if applicable
                            ->reactive() // Make it reactive if it affects other fields
                            ->disablePlaceholderSelection() // Prevent placeholder from being selected
                            ->columnSpan(1), // Adjust width in the grid

                        Forms\Components\Select::make('type_of_workplace')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->options([
                                'Office' => 'Office',
                                'Remote' => 'Remote',
                                'Hybrid' => 'Hybrid',
                                'Field' => 'Field',
                                'On-site' => 'On-site',
                            ])
                            ->placeholder('Select Type of Workplace')
                            ->label('Type of Workplace')
                            ->helperText('Select where the work will be performed.')
                            ->hint('Workplace arrangement for the job.')
                            ->default('Remote') // Set a default value if applicable
                            ->reactive()
                            ->disablePlaceholderSelection()
                            ->columnSpan(1),

                        Forms\Components\Select::make('experience')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->options([
                                '0-1 years' => '0-1 years',
                                '2-3 years' => '2-3 years',
                                '4-5 years' => '4-5 years',
                                '6-10 years' => '6-10 years',
                                '10+ years' => '10+ years',
                            ])
                            ->placeholder('Select Experience Level')
                            ->label('Experience')
                            ->helperText('Specify the required experience level.')
                            ->hint('Experience required for the job.')
                            ->default('2-3 years')
                            ->reactive()
                            ->disablePlaceholderSelection()
                            ->columnSpan(1),

                        Forms\Components\Select::make('academic_level')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->options([
                                'High School' => 'High School',
                                'Associate Degree' => 'Associate Degree',
                                'Bachelor\'s Degree' => 'Bachelor\'s Degree',
                                'Master\'s Degree' => 'Master\'s Degree',
                                'Doctorate' => 'Doctorate',
                            ])
                            ->placeholder('Select Academic Level')
                            ->label('Academic Level')
                            ->helperText('Indicate the required academic qualification.')
                            ->hint('Educational qualification needed for the job.')
                            ->default('Bachelor\'s Degree')
                            ->reactive()
                            ->disablePlaceholderSelection()
                            ->columnSpan(1),

                        Forms\Components\Select::make('job_type')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->options([
                                'Full-time' => 'Full-time',
                                'Part-time' => 'Part-time',
                                'Contract' => 'Contract',
                                'Temporary' => 'Temporary',
                                'Internship' => 'Internship',
                                'Freelance' => 'Freelance',
                            ])
                            ->placeholder('Select Job Type')
                            ->label('Job Type')
                            ->helperText('Choose the type of employment.')
                            ->hint('Employment type for the job.')
                            ->default('Full-time')
                            ->reactive()
                            ->disablePlaceholderSelection()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('salary_min')
                            ->required()
                            ->numeric()
                            ->label('Minimum Salary')
                            ->placeholder('Enter minimum salary')
                            ->helperText('Specify the minimum salary for the position.')
                            ->hint('Minimum salary amount.')
                            ->prefix('$') // Add currency symbol or any prefix
                            ->suffix('per year') // Add suffix if needed
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('salary_max')
                            ->required()
                            ->numeric()
                            ->label('Maximum Salary')
                            ->placeholder('Enter maximum salary')
                            ->helperText('Specify the maximum salary for the position.')
                            ->hint('Maximum salary amount.')
                            ->prefix('$') // Add currency symbol or any prefix
                            ->suffix('per year') // Add suffix if needed
                            ->columnSpan(1),

                        Forms\Components\Select::make('salary_type')
                            ->required()
                            ->label('Salary Type')
                            ->options([
                                'hourly' => 'Hourly',
                                'monthly' => 'Monthly',
                                'weekly' => 'Weekly',
                            ])
                            ->searchable()
                            ->placeholder('Select Salary Type')
                            ->default('monthly')
                            ->helperText('Choose how the salary is calculated')
                            ->hint('The salary calculation frequency.')
                            ->preload()
                            ->reactive()
                            ->disablePlaceholderSelection()
                            ->columnSpan(1),
                    ]),
                ]),


            // Group: Visibility and Contact
            Forms\Components\Section::make('Visibility and Contact')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Toggle::make('is_hot')
                                ->label('Hot')
                                ->required()
                                ->default(false)
                                ->onIcon('heroicon-o-fire')
                                ->offIcon('heroicon-s-fire'),

                            Forms\Components\Toggle::make('is_urgent')
                                ->label('Urgent')
                                ->required()
                                ->default(false)
                                ->onIcon('heroicon-o-exclamation-circle')
                                ->offIcon('heroicon-o-exclamation-circle'),

                            Forms\Components\TextInput::make('contact_person_name')
                                ->required()
                                ->maxLength(100)
                                ->prefix('👤')
                                ->placeholder('Enter contact person\'s name')
                                ->helperText('Full name of the contact person'),

                            Forms\Components\TextInput::make('contact_person_phone')
                                ->required()
                                ->tel()
                                ->maxLength(15)
                                ->prefix('📞')
                                ->placeholder('Enter contact person\'s phone number')
                                ->helperText('Phone number of the contact person'),

                            Forms\Components\TextInput::make('contact_person_email')
                                ->required()
                                ->email()
                                ->maxLength(100)
                                ->prefix('✉️')
                                ->placeholder('Enter contact person\'s email address')
                                ->helperText('Email address of the contact person'),

                            Forms\Components\Select::make('status')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    0 => 'Pending Review',
                                    1 => 'Approved',
                                    2 => 'Rejected',
                                    3 => 'Published',
                                    4 => 'Closed',
                                    5 => 'Expired',
                                    6 => 'Under Review',
                                    7 => 'Interviewing',
                                    8 => 'Hired',
                                    9 => 'Archived',
                                    10 => 'Cancelled',
                                    11 => 'On Hold',
                                    12 => 'Filled',
                                    13 => 'Draft',
                                    14 => 'Reopened',
                                ])
                                ->default(0)
                                ->placeholder('Select Status')
                                ->label('Status'),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('career_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('job_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deadline')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender_required')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_of_workplace')
                    ->searchable(),
                Tables\Columns\TextColumn::make('experience')
                    ->searchable(),
                Tables\Columns\TextColumn::make('academic_level')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salary_min')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary_max')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary_type'),
                Tables\Columns\TextColumn::make('is_hot')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_urgent')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_person_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shares')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListJobPosts::route('/'),
            'create' => Pages\CreateJobPost::route('/create'),
            'edit' => Pages\EditJobPost::route('/{record}/edit'),
        ];
    }
    protected static function updateLocation(Get $get)
    {
        $districtId = $get('district_id');
        $cityId = $get('city_id');
        if ($districtId && $cityId) {
            $location = CommonLocation::where('district_id', $districtId)
                ->where('city_id', $cityId)
                ->first();

            return $location;
        }

        return null;
    }
    protected static function createNewLocation(Get $get)
    {
        $lat = $get('lat');
        $lng = $get('lng');
        $city_id = $get('city_id');
        $district_id = $get('district_id');
        if ($lat && $lng && $city_id && $district_id) {
            return CommonLocation::create([
                'address' => "{$district_id}, {$city_id}", // Customize this as needed
                'lat' => $lat,
                'lng' => $lng,
                'district_id' => $district_id,
                'city_id' => $city_id,
            ]);
        }

        return null;
    }
    public static function getEloquentQuery(): Builder
{
    $user = Auth::user(); // Lấy người dùng hiện tại
    $companyIds = Company::where('user_id', $user->id)->pluck('id');

    return parent::getEloquentQuery()
        ->whereIn('company_id', $companyIds);
}

}
