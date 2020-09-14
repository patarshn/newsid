-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 01:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(3) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `image`, `title`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Screenshot_1-5f25228866ce4.png', 'ashiapp123', 'ahsheupaaaSUCCESS', NULL, NULL, NULL, NULL),
(3, 'testimage1-5f22526b5b78d.jpg', 'Bang jago', 'Siap Bang jagooo', NULL, NULL, NULL, NULL),
(4, 'Screenshot_60-5f239d1040226.png', 'Selamat Datang di Kelurahan Gedong Meneng', 'Kelurahan Gedong Meneng, Rajabasa, Bandar Lampung, Lampung', NULL, NULL, NULL, NULL),
(5, 'Screenshot_61-5f239daeb8cac.png', 'Judul Gambar 2', 'Deskripsi Gambar 2', NULL, NULL, NULL, NULL),
(6, 'Screenshot_62-5f239de22a1fe.png', 'Judul Gambar 3', 'Deskripsi Gambar ke 3', NULL, NULL, NULL, NULL),
(7, 'Screenshot_19-5f239e0566d53.png', 'Judul Gambar 4', 'Deskripsi Gambar 4', NULL, NULL, NULL, NULL);

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
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_izinusaha`
--

INSERT INTO `tbl_form_izinusaha` (`id_form_izinusaha`, `nik`, `nama_usaha`, `jenis_usaha`, `alamat_usaha`, `pengajuan_date`, `gambar`) VALUES
(1, 'asdas', NULL, NULL, NULL, NULL, NULL),
(2, '12', NULL, NULL, NULL, NULL, NULL),
(3, '12', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_kelahiran`
--

