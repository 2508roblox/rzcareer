<?php

namespace App\Filament\RecruiterPanel\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\JobPost;
use Filament\Forms\Form;
use App\Models\CommonCity;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\CommonDistrict;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\RecruiterPanel\Resources\JobPostResource\Pages;
use App\Filament\RecruiterPanel\Resources\JobPostResource\RelationManagers;
use App\Filament\RecruiterPanel\Resources\JobPostResource\Pages\EditJobPost;
use App\Filament\RecruiterPanel\Resources\JobPostResource\Pages\ListJobPosts;
use App\Filament\RecruiterPanel\Resources\JobPostResource\Pages\CreateJobPost;
use App\Models\CommonLocation;
use App\Models\Company;
use Filament\Forms\Components\Component;
use Filament\Forms\Get;
use Illuminate\Support\Facades\Auth;

class JobPostResource extends Resource
{
    protected static ?string $model = JobPost::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Quản lý công ty';

    public static function getPluralModelLabel(): string
    {
        return 'Bài tuyển dụng'; // Trả về tên số nhiều cho mô hình Company
    }

    public static function form(Form $form): Form
    {


        return $form
        ->schema([
            // Nhóm: Thông tin cơ bản
            Forms\Components\Section::make('Thông tin cơ bản')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Select::make('career_id')
                                ->required()
                                ->relationship('career', 'name')
                                ->preload()
                                ->searchable()
                                ->label('Nghề nghiệp'),

                            Forms\Components\Select::make('district_id')
                                ->required()
                                ->options(CommonDistrict::all()->pluck('name', 'id'))
                                ->label('Quận/Huyện')
                                ->preload()
                                ->searchable()
                                ->reactive()
                                ->live(100)
                                ->default(null)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('location_id', null);

                                    if ($state && $get('city_id')) {
                                        $location = static::updateLocation($get);
                                        if ($location) {
                                            $set('location_id', $location->id);
                                            $set('lat', $location->lat);
                                            $set('lng', $location->lng);
                                        } else {
                                            $set('lat', '');
                                            $set('lng', '');
                                        }
                                    }
                                }),

                            Forms\Components\Select::make('city_id')
                                ->required()
                                ->options(CommonCity::all()->pluck('name', 'id'))
                                ->label('Tỉnh/Thành phố')
                                ->preload()
                                ->searchable()
                                ->reactive()
                                ->live(100)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('location_id', null);

                                    if ($state) {
                                        $location = static::updateLocation($get);
                                        if ($location) {
                                            $set('location_id', $location->id);
                                            $set('lat', $location->lat);
                                            $set('lng', $location->lng);
                                        } else {
                                            $set('lat', '');
                                            $set('lng', '');
                                        }
                                    }
                                }),

                            Forms\Components\TextInput::make('location_id')
                                ->disabled()
                                ->dehydrated()
                                ->label('Vị trí'),

                            Forms\Components\TextInput::make('lat')
                                ->label('Vĩ độ')
                                ->live(255)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $location = static::createNewLocation($get);
                                    if ($location) {
                                        $set('location_id', $location->id);
                                    }
                                })
                                ->disabled(fn(Component $component) => $component->getState('location_id') != null)
                                ->hint('Nhập vĩ độ của địa điểm'),

                            Forms\Components\TextInput::make('lng')
                                ->label('Kinh độ')
                                ->live(255)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $location = static::createNewLocation($get);
                                    if ($location) {
                                        $set('location_id', $location->id);
                                    }
                                })
                                ->disabled(fn(Component $component) => $component->getState('location_id') != null)
                                ->hint('Nhập kinh độ của địa điểm'),
                        ]),
                ]),

            // Nhóm: Chi tiết công việc
            Forms\Components\Section::make('Chi tiết công việc')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('job_name')
                                ->required()
                                ->maxLength(255)
                                ->live(255)
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $slug = \Illuminate\Support\Str::slug($state);
                                    $set('slug', $slug);
                                })
                                ->label('Tên công việc'),

                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(300)
                                ->disabled()
                                ->dehydrated()
                                ->unique(JobPost::class, 'slug', ignoreRecord: true)
                                ->label('Đường dẫn'),

                            Forms\Components\DatePicker::make('deadline')
                                ->required()
                                ->label('Hạn nộp hồ sơ'),

                            Forms\Components\TextInput::make('quantity')
                                ->required()
                                ->numeric()
                                ->label('Số lượng tuyển'),

                            Forms\Components\Select::make('gender_required')
                                ->required()
                                ->searchable()
                                ->prefixIcon('heroicon-o-user')
                                ->options([
                                    0 => 'Không yêu cầu',
                                    1 => 'Nam',
                                    2 => 'Nữ',
                                ])
                                ->default(0)
                                ->placeholder('Chọn giới tính')
                                ->label('Yêu cầu giới tính'),

                            Forms\Components\RichEditor::make('job_description')
                                ->required()
                                ->columnSpanFull()
                                ->label('Mô tả công việc'),

                            Forms\Components\MarkdownEditor::make('job_requirement')
                                ->required()
                                ->columnSpanFull()
                                ->label('Yêu cầu công việc'),

                            Forms\Components\MarkdownEditor::make('benefits_enjoyed')
                                ->required()
                                ->columnSpanFull()
                                ->label('Quyền lợi được hưởng'),
                        ]),
                ]),

            // Nhóm: Thông số công việc
            Forms\Components\Section::make('Thông số công việc')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Select::make('position')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    'Manager' => 'Quản lý',
                                    'Developer' => 'Lập trình viên',
                                    'Designer' => 'Thiết kế',
                                    'Analyst' => 'Phân tích',
                                    'Support' => 'Hỗ trợ',
                                ])
                                ->placeholder('Chọn vị trí')
                                ->label('Vị trí')
                                ->helperText('Chọn vị trí công việc phù hợp')
                                ->hint('Vị trí trong công ty')
                                ->default('Developer')
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\Select::make('type_of_workplace')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    'Office' => 'Văn phòng',
                                    'Remote' => 'Từ xa',
                                    'Hybrid' => 'Kết hợp',
                                    'Field' => 'Thực địa',
                                    'On-site' => 'Tại chỗ',
                                ])
                                ->placeholder('Chọn nơi làm việc')
                                ->label('Loại hình làm việc')
                                ->helperText('Chọn loại hình làm việc phù hợp')
                                ->hint('Môi trường làm việc')
                                ->default('Remote')
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\Select::make('experience')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    '0-1 years' => '0-1 năm',
                                    '2-3 years' => '2-3 năm',
                                    '4-5 years' => '4-5 năm',
                                    '6-10 years' => '6-10 năm',
                                    '10+ years' => 'Trên 10 năm',
                                ])
                                ->placeholder('Chọn kinh nghiệm')
                                ->label('Kinh nghiệm')
                                ->helperText('Chọn mức kinh nghiệm yêu cầu')
                                ->hint('Số năm kinh nghiệm')
                                ->default('2-3 years')
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\Select::make('academic_level')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    'High School' => 'THPT',
                                    'Associate Degree' => 'Cao đẳng',
                                    'Bachelor\'s Degree' => 'Đại học',
                                    'Master\'s Degree' => 'Thạc sĩ',
                                    'Doctorate' => 'Tiến sĩ',
                                ])
                                ->placeholder('Chọn trình độ học vấn')
                                ->label('Trình độ học vấn')
                                ->helperText('Chọn trình độ học vấn yêu cầu')
                                ->hint('Bằng cấp yêu cầu')
                                ->default('Bachelor\'s Degree')
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\Select::make('job_type')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->options([
                                    'Full-time' => 'Toàn thời gian',
                                    'Part-time' => 'Bán thời gian',
                                    'Contract' => 'Hợp đồng',
                                    'Temporary' => 'Tạm thời',
                                    'Internship' => 'Thực tập',
                                    'Freelance' => 'Tự do',
                                ])
                                ->placeholder('Chọn loại hình công việc')
                                ->label('Loại hình công việc')
                                ->helperText('Chọn loại hình công việc phù hợp')
                                ->hint('Hình thức làm việc')
                                ->default('Full-time')
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('salary_min')
                                ->required()
                                ->numeric()
                                ->label('Lương tối thiểu')
                                ->placeholder('Nhập lương tối thiểu')
                                ->helperText('Mức lương khởi điểm')
                                ->hint('VNĐ/tháng')
                                ->prefix('₫')
                                ->suffix('VNĐ')
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('salary_max')
                                ->required()
                                ->numeric()
                                ->label('Lương tối đa')
                                ->placeholder('Nhập lương tối đa')
                                ->helperText('Mức lương cao nhất')
                                ->hint('VNĐ/tháng')
                                ->prefix('₫')
                                ->suffix('VNĐ')
                                ->columnSpan(1),

                            Forms\Components\Select::make('salary_type')
                                ->required()
                                ->label('Loại lương')
                                ->options([
                                    'hourly' => 'Theo giờ',
                                    'monthly' => 'Theo tháng',
                                    'weekly' => 'Theo tuần',
                                ])
                                ->searchable()
                                ->placeholder('Chọn loại lương')
                                ->default('monthly')
                                ->helperText('Chọn cách tính lương')
                                ->hint('Hình thức trả lương')
                                ->preload()
                                ->reactive()
                                ->disablePlaceholderSelection()
                                ->columnSpan(1),
                        ]),
                ]),

            // Nhóm: Hiển thị và Liên hệ
            Forms\Components\Section::make('Hiển thị và Liên hệ')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\Toggle::make('is_hot')
                                ->label('Tin nổi bật')
                                ->required()
                                ->default(false)
                                ->onIcon('heroicon-o-fire')
                                ->offIcon('heroicon-s-fire'),

                            Forms\Components\Toggle::make('is_urgent')
                                ->label('Tuyển gấp')
                                ->required()
                                ->default(false)
                                ->onIcon('heroicon-o-exclamation-circle')
                                ->offIcon('heroicon-o-exclamation-circle'),

                            Forms\Components\TextInput::make('contact_person_name')
                                ->required()
                                ->maxLength(100)
                                ->prefix('👤')
                                ->placeholder('Nhập tên người liên hệ')
                                ->helperText('Tên người phụ trách tuyển dụng')
                                ->label('Tên người liên hệ'),

                            Forms\Components\TextInput::make('contact_person_phone')
                                ->required()
                                ->tel()
                                ->maxLength(15)
                                ->prefix('📞')
                                ->placeholder('Nhập số điện thoại liên hệ')
                                ->helperText('Số điện thoại để ứng viên liên hệ')
                                ->label('Số điện thoại liên hệ'),

                            Forms\Components\TextInput::make('contact_person_email')
                                ->required()
                                ->email()
                                ->maxLength(100)
                                ->prefix('✉️')
                                ->placeholder('Nhập email liên hệ')
                                ->helperText('Email để ứng viên liên hệ')
                                ->label('Email liên hệ'),

                            Forms\Components\Select::make('status')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->disabled()
                                ->dehydrated()
                                ->default(0)
                                ->afterStateHydrated(function ($set, $state) {
                                    if ($state === null) {
                                        $set('status', 0);
                                    }
                                })
                                ->options([
                                    0 => 'Chờ duyệt',
                                    1 => 'Đã duyệt',
                                    2 => 'Từ chối',
                                    3 => 'Đã đăng',
                                    4 => 'Đã đóng',
                                    5 => 'Hết hạn',
                                    6 => 'Đang xem xét',
                                    7 => 'Đang phỏng vấn',
                                    8 => 'Đã tuyển',
                                    9 => 'Đã lưu trữ',
                                    10 => 'Đã hủy',
                                    11 => 'Tạm hoãn',
                                    12 => 'Đã tuyển đủ',
                                    13 => 'Bản nháp',
                                    14 => 'Mở lại',
                                ])
                                ->default(0)
                                ->placeholder('Chọn trạng thái')
                                ->label('Trạng thái'),
                        ]),
                ]),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
                ->label('ID') // Thêm tiêu đề tiếng Việt
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('career.name')
                ->label('Nghề nghiệp')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('location.address')
                ->label('Địa điểm')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('job_name')
                ->label('Tên Công việc')
                ->searchable(),
            Tables\Columns\TextColumn::make('slug')
                ->label('Slug')
                ->searchable(),
            Tables\Columns\TextColumn::make('deadline')
                ->label('Hạn cuối')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('quantity')
                ->label('Số lượng')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('gender_required')
                ->label('Giới tính yêu cầu')
                ->searchable(),
            Tables\Columns\TextColumn::make('position')
                ->label('Vị trí')
                ->searchable(),
            Tables\Columns\TextColumn::make('type_of_workplace')
                ->label('Loại nơi làm việc')
                ->searchable(),
            Tables\Columns\TextColumn::make('experience')
                ->label('Kinh nghiệm')
                ->searchable(),
            Tables\Columns\TextColumn::make('academic_level')
                ->label('Trình độ học vấn')
                ->searchable(),
            Tables\Columns\TextColumn::make('job_type')
                ->label('Loại công việc')
                ->searchable(),
            Tables\Columns\TextColumn::make('salary_min')
                ->label('Mức lương tối thiểu')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('salary_max')
                ->label('Mức lương tối đa')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('salary_type')
                ->label('Loại lương'),
            Tables\Columns\TextColumn::make('is_hot')
                ->label('Nổi bật')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('is_urgent')
                ->label('Khẩn cấp')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('contact_person_name')
                ->label('Tên người liên hệ')
                ->searchable(),
            Tables\Columns\TextColumn::make('contact_person_phone')
                ->label('Số điện thoại người liên hệ')
                ->searchable(),
            Tables\Columns\TextColumn::make('contact_person_email')
                ->label('Email người liên hệ')
                ->searchable(),
            Tables\Columns\TextColumn::make('views')
                ->label('Số lượt xem')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('shares')
                ->label('Số lượt chia sẻ')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('status')
                ->label('Trạng thái')
                ->numeric()
                ->sortable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobPosts::route('/'),
            'create' => Pages\CreateJobPost::route('/create'),
            'edit' => Pages\EditJobPost::route('/{record}/edit'),
        ];
    }
    protected static function updateLocation(Get $get)
    {
        $districtId = $get('district_id');
        $cityId = $get('city_id');
        if ($districtId && $cityId) {
            $location = CommonLocation::where('district_id', $districtId)
                ->where('city_id', $cityId)
                ->first();

            return $location;
        }

        return null;
    }
    protected static function createNewLocation(Get $get)
    {
        $lat = $get('lat');
        $lng = $get('lng');
        $city_id = $get('city_id');
        $district_id = $get('district_id');
        if ($lat && $lng && $city_id && $district_id) {
            return CommonLocation::create([
                'address' => "{$district_id}, {$city_id}", // Customize this as needed
                'lat' => $lat,
                'lng' => $lng,
                'district_id' => $district_id,
                'city_id' => $city_id,
            ]);
        }

        return null;
    }
    public static function getNavigationBadge(): ?string
    {
        $user = Auth::user(); // Get the currently authenticated user
        $companyIds = Company::where('user_id', $user->id)->pluck('id');

        // Return the count based on the filtered query
        return static::getModel()::whereIn('company_id', $companyIds)->count();
    }

    public static function getEloquentQuery(): Builder
{
    $user = Auth::user(); // Lấy người dùng hiện tại
    $companyIds = Company::where('user_id', $user->id)->pluck('id');

    return parent::getEloquentQuery()
        ->whereIn('company_id', $companyIds);
}

}
