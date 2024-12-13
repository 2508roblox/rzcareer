-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 13, 2024 lúc 05:24 AM
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
-- Cấu trúc bảng cho bảng `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seeker_profile_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `career_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `salary_min` decimal(12,2) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `academic_level` varchar(50) DEFAULT NULL,
  `type_of_workplace` varchar(50) DEFAULT NULL,
  `job_type` varchar(50) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `image_url` varchar(200) DEFAULT NULL,
  `file_url` varchar(200) DEFAULT NULL,
  `public_id` varchar(255) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `seeker_profile_id`, `city_id`, `career_id`, `title`, `slug`, `description`, `salary_min`, `position`, `experience`, `academic_level`, `type_of_workplace`, `job_type`, `is_active`, `image_url`, `file_url`, `public_id`, `type`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 1, 4, 'PHP Developer', 'php-resume', 'Xin chào tôi là Giang', 4.00, 'Lập trình viên', '1.5 năm', 'Cao đẳng', 'remote', 'Freelance', 6, '01J5D2F0ZGHMWB3RZX7W70DNG8.png', '{\"f9e28f71-2cb3-4a10-b0a8-8afb84014f46\":\"resumes\\/Tr\\u00e1\\u00ba\\u00a7n L\\u00c3\\u00aa Ho\\u00c3\\u00a0ng Giang - PS26818 (1).pdf\"}', '6', 'primary', '2024-08-16 00:47:04', '2024-10-28 21:45:56'),
(7, 41, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-10-03 04:06:11', '2024-10-03 04:06:11'),
(8, 41, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'primary', '2024-10-03 04:06:33', '2024-10-03 04:07:28'),
(9, 42, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-10-03 04:57:07', '2024-10-03 04:57:07'),
(10, 43, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-10-03 05:06:38', '2024-10-03 05:06:38'),
(11, 43, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'primary', '2024-10-03 05:36:32', '2024-10-03 05:36:32'),
(13, 1, 1, 1, 3, 'Wordpress Developer ', 'wordpress-giang', 'Xin chào tôi là Giang', 100000000.00, 'Lập trình viên', '1.5 năm', 'Cao đẳng', 'remote', 'Freelance', 1, NULL, '/storage/cvs/hjLl5AymURmKdtkU5gzrLUH6fEqcL59F9kmQ22xD.pdf', NULL, 'secondary', '2024-10-28 21:14:37', '2024-10-28 22:15:50'),
(14, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '/storage/cvs/aDYrmH4bzmYZoWR3MCNy74rnqGfFwZe8fr7SB1Lj.pdf', NULL, 'secondary', '2024-10-30 04:28:50', '2024-10-30 04:28:50'),
(15, 44, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-10-30 18:53:01', '2024-10-30 18:53:01'),
(16, 45, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'primary', '2024-11-11 13:16:24', '2024-11-11 13:16:24'),
(17, 46, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'primary', '2024-11-15 03:28:28', '2024-11-15 03:28:28'),
(18, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '/storage/cvs/bz2mswNlrAynO2iy6li1v4aE9TY59J9fI74Rqsms.pdf', NULL, 'secondary', '2024-12-13 04:23:25', '2024-12-13 04:23:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resumes_user_id_foreign` (`user_id`),
  ADD KEY `resumes_seeker_profile_id_foreign` (`seeker_profile_id`),
  ADD KEY `resumes_city_id_foreign` (`city_id`),
  ADD KEY `resumes_career_id_foreign` (`career_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `common_careers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resumes_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `common_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resumes_seeker_profile_id_foreign` FOREIGN KEY (`seeker_profile_id`) REFERENCES `seeker_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resumes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
