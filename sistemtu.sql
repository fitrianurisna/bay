-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 03:55 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemtu`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(2) NOT NULL,
  `penyakit_kode` varchar(3) NOT NULL,
  `gejala_kode` varchar(3) NOT NULL,
  `nilai_bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `penyakit_kode`, `gejala_kode`, `nilai_bobot`) VALUES
(1, 'P01', 'G01', 0.9),
(2, 'P01', 'G02', 0.85),
(3, 'P01', 'G03', 0.6),
(4, 'P01', 'G04', 0.7),
(5, 'P01', 'G05', 0.4),
(6, 'P01', 'G06', 0.3),
(7, 'P02', 'G07', 0.9),
(8, 'P02', 'G08', 0.7),
(9, 'P02', 'G09', 0.7),
(10, 'P02', 'G10', 0.4),
(11, 'P03', 'G11', 0.9),
(12, 'P03', 'G12', 0.8),
(13, 'P03', 'G13', 0.8),
(14, 'P03', 'G14', 0.9),
(15, 'P03', 'G15', 0.9),
(16, 'P04', 'G16', 0.95),
(17, 'P04', 'G17', 0.95),
(18, 'P04', 'G18', 0.9),
(19, 'P04', 'G19', 0.8),
(20, 'P04', 'G20', 0.8),
(21, 'P04', 'G21', 0.8),
(22, 'P05', 'G22', 0.85),
(23, 'P05', 'G23', 0.6),
(24, 'P05', 'G24', 0.7),
(25, 'P05', 'G25', 0.9),
(26, 'P05', 'G26', 0.85),
(27, 'P06', 'G27', 0.9),
(28, 'P06', 'G28', 0.8),
(29, 'P06', 'G29', 0.2),
(30, 'P06', 'G30', 0.9),
(31, 'P06', 'G31', 0.4),
(32, 'P07', 'G32', 0.3),
(33, 'P07', 'G33', 0.3),
(34, 'P07', 'G34', 0.9),
(35, 'P07', 'G35', 0.95),
(36, 'P07', 'G36', 0.7),
(37, 'P08', 'G37', 0.5),
(38, 'P08', 'G38', 0.9),
(39, 'P08', 'G39', 0.95),
(40, 'P09', 'G40', 0.95),
(41, 'P09', 'G41', 0.9),
(42, 'P09', 'G42', 0.9),
(43, 'P10', 'G43', 0.9),
(44, 'P10', 'G44', 0.7),
(45, 'P10', 'G45', 0.95),
(46, 'P10', 'G46', 0.9);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(3) NOT NULL,
  `nama_gejala` varchar(195) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G01', 'Garis-garis coklat kehitaman pararel pada helaian daun'),
