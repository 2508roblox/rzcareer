<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Role;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Users & Roles';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Thông Tin Người Dùng')
                ->schema([
                    Grid::make(2) // Grid với 2 cột
                        ->schema([
                            Forms\Components\TextInput::make('full_name')
                                ->required()
                                ->maxLength(255)
                                ->label('Full Name'),
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->required()
                                ->maxLength(100)
                                ->label('Email'),
                        ]),
                    Forms\Components\FileUpload::make('avatar_url')
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
                    Forms\Components\TextInput::make('avatar_public_id')
                        ->maxLength(300)
                        ->default(null)
                        ->label('Avatar Public ID'),
                ]),

            Section::make('Cài Đặt Bảo Mật')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('password')
                                ->password()
                                ->maxLength(128)
                                ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : $state)
                                ->required(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                                ->label('Password'),
                            Forms\Components\DateTimePicker::make('last_login')
                                ->label('Last Login'),
                        ]),
                ]),

            Section::make('Quyền Và Vai Trò')
                ->schema([
                    Forms\Components\Select::make('roles')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->reactive()
                        ->preload()
                        ->columnSpanFull()
                        ->searchable()
                        ->label('Roles'),

                    Grid::make(3) // Grid với 3 cột
                        ->schema([
                            Toggle::make('has_company')
                                ->required()
                                ->live(100)
                                ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                    $roles = $get('roles') ?? [];
                                    $recruiterRole = Role::where('name', 'recruiter')->first();

                                    if ($recruiterRole) {
                                        if ($state) {
                                            $roles[] = $recruiterRole->id;
                                        } else {
                                            $roles = array_diff($roles, [$recruiterRole->id]);
                                        }
                                        $set('roles', $roles);
                                    }
                                })
                                ->label('Recruiter Role'),

                            Toggle::make('is_superuser')
                                ->required()
                                ->live(100)
                                ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                    $roles = $get('roles') ?? [];
                                    $superAdminRole = Role::where('name', 'super_admin')->first();

                                    if ($superAdminRole) {
                                        if ($state) {
                                            $roles[] = $superAdminRole->id;
                                        } else {
                                            $roles = array_diff($roles, [$superAdminRole->id]);
                                        }
                                        $set('roles', $roles);
                                    }
                                })
                                ->label('Super Admin Role'),

                            Toggle::make('is_staff')
                                ->required()
                                ->live(100)
                                ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                    $roles = $get('roles') ?? [];
                                    $panelUserRole = Role::where('name', 'panel_user')->first();

                                    if ($panelUserRole) {
                                        if ($state) {
                                            $roles[] = $panelUserRole->id;
                                        } else {
                                            $roles = array_diff($roles, [$panelUserRole->id]);
                                        }
                                        $set('roles', $roles);
                                    }
                                })
                                ->label('Panel User Role'),
                        ]),
                ]),

            Section::make('Thông Báo')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Forms\Components\Toggle::make('email_notification_active')
                                ->required()
                                ->label('Email Notifications Active'),
                            Forms\Components\Toggle::make('sms_notification_active')
                                ->required()
                                ->label('SMS Notifications Active'),
                        ]),
                ]),

            Section::make('Trạng Thái Tài Khoản')
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->required()
                        ->label('Is Active'),
                    Forms\Components\Toggle::make('is_verify_email')
                        ->required()
                        ->label('Is Email Verified'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('last_login')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_superuser')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_staff')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('avatar_url')

                    ->searchable(),
                Tables\Columns\TextColumn::make('avatar_public_id')
                    ->searchable(),
                Tables\Columns\IconColumn::make('email_notification_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('sms_notification_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_company')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_verify_email')
                    ->boolean(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
