<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\CompanyResource\Pages;
use App\Filament\RecruiterPanel\Resources\CompanyResource\RelationManagers;
use App\Models\CommonCareer;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Str;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static  ?string  $label = 'Thông tin công ty';
    public static  ?string  $subheading = 'Thông tin công ty';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin công ty')
                    ->description('Nhập thông tin chi tiết về công ty.')
                    ->schema([
                        Forms\Components\Grid::make(2) // Sử dụng Grid để chia thành 2 cột
                            ->schema([
                                Forms\Components\Select::make('location_id')
                                    ->label('Địa điểm')
                                    ->relationship('location', 'address')
                                    ->required()
                                    ->preload()
                                    ->placeholder('Chọn địa điểm'),

                                Forms\Components\Select::make('user_id')
                                    ->label('Người dùng')
                                    ->relationship('user', 'full_name')
                                    ->preload()
                                    ->disabled()
                                    ->searchable()
                                    ->placeholder('Chọn người dùng'),

                                Forms\Components\TextInput::make('company_name')
                                    ->label('Tên công ty')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(250)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->placeholder('Nhập tên công ty'),

                                Forms\Components\TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique('companies', 'slug')
                                    ->placeholder('Nhập slug cho công ty'),
                            ]),

                    ]),

                Forms\Components\Section::make('Hình ảnh công ty')
                    ->description('Tải lên hình ảnh đại diện và bìa cho công ty.')
                    ->schema([
                        Forms\Components\Grid::make(2) // Sử dụng Grid để chia thành 2 cột
                            ->schema([
                                Forms\Components\FileUpload::make('company_image_url')
                                    ->label('Hình ảnh công ty')
                                    ->image()
                                    ->disk('public')
                                    ->directory('company-images')
                                    ->afterStateUpdated(fn($state, callable $set) => $set('company_image_public_id', pathinfo($state, PATHINFO_BASENAME)))
                                    ->required()
                                    ->placeholder('Tải lên hình ảnh công ty'),

                                Forms\Components\FileUpload::make('company_cover_image_url')
                                    ->label('Hình ảnh bìa công ty')
                                    ->image()
                                    ->disk('public')
                                    ->directory('company-cover-images')
                                    ->afterStateUpdated(fn($state, callable $set) => $set('company_cover_image_public_id', pathinfo($state, PATHINFO_BASENAME)))
                                    ->required()
                                    ->placeholder('Tải lên hình ảnh bìa công ty'),
                            ]),
                    ]),

                Forms\Components\Section::make('Thông tin liên hệ')
                    ->description('Nhập thông tin liên hệ của công ty.')
                    ->schema([
                        Forms\Components\Grid::make(2) // Sử dụng Grid để chia thành 2 cột
                            ->schema([
                                Forms\Components\TextInput::make('company_email')
                                    ->label('Email công ty')
                                    ->email()
                                    ->maxLength(100)
                                    ->placeholder('Nhập email công ty'),

                                Forms\Components\TextInput::make('company_phone')
                                    ->label('Số điện thoại công ty')
                                    ->tel()
                                    ->maxLength(15)
                                    ->placeholder('Nhập số điện thoại công ty'),

                                Forms\Components\TextInput::make('website_url')
                                    ->label('URL trang web')
                                    ->url()
                                    ->prefix('https://')
                                    ->maxLength(300)
                                    ->placeholder('Nhập URL trang web'),

                                Forms\Components\TextInput::make('tax_code')
                                    ->label('Mã số thuế')
                                    ->maxLength(30)
                                    ->placeholder('Nhập mã số thuế'),
                            ]),
                    ]),

                Forms\Components\Section::make('Thông tin khác')
                    ->description('Nhập thông tin bổ sung về công ty.')
                    ->schema([
                        Forms\Components\Grid::make(2) // Sử dụng Grid để chia thành 2 cột
                            ->schema([
                                Forms\Components\DatePicker::make('since')
                                    ->label('Từ năm'),

                                    Forms\Components\Select::make('field_operation')
                                    ->label('Lĩnh vực hoạt động')
                                    ->options(CommonCareer::pluck('name', 'id')->toArray()) // Load career names into the select
                                    ->required(),

                                Forms\Components\RichEditor::make('description')
                                    ->label('Mô tả')
                                    ->columnSpanFull(),

                                Forms\Components\Select::make('employee_size')
                                    ->label('Số lượng nhân viên')
                                    ->options([
                                        10 => '1 - 10',
                                        50 => '11 - 50',
                                        100 => '51 - 100',
                                        500 => '101 - 500',
                                        1000 => '501+',
                                    ])
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID Công Ty')
                    ->sortable(), // Allows sorting by ID
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Tên Công Ty')
                    ->sortable() // Allows sorting by company name
            ])
            ->filters([
                // Define your filters here if needed
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
            'index' => Pages\ListCompanies::route('/'),
            // 'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()->where('user_id', Auth::id());
}

}
