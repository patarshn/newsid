-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 05:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_izinusaha`
--

CREATE TABLE `tbl_form_izinusaha` (
  `id_form_izinusaha` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_usaha` varchar(100) DEFAULT NULL,
  `jenis_usaha` varchar(100) DEFAULT NULL,
  `alamat_usaha` varchar(100) DEFAULT NULL,
  `pengajuan_date` datetime DEFAULT NULL,
  `gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_kelahiran`
--

CREATE TABLE `tbl_form_kelahiran` (
  `id_form_kelahiran` int(11) NOT NULL,
  `nkk` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_kematian`
--

CREATE TABLE `tbl_form_kematian` (
  `id_form_kematian` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `jenis_kelamin` varchar(3) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `tanggal_kematian` date DEFAULT NULL,
  `tempat_kematian` varchar(100) DEFAULT NULL,
  `peyebab` varchar(100) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_ketbelummenikah`
--

CREATE TABLE `tbl_form_ketbelummenikah` (
  `id_form_ketbelummenikah` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_ketdomisili`
--

CREATE TABLE `tbl_form_ketdomisili` (
  `id_form_domisili` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_kethibah`
--

CREATE TABLE `tbl_form_kethibah` (
  `id_form_kethibah` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_pemberi` varchar(100) DEFAULT NULL,
  `umur_pemberi` int(3) DEFAULT NULL,
  `alamat_pemberi` varchar(100) DEFAULT NULL,
  `pekerjaan_pemberi` varchar(20) DEFAULT NULL,
  `nama_penerima` varchar(100) DEFAULT NULL,
  `umur_penerima` int(3) DEFAULT NULL,
  `alamat_penerima` varchar(100) DEFAULT NULL,
  `pekerjaan_penerima` varchar(20) DEFAULT NULL,
  `barang_hibah` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `luas` varchar(100) DEFAULT NULL,
  `nama_lain` varchar(100) DEFAULT NULL,
  `ukuran_timur` varchar(100) DEFAULT NULL,
  `ukuran_selatan` varchar(100) DEFAULT NULL,
  `ukuran_barat` varchar(100) DEFAULT NULL,
  `ukuran_utara` varchar(100) DEFAULT NULL,
  `batas_timur` varchar(100) DEFAULT NULL,
  `batas_selatan` varchar(100) DEFAULT NULL,
  `batas_barat` varchar(100) DEFAULT NULL,
  `batas_utara` varchar(100) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_ketjualbeli`
--

CREATE TABLE `tbl_form_ketjualbeli` (
  `id_form_ketjualbeli` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_penjual` varchar(100) DEFAULT NULL,
  `umur_penjual` int(3) DEFAULT NULL,
  `pekerjaan_penjual` varchar(20) DEFAULT NULL,
  `alamat_penjual` varchar(100) DEFAULT NULL,
  `nama_pembeli` varchar(100) DEFAULT NULL,
  `umur_pembeli` int(3) DEFAULT NULL,
  `pekerjaan_pembeli` varchar(20) DEFAULT NULL,
  `alamat_pembeli` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `dijual` varchar(100) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `nominal_terbilang` varchar(100) DEFAULT NULL,
  `batas_timur` varchar(100) DEFAULT NULL,
  `batas_selatan` varchar(100) DEFAULT NULL,
  `batas_barat` varchar(100) DEFAULT NULL,
  `batas_utara` varchar(100) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_ketsudahmenikah`
--

CREATE TABLE `tbl_form_ketsudahmenikah` (
  `id_form_ketsudahmenikah` int(11) NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `nama_perempuan` varchar(100) DEFAULT NULL,
  `alamat_perempuan` varchar(100) DEFAULT NULL,
  `tanggal_lahir_perempuan` date DEFAULT NULL,
  `tempat_lahir_perempuan` varchar(100) DEFAULT NULL,
  `agama_perempuan` varchar(10) DEFAULT NULL,
  `pekerjaan_perempuan` varchar(20) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_kettidakmampu`
--

CREATE TABLE `tbl_form_kettidakmampu` (
  `id_form_kettidakmampu` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_ketwaris`
--

CREATE TABLE `tbl_form_ketwaris` (
  `id_form_ketwaris` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_pemberi` varchar(100) DEFAULT NULL,
  `nama_penerima` varchar(100) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `barang_waris` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `luas` varchar(100) DEFAULT NULL,
  `nama_lain` varchar(100) DEFAULT NULL,
  `saksi` varchar(100) DEFAULT NULL,
  `batas_timur` varchar(100) DEFAULT NULL,
  `batas_selatan` varchar(100) DEFAULT NULL,
  `batas_barat` varchar(100) DEFAULT NULL,
  `batas_utara` varchar(100) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_kk`
--

CREATE TABLE `tbl_form_kk` (
  `id_form_kk` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `golongan_darah` varchar(3) DEFAULT NULL,
  `kebangsaan` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `status_kawin` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_ktp`
--

CREATE TABLE `tbl_form_ktp` (
  `id_form_kk` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_kk` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `golongan_darah` varchar(3) DEFAULT NULL,
  `kebangsaan` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `status_kawin` varchar(20) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_form_izinusaha`
--
ALTER TABLE `tbl_form_izinusaha`
  ADD PRIMARY KEY (`id_form_izinusaha`);

--
-- Indexes for table `tbl_form_kelahiran`
--
ALTER TABLE `tbl_form_kelahiran`
  ADD PRIMARY KEY (`id_form_kelahiran`);

--
-- Indexes for table `tbl_form_kematian`
--
ALTER TABLE `tbl_form_kematian`
  ADD PRIMARY KEY (`id_form_kematian`);

--
-- Indexes for table `tbl_form_ketbelummenikah`
--
ALTER TABLE `tbl_form_ketbelummenikah`
  ADD PRIMARY KEY (`id_form_ketbelummenikah`);

--
-- Indexes for table `tbl_form_ketdomisili`
--
ALTER TABLE `tbl_form_ketdomisili`
  ADD PRIMARY KEY (`id_form_domisili`);

--
-- Indexes for table `tbl_form_kethibah`
--
ALTER TABLE `tbl_form_kethibah`
  ADD PRIMARY KEY (`id_form_kethibah`);

--
-- Indexes for table `tbl_form_ketjualbeli`
--
ALTER TABLE `tbl_form_ketjualbeli`
  ADD PRIMARY KEY (`id_form_ketjualbeli`);

--
-- Indexes for table `tbl_form_ketsudahmenikah`
--
ALTER TABLE `tbl_form_ketsudahmenikah`
  ADD PRIMARY KEY (`id_form_ketsudahmenikah`);

--
-- Indexes for table `tbl_form_kettidakmampu`
--
ALTER TABLE `tbl_form_kettidakmampu`
  ADD PRIMARY KEY (`id_form_kettidakmampu`);

--
-- Indexes for table `tbl_form_ketwaris`
--
ALTER TABLE `tbl_form_ketwaris`
  ADD PRIMARY KEY (`id_form_ketwaris`);

--
-- Indexes for table `tbl_form_kk`
--
ALTER TABLE `tbl_form_kk`
  ADD PRIMARY KEY (`id_form_kk`);

--
-- Indexes for table `tbl_form_ktp`
--
ALTER TABLE `tbl_form_ktp`
  ADD PRIMARY KEY (`id_form_kk`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_form_izinusaha`
--
ALTER TABLE `tbl_form_izinusaha`
  MODIFY `id_form_izinusaha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_kelahiran`
--
ALTER TABLE `tbl_form_kelahiran`
  MODIFY `id_form_kelahiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_kematian`
--
ALTER TABLE `tbl_form_kematian`
  MODIFY `id_form_kematian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_ketbelummenikah`
--
ALTER TABLE `tbl_form_ketbelummenikah`
  MODIFY `id_form_ketbelummenikah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_ketdomisili`
--
ALTER TABLE `tbl_form_ketdomisili`
  MODIFY `id_form_domisili` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_kethibah`
--
ALTER TABLE `tbl_form_kethibah`
  MODIFY `id_form_kethibah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_ketjualbeli`
--
ALTER TABLE `tbl_form_ketjualbeli`
  MODIFY `id_form_ketjualbeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_ketsudahmenikah`
--
ALTER TABLE `tbl_form_ketsudahmenikah`
  MODIFY `id_form_ketsudahmenikah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_kettidakmampu`
--
ALTER TABLE `tbl_form_kettidakmampu`
  MODIFY `id_form_kettidakmampu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_ketwaris`
--
ALTER TABLE `tbl_form_ketwaris`
  MODIFY `id_form_ketwaris` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_kk`
--
ALTER TABLE `tbl_form_kk`
  MODIFY `id_form_kk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_form_ktp`
--
ALTER TABLE `tbl_form_ktp`
  MODIFY `id_form_kk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
