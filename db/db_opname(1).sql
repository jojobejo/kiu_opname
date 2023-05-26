-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2023 pada 10.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_opname`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `countfivo`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `countfivo` (
`total` bigint(21)
,`match` bigint(21)
,`not` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `hitung_persentase_kecocokan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `hitung_persentase_kecocokan` (
`total` bigint(21)
,`match` bigint(21)
,`not` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
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
-- Struktur dari tabel `tb_barang_zahir`
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
  `sektor` int(5) NOT NULL,
  `sktor_tambahan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang_zahir`
--

INSERT INTO `tb_barang_zahir` (`id_barang`, `kode_pending`, `kode_barang`, `nama_barang`, `panjang`, `lebar`, `tinggi`, `hasil_dimensi`, `stok_box`, `stok_pcs`, `qty`, `exp_date`, `sektor`, `sktor_tambahan`, `keterangan`) VALUES
(1, '', 'QABAC01', 'Abacell 18 EC 10 X 1 ltr', 10, 1, 1, 10, 16, 2, 162, '01/05/2025', 2, '', ''),
(2, '', 'QABOJ02', 'Abojo 60 WP 10 X 20 X 50 gr', 10, 20, 1, 200, 22, 154, 4554, '01/08/2027', 3, '', ''),
(3, '', 'QACAP02', 'Acapela System 280 SC 50 X 100 ml', 50, 1, 1, 50, 19, 45, 995, '01/09/2023', 4, '', ''),
(4, '', 'QACCO02', 'Accora 100 EC 15 X 1 ltr', 15, 1, 1, 15, 45, 0, 675, '01/03/2026', 4, '', ''),
(5, '', 'QACEO02', 'Ace One 75 SP 25 X 400 gr', 25, 1, 1, 25, 59, 10, 1485, '01/01/2027', 2, '', ''),
(6, '', 'QACL02', 'ACL 6 865 SL 25 X 400 ml', 25, 1, 1, 25, 0, 1, 1, '01/08/2027', 1, '', ''),
(7, 'PENDING01', 'QACRO03', 'Acrobat WP 20 X 6 X 40 gr', 20, 6, 1, 120, 57, 105, 6945, '01/03/2025', 2, '', ''),
(8, '', 'QAFON04', 'Afonil 50 SC 100 X 100 ml', 100, 1, 1, 100, 24, 0, 2400, '01/02/2025', 3, '', ''),
(9, '', 'QAFON03', 'Afonil 50 SC 100 X 50 ml', 100, 1, 1, 100, 25, 0, 2500, '01/03/2025', 1, '', ''),
(10, '', 'QHOKK03', 'Hokky 30 EC 16 X 1 ltr', 16, 1, 1, 16, 20, 0, 320, '01/09/2027', 1, '', ''),
(11, '', 'QHOKK03', 'Hokky 30 EC 16 X 1 ltr', 16, 1, 1, 16, 41, 0, 656, '01/08/2027', 1, '', ''),
(12, '', 'QIJOK01', 'Ijokabe 12 X 25 X 20 ml', 12, 25, 1, 300, 100, 0, 30000, '01/11/2027', 2, '', ''),
(13, '', 'QIJOK01', 'Ijokabe 12 X 25 X 20 ml', 12, 25, 1, 300, 8, 100, 2500, '01/09/2027', 4, '', ''),
(14, '', 'QINSU01', 'Insure Max 510 FS 100 X 25 ml', 100, 1, 1, 100, 270, 9, 27009, '01/04/2024', 4, '', ''),
(15, '', 'QINSU01', 'Insure Max 510 FS 100 X 25 ml', 100, 1, 1, 100, 200, 0, 20000, '01/04/2025', 3, '', ''),
(16, '', 'QKLOP01', 'Kloper 500 SL 20 X 500 ml', 20, 1, 1, 20, 40, 0, 800, '01/11/2027', 4, '', ''),
(17, '', 'QKONS01', 'Konsep 50 EC 40 X 250 ml', 40, 1, 1, 40, 0, 5, 5, '01/07/2025', 4, '', ''),
(18, '', 'QKONS01', 'Konsep 50 EC 40 X 250 ml', 40, 1, 1, 40, 1, 0, 40, '01/10/2026', 4, '', ''),
(19, '', 'QMARS03', 'Marshal 200 EC 24 X 500 ml', 24, 1, 1, 24, 337, 23, 8111, '01/06/2024', 1, '', ''),
(20, '', 'QMARS03', 'Marshal 200 EC 24 X 500 ml', 24, 1, 1, 24, 62, 0, 1488, '01/09/2024', 3, '', ''),
(21, '', 'QMARS03', 'Marshal 200 EC 24 X 500 ml', 24, 1, 1, 24, 110, 13, 2653, '01/04/2024', 1, '', ''),
(22, '', 'QMEXD05', 'Mexdone 36 EC 20 X 1 ltr New', 20, 1, 1, 20, 44, 10, 890, '01/08/2025', 2, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_barang`
--

CREATE TABLE `tb_master_barang` (
  `id_master_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `kode_pending` varchar(50) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `hasil_dimensi` int(11) DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_master_barang`
--

INSERT INTO `tb_master_barang` (`id_master_barang`, `kode_barang`, `kode_pending`, `nama_barang`, `panjang`, `lebar`, `tinggi`, `hasil_dimensi`, `exp_date`, `keterangan`) VALUES
(1, 'QABAC01', '', 'Abacell 18 EC 10 X 1 ltr', 10, 1, 1, 10, '01/05/2025', NULL),
(2, 'QABOJ02', '', 'Abojo 60 WP 10 X 20 X 50 gr', 10, 20, 1, 200, '01/08/2027', NULL),
(3, 'QACAP02', '', 'Acapela System 280 SC 50 X 100 ml', 50, 1, 1, 50, '01/09/2023', NULL),
(4, 'QACCO02', '', 'Accora 100 EC 15 X 1 ltr', 15, 1, 1, 15, '01/03/2026', NULL),
(5, 'QACEO02', '', 'Ace One 75 SP 25 X 400 gr', 25, 1, 1, 25, '01/01/2027', NULL),
(6, 'QACL02', '', 'ACL 6 865 SL 25 X 400 ml', 25, 1, 1, 25, '01/08/2027', NULL),
(7, 'QACRO03', 'PENDING01', 'Acrobat WP 20 X 6 X 40 gr', 20, 6, 1, 120, '01/03/2025', NULL),
(8, 'QAFON04', '', 'Afonil 50 SC 100 X 100 ml', 100, 1, 1, 100, '01/02/2025', NULL),
(9, 'QAFON03', '', 'Afonil 50 SC 100 X 50 ml', 100, 1, 1, 100, '01/03/2025', NULL),
(10, 'QHOKK03', '', 'Hokky 30 EC 16 X 1 ltr', 16, 1, 1, 16, '01/09/2027', NULL),
(11, 'QHOKK03', '', 'Hokky 30 EC 16 X 1 ltr', 16, 1, 1, 16, '01/08/2027', NULL),
(12, 'QIJOK01', '', 'Ijokabe 12 X 25 X 20 ml', 12, 25, 1, 300, '01/11/2027', NULL),
(13, 'QIJOK01', '', 'Ijokabe 12 X 25 X 20 ml', 12, 25, 1, 300, '01/09/2027', NULL),
(14, 'QINSU01', '', 'Insure Max 510 FS 100 X 25 ml', 100, 1, 1, 100, '01/04/2024', NULL),
(15, 'QINSU01', '', 'Insure Max 510 FS 100 X 25 ml', 100, 1, 1, 100, '01/04/2025', NULL),
(16, 'QKLOP01', '', 'Kloper 500 SL 20 X 500 ml', 20, 1, 1, 20, '01/11/2027', NULL),
(17, 'QKONS01', '', 'Konsep 50 EC 40 X 250 ml', 40, 1, 1, 40, '01/07/2025', NULL),
(18, 'QKONS01', '', 'Konsep 50 EC 40 X 250 ml', 40, 1, 1, 40, '01/10/2026', NULL),
(19, 'QMARS03', '', 'Marshal 200 EC 24 X 500 ml', 24, 1, 1, 24, '01/06/2024', NULL),
(20, 'QMARS03', '', 'Marshal 200 EC 24 X 500 ml', 24, 1, 1, 24, '01/09/2024', NULL),
(21, 'QMARS03', '', 'Marshal 200 EC 24 X 500 ml', 24, 1, 1, 24, '01/04/2024', NULL),
(22, 'QMEXD05', '', 'Mexdone 36 EC 20 X 1 ltr New', 20, 1, 1, 20, '01/08/2025', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_opname`
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
  `sektor` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_opname`
--

INSERT INTO `tb_opname` (`id_opname`, `kode_barang`, `nama_barang`, `kode_pending`, `stok_box1`, `stok_pcs1`, `exp_date`, `QTY1`, `sektor`) VALUES
(1, 'QACRO03', 'Acrobat WP 20 X 6 X 40 gr', 'PENDING01', 57, 105, '01/03/2025', 6945, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pending`
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
-- Dumping data untuk tabel `tb_pending`
--

INSERT INTO `tb_pending` (`id_pending`, `kode_pending`, `kode_barang`, `nama_barang`, `exp_date`, `qty`) VALUES
(1, 'PENDING01', 'QACRO03', 'Acrobat WP 20 X 6 X 40 gr', '2025-03-01', 15);

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
(1, 'KIU ADMIN', 'admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 'admin', 0, 0),
(2, 'TIM IT', 'IT', '$2y$10$SKXEA2GCi5vt7at9goEyfeRgkM9Jh73t49uBol65Ay.PDzL3DhCSK', 'user', 1, 1),
(3, 'wahyu', 'wahyu', '$2y$10$TCd4kiaUP6dSDw9gypUfLeFAWjCFoEvddBH22EHCQfxce9lwiJVt.', 'user', 1, 1),
(4, '1 - 2 Atas', 'area1', '$2y$10$SUsQ/eRuTLuSbdLmHv92XuDJdMq5gfI76.aowOPrA4I2QByW0L22i', 'user', 1, 1),
(5, '1 - 2 Bawah', 'area2', '$2y$10$FLZKfGV27ueqDHokDaWW/e5FG6NEXsnuNbklHNBLnSmr9VTnP2iG6', 'user', 2, 1),
(6, '3 - 4', 'area3', '$2y$10$Zhi1OkyqR1NUhM/vJv5XReCB5HY/PBfVGqwv5ZkUy/KHUbAd6bHMq', 'user', 3, 1),
(7, '5 - 6', 'area4', '$2y$10$XzBLihsDBmbg0.aLiawwkOs/kmNtYi8/vYhoHgjuExTOPtxgGna8C', 'user', 4, 1),
(8, '7 - 8', 'area5', '$2y$10$V2HAAdT3O9A83Ne2goMtkOh9Hkp3e3FIRgrbyVbETJt0f/ObRLy/O', 'user', 5, 1),
(9, '9 - 10', 'area6', '$2y$10$1f7baddJnOKbMwfQup3xn.PLaVzjV2Nf0xWRolY24gy2gCIThVSby', 'user', 6, 1),
(10, 'G. Benih (Box & Eceran)', 'area7', '$2y$10$tDx0rqvV/7q9cgltPXAhoe2UKinjBgS/Vgw5d9N1eRkNYjSUzvD2q', 'user', 7, 1),
(11, 'Eceran 1', 'area8', '$2y$10$V0mIAhpazk2B1V2kIuoZIe.4.HN7a4XIWcm5a/l2v5lYulC2.924G', 'user', 8, 1),
(12, 'Eceran 2', 'area9', '$2y$10$rRohRT7Z0MDIYPYgkbGvAuKT/P/wztiApJyEQQzvHnL3nBdis.V2i', 'user', 9, 1),
(13, 'Eceran 3', 'area10', '$2y$10$frYGxtEuOil427MSkn0IPux/aQ1w3LQIXkzkxy4ogVqhotZ/gHLiK', 'user', 10, 1),
(14, 'Barang Rusak & Sparepart', 'area11', '$2y$10$Fdrne67Qr5TKdV8.4a05AuQocCYiJOhsH2yGuy0JYkWmLoqjeerJ6', 'user', 11, 1),
(15, 'Promosi G.FKA, G.Induk & G.Serbaguna', 'area12', '$2y$10$a/5oa48i9xCeh.X9Vg0seu1OtvA/GAOVuf4zyvAwmNwT8Ud.zHE7W', 'user', 12, 1),
(16, 'Gdg Baru 1-3 Atas & Gdg Selatan', 'area13', '$2y$10$s9fXjFhw5OcRouW1ka1dk.4jnBE7qRmYA2AX8iGd0cSusMf3VBJIW', 'user', 13, 1),
(17, 'Gdg Baru 1-2', 'area14', '$2y$10$ai3RuM/GrfANtBZ/HYxCceGLBK6KbZXiS5OhgO8mdHm67se6eIvgW', 'user', 14, 1),
(18, 'Gdg Baru 3-4', 'area15', '$2y$10$Wx3NxXx0UwZcgNgtWch3xeUniHMlnDDYC0KADtOFHTedoSqu/mQNO', 'user', 15, 1),
(19, 'Gdg Baru 5-7', 'area16', '$2y$10$VsIgzDHVcR.lNt3jGqMkU.6fCWiQKPU8cy3a1GPNpmXJ7u4f/9RKy', 'user', 16, 1),
(20, 'Gdg Baru 8-10', 'area17', '$2y$10$H7xv23zGxwiMZ6EqXjkWnuGbodIWS/OwAF0AMBMfIP2zk2j/2IEy.', 'user', 17, 1),
(21, 'Gdg Baru 11-13', 'area18', '$2y$10$lwIe5prq2ifJ3OS0zPb2L.1HcY5Syj9zPlvTBhVnVnquEot3XXTjK', 'user', 18, 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_listmatchallbarang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_listmatchallbarang` (
`kode_barang` varchar(25)
,`nama_barang` varchar(255)
,`sektor` int(5)
,`saldo_buku` decimal(32,0)
,`faktur_pending` decimal(32,0)
,`selisih` decimal(34,0)
,`qtyOpname` decimal(32,0)
,`hasil` varchar(9)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_listmatchfifo`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_listmatchfifo` (
`nama_barang` varchar(255)
,`exp_date` varchar(255)
,`sektor` int(5)
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
-- Struktur untuk view `countfivo`
--
DROP TABLE IF EXISTS `countfivo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `countfivo`  AS  select count(`x`.`kode_barang`) AS `total`,count(case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` = 0 then 1 else NULL end) AS `match`,count(case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` <> 0 then 1 else NULL end) AS `not` from (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`exp_date` AS `exp_date`,`a`.`sektor` AS `sektor`,`a`.`stok_box` AS `stok_box`,`a`.`stok_pcs` AS `stok_pcs`,`a`.`sktor_tambahan` AS `sktor_tambahan`,(select sum(`g`.`qty`) from `tb_barang_zahir` `g` where `g`.`kode_barang` = `a`.`kode_barang` and `g`.`exp_date` = `a`.`exp_date` group by `g`.`nama_barang`) AS `qty_a`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` and `c`.`exp_date` = `a`.`exp_date` group by `c`.`nama_barang`) AS `qty_c`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` and `b`.`exp_date` = `a`.`exp_date` group by `b`.`nama_barang`) AS `qty_b`,(select sum(`d`.`stok_box1`) from `tb_opname` `d` where `d`.`kode_barang` = `a`.`kode_barang` and `d`.`exp_date` = `a`.`exp_date` group by `d`.`nama_barang`) AS `stkbox`,(select sum(`e`.`stok_pcs1`) from `tb_opname` `e` where `e`.`kode_barang` = `a`.`kode_barang` and `e`.`exp_date` = `a`.`exp_date` group by `e`.`nama_barang`) AS `stkpcs`,(select `f`.`QTY1` from `tb_opname` `f` where `f`.`kode_barang` = `a`.`kode_barang` group by `f`.`nama_barang`) AS `salqty` from `tb_barang_zahir` `a` group by `a`.`nama_barang`,`a`.`exp_date`) `x` order by `x`.`id_barang` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `hitung_persentase_kecocokan`
--
DROP TABLE IF EXISTS `hitung_persentase_kecocokan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hitung_persentase_kecocokan`  AS  select count(`x`.`kode_barang`) AS `total`,count(case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` = 0 then 1 else NULL end) AS `match`,count(case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` <> 0 then 1 else NULL end) AS `not` from (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`exp_date` AS `exp_date`,`a`.`sektor` AS `sektor`,`a`.`stok_box` AS `stok_box`,`a`.`stok_pcs` AS `stok_pcs`,`a`.`sktor_tambahan` AS `sktor_tambahan`,(select sum(`g`.`qty`) from `tb_barang_zahir` `g` where `g`.`kode_barang` = `a`.`kode_barang` group by `g`.`nama_barang`) AS `qty_a`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` group by `c`.`nama_barang`) AS `qty_c`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` group by `b`.`nama_barang`) AS `qty_b`,(select sum(`d`.`stok_box1`) from `tb_opname` `d` where `d`.`kode_barang` = `a`.`kode_barang` group by `d`.`nama_barang`) AS `stkbox`,(select sum(`e`.`stok_pcs1`) from `tb_opname` `e` where `e`.`kode_barang` = `a`.`kode_barang` group by `e`.`nama_barang`) AS `stkpcs`,(select `f`.`QTY1` from `tb_opname` `f` where `f`.`kode_barang` = `a`.`kode_barang` group by `f`.`nama_barang`) AS `salqty` from `tb_barang_zahir` `a` group by `a`.`nama_barang`) `x` order by `x`.`id_barang` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_listmatchallbarang`
--
DROP TABLE IF EXISTS `v_listmatchallbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_listmatchallbarang`  AS  select `x`.`kode_barang` AS `kode_barang`,`x`.`nama_barang` AS `nama_barang`,`x`.`sektor` AS `sektor`,`x`.`qty_a` AS `saldo_buku`,coalesce(`x`.`qty_c`,0) AS `faktur_pending`,coalesce(`x`.`qty_b`,0) - coalesce(`x`.`qty_c`,0) - coalesce(`x`.`qty_a`,0) AS `selisih`,coalesce(`x`.`qty_b`,0) AS `qtyOpname`,case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) = `x`.`qty_a` then 'match' else 'not match' end AS `hasil` from (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`sektor` AS `sektor`,sum(`a`.`qty`) AS `qty_a`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` group by `c`.`kode_barang`) AS `qty_c`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` group by `b`.`kode_barang`) AS `qty_b` from `tb_barang_zahir` `a` group by `a`.`kode_barang`) `x` order by `x`.`id_barang` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_listmatchfifo`
--
DROP TABLE IF EXISTS `v_listmatchfifo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_listmatchfifo`  AS  select `x`.`nama_barang` AS `nama_barang`,`x`.`exp_date` AS `exp_date`,`x`.`sektor` AS `sektor`,`x`.`qty_a` AS `saldo_buku`,`x`.`stok_box` AS `box_buku`,`x`.`stok_pcs` AS `pcs_buku`,coalesce(`x`.`qty_c`,0) AS `faktur_pending`,coalesce(`x`.`qty_b`,0) AS `saldo_fisik`,coalesce(`x`.`stkbox`,0) AS `box_fisik`,coalesce(`x`.`stkpcs`,0) AS `pcs_fisik`,coalesce(`x`.`qty_b`,0) - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` AS `selisih`,case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) = `x`.`qty_a` then 'match' else 'not match' end AS `hasil` from (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`exp_date` AS `exp_date`,`a`.`sektor` AS `sektor`,`a`.`stok_box` AS `stok_box`,`a`.`stok_pcs` AS `stok_pcs`,`a`.`sktor_tambahan` AS `sktor_tambahan`,(select sum(`g`.`qty`) from `tb_barang_zahir` `g` where `g`.`kode_barang` = `a`.`kode_barang` and `g`.`exp_date` = `a`.`exp_date` group by `g`.`kode_barang`) AS `qty_a`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` group by `c`.`kode_barang`) AS `qty_c`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` and `b`.`exp_date` = `a`.`exp_date` group by `b`.`kode_barang`) AS `qty_b`,(select sum(`d`.`stok_box1`) from `tb_opname` `d` where `d`.`kode_barang` = `a`.`kode_barang` and `d`.`exp_date` = `a`.`exp_date` group by `d`.`kode_barang`) AS `stkbox`,(select sum(`e`.`stok_pcs1`) from `tb_opname` `e` where `e`.`kode_barang` = `a`.`kode_barang` and `e`.`exp_date` = `a`.`exp_date` group by `e`.`kode_barang`) AS `stkpcs`,(select `f`.`QTY1` from `tb_opname` `f` where `f`.`kode_barang` = `a`.`kode_barang` group by `f`.`kode_barang`) AS `salqty` from `tb_barang_zahir` `a` group by `a`.`kode_barang`,`a`.`nama_barang`,`a`.`exp_date`) `x` order by `x`.`id_barang` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_zahir`
--
ALTER TABLE `tb_barang_zahir`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  MODIFY `id_master_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_opname`
--
ALTER TABLE `tb_opname`
  MODIFY `id_opname` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pending`
--
ALTER TABLE `tb_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
