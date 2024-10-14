<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\JobPostServiceResource\Pages;
use App\Filament\RecruiterPanel\Resources\JobPostServiceResource\RelationManagers;
use App\Models\JobPostService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobPostServiceResource extends Resource
{
    protected static ?string $model = JobPostService::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';


    protected static ?string $navigationGroup = 'Quản lý dịch vụ';
    public static function getPluralModelLabel(): string
    {
        return 'Dịch vụ bài đăng'; // Trả về tên số nhiều cho mô hình Company
    }
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('job_id')
                ->relationship('job', 'job_name') // Điều chỉnh theo cách định nghĩa quan hệ
                ->required(),
            Forms\Components\Select::make('service_id')
                ->relationship('service', 'package_name') // Điều chỉnh theo cách định nghĩa quan hệ
                ->required(),
            Forms\Components\DatePicker::make('start_date')->required(),
            Forms\Components\DatePicker::make('end_date')->required(),
            Forms\Components\Checkbox::make('highlight_post')->default(false),
            Forms\Components\Checkbox::make('top_sector')->default(false),
            Forms\Components\Checkbox::make('border_effect')->default(false),
            Forms\Components\Checkbox::make('hot_effect')->default(false),
            Forms\Components\Checkbox::make('highlight_logo')->default(false),
            Forms\Components\Checkbox::make('homepage_banner')->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('job.package_name'),
            Tables\Columns\TextColumn::make('service.package_name'),
            Tables\Columns\TextColumn::make('start_date')->date(),
            Tables\Columns\TextColumn::make('end_date')->date(),
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
            'index' => Pages\ListJobPostServices::route('/'),
            'create' => Pages\CreateJobPostService::route('/create'),
            'edit' => Pages\EditJobPostService::route('/{record}/edit'),
        ];
    }public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
