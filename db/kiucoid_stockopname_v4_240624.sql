-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 06:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiucoid_stockopname`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_zahir`
--

CREATE TABLE `tb_barang_zahir` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `hasil_dimensi` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `stok_box` int(11) NOT NULL,
  `stok_pcs` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_zahir`
--

INSERT INTO `tb_barang_zahir` (`id_barang`, `kode_barang`, `nama_barang`, `exp_date`, `panjang`, `lebar`, `tinggi`, `hasil_dimensi`, `qty`, `stok_box`, `stok_pcs`, `keterangan`) VALUES
(1, 'KIU1', 'Abacell 18 EC 10 X 1 ltr', '01/07/2026', 10, 1, 1, 10, 250, 25, 0, '-'),
(2, 'KIU2', 'Abacell 18 EC 40 X 250 ml', '01/12/2026', 40, 1, 1, 40, 721, 18, 1, '-'),
(3, 'KIU3', 'Abacell 18 EC 50 X 100 ml', '01/03/2026', 50, 1, 1, 50, 8185, 163, 35, '-'),
(4, 'KIU4', 'Abado 50 WP 20 X 20 X 10 gr', '01/12/2027', 20, 20, 1, 400, 11563, 28, 363, '-'),
(5, 'KIU5', 'Abado 50 WP 20 X 6 X 40 gr', '01/04/2028', 20, 6, 1, 120, 3372, 28, 12, '-'),
(6, 'KIU6', 'Abenz 22 EC 100 X 100 ml', '01/06/2025', 100, 1, 1, 100, 37, 0, 37, '-'),
(7, 'KIU6', 'Abenz 22 EC 100 X 100 ml', '01/09/2028', 100, 1, 1, 100, 600, 6, 0, '-'),
(8, 'KIU6', 'Abenz 22 EC 100 X 100 ml', '01/07/2028', 100, 1, 1, 100, 6450, 64, 50, '-'),
(9, 'KIU7', 'Abenz 22 EC 40 X 250 ml', '01/04/2028', 40, 1, 1, 40, 8, 0, 8, '-'),
(10, 'KIU7', 'Abenz 22 EC 40 X 250 ml', '01/09/2028', 40, 1, 1, 40, 2000, 50, 0, '-'),
(11, 'KIU29', 'Agil 100 EC 100 X 100 ml', '01/11/2028', 100, 1, 1, 100, 700, 7, 0, '-'),
(12, 'KIU29', 'Agil 100 EC 100 X 100 ml', '01/10/2028', 100, 1, 1, 100, 1500, 15, 0, '-'),
(13, 'KIU29', 'Agil 100 EC 100 X 100 ml', '01/08/2028', 100, 1, 1, 100, 3005, 30, 5, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_barang`
--

