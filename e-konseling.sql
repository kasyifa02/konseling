-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 11:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-konseling`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `ke` text NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `ke`, `avatar`, `message`, `tipe`, `date`) VALUES
(15, '7000', '171810025', '', 'assalamualaikum', '', '1630656475');

-- --------------------------------------------------------

--
-- Table structure for table `m_pelanggaran`
--

CREATE TABLE `m_pelanggaran` (
  `id` int(11) NOT NULL,
  `nama_pelanggaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_pelanggaran`
--

INSERT INTO `m_pelanggaran` (`id`, `nama_pelanggaran`) VALUES
(1, 'mencuri'),
(2, 'Datang terlambat masuk sekolah'),
(3, 'Keluar kelas tanpa izin.'),
(4, 'Berpakaian seragam tidak lengkap.');

-- --------------------------------------------------------

--
-- Table structure for table `m_penghargaan`
--

CREATE TABLE `m_penghargaan` (
  `id` int(11) NOT NULL,
  `nama_penghargaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_penghargaan`
--

INSERT INTO `m_penghargaan` (`id`, `nama_penghargaan`) VALUES
(1, 'piagam'),
(2, 'tropi dan piagam'),
(3, 'piagam dan uang');

-- --------------------------------------------------------

--
-- Table structure for table `m_prestasi`
--

CREATE TABLE `m_prestasi` (
  `id` int(11) NOT NULL,
  `nama_prestasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_prestasi`
--

INSERT INTO `m_prestasi` (`id`, `nama_prestasi`) VALUES
(1, 'lomba matematika'),
(2, 'lomba puisi');

-- --------------------------------------------------------

--
-- Table structure for table `m_sanksi`
--

CREATE TABLE `m_sanksi` (
  `id` int(11) NOT NULL,
  `nama_sanksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_sanksi`
--

INSERT INTO `m_sanksi` (`id`, `nama_sanksi`) VALUES
(1, 'membersihkan kelas'),
(2, 'membersihkan halaman sekolah'),
(3, 'membersihkan kantor'),
(4, 'dilaporkan ke orang tua');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `nip`, `nama`, `alamat`, `email`, `no_hp`) VALUES
(3, '7000', 'Helma Mulyati, S.Pd', 'serang', 'gurubk@gmail.com', '081231736432');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 2),
(4, 1, 3),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(10, 3, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(19, 1, 18),
(20, 1, 22),
(22, 1, 20),
(23, 1, 19),
(24, 1, 23),
(25, 1, 24),
(26, 1, 25),
(27, 1, 26),
(28, 1, 27),
(29, 1, 29),
(30, 1, 28),
(31, 1, 30),
(32, 1, 1),
(33, 1, 9),
(34, 1, 10),
(35, 1, 31),
(36, 1, 32),
(37, 1, 33),
(38, 1, 34),
(40, 1, 36),
(41, 1, 37),
(42, 1, 38),
(43, 1, 39),
(44, 1, 40),
(45, 6, 41),
(47, 6, 43),
(49, 5, 45),
(50, 5, 46),
(51, 5, 47),
(52, 5, 48),
(53, 5, 50),
(54, 5, 49),
(55, 2, 1),
(56, 2, 7),
(57, 2, 10),
(58, 2, 11),
(59, 2, 12),
(60, 2, 13),
(61, 2, 14),
(62, 2, 15),
(63, 2, 16),
(64, 2, 17),
(65, 2, 18),
(66, 2, 20),
(68, 2, 22),
(69, 2, 23),
(70, 2, 34),
(72, 4, 9),
(73, 4, 36),
(74, 4, 37),
(75, 4, 38),
(76, 3, 7),
(77, 3, 8),
(79, 3, 13),
(80, 3, 11),
(81, 3, 14),
(82, 3, 15),
(83, 3, 16),
(84, 3, 17),
(85, 3, 20),
(87, 3, 22),
(88, 3, 23),
(89, 3, 34),
(90, 1, 51),
(91, 2, 51),
(92, 3, 51),
(93, 1, 52),
(94, 1, 53),
(95, 1, 54),
(96, 2, 52),
(97, 2, 53),
(98, 2, 54),
(99, 6, 1),
(100, 5, 1),
(101, 1, 55),
(102, 2, 55),
(103, 3, 55),
(104, 7, 56),
(105, 7, 1),
(106, 1, 56),
(108, 6, 35),
(109, 1, 57),
(110, 2, 57),
(111, 1, 58),
(112, 2, 58),
(113, 8, 1),
(115, 3, 1),
(127, 1, 60),
(128, 2, 60),
(129, 3, 60),
(130, 4, 60),
(131, 5, 60),
(132, 6, 60),
(133, 7, 60),
(134, 8, 60),
(135, 6, 61),
(136, 6, 62),
(137, 1, 63),
(138, 1, 64),
(139, 1, 65),
(140, 1, 66),
(142, 1, 68),
(143, 2, 69),
(144, 1, 69),
(145, 1, 70),
(146, 1, 71),
(147, 1, 72),
(148, 2, 70),
(149, 2, 71),
(150, 2, 72),
(151, 1, 73),
(152, 2, 73),
(153, 1, 74),
(154, 1, 75),
(155, 1, 76),
(156, 9, 74),
(157, 9, 75),
(158, 9, 76),
(161, 2, 77),
(162, 1, 77),
(163, 1, 78),
(164, 1, 79),
(165, 1, 80),
(166, 11, 80),
(167, 11, 79),
(168, 11, 78),
(169, 9, 78),
(170, 9, 79),
(171, 9, 80),
(172, 1, 81),
(173, 2, 81),
(174, 10, 81),
(175, 10, 83),
(176, 10, 82),
(177, 1, 83),
(178, 1, 82),
(179, 1, 84),
(180, 2, 84),
(181, 10, 84),
(182, 1, 85),
(183, 2, 85),
(184, 2, 86),
(185, 2, 87),
(186, 2, 88),
(187, 1, 88),
(188, 1, 86),
(189, 1, 87),
(190, 2, 4),
(191, 9, 2),
(192, 9, 4),
(193, 10, 2),
(194, 10, 4),
(195, 11, 2),
(196, 11, 4),
(197, 12, 2),
(198, 12, 4),
(199, 2, 89),
(200, 2, 90),
(201, 1, 90),
(202, 1, 89),
(203, 1, 96),
(204, 1, 95),
(205, 1, 94),
(206, 1, 93),
(207, 1, 92),
(208, 1, 91),
(209, 2, 91),
(210, 2, 92),
(211, 2, 93),
(212, 2, 94),
(213, 2, 95),
(214, 2, 96),
(215, 9, 72),
(216, 12, 78),
(217, 12, 79),
(218, 12, 80),
(219, 2, 75),
(220, 2, 6),
(221, 2, 101),
(222, 2, 100),
(223, 2, 99),
(224, 2, 98),
(225, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `kelas`) VALUES
(1, 'kelas x IPS'),
(2, 'kelas xi IPS'),
(3, 'kelas xii IPS'),
(4, 'guru bk'),
(5, 'Kelas x IPA'),
(6, 'kelas xi IPA'),
(7, 'kelas xii IPA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Dashboard', 'dashboard', 'fa fa-dashboard', 0, 'y'),
(2, 'Profile', '#', 'fa fa-gear', 0, 'y'),
(3, 'kelola menu', 'kelolamenu', 'fa fa-server', 2, 'y'),
(4, 'User Profile', 'user', 'fa fa-user', 2, 'y'),
(5, 'level pengguna', 'kelolauserlevel', 'fa fa-users', 2, 'y'),
(6, 'Master Data', '#', 'fa fa-server', 0, 'y'),
(69, 'Guru BK', '#', 'fa fa-user', 0, 'y'),
(70, 'Kelola Guru', 'guru', 'fa fa-user', 69, 'y'),
(71, 'Master Kelas', 'kelas', 'fa fa-user', 6, 'y'),
(72, 'Kelola Siswa', '#', 'fa fa-user-friends', 0, 'y'),
(73, 'Kelola Pelanggaran', '#', 'fa fa-skull-crossbones', 0, 'y'),
(75, 'Data Siswa', 'siswa', 'fa fa-user', 72, 'y'),
(77, 'Kelola Prestasi', '#', 'fa fa-trophy', 0, 'y'),
(78, 'Laporan', '#', 'fa fa-clipboard', 0, 'y'),
(79, 'Laporan Prestasi', 'lap_prestasi', 'fa fa-user', 78, 'y'),
(80, 'Laporan Pelanggaran', 'lap_pelanggaran', 'fa fa-user', 78, 'y'),
(81, 'Konseling', '#', 'fa fa-comment', 0, 'y'),
(82, 'Siswa', '#', 'fa fa-user', 0, 'y'),
(83, 'Lihat Sanksi', 'allsiswa', 'fa fa-user', 82, 'y'),
(84, 'Kelola Konseling', 'konseling', 'fa fa-user', 81, 'y'),
(85, 'Kelola Orang Tua', 'ortu', 'fa fa-user', 69, 'y'),
(86, 'Kelas 1', 'siswa/kelas/1', 'fa fa-user', 72, 'y'),
(87, 'Kelas 2', 'siswa/kelas/2', 'fa fa-user', 72, 'y'),
(88, 'Kelas 3', 'siswa/kelas/3', 'fa fa-user', 72, 'y'),
(89, 'Data Prestasi', 'prestasi', 'fa fa-trophy', 77, 'y'),
(90, 'Data Pelanggaran', 'pelanggaran', 'fa fa-user', 73, 'y'),
(91, 'Kelas 1', 'pelanggaran/kelas/1', 'fa fa-user', 73, 'y'),
(92, 'Kelas 2', 'pelanggaran/kelas/2', 'fa fa-user', 73, 'y'),
(93, 'Kelas 3', 'pelanggaran/kelas/3', 'fa fa-user', 73, 'y'),
(94, 'Kelas 1', 'prestasi/kelas/1', 'fa fa-user', 77, 'y'),
(95, 'Kelas 2', 'prestasi/kelas/2', 'fa fa-user', 77, 'y'),
(96, 'Kelas 3', 'prestasi/kelas/3', 'fa fa-user', 77, 'y'),
(98, 'Master Pelanggaran', 'm_pelanggaran', 'fa fa-server', 6, 'y'),
(99, 'Master Sanksi', 'm_sanksi', 'fa fa-server', 6, 'y'),
(100, 'Master Prestasi', 'm_prestasi', 'fa fa-server', 6, 'y'),
(101, 'Master Penghargaan', 'm_penghargaan', 'fa fa-server', 6, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggaran`
--

