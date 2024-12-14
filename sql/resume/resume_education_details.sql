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
-- Cấu trúc bảng cho bảng `resume_education_details`
--

CREATE TABLE `resume_education_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `degree_name` varchar(200) NOT NULL,
  `major` varchar(255) NOT NULL,
  `training_place` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `completed_date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `resume_education_details`
--

INSERT INTO `resume_education_details` (`id`, `resume_id`, `degree_name`, `major`, `training_place`, `start_date`, `completed_date`, `description`, `created_at`, `updated_at`) VALUES
(5, 6, 'Bachelor of Arts in Psychology', 'Psychology', 'University A', '2020-09-01', '2024-06-15', 'Focus on cognitive psychology and behavior.', '2024-10-24 03:30:22', '2024-10-24 03:30:22'),
(6, 6, 'Master of Science in Environmental Studies', 'Environmental Science', 'University B', '2024-08-21', '2026-05-15', 'Specialized in climate change and sustainability.', '2024-10-24 03:30:22', '2024-10-24 03:30:22'),
(7, 6, 'Doctor of Philosophy in Computer Science', 'Computer Science', 'University C', '2026-09-01', '2029-06-30', 'Research on artificial intelligence and machine learning.', '2024-10-24 03:30:22', '2024-10-24 03:30:22'),
(11, 13, 'Cao đẳng', 'Web Develop', 'FPT Polytechnic', '2021-09-09', '2024-10-29', 'Web Developer\n', '2024-10-28 21:44:38', '2024-10-28 21:44:38');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `resume_education_details`
--
ALTER TABLE `resume_education_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_education_details_resume_id_foreign` (`resume_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `resume_education_details`
--
ALTER TABLE `resume_education_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `resume_education_details`
--
ALTER TABLE `resume_education_details`
  ADD CONSTRAINT `resume_education_details_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
