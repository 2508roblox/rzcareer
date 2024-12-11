<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentHistoryResource\Pages;
use App\Filament\Resources\PaymentHistoryResource\RelationManagers;
use App\Models\PaymentHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentHistoryResource extends Resource
{
    protected static ?string $model = PaymentHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Công ty & Công việc'; // Nếu cần thiết, thêm nhóm navigation

    public static function getPluralModelLabel(): string
    {
        return 'Lịch Sử Thanh toán'; // Trả về tên số nhiều cho mô hình PaymentHistory
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin thanh toán') // Tiêu đề section
                    ->description('Điền thông tin thanh toán bên dưới') // Mô tả section
                    ->schema([ // Di chuyển ->schema() vào đúng vị trí
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'full_name')
                            ->required()
                            ->label('Người dùng'), // Việt hóa nhãn
                        Forms\Components\Select::make('invoice_id')
                            ->relationship('invoice', 'invoice_code')
                            ->required()
                            ->label('Mã hóa đơn'), // Việt hóa nhãn
                        Forms\Components\TextInput::make('balance')
                            ->required()
                            ->numeric()
                            ->label('Số dư (VNĐ)'), // Việt hóa nhãn
                        Forms\Components\TextInput::make('payment_method')
                            ->required()
                            ->label('Phương thức thanh toán'), // Việt hóa nhãn
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Đang chờ',
                                'completed' => 'Hoàn thành',
                                'failed' => 'Thất bại',
                            ])
                            ->required()
                            ->label('Trạng thái'), // Việt hóa nhãn
                        Forms\Components\DatePicker::make('payment_date')
                            ->required()
                            ->label('Ngày thanh toán'), // Việt hóa nhãn
                    ]),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.full_name')
                    ->label('Người dùng'), // Việt hóa nhãn
                Tables\Columns\TextColumn::make('invoice.invoice_code')
                    ->label('Mã hóa đơn'), // Việt hóa nhãn
                Tables\Columns\TextColumn::make('balance')
                    ->money('VND') // Định dạng tiền Việt
                    ->label('Số dư'), // Việt hóa nhãn
                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Phương thức thanh toán'), // Việt hóa nhãn
                Tables\Columns\TextColumn::make('status')
                    ->label('Trạng thái') // Việt hóa nhãn
                    ->colors([
                        'pending' => 'Đang chờ',
                                'completed' => 'Hoàn thành',
                                'failed' => 'Thất bại',
                    ]),
                Tables\Columns\TextColumn::make('payment_date')
                    ->date()
                    ->label('Ngày thanh toán'), // Việt hóa nhãn
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentHistories::route('/'),
            'create' => Pages\CreatePaymentHistory::route('/create'),
            'edit' => Pages\EditPaymentHistory::route('/{record}/edit'),
        ];
    }
}
