-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Des 2017 pada 16.51
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_user`
--

CREATE TABLE `tipe_user` (
  `id_tipe_user` int(11) NOT NULL,
  `tipe_user` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_user`
--

INSERT INTO `tipe_user` (`id_tipe_user`, `tipe_user`) VALUES
(1, 'HRD'),
(2, 'General Manager'),
(3, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_tipe_user` int(11) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_tipe_user`, `nama_user`, `username`, `password`) VALUES
(1, 1, 'Hadi Kurniawan', 'hadikaes', '123456'),
(2, 2, 'Kiki Sudiana', 'mrkiki', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipe_user`
--
ALTER TABLE `tipe_user`
  ADD PRIMARY KEY (`id_tipe_user`),
  ADD UNIQUE KEY `id_tipe_user` (`id_tipe_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipe_user`
--
ALTER TABLE `tipe_user`
  MODIFY `id_tipe_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
