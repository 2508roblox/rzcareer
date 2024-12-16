<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use App\Models\Company;
use EightyNine\ExcelImport\Facades\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Log;

class ListCompanies extends ListRecords
{
    protected static string $resource = CompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            // \EightyNine\ExcelImport\ExcelImportAction::make()
            //     ->label('Nhập Excel')
            //     ->processCollectionUsing(function (string $modelClass, Collection $collection) {
            //         $errors = []; // Khai báo mảng để lưu lỗi
            //         foreach ($collection as $index => $row) { // Sử dụng $index để xác định dòng
            //             try {
            //                 // Xử lý dữ liệu từng hàng từ file Excel
            //                 Company::create([
            //                     'location_id' => $row['location_id'],
            //                     'user_id' => $row['user_id'],
            //                     'company_name' => $row['company_name'],
            //                     'slug' => $row['slug'],
            //                     'company_image_url' => $row['company_image_url'],
            //                     'company_image_public_id' => $row['company_image_public_id'],
            //                     'company_cover_image_url' => $row['company_cover_image_url'],
            //                     'company_cover_image_public_id' => $row['company_cover_image_public_id'],
            //                     'facebook_url' => $row['facebook_url'],
            //                     'youtube_url' => $row['youtube_url'],
            //                     'linkedin_url' => $row['linkedin_url'],
            //                     'company_email' => $row['company_email'],
            //                     'company_phone' => $row['company_phone'],
            //                     'website_url' => $row['website_url'],
            //                     'tax_code' => $row['tax_code'],
            //                     'since' => Date::excelToDateTimeObject($row['since'])->format('Y-m-d'),
            //                     'field_operation' => $row['field_operation'],
            //                     'description' => $row['description'],
            //                     'employee_size' => $row['employee_size'],
            //                 ]);
            //             } catch (\Exception $e) {
            //                 // Xử lý lỗi và ghi log
            //                 $errors[] = "Error processing row " . ($index + 1) . ": " . $e->getMessage();
            //                 Log::error("Error processing row " . ($index + 1) . ": " . $e->getMessage());
            //             }
            //         }

            //         // Hiển thị thông báo nếu có lỗi
            //         if (!empty($errors)) {
            //             // Logic hiển thị lỗi cho người dùng, có thể sử dụng session flash message hoặc redirect
            //             // Ví dụ: trả về lỗi cho người dùng
            //             session()->flash('errors', $errors);
            //         }
            //     })
        ];
    }
}
