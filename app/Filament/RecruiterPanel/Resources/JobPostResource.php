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
    protected static ?string $navigationGroup = 'Quản lý đăng tuyển & ứng tuyển';

    public static  ?string  $label = 'Danh sách tin đăng';
    public static  ?string  $subheading = 'Danh sách tin đăng';

    public static function form(Form $form): Form
    {


        return $form
        ->schema([
            // Group: Basic Information
            Forms\Components\Section::make(__('forms.basic_information'))
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Select::make('career_id')
                                ->required()
                                ->relationship('career', 'name')
                                ->preload()
                                ->searchable()
                                ->label(__('forms.career')),

                            Forms\Components\Select::make('district_id')
                                ->required()
                                ->options(CommonDistrict::all()->pluck('name', 'id'))
                                ->label(__('forms.district'))
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
                                ->label(__('forms.city'))
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
                                ->label(__('forms.location')),

                            Forms\Components\TextInput::make('lat')
                                ->label(__('forms.latitude'))
                                ->live(255)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $location = static::createNewLocation($get);
                                    if ($location) {
                                        $set('location_id', $location->id);
                                    }
                                })
                                ->disabled(fn(Component $component) => $component->getState('location_id') != null)
                                ->hint(__('forms.latitude_hint')),

                            Forms\Components\TextInput::make('lng')
                                ->label(__('forms.longitude'))
                                ->live(255)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $location = static::createNewLocation($get);
                                    if ($location) {
                                        $set('location_id', $location->id);
                                    }
                                })
                                ->disabled(fn(Component $component) => $component->getState('location_id') != null)
                                ->hint(__('forms.longitude_hint')),
                        ]),
                ]),

            // Group: Job Details
            Forms\Components\Section::make(__('forms.job_details'))
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
                                ->label(__('forms.job_name')),

                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(300)
                                ->disabled()
                                ->dehydrated()
                                ->unique(JobPost::class, 'slug', ignoreRecord: true)
                                ->label(__('forms.slug')),

                            Forms\Components\DatePicker::make('deadline')
                                ->required()
                                ->label(__('forms.deadline')),

                            Forms\Components\TextInput::make('quantity')
                                ->required()
                                ->numeric()
                                ->label(__('forms.quantity')),

                            Forms\Components\Select::make('gender_required')
                                ->required()
                                ->searchable()
                                ->prefixIcon('heroicon-o-user')
                                ->options([
                                    0 => __('forms.gender_none'),
                                    1 => __('forms.gender_male'),
                                    2 => __('forms.gender_female'),
                                ])
                                ->default(0)
                                ->placeholder(__('forms.select_gender'))
                                ->label(__('forms.gender_required')),

                            Forms\Components\RichEditor::make('job_description')
                                ->required()
                                ->columnSpanFull()
                                ->label(__('forms.job_description')),

                            Forms\Components\MarkdownEditor::make('job_requirement')
                                ->required()
                                ->columnSpanFull()
                                ->label(__('forms.job_requirement')),

                            Forms\Components\MarkdownEditor::make('benefits_enjoyed')
                                ->required()
                                ->columnSpanFull()
                                ->label(__('forms.benefits_enjoyed')),
                        ]),
                ]),

            // Group: Job Specifications
            Forms\Components\Section::make(__('forms.job_specifications'))
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Select::make('position')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    'Manager' => __('forms.position_manager'),
                                    'Developer' => __('forms.position_developer'),
                                    'Designer' => __('forms.position_designer'),
                                    'Analyst' => __('forms.position_analyst'),
                                    'Support' => __('forms.position_support'),
                                ])
                                ->placeholder(__('forms.select_position'))
                                ->label(__('forms.position'))
                                ->helperText(__('forms.position_helper'))
                                ->hint(__('forms.position_hint'))
                                ->default('Developer') // Set a default value if applicable
                                ->reactive() // Make it reactive if it affects other fields
                                ->disablePlaceholderSelection() // Prevent placeholder from being selected
                                ->columnSpan(1), // Adjust width in the grid

                            Forms\Components\Select::make('type_of_workplace')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    'Office' => __('forms.workplace_office'),
                                    'Remote' => __('forms.workplace_remote'),
                                    'Hybrid' => __('forms.workplace_hybrid'),
                                    'Field' => __('forms.workplace_field'),
                                    'On-site' => __('forms.workplace_on_site'),
                                ])
                                ->placeholder(__('forms.select_workplace'))
                                ->label(__('forms.type_of_workplace'))
                                ->helperText(__('forms.workplace_helper'))
                                ->hint(__('forms.workplace_hint'))
                                ->default('Remote') // Set a default value if applicable
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\Select::make('experience')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    '0-1 years' => __('forms.experience_0_1'),
                                    '2-3 years' => __('forms.experience_2_3'),
                                    '4-5 years' => __('forms.experience_4_5'),
                                    '6-10 years' => __('forms.experience_6_10'),
                                    '10+ years' => __('forms.experience_10_plus'),
                                ])
                                ->placeholder(__('forms.select_experience'))
                                ->label(__('forms.experience'))
                                ->helperText(__('forms.experience_helper'))
                                ->hint(__('forms.experience_hint'))
                                ->default('2-3 years')
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\Select::make('academic_level')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    'High School' => __('forms.academic_high_school'),
                                    'Associate Degree' => __('forms.academic_associate'),
                                    'Bachelor\'s Degree' => __('forms.academic_bachelor'),
                                    'Master\'s Degree' => __('forms.academic_master'),
                                    'Doctorate' => __('forms.academic_doctorate'),
                                ])
                                ->placeholder(__('forms.select_academic_level'))
                                ->label(__('forms.academic_level'))
                                ->helperText(__('forms.academic_helper'))
                                ->hint(__('forms.academic_hint'))
                                ->default('Bachelor\'s Degree')
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\Select::make('job_type')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    'Full-time' => __('forms.job_type_full_time'),
                                    'Part-time' => __('forms.job_type_part_time'),
                                    'Contract' => __('forms.job_type_contract'),
                                    'Temporary' => __('forms.job_type_temporary'),
                                    'Internship' => __('forms.job_type_internship'),
                                    'Freelance' => __('forms.job_type_freelance'),
                                ])
                                ->placeholder(__('forms.select_job_type'))
                                ->label(__('forms.job_type'))
                                ->helperText(__('forms.job_type_helper'))
                                ->hint(__('forms.job_type_hint'))
                                ->default('Full-time')
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('salary_min')
                                ->required()
                                ->numeric()
                                ->label(__('forms.salary_min'))
                                ->placeholder(__('forms.enter_min_salary'))
                                ->helperText(__('forms.salary_min_helper'))
                                ->hint(__('forms.salary_min_hint'))
                                ->prefix('$') // Add currency symbol or any prefix
                                ->suffix(__('forms.salary_suffix')) // Add suffix if needed
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('salary_max')
                                ->required()
                                ->numeric()
                                ->label(__('forms.salary_max'))
                                ->placeholder(__('forms.enter_max_salary'))
                                ->helperText(__('forms.salary_max_helper'))
                                ->hint(__('forms.salary_max_hint'))
                                ->prefix('$') // Add currency symbol or any prefix
                                ->suffix(__('forms.salary_suffix')) // Add suffix if needed
                                ->columnSpan(1),

                            Forms\Components\Select::make('salary_type')
                                ->required()
                                ->label(__('forms.salary_type'))
                                ->options([
                                    'hourly' => __('forms.salary_type_hourly'),
                                    'monthly' => __('forms.salary_type_monthly'),
                                    'weekly' => __('forms.salary_type_weekly'),
                                ])
                                ->searchable()
                                ->placeholder(__('forms.select_salary_type'))
                                ->default('monthly')
                                ->helperText(__('forms.salary_type_helper'))
                                ->hint(__('forms.salary_type_hint'))
                                ->preload()
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),
                        ]),
                ]),

            // Group: Visibility and Contact
            Forms\Components\Section::make(__('forms.visibility_and_contact'))
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Toggle::make('is_hot')
                                ->label(__('forms.is_hot'))
                                ->required()
                                ->default(false)
                                ->onIcon('heroicon-o-fire')
                                ->offIcon('heroicon-s-fire'),

                            Forms\Components\Toggle::make('is_urgent')
                                ->label(__('forms.is_urgent'))
                                ->required()
                                ->default(false)
                                ->onIcon('heroicon-o-exclamation-circle')
                                ->offIcon('heroicon-o-exclamation-circle'),

                            Forms\Components\TextInput::make('contact_person_name')
                                ->required()
                                ->maxLength(100)
                                ->prefix('👤')
                                ->placeholder(__('forms.enter_contact_name'))
                                ->helperText(__('forms.contact_name_helper'))
                                ->label(__('forms.contact_person_name')),

                            Forms\Components\TextInput::make('contact_person_phone')
                                ->required()
                                ->tel()
                                ->maxLength(15)
                                ->prefix('📞')
                                ->placeholder(__('forms.enter_contact_phone'))
                                ->helperText(__('forms.contact_phone_helper'))
                                ->label(__('forms.contact_person_phone')),

                            Forms\Components\TextInput::make('contact_person_email')
                                ->required()
                                ->email()
                                ->maxLength(100)
                                ->prefix('✉️')
                                ->placeholder(__('forms.enter_contact_email'))
                                ->helperText(__('forms.contact_email_helper'))
                                ->label(__('forms.contact_person_email')),

                            Forms\Components\Select::make('status')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->disabled()
                                ->dehydrated()
                                ->default(0)
                                ->afterStateHydrated(function ($set, $state) {
                                    // Đảm bảo rằng nếu trạng thái chưa được đặt, sẽ gán giá trị mặc định
                                    if ($state === null) {
                                        $set('status', 0);
                                    }
                                })
                                ->options([
                                    0 => __('forms.status_pending_review'),
                                    1 => __('forms.status_approved'),
                                    2 => __('forms.status_rejected'),
                                    3 => __('forms.status_published'),
                                    4 => __('forms.status_closed'),
                                    5 => __('forms.status_expired'),
                                    6 => __('forms.status_under_review'),
                                    7 => __('forms.status_interviewing'),
                                    8 => __('forms.status_hired'),
                                    9 => __('forms.status_archived'),
                                    10 => __('forms.status_cancelled'),
                                    11 => __('forms.status_on_hold'),
                                    12 => __('forms.status_filled'),
                                    13 => __('forms.status_draft'),
                                    14 => __('forms.status_reopened'),
                                ])
                                ->default(0)
                                ->placeholder(__('forms.select_status'))
                                ->label(__('forms.status')),
                        ]),
                ]),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id') // Thêm cột ID
                ->numeric()
                ->sortable(),
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
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getEloquentQuery(): Builder
{
    $user = Auth::user(); // Lấy người dùng hiện tại
    $companyIds = Company::where('user_id', $user->id)->pluck('id');

    return parent::getEloquentQuery()
        ->whereIn('company_id', $companyIds);
}

}
