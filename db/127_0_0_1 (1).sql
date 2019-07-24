-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 06:45 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rskgm_obat`
--
CREATE DATABASE IF NOT EXISTS `db_rskgm_obat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_rskgm_obat`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jabatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `email`, `jabatan`) VALUES
('admin', 'admin', 'admin', 'admin@gmail.com', 'Admin'),
('gudang', 'gudang', 'gudang', 'gudang@gmail.com', 'Gudang'),
('pejabat', 'pejabat', 'pejabat', 'pejabat@gmail.com', 'Pejabat');

-- --------------------------------------------------------

--
-- Table structure for table `in_gudang`
--

CREATE TABLE `in_gudang` (
  `kode_p` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_obat` varchar(225) NOT NULL,
  `nama_obat` varchar(225) NOT NULL,
  `jumlah1` int(11) NOT NULL,
  `satuan1` varchar(50) NOT NULL,
  `jumlah2` int(11) NOT NULL,
  `satuan2` varchar(50) NOT NULL,
  `nama_pet` varchar(50) NOT NULL,
  `ruangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_gudang`
--

INSERT INTO `in_gudang` (`kode_p`, `tanggal`, `kode_obat`, `nama_obat`, `jumlah1`, `satuan1`, `jumlah2`, `satuan2`, `nama_pet`, `ruangan`) VALUES
('123', '2018-05-16', 'ob-01', 'diapet', 2, 'Box/Dus', 10, 'Mg', 'Ziaaah', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `in_pejabat`
--

CREATE TABLE `in_pejabat` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `kode_obat` varchar(100) NOT NULL,
  `hasil_cek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `in_stok`
--

CREATE TABLE `in_stok` (
  `kode` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_pg` varchar(225) NOT NULL,
  `kode_obat` varchar(225) NOT NULL,
  `nama_obat` varchar(225) NOT NULL,
  `jumlah_in1` int(11) NOT NULL,
  `jumlah_out1` int(11) NOT NULL,
  `jumlah_in2` int(11) NOT NULL,
  `jumlah_out2` int(11) NOT NULL,
  `harga_out` int(20) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `ruangan` varchar(225) NOT NULL,
  `ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_stok`
--

CREATE TABLE `master_stok` (
  `kode_obat` varchar(100) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `tanggal_in` date NOT NULL,
  `jumlah_in` varchar(11) NOT NULL,
  `tanggal_out` date NOT NULL,
  `jumlah_out` varchar(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `ruangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `out_gudang`
--

CREATE TABLE `out_gudang` (
  `kode` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_p` varchar(50) NOT NULL,
  `kode_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `nama_pet` varchar(100) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_gudang`
--

INSERT INTO `out_gudang` (`kode`, `tanggal`, `kode_p`, `kode_obat`, `nama_obat`, `jumlah`, `satuan`, `nama_pet`, `ruangan`, `ket`) VALUES
('1A', '2018-05-15', '123', 'ob-01', 'diapet', 15, 'Box/Dus', 'Ziaaah', 'A', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `out_pejabat`
--

CREATE TABLE `out_pejabat` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_og` varchar(100) NOT NULL,
  `kode_obat` varchar(100) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `satuan1` varchar(20) NOT NULL,
  `jumlah1` int(11) NOT NULL,
  `satuan2` varchar(20) NOT NULL,
  `jumlah2` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `hasil_cek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_pejabat`
--

INSERT INTO `out_pejabat` (`id`, `tanggal`, `kode_og`, `kode_obat`, `nama_obat`, `satuan1`, `jumlah1`, `satuan2`, `jumlah2`, `harga`, `nama`, `nama_penerima`, `hasil_cek`) VALUES
(3, '2018-05-15', '1A', 'ob-01', 'diapet', 'Box/Dus', 15, 'Mg', 2, 120000, 'Rizki Khair', 'PT. ABG', 'Sesuai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `in_gudang`
--
ALTER TABLE `in_gudang`
  ADD PRIMARY KEY (`kode_p`);

--
-- Indexes for table `in_pejabat`
--
ALTER TABLE `in_pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_stok`
--
ALTER TABLE `in_stok`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `master_stok`
--
ALTER TABLE `master_stok`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `out_gudang`
--
ALTER TABLE `out_gudang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `out_pejabat`
--
ALTER TABLE `out_pejabat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `in_pejabat`
--
ALTER TABLE `in_pejabat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `out_pejabat`
--
ALTER TABLE `out_pejabat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
