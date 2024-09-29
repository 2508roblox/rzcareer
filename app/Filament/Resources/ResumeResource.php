<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Resume;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ResumeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\ResumeResource\RelationManagers;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Set;
use Joaopaulolndev\FilamentPdfViewer\Forms\Components\PdfViewerField;
use Joaopaulolndev\FilamentPdfViewer\Infolists\Components\PdfViewerEntry;

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'Sơ yếu lý lịch & Mục đã lưu';
    public static function getPluralModelLabel(): string
    {
        return 'Sơ yếu lý lịch'; // Trả về tên số nhiều cho mô hình Company
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Section::make('Thông tin Người tìm kiếm và Người dùng')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('user_id')
                                            ->label('ID Người dùng')
                                            ->disabled()
                                            ->dehydrated(),

                                        Select::make('seeker_profile_id')
                                            ->label('Hồ sơ Người tìm kiếm')
                                            ->required()
                                            ->preload()
                                            ->live()
                                            ->relationship('seekerProfile', 'id')
                                            ->searchable()
                                            ->afterStateUpdated(function ($state, Set $set) {
                                                $seekerProfile = \App\Models\SeekerProfile::find($state);
                                                if ($seekerProfile) {
                                                    $set('user_id', $seekerProfile->user_id);
                                                    $user = \App\Models\User::find($seekerProfile->user_id);
                                                    $set('user_name', $user->full_name);
                                                } else {
                                                    $set('user_id', null);
                                                    $set('user_name', null);
                                                }
                                            }),
                                        TextInput::make('user_name')
                                            ->label('Tên Người dùng')
                                            ->live()
                                            ->disabled()
                                            ->dehydrated(false),
                                    ]),
                            ]),
                        Section::make('Địa điểm và Nghề nghiệp')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Select::make('city_id')
                                            ->label('Thành phố')
                                            ->required()
                                            ->preload()
                                            ->relationship('city', 'name')
                                            ->searchable(),
                                        Select::make('career_id')
                                            ->label('Nghề nghiệp')
                                            ->required()
                                            ->preload()
                                            ->relationship('career', 'name')
                                            ->searchable(),
                                    ]),
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(200)
                                    ->live(255)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $slug = \Illuminate\Support\Str::slug($state);
                                        $set('slug', $slug);
                                    })
                                    ->columnSpan(2),
                                TextInput::make('slug')
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->maxLength(255),
                            ]),
                    ]),

                // Group for Job Details
                Section::make('Chi tiết Công việc')
                    ->schema([
                        Textarea::make('description')
                            ->required()
                            ->label('Mô tả')
                            ->columnSpanFull(),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('salary_min')
                                    ->required()
                                    ->numeric()
                                    ->label('Mức lương tối thiểu'),
                                TextInput::make('position')
                                    ->required()
                                    ->maxLength(50)
                                    ->label('Vị trí'),
                                TextInput::make('experience')
                                    ->required()
                                    ->maxLength(50)
                                    ->label('Kinh nghiệm'),
                                TextInput::make('academic_level')
                                    ->required()
                                    ->maxLength(50)
                                    ->label('Trình độ học vấn'),
                                TextInput::make('type_of_workplace')
                                    ->required()
                                    ->maxLength(50)
                                    ->label('Loại nơi làm việc'),
                                TextInput::make('job_type')
                                    ->required()
                                    ->maxLength(50)
                                    ->label('Loại công việc'),
                            ]),
                        TextInput::make('is_active')
                            ->required()
                            ->numeric()
                            ->default(1)
                            ->label('Trạng thái Hoạt động'),
                    ])
                    ->columnSpanFull(),

                // Group for Media Uploads
                Section::make('Tải lên phương tiện')
                    ->schema([
                        FileUpload::make('image_url')
                            ->image()
                            ->label('Hình ảnh Hồ sơ'),
                        PdfViewerField::make('file_url')
                            ->label('Xem PDF')
                            ->minHeight('40svh'),
                        FileUpload::make('file_url')
                            ->label('Tải lên PDF')
                            ->acceptedFileTypes(['application/pdf']) // Restrict to PDF files only
                            ->maxSize(5024) // Set maximum file size in KB (optional)
                            ->preserveFilenames() // Preserve the original filename if needed
                            ->directory('resumes') // Optional: Define a directory where the files will be stored
                            ->storeFileNamesIn('file_url') // Store the file path in the 'file_url' field
                            ->required() // Make it required if necessary
                            ->columnSpanFull(),

                        TextInput::make('public_id')
                            ->maxLength(255)
                            ->default(null)
                            ->label('ID Công khai'),
                    ])
                    ->columnSpanFull(),
                // Group for Advanced Skills
                Repeater::make('advancedSkills') // Tên trường cho kỹ năng nâng cao
                ->relationship('advancedSkills') // Đảm bảo mối quan hệ này đã được định nghĩa trong model
                ->schema([
                    Grid::make(2)->schema([ // Create a Grid with 2 columns
                        TextInput::make('name')
                            ->required()
                            ->label('Tên Kỹ năng Nâng cao')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('level')
                            ->required()
                            ->numeric(1)
                            ->label('Số năm kinh nghiệm') // Tên trường đã được điều chỉnh
                            ->placeholder('Nhập số năm kinh nghiệm') // Placeholder để hướng dẫn người dùng
                            ->columnSpan(1), // Span 1 column
                    ]),
                ])
                ->label('Kỹ năng Nâng cao')
                ->columnSpanFull(),
            

                // Group for Resume Type
                Section::make('Loại Hồ sơ')
                    ->schema([
                        Select::make('type')
                            ->label('Loại Hồ sơ')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->options([
                                'primary' => 'Chính',   // Option for the primary resume
                                'secondary' => 'Phụ', // Option for the secondary resume
                            ])
                            ->default('primary') // Set a default value if needed
                            ->placeholder('Chọn Loại Hồ sơ') // Optional: Add a placeholder text
                            ->columnSpanFull(),
                    ]),

                // Group for Education Details
                Repeater::make('educationDetails')
                ->relationship('educationDetails')
                ->schema([
                    Grid::make(2)->schema([ // Create a Grid with 2 columns
                        TextInput::make('training_place')
                            ->required()
                            ->label('Tên Tổ chức')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('degree_name')
                            ->required()
                            ->label('Bằng cấp')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('major')
                            ->required()
                            ->label('Ngành học')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('start_date')
                            ->required()
                            ->label('Ngày bắt đầu')
                            ->type('date')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('completed_date')
                            ->label('Ngày hoàn thành')
                            ->type('date')
                            ->columnSpan(1), // Span 1 column
            
                        Textarea::make('description')
                            ->label('Mô tả')
                            ->columnSpan(2), // Span both columns for description
                    ]),
                ])
                ->label('Chi tiết Học vấn')
                ->columnSpanFull(),
            

                // Group for Certificates
                Repeater::make('certificates')
                ->relationship('certificates')
                ->schema([
                    Grid::make(2)->schema([ // Create a Grid with 2 columns
                        TextInput::make('name')
                            ->required()
                            ->label('Tên Chứng chỉ')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('training_place')
                            ->required()
                            ->label('Cơ sở cấp')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('start_date')
                            ->required()
                            ->label('Ngày cấp')
                            ->type('date')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('expiration_date')
                            ->label('Ngày hết hạn')
                            ->type('date')
                            ->columnSpan(1), // Span 1 column
            
                        Textarea::make('description')
                            ->label('Mô tả')
                            ->columnSpan(2), // Span both columns for description
                    ]),
                ])
                ->label('Chứng chỉ đạt được')
                ->columnSpanFull(),
            

                // Group for Experience Details
                Repeater::make('experienceDetails')
                ->relationship('experienceDetails')
                ->schema([
                    Grid::make(2)->schema([ // Wrap schema in a Grid with 2 columns
                        TextInput::make('company_name')
                            ->required()
                            ->label('Tên Công ty')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('job_name') // Updated to match the fillable attribute
                            ->required()
                            ->label('Chức vụ')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('start_date')
                            ->required()
                            ->label('Ngày bắt đầu')
                            ->type('date')
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('end_date')
                            ->label('Ngày kết thúc')
                            ->type('date')
                            ->columnSpan(1), // Span 1 column
            
                        Textarea::make('description') // Updated to match the fillable attribute
                            ->required()
                            ->label('Nhiệm vụ')
                            ->columnSpan(2), // Span both columns for description
                    ]),
                ])
                ->label('Kinh nghiệm làm việc')
                ->columnSpanFull(),
            
                // Group for Language Skills
                Repeater::make('languageSkills')
                ->relationship('languageSkills')
                ->schema([
                    Grid::make(2)->schema([
                        Select::make('language')
                            ->required()
                            ->label('Ngôn ngữ')
                            ->options([
                                'Tiếng Anh' => 'Tiếng Anh',
                                'Tiếng Pháp' => 'Tiếng Pháp',
                                'Tiếng Nhật' => 'Tiếng Nhật',
                                'Tiếng Hàn' => 'Tiếng Hàn',
                                'Tiếng Đức' => 'Tiếng Đức',
                                'Tiếng Ý' => 'Tiếng Ý',
                                'Tiếng Trung' => 'Tiếng Trung',
                                'Tiếng Nga' => 'Tiếng Nga',
                            ])
                            
                            ->columnSpan(1), // Span 1 column
            
                        TextInput::make('level') // This remains as a TextInput for proficiency level
                            ->required()
                            ->numeric()
                            ->label('Trình độ %')
                            ->columnSpan(1), // Span 1 column
                    ]),
                ])
            
                ->label('Kỹ năng Ngôn ngữ')
                ->columnSpanFull(),
            

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->label('Tên người dùng')
                    ->formatStateUsing(function ($record) {
                        return $record->user ? $record->user->full_name : 'Không có';
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('seeker_profile_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('city')
                    ->label('Thành phố')
                    ->formatStateUsing(function ($record) {
                        return $record->city ? $record->city->name : 'Không có';
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('career')
                    ->label('Nghề nghiệp')
                    ->formatStateUsing(function ($record) {
                        return $record->career ? $record->career->name : 'Không có';
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable(),

                Tables\Columns\TextColumn::make('salary_min')
                    ->numeric()
                    ->label('Mức lương tối thiểu')
                    ->sortable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Vị trí')
                    ->searchable(),

                Tables\Columns\TextColumn::make('experience')
                    ->label('Kinh nghiệm')
                    ->searchable(),

                Tables\Columns\TextColumn::make('academic_level')
                    ->label('Trình độ học vấn')
                    ->searchable(),

                Tables\Columns\TextColumn::make('type_of_workplace')
                    ->label('Loại nơi làm việc')
                    ->searchable(),

                Tables\Columns\TextColumn::make('job_type')
                    ->label('Loại công việc')
                    ->searchable(),

                Tables\Columns\TextColumn::make('is_active')
                    ->label('Trạng thái hoạt động')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Hình ảnh'),

                Tables\Columns\TextColumn::make('file_url')
                    ->label('Tệp tin')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('public_id')
                    ->label('ID công khai')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('type')
                    ->label('Loại hồ sơ')
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
                // Định nghĩa bất kỳ bộ lọc nào ở đây nếu cần
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
            'index' => Pages\ListResumes::route('/'),
            'create' => Pages\CreateResume::route('/create'),
            'edit' => Pages\EditResume::route('/{record}/edit'),
        ];
    }
}
