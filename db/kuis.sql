-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 05:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawaban`
--

CREATE TABLE `tbl_jawaban` (
  `id` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `pilihan_jawab` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jawaban`
--

INSERT INTO `tbl_jawaban` (`id`, `id_soal`, `pilihan_jawab`) VALUES
(75, 22, 'anti oksidan'),
(76, 22, 'Anti-oksidan'),
(77, 22, 'Menetralisasikan'),
(78, 22, 'Menetralisasi'),
(91, 26, 'Jadi dibicarakan'),
(92, 26, 'Tengah dibicarakan'),
(93, 26, 'Berbagai media massa'),
(94, 26, 'Berbagai media-media massa'),
(104, 32, 'memesankan'),
(105, 32, 'pesan'),
(106, 32, 'es sirup nanas'),
(107, 32, 'sirop nanas'),
(108, 33, 'Ijazah yang berlegalisir'),
(109, 33, 'Ijazah yang dilegalisasi'),
(110, 33, 'Itu adalah syarat'),
(111, 33, 'Syarat itulah'),
(112, 34, 'Tugaskan'),
(113, 34, 'Menugasi'),
(114, 34, 'Mengantarkan'),
(115, 34, 'Antarkan'),
(116, 35, 'Terkait erat'),
(117, 35, 'Berkait erat'),
(118, 35, 'Kami sedang rundingkan'),
(119, 35, 'Sedang kami rundingkan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_score`
--

CREATE TABLE `tbl_score` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id` int(11) NOT NULL,
  `soal` varchar(225) NOT NULL,
  `jawaban` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id`, `soal`, `jawaban`) VALUES
(22, 'Zat antioksidan penting karena mampu menetralisir kelainan organ tubuh.', 'Menetralisasi'),
(26, 'Masalah narkoba ini sedang menjadi pembicaraan di berbagai media-media massa.', 'Berbagai media massa'),
(32, 'X: Kamu mau memesan apa? \r\nY : Es sirup nanas.\r\nperbaikilah kata yang kurang tepat!', 'pesan'),
(33, 'Anda harus menyerahkan ijasah yang dilegalisir. Itu merupakan syarat yang harus dipenuhi.', 'Ijazah yang dilegalisasi'),
(34, 'Pimpinan menugaskan kami untuk mengantar tamu mengunjungi objek wisata.', 'Menugasi'),
(35, 'Revisi itu berkaitan erat dengan perubahan anggaran yang sedang dirundingkan oleh kami dengan pihak kontraktor.', 'sedang kami rundingkan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$dmRDHBpBm/HU6qYXDfhyhuE4US9fsBekoWKuwWd00Im9vh2ke./8y'),
(9, 'jono', 'jono@gmail.com', '$2y$10$7VFNoOsNvI/cPsHkPFnHsON8l/LWkC8w0gVYyt2xsdYVaTn86.psO'),
(14, 'wahyu', 'wahyu@gmail.com', '$2y$10$TRlre8jFEuf7RHSflG0LaeR930Q.fgVZJiu5/n4XExvtNm/PhBdvi'),
(16, 'azriqin', 'azriqin@gmail.com', '$2y$10$Mf7zxRyPJqe7hmKNsrm/4OuZlP8yWa4tnThgOnZRKqw3GlSPRGJIu'),
(17, 'anda', 'anda@gmail.com', '$2y$10$7dx3TlSfFKcKvepPpM7Fd.yRKlsgUTQSCxagmvmzaEsOTYvBjGRyG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