('G02', 'Bercak memanjang berukuran 2 x 20 mm parallel pada helaian daun'),
('G03', 'Pada awal perkembangan, bercak tersusun segaris searah dengan ibu tulang daun (midrib)'),
('G04', 'Bercak daun membesar berbentuk oval atau memanjang. Terdapat lingkaran berwarna kuning pada pinggiran bercak'),
('G05', 'Bercak bergabung sehingga daun mengalami nekrosis dan mengering pada sebagian atau seluruh helaian daun'),
('G06', 'Buah tidak berkembang dan mengalami pematangan lebih cepat'),
('G07', 'Bercak berwarna kuning sampai coklat pucat berbentuk belah ketupat atau berbentuk seperti mata'),
('G08', 'Bercak dengan pusat lingkaran nekrosis berwarna abu-abu'),
('G09', 'Bercak terjadi di pinggiran daun dan berkembang menuju ke ibu tulang daun (midrib), utamanya pada daun-daun yang tua'),
('G10', 'Bercak bergabung sehingga menyebabkan daun menguning dan mengering'),
('G11', 'Daun menguning dimulai dari tepi daun dan dari daun-daun yang tua'),
('G12', 'Helaian daun mengering dan menggantung karena pangkal tangkai daunnya patah'),
('G13', 'Batang semu terbelah atau pecah'),
('G14', 'Terjadi perubahan warna jaringan pembuluh menjadi coklat pada batang semu berupa titik-titik coklat apabila batang semu dipotong melintang atau garis coklat memanjang apabila batang semu dipotong'),
('G15', 'Terdapat necrosis pada bonggol. Apabila bonggol dibelah melintang, terdapat nekrosis berwarna coklat sampai hitam melingkari bonggol'),
('G16', 'Bunga (jantung) membusuk dan mengering'),
('G17', 'Daging buah busuk berlendir berwarna merah'),
('G18', 'Buah membusuk dan mengering'),
('G19', 'Daun menguning pada seluruh helaian daun, terutama dimulai dari daun termuda'),
('G20', 'Pada empulur dan tangkai tandan terdapat perubahan warna menjadi coklat-kemerahan. Pemotongan melintang pada tangkai tandan akan memperlihatkan titik-titik berwarna coklat kemerahan'),
('G21', 'Bonggol busuk dan berbau tidak sedap'),
('G22', 'Daun mengecil dan berdiri tegak'),
('G23', 'Daun pucat'),
('G24', 'Ruas daun memendek'),
('G25', 'Pada ibu tulang daun (midrib) terdapat bercak atau garis-garis berwarna hijau gelap'),
('G26', 'Tanaman Kerdil'),
('G27', 'Bercak berwarna hitam dengan 4 sudut sehingga berbentuk silang'),
('G28', 'Bercak memanjang searah dengan tulang daun (vein)'),
('G29', 'Bercak menyebar secara acak'),
('G30', 'Bercak bersilang berukuran sampai dengan 6 cm panjang'),
('G31', 'Bercak bergabung menyebabkan daun mongering, tetapi helaian daun tidak patah'),
('G32', 'Tanaman tumbuh merana'),
('G33', ' Pertumbuhan buah tidak normal'),
('G34', 'Terdapat lubang seperti terowongan pada bonggol. Hal ini mudah dilihat apabila bonggol dipotong melintang'),
('G35', 'Terdapat larva serangga berwarna putih kekuningan atau kumbang dewasa berwarna coklat kehitaman berukuran 0.6 cm pada lubang terowongan di bonggol'),
('G36', 'Akar tidak tumbuh normal'),
('G37', 'Beberapa helaian daun mengering, biasanya dari daun termuda karena pelepahnya dimakan serangga'),
('G38', 'Batang semu berlubang-lubang dan mengeluarkan lendir berwarna bening'),
('G39', 'Terdapat larva serangga berwarna putih kekuningan atau kumbang dewasa berwarna hitam mengkilat berukuran 0.6 cm pada lubang di batang semu'),
('G40', 'Lembaran daun robek dan menggulung'),
('G41', 'Gulungan daun mengering'),
('G42', 'Terdapat ulat berwarna putih kehijauan berbedak di dalam gulungan daun'),
('G43', 'Kulit buah berkudis/burik, terutama pada buah pada sisir paling bawah/paling muda'),
('G44', 'Terdapat kotoran pada sela-sela jari buah pada sisir buah yang terserang'),
('G45', 'Terdapat ulat berwarna coklat gelap di sela-sela jari buah'),
('G46', 'Terdapat ulat berwarna abu-abu orange di sela-sela seludang bunga');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(3) NOT NULL,
  `nama_penyakit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`) VALUES
('P01', 'Bercak Daun Sigatoka'),
('P02', 'Bercak Daun Cordona'),
('P03', 'Penyakit Layu Fusarium'),
('P04', 'Penyakit Darah'),
('P05', 'Penyakit Kerdil'),
('P06', 'Penyakit Bercak Bersilang'),
('P07', 'Penggerek Bonggol Pisang'),
('P08', 'Penggerek Batang Pisang'),
('P09', 'Hama Penggulung Daun Pisa'),
('P10', 'Hama Kudis Buah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'jibff1b4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
