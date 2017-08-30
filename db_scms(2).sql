-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2016 at 12:12 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_scms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE IF NOT EXISTS `bahan` (
  `id_bahan` char(5) NOT NULL,
  `nama_bahan` varchar(30) NOT NULL,
  `jenis_bahan` varchar(30) NOT NULL,
  `hitung_per` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `jenis_bahan`, `hitung_per`) VALUES
('KA001', 'Kain Wool Warna Biru', 'Kain', 'meter persegi'),
('KA002', 'Kain Wool Warna Merah', 'Kain', 'meter persegi'),
('KA003', 'Kain Wool Warna Kuning', 'Kain', 'meter persegi'),
('KG001', 'Kancing Warna Hitam', 'Kancing', 'biji'),
('RS001', 'Retsleting Warna Hitam', 'Retsleting', 'meter');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` char(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(30) NOT NULL,
  `cara_pembuatan` text NOT NULL,
  `hitung_per` varchar(30) NOT NULL,
  `ukuran` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_barang`, `cara_pembuatan`, `hitung_per`, `ukuran`) VALUES
('MP001', 'prAnaMens Axiom Jean 32-inch Inseam', 'Celana Jeans', 'Bahannya dijahit-jahit saja', 'potong', '32'),
('MP002', ' Mountain Khakis Mens Original Mountain Jean', 'Celana Jeans', 'Bahannya dijahit-jahit saja', 'potong', '31'),
('MS001', 'Marmot Mens Trail Wind Hoody', 'Jaket', 'Bahannya dijahit-jahit saja', 'lusin', 'XL'),
('MS002', 'Marmot Mens Trail Wind Hoody', 'Jaket', 'Bahannya dijahit-jahit saja', 'lusin', 'L'),
('MS003', 'Marmot Mens Trail Wind Hoody', 'Jaket', 'Bahannya dijahit-jahit saja', 'lusin', 'M'),
('MS004', 'The North Face Mens Trivert Pullover Hoodie', 'Jaket', 'Bahannya dijahit-jahit saja', 'potong', 'XL'),
('MS005', 'The North Face Mens Trivert Pullover Hoodie', 'Jaket', 'Bahannya dijahit-jahit saja', 'potong', 'L'),
('MS006', 'The North Face Mens Trivert Pullover Hoodie', 'Jaket', 'Bahannya dijahit-jahit saja', 'potong', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `manufaktur_asal_bahannya`
--

CREATE TABLE IF NOT EXISTS `manufaktur_asal_bahannya` (
  `id_manufaktur` char(5) NOT NULL,
  `id_bahan1` char(5) NOT NULL,
  `jumlah_bahan1` int(255) NOT NULL,
  `asal_supplier1` char(5) NOT NULL,
  `id_bahan2` char(5) NOT NULL,
  `jumlah_bahan2` int(255) NOT NULL,
  `asal_supplier2` char(5) NOT NULL,
  `id_bahan3` char(5) NOT NULL,
  `jumlah_bahan3` int(255) NOT NULL,
  `asal_supplier3` char(5) NOT NULL,
  `id_bahan4` char(5) NOT NULL,
  `jumlah_bahan4` int(255) NOT NULL,
  `asal_supplier4` char(5) NOT NULL,
  `id_bahan5` char(5) NOT NULL,
  `jumlah_bahan5` int(255) NOT NULL,
  `asal_supplier5` char(5) NOT NULL,
  `id_bahan6` char(5) NOT NULL,
  `jumlah_bahan6` int(255) NOT NULL,
  `asal_supplier6` char(5) NOT NULL,
  `id_bahan7` char(5) NOT NULL,
  `jumlah_bahan7` int(255) NOT NULL,
  `asal_supplier7` char(5) NOT NULL,
  `id_bahan8` char(5) NOT NULL,
  `jumlah_bahan8` int(255) NOT NULL,
  `asal_supplier8` char(5) NOT NULL,
  `id_bahan9` char(5) NOT NULL,
  `jumlah_bahan9` int(255) NOT NULL,
  `asal_supplier9` char(5) NOT NULL,
  `id_bahan10` char(5) NOT NULL,
  `jumlah_bahan10` int(255) NOT NULL,
  `asal_supplier10` char(5) NOT NULL,
  `id_bahan11` char(5) NOT NULL,
  `jumlah_bahan11` int(255) NOT NULL,
  `asal_supplier11` char(5) NOT NULL,
  `id_bahan12` char(5) NOT NULL,
  `jumlah_bahan12` int(255) NOT NULL,
  `asal_supplier12` char(5) NOT NULL,
  `id_bahan13` char(5) NOT NULL,
  `jumlah_bahan13` int(255) NOT NULL,
  `asal_supplier13` char(5) NOT NULL,
  `id_bahan14` char(5) NOT NULL,
  `jumlah_bahan14` int(255) NOT NULL,
  `asal_supplier14` char(5) NOT NULL,
  `id_bahan15` char(5) NOT NULL,
  `jumlah_bahan15` int(255) NOT NULL,
  `asal_supplier15` char(5) NOT NULL,
  `id_bahan16` char(5) NOT NULL,
  `jumlah_bahan16` int(255) NOT NULL,
  `asal_supplier16` char(5) NOT NULL,
  `id_bahan17` char(5) NOT NULL,
  `jumlah_bahan17` int(255) NOT NULL,
  `asal_supplier17` char(5) NOT NULL,
  `id_bahan18` char(5) NOT NULL,
  `jumlah_bahan18` int(255) NOT NULL,
  `asal_supplier18` char(5) NOT NULL,
  `id_bahan19` char(5) NOT NULL,
  `jumlah_bahan19` int(255) NOT NULL,
  `asal_supplier19` char(5) NOT NULL,
  `id_bahan20` char(5) NOT NULL,
  `jumlah_bahan20` int(255) NOT NULL,
  `asal_supplier20` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufaktur_asal_bahannya`
--

INSERT INTO `manufaktur_asal_bahannya` (`id_manufaktur`, `id_bahan1`, `jumlah_bahan1`, `asal_supplier1`, `id_bahan2`, `jumlah_bahan2`, `asal_supplier2`, `id_bahan3`, `jumlah_bahan3`, `asal_supplier3`, `id_bahan4`, `jumlah_bahan4`, `asal_supplier4`, `id_bahan5`, `jumlah_bahan5`, `asal_supplier5`, `id_bahan6`, `jumlah_bahan6`, `asal_supplier6`, `id_bahan7`, `jumlah_bahan7`, `asal_supplier7`, `id_bahan8`, `jumlah_bahan8`, `asal_supplier8`, `id_bahan9`, `jumlah_bahan9`, `asal_supplier9`, `id_bahan10`, `jumlah_bahan10`, `asal_supplier10`, `id_bahan11`, `jumlah_bahan11`, `asal_supplier11`, `id_bahan12`, `jumlah_bahan12`, `asal_supplier12`, `id_bahan13`, `jumlah_bahan13`, `asal_supplier13`, `id_bahan14`, `jumlah_bahan14`, `asal_supplier14`, `id_bahan15`, `jumlah_bahan15`, `asal_supplier15`, `id_bahan16`, `jumlah_bahan16`, `asal_supplier16`, `id_bahan17`, `jumlah_bahan17`, `asal_supplier17`, `id_bahan18`, `jumlah_bahan18`, `asal_supplier18`, `id_bahan19`, `jumlah_bahan19`, `asal_supplier19`, `id_bahan20`, `jumlah_bahan20`, `asal_supplier20`) VALUES
('MN002', 'KA001', 100, 'SP001', 'KA001', 125, 'SP001', 'KA001', 150, 'SP001', 'KG001', 50, 'SP002', 'RS001', 105, 'SP003', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `manufaktur_barang`
--

CREATE TABLE IF NOT EXISTS `manufaktur_barang` (
  `id_manufaktur` char(5) NOT NULL,
  `id_barang1` char(5) NOT NULL,
  `jumlah1` int(255) NOT NULL,
  `id_barang2` char(5) NOT NULL,
  `jumlah2` int(255) NOT NULL,
  `id_barang3` char(5) NOT NULL,
  `jumlah3` int(255) NOT NULL,
  `id_barang4` char(5) NOT NULL,
  `jumlah4` int(255) NOT NULL,
  `id_barang5` char(5) NOT NULL,
  `jumlah5` int(255) NOT NULL,
  `id_barang6` char(5) NOT NULL,
  `jumlah6` int(255) NOT NULL,
  `id_barang7` char(5) NOT NULL,
  `jumlah7` int(255) NOT NULL,
  `id_barang8` char(5) NOT NULL,
  `jumlah8` int(255) NOT NULL,
  `id_barang9` char(5) NOT NULL,
  `jumlah9` int(255) NOT NULL,
  `id_barang10` char(5) NOT NULL,
  `jumlah10` int(255) NOT NULL,
  `id_barang11` char(5) NOT NULL,
  `jumlah11` int(255) NOT NULL,
  `id_barang12` char(5) NOT NULL,
  `jumlah12` int(255) NOT NULL,
  `id_barang13` char(5) NOT NULL,
  `jumlah13` int(255) NOT NULL,
  `id_barang14` char(5) NOT NULL,
  `jumlah14` int(255) NOT NULL,
  `id_barang15` char(5) NOT NULL,
  `jumlah15` int(255) NOT NULL,
  `id_barang16` char(5) NOT NULL,
  `jumlah16` int(255) NOT NULL,
  `id_barang17` char(5) NOT NULL,
  `jumlah17` int(255) NOT NULL,
  `id_barang18` char(5) NOT NULL,
  `jumlah18` int(255) NOT NULL,
  `id_barang19` char(5) NOT NULL,
  `jumlah19` int(255) NOT NULL,
  `id_barang20` char(5) NOT NULL,
  `jumlah20` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufaktur_barang`
--

INSERT INTO `manufaktur_barang` (`id_manufaktur`, `id_barang1`, `jumlah1`, `id_barang2`, `jumlah2`, `id_barang3`, `jumlah3`, `id_barang4`, `jumlah4`, `id_barang5`, `jumlah5`, `id_barang6`, `jumlah6`, `id_barang7`, `jumlah7`, `id_barang8`, `jumlah8`, `id_barang9`, `jumlah9`, `id_barang10`, `jumlah10`, `id_barang11`, `jumlah11`, `id_barang12`, `jumlah12`, `id_barang13`, `jumlah13`, `id_barang14`, `jumlah14`, `id_barang15`, `jumlah15`, `id_barang16`, `jumlah16`, `id_barang17`, `jumlah17`, `id_barang18`, `jumlah18`, `id_barang19`, `jumlah19`, `id_barang20`, `jumlah20`) VALUES
('MN002', 'MS004', 300, 'MS005', 350, 'MS006', 200, 'MP001', 332, 'MP002', 300, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resi_pesanan_bahan`
--

CREATE TABLE IF NOT EXISTS `resi_pesanan_bahan` (
  `nomor_resi` varchar(30) NOT NULL,
  `id_manufaktur` char(5) NOT NULL,
  `id_supplier` char(5) NOT NULL,
  `id_bahan1` char(5) NOT NULL,
  `jumlah1` int(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `id_bahan2` char(5) NOT NULL,
  `jumlah2` int(255) NOT NULL,
  `status2` varchar(255) NOT NULL,
  `id_bahan3` char(5) NOT NULL,
  `jumlah3` int(255) NOT NULL,
  `status3` varchar(255) NOT NULL,
  `id_bahan4` char(5) NOT NULL,
  `jumlah4` int(255) NOT NULL,
  `status4` varchar(255) NOT NULL,
  `id_bahan5` char(5) NOT NULL,
  `jumlah5` int(255) NOT NULL,
  `status5` varchar(255) NOT NULL,
  `id_bahan6` char(5) NOT NULL,
  `jumlah6` int(255) NOT NULL,
  `status6` varchar(255) NOT NULL,
  `id_bahan7` char(5) NOT NULL,
  `jumlah7` int(255) NOT NULL,
  `status7` varchar(255) NOT NULL,
  `id_bahan8` char(5) NOT NULL,
  `jumlah8` int(255) NOT NULL,
  `status8` varchar(255) NOT NULL,
  `id_bahan9` char(5) NOT NULL,
  `jumlah9` int(255) NOT NULL,
  `status9` varchar(255) NOT NULL,
  `id_bahan10` char(5) NOT NULL,
  `jumlah10` int(255) NOT NULL,
  `status10` varchar(255) NOT NULL,
  `id_bahan11` char(5) NOT NULL,
  `jumlah11` int(255) NOT NULL,
  `status11` varchar(255) NOT NULL,
  `id_bahan12` char(5) NOT NULL,
  `jumlah12` int(255) NOT NULL,
  `status12` varchar(255) NOT NULL,
  `id_bahan13` char(5) NOT NULL,
  `jumlah13` int(255) NOT NULL,
  `status13` varchar(255) NOT NULL,
  `id_bahan14` char(5) NOT NULL,
  `jumlah14` int(255) NOT NULL,
  `status15` varchar(255) NOT NULL,
  `id_bahan15` char(5) NOT NULL,
  `jumlah16` int(255) NOT NULL,
  `status16` varchar(255) NOT NULL,
  `id_bahan17` char(5) NOT NULL,
  `jumlah17` int(255) NOT NULL,
  `status17` varchar(255) NOT NULL,
  `id_bahan18` char(5) NOT NULL,
  `jumlah18` int(255) NOT NULL,
  `status18` varchar(255) NOT NULL,
  `id_bahan19` char(5) NOT NULL,
  `jumlah19` int(255) NOT NULL,
  `status19` varchar(255) NOT NULL,
  `id_bahan20` char(5) NOT NULL,
  `jumlah20` int(255) NOT NULL,
  `status20` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resi_pesanan_barang`
--

CREATE TABLE IF NOT EXISTS `resi_pesanan_barang` (
  `nomor_resi_angka` int(3) NOT NULL,
  `nomor_resi` char(18) NOT NULL,
  `id_retailer` char(5) NOT NULL,
  `id_manufaktur` char(5) NOT NULL,
  `lihat` int(1) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `id_barang1` char(5) NOT NULL,
  `jumlah1` int(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `id_barang2` char(5) NOT NULL,
  `jumlah2` int(255) NOT NULL,
  `status2` varchar(255) NOT NULL,
  `id_barang3` char(5) NOT NULL,
  `jumlah3` int(255) NOT NULL,
  `status3` varchar(255) NOT NULL,
  `id_barang4` char(5) NOT NULL,
  `jumlah4` int(255) NOT NULL,
  `status4` varchar(255) NOT NULL,
  `id_barang5` char(5) NOT NULL,
  `jumlah5` int(255) NOT NULL,
  `status5` varchar(255) NOT NULL,
  `id_barang6` char(5) NOT NULL,
  `jumlah6` int(255) NOT NULL,
  `status6` varchar(255) NOT NULL,
  `id_barang7` char(5) NOT NULL,
  `jumlah7` int(255) NOT NULL,
  `status7` varchar(255) NOT NULL,
  `id_barang8` char(5) NOT NULL,
  `jumlah8` int(255) NOT NULL,
  `status8` varchar(255) NOT NULL,
  `id_barang9` char(5) NOT NULL,
  `jumlah9` int(255) NOT NULL,
  `status9` varchar(255) NOT NULL,
  `id_barang10` char(5) NOT NULL,
  `jumlah10` int(255) NOT NULL,
  `status10` varchar(255) NOT NULL,
  `id_barang11` char(5) NOT NULL,
  `jumlah11` int(255) NOT NULL,
  `status11` varchar(255) NOT NULL,
  `id_barang12` char(5) NOT NULL,
  `jumlah12` int(255) NOT NULL,
  `status12` varchar(255) NOT NULL,
  `id_barang13` char(5) NOT NULL,
  `jumlah13` int(255) NOT NULL,
  `status13` varchar(255) NOT NULL,
  `id_barang14` char(5) NOT NULL,
  `jumlah14` int(255) NOT NULL,
  `status15` varchar(255) NOT NULL,
  `id_barang15` char(5) NOT NULL,
  `jumlah16` int(255) NOT NULL,
  `status16` varchar(255) NOT NULL,
  `id_barang17` char(5) NOT NULL,
  `jumlah17` int(255) NOT NULL,
  `status17` varchar(255) NOT NULL,
  `id_barang18` char(5) NOT NULL,
  `jumlah18` int(255) NOT NULL,
  `status18` varchar(255) NOT NULL,
  `id_barang19` char(5) NOT NULL,
  `jumlah19` int(255) NOT NULL,
  `status19` varchar(255) NOT NULL,
  `id_barang20` char(5) NOT NULL,
  `jumlah20` int(255) NOT NULL,
  `status20` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resi_pesanan_barang`
--

INSERT INTO `resi_pesanan_barang` (`nomor_resi_angka`, `nomor_resi`, `id_retailer`, `id_manufaktur`, `lihat`, `tanggal`, `id_barang1`, `jumlah1`, `status1`, `id_barang2`, `jumlah2`, `status2`, `id_barang3`, `jumlah3`, `status3`, `id_barang4`, `jumlah4`, `status4`, `id_barang5`, `jumlah5`, `status5`, `id_barang6`, `jumlah6`, `status6`, `id_barang7`, `jumlah7`, `status7`, `id_barang8`, `jumlah8`, `status8`, `id_barang9`, `jumlah9`, `status9`, `id_barang10`, `jumlah10`, `status10`, `id_barang11`, `jumlah11`, `status11`, `id_barang12`, `jumlah12`, `status12`, `id_barang13`, `jumlah13`, `status13`, `id_barang14`, `jumlah14`, `status15`, `id_barang15`, `jumlah16`, `status16`, `id_barang17`, `jumlah17`, `status17`, `id_barang18`, `jumlah18`, `status18`, `id_barang19`, `jumlah19`, `status19`, `id_barang20`, `jumlah20`, `status20`) VALUES
(1, 'cobacobacobacoba', '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, ''),
(2, 'RT002MN00220160522', 'RT002', 'MN002', 1, '', 'MS004', 2123, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, ''),
(3, 'RT002MN00220160523', 'RT002', 'MN002', 1, '24 May 2016 18:33', 'MS004', 123, 'Sudah diterima', 'MS005', 321, 'Siap dikirim', 'MS006', 123, 'Siap dikirim dalam 3 hari', 'MP001', 123, 'Siap dikirim dalam 3 hari', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, ''),
(4, 'RT002MN00220160523', 'RT002', 'MN002', 1, '', 'MS004', 123, '', 'MS005', 321, '', 'MS006', 123, '', 'MP001', 123, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, ''),
(12, 'RT001MN00220160525', 'RT001', 'MN002', 0, '', 'MS004', 123, '', 'MS005', 2, '', 'MS006', 3, '', 'MP001', 4, '', 'MP002', 5, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, ''),
(13, 'RT001MN00220160525', 'RT001', 'MN002', 0, '', 'MS004', 1, '', 'MS005', 2, '', 'MS006', 3, '', 'MP001', 4, '', 'MP002', 5, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_asal_barangnya`
--

CREATE TABLE IF NOT EXISTS `retailer_asal_barangnya` (
  `id_retailer` char(5) NOT NULL,
  `id_barang1` char(5) NOT NULL,
  `jumlah_barang1` int(255) NOT NULL,
  `id_asal_manufaktur1` char(5) NOT NULL,
  `id_barang2` char(5) NOT NULL,
  `jumlah_barang2` int(255) NOT NULL,
  `id_asal_manufaktur2` char(5) NOT NULL,
  `id_barang3` char(5) NOT NULL,
  `jumlah_barang3` int(255) NOT NULL,
  `id_asal_manufaktur3` char(5) NOT NULL,
  `id_barang4` char(5) NOT NULL,
  `jumlah_barang4` int(255) NOT NULL,
  `id_asal_manufaktur4` char(5) NOT NULL,
  `id_barang5` char(5) NOT NULL,
  `jumlah_barang5` int(255) NOT NULL,
  `id_asal_manufaktur5` char(5) NOT NULL,
  `id_barang6` char(5) NOT NULL,
  `jumlah_barang6` int(255) NOT NULL,
  `id_asal_manufaktur6` char(5) NOT NULL,
  `id_barang7` char(5) NOT NULL,
  `jumlah_barang7` int(255) NOT NULL,
  `id_asal_manufaktur7` char(5) NOT NULL,
  `id_barang8` char(5) NOT NULL,
  `jumlah_barang8` int(255) NOT NULL,
  `id_asal_manufaktur8` char(5) NOT NULL,
  `id_barang9` char(5) NOT NULL,
  `jumlah_barang9` int(255) NOT NULL,
  `id_asal_manufaktur9` char(5) NOT NULL,
  `id_barang10` char(5) NOT NULL,
  `jumlah_barang10` int(255) NOT NULL,
  `id_asal_manufaktur10` char(5) NOT NULL,
  `id_barang11` char(5) NOT NULL,
  `jumlah_barang11` int(255) NOT NULL,
  `id_asal_manufaktur11` char(5) NOT NULL,
  `id_barang12` char(5) NOT NULL,
  `jumlah_barang12` int(255) NOT NULL,
  `id_asal_manufaktur12` char(5) NOT NULL,
  `id_barang13` char(5) NOT NULL,
  `jumlah_barang13` int(255) NOT NULL,
  `id_asal_manufaktur13` char(5) NOT NULL,
  `id_barang14` char(5) NOT NULL,
  `jumlah_barang14` int(255) NOT NULL,
  `id_asal_manufaktur14` char(5) NOT NULL,
  `id_barang15` char(5) NOT NULL,
  `jumlah_barang15` int(255) NOT NULL,
  `id_asal_manufaktur15` char(5) NOT NULL,
  `id_barang16` char(5) NOT NULL,
  `jumlah_barang16` int(255) NOT NULL,
  `id_asal_manufaktur16` char(5) NOT NULL,
  `id_barang17` char(5) NOT NULL,
  `jumlah_barang17` int(255) NOT NULL,
  `id_asal_manufaktur17` char(5) NOT NULL,
  `id_barang18` char(5) NOT NULL,
  `jumlah_barang18` int(255) NOT NULL,
  `id_asal_manufaktur18` char(5) NOT NULL,
  `id_barang19` char(5) NOT NULL,
  `jumlah_barang19` int(255) NOT NULL,
  `id_asal_manufaktur19` char(5) NOT NULL,
  `id_barang20` char(5) NOT NULL,
  `jumlah_barang20` int(255) NOT NULL,
  `id_asal_manufaktur20` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_asal_barangnya`
--

INSERT INTO `retailer_asal_barangnya` (`id_retailer`, `id_barang1`, `jumlah_barang1`, `id_asal_manufaktur1`, `id_barang2`, `jumlah_barang2`, `id_asal_manufaktur2`, `id_barang3`, `jumlah_barang3`, `id_asal_manufaktur3`, `id_barang4`, `jumlah_barang4`, `id_asal_manufaktur4`, `id_barang5`, `jumlah_barang5`, `id_asal_manufaktur5`, `id_barang6`, `jumlah_barang6`, `id_asal_manufaktur6`, `id_barang7`, `jumlah_barang7`, `id_asal_manufaktur7`, `id_barang8`, `jumlah_barang8`, `id_asal_manufaktur8`, `id_barang9`, `jumlah_barang9`, `id_asal_manufaktur9`, `id_barang10`, `jumlah_barang10`, `id_asal_manufaktur10`, `id_barang11`, `jumlah_barang11`, `id_asal_manufaktur11`, `id_barang12`, `jumlah_barang12`, `id_asal_manufaktur12`, `id_barang13`, `jumlah_barang13`, `id_asal_manufaktur13`, `id_barang14`, `jumlah_barang14`, `id_asal_manufaktur14`, `id_barang15`, `jumlah_barang15`, `id_asal_manufaktur15`, `id_barang16`, `jumlah_barang16`, `id_asal_manufaktur16`, `id_barang17`, `jumlah_barang17`, `id_asal_manufaktur17`, `id_barang18`, `jumlah_barang18`, `id_asal_manufaktur18`, `id_barang19`, `jumlah_barang19`, `id_asal_manufaktur19`, `id_barang20`, `jumlah_barang20`, `id_asal_manufaktur20`) VALUES
('', 'MS001', 5, 'MN001', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, ''),
('RT001', 'MS001', 5, 'MN001', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, ''),
('RT002', 'MS005', 15, 'MN002', 'MS002', 6, 'MN001', 'MS003', 3, 'MN001', 'MS004', 30, 'MN002', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` char(5) NOT NULL,
  `id_bahan1` char(5) NOT NULL,
  `harga1` int(255) NOT NULL,
  `id_bahan2` char(5) NOT NULL,
  `harga2` int(255) NOT NULL,
  `id_bahan3` char(5) NOT NULL,
  `harga3` int(255) NOT NULL,
  `id_bahan4` char(5) NOT NULL,
  `harga4` int(255) NOT NULL,
  `id_bahan5` char(5) NOT NULL,
  `harga5` int(255) NOT NULL,
  `id_bahan6` char(5) NOT NULL,
  `harga6` int(255) NOT NULL,
  `id_bahan7` char(5) NOT NULL,
  `harga7` int(255) NOT NULL,
  `id_bahan8` char(5) NOT NULL,
  `harga8` int(255) NOT NULL,
  `id_bahan9` char(5) NOT NULL,
  `harga9` int(255) NOT NULL,
  `id_bahan10` char(5) NOT NULL,
  `harga10` int(255) NOT NULL,
  `id_bahan11` char(5) NOT NULL,
  `harga11` int(255) NOT NULL,
  `id_bahan12` char(5) NOT NULL,
  `harga12` int(255) NOT NULL,
  `id_bahan13` char(5) NOT NULL,
  `harga13` int(255) NOT NULL,
  `id_bahan14` char(5) NOT NULL,
  `harga14` int(255) NOT NULL,
  `id_bahan15` char(5) NOT NULL,
  `harga15` int(255) NOT NULL,
  `id_bahan16` char(5) NOT NULL,
  `harga16` int(255) NOT NULL,
  `id_bahan17` char(5) NOT NULL,
  `harga17` int(255) NOT NULL,
  `id_bahan18` char(5) NOT NULL,
  `harga18` int(255) NOT NULL,
  `id_bahan19` char(5) NOT NULL,
  `harga19` int(255) NOT NULL,
  `id_bahan20` char(5) NOT NULL,
  `harga20` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `id_bahan1`, `harga1`, `id_bahan2`, `harga2`, `id_bahan3`, `harga3`, `id_bahan4`, `harga4`, `id_bahan5`, `harga5`, `id_bahan6`, `harga6`, `id_bahan7`, `harga7`, `id_bahan8`, `harga8`, `id_bahan9`, `harga9`, `id_bahan10`, `harga10`, `id_bahan11`, `harga11`, `id_bahan12`, `harga12`, `id_bahan13`, `harga13`, `id_bahan14`, `harga14`, `id_bahan15`, `harga15`, `id_bahan16`, `harga16`, `id_bahan17`, `harga17`, `id_bahan18`, `harga18`, `id_bahan19`, `harga19`, `id_bahan20`, `harga20`) VALUES
('SP001', 'KA001', 3000, 'KA002', 4000, 'KA003', 5000, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lokasi` varchar(60) NOT NULL,
  `id` char(5) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `lokasi`, `id`, `jabatan`) VALUES
('denver', 'password', 'Denver, CD', 'Colorado', 'RT001', 'Retailer'),
('parkcity', 'password', 'Park City, Utah - Retailer', 'Utah', 'RT002', 'Retailer'),
('portland', 'password', 'Portland - Manufaktur', 'Oregon', 'MN001', 'Manufacturer'),
('rockymountaintrail', 'password', 'Rocky Mountain Trail.com - Ret', 'USA', 'RT003', 'Retailer'),
('saltlake', 'password', 'Salt Lake City, UT', 'Utah', 'MN002', 'Manufacturer'),
('supplykain', 'password', 'Kain Company', 'Amerika', 'SP001', 'Supplier'),
('supplykancing', 'password', 'Kancing Company', 'Amerika', 'SP002', 'Supplier'),
('supplyretsleting', 'password', 'Retsleting Company', 'Amerika', 'SP003', 'Supplier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `manufaktur_asal_bahannya`
--
ALTER TABLE `manufaktur_asal_bahannya`
  ADD PRIMARY KEY (`id_manufaktur`);

--
-- Indexes for table `manufaktur_barang`
--
ALTER TABLE `manufaktur_barang`
  ADD PRIMARY KEY (`id_manufaktur`);

--
-- Indexes for table `resi_pesanan_bahan`
--
ALTER TABLE `resi_pesanan_bahan`
  ADD UNIQUE KEY `nomor_resi` (`nomor_resi`);

--
-- Indexes for table `resi_pesanan_barang`
--
ALTER TABLE `resi_pesanan_barang`
  ADD UNIQUE KEY `nomor_resi_angka` (`nomor_resi_angka`);

--
-- Indexes for table `retailer_asal_barangnya`
--
ALTER TABLE `retailer_asal_barangnya`
  ADD PRIMARY KEY (`id_retailer`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resi_pesanan_barang`
--
ALTER TABLE `resi_pesanan_barang`
  MODIFY `nomor_resi_angka` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
