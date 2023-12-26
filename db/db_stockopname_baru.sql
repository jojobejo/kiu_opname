-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 08:55 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stockopname`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `countfivo`
-- (See below for the actual view)
--
CREATE TABLE `countfivo` (
`total` bigint(21)
,`match` bigint(21)
,`not` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hitung_persentase_kecocokan`
-- (See below for the actual view)
--
CREATE TABLE `hitung_persentase_kecocokan` (
`total` bigint(21)
,`match` bigint(21)
,`not` bigint(21)
);

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
(1, '-', 'QABAC01', 'Abacell 18 EC 10 X 1 ltr', 10, 1, 1, 10, 257, 6, 2576, '01/08/2025', ''),
(2, '-', 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 20, 1, 1, 20, 0, 15, 15, '01/08/2025', ''),
(3, 'PND0002', 'QABAC03', 'Abacell 18 EC 20 X 500 ml', 20, 1, 1, 20, 177, 0, 3540, '01/02/2026', ''),
(4, 'PND0003', 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 40, 1, 1, 40, 49, 17, 1977, '01/04/2024', ''),
(5, '-', 'QABAC04', 'Abacell 18 EC 40 X 250 ml', 40, 1, 1, 40, 150, 0, 6000, '01/09/2024', ''),
(6, '-', 'QABAC07', 'Abacell 18 EC 50 X 100 ml', 50, 1, 1, 50, 21, 0, 1050, '01/12/2024', ''),
(7, 'PND0004', 'QABAC07', 'Abacell 18 EC 50 X 100 ml', 50, 1, 1, 50, 400, 18, 20018, '01/11/2024', ''),
(8, '-', 'QABAD02', 'Abado 50 WP 20 X 20 X 10 gr', 20, 20, 1, 400, 12, 86, 4886, '01/07/2027', ''),
(9, '-', 'QABAD01', 'Abado 50 WP 20 X 6 X 40 gr', 20, 6, 1, 120, 1, 71, 191, '01/09/2026', ''),
(10, '-', 'QABAD01', 'Abado 50 WP 20 X 6 X 40 gr', 20, 6, 1, 120, 10, 0, 1200, '01/12/2027', ''),
(11, '-', 'QABEN01', 'Abenz 22 EC 100 X 100 ml', 100, 1, 1, 100, 16, 43, 1643, '01/08/2027', ''),
(12, '-', 'QABEN02', 'Abenz 22 EC 40 X 250 ml', 40, 1, 1, 40, 114, 12, 4572, '01/07/2027', ''),
(13, '-', 'QABOJ02', 'Abojo 60 WP 10 X 20 X 50 gr', 10, 20, 1, 200, 50, 136, 10136, '01/12/2027', ''),
(14, '-', 'QABOJ01', 'Abojo 60 WP 100 X 100 gr', 100, 1, 1, 100, 228, 29, 22829, '01/12/2027', ''),
(15, '-', 'QACAP02', 'Acapela System 280 SC 50 X 100 ml', 50, 1, 1, 50, 18, 0, 900, '01/02/2025', ''),
(16, '-', 'QACCO02', 'Accora 100 EC 15 X 1 ltr', 15, 1, 1, 15, 27, 10, 415, '01/03/2026', ''),
(17, '-', 'AACCO03', 'Accora 100 EC 15 X 1 ltr (Sample)', 15, 1, 1, 15, 0, 1, 1, '01/01/2025', ''),
(18, '-', 'QACCO01', 'Accora 100 EC 20 X 500 ml', 20, 1, 1, 20, 9, 15, 195, '01/02/2026', ''),
(19, '-', 'AACCU01', 'Accu Kayaba Kering 12A - 12 Volt', 1, 1, 1, 1, 1, 0, 1, '1/1/1000', ''),
(20, '-', 'QACEO02', 'Ace One 75 SP 25 X 400 gr', 25, 1, 1, 25, 10, 20, 270, '01/01/2027', ''),
(21, '-', 'QACEO04', 'Ace One 75 SP 50 X 100 gr', 50, 1, 1, 50, 13, 35, 685, '01/06/2027', ''),
(22, '-', 'QACHL01', 'Achlor 4/36 WP 60 X 100 gr', 60, 1, 1, 60, 3, 0, 180, '01/04/2027', ''),
(23, '-', 'QACL02', 'ACL 6 865 SL 25 X 400 ml', 25, 1, 1, 25, 19, 19, 494, '01/09/2027', ''),
(24, '-', 'QACL01', 'ACL 6 865 SL 50 X 200 ml', 50, 1, 1, 50, 17, 34, 884, '01/08/2027', ''),
(25, 'PND0005', 'QACRO03', 'Acrobat WP 20 X 6 X 40 gr', 20, 6, 1, 120, 0, 15, 15, '01/03/2025', ''),
(26, '-', 'QACRO03', 'Acrobat WP 20 X 6 X 40 gr', 20, 6, 1, 120, 84, 0, 10080, '01/10/2025', ''),
(27, '-', 'QADOC01', 'Adoca 150 SC 100 X 100 ml', 100, 1, 1, 100, 0, 49, 49, '01/10/2025', ''),
(28, '-', 'QADOC03', 'Adoca 150 SC 40 X 250 ml', 40, 1, 1, 40, 13, 20, 540, '01/06/2025', ''),
(29, '-', 'QADOC03', 'Adoca 150 SC 40 X 250 ml', 40, 1, 1, 40, 16, 28, 668, '01/10/2025', ''),
(30, '-', 'QADOC03', 'Adoca 150 SC 40 X 250 ml', 40, 1, 1, 40, 46, 0, 1840, '01/08/2025', ''),
(31, '-', 'QAFON04', 'Afonil 50 SC 100 X 100 ml', 100, 1, 1, 100, 23, 80, 2380, '01/02/2025', ''),
(32, '-', 'QAFON03', 'Afonil 50 SC 100 X 50 ml', 100, 1, 1, 100, 25, 0, 2500, '01/03/2025', '');

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
(1, 'QABAC01', '-', 'Abacell 18 EC 10 X 1 ltr', 10, 1, 1, 10, '01/08/2025', NULL),
(2, 'QABAC03', '-', 'Abacell 18 EC 20 X 500 ml', 20, 1, 1, 20, '01/08/2025', NULL),
(3, 'QABAC03', 'PND0002', 'Abacell 18 EC 20 X 500 ml', 20, 1, 1, 20, '01/02/2026', NULL),
(4, 'QABAC04', 'PND0003', 'Abacell 18 EC 40 X 250 ml', 40, 1, 1, 40, '01/04/2024', NULL),
(5, 'QABAC04', '-', 'Abacell 18 EC 40 X 250 ml', 40, 1, 1, 40, '01/09/2024', NULL),
(6, 'QABAC07', '-', 'Abacell 18 EC 50 X 100 ml', 50, 1, 1, 50, '01/12/2024', NULL),
(7, 'QABAC07', 'PND0004', 'Abacell 18 EC 50 X 100 ml', 50, 1, 1, 50, '01/11/2024', NULL),
(8, 'QABAD02', '-', 'Abado 50 WP 20 X 20 X 10 gr', 20, 20, 1, 400, '01/07/2027', NULL),
(9, 'QABAD01', '-', 'Abado 50 WP 20 X 6 X 40 gr', 20, 6, 1, 120, '01/09/2026', NULL),
(10, 'QABAD01', '-', 'Abado 50 WP 20 X 6 X 40 gr', 20, 6, 1, 120, '01/12/2027', NULL),
(11, 'QABEN01', '-', 'Abenz 22 EC 100 X 100 ml', 100, 1, 1, 100, '01/08/2027', NULL),
(12, 'QABEN02', '-', 'Abenz 22 EC 40 X 250 ml', 40, 1, 1, 40, '01/07/2027', NULL),
(13, 'QABOJ02', '-', 'Abojo 60 WP 10 X 20 X 50 gr', 10, 20, 1, 200, '01/12/2027', NULL),
(14, 'QABOJ01', '-', 'Abojo 60 WP 100 X 100 gr', 100, 1, 1, 100, '01/12/2027', NULL),
(15, 'QACAP02', '-', 'Acapela System 280 SC 50 X 100 ml', 50, 1, 1, 50, '01/02/2025', NULL),
(16, 'QACCO02', '-', 'Accora 100 EC 15 X 1 ltr', 15, 1, 1, 15, '01/03/2026', NULL),
(17, 'AACCO03', '-', 'Accora 100 EC 15 X 1 ltr (Sample)', 15, 1, 1, 15, '01/01/2025', NULL),
(18, 'QACCO01', '-', 'Accora 100 EC 20 X 500 ml', 20, 1, 1, 20, '01/02/2026', NULL),
(19, 'AACCU01', '-', 'Accu Kayaba Kering 12A - 12 Volt', 1, 1, 1, 1, '1/1/1000', NULL),
(20, 'QACEO02', '-', 'Ace One 75 SP 25 X 400 gr', 25, 1, 1, 25, '01/01/2027', NULL),
(21, 'QACEO04', '-', 'Ace One 75 SP 50 X 100 gr', 50, 1, 1, 50, '01/06/2027', NULL),
(22, 'QACHL01', '-', 'Achlor 4/36 WP 60 X 100 gr', 60, 1, 1, 60, '01/04/2027', NULL),
(23, 'QACL02', '-', 'ACL 6 865 SL 25 X 400 ml', 25, 1, 1, 25, '01/09/2027', NULL),
(24, 'QACL01', '-', 'ACL 6 865 SL 50 X 200 ml', 50, 1, 1, 50, '01/08/2027', NULL),
(25, 'QACRO03', 'PND0005', 'Acrobat WP 20 X 6 X 40 gr', 20, 6, 1, 120, '01/03/2025', NULL),
(26, 'QACRO03', '-', 'Acrobat WP 20 X 6 X 40 gr', 20, 6, 1, 120, '01/10/2025', NULL),
(27, 'QADOC01', '-', 'Adoca 150 SC 100 X 100 ml', 100, 1, 1, 100, '01/10/2025', NULL),
(28, 'QADOC03', '-', 'Adoca 150 SC 40 X 250 ml', 40, 1, 1, 40, '01/06/2025', NULL),
(29, 'QADOC03', '-', 'Adoca 150 SC 40 X 250 ml', 40, 1, 1, 40, '01/10/2025', NULL),
(30, 'QADOC03', '-', 'Adoca 150 SC 40 X 250 ml', 40, 1, 1, 40, '01/08/2025', NULL),
(31, 'QAFON04', '-', 'Afonil 50 SC 100 X 100 ml', 100, 1, 1, 100, '01/02/2025', NULL),
(32, 'QAFON03', '-', 'Afonil 50 SC 100 X 50 ml', 100, 1, 1, 100, '01/03/2025', NULL);

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
(1, 'PND0001', 'AGUNT01', 'Gunting Gland 8', '1/1/1000', 10),
(2, 'PND0002', 'QABAC03', 'Abacell 18 EC 20 X 500 ml', '01/02/2026', 1021),
(3, 'PND0003', 'QABAC04', 'Abacell 18 EC 40 X 250 ml', '01/04/2024', 2000),
(4, 'PND0004', 'QABAC07', 'Abacell 18 EC 50 X 100 ml', '01/11/2024', 150),
(5, 'PND0005', 'QACRO03', 'Acrobat WP 20 X 6 X 40 gr', '01/03/2025', 12),
(6, 'PND0006', 'QAGIL01', 'Agil 100 EC 100 X 100 ml', '01/01/2028', 45),
(7, 'PND0007', 'QAGRO02', 'Agrogib 40 SL 30 X 15 X 35 ml', '01/03/2028', 450),
(8, 'PND0008', 'QAGUS01', 'Agus 500 SC 100 X 100 ml', '01/02/2026', 60),
(9, 'PND0009', 'QALAT06', 'Alat Kocor Pupuk Padat Quda Karisma', '1/1/1000', 3),
(10, 'PND0010', 'QALFA01', 'Alfatox 50 EC 20 X 400 ml (AGM)', '01/02/2028', 60),
(11, 'PND0011', 'QALFA02', 'Alfatox 50 EC 40 X 200 ml (AGM)', '01/11/2027', 40),
(12, 'PND0012', 'QALFA04', 'Alfatox 50 EC 50 X 80 ml (AGM)', '01/02/2028', 1000),
(13, 'PND0013', 'QAMAB01', 'Amabas 500 EC 16 X 1 ltr', '01/04/2028', 16),
(14, 'PND0014', 'QAMAB02', 'Amabas 500 EC 20 X 400 ml', '01/06/2028', 20),
(15, 'PND0015', 'QAMUR02', 'Amuron 70 EC 40 X 250 ml', '01/06/2027', 40),
(16, 'PND0016', 'QANTR01', 'Antracol 70 WP 12 X 1 kg', '01/09/2024', 12),
(17, 'PND0017', 'QAPPL02', 'Applaud 10 WP 25 X 400 gr', '01/03/2028', 375),
(18, 'PND0018', 'QARME01', 'Armeira 30 WG 10 X 20 X 50 gr', '01/06/2025', 10),
(19, 'PND0019', 'QASIA01', 'Asia Top 288 SL 20 X 1 ltr', '01/05/2028', 20),
(20, 'PND0020', 'QBENA01', 'Benang Pe mlg', '1/1/1000', 100),
(21, 'PND0021', 'QBIGG03', 'Biggrow 20 WP 4 X 75 X 5 gr', '01/07/2027', 300),
(22, 'PND0022', 'QBIGG04', 'Biggrow Forte 6 X 200 X 1 gr', '01/12/2029', 125),
(23, 'PND0023', 'QBION02', 'Bionik 400 EC 20 X 500 ml', '01/03/2028', 40),
(24, 'PND0024', 'QBION03', 'Bionik 400 EC 50 X 100 ml', '01/05/2028', 1250),
(25, 'PND0025', 'QCALC02', 'Calcium 99 20 X 1 kg', '01/01/2028', 80),
(26, 'PND0026', 'QCALC03', 'Calcium D-Diana 20 X 1 kg', '01/04/2028', 20),
(27, 'PND0027', 'QCASTO05', 'Castora 40 SP 8 X 50 X 15 gr ( Sampel )', '01/08/2027', 3),
(28, 'PND0028', 'QCHAM01', 'Champion 77 WP 10 X 1 kg', '01/01/2028', 10),
(29, 'PND0029', 'QCOUN03', 'Council Complete SC 300 100 X 100 ml', '01/09/2024', 200),
(30, 'PND0030', 'QCOUN03', 'Council Complete SC 300 100 X 100 ml', '01/05/2024', 100),
(31, 'PND0031', 'QCURA01', 'Curacron 500 EC 20 X 500 ml', '01/11/2024', 20),
(32, 'PND0032', 'QCURA04', 'Curaterr 3 GR 10 X 2 kg', '01/03/2026', 10),
(33, 'PND0033', 'QDECI02', 'Decis 2.5 EC 100 X 50 ml', '01/06/2027', 800),
(34, 'PND0034', 'QDECI05', 'Decis 2.5 EC 40 X 250 ml', '01/12/2026', 80),
(35, 'PND0035', 'QDEKA01', 'Dekamon 22,43 L 20 X 500 ml', '01/05/2026', 5),
(36, 'PND0036', 'QDEKA05', 'Dekapirim 400 SC 50 X 100 ml', '01/07/2025', 10),
(37, 'PND0037', 'QDEKA07', 'Dekamon 22,43 L 50 X 100 ml', '01/06/2026', 60),
(38, 'PND0038', 'QDEKT02', 'Dektin 30 WG 50 X 50 gr', '01/08/2025', 200),
(40, 'PND0040', 'QDESA02', 'Desanto 200 SL 40 X 250 ml', '01/11/2027', 600),
(41, 'PND0041', 'QDEWA01', 'Dewa Dewi 15 X 1 ltr', '01/01/2028', 15),
(42, 'PND0042', 'QDEWA02', 'Dewa Dewi 20 X 500 ml', '01/01/2028', 20),
(43, 'PND0043', 'QDUMI01', 'Dumil 40 SP 100 X 100 gr', '01/04/2023', 1),
(44, 'PND0044', 'QEDO01', 'Edo 25 WG 100 X 100 gr', '01/08/2027', 100),
(45, 'PND0045', 'QELAZ02', 'Elazaro 17/8 WG 10 X 20 X 10 gr', '01/10/2027', 61),
(46, 'PND0046', 'QEM-401', 'EM-4 Ternak (LC) 15 X 1 ltr', '01/05/2025', 75),
(47, 'PND0047', 'QEM-402', 'EM-4 Tambak (LM) 15 X 1 ltr', '01/04/2025', 75),
(48, 'PND0048', 'QEM-403', 'EM-4 Pertanian (LK) 15 X 1 ltr', '01/03/2025', 150),
(49, 'PND0049', 'QEM-404', 'EM-4 Toilet 15 X 1 ltr', '01/03/2025', 15),
(50, 'PND0050', 'QEMAC01', 'Emacel 30 EC 50 X 100 ml', '01/11/2024', 50),
(51, 'PND0051', 'QFENV03', 'Fenval 200 EC 20 X 500 ml', '01/05/2028', 60),
(52, 'PND0052', 'QFORS02', 'Forsil 20 X 500 ml', '01/05/2028', 10),
(53, 'PND0053', 'QGAME02', 'Gamectin 30 EC 40 X 250 ml', '01/10/2026', 20),
(54, 'PND0054', 'QGAND01', 'Gandasil B/K 144 X 100 gr', '01/01/2026', 432),
(55, 'PND0055', 'QGAND02', 'Gandasil B/K 24 X 500 gr', '01/08/2025', 96),
(56, 'PND0056', 'QGAND02', 'Gandasil B/K 24 X 500 gr', '01/03/2026', 48),
(57, 'PND0057', 'QGAND03', 'Gandasil D/H 144 X 100 gr', '01/08/2025', 750),
(58, 'PND0058', 'QGAND04', 'Gandasil D/H 24 X 500 gr', '01/02/2026', 696),
(59, 'PND0059', 'QGEMB01', 'Gembor GL-10A 12 X 10 ltr', '1/1/1000', 4),
(60, 'PND0060', 'QGIBG03', 'Gibgro 10 SP 25 X 40 X 1 gr', '01/02/2028', 80),
(61, 'PND0061', 'QGOAL02', 'Goal 240 EC 50 X 100 ml', '01/03/2028', 50),
(62, 'PND0062', 'QGOLD14', 'Golden Star 100/300 SL 20 X 1 ltr', '01/12/2027', 20),
(63, 'PND0063', 'QHER01', 'Herole 240 SC 48 X 250 ml', '01/07/2027', 48),
(64, 'PND0064', 'QHEXA02', 'Hexacar 100 SC 40 X 250 ml', '01/08/2027', 680),
(65, 'PND0065', 'QIJOK01', 'Ijokabe 12 X 25 X 20 ml', '01/09/2027', 25),
(66, 'PND0066', 'QJAGU03', 'Jagung Bisi 18 20 X 1 kg', '26/06/2024', 640),
(67, 'PND0067', 'QJAGU13', 'Jagung NK 212 20 X 1 kg', '16/03/2024', 500),
(68, 'PND0068', 'QJAGU17', 'Jagung Pertiwi 3 20 X 1 kg', '01/05/2024', 40),
(69, 'PND0069', 'QJAGU25', 'Jagung Pertiwi 6 20 X 1 kg', '01/05/2024', 220),
(70, 'PND0070', 'QJAGU47', 'Jagung Manis Sweet Lady 27 20 X 500 gr', '01/02/2024', 20),
(71, 'PND0071', 'QJAGU50', 'Jagung Bisi 220 20 X 1 kg', '31/03/2024', 40),
(72, 'PND0072', 'QJAGU64', 'Jagung Manis Exsotic 40 X 250 gr', '01/02/2024', 40),
(73, 'PND0073', 'QJAGU68', 'Jagung DK 771 20 X 1 kg (Bayer)', '09/03/2024', 40),
(74, 'PND0074', 'QJAGU72', 'Jagung Bisi 321 20 X 1 kg (+Kaos)', '10/12/2023', 100),
(75, 'PND0075', 'QKALI01', 'Kaliandra 482 EC 20 X 400 ml (AGM)', '01/05/2028', 80),
(76, 'PND0076', 'QKALI03', 'Kaliandra 482 EC 40 X 200 ml (AGM)', '01/01/2028', 40),
(77, 'PND0077', 'QKALI05', 'Kaliandra 482 EC 50 X 80 ml (AGM)', '01/01/2028', 50),
(78, 'PND0078', 'QKAOS13', 'Kaos MIA Trio Dahsyat', '1/1/1000', 150),
(79, 'PND0079', 'QKAOS14', 'Kaos MIA Kerah Elazaro', '1/1/1000', 5),
(80, 'PND0080', 'QKARI01', 'Karissnail 6 PL 20 X 500 gr (M2U)', '01/05/2026', 60),
(81, 'PND0081', 'QKARI03', 'Karissnail 6 PL 50 X 200 gr (M2U)', '01/05/2026', 100),
(82, 'PND0082', 'QKNO301', 'KNO3 Merah P Tani 15 X 2 kg', '01/04/2026', 390),
(83, 'PND0083', 'QKRES01', 'Kresnadan 3G 10 X 2 kg', '01/01/2028', 90),
(84, 'PND0084', 'QKRES07', 'Kresnatop 500 SC 20 X 1 ltr', '01/06/2028', 20),
(85, 'PND0085', 'QKRES07', 'Kresnatop 500 SC 20 X 1 ltr', '01/05/2028', 40),
(86, 'PND0086', 'QLID01', 'Liding 240 SC 48 X 200 ml', '01/08/2027', 10),
(87, 'PND0087', 'QLIDI02', 'Liding 240 SC 64 X 90 ml', '01/12/2027', 10),
(88, 'PND0088', 'QLOGA03', 'Logamate 440 EC 20 x 500 ml', '01/02/2028', 80),
(89, 'PND0089', 'QMACE01', 'Macerio 52 WP 20 X 500 gr', '01/01/2028', 1900),
(90, 'PND0090', 'QMAND02', 'Mandoxone 276 SL 20 X 1 ltr', '01/09/2027', 60),
(91, 'PND0091', 'QMAND03', 'Mandoxone 276 SL 4 X 5 ltr', '01/12/2027', 20),
(92, 'PND0092', 'QMANZ01', 'Manzate 82 WP 10 X 1 kg', '01/02/2026', 10),
(93, 'PND0093', 'QMEGA09', 'Megaxone 135 SL 20 X 1 ltr', '01/05/2028', 60),
(94, 'PND0094', 'QMEGA10', 'Megaxone 135 SL 4 X 5 ltr', '01/01/2028', 4),
(95, 'PND0095', 'QMETI02', 'Metindo 40 SP 40 X 200 gr', '01/12/2027', 40),
(96, 'PND0096', 'QMETI05', 'Metindo 25 WP 40 X 250 gr', '01/07/2027', 20),
(97, 'PND0097', 'QMEXD06', 'Mexdone 36 EC 20 X 500 ml New', '01/01/2025', 5),
(98, 'PND0098', 'QMIPC02', 'Mipcinta 50 WP 20 X 5 X 100 gr', '01/06/2028', 900),
(99, 'PND0099', 'QMIPC02', 'Mipcinta 50 WP 20 X 5 X 100 gr', '01/05/2028', 15),
(100, 'PND0100', 'QMIPC03', 'Mipcinta 50 WP 20 X 500 gr', '01/04/2028', 100),
(101, 'PND0101', 'QNEMA02', 'Nemaguard 10 GR 20 X 500 gr', '01/02/2027', 20),
(102, 'PND0102', 'QNEMA03', 'Nemaguard 10 GR 10 X 1 kg', '01/09/2026', 20),
(103, 'PND0103', 'QNEOC01', 'Neocron 80 OL 20 X 500 ml', '01/02/2028', 6),
(104, 'PND0104', 'QNEOC02', 'Neocron 80 OL 20 X 250 ml', '01/03/2028', 6),
(105, 'PND0105', 'QNITR01', 'Nitrea Kujang 4 X 5 kg', '01/12/2026', 100),
(106, 'PND0106', 'QNPKC13', 'NPK P Tani 16-16-16 Biru 50 kg', '01/05/2026', 1),
(107, 'PND0107', 'QNPKN01', 'NPK Novatec 12-8-16 25 kg', '01/01/2025', 10),
(108, 'PND0108', 'QOPLO01', 'Oplosan 550/60 EC 50 X 80 ml', '01/01/2026', 50),
(109, 'PND0109', 'QORCA01', 'Orca 480 SL 20 X 1 ltr', '01/12/2027', 20),
(110, 'PND0110', 'QPAPA01', 'Papandayan 486 SL 20 X 1 ltr', '01/10/2027', 80),
(111, 'PND0111', 'QPETR01', 'Petrogenol 800 L 20 X 20 X 5 ml', '01/02/2028', 400),
(112, 'PND0112', 'QPETR02', 'Petrokum 0.005 BB 20 X 10 X 100 gr', '01/02/2028', 200),
(113, 'PND0113', 'QPIRA01', 'Piraklo 250 EC 100 X 100 ml', '01/05/2027', 40),
(114, 'PND0114', 'QPITA01', 'Pita Alat Pengikat Tanaman Yoto 25 X 20 X 1 roll', '1/1/1000', 500),
(115, 'PND0115', 'QPOP02', 'Popzole 525 SE 48 X 240 ml', '01/01/2028', 48),
(116, 'PND0116', 'QPUPU13', 'Pupuk Kompos MPS 40 kg', '1/1/1000', 50),
(117, 'PND0117', 'QQAIS02', 'Qaishar 10 WP 100 X 100 gr', '01/09/2027', 100),
(118, 'PND0118', 'QQIUM06', 'Qiumex 36 EC 40 X 250 ml', '01/03/2028', 40),
(119, 'PND0119', 'QQIUM08', 'Qiumex 36 EC 100 X 100 ml', '01/03/2028', 200),
(120, 'PND0120', 'QQIUT02', 'Qiutane 80 WP 25 X 800 gr Biru', '01/12/2026', 450),
(121, 'PND0121', 'QQIUV03', 'Qiuvita Hijau 32.11.11 100 X 100 gr', '01/05/2024', 10),
(122, 'PND0122', 'QQIUV04', 'Qiuvita Hijau 32.11.11 20 X 500 gr', '01/01/2026', 5),
(123, 'PND0123', 'QQUIL01', 'Quilt 200 SE 40 X 250 ml', '01/06/2024', 160),
(124, 'PND0124', 'QREGE02', 'Regent Red 48 X 100 ml', '01/04/2025', 96),
(125, 'PND0125', 'QREGE03', 'Regent Red 80 X 50 ml', '01/03/2025', 400),
(126, 'PND0126', 'QRICE04', 'Ricestar Xtra 89 OD 40 X 250 ml', '01/10/2024', 200),
(127, 'PND0127', 'QRIDO02', 'Ridomil Gold 350 ES 4 X 20 X 12.5 ml', '01/03/2026', 320),
(128, 'PND0128', 'QRIDO05', 'Ridomil Gold MZ 4/64 WG 40 X 250 gr', '01/06/2024', 40),
(129, 'PND0129', 'QROTR01', 'Rotraz 200 EC 20 X 500 ml', '01/05/2025', 60),
(130, 'PND0130', 'QROUN01', 'Round Up 486 SL 12 X 1 ltr', '01/05/2028', 1140),
(131, 'PND0131', 'QROUN04', 'Round Up 486 SL 50 X 200 ml', '01/05/2028', 550),
(132, 'PND0132', 'QROVR01', 'Rovral 50 WP 120 X 100 gr', '01/09/2024', 120),
(133, 'PND0133', 'QSCOR02', 'Score 250 EC 40 X 250 ml', '01/11/2025', 600),
(134, 'PND0134', 'QSCOR03', 'Score 250 EC 50 X 80 ml', '01/12/2025', 1250),
(135, 'PND0135', 'QSEPE02', 'Sepeda Listrik tipe GD Golden Monkey 140 ( Hitam )', '1/1/1000', 2),
(136, 'PND0136', 'QSEPE03', 'Sepeda Listrik tipe GD Golden Monkey 140 ( Kuning )', '1/1/1000', 1),
(137, 'PND0137', 'QSEPE04', 'Sepeda Listrik tipe GD Golden Monkey 140 ( Merah )', '1/1/1000', 1),
(138, 'PND0138', 'QSPRA45', 'Sprayer Elektrik Satagro 13.7 L', '1/1/1000', 72),
(139, 'PND0139', 'QTALI06', 'Tali Gawar 989 40 X 600 gr', '1/1/1000', 280),
(140, 'PND0140', 'QTANG47', 'Tangki TOP AGRI Single Fungsi 16 ltr baterai', '1/1/1000', 2),
(141, 'PND0141', 'QTANG49', 'Tangki Dragon Star 16 ltr baterai (Biru)', '1/1/1000', 2),
(142, 'PND0142', 'QTANG50', 'Tangki Eye Brand 17 ltr', '1/1/1000', 2),
(143, 'PND0143', 'QTERM03', 'Terminator 135 EC 40 X 250 ml', '01/11/2027', 40),
(144, 'PND0144', 'QTIMU06', 'Timun Wuku 12 X 10 X 20 gr', '12/12/2024', 240),
(145, 'PND0145', 'QTOPB01', 'Topbas 400 SC 50 X 50 ml', '01/01/2028', 25),
(146, 'PND0146', 'QTRIG02', 'Trigard 75 WP 12 X 10 X 25 gr', '01/02/2026', 240),
(147, 'PND0147', 'QTRIP01', 'Trip Oil 100 X 50 ml', '01/05/2028', 100),
(148, 'PND0148', 'QUPRI01', 'Uprise 50 X 100 ml', '01/03/2026', 150),
(149, 'PND0149', 'QVIRT02', 'Virtako 300 SC 100 X 50 ml', '01/06/2025', 100),
(150, 'PND0150', 'QVIRT03', 'Virtako 300 SC 50 X 100 ml', '01/06/2025', 50),
(151, 'PND0151', 'QWALA02', 'Walang 50 EC 20 X 1 ltr', '01/07/2027', 320),
(152, 'PND0152', 'QWEND01', 'Wendry 75 WP 20 X 500 gr (M2U)', '01/06/2026', 20);

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
  `area_inputer` text NOT NULL,
  `team_opname` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `role`, `sektor`, `area_inputer`, `team_opname`) VALUES
