<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\InterviewSlotResource\Pages;
use App\Filament\RecruiterPanel\Resources\InterviewSlotResource\RelationManagers;
use App\Models\Interviewer;
use App\Models\InterviewSlot;
use App\Models\PostActivity;
use Filament\Forms;
use Filament\Forms\Components\RelationshipRepeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InterviewSlotResource extends Resource
{
    protected static ?string $model = InterviewSlot::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Quản lý lịch phỏng vấn'; // Nhóm trong menu điều hướng


    public static function getPluralModelLabel(): string
    {
        return 'Lịch phỏng vấn'; // Trả về tên số nhiều cho mô hình Company
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cuộc hẹn') // Tiêu đề section
                    ->schema([
                        Forms\Components\Grid::make(2) // Chia thành 2 cột
                            ->schema([
                                Forms\Components\DateTimePicker::make('start_time')
                                    ->label('Thời gian bắt đầu') // Việt hóa label
                                    ->default(now()),
                                Forms\Components\DateTimePicker::make('end_time')
                                    ->label('Thời gian kết thúc') // Việt hóa label
                                    ->default(now()->addHour()),
                                Forms\Components\TextInput::make('location')
                                    ->maxLength(255)
                                    ->default(null)
                                    ->label('Địa điểm'), // Việt hóa label
                                Forms\Components\Select::make('interviewer_id') // Sử dụng thành phần Select
                                    ->label('Người phỏng vấn') // Việt hóa label
                                    ->searchable()
                                    ->preload()
                                    ->options(Interviewer::query()->pluck('full_name', 'id')) // Lấy tùy chọn từ PostActivity
                                    ->required(), // Tùy chọn: làm cho trường này bắt buộc
                            ]),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày tạo'), // Việt hóa label
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày cập nhật'), // Việt hóa label
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime('d-m-Y H:i')
                    ->sortable()
                    ->label('Thời gian bắt đầu'), // Việt hóa label
                Tables\Columns\TextColumn::make('end_time')
                    ->dateTime('d-m-Y H:i')
                    ->sortable()
                    ->label('Thời gian kết thúc'), // Việt hóa label
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->label('Địa điểm'), // Việt hóa label
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
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInterviewSlots::route('/'),
            'create' => Pages\CreateInterviewSlot::route('/create'),
            'edit' => Pages\EditInterviewSlot::route('/{record}/edit'),
        ];
    }
}
