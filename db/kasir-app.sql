-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 05:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_customer`, `status`) VALUES
(1, 'Rijki Juhara', 'Karyawan'),
(2, 'Diki Nur Rahman', 'Mahasiswa'),
(3, 'Rangga Framadya Nenoooo', 'Mahasiswa'),
(4, 'Haisyam Maulana', 'Karyawan'),
(5, 'Kiki Supendi', 'Karyawan'),
(6, 'Nabil', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `dt_pembelian`
--

CREATE TABLE `dt_pembelian` (
  `id` varchar(14) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_pembelian`
--

INSERT INTO `dt_pembelian` (`id`, `id_produk`, `id_owner`, `nama_owner`, `nama_produk`, `harga_beli`, `harga_jual`, `qty`) VALUES
('20220713111947', 2, 1, 'RE', 'super star', 1060, 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dt_penjualan`
--

CREATE TABLE `dt_penjualan` (
  `id` varchar(14) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_penjualan`
--

INSERT INTO `dt_penjualan` (`id`, `id_produk`, `id_owner`, `nama_owner`, `nama_produk`, `harga_beli`, `harga_jual`, `qty`) VALUES
('20220713105600', 2, 1, 'RE', 'super star', 1060, 2000, 1),
('20220713115511', 2, 1, 'RE', 'super star', 1060, 2000, 2),
('20220713115607', 3, 1, 'RE', 'timtam', 850, 1000, 2),
('20220713115716', 4, 1, 'RE', 'ozlo cookies', 1690, 2000, 4),
('20220713115716', 2, 1, 'RE', 'super star', 1060, 2000, 2),
('20220713121914', 2, 1, 'RE', 'super star', 1060, 2000, 1),
('20221018043040', 2, 1, 'RE', 'super star', 1060, 2000, 1),
('20221018043056', 3, 1, 'RE', 'timtam', 850, 1000, 1),
('20221018073508', 3, 1, 'RE', 'timtam', 850, 1000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ht_pembelian`
--

CREATE TABLE `ht_pembelian` (
  `id` varchar(14) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `total_bayar` float NOT NULL,
  `kasir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ht_pembelian`
--

INSERT INTO `ht_pembelian` (`id`, `id_supplier`, `nama_supplier`, `waktu`, `total_bayar`, `kasir`) VALUES
('20220713111947', 1, 'PT. Indofood', '2022-07-13 16:19:47', 1060, 'Nabila Azzahra');

-- --------------------------------------------------------

--
-- Table structure for table `ht_penjualan`
--

CREATE TABLE `ht_penjualan` (
  `id` varchar(14) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `total_bayar` float NOT NULL,
  `status` varchar(12) NOT NULL,
  `kasir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ht_penjualan`
--

INSERT INTO `ht_penjualan` (`id`, `id_customer`, `nama_customer`, `waktu`, `total_bayar`, `status`, `kasir`) VALUES
('20220713105600', 2, 'Diki Nur Rahman', '0000-00-00 00:00:00', 2000, 'Mahasiswa', 'Nabila Azzahra'),
('20220713115511', 1, 'Rijki Juhara', '2022-07-13 16:55:11', 1000, 'Karyawan', 'Nabila Azzahra'),
('20220713115607', 1, 'Rijki Juhara', '2022-07-13 16:56:07', 1000, 'Karyawan', 'Nabila Azzahra'),
('20220713115716', 1, 'Rijki Juhara', '2022-07-13 16:57:16', 6000, 'Karyawan', 'Nabila Azzahra'),
('20220713121914', 2, 'Diki Nur Rahman', '2022-07-13 17:19:14', 2000, 'Mahasiswa', 'Nabila Azzahra'),
('20221018043040', 2, 'Diki Nur Rahman', '2022-10-18 09:30:40', 2000, 'Mahasiswa', 'Nabila Azzahra'),
('20221018043056', 3, 'Rangga Framadya Neno', '2022-10-18 09:30:56', 1000, 'Mahasiswa', 'Nabila Azzahra'),
('20221018073508', 3, 'Rangga Framadya Nenoooo', '2022-10-18 12:35:08', 8000, 'Mahasiswa', 'Nabila Azzahra');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'ATK'),
(2, 'Ice Cream'),
(3, 'Makanan'),
(4, 'Masker'),
(5, 'Minuman'),
(6, 'Minuman Botol'),
(7, 'Minuman Cup'),
(8, 'Minuman Kaleng'),
(9, 'Minuman Kotak'),
(10, 'Minuman Sachet'),
(11, 'Obat'),
(12, 'Pembalut'),
(13, 'Permen'),
(14, 'Tisu'),
(16, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `nama_owner` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `nama_owner`, `no_hp`, `alamat`) VALUES
(1, 'RE', '81234567890', 'Tasikmalaya'),
(2, 'Ade Rohmat Nurjaman', '81236995874', 'Ciamis'),
(3, 'Firman Nurdiansah Saputra', '83695100200', 'Ciamis'),
(5, 'AKU', '93895340875', 'Tasikmalaya');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `qty` int(3) NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_kategori`, `id_owner`, `nama_produk`, `qty`, `harga_beli`, `harga_jual`, `insert_date`, `update_date`) VALUES
(1, 3, 1, 'Silver Queen Mede Cashew (33 gram)', 100, 6600, 9000, '2022-06-08 16:42:57', '2022-07-11 06:47:31'),
(2, 3, 1, 'super star', 94, 1060, 2000, '2022-06-08 16:42:57', NULL),
(3, 3, 1, 'timtam', 89, 850, 1000, '2022-06-08 16:42:57', NULL),
(4, 3, 1, 'ozlo cookies', 96, 1690, 2000, '2022-06-08 16:42:57', NULL),
(5, 3, 1, 'gery o donuts', 100, 454, 1000, '2022-06-08 16:42:57', NULL),
(6, 3, 1, 'good time', 100, 800, 1500, '2022-06-08 16:42:57', NULL),
(7, 3, 1, 'oreo soft cake', 100, 1716, 2500, '2022-06-08 16:42:57', NULL),
(8, 3, 1, 'gery salut wafer coklat', 100, 416, 500, '2022-06-08 16:42:57', NULL),
(9, 3, 1, 'oreo original isi 4', 100, 1683, 2000, '2022-06-08 16:42:57', NULL),
(10, 3, 1, 'gery salut wafer coconut', 100, 1575, 2000, '2022-06-08 16:42:57', NULL),
(11, 3, 1, 'nabati vervet', 100, 1615, 2000, '2022-06-08 16:42:57', NULL),
(12, 3, 1, 'bengbeng', 100, 1664, 2000, '2022-06-08 16:42:57', NULL),
(13, 3, 1, 'momogi stik', 100, 435, 500, '2022-06-08 16:42:57', NULL),
(14, 3, 1, 'siip bite', 100, 1630, 2500, '2022-06-08 16:42:57', NULL),
(15, 13, 1, 'bontea green', 100, 119, 250, '2022-06-08 16:42:57', NULL),
(16, 13, 1, 'relaxa', 100, 88, 166, '2022-06-08 16:42:57', NULL),
(17, 3, 1, 'mayasi kecil', 100, 773, 1000, '2022-06-08 16:42:57', NULL),
(18, 3, 1, 'brotatoz', 100, 1620, 2000, '2022-06-08 16:42:57', NULL),
(19, 3, 1, 'potato q', 100, 1570, 2000, '2022-06-08 16:42:57', NULL),
(20, 6, 1, 'You C 1000', 100, 6583, 8000, '2022-06-08 16:42:57', NULL),
(21, 3, 1, 'kacang polong', 100, 820, 1000, '2022-06-08 16:42:57', NULL),
(22, 3, 1, 'sukro oven', 100, 820, 1000, '2022-06-08 16:42:57', NULL),
(23, 3, 1, 'usagi balls', 100, 800, 1000, '2022-06-08 16:42:57', NULL),
(24, 3, 1, 'kacang garing', 100, 820, 1000, '2022-06-08 16:42:57', NULL),
(25, 3, 1, 'french fries', 100, 9075, 1500, '2022-06-08 16:42:57', NULL),
(26, 4, 1, 'masker aoto duckbill', 100, 1500, 2000, '2022-06-08 16:42:57', NULL),
(27, 4, 1, 'masker disposable hitam', 100, 800, 1000, '2022-06-08 16:42:57', NULL),
(28, 11, 1, 'vitacimin', 100, 1700, 3000, '2022-06-08 16:42:57', NULL),
(29, 11, 1, 'tolak angin', 100, 2716, 3000, '2022-06-08 16:42:57', NULL),
(30, 11, 1, 'salon pas', 100, 1066, 1500, '2022-06-08 16:42:58', NULL),
(31, 11, 1, 'promag', 100, 900, 1500, '2022-06-08 16:42:58', NULL),
(32, 11, 1, 'bodrex', 100, 450, 500, '2022-06-08 16:42:58', NULL),
(33, 11, 1, 'hansaplast', 100, 215, 500, '2022-06-08 16:42:58', NULL),
(34, 11, 1, 'komix All Varian', 100, 875, 1500, '2022-06-08 16:42:58', NULL),
(35, 5, 1, 'Isoplus', 100, 2416, 4000, '2022-06-08 16:42:58', NULL),
(36, 3, 1, 'chitato', 100, 1656, 2000, '2022-06-08 16:42:58', NULL),
(37, 3, 1, 'chitato lite', 100, 1650, 2000, '2022-06-08 16:42:58', NULL),
(38, 3, 1, 'qtela', 100, 1616, 2000, '2022-06-08 16:42:58', NULL),
(39, 3, 1, 'comet, gabus, ciput bu sumi', 100, 2550, 3000, '2022-06-08 16:42:58', NULL),
(40, 3, 1, 'kremes pa jajang', 100, 800, 1000, '2022-06-08 16:42:58', NULL),
(41, 3, 1, 'makroni ahaw', 100, 4250, 5000, '2022-06-08 16:42:58', NULL),
(42, 3, 1, 'molring firman', 100, 1700, 2000, '2022-06-08 16:42:58', NULL),
(43, 3, 1, 'mi lidi ahaw', 100, 4250, 2000, '2022-06-08 16:42:58', NULL),
(44, 3, 1, 'citruk santi', 100, 1700, 2000, '2022-06-08 16:42:58', NULL),
(45, 3, 1, 'guring', 100, 3400, 4000, '2022-06-08 16:42:58', NULL),
(46, 3, 1, 'FR food', 100, 4250, 5000, '2022-06-08 16:42:58', NULL),
(47, 3, 1, 'kuaci fuzo', 100, 750, 1000, '2022-06-08 16:42:58', NULL),
(48, 3, 1, 'malkish crakers', 100, 890, 1000, '2022-06-08 16:42:58', NULL),
(49, 3, 1, 'better', 100, 870, 1000, '2022-06-08 16:42:58', NULL),
(50, 3, 1, 'hello panda', 100, 840, 1000, '2022-06-08 16:42:58', NULL),
(51, 3, 1, 'sari gandum', 100, 1725, 2000, '2022-06-08 16:42:58', NULL),
(52, 3, 1, 'roma arden', 100, 1730, 2500, '2022-06-08 16:42:58', NULL),
(53, 3, 1, 'slai olai', 100, 883, 1500, '2022-06-08 16:42:58', NULL),
(54, 3, 1, 'dilan', 100, 1658, 2500, '2022-06-08 16:42:58', NULL),
(55, 3, 1, 'fullo', 100, 441, 500, '2022-06-08 16:42:58', NULL),
(56, 3, 1, 'chocolatos mini', 100, 637, 1000, '2022-06-08 16:42:58', NULL),
(57, 3, 1, 'chocolatos dark besar', 100, 760, 2000, '2022-06-08 16:42:58', NULL),
(58, 3, 1, 'deka jumbo', 100, 805, 1000, '2022-06-08 16:42:58', NULL),
(59, 3, 1, 'nabati rolls', 100, 800, 1000, '2022-06-08 16:42:58', NULL),
(60, 3, 1, 'choki choki', 100, 860, 1500, '2022-06-08 16:42:58', NULL),
(61, 3, 1, 'tanggo wafer', 100, 460, 1000, '2022-06-08 16:42:58', NULL),
(62, 3, 1, 'gery salut coklat kotak', 100, 870, 1000, '2022-06-08 16:42:58', NULL),
(63, 3, 1, 'gery salut kelapa kotak', 100, 870, 1000, '2022-06-08 16:42:58', NULL),
(64, 3, 1, 'adem sari chingku', 100, 420, 500, '2022-06-08 16:42:58', NULL),
(65, 5, 1, 'nabati rolls kotak', 100, 5433, 6000, '2022-06-08 16:42:58', NULL),
(66, 3, 1, 'deka rolls kotak', 100, 1400, 2000, '2022-06-08 16:42:58', NULL),
(67, 3, 1, 'chocolatos wafer kotak', 100, 1733, 2000, '2022-06-08 16:42:58', NULL),
(68, 3, 1, 'mi ABC cup all varian', 100, 4883, 5500, '2022-06-08 16:42:58', NULL),
(69, 3, 1, 'mi aABC cup baso sapi', 100, 3875, 5000, '2022-06-08 16:42:58', NULL),
(70, 12, 1, 'laurier malam', 100, 822, 1000, '2022-06-08 16:42:58', NULL),
(71, 12, 1, 'protex', 100, 1350, 2000, '2022-06-08 16:42:58', NULL),
(72, 12, 1, 'softex daun sirih', 100, 1350, 2000, '2022-06-08 16:42:58', NULL),
(73, 14, 1, 'tisu basah mitu', 100, 784, 1000, '2022-06-08 16:42:58', NULL),
(74, 14, 1, 'tisu kotak multi', 100, 4000, 7000, '2022-06-08 16:42:58', NULL),
(75, 14, 1, 'tisu paseo kecil', 100, 833, 2000, '2022-06-08 16:42:58', NULL),
(76, 1, 1, 'serutan', 100, 750, 1500, '2022-06-08 16:42:58', NULL),
(77, 1, 1, 'clip no 105', 100, 250, 500, '2022-06-08 16:42:58', NULL),
(78, 1, 1, 'clip no 111', 100, 583, 1000, '2022-06-08 16:42:58', NULL),
(79, 1, 1, 'clip no 200', 100, 834, 1000, '2022-06-08 16:42:58', NULL),
(80, 1, 1, 'clip no 260', 100, 1417, 2000, '2022-06-08 16:42:58', NULL),
(81, 1, 1, 'isi ulang joyko', 100, 1041, 2000, '2022-06-08 16:42:58', NULL),
(82, 1, 1, 'pensil faber castel', 100, 3083, 3500, '2022-06-08 16:42:58', NULL),
(83, 1, 1, 'pensil joyko', 100, 750, 1500, '2022-06-08 16:42:58', NULL),
(84, 1, 1, 'pulpen kenko', 100, 1833, 4000, '2022-06-08 16:42:58', NULL),
(85, 1, 1, 'stabilo', 100, 2250, 3500, '2022-06-08 16:42:58', NULL),
(86, 1, 1, 'pembatas kecil', 100, 5000, 6000, '2022-06-08 16:42:58', NULL),
(87, 1, 1, 'pembatas besar', 100, 5500, 7000, '2022-06-08 16:42:58', NULL),
(88, 1, 1, 'pembatas karakter', 100, 4500, 5500, '2022-06-08 16:42:58', NULL),
(89, 1, 1, 'spidol snowman hitam besar', 100, 6667, 8000, '2022-06-08 16:42:58', NULL),
(90, 1, 1, 'penghapus joyko', 100, 725, 1500, '2022-06-08 16:42:58', NULL),
(91, 1, 1, 'tipe-x', 100, 4583, 6000, '2022-06-08 16:42:58', NULL),
(92, 1, 1, 'stapler joyko', 100, 6000, 7500, '2022-06-08 16:42:58', NULL),
(93, 1, 1, 'trigola clips no 1', 100, 2200, 3000, '2022-06-08 16:42:58', NULL),
(94, 1, 1, 'penggaris', 100, 2083, 3000, '2022-06-08 16:42:58', NULL),
(95, 1, 1, 'etona no 10', 100, 1500, 2000, '2022-06-08 16:42:58', NULL),
(96, 1, 1, 'gunting', 100, 6250, 7000, '2022-06-08 16:42:58', NULL),
(97, 1, 1, 'nota kontan', 100, 2800, 3500, '2022-06-08 16:42:58', NULL),
(98, 1, 1, 'lakban hitam besar', 100, 7500, 9000, '2022-06-08 16:42:58', NULL),
(99, 1, 1, 'solasiban hitam kecil', 100, 500, 1500, '2022-06-08 16:42:58', NULL),
(100, 1, 1, 'solasiban bening besar', 100, 13000, 15000, '2022-06-08 16:42:58', NULL),
(101, 1, 1, 'kwitansi', 100, 1800, 2500, '2022-06-08 16:42:58', NULL),
(102, 1, 1, 'etona 23/13', 100, 4000, 5000, '2022-06-08 16:42:58', NULL),
(103, 1, 1, 'etona no 3', 100, 2300, 3000, '2022-06-08 16:42:58', NULL),
(104, 9, 1, 'ultra sari asem kotak 350 ml', 100, 4054, 6000, '2022-06-08 16:42:58', NULL),
(105, 9, 1, 'ultra milk taro 200 ml', 100, 3875, 5000, '2022-06-08 16:42:58', NULL),
(106, 9, 1, 'ultra milk strawbery 200 ml', 100, 3875, 5000, '2022-06-08 16:42:58', NULL),
(107, 9, 1, 'ultra milk full cream 200 ml', 100, 3875, 5000, '2022-06-08 16:42:58', NULL),
(108, 9, 1, 'ultra milk coklat 200 ml', 100, 3875, 5000, '2022-06-08 16:42:58', NULL),
(109, 9, 1, 'ultra milk caramel 200 ml', 100, 3875, 5000, '2022-06-08 16:42:58', NULL),
(110, 9, 1, 'the botol 330 ml', 100, 2708, 4000, '2022-06-08 16:42:58', NULL),
(111, 9, 1, 'the botol 200 ml', 100, 2375, 3000, '2022-06-08 16:42:58', NULL),
(112, 8, 1, 'tebs 330 ml', 100, 3541, 5000, '2022-06-08 16:42:58', NULL),
(113, 10, 1, 'susu jahe sidomuncul', 100, 1150, 2000, '2022-06-08 16:42:58', NULL),
(114, 10, 1, 'susu jahe anget sari', 100, 1150, 2000, '2022-06-08 16:42:58', NULL),
(115, 10, 1, 'susu indomilk sachet', 100, 1116, 2000, '2022-06-08 16:42:58', NULL),
(116, 6, 1, 'signature kapal api botol 200 ml', 100, 3551, 4500, '2022-06-08 16:42:58', NULL),
(117, 6, 1, 'prima 600 ml', 100, 1625, 3000, '2022-06-08 16:42:58', NULL),
(118, 6, 1, 'prima 330 ml', 100, 1395, 2500, '2022-06-08 16:42:58', NULL),
(119, 7, 1, 'okky jely drink big strawbery', 100, 1182, 2000, '2022-06-08 16:42:58', NULL),
(120, 9, 1, 'nutriboost coffee kotak 180 ml', 100, 3750, 4500, '2022-06-08 16:42:58', NULL),
(121, 6, 1, 'nutriboost botol orange /staw 330 ml', 100, 5216, 6500, '2022-06-08 16:42:58', NULL),
(122, 6, 1, 'nutriboost botol coffee 200 ml', 100, 5708, 6500, '2022-06-08 16:42:58', NULL),
(123, 6, 1, 'nu green yogurt tea 450 ml', 100, 4879, 6000, '2022-06-08 16:42:58', NULL),
(124, 6, 1, 'nu green the hijau 450 ml', 100, 4879, 6000, '2022-06-08 16:42:58', NULL),
(125, 6, 1, 'nu green rock sugar 450 ml', 100, 4879, 6000, '2022-06-08 16:42:58', NULL),
(126, 6, 1, 'nu green rock sugar 330 ml', 100, 2883, 4500, '2022-06-08 16:42:58', NULL),
(127, 6, 1, 'nu green honey 450 ml', 100, 4879, 6000, '2022-06-08 16:42:58', NULL),
(128, 6, 1, 'nu green honey 330 ml', 100, 2883, 4500, '2022-06-08 16:42:58', NULL),
(129, 6, 1, 'nu green gula batu 450 ml', 100, 5175, 6000, '2022-06-08 16:42:58', NULL),
(130, 7, 1, 'minute maid cup strawbery/orange', 100, 1600, 3000, '2022-06-08 16:42:58', NULL),
(131, 5, 1, 'larutan botol kecil', 100, 2750, 4000, '2022-06-08 16:42:58', NULL),
(132, 10, 1, 'kopi kapal api mix sachet', 100, 1080, 2000, '2022-06-08 16:42:58', NULL),
(133, 10, 1, 'kopi kapal api luwak', 100, 791, 1500, '2022-06-08 16:42:58', NULL),
(134, 10, 1, 'good day sachet', 100, 1090, 2000, '2022-06-08 16:42:58', NULL),
(135, 6, 1, 'good day botol 250 ml', 100, 4377, 6000, '2022-06-08 16:42:58', NULL),
(136, 5, 1, 'fruitea genggam', 100, 2375, 3000, '2022-06-08 16:42:58', NULL),
(137, 7, 1, 'frestea cup', 100, 1600, 2000, '2022-06-08 16:42:58', NULL),
(138, 6, 1, 'frestea botol 340 ml all varian', 100, 3366, 4500, '2022-06-08 16:42:58', NULL),
(139, 10, 1, 'energen', 100, 1530, 0, '2022-06-08 16:42:58', NULL),
(140, 5, 1, 'Drink Beng beng', 100, 1650, 2000, '2022-06-08 16:42:58', NULL),
(141, 10, 1, 'dancow', 100, 3160, 4000, '2022-06-08 16:42:58', NULL),
(142, 10, 1, 'chocolatos drink', 100, 1640, 2000, '2022-06-08 16:42:58', NULL),
(143, 8, 1, 'bear brand 189 ml', 100, 9066, 11000, '2022-06-08 16:42:58', NULL),
(144, 5, 1, 'air cup ecer', 100, 323, 500, '2022-06-08 16:42:58', NULL),
(145, 6, 1, 'ades 1,5 l', 100, 3958, 5000, '2022-06-08 16:42:58', NULL),
(146, 10, 1, 'ABC kopi susu sachet', 100, 1020, 2000, '2022-06-08 16:42:58', NULL),
(147, 6, 1, 'abc kopi susu botol 200 ml', 100, 2078, 3000, '2022-06-08 16:42:58', NULL),
(148, 6, 1, 'abc choco malt coffee 200 ml', 100, 2078, 3000, '2022-06-08 16:42:58', NULL),
(149, 2, 1, 'frost bite cookies and cream', 100, 4000, 5000, '2022-06-08 16:42:58', NULL),
(150, 2, 1, 'frost bite tutti fruity', 100, 4036, 5000, '2022-06-08 16:42:58', NULL),
(151, 2, 1, 'frost bite boba', 100, 3200, 4000, '2022-06-08 16:42:58', NULL),
(152, 2, 1, 'frost bite cup tutti fruity', 100, 2375, 4000, '2022-06-08 16:42:58', NULL),
(153, 2, 1, 'frost bite strawbery sauce', 100, 3229, 4000, '2022-06-08 16:42:58', NULL),
(154, 2, 1, 'frost bite bouble choco', 100, 4000, 5000, '2022-06-08 16:42:58', NULL),
(155, 2, 1, 'frost bite pari-pari vanilla', 100, 3229, 4000, '2022-06-08 16:42:58', NULL),
(156, 2, 1, 'frost bite mochi', 100, 2400, 3500, '2022-06-08 16:42:58', NULL),
(157, 2, 1, 'waku waku choco pop', 100, 800, 1500, '2022-06-08 16:42:58', NULL),
(158, 2, 1, 'waku waku orange loop', 100, 1614, 2500, '2022-06-08 16:42:58', NULL),
(159, 2, 1, 'waku waku banana choco nut', 100, 2421, 3000, '2022-06-08 16:42:58', NULL),
(160, 2, 1, 'waku waku chewy mango', 100, 2400, 3000, '2022-06-08 16:42:58', NULL),
(161, 2, 1, 'waku waku choco bomb', 100, 2421, 3000, '2022-06-08 16:42:58', NULL),
(162, 2, 1, 'kiko', 100, 2400, 3000, '2022-06-08 16:42:58', NULL),
(163, 3, 1, 'wafello kecil', 100, 860, 1500, '2022-06-08 16:42:58', NULL),
(164, 1, 1, 'map kertas', 100, 500, 1500, '2022-06-08 16:42:58', NULL),
(165, 1, 1, 'bussiness file', 100, 2500, 3500, '2022-06-08 16:42:58', NULL),
(166, 1, 1, 'kertas payung', 100, 1000, 1500, '2022-06-08 16:42:58', NULL),
(167, 1, 1, 'kertas karton', 100, 700, 1000, '2022-06-08 16:42:58', NULL),
(168, 1, 1, 'kertas kado', 100, 780, 1500, '2022-06-08 16:42:58', NULL),
(169, 1, 1, 'Kertas HVS Berwarna', 100, 50, 100, '2022-06-08 16:42:58', NULL),
(170, 1, 1, 'Kertas Jilid Berwarna', 100, 260, 500, '2022-06-08 16:42:58', NULL),
(171, 1, 1, 'Kertas Buram', 100, 50, 100, '2022-06-08 16:42:58', NULL),
(172, 3, 1, 'Nabati coklat/keju', 100, 1900, 2500, '2022-06-08 16:42:58', NULL),
(173, 3, 1, 'Tanggo wafer kotak', 100, 1733, 2500, '2022-06-08 16:42:58', NULL),
(174, 3, 1, 'Chocolatos dark kotak', 100, 1633, 2000, '2022-06-08 16:42:58', NULL),
(175, 3, 1, 'Simba Choco Chip', 100, 2000, 2500, '2022-06-08 16:42:58', NULL),
(176, 3, 1, 'Gery snack bantal', 100, 1700, 2500, '2022-06-08 16:42:58', NULL),
(177, 3, 1, 'Rosta', 100, 1670, 2000, '2022-06-08 16:42:58', NULL),
(178, 3, 1, 'Nabati big roll', 100, 800, 1000, '2022-06-08 16:42:58', NULL),
(179, 3, 1, 'brotatoz', 100, 1620, 2000, '2022-06-08 16:42:58', NULL),
(180, 3, 1, 'momogi snack bantal', 100, 1900, 2500, '2022-06-08 16:42:58', NULL),
(181, 3, 1, 'wafello', 100, 1670, 2000, '2022-06-08 16:42:58', NULL),
(182, 3, 1, 'gery salut tabur kelapa', 100, 1616, 2000, '2022-06-08 16:42:58', NULL),
(183, 3, 1, 'choco sip simba', 100, 2000, 2500, '2022-06-08 16:42:58', NULL),
(184, 3, 1, 'gemez enak', 100, 840, 1000, '2022-06-08 16:42:58', NULL),
(185, 3, 1, 'potakrez', 100, 840, 1500, '2022-06-08 16:42:58', NULL),
(186, 3, 1, 'sponge', 100, 840, 1000, '2022-06-08 16:42:58', NULL),
(187, 3, 1, 'Garuda kacang kulit', 100, 820, 1000, '2022-06-08 16:42:58', NULL),
(188, 3, 1, 'pilus Garuda', 100, 850, 1000, '2022-06-08 16:42:58', NULL),
(189, 3, 1, 'Ovaltine', 100, 1808, 2500, '2022-06-08 16:42:58', NULL),
(190, 3, 1, 'Nabati coklat panjang coated', 100, 850, 1000, '2022-06-08 16:42:58', NULL),
(191, 3, 1, 'Lotte Chocopie', 100, 1600, 2000, '2022-06-08 16:42:58', NULL),
(192, 3, 1, 'Marry Queen', 100, 825, 1000, '2022-06-08 16:42:58', NULL),
(193, 3, 1, 'Biskuat', 100, 1625, 2000, '2022-06-08 16:42:58', NULL),
(194, 3, 1, 'Nextar', 100, 1630, 2000, '2022-06-08 16:42:58', NULL),
(195, 3, 1, 'Keju kraft', 100, 1633, 2000, '2022-06-08 16:42:58', NULL),
(196, 3, 1, 'Biskuat Bolu', 100, 1658, 2000, '2022-06-08 16:42:58', NULL),
(197, 3, 1, 'nabati siip kecil', 100, 415, 500, '2022-06-08 16:42:58', NULL),
(198, 3, 1, 'nabati wafer panjang', 100, 425, 500, '2022-06-08 16:42:58', NULL),
(199, 3, 1, 'Kalpa', 100, 1675, 2000, '2022-06-08 16:42:58', NULL),
(200, 3, 1, 'Tango wafer cranchox', 100, 450, 1000, '2022-06-08 16:42:58', NULL),
(201, 3, 1, 'chacha milk and peanut', 100, 796, 1000, '2022-06-08 16:42:58', NULL),
(202, 3, 1, 'golia', 100, 119, 250, '2022-06-08 16:42:58', NULL),
(203, 3, 1, 'momogi mow mow', 100, 435, 500, '2022-06-08 16:42:58', NULL),
(204, 3, 1, 'milkita Refil', 100, 4027, 500, '2022-06-08 16:42:58', NULL),
(205, 3, 1, 'jelly Gum', 100, 400, 500, '2022-06-08 16:42:58', NULL),
(206, 3, 1, 'Nabati pasta crunch', 100, 825, 1000, '2022-06-08 16:42:58', NULL),
(207, 3, 1, 'Chiki balls', 100, 855, 1000, '2022-06-08 16:42:58', NULL),
(208, 3, 1, 'sosis', 100, 830, 1000, '2022-06-08 16:42:58', NULL),
(209, 3, 1, 'nabati ahh', 100, 430, 1000, '2022-06-08 16:42:58', NULL),
(210, 3, 1, 'mi sedaap cup kuah', 100, 4000, 5000, '2022-06-08 16:42:58', NULL),
(211, 3, 1, 'mi sedaap cup goreng', 100, 4166, 5500, '2022-06-08 16:42:58', NULL),
(212, 3, 1, 'mi sedaap cup spicy korean kuah', 100, 4041, 5500, '2022-06-08 16:42:58', NULL),
(213, 3, 1, 'mi sedaap spicy korean goreng', 100, 4041, 5500, '2022-06-08 16:42:58', NULL),
(214, 13, 1, 'big babol', 100, 195, 250, '2022-06-08 16:42:58', NULL),
(215, 3, 1, 'pillow', 100, 450, 500, '2022-06-08 16:42:58', NULL),
(216, 3, 1, 'Tictic', 100, 1700, 2500, '2022-06-08 16:42:58', NULL),
(217, 3, 1, 'mayasi', 100, 1660, 2000, '2022-06-08 16:42:58', NULL),
(218, 3, 1, 'Sponge', 100, 1767, 2000, '2022-06-08 16:42:58', NULL),
(219, 13, 1, 'yupi all varian', 100, 425, 500, '2022-06-08 16:42:58', NULL),
(220, 5, 1, 'larutan kaleng badak', 100, 5400, 6500, '2022-06-08 16:42:58', NULL),
(221, 3, 1, 'nu green original 450 ml', 100, 4879, 6000, '2022-06-08 16:42:58', NULL),
(222, 3, 1, 'nu gren milk /the tarik', 100, 5175, 6500, '2022-06-08 16:42:58', NULL),
(223, 1, 1, 'Buku Vision', 100, 2500, 3000, '2022-06-08 16:42:58', NULL),
(224, 1, 1, 'Pulpen joyko', 100, 1833, 3000, '2022-06-08 16:42:58', NULL),
(225, 1, 1, 'Pulpen Castello', 100, 1000, 2000, '2022-06-08 16:42:58', NULL),
(226, 1, 1, 'Solasi Bening Kecil', 100, 458, 1000, '2022-06-08 16:42:58', NULL),
(227, 1, 1, 'Double Tape Kecil', 100, 2500, 3000, '2022-06-08 16:42:58', NULL),
(228, 1, 1, 'Isi Losleaf', 100, 3600, 5000, '2022-06-08 16:42:58', NULL),
(229, 1, 1, 'Paseo Besar', 100, 2067, 3500, '2022-06-08 16:42:58', NULL),
(230, 6, 1, 'Minut maid Botol', 100, 3700, 4500, '2022-06-08 16:42:58', NULL),
(231, 3, 1, 'Saos', 100, 300, 500, '2022-06-08 16:42:58', NULL),
(232, 3, 1, 'permen', 100, 200, 250, '2022-06-08 16:42:58', NULL),
(233, 2, 1, 'frostbite chocho lava mochi', 100, 2421, 3000, '2022-06-08 16:42:58', NULL),
(234, 2, 1, 'frostbite mochi cookies and cream', 100, 2421, 3000, '2022-06-08 16:42:58', NULL),
(235, 2, 1, 'frostbite strawberry sakura mochi', 100, 2421, 3000, '2022-06-08 16:42:58', NULL),
(236, 5, 1, 'cimori botol', 100, 7000, 8000, '2022-06-08 16:42:58', NULL),
(237, 5, 1, 'cimori squezz', 100, 9500, 11000, '2022-06-08 16:42:58', NULL),
(238, 5, 1, 'yakult', 100, 1720, 2500, '2022-06-08 16:42:58', NULL),
(239, 5, 1, 'Hi C 1000 lemon', 100, 3800, 5000, '2022-06-08 16:42:58', NULL),
(240, 5, 1, 'HI C 1000 Orange', 100, 3800, 5000, '2022-06-08 16:42:58', NULL),
(241, 5, 1, 'Hydro Coco Original', 100, 5200, 6500, '2022-06-08 16:42:58', NULL),
(242, 5, 1, 'ades 600 ml', 100, 19375, 3000, '2022-06-08 16:42:58', NULL),
(243, 3, 5, 'Duka Naon', 100, 1000, 2000, '2022-07-13 17:08:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `no_hp`, `alamat`) VALUES
(1, 'PT. Indofood', '85296300144', 'Jakarta Pusat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `akses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `akses`) VALUES
('admin', 'admin', 'Nabila Azzahra', 'Admin'),
('kasir', 'kasir', 'Rangga ', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
