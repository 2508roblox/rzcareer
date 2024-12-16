<?php

namespace App\Filament\Resources\JobPostResource\Pages;

use App\Filament\Resources\JobPostResource;
use App\Models\JobPost;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ListJobPosts extends ListRecords
{
    protected static string $resource = JobPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            // \EightyNine\ExcelImport\ExcelImportAction::make()
            //     ->label('Nhập Job từ Excel')
            //     ->processCollectionUsing(function (string $modelClass, Collection $collection) {
            //         $errors = []; // Khai báo mảng để lưu lỗi
            //         foreach ($collection as $index => $row) { // Sử dụng $index để xác định dòng
            //             try {
            //                 // Xử lý dữ liệu từng hàng từ file Excel
            //                 JobPost::create([
            //                     'career_id' => $row['career_id'],
            //                     'company_id' => $row['company_id'],
            //                     'location_id' => $row['location_id'],
            //                     'user_id' => $row['user_id'],
            //                     'job_name' => $row['job_name'],
            //                     'slug' => $row['slug'],
            //                     'deadline' =>  $row['deadline'] ,
            //                     'quantity' => $row['quantity'],
            //                     'gender_required' => $row['gender_required'],
            //                     'job_description' => $row['job_description'],
            //                     'job_requirement' => $row['job_requirement'],
            //                     'benefits_enjoyed' => $row['benefits_enjoyed'],
            //                     'position' => $row['position'],
            //                     'type_of_workplace' => $row['type_of_workplace'],
            //                     'experience' => $row['experience'],
            //                     'academic_level' => $row['academic_level'],
            //                     'job_type' => $row['job_type'],
            //                     'salary_min' => $row['salary_min'],
            //                     'salary_max' => $row['salary_max'],
            //                     'salary_type' => $row['salary_type'],
            //                     'is_hot' => $row['is_hot'],
            //                     'is_urgent' => $row['is_urgent'],
            //                     'contact_person_name' => $row['contact_person_name'],
            //                     'contact_person_phone' => $row['contact_person_phone'],
            //                     'contact_person_email' => $row['contact_person_email'],
            //                     'views' => $row['views'],
            //                     'shares' => $row['shares'],
            //                     'status' => $row['status'],
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
            //             session()->flash('errors', $errors);
            //         }
            //     })
        ];
    }
}