CREATE TABLE `tbl_form_kelahiran` (
  `id_form_kelahiran` int(11) NOT NULL,
  `nkk` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `id_rt` int(3) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL,
  `pukul` time NOT NULL,
  `jenis_kelahiran` varchar(10) NOT NULL,
  `penolong_kelahiran` varchar(255) NOT NULL,
  `berat` int(2) NOT NULL,
  `panjang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_kelahiran`
--

INSERT INTO `tbl_form_kelahiran` (`id_form_kelahiran`, `nkk`, `nama`, `id_rw`, `id_rt`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `anak_ke`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`, `pukul`, `jenis_kelahiran`, `penolong_kelahiran`, `berat`, `panjang`) VALUES
(1, '1', NULL, 0, 0, NULL, NULL, NULL, NULL, '2020-07-26', NULL, NULL, NULL, '00:00:00', '', '', 0, 0);

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
  `penyebab` varchar(100) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(1) DEFAULT NULL,
  `verifikasi_admin` varchar(1) DEFAULT NULL,
  `verifikasi_lurah` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_kematian`
--

INSERT INTO `tbl_form_kematian` (`id_form_kematian`, `nik`, `nama`, `alamat`, `id_rw`, `id_rt`, `tanggal_lahir`, `tempat_lahir`, `agama`, `jenis_kelamin`, `pekerjaan`, `tanggal_kematian`, `tempat_kematian`, `penyebab`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '2', NULL, '1', 0, 0, NULL, NULL, NULL, NULL, '1', '0001-01-01', NULL, '1', '2020-07-26', NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_form_ketbelummenikah`
--

INSERT INTO `tbl_form_ketbelummenikah` (`id_form_ketbelummenikah`, `nik`, `nama`, `alamat`, `id_rw`, `id_rt`, `tanggal_lahir`, `tempat_lahir`, `agama`, `jenis_kelamin`, `pekerjaan`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_form_ketdomisili`
--

INSERT INTO `tbl_form_ketdomisili` (`id_form_domisili`, `nik`, `nama`, `alamat`, `id_rw`, `id_rt`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `pekerjaan`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_form_kethibah`
--

INSERT INTO `tbl_form_kethibah` (`id_form_kethibah`, `nik`, `nama_pemberi`, `umur_pemberi`, `alamat_pemberi`, `pekerjaan_pemberi`, `nama_penerima`, `umur_penerima`, `alamat_penerima`, `pekerjaan_penerima`, `barang_hibah`, `id_rw`, `id_rt`, `luas`, `nama_lain`, `ukuran_timur`, `ukuran_selatan`, `ukuran_barat`, `ukuran_utara`, `batas_timur`, `batas_selatan`, `batas_barat`, `batas_utara`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_form_ketjualbeli`
--

INSERT INTO `tbl_form_ketjualbeli` (`id_form_ketjualbeli`, `nik`, `nama_penjual`, `umur_penjual`, `pekerjaan_penjual`, `alamat_penjual`, `nama_pembeli`, `umur_pembeli`, `pekerjaan_pembeli`, `alamat_pembeli`, `tanggal`, `id_rt`, `id_rw`, `dijual`, `nominal`, `nominal_terbilang`, `batas_timur`, `batas_selatan`, `batas_barat`, `batas_utara`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_form_ketsudahmenikah`
--

INSERT INTO `tbl_form_ketsudahmenikah` (`id_form_ketsudahmenikah`, `nik`, `nama`, `alamat`, `id_rw`, `id_rt`, `tanggal_lahir`, `tempat_lahir`, `agama`, `pekerjaan`, `nama_perempuan`, `alamat_perempuan`, `tanggal_lahir_perempuan`, `tempat_lahir_perempuan`, `agama_perempuan`, `pekerjaan_perempuan`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_form_kettidakmampu`
--

INSERT INTO `tbl_form_kettidakmampu` (`id_form_kettidakmampu`, `nik`, `nama`, `alamat`, `id_rw`, `id_rt`, `tanggal_lahir`, `tempat_lahir`, `agama`, `jenis_kelamin`, `pekerjaan`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_form_ketwaris`
--

INSERT INTO `tbl_form_ketwaris` (`id_form_ketwaris`, `nik`, `nama_pemberi`, `nama_penerima`, `umur`, `alamat`, `barang_waris`, `id_rw`, `id_rt`, `luas`, `nama_lain`, `saksi`, `batas_timur`, `batas_selatan`, `batas_barat`, `batas_utara`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `tbl_form_kk`
--

INSERT INTO `tbl_form_kk` (`id_form_kk`, `nik`, `nama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `agama`, `jenis_kelamin`, `golongan_darah`, `kebangsaan`, `pekerjaan`, `pendidikan`, `status_kawin`, `nama_ayah`, `nama_ibu`, `id_rt`, `id_rw`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_lurah`) VALUES
(1, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_ktp`
--

CREATE TABLE `tbl_form_ktp` (
  `id` int(11) NOT NULL,
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
  `id_rt` int(3) DEFAULT NULL,
  `id_rw` int(3) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `verifikasi_rt` varchar(30) DEFAULT NULL,
  `verifikasi_admin` varchar(30) DEFAULT NULL,
  `verifikasi_rw` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_ktp`
--

INSERT INTO `tbl_form_ktp` (`id`, `nik`, `nama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `agama`, `jenis_kelamin`, `golongan_darah`, `kebangsaan`, `pekerjaan`, `pendidikan`, `status_kawin`, `id_rt`, `id_rw`, `tanggal_pengajuan`, `verifikasi_rt`, `verifikasi_admin`, `verifikasi_rw`) VALUES
(1, '123', '123', '123', '0123-12-03', '123', '123', '1', '123', '123', '123', '123', '123', 123, 123, '0000-00-00', 'Menunggu', NULL, 'Menunggu'),
(2, '1', '1', '11', '0001-01-11', '1', '1', '1', '1', '1', '1', '1', '1', 1, 1, '0000-00-00', 'Disetujui', NULL, 'Menunggu'),
(3, '1717051051', 'Patar', 'Jalan', '1999-10-03', 'P.Siantar', 'Kristen', 'L', 'O', 'Indonesia', 'Mahasiswa', 'Mahasiswa', 'Lajang', 0, 0, '0000-00-00', 'Ditolak', NULL, 'Disetujui'),
(6, '2', '1', '1', '0001-01-01', '1', '1', '1', '1', '1', '1', '1', '1', 1, 1, '0000-00-00', NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_by`, `created_at`, `updated_by`, `update_at`) VALUES
(1, 'admin', 'admin', 'admin', NULL, NULL, NULL, NULL),
(2, 'rt', 'rt', 'rt', NULL, NULL, NULL, NULL),
(3, 'rw', 'rw', 'rw', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_form_izinusaha`
--
ALTER TABLE `tbl_form_izinusaha`
  MODIFY `id_form_izinusaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_form_kelahiran`
--
ALTER TABLE `tbl_form_kelahiran`
  MODIFY `id_form_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_kematian`
--
ALTER TABLE `tbl_form_kematian`
  MODIFY `id_form_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_ketbelummenikah`
--
ALTER TABLE `tbl_form_ketbelummenikah`
  MODIFY `id_form_ketbelummenikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_ketdomisili`
--
ALTER TABLE `tbl_form_ketdomisili`
  MODIFY `id_form_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_kethibah`
--
ALTER TABLE `tbl_form_kethibah`
  MODIFY `id_form_kethibah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_ketjualbeli`
--
ALTER TABLE `tbl_form_ketjualbeli`
  MODIFY `id_form_ketjualbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_form_ketsudahmenikah`
--
ALTER TABLE `tbl_form_ketsudahmenikah`
  MODIFY `id_form_ketsudahmenikah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_kettidakmampu`
--
ALTER TABLE `tbl_form_kettidakmampu`
  MODIFY `id_form_kettidakmampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_ketwaris`
--
ALTER TABLE `tbl_form_ketwaris`
  MODIFY `id_form_ketwaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_kk`
--
ALTER TABLE `tbl_form_kk`
  MODIFY `id_form_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_form_ktp`
--
ALTER TABLE `tbl_form_ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
