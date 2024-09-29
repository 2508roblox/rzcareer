-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th9 29, 2024 lúc 10:07 AM
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
-- Cấu trúc bảng cho bảng `common_careers`
--

CREATE TABLE `common_careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `icon_url` varchar(300) NOT NULL,
  `app_icon_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `common_careers`
--

INSERT INTO `common_careers` (`id`, `name`, `icon_url`, `app_icon_name`, `created_at`, `updated_at`) VALUES
(1, 'Thiết kế', 'icons/thiet-ke.svg', '123123', '2024-08-13 19:30:32', '2024-09-28 18:59:53'),
(2, 'Kho vận', 'icons/van-tai-giao-nhan.svg', '123', '2024-08-14 04:58:42', '2024-09-28 18:57:58'),
(3, 'Kinh doanh/Bán hàng', 'icons/kinh-doanh-ban-hang.svg', 'icon1', '2024-09-29 01:28:23', '2024-09-28 19:00:22'),
(4, 'IT Phần mềm', 'icons/cong-nghe-thong-tin.svg', 'icon2', '2024-09-29 01:28:23', '2024-09-28 19:00:51'),
(5, 'Giáo dục/Đào tạo', 'icons/education-svgrepo-com.svg', 'icon3', '2024-09-29 01:28:23', '2024-09-28 19:01:39'),
(6, 'Chăm sóc sức khỏe', 'icons/y-te.svg', 'icon4', '2024-09-29 01:28:23', '2024-09-28 19:01:41'),
(7, 'Tài chính/Ngân hàng', 'icons/tai-chinh-ngan-hang.svg', 'icon5', '2024-09-29 01:28:23', '2024-09-28 19:02:44'),
(8, 'Xây dựng', 'icons/building-svgrepo-com.svg', 'icon6', '2024-09-29 01:28:23', '2024-09-28 19:02:50'),
(9, 'Marketing/Truyền thông', 'icons/marketing-market-social-svgrepo-com.svg', 'icon7', '2024-09-29 01:28:23', '2024-09-28 19:07:08'),
(10, 'Dịch vụ khách hàng', 'icons/customer-service-support-svgrepo-com.svg', 'icon8', '2024-09-29 01:28:23', '2024-09-28 19:07:57'),
(11, 'Nhà hàng', 'icons/khach-san-nha-hang.svg', 'icon9', '2024-09-29 01:28:23', '2024-09-28 19:03:49'),
(12, 'Nông nghiệp', 'icons/field-farm-svgrepo-com.svg', 'icon10', '2024-09-29 01:28:23', '2024-09-28 19:03:53'),
(13, 'Nhân sự', 'icons/ke-toan-kiem-toan.svg', 'icon11', '2024-09-29 01:28:28', '2024-09-28 19:04:40'),
(14, 'Logistics/Vận tải', 'icons/van-tai-giao-nhan.svg', 'icon12', '2024-09-29 01:28:28', '2024-09-28 19:04:38'),
(15, 'Thiết kế đồ họa', 'icons/thiet-ke.svg', 'icon13', '2024-09-29 01:28:28', '2024-09-28 19:05:19'),
(16, 'Kế toán/Kiểm toán', 'icons/ke-toan-kiem-toan.svg', 'icon14', '2024-09-29 01:28:28', '2024-09-28 19:05:54'),
(17, 'Công nghệ thực phẩm', 'icons/food-bag-svgrepo-com.svg', 'icon15', '2024-09-29 01:28:28', '2024-09-28 19:06:05'),
(18, 'Du lịch/Nhà hàng/Khách sạn', 'https://example.com/icon16.png', 'icon16', '2024-09-29 01:28:28', '2024-09-29 01:28:28'),
(19, 'Pháp lý/Luật', 'https://example.com/icon17.png', 'icon17', '2024-09-29 01:28:28', '2024-09-29 01:28:28'),
(20, 'Nghiên cứu phát triển', 'https://example.com/icon18.png', 'icon18', '2024-09-29 01:28:28', '2024-09-29 01:28:28'),
(21, 'Môi trường/Xử lý chất thải', 'https://example.com/icon19.png', 'icon19', '2024-09-29 01:28:28', '2024-09-29 01:28:28'),
(22, 'Kỹ thuật điện/Điện tử', 'https://example.com/icon20.png', 'icon20', '2024-09-29 01:28:28', '2024-09-29 01:28:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `common_careers`
--
ALTER TABLE `common_careers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `common_careers`
--
ALTER TABLE `common_careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
