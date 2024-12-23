-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2024 pada 09.54
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

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
-- Struktur dari tabel `tb_barang_zahir`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_barang`
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_barang`
--

INSERT INTO `tb_master_barang` (`id_master_barang`, `kode_barang`, `nama_barang`, `panjang`, `lebar`, `tinggi`, `hasil_dimensi`, `keterangan`) VALUES
(1, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 20, 1, 1, 20, '-'),
(2, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 40, 1, 1, 40, '-'),
(3, 'QAKAL02', 'Akalis 550 SC 20 X 500 ml', 20, 1, 1, 20, '-'),
(4, 'QAKAL03', 'Akalis 550 SC 40 X 250 ml', 40, 1, 1, 40, '-'),
(5, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 100, 1, 1, 100, '-'),
(6, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 100, 1, 1, 100, '-'),
(7, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 10, 1, 1, 10, '-'),
(8, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 50, 1, 1, 50, '-'),
(9, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 100, 1, 1, 100, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_opname`
--

CREATE TABLE `tb_opname` (
  `id_opname` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stock_box` int(11) NOT NULL,
  `stock_pcs` int(11) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `sektor` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `inputer` varchar(25) NOT NULL,
  `inputer_edit` text NOT NULL,
  `keterangan_edit` text NOT NULL,
  `input_at` datetime NOT NULL,
  `edit_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_opname`
--

INSERT INTO `tb_opname` (`id_opname`, `kode_barang`, `nama_barang`, `stock_box`, `stock_pcs`, `exp_date`, `qty`, `sektor`, `keterangan`, `inputer`, `inputer_edit`, `keterangan_edit`, `input_at`, `edit_at`) VALUES
(1, 'QDECI01', 'QDECI01', 9, 5, '2028-10-01', 905, 1, '-', 'sektor1', '-', '-', '2024-12-23 06:30:12', '2024-12-23 06:30:12'),
(2, 'QAKAL02', 'QAKAL02', 10, 5, '2023-12-01', 205, 1, '-', 'sektor1', '-', '-', '2024-12-23 06:30:51', '2024-12-23 06:30:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pending`
--

CREATE TABLE `tb_pending` (
  `id_pending` int(11) NOT NULL,
  `kode_pending` varchar(50) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` text NOT NULL,
  `qty` int(11) NOT NULL,
  `exp_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rq_exp_tmp`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldo_all`
--

CREATE TABLE `tb_saldo_all` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` text NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_saldo_all`
--

INSERT INTO `tb_saldo_all` (`id`, `kode_barang`, `nama_barang`, `qty`, `keterangan`) VALUES
(1, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 3240, '-'),
(2, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 2798, '-'),
(3, 'QAKAL02', 'Akalis 550 SC 20 X 500 ml', 7, '-'),
(4, 'QAKAL03', 'Akalis 550 SC 40 X 250 ml', 1653, '-'),
(5, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 7897, '-'),
(6, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 95, '-'),
(7, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 211, '-'),
(8, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 11564, '-'),
(9, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 22050, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldo_exp`
--

CREATE TABLE `tb_saldo_exp` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` text NOT NULL,
  `qty` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_saldo_exp`
--

INSERT INTO `tb_saldo_exp` (`id`, `kode_barang`, `nama_barang`, `qty`, `exp_date`, `keterangan`) VALUES
(1, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 0, '2026-04-01', '-'),
(2, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 0, '1000-01-01', '-'),
(3, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 0, '2026-12-01', '-'),
(4, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 0, '2026-08-01', '-'),
(5, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 0, '2026-12-01', '-'),
(6, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 1240, '2027-09-01', '-'),
(7, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 2000, '2027-10-01', '-'),
(8, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 0, '2026-06-01', '-'),
(9, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 0, '2026-12-01', '-'),
(10, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 0, '2026-06-01', '-'),
(11, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 0, '1000-01-01', '-'),
(12, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 0, '2026-09-01', '-'),
(13, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 0, '2027-09-01', '-'),
(14, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 798, '2027-10-01', '-'),
(15, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 2000, '2027-10-01', '-'),
(16, 'QAKAL02', 'Akalis 550 SC 20 X 500 ml', 0, '2023-12-01', '-'),
(17, 'QAKAL02', 'Akalis 550 SC 20 X 500 ml', 0, '2027-09-01', '-'),
(18, 'QAKAL02', 'Akalis 550 SC 20 X 500 ml', 7, '2026-12-01', '-'),
(19, 'QAKAL02', 'Akalis 550 SC 20 X 500 ml', 0, '2026-12-01', '-'),
(20, 'QAKAL03', 'Akalis 550 SC 40 X 250 ml', 1653, '2025-03-01', '-'),
(21, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2027-12-01', '-'),
(22, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2027-07-01', '-'),
(23, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2027-06-01', '-'),
(24, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2027-06-01', '-'),
(25, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2028-04-01', '-'),
(26, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2028-04-01', '-'),
(27, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2028-03-01', '-'),
(28, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2028-09-01', '-'),
(29, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 97, '2028-09-01', '-'),
(30, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2028-07-01', '-'),
(31, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2028-07-01', '-'),
(32, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 0, '2028-10-01', '-'),
(33, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 7800, '2028-10-01', '-'),
(34, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2027-12-01', '-'),
(35, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2027-10-01', '-'),
(36, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2027-11-01', '-'),
(37, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2027-12-01', '-'),
(38, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2027-10-01', '-'),
(39, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2027-10-01', '-'),
(40, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-02-01', '-'),
(41, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-05-01', '-'),
(42, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-05-01', '-'),
(43, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-05-01', '-'),
(44, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-08-01', '-'),
(45, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-09-01', '-'),
(46, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-08-01', '-'),
(47, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-09-01', '-'),
(48, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 0, '2028-09-01', '-'),
(49, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 95, '2028-10-01', '-'),
(50, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 0, '2024-04-28', '-'),
(51, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 0, '2024-06-29', '-'),
(52, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 0, '2024-03-16', '-'),
(53, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 0, '2024-06-29', '-'),
(54, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 0, '2024-06-29', '-'),
(55, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 0, '2025-06-13', '-'),
(56, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 0, '2024-09-18', '-'),
(57, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 62, '2024-11-19', '-'),
(58, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 75, '2024-11-19', '-'),
(59, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 74, '2024-11-19', '-'),
(60, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 0, '2024-09-01', '-'),
(61, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 0, '2024-09-01', '-'),
(62, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 0, '2024-11-01', '-'),
(63, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 0, '2024-11-01', '-'),
(64, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 0, '2024-11-01', '-'),
(65, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 0, '2024-11-01', '-'),
(66, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 2673, '2025-05-01', '-'),
(67, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 3597, '2025-05-01', '-'),
(68, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 3297, '2025-05-01', '-'),
(69, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 1997, '2025-05-01', '-'),
(70, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 0, '2025-09-01', '-'),
(71, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 0, '2025-11-01', '-'),
(72, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 0, '2025-10-01', '-'),
(73, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 50, '2026-01-01', '-'),
(74, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 0, '2025-12-01', '-'),
(75, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 10000, '2026-01-01', '-'),
(76, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 2000, '2026-01-01', '-'),
(77, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 10000, '2026-08-01', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `role`, `sektor`, `team_opname`) VALUES
(1, 'admin', 'admin', '$2y$10$seJv4qBUldBZQUjvoWUxGuJvtNsO.cLzT.9IGqshkdla6QLxladGW', 'admin', 99, 1),
(2, 'Sektor 1', 'sektor1', '$2y$10$KeBGAKJTXGYXt39wb.FZYedFST5fbIuxQ8hRcHRsYTxsauhoxyNbO', 'user', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_barang_with_expdate`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_barang_with_expdate` (
`id` int(11)
,`kode_barang` varchar(25)
,`nama_barang` text
,`exp_date` date
,`qty` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_barang_with_expdate`
--
DROP TABLE IF EXISTS `v_barang_with_expdate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang_with_expdate`  AS SELECT `a`.`id` AS `id`, `a`.`kode_barang` AS `kode_barang`, `a`.`nama_barang` AS `nama_barang`, `a`.`exp_date` AS `exp_date`, sum(`a`.`qty`) AS `qty` FROM `tb_saldo_exp` AS `a` GROUP BY `a`.`kode_barang`, `a`.`exp_date` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang_zahir`
--
ALTER TABLE `tb_barang_zahir`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  ADD PRIMARY KEY (`id_master_barang`);

--
-- Indeks untuk tabel `tb_opname`
--
ALTER TABLE `tb_opname`
  ADD PRIMARY KEY (`id_opname`);

--
-- Indeks untuk tabel `tb_pending`
--
ALTER TABLE `tb_pending`
  ADD PRIMARY KEY (`id_pending`);

--
-- Indeks untuk tabel `tb_rq_exp_tmp`
--
ALTER TABLE `tb_rq_exp_tmp`
  ADD PRIMARY KEY (`id_tmp_req`);

--
-- Indeks untuk tabel `tb_saldo_all`
--
ALTER TABLE `tb_saldo_all`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_saldo_exp`
--
ALTER TABLE `tb_saldo_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang_zahir`
--
ALTER TABLE `tb_barang_zahir`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  MODIFY `id_master_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_opname`
--
ALTER TABLE `tb_opname`
  MODIFY `id_opname` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pending`
--
ALTER TABLE `tb_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_rq_exp_tmp`
--
ALTER TABLE `tb_rq_exp_tmp`
  MODIFY `id_tmp_req` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_saldo_all`
--
ALTER TABLE `tb_saldo_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_saldo_exp`
--
ALTER TABLE `tb_saldo_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
