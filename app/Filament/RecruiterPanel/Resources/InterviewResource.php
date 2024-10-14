<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\InterviewResource\Pages;
use App\Filament\RecruiterPanel\Resources\InterviewResource\RelationManagers;
use App\Models\Interview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InterviewResource extends Resource
{
    protected static ?string $model = Interview::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?string $navigationGroup = 'Quản lý lịch phỏng vấn'; // Nhóm trong menu điều hướng

    public static ?string $label = 'Buổi phỏng vấn'; // Nhãn hiển thị cho tài nguyên này
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) // Chia layout thành 2 cột
                    ->schema([
                        Forms\Components\Select::make('candidate_id')
                            ->label('Người Dự Tuyển')
                            ->relationship('candidate', 'full_name') // Lấy dữ liệu từ relationship 'candidate'
                            ->required(),
    
                        Forms\Components\Select::make('slot_id')
                            ->label('Thời Gian Phỏng Vấn')
                            ->relationship('slot', 'start_time') // Lấy dữ liệu từ relationship 'slot'
                            ->required(),
    
                        Forms\Components\TextInput::make('feedback')
                            ->label('Phản Hồi')
                            ->required(),
    
                        Forms\Components\Select::make('status')
                            ->label('Trạng Thái')
                            ->options([
                                'scheduled' => 'Đã Lên Lịch',
                                'completed' => 'Hoàn Thành',
                                'canceled' => 'Đã Hủy',
                            ])
                            ->required(),
                    ]),
            ]);
    }
    
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListInterviews::route('/'),
            'create' => Pages\CreateInterview::route('/create'),
            'edit' => Pages\EditInterview::route('/{record}/edit'),
        ];
    }
}
