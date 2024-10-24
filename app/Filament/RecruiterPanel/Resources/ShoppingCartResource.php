<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\ShoppingCartResource\Pages;
use App\Filament\RecruiterPanel\Resources\ShoppingCartResource\RelationManagers;
use App\Models\ShoppingCart;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Illuminate\Support\Str;
use App\Models\Invoice;

class ShoppingCartResource extends Resource
{
    protected static ?string $model = ShoppingCart::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Quản lý dịch vụ';
    public static function getPluralModelLabel(): string
    {
        return 'Giỏ hàng'; // Trả về tên số nhiều cho mô hình Company
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin dịch vụ')
                    ->description('Chọn dịch vụ và số lượng cho giỏ hàng')
                    ->schema([
                        Forms\Components\Select::make('service_id')
                            ->relationship('service', 'package_name')
                            ->required()
                            ->label('Tên dịch vụ')
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => self::updateTotalPrice($state, $set)),
                        Forms\Components\TextInput::make('quantity')
                            ->required()
                            ->integer()
                            ->minValue(1)
                            ->label('Số lượng')
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => self::updateTotalPrice($state, $set)),
                    ]),
                Forms\Components\Section::make('Thông tin giá')
                    ->description('Tổng giá trị của đơn hàng')
                    ->schema([
                        Forms\Components\TextInput::make('total_price')
                            ->disabled()
                            ->numeric()
                            ->label('Tổng giá'),
                    ]),
            ]);
    }

    protected static function updateTotalPrice($state, callable $set): void
    {
        $service = \App\Models\Service::find($state);
        $quantity = (int) $set('quantity', 1);

        if ($service) {
            $totalPrice = $service->price * $quantity;
            $set('total_price', $totalPrice);
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.full_name')->label('Tên người dùng'),
                Tables\Columns\TextColumn::make('service.package_name')->label('Tên dịch vụ'),
                Tables\Columns\TextColumn::make('quantity')->label('Số lượng'),
                Tables\Columns\TextColumn::make('total_price')->money('vnd')->label('Tổng giá'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Ngày tạo'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->label('Ngày cập nhật'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShoppingCarts::route('/'),
            'create' => Pages\CreateShoppingCart::route('/create'),
        ];
    }public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('payment')
                ->label('Thanh toán')
                ->icon('heroicon-o-credit-card')
                ->action(function () {
                    // Logic to generate QR code will be handled in the ListShoppingCarts page
                })
                ->modalHeading('Quét mã QR để thanh toán')
                ->modalDescription('Sử dụng ứng dụng ngân hàng của bạn để quét mã QR bên dưới.')
                ->modalContent(function () {
                    $user = auth()->user();
                    $totalPrice = ShoppingCart::where('user_id', $user->id)->sum('total_price');
                    $invoiceCode = $this->generateUniqueInvoiceCode();
                    
                    return view('filament.qr-code', [
                        'totalPrice' => $totalPrice,
                        'invoiceCode' => $invoiceCode,
                        'userId' => $user->id,
                    ]);
                }),
        ];
    }

    private function generateUniqueInvoiceCode(): string
    {
        do {
            $code = 'INV-' . strtoupper(Str::random(8));
        } while (Invoice::where('invoice_code', $code)->exists());

        return $code;
    }
}
