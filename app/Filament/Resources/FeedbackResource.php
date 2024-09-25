<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackResource\Pages;
use App\Filament\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\BadgeColumn;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Phản Hồi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Thông Tin Người Dùng')  // Thêm Section mới
                    ->description('Thông tin chi tiết về người dùng')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->required()
                            ->preload()
                            ->searchable(['full_name', 'email'])
                            ->relationship('user', 'full_name')
                            ->label('Người Dùng'),

                        Forms\Components\TextInput::make('name')  // Trường tên
                            ->required()
                            ->maxLength(255)
                            ->label('Tên'),
                    ]),

                Section::make('Phản Hồi')  // Thêm Section cho phản hồi
                    ->description('Thông tin về phản hồi')
                    ->schema([
                        Forms\Components\Grid::make(2)  // Tạo Grid với 2 cột
                            ->schema([
                                Forms\Components\Textarea::make('description')  // Trường mô tả
                                    ->required()
                                    ->maxLength(1000)
                                    ->label('Mô Tả')
                                    ->columnSpan(2),  // Chiếm toàn bộ chiều rộng (2 cột)

                                Forms\Components\TextInput::make('content')
                                    ->required()
                                    ->maxLength(500)
                                    ->label('Nội Dung'),

                                Forms\Components\TextInput::make('rating')
                                    ->required()
                                    ->numeric()
                                    ->label('Đánh Giá'),

                                Forms\Components\Toggle::make('is_active')
                                    ->required()
                                    ->label('Kích Hoạt'),
                            ]),
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
                    ->label('Mã Người Dùng'),

                Tables\Columns\TextColumn::make('name')  // Cột mới cho tên
                    ->searchable()
                    ->label('Tên'),

                Tables\Columns\TextColumn::make('description')  // Cột mới cho mô tả
                    ->searchable()
                    ->label('Mô Tả'),

                Tables\Columns\TextColumn::make('content')
                    ->searchable()
                    ->label('Nội Dung'),

                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable()
                    ->label('Đánh Giá'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Kích Hoạt'),

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
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Phản Hồi'; // Trả về tên số nhiều cho mô hình
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count(); // Trả về số lượng bản ghi
    }
}