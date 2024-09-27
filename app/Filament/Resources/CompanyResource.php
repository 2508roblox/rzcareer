<?php

namespace App\Filament\Resources;

use Str;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Company;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CommonLocation;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CompanyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompanyResource\RelationManagers;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;
    protected static ?string $navigationGroup = 'Công ty & Công việc';

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    public static function getPluralModelLabel(): string
    {
        return 'Công ty'; // Trả về tên số nhiều cho mô hình Company
    }

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
                                    ->required()
                                    ->preload()
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
                                    ->options([
                                        'tech' => 'Công nghệ',
                                        'finance' => 'Tài chính',
                                        'health' => 'Chăm sóc sức khỏe',
                                        'education' => 'Giáo dục',
                                        'retail' => 'Bán lẻ',
                                    ])
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
                Tables\Columns\TextColumn::make('location_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã Địa Điểm'),

                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã Người Dùng'),

                Tables\Columns\TextColumn::make('company_name')
                    ->searchable()
                    ->label('Tên Công Ty'),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->label('Slug'),

                Tables\Columns\ImageColumn::make('company_image_url')
                    ->label('Hình Ảnh Công Ty'),

                Tables\Columns\ImageColumn::make('company_image_public_id')
                    ->label('ID Hình Ảnh Công Ty'),

                Tables\Columns\ImageColumn::make('company_cover_image_url')
                    ->label('Hình Ảnh Bìa Công Ty'),

                Tables\Columns\ImageColumn::make('company_cover_image_public_id')
                    ->label('ID Hình Ảnh Bìa Công Ty'),

                Tables\Columns\TextColumn::make('facebook_url')
                    ->searchable()
                    ->label('URL Facebook'),

                Tables\Columns\TextColumn::make('youtube_url')
                    ->searchable()
                    ->label('URL YouTube'),

                Tables\Columns\TextColumn::make('linkedin_url')
                    ->searchable()
                    ->label('URL LinkedIn'),

                Tables\Columns\TextColumn::make('company_email')
                    ->searchable()
                    ->label('Email Công Ty'),

                Tables\Columns\TextColumn::make('company_phone')
                    ->searchable()
                    ->label('Số Điện Thoại Công Ty'),

                Tables\Columns\TextColumn::make('website_url')
                    ->searchable()
                    ->label('URL Website'),

                Tables\Columns\TextColumn::make('tax_code')
                    ->searchable()
                    ->label('Mã Số Thuế'),

                Tables\Columns\TextColumn::make('since')
                    ->date()
                    ->sortable()
                    ->label('Thành Lập'),

                Tables\Columns\TextColumn::make('field_operation')
                    ->searchable()
                    ->label('Lĩnh Vực Hoạt Động'),

                Tables\Columns\TextColumn::make('employee_size')
                    ->numeric()
                    ->sortable()
                    ->label('Số Lượng Nhân Viên'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Tạo'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Cập Nhật'),
            ])
            ->filters([



                // Add more filters as needed...
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Chỉnh sửa'),
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Xóa'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa'),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
