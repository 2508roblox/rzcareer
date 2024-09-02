<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;
    protected static ?string $navigationGroup = 'Companies & Jobs';

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('location_id')
                    ->label('Location')
                    ->relationship('location', 'address')  // Thay 'name' bằng tên trường mà bạn muốn hiển thị từ bảng locations
                    ->required()
                    ->preload(),

                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'full_name')
                    ->required()
                    ->preload()
                    ->searchable(),

                Forms\Components\TextInput::make('company_name')
                    ->label('Company Name')
                    ->required()
                    ->maxLength(255)
                    ->live(250)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),



                Forms\Components\TextInput::make('slug')
                    ->label('Slug')

                  ,  // Trường slug chỉ đọc


                Forms\Components\FileUpload::make('company_image_url')
                    ->label('Company Image')
                    ->image()
                    ->disk('public')
                    ->directory('company-images')
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            // Tự động gán giá trị cho company_image_public_id
                            $fileName = pathinfo($state, PATHINFO_BASENAME);
                            $set('company_image_public_id', $fileName);
                        }
                    }),

                Forms\Components\FileUpload::make('company_cover_image_url')
                    ->label('Company Cover Image')
                    ->image()
                    ->disk('public')
                    ->directory('company-cover-images')
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            // Tự động gán giá trị cho company_cover_image_public_id
                            $fileName = pathinfo($state, PATHINFO_BASENAME);
                            $set('company_cover_image_public_id', $fileName);
                        }
                    }),

                Forms\Components\TextInput::make('company_image_public_id')
                    ->label('Company Image Public ID'),
                Forms\Components\TextInput::make('company_cover_image_public_id')
                    ->label('Company Cover Image Public ID'),
                Forms\Components\TextInput::make('facebook_url')
                    ->label('Facebook URL')
                    ->maxLength(200)
                    ->default(null),

                Forms\Components\TextInput::make('youtube_url')
                    ->label('YouTube URL')
                    ->maxLength(200)
                    ->default(null),

                Forms\Components\TextInput::make('linkedin_url')
                    ->label('LinkedIn URL')
                    ->maxLength(200)
                    ->default(null),

                Forms\Components\TextInput::make('company_email')
                    ->label('Company Email')
                    ->email()
                    ->maxLength(100)
                    ->default(null),

                Forms\Components\TextInput::make('company_phone')
                    ->label('Company Phone')
                    ->tel()
                    ->maxLength(15)
                    ->default(null),

                Forms\Components\TextInput::make('website_url')
                    ->label('Website URL')
                    ->url()
                    ->prefix('https://')

                    ->maxLength(300)
                    ->default(null),

                Forms\Components\TextInput::make('tax_code')
                    ->label('Tax Code')
                    ->maxLength(30)
                    ->default(null),

                Forms\Components\DatePicker::make('since')
                    ->label('Since'),

                    Forms\Components\Select::make('field_operation')
                    ->label('Field of Operation')
                    ->options([
                        'tech' => 'Technology',
                        'finance' => 'Finance',
                        'health' => 'Healthcare',
                        'education' => 'Education',
                        'retail' => 'Retail',
                        // Thêm các lựa chọn khác nếu cần
                    ])
                    ->required(),

                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->columnSpanFull(),

                    Forms\Components\Select::make('employee_size')
                    ->label('Employee Size')

                    ->options([
                        10 => '1 - 10',
                        50 => '11 - 50',
                        100 => '51 - 100',
                        500 => '101 - 500',
                        1000 => '501+',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('location_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('company_image_url'),
                Tables\Columns\ImageColumn::make('company_image_public_id'),
                Tables\Columns\ImageColumn::make('company_cover_image_url'),
                Tables\Columns\ImageColumn::make('company_cover_image_public_id'),
                Tables\Columns\TextColumn::make('facebook_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tax_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('since')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('field_operation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee_size')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
