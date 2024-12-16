<?php

namespace App\Filament\RecruiterPanel\Pages\Auth;

use App\Models\CommonLocation;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Filament\Events\Auth\Registered;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Illuminate\Support\Str;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Resources\Components\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Pages\Auth\Register as BaseRegister;
use Geocoder\Location;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Register extends BaseRegister
{
    protected ?string $maxWidth = '4xl';
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                ->schema([
                    Grid::make(1)
                    ->schema([
                        Tabs::make('Register')
                            ->tabs([
                                Tabs\Tab::make('Thông Tin Người Dùng')
                                    ->schema([
                                        Section::make('Thông Tin Người Dùng')
                                            ->schema([
                                                Grid::make(2)
                                                    ->schema([
                                                        TextInput::make('full_name')
                                                            ->required()
                                                            ->maxLength(255)
                                                            ->label('Full Name'),
                                                            TextInput::make('email')
                                                                ->email()
                                                                ->required()
                                                                ->maxLength(100)
                                                                ->label('Email')
                                                                ->unique('users', 'email'), // Kiểm tra tính duy nhất trong bảng users

                                                    ]),
                                                FileUpload::make('avatar_url')
                                                    ->disk('public')
                                                    ->directory('avatars')
                                                    ->image()
                                                    ->maxSize(5 * 1024)
                                                    ->afterStateUpdated(function ($state, callable $set) {
                                                        if ($state) {
                                                            $filename = basename($state);
                                                            $set('avatar_public_id', $filename);
                                                        }
                                                    })
                                                    ->label('Avatar'),
                                                TextInput::make('avatar_public_id')
                                                    ->maxLength(300)
                                                    ->default(null)
                                                    ->label('Avatar Public ID'),
                                            ]),
                                        Section::make('Cài Đặt Bảo Mật')
                                            ->schema([
                                                Grid::make(2)
                                                    ->schema([
                                                        TextInput::make('password')
                                                            ->password()
                                                            ->maxLength(128)
                                                            ->required()
                                                            ->label('Password'),
                                                        DatePicker::make('last_login')
                                                            ->hidden()
                                                            ->default(Date::now())
                                                            ->label('Last Login'),
                                                    ]),
                                            ]),
                                            Section::make('Quyền Và Vai Trò')
                                            ->schema([
                                                Select::make('roles')
                                                    ->options(Role::all()->pluck('name', 'id')->toArray())  // Populate roles manually
                                                    ->multiple()
                                                    ->preload()
                                                    ->default(function () {
                                                        // Provide default role IDs as an array
                                                        return Role::where('name', 'recruiter')->pluck('id')->toArray();
                                                    })
                                                    ->hidden()
                                                    ->searchable()
                                                    ->label('Roles'),
                                                Grid::make(3)
                                                    ->schema([
                                                        Toggle::make('has_company')
                                                            ->required()
                                                            ->default(true)
                                                            ->hidden()
                                                            ->label('Recruiter Role')
                                                            ->afterStateUpdated(function ($state, callable $set) {
                                                                $roles = $state ? ['recruiter'] : [];
                                                                $set('roles', $roles);
                                                            }),
                                                        Toggle::make('is_superuser')
                                                            ->required()
                                                            ->default(false)
                                                            ->hidden()
                                                            ->label('Super Admin Role'),
                                                        Toggle::make('is_staff')
                                                            ->required()
                                                            ->default(false)
                                                            ->hidden()
                                                            ->label('Panel User Role'),
                                                    ])->hidden(),
                                            ])
                                            ->hidden(true ) // Hide section based on condition
                                            ->extraAttributes(['data-hidden' => 'true']) // Custom attribute for hidden section
                                            ->columnSpanFull(), // Make sure it spans full width

                                    ]),
                                Tabs\Tab::make('Thông Tin Công Ty')
                                    ->schema([
                                        Select::make('location_id')
                                    ->label('Location')
                                    ->options(CommonLocation::all()->pluck('address', 'id')->toArray())  // Manually populate locations
                                    ->required()
                                    ->preload(),


                                        TextInput::make('company_name')
                                            ->label('Company Name')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(250)
                                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                                        TextInput::make('slug')
                                            ->label('Slug')
                                            ->readOnly(),
                                        FileUpload::make('company_image_url')
                                            ->label('Company Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('company-images')
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if ($state) {
                                                    $fileName = pathinfo($state, PATHINFO_BASENAME);
                                                    $set('company_image_public_id', $fileName);
                                                }
                                            }),
                                        FileUpload::make('company_cover_image_url')
                                            ->label('Company Cover Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('company-cover-images')
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if ($state) {
                                                    $fileName = pathinfo($state, PATHINFO_BASENAME);
                                                    $set('company_cover_image_public_id', $fileName);
                                                }
                                            }),
                                        TextInput::make('company_image_public_id')
                                            ->label('Company Image Public ID'),
                                        TextInput::make('company_cover_image_public_id')
                                            ->label('Company Cover Image Public ID'),
                                        TextInput::make('facebook_url')
                                            ->label('Facebook URL')
                                            ->maxLength(200)
                                            ->default(null),
                                        TextInput::make('youtube_url')
                                            ->label('YouTube URL')
                                            ->maxLength(200)
                                            ->default(null),
                                        TextInput::make('linkedin_url')
                                            ->label('LinkedIn URL')
                                            ->maxLength(200)
                                            ->default(null),
                                        TextInput::make('company_email')
                                            ->label('Company Email')
                                            ->email()
                                            ->maxLength(100)
                                            ->default(null),
                                        TextInput::make('company_phone')
                                            ->label('Company Phone')
                                            ->tel()
                                            ->maxLength(15)
                                            ->default(null),
                                        TextInput::make('website_url')
                                            ->label('Website URL')
                                            ->url()
                                            ->prefix('https://')
                                            ->maxLength(300)
                                            ->default(null),
                                        TextInput::make('tax_code')
                                            ->label('Tax Code')
                                            ->maxLength(30)
                                            ->default(null),
                                        DatePicker::make('since')
                                            ->label('Since'),
                                        Select::make('field_operation')
                                            ->label('Field of Operation')
                                            ->options([
                                                'tech' => 'Technology',
                                                'finance' => 'Finance',
                                                'health' => 'Healthcare',
                                                'education' => 'Education',
                                                'retail' => 'Retail',
                                            ])
                                            ->required(),
                                        RichEditor::make('description')
                                            ->label('Description')
                                            ->columnSpanFull(),
                                        Select::make('employee_size')
                                            ->label('Employee Size')
                                            ->options([
                                                10 => '1 - 10',
                                                50 => '11 - 50',
                                                100 => '51 - 100',
                                                500 => '101 - 500',
                                                1000 => '501+',
                                            ])
                                            ->required(),
                                    ])->hidden(fn($get) => !$get('has_company')),
                            ]),
                    ])
                    ->statePath('data'),

                ])

            ),
        ];
    }
    public function register(): ?RegistrationResponse
    {
        $data = $this->form->getState()["data"];

        try {
            DB::beginTransaction();

            // Step 1: Create a new user
            $user = User::create([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'avatar_url' => $data['avatar_url'],
                'avatar_public_id' => $data['avatar_public_id'],
                'password' => Hash::make($data['password']),
                'last_login' => $data['last_login'],
                'is_superuser' => $data['is_superuser'] ? 1 : 0,
                'is_staff' => $data['is_staff'] ? 1 : 0,
                'has_company' => $data['has_company'] ? 1 : 0,
            ]);

            // Retrieve the newly created user's ID
            $userId = $user->id;

            // Step 2: Create a new company entry
            Company::create([
                'location_id' => $data['location_id'],
                'user_id' => $userId,
                'company_name' => $data['company_name'],
                'slug' => $data['slug'],
                'company_image_url' => $data['company_image_url'],
                'company_image_public_id' => $data['company_image_public_id'],
                'company_cover_image_url' => $data['company_cover_image_url'],
                'company_cover_image_public_id' => $data['company_cover_image_public_id'],
                'facebook_url' => $data['facebook_url'],
                'youtube_url' => $data['youtube_url'],
                'linkedin_url' => $data['linkedin_url'],
                'company_email' => $data['company_email'],
                'company_phone' => $data['company_phone'],
                'website_url' => $data['website_url'],
                'tax_code' => $data['tax_code'],
                'since' => $data['since'],
                'field_operation' => $data['field_operation'],
                'description' => $data['description'],
                'employee_size' => $data['employee_size'],
            ]);

            // Step 3: Insert roles for the user


            DB::commit();
            event(new Registered($user));

            $this->sendEmailVerificationNotification($user);

            Filament::auth()->login($user);

            session()->regenerate();
            return app(RegistrationResponse::class);
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception (e.g., log the error)
            dd($e->getMessage());
        }
    }

}
