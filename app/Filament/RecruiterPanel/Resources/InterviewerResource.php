<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\InterviewerResource\Pages;
use App\Filament\RecruiterPanel\Resources\InterviewerResource\RelationManagers;
use App\Models\Interviewer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InterviewerResource extends Resource
{
    protected static ?string $model = Interviewer::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Quản lý lịch phỏng vấn'; // Nhóm trong menu điều hướng

    public static ?string $label = 'Người phỏng vấn'; // Nhãn hiển thị cho tài nguyên này

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('full_name')
                    ->label('Họ và tên') // Việt hóa
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Nhập họ và tên'), // Placeholder

                Forms\Components\TextInput::make('email')
                    ->label('Email') // Việt hóa
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Nhập địa chỉ email'), // Placeholder

                Forms\Components\TextInput::make('position')
                    ->label('Vị trí công việc') // Việt hóa
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Nhập vị trí công việc'), // Placeholder
            ])
            ->columns(2) // Sử dụng 2 cột để tạo layout đẹp hơn
            
           ;
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Họ và tên') // Việt hóa
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email') // Việt hóa
                    ->searchable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Vị trí công việc') // Việt hóa
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Thời gian tạo') // Việt hóa
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Thời gian cập nhật') // Việt hóa
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Thêm bộ lọc nếu cần
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Chỉnh sửa'), // Việt hóa
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa'), // Việt hóa
                ]),
            ])
             ; // Tiêu đề section
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
            'index' => Pages\ListInterviewers::route('/'),
            'create' => Pages\CreateInterviewer::route('/create'),
            'edit' => Pages\EditInterviewer::route('/{record}/edit'),
        ];
    }
}
