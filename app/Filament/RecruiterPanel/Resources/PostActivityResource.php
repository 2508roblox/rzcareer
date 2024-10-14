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
                Forms\Components\TextInput::make('job_post_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('resume_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('is_sent_email')
                  
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('is_deleted')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('job_post_id')
                ->label('ID Bài tuyển dụng')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('resume_id')
                ->label('ID Hồ sơ')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('user_id')
                ->label('ID Người dùng')
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
            Tables\Columns\TextColumn::make('status')
                ->label('Trạng thái'),
            Tables\Columns\TextColumn::make('is_sent_email')
                ->label('Đã gửi email')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('is_deleted')
                ->label('Đã xóa')
                ->numeric()
                ->sortable(),
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
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPostActivities::route('/'),
            'create' => Pages\CreatePostActivity::route('/create'),
            'edit' => Pages\EditPostActivity::route('/{record}/edit'),
        ];
    }
    
}