CREATE TABLE `tb_master_barang` (
  `id_master_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `hasil_dimensi` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_master_barang`
--

INSERT INTO `tb_master_barang` (`id_master_barang`, `kode_barang`, `nama_barang`, `panjang`, `lebar`, `tinggi`, `hasil_dimensi`, `keterangan`) VALUES
(1, 'KIU1', 'Abacell 18 EC 10 X 1 ltr', 10, 1, 1, 10, NULL),
(2, 'KIU2', 'Abacell 18 EC 40 X 250 ml', 40, 1, 1, 40, NULL),
(3, 'KIU3', 'Abacell 18 EC 50 X 100 ml', 50, 1, 1, 50, NULL),
(4, 'KIU4', 'Abado 50 WP 20 X 20 X 10 gr', 20, 20, 1, 400, NULL),
(5, 'KIU5', 'Abado 50 WP 20 X 6 X 40 gr', 20, 6, 1, 120, NULL),
(6, 'KIU6', 'Abenz 22 EC 100 X 100 ml', 100, 1, 1, 100, NULL),
(7, 'KIU7', 'Abenz 22 EC 40 X 250 ml', 40, 1, 1, 40, NULL),
(8, 'KIU29', 'Agil 100 EC 100 X 100 ml', 100, 1, 1, 100, NULL),
(9, 'KIU1', 'Abacell 18 EC 10 X 1 ltr', 10, 1, 1, 10, 'Penambahan Expired - Opname'),
(10, 'KIU1', 'Abacell 18 EC 10 X 1 ltr', 10, 1, 1, 10, 'Penambahan Expired - Opname');

-- --------------------------------------------------------

--
-- Table structure for table `tb_opname`
--

CREATE TABLE `tb_opname` (
  `id_opname` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok_box1` int(11) NOT NULL,
  `stok_pcs1` int(11) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `QTY1` int(11) NOT NULL,
  `sektor` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `inputer_edit` text NOT NULL,
  `keterangan_edit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pending`
--

CREATE TABLE `tb_pending` (
  `id_pending` int(11) NOT NULL,
  `kode_pending` varchar(50) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pending`
--

INSERT INTO `tb_pending` (`id_pending`, `kode_pending`, `kode_barang`, `nama_barang`, `qty`) VALUES
(1, 'P7', 'KIU1', 'Abacell 18 EC 10 X 1 ltr', 259),
(2, 'P8', 'KIU2', 'Abacell 18 EC 40 X 250 ml', 365),
(3, 'P9', 'KIU3', 'Abacell 18 EC 50 X 100 ml', 100),
(4, 'P15', 'KIU29', 'Agil 100 EC 100 X 100 ml', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(60) NOT NULL,
  `sektor` int(4) NOT NULL,
  `team_opname` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `role`, `sektor`, `team_opname`) VALUES
(1, 'KIU ADMIN', 'admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 'admin', 0, 0),
(2, 'TIM IT', 'IT', '$2y$10$SKXEA2GCi5vt7at9goEyfeRgkM9Jh73t49uBol65Ay.PDzL3DhCSK', 'user', 1, 1),
(3, 'wahyu', 'wahyu', '$2y$10$TCd4kiaUP6dSDw9gypUfLeFAWjCFoEvddBH22EHCQfxce9lwiJVt.', 'user', 1, 1),
(4, '1 - 2 Atas', 'area1', '$2y$10$SUsQ/eRuTLuSbdLmHv92XuDJdMq5gfI76.aowOPrA4I2QByW0L22i', 'user', 1, 1),
(5, '1 Bawah', 'area2', '$2y$10$FLZKfGV27ueqDHokDaWW/e5FG6NEXsnuNbklHNBLnSmr9VTnP2iG6', 'user', 2, 1),
(6, '2 Bawah', 'area3', '$2y$10$Zhi1OkyqR1NUhM/vJv5XReCB5HY/PBfVGqwv5ZkUy/KHUbAd6bHMq', 'user', 3, 1),
(7, '3 - 5', 'area4', '$2y$10$XzBLihsDBmbg0.aLiawwkOs/kmNtYi8/vYhoHgjuExTOPtxgGna8C', 'user', 4, 1),
(8, '6 - 8', 'area5', '$2y$10$V2HAAdT3O9A83Ne2goMtkOh9Hkp3e3FIRgrbyVbETJt0f/ObRLy/O', 'user', 5, 1),
(9, '9 - 10 , Gdg Benih', 'area6', '$2y$10$1f7baddJnOKbMwfQup3xn.PLaVzjV2Nf0xWRolY24gy2gCIThVSby', 'user', 6, 1),
(10, 'Eceran 1', 'area7', '$2y$10$tDx0rqvV/7q9cgltPXAhoe2UKinjBgS/Vgw5d9N1eRkNYjSUzvD2q', 'user', 7, 1),
(11, 'Eceran 2', 'area8', '$2y$10$V0mIAhpazk2B1V2kIuoZIe.4.HN7a4XIWcm5a/l2v5lYulC2.924G', 'user', 8, 1),
(12, 'Eceran 3', 'area9', '$2y$10$rRohRT7Z0MDIYPYgkbGvAuKT/P/wztiApJyEQQzvHnL3nBdis.V2i', 'user', 9, 1),
(13, 'Gdg Baru 1-3 Atas', 'area10', '$2y$10$frYGxtEuOil427MSkn0IPux/aQ1w3LQIXkzkxy4ogVqhotZ/gHLiK', 'user', 10, 1),
(14, 'Gdg Baru 1-2 Bawah', 'area11', '$2y$10$Fdrne67Qr5TKdV8.4a05AuQocCYiJOhsH2yGuy0JYkWmLoqjeerJ6', 'user', 11, 1),
(15, 'Gdg Baru 3-4', 'area12', '$2y$10$a/5oa48i9xCeh.X9Vg0seu1OtvA/GAOVuf4zyvAwmNwT8Ud.zHE7W', 'user', 12, 1),
(16, 'Gdg Baru 5-7', 'area13', '$2y$10$s9fXjFhw5OcRouW1ka1dk.4jnBE7qRmYA2AX8iGd0cSusMf3VBJIW', 'user', 13, 1),
(17, 'Gdg Baru 8-9', 'area14', '$2y$10$ai3RuM/GrfANtBZ/HYxCceGLBK6KbZXiS5OhgO8mdHm67se6eIvgW', 'user', 14, 1),
(18, 'Gdg Baru 10-11', 'area15', '$2y$10$Wx3NxXx0UwZcgNgtWch3xeUniHMlnDDYC0KADtOFHTedoSqu/mQNO', 'user', 15, 1),
(19, 'Gdg Baru 12-13', 'area16', '$2y$10$VsIgzDHVcR.lNt3jGqMkU.6fCWiQKPU8cy3a1GPNpmXJ7u4f/9RKy', 'user', 16, 1),
(20, 'Gdg Belakang 1-3', 'area17', '$2y$10$H7xv23zGxwiMZ6EqXjkWnuGbodIWS/OwAF0AMBMfIP2zk2j/2IEy.', 'user', 17, 1),
(21, 'Gdg Thamrin', 'area18', '$2y$10$lwIe5prq2ifJ3OS0zPb2L.1HcY5Syj9zPlvTBhVnVnquEot3XXTjK', 'user', 18, 1),
(22, 'KIU ADMIN', 'admingdg', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 'admin', 0, 0),
(24, 'KIU ADMIN', 'superadmin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 'admin', 0, 0),
(25, 'Barang Promosi ', 'area19', '$2y$10$H7xv23zGxwiMZ6EqXjkWnuGbodIWS/OwAF0AMBMfIP2zk2j/2IEy.', 'user', 19, 1),
(26, 'Barang Rusak & Sparepart', 'area20', '$2y$10$H7xv23zGxwiMZ6EqXjkWnuGbodIWS/OwAF0AMBMfIP2zk2j/2IEy.', 'user', 20, 1),
(27, 'Inputer_plus_minus', 'area21', '$2y$10$H7xv23zGxwiMZ6EqXjkWnuGbodIWS/OwAF0AMBMfIP2zk2j/2IEy.', 'user', 21, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang_zahir`
--
ALTER TABLE `tb_barang_zahir`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  ADD PRIMARY KEY (`id_master_barang`);

--
-- Indexes for table `tb_opname`
--
ALTER TABLE `tb_opname`
  ADD PRIMARY KEY (`id_opname`);

--
-- Indexes for table `tb_pending`
--
ALTER TABLE `tb_pending`
  ADD PRIMARY KEY (`id_pending`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_zahir`
--
ALTER TABLE `tb_barang_zahir`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  MODIFY `id_master_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_opname`
--
ALTER TABLE `tb_opname`
  MODIFY `id_opname` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pending`
--
ALTER TABLE `tb_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
