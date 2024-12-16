<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\PostActivityResource\Pages;
use App\Filament\RecruiterPanel\Resources\PostActivityResource\RelationManagers;
use App\Models\PostActivity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
class PostActivityResource extends Resource
{
    protected static ?string $model = PostActivity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check'; // Hoặc 'heroicon-o-user-group'

    protected static ?string $navigationGroup = 'Quản lý công ty';

    public static function getPluralModelLabel(): string
    {
        return 'Ứng tuyển'; // Trả về tên số nhiều cho mô hình Company
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông Tin Ứng Viên')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->required()
                            ->maxLength(100)
                            ->disabled()
                            ->label('Họ và Tên')
                            ->placeholder('Nhập họ và tên'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(100)
                            ->disabled()
                            ->label('Email')
                            ->placeholder('Nhập địa chỉ email'),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(15)
                            ->disabled()
                            ->label('Số Điện Thoại')
                            ->placeholder('Nhập số điện thoại'),
                    ]),

                Forms\Components\Section::make('Thông Tin Bài Đăng')
                    ->schema([
                        Forms\Components\TextInput::make('job_post_id')
                            ->required()
                            ->numeric()
                            ->disabled()
                            ->label('ID Bài Đăng'),
                        Forms\Components\TextInput::make('resume_id')
                            ->required()
                            ->numeric()
                            ->disabled()
                            ->label('ID Hồ Sơ'),
                        Forms\Components\TextInput::make('user_id')
                            ->required()
                            ->numeric()
                            ->disabled()
                            ->label('ID Người Dùng'),
                    ]),

                Forms\Components\Section::make('Trạng Thái')
                    ->schema([
                        Forms\Components\TextInput::make('status')
                            ->required()
                            ->disabled()
                            ->label('Trạng Thái'),
                        Forms\Components\TextInput::make('is_sent_email')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->label('Đã Gửi Email'),
                        Forms\Components\TextInput::make('is_deleted')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->label('Đã Xóa'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make(name: 'jobPost.job_name')
                    ->label('Bài tuyển dụng')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Họ và tên')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status') // Change to SelectColumn
                    ->label('Trạng thái ứng tuyển')
                    ->options([
                        'Chờ xác nhận' => 'Chờ xác nhận',
                        'Đã liên hệ' => 'Đã liên hệ',
                        'Đã test' => 'Đã test',
                        'Đã phỏng vấn' => 'Đã phỏng vấn',
                        'Trúng tuyển' => 'Trúng tuyển',
                        'Không trúng tuyển' => 'Không trúng tuyển',
                    ])
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('resume.file_url') // Giả sử 'resume' là thuộc tính chứa đối tượng
                    ->label('Hồ sơ')
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        // Kiểm tra xem thuộc tính file_url có tồn tại không
                        if (isset($state)) {
                            return new HtmlString('<a href="' . $state . '" target="_blank">Tải xuống</a>');
                        }
                        return 'Không có hồ sơ'; // Hoặc trả về thông báo khác nếu không có
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status') // Add filter for status
                    ->label('Trạng thái')
                    ->options([
                        'Chờ xác nhận' => 'Chờ xác nhận',
                        'Đã liên hệ' => 'Đã liên hệ',
                        'Đã test' => 'Đã test',
                        'Đã phỏng vấn' => 'Đã phỏng vấn',
                        'Trúng tuyển' => 'Trúng tuyển',
                        'Không trúng tuyển' => 'Không trúng tuyển',
                    ])
                    ->placeholder('Chọn trạng thái'), // Placeholder for the filter
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\DeleteAction::make('Xóa') // Vietnamese for "Delete"
                        ->label('Xóa'),
                    Tables\Actions\Action::make('Gửi Email') // Add email button
                        ->action(function ($record) {
                            // Your email sending logic here
                        })
                        ->requiresConfirmation()
                        ->color('primary')
                        ->label('Gửi Email'), // Set label for the button
                ])
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListPostActivities::route('/'),
            // 'create' => Pages\CreatePostActivity::route('/create'),
            // 'edit' => Pages\EditPostActivity::route('/{record}/edit'),
        ];
    }

}
