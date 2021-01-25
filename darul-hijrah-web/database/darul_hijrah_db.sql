-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 10:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darul_hijrah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Oong', 'oong', '1234', '2020-12-10 13:25:01', '2020-12-10 13:25:01'),
(4, 'Marceline Dwi Normalita', 'marcelinee', '1234', '2020-12-10 13:25:15', '2020-12-10 13:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(3) NOT NULL,
  `img` varchar(255) NOT NULL,
  `caption` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img`, `caption`) VALUES
(4, '120317_b0ae21a4-aabc-4da7-8bc5-8095d5cd8147.png', ''),
(5, '120326_dicoding-banner.png', ''),
(7, '121424_quotes.jpg', ''),
(8, '032107_stiker produk makanan2.png', 'banner 2');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kitab`
--

CREATE TABLE `kategori_kitab` (
  `id` int(3) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_kitab`
--

INSERT INTO `kategori_kitab` (`id`, `kategori`) VALUES
(1, 'Kitab Aqidah'),
(3, 'Kitab Agama'),
(4, 'Kitab Hadis');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `cover`, `deskripsi`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Mengaji bersama', '000755_baratha invoice.png', '<p>asdmasdksad</p>\r\n', 'mengaji-bersama', '2020-12-11 16:50:56', '2020-12-11 16:50:56'),
(4, 'Sholat Bersama OONG', '000746_01604a288b863db862d13b121bfa6847.jpg', '<p>asdasodqwioq</p>\r\n', 'sholat-bersama-oong', '2020-12-11 16:51:07', '2020-12-11 16:51:07'),
(5, 'Bagi-bagi takjil', '000737_mark.jpg', '<p><img class=\"img-fluid\" alt=\"\" src=\"http://localhost:8080/darul-hijrah-web/uploaded_files/000746_01604a288b863db862d13b121bfa6847.jpg\" style=\"height:317px; width:564px\" /></p>\r\n\r\n<p>qwekolwqe as</p>\r\n', 'bagi-bagi-takjil', '2020-12-11 16:51:20', '2020-12-11 16:51:20'),
(6, 'Pengajian', '000301_Capture.JPG', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id ante eget magna aliquet accumsan sed at lectus. Donec eu orci ut nibh aliquet finibus vel nec leo. Donec tempus lorem ut diam rhoncus placerat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent viverra pharetra nulla sed vehicula. Proin aliquam porta lacus vel consequat. Vestibulum a efficitur orci, vel pharetra purus. Nullam porttitor urna ut venenatis consequat. Fusce nec velit eget ligula iaculis cursus. Nunc efficitur sapien ac purus ornare, lobortis hendrerit lectus ullamcorper. Integer vitae imperdiet mauris. Nunc finibus hendrerit massa non facilisis. Nulla varius suscipit ullamcorper. Maecenas vestibulum tortor sit amet mattis rhoncus. Ut feugiat pulvinar bibendum.</p>\r\n\r\n<p>Donec lectus eros, elementum at malesuada sed, euismod id metus. Phasellus a efficitur justo, non fringilla diam. Sed mollis velit a augue euismod fermentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam maximus justo diam, et elementum libero pretium consequat. Etiam pellentesque ac magna sit amet accumsan. Integer posuere justo a justo porttitor tempor. Phasellus quis purus ut libero sagittis ullamcorper. Proin convallis laoreet bibendum. Integer condimentum lobortis ligula, tristique hendrerit nibh pellentesque ac. Donec ut tincidunt erat. Proin commodo facilisis venenatis. Aliquam vel pellentesque arcu, eget faucibus tellus. Fusce sagittis quam ac metus ultrices tincidunt. Mauris congue lectus sit amet nisi condimentum egestas nec non risus. Aenean tincidunt magna non egestas aliquam.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img class=\"img-fluid\" alt=\"\" src=\"http://localhost:8080/darul-hijrah-web/uploaded_files/images.jpg\" style=\"height:183px; width:275px\" /></p>\r\n\r\n<p>Sed luctus at massa sit amet bibendum. Maecenas rutrum sodales turpis, id blandit neque dictum ut. Quisque varius ipsum augue, ac finibus est laoreet varius. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus fringilla metus erat, eu lacinia ligula elementum eu. Nunc nec lorem sit amet metus dignissim mollis et sed justo. Vestibulum tincidunt, quam sed ornare tristique, lorem mi tempus magna, eget porttitor purus nisl non dolor. Ut aliquet neque auctor efficitur interdum. Nulla mollis tristique quam, eget dapibus lacus tristique quis.</p>\r\n\r\n<p><img class=\"img-fluid\" alt=\"\" src=\"http://localhost:8080/darul-hijrah-web/uploaded_files/000755_baratha%20invoice.png\" style=\"height:1080px; width:1920px\" /></p>\r\n\r\n<p>Suspendisse nec varius dui. Sed id enim tincidunt, laoreet sem in, faucibus urna. Maecenas eu bibendum orci. Suspendisse faucibus ornare lorem, ut mollis arcu rutrum nec. Etiam pharetra dui sed metus luctus lacinia. Donec et tellus tellus. Pellentesque vitae augue at elit feugiat blandit. Phasellus vitae lobortis risus. Proin at libero a lectus ultrices malesuada et sed elit.</p>\r\n\r\n<p>Fusce quis velit felis. Nulla scelerisque rhoncus enim sit amet euismod. Donec lorem orci, finibus eget lorem sed, gravida aliquet augue. Ut molestie arcu porta condimentum sodales. Maecenas egestas auctor augue, at bibendum mi tristique at. Nunc mattis varius lectus eu convallis. Praesent semper tellus quam, a vestibulum nulla scelerisque non. Phasellus tempus turpis vel velit aliquet, et aliquet mauris facilisis.</p>\r\n', 'pengajian', '2020-12-11 17:03:01', '2020-12-11 17:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_santri` int(3) NOT NULL DEFAULT 5,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `jumlah_santri`, `slug`) VALUES
(4, 'Kelas A', 20, 'kelas-a'),
(12, 'Kelas B', 50, 'kelas-b');

-- --------------------------------------------------------

--
-- Table structure for table `kitab`
--

CREATE TABLE `kitab` (
  `kode_kitab` varchar(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` varchar(100) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` varchar(13) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kitab`
--

INSERT INTO `kitab` (`kode_kitab`, `judul`, `id_kategori`, `deskripsi`, `cover`, `penulis`, `penerbit`, `tahun`, `stok`, `harga`, `slug`, `created_at`, `updated_at`) VALUES
('K-002', 'Tes Kitab', 1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui odit, possimus aperiam adipisci officia ab nemo. Animi laborum eaque sunt itaque voluptatem, officia facilis adipisci culpa. Sapiente ullam quos dolores.', '184325_c650a4ac890b20050cf4e720647a3b0c.jfif', 'oong', 'Darul Hijrah', 2010, 12, '50000', 'tes-kitab', '0000-00-00 00:00:00', '2020-12-15 06:31:09'),
('K-003', 'Kitab Islam', 3, 'lorem ipsum dolor', '231252_AFP_DE6YT.jpg', 'Oong', 'RPL', 2010, 12, '85000', 'kitab-islam', '0000-00-00 00:00:00', '2020-12-17 20:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `web_profile`
--

CREATE TABLE `web_profile` (
  `id` int(1) NOT NULL DEFAULT 1,
  `judul` varchar(30) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `sejarah` text NOT NULL,
  `kontak` varchar(200) NOT NULL,
  `order_kontak` varchar(15) NOT NULL,
  `laboratorium` int(3) NOT NULL,
  `musholla` int(3) NOT NULL,
  `asrama` int(4) NOT NULL,
  `pengajar` int(4) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_profile`
--

INSERT INTO `web_profile` (`id`, `judul`, `logo`, `deskripsi`, `sejarah`, `kontak`, `order_kontak`, `laboratorium`, `musholla`, `asrama`, `pengajar`, `visi`, `misi`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Darul Hijrah', '060101_AFP_DE6YT.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ipsum eos ipsam autem libero repellendus, eligendi porro quo placeat, odio rem alias ipsa culpa et voluptas sit. Repudiandae, alias pariatur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ipsum eos ipsam autem libero repellendus, eligendi porro quo placeat, odio rem alias ipsa culpa et voluptas sit. Repudiandae, alias pariatur.', '085112447853', '085112447855', 200, 10, 300, 0, 'Ini visi', 'Ini misi', 'Jl. Jokotole, Madura, Pamekasan', '2020-11-03 17:12:23', '2020-11-03 17:12:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_kitab`
--
ALTER TABLE `kategori_kitab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitab`
--
ALTER TABLE `kitab`
  ADD PRIMARY KEY (`kode_kitab`);

--
-- Indexes for table `web_profile`
--
ALTER TABLE `web_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_kitab`
--
ALTER TABLE `kategori_kitab`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
