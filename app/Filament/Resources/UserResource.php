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
    protected static ?string $navigationGroup = 'Filament Shield';
    public static function getPluralModelLabel(): string
    {
        return 'Người dùng'; // Nhãn số nhiều cho mô hình
    }
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
                                    ->label('Họ Tên'),
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
                            ->label('Ảnh Đại Diện'),
                        Forms\Components\TextInput::make('avatar_public_id')
                            ->maxLength(300)
                            ->default(null)
                            ->label('ID Ảnh Đại Diện'),
                    ]),

                Section::make('Cài Đặt Bảo Mật')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->maxLength(128)
                                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : $state)
                                    ->required(fn($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                                    ->label('Mật Khẩu'),
                                Forms\Components\DateTimePicker::make('last_login')
                                    ->label('Lần Đăng Nhập Cuối'),
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
                            ->label('Vai Trò'),

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
                                    ->label('Vai Trò Tuyển Dụng'),

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
                                    ->label('Vai Trò Quản Trị Viên'),

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
                                    ->label('Vai Trò Người Dùng Quản Lý'),
                            ]),
                    ]),

                Section::make('Thông Báo')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('email_notification_active')
                                    ->required()
                                    ->label('Kích Hoạt Thông Báo Email'),
                                Forms\Components\Toggle::make('sms_notification_active')
                                    ->required()
                                    ->label('Kích Hoạt Thông Báo SMS'),
                            ]),
                    ]),

                Section::make('Trạng Thái Tài Khoản')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->label('Đang Hoạt Động'),
                        Forms\Components\Toggle::make('is_verify_email')
                            ->required()
                            ->label('Đã Xác Minh Email'),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('last_login')
                    ->dateTime()
                    ->sortable()
                    ->label('Lần Đăng Nhập Cuối'),
                Tables\Columns\IconColumn::make('is_superuser')
                    ->boolean()
                    ->label('Quản Trị Viên'),
                Tables\Columns\IconColumn::make('is_staff')
                    ->boolean()
                    ->label('Nhân Viên'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Đang Hoạt Động'),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable()
                    ->label('Họ Tên'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->searchable()
                    ->label('Ảnh Đại Diện'),
                Tables\Columns\TextColumn::make('avatar_public_id')
                    ->searchable()
                    ->label('ID Ảnh Đại Diện'),
                Tables\Columns\IconColumn::make('email_notification_active')
                    ->boolean()
                    ->label('Kích Hoạt Thông Báo Email'),
                Tables\Columns\IconColumn::make('sms_notification_active')
                    ->boolean()
                    ->label('Kích Hoạt Thông Báo SMS'),
                Tables\Columns\IconColumn::make('has_company')
                    ->boolean()
                    ->label('Có Công Ty'),
                Tables\Columns\IconColumn::make('is_verify_email')
                    ->boolean()
                    ->label('Đã Xác Minh Email'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Tạo'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Cập Nhật'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Chỉnh sửa'),
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Xóa'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa'),
                ]),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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
