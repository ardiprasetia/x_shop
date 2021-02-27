-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 11:07 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `x_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_akun`
--

CREATE TABLE `m_akun` (
  `akun_id` varchar(10) NOT NULL,
  `akun_nama_depan` varchar(25) NOT NULL,
  `akun_nama_belakang` varchar(25) NOT NULL,
  `akun_email` varchar(50) NOT NULL,
  `akun_hp` varchar(15) NOT NULL,
  `akun_jenis_kelamin` varchar(15) NOT NULL,
  `akun_tanggal_lahir` date NOT NULL,
  `akun_foto` varchar(10) NOT NULL,
  `akun_tgl_daftar` date NOT NULL,
  `akun_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_akun`
--

INSERT INTO `m_akun` (`akun_id`, `akun_nama_depan`, `akun_nama_belakang`, `akun_email`, `akun_hp`, `akun_jenis_kelamin`, `akun_tanggal_lahir`, `akun_foto`, `akun_tgl_daftar`, `akun_flag`) VALUES
('XS01000001', 'Admin', 'XShop', 'support@xshop.com', '085775711000', 'laki-laki', '1991-09-05', 'none', '2020-03-27', 1),
('XS01000002', 'Muhammad', 'Faiz', 'm_fahri@gmail.com', '088813130000', 'laki-laki', '2000-09-19', 'none', '2020-03-27', 1),
('XS01000003', 'Siti', 'Aisyah', 'aisyah@gmail.com', '085730002020', 'perempuan', '1995-03-18', 'none', '2020-03-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori_brg_sub`
--

CREATE TABLE `m_kategori_brg_sub` (
  `kategori_brg_sub_id` int(11) NOT NULL,
  `kategori_brg_utama_id` int(11) NOT NULL,
  `kategori_brg_sub_nama` varchar(50) NOT NULL,
  `kategori_brg_sub_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kategori_brg_sub`
--

INSERT INTO `m_kategori_brg_sub` (`kategori_brg_sub_id`, `kategori_brg_utama_id`, `kategori_brg_sub_nama`, `kategori_brg_sub_flag`) VALUES
(1, 1, 'Handphone & Tablet', 1),
(2, 1, 'Kabel & Charger', 1),
(3, 2, 'Atasan', 1),
(4, 2, 'Jeans', 1),
(5, 3, 'Desktop', 1),
(6, 3, 'Laptop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori_brg_utama`
--

CREATE TABLE `m_kategori_brg_utama` (
  `kategori_brg_utama_id` int(11) NOT NULL,
  `kategori_brg_utama_nama` varchar(50) NOT NULL,
  `kategori_brg_utama_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kategori_brg_utama`
--

INSERT INTO `m_kategori_brg_utama` (`kategori_brg_utama_id`, `kategori_brg_utama_nama`, `kategori_brg_utama_flag`) VALUES
(1, 'Handphone & Aksesoris', 1),
(2, 'Pakaian Pria', 1),
(3, 'Komputer dan Aksesoris', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_kurir`
--

CREATE TABLE `m_kurir` (
  `kurir_id` int(11) NOT NULL,
  `kurir_nama` varchar(35) NOT NULL,
  `kurir_company` varchar(35) NOT NULL,
  `kurir_tgl_daftar` date NOT NULL,
  `kurir_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kurir`
--

INSERT INTO `m_kurir` (`kurir_id`, `kurir_nama`, `kurir_company`, `kurir_tgl_daftar`, `kurir_flag`) VALUES
(1, 'JNE Express', 'JNE', '2020-06-23', 1),
(2, 'J&T Express', 'J&T', '2020-06-23', 1),
(3, 'Si Cepat Halu', 'Si Cepat', '2020-06-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_akun_alamat`
--

CREATE TABLE `t_akun_alamat` (
  `akun_alamat_id` int(11) NOT NULL,
  `akun_id` varchar(10) NOT NULL,
  `akun_alamat_nama` varchar(25) NOT NULL,
  `akun_alamat` text NOT NULL,
  `akun_alamat_kecamatan` varchar(50) NOT NULL,
  `akun_alamat_kelurahan` varchar(50) NOT NULL,
  `akun_alamat_kota` varchar(50) NOT NULL,
  `akun_alamat_provinsi` varchar(50) NOT NULL,
  `akun_alamat_hp` varchar(15) NOT NULL,
  `akun_alamat_setdef` tinyint(1) NOT NULL,
  `akun_alamat_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_akun_alamat`
--

INSERT INTO `t_akun_alamat` (`akun_alamat_id`, `akun_id`, `akun_alamat_nama`, `akun_alamat`, `akun_alamat_kecamatan`, `akun_alamat_kelurahan`, `akun_alamat_kota`, `akun_alamat_provinsi`, `akun_alamat_hp`, `akun_alamat_setdef`, `akun_alamat_flag`) VALUES
(1, 'XS01000001', 'Alamat Rumah', 'Jl. Tipar Cakung', 'Cilincing', 'Sukapura', 'Jakarta Utara', 'DKI Jakarta', '085710010025', 1, 1),
(2, 'XS01000002', 'Alamat Rumah', 'Jl. Mediterania', 'Kelapa Gading', 'Kelapa Gading Timur', 'Jakarta Utara', 'DKI Jakarta', '088890902001', 1, 1),
(3, 'XS01000003', 'Alamat Rumah', 'Jl. Swasembada Barat', 'Tanjung Priok', 'Kebon Bawang', 'Jakarta Utara', 'DKI Jakarta', '081465003200', 1, 1),
(4, 'XS01000002', 'Alamat Kampus', 'Jl. Plumpang Raya', 'Koja', 'Rawa Badak', 'DKI Jakarta', 'Jakarta Utara', '085775711000', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_barang`
--

CREATE TABLE `t_barang` (
  `barang_id` int(11) NOT NULL,
  `toko_id` varchar(10) NOT NULL,
  `barang_nama` varchar(50) NOT NULL,
  `barang_harga` double NOT NULL,
  `barang_potongan` float NOT NULL,
  `barang_tgl_daftar` date NOT NULL,
  `kategori_brg_sub_id` int(11) NOT NULL,
  `barang_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_barang`
--

INSERT INTO `t_barang` (`barang_id`, `toko_id`, `barang_nama`, `barang_harga`, `barang_potongan`, `barang_tgl_daftar`, `kategori_brg_sub_id`, `barang_flag`) VALUES
(1, 'TXS0100001', 'Xiaomi Redmi 8A 2/32GB', 1449000, 0.1, '2020-03-27', 1, 1),
(2, 'TXS0100001', 'Redmi Note 8 6/128GB 48MP', 2899000, 0.1, '2020-03-27', 1, 1),
(3, 'TXS0100001', 'Realme 6 Pro', 3500000, 0.1, '2020-06-07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_barang_foto`
--

CREATE TABLE `t_barang_foto` (
  `barang_foto_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `barang_foto_nama` varchar(20) NOT NULL,
  `barang_foto_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan_d`
--

CREATE TABLE `t_pesanan_d` (
  `pesanan_d_id` int(11) NOT NULL,
  `pesanan_h_id` varchar(10) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pesanan_d_jumlah` int(11) NOT NULL,
  `kurir_sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pesanan_d`
--

INSERT INTO `t_pesanan_d` (`pesanan_d_id`, `pesanan_h_id`, `barang_id`, `pesanan_d_jumlah`, `kurir_sub_id`) VALUES
(1, 'XTR0100001', 1, 2, 1),
(2, 'XTR0100001', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan_h`
--

CREATE TABLE `t_pesanan_h` (
  `pesanan_h_id` varchar(10) NOT NULL,
  `akun_id_pembeli` varchar(10) NOT NULL,
  `akun_alamat_id` int(11) NOT NULL,
  `pesanan_h_tgl` date NOT NULL,
  `promo_id` varchar(10) NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `pesanan_h_ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pesanan_h`
--

INSERT INTO `t_pesanan_h` (`pesanan_h_id`, `akun_id_pembeli`, `akun_alamat_id`, `pesanan_h_tgl`, `promo_id`, `pembayaran_id`, `pesanan_h_ket`) VALUES
('XTR0100001', 'XS01000003', 3, '2020-06-02', '0', 1, 'test'),
('XTR0100002', 'XS01000002', 4, '2020-06-05', '0', 2, 'warna biru');

-- --------------------------------------------------------

--
-- Table structure for table `t_toko`
--

CREATE TABLE `t_toko` (
  `toko_id` varchar(10) NOT NULL,
  `akun_id` varchar(10) NOT NULL,
  `toko_nama` varchar(50) NOT NULL,
  `toko_logo` varchar(10) NOT NULL,
  `toko_alamat` text NOT NULL,
  `toko_kota` varchar(50) NOT NULL,
  `toko_provinsi` varchar(50) NOT NULL,
  `toko_hp` varchar(15) NOT NULL,
  `toko_tgl_daftar` date NOT NULL,
  `toko_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_toko`
--

INSERT INTO `t_toko` (`toko_id`, `akun_id`, `toko_nama`, `toko_logo`, `toko_alamat`, `toko_kota`, `toko_provinsi`, `toko_hp`, `toko_tgl_daftar`, `toko_flag`) VALUES
('TSX0100003', 'XS01000003', 'Admin', 'none', 'Jalan Jalan', 'Jakarta Utara', 'DKI JAKARTA', '08231313131', '2020-06-16', 1),
('TXS0100001', 'XS01000001', 'X Shop 2020', 'none', 'Jl. Tipar Cakung', 'Jakarta Utara', 'DKI Jakarta', '085710001000', '2020-03-27', 1),
('TXS0100002', 'XS01000002', 'Muhamad faiz', 'none', 'Jalan Kebantenan', 'Jakarta utara', 'Dki Jakarta', '077283323', '2020-06-07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_akun`
--
ALTER TABLE `m_akun`
  ADD PRIMARY KEY (`akun_id`);

--
-- Indexes for table `m_kategori_brg_sub`
--
ALTER TABLE `m_kategori_brg_sub`
  ADD PRIMARY KEY (`kategori_brg_sub_id`);

--
-- Indexes for table `m_kategori_brg_utama`
--
ALTER TABLE `m_kategori_brg_utama`
  ADD PRIMARY KEY (`kategori_brg_utama_id`);

--
-- Indexes for table `m_kurir`
--
ALTER TABLE `m_kurir`
  ADD PRIMARY KEY (`kurir_id`);

--
-- Indexes for table `t_akun_alamat`
--
ALTER TABLE `t_akun_alamat`
  ADD PRIMARY KEY (`akun_alamat_id`);

--
-- Indexes for table `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `t_barang_foto`
--
ALTER TABLE `t_barang_foto`
  ADD PRIMARY KEY (`barang_foto_id`);

--
-- Indexes for table `t_pesanan_d`
--
ALTER TABLE `t_pesanan_d`
  ADD PRIMARY KEY (`pesanan_d_id`);

--
-- Indexes for table `t_pesanan_h`
--
ALTER TABLE `t_pesanan_h`
  ADD PRIMARY KEY (`pesanan_h_id`);

--
-- Indexes for table `t_toko`
--
ALTER TABLE `t_toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kategori_brg_sub`
--
ALTER TABLE `m_kategori_brg_sub`
  MODIFY `kategori_brg_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_kategori_brg_utama`
--
ALTER TABLE `m_kategori_brg_utama`
  MODIFY `kategori_brg_utama_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_kurir`
--
ALTER TABLE `m_kurir`
  MODIFY `kurir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_akun_alamat`
--
ALTER TABLE `t_akun_alamat`
  MODIFY `akun_alamat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_barang_foto`
--
ALTER TABLE `t_barang_foto`
  MODIFY `barang_foto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pesanan_d`
--
ALTER TABLE `t_pesanan_d`
  MODIFY `pesanan_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
