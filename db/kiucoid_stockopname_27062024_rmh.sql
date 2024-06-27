-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 05:03 PM
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
  `qty` int(11) NOT NULL,
  `exp_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rq_exp_tmp`
--

CREATE TABLE `tb_rq_exp_tmp` (
  `id_tmp_req` int(11) NOT NULL,
  `kode_barang` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `hasil_dimensi` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `stok_box` int(11) DEFAULT NULL,
  `stok_pcs` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `sektor` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_listmatchallbarang`
-- (See below for the actual view)
--
CREATE TABLE `v_listmatchallbarang` (
`kode_barang` varchar(25)
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
-- Stand-in structure for view `v_requestexp`
-- (See below for the actual view)
--
CREATE TABLE `v_requestexp` (
`id_tmp_req` int(11)
,`kode_barang` varchar(25)
,`nama_barang` varchar(255)
,`exp_date` varchar(255)
,`panjang` int(11)
,`lebar` int(11)
,`tinggi` int(11)
,`hasil_dimensi` int(11)
,`qty` int(11)
,`stok_box` int(11)
,`stok_pcs` int(11)
,`keterangan` varchar(255)
,`sektor` int(2)
,`status` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_trackingopname`
-- (See below for the actual view)
--
CREATE TABLE `v_trackingopname` (
`id_opname` int(11)
,`kode_barang` varchar(25)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_listmatchallbarang`  AS SELECT `x`.`kode_barang` AS `kode_barang`, `x`.`nama_barang` AS `nama_barang`, `x`.`qty_a` AS `saldo_buku`, coalesce(`x`.`qty_c`,0) AS `faktur_pending`, coalesce(`x`.`qty_b`,0) - coalesce(`x`.`qty_c`,0) - coalesce(`x`.`qty_a`,0) AS `selisih`, coalesce(`x`.`qty_b`,0) AS `qtyOpname`, CASE WHEN `x`.`qty_b` - coalesce(`x`.`qty_c`,0) = `x`.`qty_a` THEN 'match' ELSE 'not match' END AS `hasil` FROM (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,sum(`a`.`qty`) AS `qty_a`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` group by `c`.`kode_barang`) AS `qty_c`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` group by `b`.`kode_barang`) AS `qty_b` from `tb_barang_zahir` `a` group by `a`.`kode_barang`) AS `x` ORDER BY `x`.`id_barang` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `v_listmatchfifo`
--
DROP TABLE IF EXISTS `v_listmatchfifo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_listmatchfifo`  AS SELECT `x`.`nama_barang` AS `nama_barang`, `x`.`exp_date` AS `exp_date`, `x`.`qtyZahir` AS `saldo_buku`, `x`.`stok_box` AS `box_buku`, `x`.`stok_pcs` AS `pcs_buku`, coalesce(`x`.`qtyPending`,0) AS `faktur_pending`, coalesce(`x`.`qtyOpname`,0) AS `saldo_fisik`, coalesce(`x`.`stkbox`,0) AS `box_fisik`, coalesce(`x`.`stkpcs`,0) AS `pcs_fisik`, coalesce(`x`.`qtyOpname`,0) - coalesce(`x`.`qtyPending`,0) - `x`.`qtyZahir` AS `selisih`, CASE WHEN coalesce(`x`.`qtyOpname`,0) - coalesce(`x`.`qtyPending`,0) = `x`.`qtyZahir` THEN 'match' ELSE 'not match' END AS `hasil` FROM (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`exp_date` AS `exp_date`,`a`.`stok_box` AS `stok_box`,`a`.`stok_pcs` AS `stok_pcs`,(select sum(`g`.`qty`) from `tb_barang_zahir` `g` where `g`.`kode_barang` = `a`.`kode_barang` and `g`.`exp_date` = `a`.`exp_date` group by `g`.`kode_barang`) AS `qtyZahir`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` and `c`.`exp_date` = `a`.`exp_date` group by `c`.`kode_barang`) AS `qtyPending`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` and `b`.`exp_date` = `a`.`exp_date` group by `b`.`kode_barang`) AS `qtyOpname`,(select sum(`d`.`stok_box1`) from `tb_opname` `d` where `d`.`kode_barang` = `a`.`kode_barang` and `d`.`exp_date` = `a`.`exp_date` group by `d`.`kode_barang`) AS `stkbox`,(select sum(`e`.`stok_pcs1`) from `tb_opname` `e` where `e`.`kode_barang` = `a`.`kode_barang` and `e`.`exp_date` = `a`.`exp_date` group by `e`.`kode_barang`) AS `stkpcs`,(select `f`.`QTY1` from `tb_opname` `f` where `f`.`kode_barang` = `a`.`kode_barang` group by `f`.`kode_barang`) AS `salqty` from `tb_barang_zahir` `a` group by `a`.`kode_barang`,`a`.`nama_barang`,`a`.`exp_date`) AS `x` ORDER BY `x`.`id_barang` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `v_requestexp`
--
DROP TABLE IF EXISTS `v_requestexp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_requestexp`  AS SELECT `a`.`id_tmp_req` AS `id_tmp_req`, `a`.`kode_barang` AS `kode_barang`, `a`.`nama_barang` AS `nama_barang`, `a`.`exp_date` AS `exp_date`, `a`.`panjang` AS `panjang`, `a`.`lebar` AS `lebar`, `a`.`tinggi` AS `tinggi`, `a`.`hasil_dimensi` AS `hasil_dimensi`, `a`.`qty` AS `qty`, `a`.`stok_box` AS `stok_box`, `a`.`stok_pcs` AS `stok_pcs`, `a`.`keterangan` AS `keterangan`, `a`.`sektor` AS `sektor`, `a`.`status` AS `status` FROM `tb_rq_exp_tmp` AS `a` WHERE `a`.`status` = '1''1'  ;

-- --------------------------------------------------------

--
-- Structure for view `v_trackingopname`
--
DROP TABLE IF EXISTS `v_trackingopname`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_trackingopname`  AS SELECT `a`.`id_opname` AS `id_opname`, `a`.`kode_barang` AS `kode_barang`, `a`.`nama_barang` AS `nama_barang`, `a`.`exp_date` AS `exp_date`, `b`.`hasil_dimensi` AS `hasil_dimensi`, `a`.`stok_box1` AS `stok_box1`, `a`.`stok_pcs1` AS `stok_pcs1`, `a`.`QTY1` AS `QTY1`, `a`.`sektor` AS `sektor`, `a`.`keterangan` AS `keterangan` FROM (`tb_opname` `a` join `tb_barang_zahir` `b` on(`b`.`kode_barang` = `a`.`kode_barang` and `b`.`exp_date` = `a`.`exp_date`))  ;

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
-- Indexes for table `tb_rq_exp_tmp`
--
ALTER TABLE `tb_rq_exp_tmp`
  ADD PRIMARY KEY (`id_tmp_req`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  MODIFY `id_master_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_opname`
--
ALTER TABLE `tb_opname`
  MODIFY `id_opname` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pending`
--
ALTER TABLE `tb_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rq_exp_tmp`
--
ALTER TABLE `tb_rq_exp_tmp`
  MODIFY `id_tmp_req` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
