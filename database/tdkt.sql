-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2020 lúc 08:18 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tdkt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmdanhhieutd`
--

CREATE TABLE `dmdanhhieutd` (
  `id` int(10) UNSIGNED NOT NULL,
  `madanhhieutd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tendanhhieutd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttnguoitao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmdanhhieutd`
--

INSERT INTO `dmdanhhieutd` (`id`, `madanhhieutd`, `tendanhhieutd`, `phanloai`, `maxa`, `mahuyen`, `ghichu`, `ttnguoitao`, `created_at`, `updated_at`) VALUES
(1, 'MDH01', 'Danh hiệu lao động xuất sắc', 'Xã', NULL, NULL, '', 'Quản trị(quantri)10/12/2020 15:39:06', '2020-12-10 08:39:06', '2020-12-10 08:39:06'),
(3, 'MDH03', 'Danh hiệu lao động xuất sắc', 'Tỉnh', NULL, NULL, '', 'Quản trị(quantri)10/12/2020 15:44:48', '2020-12-10 08:44:48', '2020-12-10 08:44:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmtieuchuandhtd`
--

CREATE TABLE `dmtieuchuandhtd` (
  `id` int(10) UNSIGNED NOT NULL,
  `matieuchuandhtd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tentieuchuandhtd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttnguoitao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmtieuchuandhtd`
--

INSERT INTO `dmtieuchuandhtd` (`id`, `matieuchuandhtd`, `tentieuchuandhtd`, `maxa`, `mahuyen`, `ghichu`, `ttnguoitao`, `created_at`, `updated_at`) VALUES
(1, 'ma01', 'Tên tiêu chuẩn 1', NULL, NULL, '', 'Quản trị(quantri)10/12/2020 16:43:52', '2020-12-10 09:43:52', '2020-12-10 09:46:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `general-configs`
--

CREATE TABLE `general-configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendonvi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maqhns` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thutruong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoilapbieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtinhd` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihanlt` double NOT NULL DEFAULT 0,
  `thoihanvt` double NOT NULL DEFAULT 0,
  `thoihangs` double NOT NULL DEFAULT 0,
  `thoihantacn` double NOT NULL DEFAULT 0,
  `sodvvt` double NOT NULL DEFAULT 0,
  `emailql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendvhienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendvcqhienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `general-configs`
--

INSERT INTO `general-configs` (`id`, `tendonvi`, `maqhns`, `diachi`, `tel`, `thutruong`, `ketoan`, `nguoilapbieu`, `diadanh`, `setting`, `thongtinhd`, `thoihanlt`, `thoihanvt`, `thoihangs`, `thoihantacn`, `sodvvt`, `emailql`, `tendvhienthi`, `tendvcqhienthi`, `created_at`, `updated_at`) VALUES
(1, 'Sở nội vụ tỉnh Bắc Ninh', '123456789', 'Tp Bắc Ninh', 'TP Bắc Ninh', NULL, NULL, NULL, 'Bắc Ninh', '{\"tdktkhangchien\":{\"index\":\"1\"},\"chongphapcanhan\":{\"index\":\"1\"},\"chongmycanhan\":{\"index\":\"1\"},\"chongmygiadinh\":{\"index\":\"1\"},\"ktthutuong\":{\"index\":\"1\"},\"ktctubnd\":{\"index\":\"1\"},\"kyniemchuong\":{\"index\":\"1\"},\"tdktcaccap\":{\"index\":\"1\"},\"qltailieu\":{\"index\":\"1\"},\"hiepykhenthuong\":{\"index\":\"1\"},\"qlquytdkt\":{\"index\":\"1\"},\"qlvbnn\":{\"index\":\"1\"}}', 'abc', 0, 0, 0, 0, 0, NULL, 'Sở Nội Vụ Tỉnh Bắc Ninh', 'UBND Tỉnh Bắc Ninh', '2020-12-09 07:37:31', '2020-12-10 04:24:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_10_14_022915_create_general-configs_table', 1),
(3, '2018_05_02_150447_create_viewpage_table', 1),
(4, '2018_10_13_092848_create_register_table', 1),
(5, '2020_12_10_150524_create_dmdanhhieutd_table', 2),
(6, '2020_12_10_162211_create_dmtieuchuandhtd_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register`
--

CREATE TABLE `register` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settingdvvt` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `vtxk` double NOT NULL DEFAULT 0,
  `vtxb` double NOT NULL DEFAULT 0,
  `vtxtx` double NOT NULL DEFAULT 0,
  `vtch` double NOT NULL DEFAULT 0,
  `loaihinhhd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xangdau` double NOT NULL DEFAULT 0,
  `dien` double NOT NULL DEFAULT 0,
  `khidau` double NOT NULL DEFAULT 0,
  `phan` double NOT NULL DEFAULT 0,
  `thuocbvtv` double NOT NULL DEFAULT 0,
  `vacxingsgc` double NOT NULL DEFAULT 0,
  `muoi` double NOT NULL DEFAULT 0,
  `suate6t` double NOT NULL DEFAULT 0,
  `duong` double NOT NULL DEFAULT 0,
  `thocgao` double NOT NULL DEFAULT 0,
  `thuocpcb` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sadmin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailxt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttnguoitao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `status`, `maxa`, `mahuyen`, `town`, `district`, `level`, `sadmin`, `permission`, `emailxt`, `question`, `answer`, `ttnguoitao`, `lydo`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', 'quantri', 'e10adc3949ba59abbe56e057f20f883e', 'quantri@gmail.com', 'Kích hoạt', NULL, NULL, NULL, NULL, 'T', 'ssa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `viewpage`
--

CREATE TABLE `viewpage` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `viewpage`
--

INSERT INTO `viewpage` (`id`, `ip`, `session`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'iuFaxaQkkMG7wXg9IlGd0J7h27aaOgBqEEWJgw5X', '2020-12-09 03:08:20', '2020-12-09 03:08:20'),
(2, '127.0.0.1', '2xcj3bLCYLg3n6kQijGGnoNJVeJQAYH6Wmj12cY6', '2020-12-09 07:09:31', '2020-12-09 07:09:31'),
(3, '127.0.0.1', 'NzygPKML9pXfScy3R9L9ivVkDUTPNXpyUTQHQie8', '2020-12-10 03:33:48', '2020-12-10 03:33:48'),
(4, '127.0.0.1', 'tcq5JGB0o3YeG0FTBWNtdJumHob7Tjz237sOS480', '2020-12-10 03:33:48', '2020-12-10 03:33:48'),
(5, '127.0.0.1', '3RUhwsVphmUFSBiDHCdp61a41rld0XtfL8tFDxk1', '2020-12-10 07:00:31', '2020-12-10 07:00:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dmdanhhieutd`
--
ALTER TABLE `dmdanhhieutd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dmdanhhieutd_madanhhieutd_unique` (`madanhhieutd`);

--
-- Chỉ mục cho bảng `dmtieuchuandhtd`
--
ALTER TABLE `dmtieuchuandhtd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dmtieuchuandhtd_matieuchuandhtd_unique` (`matieuchuandhtd`);

--
-- Chỉ mục cho bảng `general-configs`
--
ALTER TABLE `general-configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Chỉ mục cho bảng `viewpage`
--
ALTER TABLE `viewpage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dmdanhhieutd`
--
ALTER TABLE `dmdanhhieutd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dmtieuchuandhtd`
--
ALTER TABLE `dmtieuchuandhtd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `general-configs`
--
ALTER TABLE `general-configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `viewpage`
--
ALTER TABLE `viewpage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
