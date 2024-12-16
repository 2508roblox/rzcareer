<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommonCareerResource\Pages;
use App\Filament\Resources\CommonCareerResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\CommonCareer;

class CommonCareerResource extends Resource
{
    protected static ?int $navigationSort = 3;


    protected static ?string $model = CommonCareer::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Dữ liệu chung';
    public static function getPluralModelLabel(): string
    {
        return 'Nghề nghiệp chung'; // Nhãn số nhiều cho mô hình
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin chính')
                    ->description('Điền các thông tin liên quan đến ứng dụng')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên công việc')
                            ->required()
                            ->maxLength(150)
                            ->placeholder('Nhập tên công việc'),

                            Forms\Components\FileUpload::make('icon_url')
                            ->label('Tải lên hình ảnh')
                            ->required()
                            ->maxSize(10240) // Kích thước tối đa cho phép là 10MB
                            ->placeholder('Chọn file hình ảnh') // Văn bản gợi ý
                            ->image() // Chỉ cho phép tải lên hình ảnh
                            ->disk('public')
                            ->directory('icons') // Thư mục icons
                            ->preserveFilenames() // Giữ nguyên tên file gốc
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('app_icon_name')
                            ->label('Tên hình ảnh')
                            ->maxLength(50)
                            ->placeholder('Nhập tên hình ảnh'),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên nghề nghiệp')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('icon_url')
                    ->label('Hình ảnh')
                    ->searchable(),
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
            'index' => Pages\ListCommonCareers::route('/'),
            'create' => Pages\CreateCommonCareer::route('/create'),
            'edit' => Pages\EditCommonCareer::route('/{record}/edit'),
        ];
    }
}