(1, 'KIU ADMIN', 'admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 'admin', 0, '', 0),
(2, 'TIM IT', 'IT', '$2y$10$SKXEA2GCi5vt7at9goEyfeRgkM9Jh73t49uBol65Ay.PDzL3DhCSK', 'user', 1, '', 1),
(3, 'wahyu', 'wahyu', '$2y$10$TCd4kiaUP6dSDw9gypUfLeFAWjCFoEvddBH22EHCQfxce9lwiJVt.', 'user', 1, '', 1),
(4, '1 - 2 Atas', 'area1', '$2y$10$SUsQ/eRuTLuSbdLmHv92XuDJdMq5gfI76.aowOPrA4I2QByW0L22i', 'user', 1, '', 1),
(5, '1 - 2 Bawah', 'area2', '$2y$10$FLZKfGV27ueqDHokDaWW/e5FG6NEXsnuNbklHNBLnSmr9VTnP2iG6', 'user', 2, '', 1),
(6, '3 - 4', 'area3', '$2y$10$Zhi1OkyqR1NUhM/vJv5XReCB5HY/PBfVGqwv5ZkUy/KHUbAd6bHMq', 'user', 3, '', 1),
(7, '5 - 6', 'area4', '$2y$10$XzBLihsDBmbg0.aLiawwkOs/kmNtYi8/vYhoHgjuExTOPtxgGna8C', 'user', 4, '', 1),
(8, '7 - 8', 'area5', '$2y$10$V2HAAdT3O9A83Ne2goMtkOh9Hkp3e3FIRgrbyVbETJt0f/ObRLy/O', 'user', 5, '', 1),
(9, '9 - 10 , Gdg Baru 1-3 Atas', 'area6', '$2y$10$1f7baddJnOKbMwfQup3xn.PLaVzjV2Nf0xWRolY24gy2gCIThVSby', 'user', 6, '', 1),
(10, 'G. Benih (Box & Eceran)', 'area7', '$2y$10$tDx0rqvV/7q9cgltPXAhoe2UKinjBgS/Vgw5d9N1eRkNYjSUzvD2q', 'user', 7, '', 1),
(11, 'Eceran 1', 'area8', '$2y$10$V0mIAhpazk2B1V2kIuoZIe.4.HN7a4XIWcm5a/l2v5lYulC2.924G', 'user', 8, '', 1),
(12, 'Eceran 2', 'area9', '$2y$10$rRohRT7Z0MDIYPYgkbGvAuKT/P/wztiApJyEQQzvHnL3nBdis.V2i', 'user', 9, '', 1),
(13, 'Eceran 3', 'area10', '$2y$10$frYGxtEuOil427MSkn0IPux/aQ1w3LQIXkzkxy4ogVqhotZ/gHLiK', 'user', 10, '', 1),
(14, 'Barang Rusak & Sparepart', 'area11', '$2y$10$Fdrne67Qr5TKdV8.4a05AuQocCYiJOhsH2yGuy0JYkWmLoqjeerJ6', 'user', 11, '', 1),
(15, 'Promosi G.FKA, G.Induk & G.Serbaguna', 'area12', '$2y$10$a/5oa48i9xCeh.X9Vg0seu1OtvA/GAOVuf4zyvAwmNwT8Ud.zHE7W', 'user', 12, '', 1),
(16, 'Gdg Baru 1-2', 'area13', '$2y$10$s9fXjFhw5OcRouW1ka1dk.4jnBE7qRmYA2AX8iGd0cSusMf3VBJIW', 'user', 13, '', 1),
(17, 'Gdg Baru 3-4', 'area14', '$2y$10$ai3RuM/GrfANtBZ/HYxCceGLBK6KbZXiS5OhgO8mdHm67se6eIvgW', 'user', 14, '', 1),
(18, 'Gdg Baru 5-7', 'area15', '$2y$10$Wx3NxXx0UwZcgNgtWch3xeUniHMlnDDYC0KADtOFHTedoSqu/mQNO', 'user', 15, '', 1),
(19, 'Gdg Baru 8-9', 'area16', '$2y$10$VsIgzDHVcR.lNt3jGqMkU.6fCWiQKPU8cy3a1GPNpmXJ7u4f/9RKy', 'user', 16, '', 1),
(20, 'Gdg Baru 10-11', 'area17', '$2y$10$H7xv23zGxwiMZ6EqXjkWnuGbodIWS/OwAF0AMBMfIP2zk2j/2IEy.', 'user', 17, '', 1),
(21, 'Gdg Baru 12-13 , Gdg Selatan', 'area18', '$2y$10$lwIe5prq2ifJ3OS0zPb2L.1HcY5Syj9zPlvTBhVnVnquEot3XXTjK', 'user', 18, '', 1),
(22, 'KIU ADMIN', 'admingdg', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 'admin', 0, '', 0),
(23, 'Gdg Percobaan', 'area19', '$2y$10$lwIe5prq2ifJ3OS0zPb2L.1HcY5Syj9zPlvTBhVnVnquEot3XXTjK', 'user', 18, '', 1),
(24, 'KIU ADMIN', 'superadmin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 'admin', 0, '', 0);

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
-- Structure for view `countfivo`
--
DROP TABLE IF EXISTS `countfivo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `countfivo`  AS SELECT count(`x`.`kode_barang`) AS `total`, count(case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` = 0 then 1 else NULL end) AS `match`, count(case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` <> 0 then 1 else NULL end) AS `not` FROM (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`exp_date` AS `exp_date`,`a`.`stok_box` AS `stok_box`,`a`.`stok_pcs` AS `stok_pcs`,(select sum(`g`.`qty`) from `tb_barang_zahir` `g` where `g`.`kode_barang` = `a`.`kode_barang` and `g`.`exp_date` = `a`.`exp_date` group by `g`.`nama_barang`) AS `qty_a`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` and `c`.`exp_date` = `a`.`exp_date` group by `c`.`nama_barang`) AS `qty_c`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` and `b`.`exp_date` = `a`.`exp_date` group by `b`.`nama_barang`) AS `qty_b`,(select sum(`d`.`stok_box1`) from `tb_opname` `d` where `d`.`kode_barang` = `a`.`kode_barang` and `d`.`exp_date` = `a`.`exp_date` group by `d`.`nama_barang`) AS `stkbox`,(select sum(`e`.`stok_pcs1`) from `tb_opname` `e` where `e`.`kode_barang` = `a`.`kode_barang` and `e`.`exp_date` = `a`.`exp_date` group by `e`.`nama_barang`) AS `stkpcs`,(select `f`.`QTY1` from `tb_opname` `f` where `f`.`kode_barang` = `a`.`kode_barang` group by `f`.`nama_barang`) AS `salqty` from `tb_barang_zahir` `a` group by `a`.`nama_barang`,`a`.`exp_date`) AS `x` ORDER BY `x`.`id_barang` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `hitung_persentase_kecocokan`
--
DROP TABLE IF EXISTS `hitung_persentase_kecocokan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hitung_persentase_kecocokan`  AS SELECT count(`x`.`kode_barang`) AS `total`, count(case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` = 0 then 1 else NULL end) AS `match`, count(case when `x`.`qty_b` - coalesce(`x`.`qty_c`,0) - `x`.`qty_a` <> 0 then 1 else NULL end) AS `not` FROM (select `a`.`id_barang` AS `id_barang`,`a`.`kode_barang` AS `kode_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`exp_date` AS `exp_date`,`a`.`stok_box` AS `stok_box`,`a`.`stok_pcs` AS `stok_pcs`,(select sum(`g`.`qty`) from `tb_barang_zahir` `g` where `g`.`kode_barang` = `a`.`kode_barang` group by `g`.`nama_barang`) AS `qty_a`,(select sum(`c`.`qty`) from `tb_pending` `c` where `c`.`kode_barang` = `a`.`kode_barang` group by `c`.`nama_barang`) AS `qty_c`,(select sum(`b`.`QTY1`) from `tb_opname` `b` where `b`.`kode_barang` = `a`.`kode_barang` group by `b`.`nama_barang`) AS `qty_b`,(select sum(`d`.`stok_box1`) from `tb_opname` `d` where `d`.`kode_barang` = `a`.`kode_barang` group by `d`.`nama_barang`) AS `stkbox`,(select sum(`e`.`stok_pcs1`) from `tb_opname` `e` where `e`.`kode_barang` = `a`.`kode_barang` group by `e`.`nama_barang`) AS `stkpcs`,(select `f`.`QTY1` from `tb_opname` `f` where `f`.`kode_barang` = `a`.`kode_barang` group by `f`.`nama_barang`) AS `salqty` from `tb_barang_zahir` `a` group by `a`.`nama_barang`) AS `x` ORDER BY `x`.`id_barang` ASC ;

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  MODIFY `id_master_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_opname`
--
ALTER TABLE `tb_opname`
  MODIFY `id_opname` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pending`
--
ALTER TABLE `tb_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
