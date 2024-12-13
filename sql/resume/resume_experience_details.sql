-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 13, 2024 lúc 05:25 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `rzcareer`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `resume_experience_details`
--

CREATE TABLE `resume_experience_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `job_name` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `resume_experience_details`
--

INSERT INTO `resume_experience_details` (`id`, `resume_id`, `job_name`, `start_date`, `end_date`, `description`, `company_name`, `created_at`, `updated_at`) VALUES
(3, 6, 'Software Developer', '2022-01-01', '2023-12-31', 'Developed web applications and maintained existing systems.', 'Tech Company A', '2024-10-24 03:54:58', '2024-10-24 03:54:58'),
(4, 6, 'Project Coordinator', '2021-06-01', '2021-12-31', 'Coordinated project timelines and team tasks.', 'Business Solutions B', '2024-10-24 03:54:58', '2024-10-24 03:54:58'),
(5, 6, 'Intern', '2020-05-01', '2020-08-31', 'Assisted in software development and testing.', 'Startup C', '2024-10-24 03:54:58', '2024-10-24 03:54:58'),
(6, 13, 'Fullstack Developer', '2024-08-01', '2024-10-29', 'Fullstack PHP, Laravel, Wordpress.', 'NPH Digital', '2024-10-28 21:43:52', '2024-10-28 21:43:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `resume_experience_details`
--
ALTER TABLE `resume_experience_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_experience_details_resume_id_foreign` (`resume_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `resume_experience_details`
--
ALTER TABLE `resume_experience_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `resume_experience_details`
--
ALTER TABLE `resume_experience_details`
  ADD CONSTRAINT `resume_experience_details_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
