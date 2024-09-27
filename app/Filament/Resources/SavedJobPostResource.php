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
    protected static ?string $navigationGroup = 'Sơ yếu lý lịch & Mục đã lưu';
    public static function getPluralModelLabel(): string
    {
        return 'Các bài đăng công việc đã lưu'; // Trả về tên số nhiều cho mô hình Company
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Phần chọn Bài đăng công việc
                Section::make('Chi tiết Bài đăng Công việc')
                    ->schema([
                        Card::make([
                            Select::make('job_post_id')
                                ->label('Bài đăng Công việc')
                                ->searchable()
                                ->preload()
                                ->options(function () {
                                    return \App\Models\JobPost::all()->pluck('job_name', 'id')->toArray();
                                })
                                ->required()
                                ->placeholder('Chọn một Bài đăng Công việc')
                                ->hint('Chọn bài đăng công việc liên quan đến mục này.')
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    // Xử lý thay đổi trạng thái
                                })
                                ->prefixIcon('heroicon-o-briefcase'), // Tùy chọn: thêm biểu tượng phía trước
                        ])->columnSpanFull(),

                        TextInput::make('user_id')
                            ->label('ID Người dùng')
                            ->required()
                            ->numeric()
                            ->default(Auth::id())
                            ->disabled()
                            ->dehydrated()
                            ->placeholder('ID Quản trị viên')
                            ->hint('ID của người dùng tạo mục này.')
                            ->maxLength(10) // Giới hạn độ dài tối đa
                            ->suffixIcon('heroicon-o-user'), // Tùy chọn: thêm biểu tượng phía sau
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Hiển thị tên bài đăng công việc thay vì ID
                Tables\Columns\TextColumn::make('jobPost.job_name') // Điều chỉnh theo quan hệ và tên trường thực tế của bạn
                    ->label('Tên Bài đăng Công việc')
                    ->sortable()
                    ->searchable(),

                // Các cột bổ sung liên quan đến Bài đăng Công việc
                Tables\Columns\TextColumn::make('jobPost.company.company_name') // Truy cập company_name thông qua quan hệ jobPost
                    ->label('Tên Công ty')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('jobPost.salary_max') // Điều chỉnh theo tên cột thực tế trong mô hình Bài đăng Công việc
                    ->label('Mức lương Tối đa')
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
                // Định nghĩa bất kỳ bộ lọc nào ở đây nếu cần
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
            'index' => Pages\ListSavedJobPosts::route('/'),
            'create' => Pages\CreateSavedJobPost::route('/create'),
            'edit' => Pages\EditSavedJobPost::route('/{record}/edit'),
        ];
    }
}
