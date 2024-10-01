<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobPostServiceResource\Pages;
use App\Filament\Resources\JobPostServiceResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
    }
}
