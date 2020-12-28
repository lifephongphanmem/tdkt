-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2020 lúc 09:38 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.3.23

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
-- Cấu trúc bảng cho bảng `chongmycanhan`
--

CREATE TABLE `chongmycanhan` (
  `id` int(11) NOT NULL,
  `loaikt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dhkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noitrkhen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namsinh` date DEFAULT NULL,
  `chinhquan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvchohn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihskc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgiantgkc` date DEFAULT NULL,
  `tgiankcqd` date DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chongmycanhan`
--

INSERT INTO `chongmycanhan` (`id`, `loaikt`, `dhkt`, `soqd`, `noitrkhen`, `sodd`, `namsinh`, `chinhquan`, `cvchohn`, `loaihskc`, `tgiantgkc`, `tgiankcqd`, `ngaynhap`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'a', 'a', '11', 'a', '11', '2020-12-21', 'a', 'a', 'a', '2020-12-21', '2020-12-21', '2020-12-21', 'a', '2020-12-21 07:42:12', '2020-12-21 07:42:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chongmygiadinh`
--

CREATE TABLE `chongmygiadinh` (
  `id` int(11) NOT NULL,
  `loaikt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dhkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noitrkhen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namsinh` date DEFAULT NULL,
  `chinhquan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvchohn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihskc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgiantgkc` date DEFAULT NULL,
  `tgiankcqd` date DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chongmygiadinh`
--

INSERT INTO `chongmygiadinh` (`id`, `loaikt`, `dhkt`, `soqd`, `noitrkhen`, `sodd`, `namsinh`, `chinhquan`, `cvchohn`, `loaihskc`, `tgiantgkc`, `tgiankcqd`, `ngaynhap`, `ghichu`, `created_at`, `updated_at`) VALUES
(10, 'a', 'a', '1', 'a', '1', '1995-09-16', 'a', 'a', 'a', '2020-12-21', '2020-12-21', '2020-12-21', 'a', '2020-12-21 01:11:32', '2020-12-21 01:11:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chongphapcanhan`
--

CREATE TABLE `chongphapcanhan` (
  `id` int(11) NOT NULL,
  `loaikt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dhkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noitrkhen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namsinh` date DEFAULT NULL,
  `chinhquan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvchohn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihskc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgiantgkc` date DEFAULT NULL,
  `tgiankcqd` date DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chongphapcanhan`
--

INSERT INTO `chongphapcanhan` (`id`, `loaikt`, `dhkt`, `soqd`, `noitrkhen`, `sodd`, `namsinh`, `chinhquan`, `cvchohn`, `loaihskc`, `tgiantgkc`, `tgiankcqd`, `ngaynhap`, `ghichu`, `created_at`, `updated_at`) VALUES
(10, 'a', 'a', '1', 'a', '1', '1995-09-16', 'a', 'a', 'a', '2020-12-21', '2020-12-21', '2020-12-21', 'a', '2020-12-21 01:11:32', '2020-12-21 01:11:32');

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
(3, 'MDH03', 'Danh hiệu lao động xuất sắc tỉnh', 'Tỉnh', NULL, NULL, '', 'Quản trị(quantri)10/12/2020 15:44:48', '2020-12-10 08:44:48', '2020-12-10 08:44:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmhinhthuckt`
--

CREATE TABLE `dmhinhthuckt` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahinhthuckt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenhinhthuckt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttnguoitao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmloaihinhthuckt`
--

CREATE TABLE `dmloaihinhthuckt` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Cấu trúc bảng cho bảng `ktctubnd`
--

CREATE TABLE `ktctubnd` (
  `id` int(11) NOT NULL,
  `loaikt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dhkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noitrkhen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namsinh` date DEFAULT NULL,
  `chinhquan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvchohn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihskc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgiantgkc` date DEFAULT NULL,
  `tgiankcqd` date DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ktctubnd`
--

INSERT INTO `ktctubnd` (`id`, `loaikt`, `dhkt`, `soqd`, `noitrkhen`, `sodd`, `namsinh`, `chinhquan`, `cvchohn`, `loaihskc`, `tgiantgkc`, `tgiankcqd`, `ngaynhap`, `ghichu`, `created_at`, `updated_at`) VALUES
(10, 'a', 'a', '1', 'a', '1', '1995-09-16', 'a', 'a', 'a', '2020-12-21', '2020-12-21', '2020-12-21', 'a', '2020-12-21 01:11:32', '2020-12-21 01:11:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ktthutuong`
--

CREATE TABLE `ktthutuong` (
  `id` int(11) NOT NULL,
  `loaikt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dhkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noitrkhen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namsinh` date DEFAULT NULL,
  `chinhquan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvchohn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihskc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgiantgkc` date DEFAULT NULL,
  `tgiankcqd` date DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ktthutuong`
--

INSERT INTO `ktthutuong` (`id`, `loaikt`, `dhkt`, `soqd`, `noitrkhen`, `sodd`, `namsinh`, `chinhquan`, `cvchohn`, `loaihskc`, `tgiantgkc`, `tgiankcqd`, `ngaynhap`, `ghichu`, `created_at`, `updated_at`) VALUES
(10, 'a', 'a', '1', 'a', '1', '1995-09-16', 'a', 'a', 'a', '2020-12-21', '2020-12-21', '2020-12-21', 'a', '2020-12-21 01:11:32', '2020-12-21 01:11:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kyniemchuong`
--

CREATE TABLE `kyniemchuong` (
  `id` int(11) NOT NULL,
  `loaikt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dhkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noitrkhen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namsinh` date DEFAULT NULL,
  `chinhquan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvchohn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihskc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgiantgkc` date DEFAULT NULL,
  `tgiankcqd` date DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kyniemchuong`
--

INSERT INTO `kyniemchuong` (`id`, `loaikt`, `dhkt`, `soqd`, `noitrkhen`, `sodd`, `namsinh`, `chinhquan`, `cvchohn`, `loaihskc`, `tgiantgkc`, `tgiankcqd`, `ngaynhap`, `ghichu`, `created_at`, `updated_at`) VALUES
(10, 'a', 'a', '1', 'a', '1', '1995-09-16', 'a', 'a', 'a', '2020-12-21', '2020-12-21', '2020-12-21', 'a', '2020-12-21 01:11:32', '2020-12-21 01:11:32');

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
(6, '2020_12_10_162211_create_dmtieuchuandhtd_table', 3),
(7, '2020_12_14_093658_create_dmhinhthuckt_table', 4),
(8, '2020_12_14_101830_create_dmloaihinhthuckt_table', 4);

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
(5, '127.0.0.1', '3RUhwsVphmUFSBiDHCdp61a41rld0XtfL8tFDxk1', '2020-12-10 07:00:31', '2020-12-10 07:00:31'),
(6, '127.0.0.1', 'O3we6Ys7t6QxwYfsSF89Jb7gB2d6bQ5oWxEDbez8', '2020-12-17 09:09:59', '2020-12-17 09:09:59'),
(7, '127.0.0.1', 'H6OrISrzwU7zm7JqJlUpjpZ5pLEyyXyZo9X1S3lj', '2020-12-23 07:28:29', '2020-12-23 07:28:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chongmycanhan`
--
ALTER TABLE `chongmycanhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chongmygiadinh`
--
ALTER TABLE `chongmygiadinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chongphapcanhan`
--
ALTER TABLE `chongphapcanhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmdanhhieutd`
--
ALTER TABLE `dmdanhhieutd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dmdanhhieutd_madanhhieutd_unique` (`madanhhieutd`);

--
-- Chỉ mục cho bảng `dmhinhthuckt`
--
ALTER TABLE `dmhinhthuckt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dmhinhthuckt_mahinhthuckt_unique` (`mahinhthuckt`);

--
-- Chỉ mục cho bảng `dmloaihinhthuckt`
--
ALTER TABLE `dmloaihinhthuckt`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `ktctubnd`
--
ALTER TABLE `ktctubnd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ktthutuong`
--
ALTER TABLE `ktthutuong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kyniemchuong`
--
ALTER TABLE `kyniemchuong`
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
-- AUTO_INCREMENT cho bảng `chongmycanhan`
--
ALTER TABLE `chongmycanhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chongmygiadinh`
--
ALTER TABLE `chongmygiadinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chongphapcanhan`
--
ALTER TABLE `chongphapcanhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `dmdanhhieutd`
--
ALTER TABLE `dmdanhhieutd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dmhinhthuckt`
--
ALTER TABLE `dmhinhthuckt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dmloaihinhthuckt`
--
ALTER TABLE `dmloaihinhthuckt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT cho bảng `ktctubnd`
--
ALTER TABLE `ktctubnd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `ktthutuong`
--
ALTER TABLE `ktthutuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `kyniemchuong`
--
ALTER TABLE `kyniemchuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;