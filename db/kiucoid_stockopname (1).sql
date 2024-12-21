-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2024 pada 08.08
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
  `inputer_edit` text NOT NULL,
  `keterangan_edit` text NOT NULL,
  `input_at` datetime NOT NULL,
  `edit_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 3240, '0000-00-00', '-'),
(2, 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 2798, '0000-00-00', '-'),
(3, 'QAKAL02', 'Akalis 550 SC 20 X 500 ml', 7, '0000-00-00', '-'),
(4, 'QAKAL03', 'Akalis 550 SC 40 X 250 ml', 1653, '0000-00-00', '-'),
(5, 'QDECI01', 'Decis 2.5 EC 100 X 100 ml', 7897, '0000-00-00', '-'),
(6, 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', 95, '0000-00-00', '-'),
(7, 'QJAGU76', 'Jagung Q-235 10 X 1 Kg', 211, '0000-00-00', '-'),
(8, 'QMARS05', 'Marshal 25 DS 50 X 100 gr', 11564, '0000-00-00', '-'),
(9, 'QMATA02', 'Matador 25 EC 100 X 50 ml', 22050, '0000-00-00', '-');

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
  MODIFY `id_opname` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
