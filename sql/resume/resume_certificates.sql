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
-- Cấu trúc bảng cho bảng `resume_certificates`
--

CREATE TABLE `resume_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `training_place` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `resume_certificates`
--

INSERT INTO `resume_certificates` (`id`, `resume_id`, `name`, `training_place`, `start_date`, `expiration_date`, `description`, `created_at`, `updated_at`) VALUES
(3, 6, 'Certified Web Developer (CWD)', 'Certified Web Developer (CWD)', '2024-08-16', '2024-08-15', 'Certified Web Developer (CWD)', '2024-08-16 00:47:04', '2024-10-28 05:15:01'),
(4, 6, 'Web Design Professional (WDP)', 'Web Design Professional (WDP)', '2024-08-12', '2024-08-05', 'Web Design Professional (WDP)', '2024-08-16 01:03:41', '2024-10-28 05:15:12'),
(5, 13, 'Full-Stack Web Development Certificate', 'Full-Stack Web Development Certificate', '2024-10-16', '2024-10-30', 'Full-Stack Web Development Certificate', '2024-10-28 21:45:35', '2024-10-28 21:45:35'),
(6, 13, 'Advanced Web Programming Certificate', 'Advanced Web Programming Certificate', '2024-10-15', '2024-10-25', 'Advanced Web Programming Certificate', '2024-10-28 21:45:49', '2024-10-28 21:45:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `resume_certificates`
--
ALTER TABLE `resume_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_certificates_resume_id_foreign` (`resume_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `resume_certificates`
--
ALTER TABLE `resume_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `resume_certificates`
--
ALTER TABLE `resume_certificates`
  ADD CONSTRAINT `resume_certificates_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
