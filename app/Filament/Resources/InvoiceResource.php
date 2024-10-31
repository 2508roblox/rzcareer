<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Quản lý dịch vụ'; // Nếu cần thiết, thêm nhóm navigation

    public static function getPluralModelLabel(): string
    {
        return 'Hóa đơn'; // Trả về tên số nhiều cho mô hình Invoice
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin hóa đơn') // Tiêu đề section
                    ->schema([
                        Forms\Components\TextInput::make('invoice_code')
                            ->label('Mã hóa đơn') // Tiêu đề cột bằng tiếng Việt
                            ->required(),
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'full_name') // Điều chỉnh theo cách định nghĩa quan hệ

                            ->label(
                                'Người dùng') // Tiêu đề cột bằng tiếng Việt
                            ->required(),
                    ]),
                Forms\Components\Section::make('Chi tiết thanh toán') // Tiêu đề section khác
                    ->schema([
                        Forms\Components\TextInput::make('total_price')
                            ->label('Tổng giá') // Tiêu đề cột bằng tiếng Việt
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Đang chờ', // Tiêu đề tiếng Việt
                                'successful' => 'Thành công', // Tiêu đề tiếng Việt
                                'failed' => 'Thất bại', // Tiêu đề tiếng Việt
                            ])
                            ->label('Trạng thái') // Tiêu đề cột bằng tiếng Việt
                            ->required(),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('invoice_code')
                ->label('Mã hóa đơn'), // Tiêu đề bằng tiếng Việt
            Tables\Columns\TextColumn::make('total_price')
                ->money('usd')
                ->label('Tổng giá'), // Tiêu đề bằng tiếng Việt
            Tables\Columns\TextColumn::make('status')
                ->label('Trạng thái'), // Tiêu đề bằng tiếng Việt
            Tables\Columns\TextColumn::make('created_at')
                ->date()
                ->label('Ngày tạo'), // Tiêu đề bằng tiếng Việt
            Tables\Columns\TextColumn::make('updated_at')
                ->date()
                ->label('Ngày cập nhật') // Tiêu đề bằng tiếng Việt
                ->toggleable(isToggledHiddenByDefault: true), // Cho phép ẩn/hiện cột này
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
