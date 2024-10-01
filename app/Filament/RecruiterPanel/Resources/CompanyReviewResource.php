<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\CompanyReviewResource\Pages;
use App\Filament\RecruiterPanel\Resources\CompanyReviewResource\RelationManagers;
use App\Models\Company;
use App\Models\CompanyReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CompanyReviewResource extends Resource
{
    protected static ?string $model = CompanyReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section cho thông tin công ty
                Forms\Components\Section::make('Thông tin công ty')
                    ->description('Thông tin chi tiết về công ty')
                    ->schema([
                        Forms\Components\Select::make('company_id')
                            ->label('Công ty')
                            ->relationship('company', 'company_name')
                            ->required(),
                    ]),
                    
                // Section cho thông tin người dùng
                Forms\Components\Section::make('Thông tin người dùng')
                    ->description('Thông tin người dùng đánh giá')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Người dùng')
                            ->relationship('user', 'full_name')
                            ->required(),
                    ]),
    
                // Section cho nội dung đánh giá
                Forms\Components\Section::make('Nội dung đánh giá')
                    ->description('Chi tiết về đánh giá của bạn')
                    ->schema([
                        Forms\Components\Textarea::make('content')
                            ->label('Nội dung đánh giá')
                            ->required(),
                    ]),
    
                // Section cho đánh giá cụ thể
                Forms\Components\Section::make('Đánh giá cụ thể')
                    ->description('Đánh giá theo từng tiêu chí từ 1 đến 5 sao')
                    ->schema([
                        Forms\Components\TextInput::make('salary_benefit')
                            ->label('Lương thưởng & phúc lợi')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),
    
                        Forms\Components\TextInput::make('training_opportunity')
                            ->label('Đào tạo & học hỏi')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),
    
                        Forms\Components\TextInput::make('employee_care')
                            ->label('Sự quan tâm đến nhân viên')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),
    
                        Forms\Components\TextInput::make('company_culture')
                            ->label('Văn hoá công ty')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),
    
                        Forms\Components\TextInput::make('workplace_environment')
                            ->label('Văn phòng làm việc')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),
                    ]),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id') // Thêm ID đánh giá
                    ->label('ID Đánh giá')
                    ->sortable()
                    ->searchable()
                    ->hidden(), // Ẩn trường ID nếu không cần thiết
    
                Tables\Columns\TextColumn::make('company.company_name')->label('Công ty'),
                Tables\Columns\TextColumn::make('user.full_name')->label('Người dùng'),
                Tables\Columns\TextColumn::make('content')->label('Nội dung đánh giá'),
                Tables\Columns\TextColumn::make('salary_benefit')->label('Lương thưởng & phúc lợi'),
                Tables\Columns\TextColumn::make('training_opportunity')->label('Đào tạo & học hỏi'),
                Tables\Columns\TextColumn::make('employee_care')->label('Sự quan tâm đến nhân viên'),
                Tables\Columns\TextColumn::make('company_culture')->label('Văn hoá công ty'),
                Tables\Columns\TextColumn::make('workplace_environment')->label('Văn phòng làm việc'),
                Tables\Columns\TextColumn::make('created_at') 
                    ->label('Ngày Đánh giá')
                    ->dateTime(), // Đảm bảo kiểu dữ liệu chính xác
            ])
            ->filters([
                // Bạn có thể thêm các bộ lọc tại đây nếu cần
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user(); // Lấy người dùng hiện tại
    
        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return parent::getEloquentQuery()->whereRaw('1 = 0'); // Trả về truy vấn rỗng nếu không có người dùng
        }
    
        // Lấy danh sách ID công ty mà người dùng đã tạo
        $companyIds = Company::where('user_id', $user->id)->pluck('id');
    
        // Lấy các đánh giá của các công ty mà người dùng đã tạo
        return parent::getEloquentQuery()
            ->whereIn('company_id', $companyIds);
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
            'index' => Pages\ListCompanyReviews::route('/'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
  
    
}
