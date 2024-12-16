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
use Filament\Tables\Columns\BadgeColumn;
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
                                    ->dehydrateStateUsing(function ($state, $record) {
                                        if (empty($state)) {
                                            return $record?->password;
                                        }
                                        return Hash::make($state);
                                    })
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
                    BadgeColumn::make('roles')
                    ->label('Vai trò')
                    ->sortable()
                    ->getStateUsing(fn(User $record) => $record->getRoleNames()->implode(' | ')), // Hiển thị vai trò dưới dạng chuỗi
                Tables\Columns\TextColumn::make('avatar_public_id')
                    ->searchable()
                    ->label('ID Ảnh Đại Diện'),
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
