<?php
//*** */ chỉ cho phép xem, không tạo và sửa

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\PurchasedServiceResource\Pages;
use App\Filament\RecruiterPanel\Resources\PurchasedServiceResource\RelationManagers;
use App\Models\PurchasedService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurchasedServiceResource extends Resource
{
    protected static ?string $model = PurchasedService::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card'; // Hoặc 'heroicon-o-receipt'
    protected static ?string $navigationGroup = 'Quản lý dịch vụ';
    public static function getPluralModelLabel(): string
    {
        return 'Dịch vụ đã mua'; // Trả về tên số nhiều cho mô hình Purchased Service
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin dịch vụ')
                    ->description('Chi tiết về dịch vụ đã mua')
                    ->schema([
                        Forms\Components\Select::make('service_id')
                            ->relationship('service', 'package_name')
                            ->required()
                            ->label('Tên dịch vụ'),
                        Forms\Components\Select::make('invoice_id')
                            ->relationship('invoice', 'invoice_code')
                            ->required()
                            ->label('Mã hóa đơn'),
                        Forms\Components\DatePicker::make('purchase_date')
                            ->required()
                            ->label('Ngày mua'),
                        Forms\Components\TextInput::make('quantity')
                            ->required()
                            ->numeric()
                            ->label('Số lượng'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('Mã dịch vụ đã mua'),
                Tables\Columns\TextColumn::make('service.package_name')->label('Tên dịch vụ'),
                Tables\Columns\TextColumn::make('invoice.invoice_code')->label('Mã hóa đơn'),
                Tables\Columns\TextColumn::make('purchase_date')->date()->label('Ngày mua'),
                Tables\Columns\TextColumn::make('quantity')->label('Số lượng bài đăng'),
                Tables\Columns\TextColumn::make('expiration_date')->label('Ngày hết hạn'),
                Tables\Columns\TextColumn::make('invoice.status')->label('Trạng thái thanh toán'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPurchasedServices::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
