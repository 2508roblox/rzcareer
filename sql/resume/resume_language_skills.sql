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
-- Cấu trúc bảng cho bảng `resume_language_skills`
--

CREATE TABLE `resume_language_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `resume_language_skills`
--

INSERT INTO `resume_language_skills` (`id`, `resume_id`, `language`, `level`, `created_at`, `updated_at`) VALUES
(5, 6, 'Tiếng Việt', '80', '2024-10-28 05:14:24', '2024-10-28 05:14:24'),
(6, 6, 'Tiếng Anh', '99', '2024-10-28 06:02:48', '2024-10-28 06:02:48'),
(7, 13, 'Tiếng Anh', '80', '2024-10-28 21:44:48', '2024-10-28 21:44:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `resume_language_skills`
--
ALTER TABLE `resume_language_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_language_skills_resume_id_foreign` (`resume_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `resume_language_skills`
--
ALTER TABLE `resume_language_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `resume_language_skills`
--
ALTER TABLE `resume_language_skills`
  ADD CONSTRAINT `resume_language_skills_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
