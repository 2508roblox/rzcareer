<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\JobPostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JobPostResource\RelationManagers;
use Filament\Tables\Filters\SelectFilter;
use App\Models\User;
use App\Models\CommonCity;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\CommonCareer;
use App\Models\CommonDistrict;
use App\Models\CommonLocation;

class JobPostResource extends Resource
{
    protected static ?string $model = JobPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Công ty & Công việc';

    public static function getPluralModelLabel(): string
    {
        return 'Công việc';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cơ bản')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('career_id')
                                    ->required()
                                    ->relationship('career', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->label('Ngành nghề'),

                                Forms\Components\Select::make('company_id')
                                    ->required()
                                    ->relationship('company', 'company_name')
                                    ->preload()
                                    ->searchable()
                                    ->label('Công ty'),

                                Forms\Components\Select::make('district_id')
                                    ->required()
                                    ->options(CommonDistrict::all()->pluck('name', 'id'))
                                    ->label('Quận/Huyện')
                                    ->preload()
                                    ->searchable()
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
                                    ->label('Thành phố')
                                    ->preload()
                                    ->searchable()
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
                                    ->label('Địa điểm'),

                                Forms\Components\TextInput::make('lat')
                                    ->label('Vĩ độ')
                                    ->live(255)
                                    ->disabled(fn(Component $component) => $component->getState('location_id') != null),

                                Forms\Components\TextInput::make('lng')
                                    ->label('Kinh độ')
                                    ->live(255)
                                    ->disabled(fn(Component $component) => $component->getState('location_id') != null),

                                Forms\Components\Select::make('user_id')
                                    ->required()
                                    ->relationship('user', 'full_name')
                                    ->preload()
                                    ->searchable()
                                    ->label('Người dùng'),
                            ]),
                    ]),

                // Group: Job Details
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
                                    ->label('Slug'),

                                Forms\Components\DatePicker::make('deadline')
                                    ->required()
                                    ->label('Ngày hết hạn công việc'),

                                Forms\Components\TextInput::make('quantity')
                                    ->required()
                                    ->numeric()
                                    ->label('Số lượng'),

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
                                    ->label('Giới tính yêu cầu'),

                                Forms\Components\RichEditor::make('job_description')
                                    ->required()
                                    ->columnSpanFull()
                                    ->label('Mô tả công việc'),

                                Forms\Components\RichEditor::make('job_requirement')
                                    ->required()
                                    ->columnSpanFull()
                                    ->label('Yêu cầu công việc'),

                                Forms\Components\RichEditor::make('benefits_enjoyed')
                                    ->required()
                                    ->columnSpanFull()
                                    ->label('Quyền lợi'),
                            ]),
                    ]),

                // Group: Job Specifications
                Forms\Components\Section::make('Thông số công việc')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('position')
                                    ->required()
                                    ->preload()
                                    ->options([
                                        'Manager' => 'Quản lý',
                                        'Developer' => 'Lập trình viên',
                                        'Designer' => 'Thiết kế',
                                        'Analyst' => 'Phân tích',
                                        'Support' => 'Hỗ trợ',
                                    ])
                                    ->placeholder('Chọn vị trí')
                                    ->label('Vị trí')
                                    ->helperText('Chọn vị trí công việc cho vai trò này.')
                                    ->default('Developer')
                                    ->disablePlaceholderSelection()
                                    ->native(false)
                                    ->columnSpan(1),

                                Forms\Components\Select::make('type_of_workplace')
                                    ->required()
                                    ->preload()
                                    ->options([
                                        'Office' => 'Văn phòng',
                                        'Remote' => 'Từ xa',
                                        'Hybrid' => 'Hỗn hợp',
                                        'Field' => 'Thực địa',
                                        'On-site' => 'Tại chỗ',
                                    ])
                                    ->placeholder('Chọn loại nơi làm việc')
                                    ->label('Loại nơi làm việc')
                                    ->helperText('Chọn nơi làm việc cho công việc này.')
                                    ->default('Remote')
                                    ->native(false)
                                    ->disablePlaceholderSelection()
                                    ->columnSpan(1),

                                Forms\Components\Select::make('experience')
                                    ->required()
                                    ->preload()
                                    ->native(false)
                                    ->options([
                                        '0-1 years' => '0-1 năm',
                                        '2-3 years' => '2-3 năm',
                                        '4-5 years' => '4-5 năm',
                                        '6-10 years' => '6-10 năm',
                                        '10+ years' => '10+ năm',
                                    ])
                                    ->placeholder('Chọn cấp độ kinh nghiệm')
                                    ->label('Kinh nghiệm')
                                    ->helperText('Chỉ định cấp độ kinh nghiệm yêu cầu.'),

                                Forms\Components\Select::make('academic_level')
                                    ->required()
                                    ->preload()
                                    ->options([
                                        'High School' => 'Trung học phổ thông',
                                        'Associate Degree' => 'Bằng cao đẳng',
                                        'Bachelor\'s Degree' => 'Bằng cử nhân',
                                        'Master\'s Degree' => 'Bằng thạc sĩ',
                                        'Doctorate' => 'Tiến sĩ',
                                    ])
                                    ->placeholder('Chọn trình độ học vấn')
                                    ->label('Trình độ học vấn')
                                    ->helperText('Chỉ ra trình độ học vấn cần thiết.')
                                    ->default('Bằng cử nhân')
                                    ->native(false)
                                    ->disablePlaceholderSelection()
                                    ->columnSpan(1),

                                Forms\Components\Select::make('job_type')
                                    ->required()
                                    ->preload()
                                    ->options([
                                        'Full-time' => 'Toàn thời gian',
                                        'Part-time' => 'Bán thời gian',
                                        'Contract' => 'Hợp đồng',
                                        'Temporary' => 'Thời vụ',
                                        'Internship' => 'Thực tập',
                                        'Freelance' => 'Tự do',
                                    ])
                                    ->placeholder('Chọn loại công việc')
                                    ->label('Loại công việc')
                                    ->helperText('Chọn loại hình việc làm.')
                                    ->default('Toàn thời gian')
                                    ->native(false)
                                    ->disablePlaceholderSelection()
                                    ->columnSpan(1),

                                Forms\Components\TextInput::make('salary_min')
                                    ->required()
                                    ->numeric()
                                    ->label('Mức lương tối thiểu')
                                    ->placeholder('Nhập mức lương tối thiểu')
                                    ->helperText('Chỉ ra mức lương tối thiểu cho vị trí.')
                                    ->hint('Số tiền lương tối thiểu.')
                                    ->prefix('$') // Thêm ký hiệu tiền tệ hoặc bất kỳ tiền tố nào
                                    ->suffix('mỗi năm') // Thêm hậu tố nếu cần
                                    ->columnSpan(1),

                                Forms\Components\TextInput::make('salary_max')
                                    ->required()
                                    ->numeric()
                                    ->label('Mức lương tối đa')
                                    ->placeholder('Nhập mức lương tối đa')
                                    ->helperText('Chỉ ra mức lương tối đa cho vị trí.')
                                    ->hint('Số tiền lương tối đa.')
                                    ->prefix('$') // Thêm ký hiệu tiền tệ hoặc bất kỳ tiền tố nào
                                    ->suffix('mỗi năm') // Thêm hậu tố nếu cần
                                    ->columnSpan(1),

                                Forms\Components\Select::make('salary_type')
                                    ->required()
                                    ->label('Loại lương')
                                    ->options([
                                        'hourly' => 'Theo giờ',
                                        'monthly' => 'Theo tháng',
                                        'weekly' => 'Theo tuần',
                                    ])
                                    ->placeholder('Chọn loại lương')
                                    ->default('monthly')
                                    ->helperText('Chọn cách tính lương')
                                    ->preload()
                                    ->native(false)
                                    ->disablePlaceholderSelection()
                                    ->columnSpan(1),

                                Forms\Components\Section::make('Hiển thị và Liên hệ')
                                    ->schema([
                                        Forms\Components\Grid::make(2)
                                            ->schema([
                                                Forms\Components\Toggle::make('is_hot')
                                                    ->label('Nổi bật')
                                                    ->required()
                                                    ->default(false)
                                                    ->onIcon('heroicon-o-fire')
                                                    ->offIcon('heroicon-s-fire'),

                                                Forms\Components\Toggle::make('is_urgent')
                                                    ->label('Khẩn cấp')
                                                    ->required()
                                                    ->default(false)
                                                    ->onIcon('heroicon-o-exclamation-circle')
                                                    ->offIcon('heroicon-o-exclamation-circle'),

                                                Forms\Components\TextInput::make('contact_person_name')
                                                    ->label('Tên Người Liên Hệ')
                                                    ->required()
                                                    ->maxLength(100)
                                                    ->prefix('👤')
                                                    ->placeholder('Nhập tên người liên hệ')
                                                    ->helperText('Họ và tên của người liên hệ'),

                                                Forms\Components\TextInput::make('contact_person_phone')
                                                    ->label('Số Điện Thoại Người Liên Hệ')
                                                    ->required()
                                                    ->tel()
                                                    ->maxLength(15)
                                                    ->prefix('📞')
                                                    ->placeholder('Nhập số điện thoại của người liên hệ')
                                                    ->helperText('Số điện thoại của người liên hệ'),

                                                Forms\Components\TextInput::make('contact_person_email')
                                                    ->label('Email Người Liên Hệ')
                                                    ->required()
                                                    ->email()
                                                    ->maxLength(100)
                                                    ->prefix('✉️')
                                                    ->placeholder('Nhập địa chỉ email của người liên hệ')
                                                    ->helperText('Địa chỉ email của người liên hệ'),

                                                Forms\Components\Select::make('status')
                                                    ->label('Trạng thái')
                                                    ->required()
                                                    ->preload()
                                                    ->searchable()
                                                    ->options([
                                                        0 => 'Đang chờ xem xét',
                                                        1 => 'Được chấp thuận',
                                                        2 => 'Bị từ chối',
                                                        3 => 'Đã đăng',
                                                        4 => 'Đã đóng',
                                                        5 => 'Đã hết hạn',
                                                        6 => 'Đang xem xét',
                                                        7 => 'Đang phỏng vấn',
                                                        8 => 'Đã thuê',
                                                        9 => 'Đã lưu trữ',
                                                        10 => 'Đã hủy',
                                                        11 => 'Đang tạm dừng',
                                                        12 => 'Đã lấp đầy',
                                                        13 => 'Nháp',
                                                        14 => 'Đã mở lại',
                                                    ])
                                                    ->default(0)
                                                    ->placeholder('Chọn trạng thái')
                                                    ->label('Trạng thái'),
                                            ]),
                                    ]),

                            ])
                    ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->label('ID'),
                Tables\Columns\TextColumn::make('career.name')
                    ->numeric()
                    ->sortable()
                    ->label('Ngành nghề'),

                Tables\Columns\TextColumn::make('company_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã Công Ty'),

                Tables\Columns\TextColumn::make('location_id')
                    ->numeric()
                     ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ->label('Mã Địa Điểm'),

                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                     ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ->label('Mã Người Dùng'),

                Tables\Columns\TextColumn::make('job_name')
                    ->searchable()
                    ->label('Tên Công Việc'),

                Tables\Columns\TextColumn::make('slug')
                ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable()
                    ->label('Slug'),

                Tables\Columns\TextColumn::make('deadline')
                    ->date()
                    ->sortable()
                    ->label('Hạn Chót')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y')),

                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable()
                    ->label('Số Lượng'),

                Tables\Columns\TextColumn::make('gender_required')
                    ->searchable()
                    ->label('Giới Tính Cần Thiết')
                    ->formatStateUsing(fn($state) => match ($state) {
                        0 => 'Không',
                        1 => 'Nam',
                        2 => 'Nữ',
                        default => 'Không yêu cầu',
                    }),

                Tables\Columns\TextColumn::make('position')
                    ->searchable()
                    ->label('Chức Vụ'),

                Tables\Columns\TextColumn::make('type_of_workplace')
                    ->searchable()
                    ->label('Loại Nơi Làm Việc'),

                Tables\Columns\TextColumn::make('experience')
                    ->searchable()
                    ->label('Kinh Nghiệm'),

                Tables\Columns\TextColumn::make('academic_level')
                    ->searchable()
                    ->label('Trình Độ Học Vấn'),

                Tables\Columns\TextColumn::make('job_type')
                    ->searchable()
                    ->label('Loại Công Việc'),

                Tables\Columns\TextColumn::make('salary_min')
                    ->numeric()
                    ->sortable()
                    ->label('Mức Lương Tối Thiểu'),

                Tables\Columns\TextColumn::make('salary_max')
                    ->numeric()
                    ->sortable()
                    ->label('Mức Lương Tối Đa'),

                Tables\Columns\TextColumn::make('salary_type')
                    ->label('Loại Lương'),



                    BadgeColumn::make('is_hot')
                        ->sortable()
                        ->label('Nổi Bật')
                        ->color(fn($state) => $state ? 'success' : 'danger') // Màu sắc tùy theo giá trị
                        ->formatStateUsing(fn($state) => $state ? 'Có' : 'Không'),

                    BadgeColumn::make('is_urgent')
                        ->sortable()
                        ->label('Khẩn Cấp')
                        ->color(fn($state) => $state ? 'success' : 'danger') // Màu sắc tùy theo giá trị
                        ->formatStateUsing(fn($state) => $state ? 'Có' : 'Không'),


                Tables\Columns\TextColumn::make('contact_person_name')
                    ->searchable()
                    ->label('Tên Người Liên Hệ'),

                Tables\Columns\TextColumn::make('contact_person_phone')
                    ->searchable()
                    ->label('Số Điện Thoại Người Liên Hệ'),

                Tables\Columns\TextColumn::make('contact_person_email')
                    ->searchable()
                    ->label('Email Người Liên Hệ'),

                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->label('Lượt Xem'),

                Tables\Columns\TextColumn::make('shares')
                    ->numeric()
                    ->sortable()
                    ->label('Lượt Chia Sẻ'),

                    Tables\Columns\SelectColumn::make('status')
                    ->label('Trạng Thái')
                    ->sortable()
                    ->options([
                        0 => 'Đang chờ xem xét',
                        1 => 'Được chấp thuận',
                        2 => 'Bị từ chối',
                        3 => 'Đã đăng',
                        4 => 'Đã đóng',
                        5 => 'Đã hết hạn',
                        6 => 'Đang xem xét',
                        7 => 'Đang phỏng vấn',
                        8 => 'Đã thuê',
                        9 => 'Đã lưu trữ',
                        10 => 'Đã hủy',
                        11 => 'Đang tạm dừng',
                        12 => 'Đã lấp đầy',
                        13 => 'Nháp',
                        14 => 'Đã mở lại',
                    ])
                    ->searchable() // Nếu muốn cho phép tìm kiếm
                    ->extraAttributes(['style' => 'width: 250px;'])
                    ->default(0) // Giá trị mặc định nếu cần
                     ,// Thêm quy tắc kiểm tra khi cập nhật

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Tạo')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y H:i')),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Cập Nhật')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y H:i')),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()->label('Chỉnh sửa'),
                    Tables\Actions\ViewAction::make()->label('Xem'),
                    Tables\Actions\DeleteAction::make()->label('Xóa'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Xóa'),
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
}