CREATE TABLE `tbl_pelanggaran` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pelanggaran` text NOT NULL,
  `sanksi` text NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`) VALUES
(1, '2019-05-30 14:18:16', '::1', 'Chrome'),
(2, '2019-02-14 02:42:02', '::1', 'Chrome'),
(3, '2019-02-15 12:30:47', '::1', 'Chrome'),
(4, '2019-02-16 01:54:25', '::1', 'Chrome'),
(5, '2019-02-17 06:17:49', '::1', 'Chrome'),
(6, '2019-02-26 04:18:51', '::1', 'Chrome'),
(7, '2019-02-28 12:46:48', '::1', 'Chrome'),
(8, '2019-03-01 04:17:56', '::1', 'Chrome'),
(9, '2019-03-04 11:44:25', '::1', 'Chrome'),
(10, '2019-03-05 01:10:43', '::1', 'Chrome'),
(11, '2019-03-06 12:34:53', '::1', 'Chrome'),
(12, '2019-03-07 11:07:09', '::1', 'Chrome'),
(13, '2019-03-08 01:45:03', '::1', 'Chrome'),
(14, '2019-03-09 04:12:10', '::1', 'Chrome'),
(15, '2019-03-11 02:25:00', '::1', 'Chrome'),
(16, '2019-03-13 07:52:31', '::1', 'Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `prestasi` text NOT NULL,
  `penghargaan` varchar(50) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tahun_ajaran` year(4) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `nisn`, `nama`, `kelas`, `tahun_ajaran`, `alamat`, `email`, `nama_ortu`, `no_hp`) VALUES
(11, '171810025', 'Baydowi', '1', 2021, 'serang banten', 'baydowi2@gmail.com', 'Abdul Fatah', '081936835180'),
(12, '171810003', 'Elen Lestari', '2', 2021, 'serang banten', 'elenlestari@gmail.com', 'Ahmad', '081380367544');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `images` text DEFAULT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `username`, `password`, `images`, `id_user_level`, `id_kelas`, `is_aktif`) VALUES
(1, 'admin', 'admin', '$2y$10$5ZxLMCMmOksGR8EUVwi2S.gLzWqQY1WRATyZpibpSH0pOGbZIomfO', 'img1627443729.png', 1, 0, 'y'),
(2, 'Helma Mulyati, S.Pd', '1234567890', '$2y$10$9AgM1AjDEx79TCTTYXHYXOpXeaFiNZPq6SoXQG.kBVB9pxMzPXesO', 'img1627488822.png', 2, 4, 'y'),
(20, 'Baydowi', '171810025', '$2y$10$4JOq4ZGqnR7f0poU3RM76OaQBSEXfVykvu.vxA7rk2YOS2pMb3Jwm', 'img1630656144.jpg', 10, 1, 'y'),
(22, 'Abdul Fatah', '1102151617', '$2y$10$4OSNR18kzL7yfiyGjBmD/eIi5wtkSP1LZRSZjZDgbo7PlY//Rc.EK', 'img1630656429.png', 11, 171810025, 'y'),
(23, 'Elen Lestari', '171810003', '$2y$10$zCF0ErPx.zvJ/VcSjbYp8ObH37Xn258E1a8BvuD7OwY4xvYqUsjTe', 'img1630656608.jpg', 10, 2, 'y'),
(24, 'Ahmad', '1102151617', '$2y$10$8kKO5CCFj5ZMOaekoztehezomc7mIrIrt96EFfYHDCxhzc0dkQzZa', 'img1630656849.jpg', 11, 171810003, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Guru BK'),
(9, 'Walikelas'),
(10, 'Siswa'),
(11, 'Orang Tua'),
(12, 'Kepala Sekolah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pelanggaran`
--
ALTER TABLE `m_pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_penghargaan`
--
ALTER TABLE `m_penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_prestasi`
--
ALTER TABLE `m_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_sanksi`
--
ALTER TABLE `m_sanksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`) USING BTREE;

--
-- Indexes for table `tbl_pelanggaran`
--
ALTER TABLE `tbl_pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`) USING BTREE;

--
-- Indexes for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`) USING BTREE;

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_pelanggaran`
--
ALTER TABLE `m_pelanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_penghargaan`
--
ALTER TABLE `m_penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_prestasi`
--
ALTER TABLE `m_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_sanksi`
--
ALTER TABLE `m_sanksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_pelanggaran`
--
ALTER TABLE `tbl_pelanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
