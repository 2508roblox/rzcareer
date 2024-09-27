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
    protected static ?string $navigationGroup = 'Hồ Sơ & Lượt Xem'; // Điều chỉnh tên nhóm cho phù hợp với ngữ cảnh tiếng Việt
    public static function getPluralModelLabel(): string
    {
        return 'Hồ sơ ứng viên'; // Ví dụ: tên số nhiều cho mô hình 'SeekerProfile'
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cá nhân') // Section cho thông tin cá nhân
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->required()
                            ->relationship('user', 'full_name') // Giả sử 'full_name' là trường hiển thị đầy đủ tên
                            ->preload()
                            ->searchable()
                            ->label('Người dùng'), // Dịch sang tiếng Việt

                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(15)
                            ->label('Số điện thoại'), // Dịch sang tiếng Việt

                        Forms\Components\DatePicker::make('birthday')
                            ->required()
                            ->label('Ngày sinh'), // Dịch sang tiếng Việt

                        Forms\Components\Select::make('gender')
                            ->required()
                            ->options([
                                'M' => 'Nam',
                                'F' => 'Nữ',
                                'O' => 'Khác', // Dịch giới tính sang tiếng Việt
                            ])
                            ->label('Giới tính'), // Dịch sang tiếng Việt
                    ]),

                Forms\Components\Section::make('Địa chỉ và hôn nhân') // Section cho địa chỉ và tình trạng hôn nhân
                    ->schema([
                        Forms\Components\Select::make('location_id')
                            ->required()
                            ->relationship('location', 'address') // Giả sử 'address' là trường địa chỉ hiển thị
                            ->preload()
                            ->searchable()
                            ->label('Địa chỉ'), // Dịch sang tiếng Việt

                        Forms\Components\Select::make('marital_status')
                            ->required()
                            ->options([
                                'S' => 'Độc thân',
                                'M' => 'Đã kết hôn',
                                'D' => 'Ly hôn',
                                'W' => 'Góa bụa', // Dịch tình trạng hôn nhân sang tiếng Việt
                            ])
                            ->label('Tình trạng hôn nhân'), // Dịch sang tiếng Việt
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable()
                    ->label('ID Người dùng'),

                Tables\Columns\TextColumn::make('location_id')
                    ->numeric()
                    ->sortable()
                    ->label('ID Địa chỉ'),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->label('Số điện thoại'),

                Tables\Columns\TextColumn::make('birthday')
                    ->date()
                    ->sortable()
                    ->label('Ngày sinh'),

                // Thêm tên của tùy chọn 'gender'
                Tables\Columns\TextColumn::make('gender')
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'M' => 'Nam',
                            'F' => 'Nữ',
                            'O' => 'Khác',
                            default => 'Không xác định',
                        };
                    })
                    ->label('Giới tính'),

                // Thêm tên của tùy chọn 'marital_status'
                Tables\Columns\TextColumn::make('marital_status')
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'S' => 'Độc thân',
                            'M' => 'Đã kết hôn',
                            'D' => 'Ly hôn',
                            'W' => 'Góa bụa',
                            default => 'Không xác định',
                        };
                    })
                    ->label('Tình trạng hôn nhân'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày tạo'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày cập nhật'),
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
            'index' => Pages\ListSeekerProfiles::route('/'),
            'create' => Pages\CreateSeekerProfile::route('/create'),
            'edit' => Pages\EditSeekerProfile::route('/{record}/edit')
        ];
    }
}
