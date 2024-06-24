-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 10:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `hasil_dimensi` int(11) NOT NULL,
  `sektor` int(2) NOT NULL,
  `exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_zahir`
--

CREATE TABLE `tb_barang_zahir` (
  `id_barang` int(11) NOT NULL,
  `kode_pending` varchar(50) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `hasil_dimensi` int(11) NOT NULL,
  `stok_box` int(11) NOT NULL,
  `stok_pcs` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang_zahir`
--

INSERT INTO `tb_barang_zahir` (`id_barang`, `kode_pending`, `kode_barang`, `nama_barang`, `panjang`, `lebar`, `tinggi`, `hasil_dimensi`, `stok_box`, `stok_pcs`, `qty`, `exp_date`, `keterangan`) VALUES
(1, '', 'K1', 'Abacell 18 EC 40 X 250 ml', 40, 1, 1, 40, 18, 1, 721, '01/12/2026', ''),
(2, '', 'K2', 'Agil 100 EC 40 X 250 ml', 40, 1, 1, 40, 0, 22, 22, '01/12/2028', ''),
(3, '', 'K3', 'Agil 100 EC 40 X 250 ml', 40, 1, 1, 40, 90, 0, 3600, '01/04/2029', ''),
(4, '', 'K4', 'Curacron 500 EC 20 X 500 ml', 20, 1, 1, 20, 0, 12, 12, '01/02/2025', ''),
(5, '', 'K5', 'Curacron 500 EC 20 X 500 ml', 20, 1, 1, 20, 174, 0, 3480, '01/04/2025', ''),
(6, '', 'K6', 'Akalis 550 SC 10 X 1 ltr', 10, 1, 1, 10, 42, 8, 428, '01/03/2025', ''),
(7, '', 'K7', 'Akalis 550 SC 10 X 1 ltr', 10, 1, 1, 10, 50, 0, 500, '01/09/2026', ''),
(8, '', 'K8', 'Akalis 550 SC 20 X 500 ml', 20, 1, 1, 20, 9, 0, 180, '01/09/2027', ''),
(9, '', 'K9', 'Akalis 550 SC 20 X 500 ml', 20, 1, 1, 20, 28, 5, 565, '01/12/2026', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_barang`
--

CREATE TABLE `tb_master_barang` (
  `id_master_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `kode_pending` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `hasil_dimensi` int(11) DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_barang`
--

INSERT INTO `tb_master_barang` (`id_master_barang`, `kode_barang`, `kode_pending`, `nama_barang`, `panjang`, `lebar`, `tinggi`, `hasil_dimensi`, `exp_date`, `keterangan`) VALUES
(1, 'K1', NULL, 'Abacell 18 EC 40 X 250 ml', 40, 1, 1, 40, '01/12/2026', '-'),
(2, 'K2', NULL, 'Agil 100 EC 40 X 250 ml', 40, 1, 1, 40, '01/12/2028', '-'),
(3, 'K3', NULL, 'Agil 100 EC 40 X 250 ml', 40, 1, 1, 40, '01/04/2029', '-'),
(4, 'K4', NULL, 'Curacron 500 EC 20 X 500 ml', 20, 1, 1, 20, '01/02/2025', '-'),
(5, 'K5', NULL, 'Curacron 500 EC 20 X 500 ml', 20, 1, 1, 20, '01/04/2025', '-'),
(6, 'K6', NULL, 'Akalis 550 SC 10 X 1 ltr', 10, 1, 1, 10, '01/03/2025', '-'),
(7, 'K7', NULL, 'Akalis 550 SC 10 X 1 ltr', 10, 1, 1, 10, '01/09/2026', '-'),
(8, 'K8', NULL, 'Akalis 550 SC 20 X 500 ml', 20, 1, 1, 20, '01/09/2027', '-'),
(9, 'K9', NULL, 'Akalis 550 SC 20 X 500 ml', 20, 1, 1, 20, '01/12/2026', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_opname`
--

CREATE TABLE `tb_opname` (
  `id_opname` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_pending` varchar(50) NOT NULL,
  `stok_box1` int(11) NOT NULL,
  `stok_pcs1` int(11) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `QTY1` int(11) NOT NULL,
  `sektor` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `inputer_edit` text NOT NULL,
  `keterangan_edit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_opname`
--

INSERT INTO `tb_opname` (`id_opname`, `kode_barang`, `nama_barang`, `kode_pending`, `stok_box1`, `stok_pcs1`, `exp_date`, `QTY1`, `sektor`, `keterangan`, `inputer_edit`, `keterangan_edit`) VALUES
(1, 'K1', 'Abacell 18 EC 40 X 250 ml', '', 27, 6, '01/12/2026', 1086, 1, 'StockOpname', '', ''),
(2, 'K2', 'Agil 100 EC 40 X 250 ml', '', 0, 22, '01/12/2028', 22, 1, 'StockOpname', '', ''),
(3, 'K3', 'Agil 100 EC 40 X 250 ml', '', 90, 0, '01/04/2029', 3600, 1, 'StockOpname', '', ''),
(8, 'K5', 'Curacron 500 EC 20 X 500 ml', '', 174, 0, '01/04/2025', 3480, 1, 'StockOpname', '', ''),
(9, 'K4', 'Curacron 500 EC 20 X 500 ml', '', 0, 12, '01/02/2025', 12, 1, 'StockOpname', '', ''),
(10, 'K5', 'Curacron 500 EC 20 X 500 ml', '', 3, 0, '01/04/2025', 60, 1, 'StockOpname', '', ''),
(11, 'K4', 'Curacron 500 EC 20 X 500 ml', '', 0, 5, '01/02/2025', 5, 1, 'StockOpname', '', ''),
(12, 'K4', 'Curacron 500 EC 20 X 500 ml', '', 0, 0, '01/02/2025', 0, 1, 'Penyesuaian Qty - By Admin', 'superadmin', ''),
(13, 'K5', 'Curacron 500 EC 20 X 500 ml', '', 0, 5, '01/04/2025', 5, 1, 'Penyesuaian Qty - By Admin', 'superadmin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pending`
--

CREATE TABLE `tb_pending` (
  `id_pending` int(11) NOT NULL,
  `kode_pending` varchar(50) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` text NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pending`
--

INSERT INTO `tb_pending` (`id_pending`, `kode_pending`, `kode_barang`, `nama_barang`, `exp_date`, `qty`) VALUES
(1, 'P1', 'K1', 'Abacell 18 EC 40 X 250 ml', '01/12/2026', 365),
(2, 'P2', 'K2', 'Agil 100 EC 40 X 250 ml', '01/12/2028', 240),
(3, 'P3', 'K5', 'Curacron 500 EC 20 X 500 ml', '01/02/2025', 65);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_listmatchallbarang`
-- (See below for the actual view)
--
CREATE TABLE `v_listmatchallbarang` (
`id_barang` int(11)
,`kode_barang` varchar(25)
,`nama_barang` varchar(255)
,`saldo_buku` decimal(32,0)
,`faktur_pending` decimal(32,0)
,`selisih` decimal(34,0)
,`qtyOpname` decimal(32,0)
,`hasil` varchar(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_listmatchfifo`
-- (See below for the actual view)
--
CREATE TABLE `v_listmatchfifo` (
`nama_barang` varchar(255)
,`exp_date` varchar(255)
,`saldo_buku` decimal(32,0)
,`box_buku` int(11)
,`pcs_buku` int(11)
,`faktur_pending` decimal(32,0)
,`saldo_fisik` decimal(32,0)
,`box_fisik` decimal(32,0)
,`pcs_fisik` decimal(32,0)
,`selisih` decimal(34,0)
,`hasil` varchar(9)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_trackingopname`
-- (See below for the actual view)
--
CREATE TABLE `v_trackingopname` (
`id_opname` int(11)
,`kode_barang` varchar(25)
,`kode_pending` varchar(50)
,`nama_barang` varchar(255)
,`exp_date` varchar(255)
,`hasil_dimensi` int(11)
,`stok_box1` int(11)
,`stok_pcs1` int(11)
,`QTY1` int(11)
,`sektor` int(3)
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Structure for view `v_listmatchallbarang`
--
DROP TABLE IF EXISTS `v_listmatchallbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_listmatchallbarang`  AS SELECT `x`.`id_barang` AS `id_barang`, `x`.`kode_barang` AS `kode_barang`, `x`.`nama_barang` AS `nama_barang`, `x`.`qtyZahir` AS `saldo_buku`, coalesce(`x`.`qtyPending`,0) AS `faktur_pending`, coalesce(`x`.`qtyOpname`,0) - coalesce(`x`.`qtyPending`,0) - `x`.`qtyZahir` AS `selisih`, coalesce(`x`.`qtyOpname`,0) AS `qtyOpname`, CASE WHEN coalesce(`x`.`qtyOpname`,0) - coalesce(`x`.`qtyPending`,0) = `x`.`qtyZahir` THEN 'match' ELSE 'not match' END AS `hasil` FROM (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,sum(`a`.`qty`) AS `qtyZahir`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` group by `c`.`kode_barang`) AS `qtyPending`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` group by `b`.`kode_barang`) AS `qtyOpname` from `tb_barang_zahir` `a` group by `a`.`kode_barang`) AS `x` ORDER BY `x`.`id_barang` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_listmatchfifo`
--
DROP TABLE IF EXISTS `v_listmatchfifo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_listmatchfifo`  AS SELECT `x`.`nama_barang` AS `nama_barang`, `x`.`exp_date` AS `exp_date`, `x`.`qtyZahir` AS `saldo_buku`, `x`.`stok_box` AS `box_buku`, `x`.`stok_pcs` AS `pcs_buku`, coalesce(`x`.`qtyPending`,0) AS `faktur_pending`, coalesce(`x`.`qtyOpname`,0) AS `saldo_fisik`, coalesce(`x`.`stkbox`,0) AS `box_fisik`, coalesce(`x`.`stkpcs`,0) AS `pcs_fisik`, coalesce(`x`.`qtyOpname`,0) - coalesce(`x`.`qtyPending`,0) - `x`.`qtyZahir` AS `selisih`, CASE WHEN coalesce(`x`.`qtyOpname`,0) - coalesce(`x`.`qtyPending`,0) = `x`.`qtyZahir` THEN 'match' ELSE 'not match' END AS `hasil` FROM (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`exp_date` AS `exp_date`,`a`.`stok_box` AS `stok_box`,`a`.`stok_pcs` AS `stok_pcs`,(select sum(`g`.`qty`) from `tb_barang_zahir` `g` where `g`.`kode_barang` = `a`.`kode_barang` and `g`.`exp_date` = `a`.`exp_date` group by `g`.`kode_barang`) AS `qtyZahir`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` and `c`.`exp_date` = `a`.`exp_date` group by `c`.`kode_barang`) AS `qtyPending`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` and `b`.`exp_date` = `a`.`exp_date` group by `b`.`kode_barang`) AS `qtyOpname`,(select sum(`d`.`stok_box1`) from `tb_opname` `d` where `d`.`kode_barang` = `a`.`kode_barang` and `d`.`exp_date` = `a`.`exp_date` group by `d`.`kode_barang`) AS `stkbox`,(select sum(`e`.`stok_pcs1`) from `tb_opname` `e` where `e`.`kode_barang` = `a`.`kode_barang` and `e`.`exp_date` = `a`.`exp_date` group by `e`.`kode_barang`) AS `stkpcs`,(select `f`.`QTY1` from `tb_opname` `f` where `f`.`kode_barang` = `a`.`kode_barang` group by `f`.`kode_barang`) AS `salqty` from `tb_barang_zahir` `a` group by `a`.`kode_barang`,`a`.`nama_barang`,`a`.`exp_date`) AS `x` ORDER BY `x`.`id_barang` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_trackingopname`
--
DROP TABLE IF EXISTS `v_trackingopname`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_trackingopname`  AS SELECT `a`.`id_opname` AS `id_opname`, `a`.`kode_barang` AS `kode_barang`, `a`.`kode_pending` AS `kode_pending`, `a`.`nama_barang` AS `nama_barang`, `a`.`exp_date` AS `exp_date`, `b`.`hasil_dimensi` AS `hasil_dimensi`, `a`.`stok_box1` AS `stok_box1`, `a`.`stok_pcs1` AS `stok_pcs1`, `a`.`QTY1` AS `QTY1`, `a`.`sektor` AS `sektor`, `a`.`keterangan` AS `keterangan` FROM (`tb_opname` `a` join `tb_master_barang` `b` on(`b`.`kode_barang` = `a`.`kode_barang` and `b`.`exp_date` = `a`.`exp_date`)) ;

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  MODIFY `id_master_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_opname`
--
ALTER TABLE `tb_opname`
  MODIFY `id_opname` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pending`
--
ALTER TABLE `tb_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
