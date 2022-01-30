-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2022 at 10:04 AM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `platiniu_resampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id_desa` int(12) NOT NULL,
  `username_desa` varchar(255) NOT NULL,
  `password_desa` varchar(255) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `kecamatan_desa` varchar(255) NOT NULL,
  `kabupaten_desa` varchar(255) NOT NULL,
  `provinsi_desa` varchar(255) NOT NULL,
  `kode_pos_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`id_desa`, `username_desa`, `password_desa`, `nama_desa`, `kecamatan_desa`, `kabupaten_desa`, `provinsi_desa`, `kode_pos_desa`) VALUES
(1, 'desa_prupuh', 'Ekjhq109', 'Prupuh', 'Panceng', 'Gresik', 'Jawa Timur', '61156');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_transaksi_sampah`
--

CREATE TABLE `tbl_item_transaksi_sampah` (
  `id_item_transaksi_sampah` int(12) NOT NULL,
  `id_transaksi_sampah` int(12) NOT NULL,
  `id_sampah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_sampah`
--

CREATE TABLE `tbl_kategori_sampah` (
  `id_kategori_sampah` int(12) NOT NULL,
  `nama_kategori_sampah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keypair`
--

CREATE TABLE `tbl_keypair` (
  `id` int(11) NOT NULL,
  `public_key` text NOT NULL,
  `private_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keypair`
--

INSERT INTO `tbl_keypair` (`id`, `public_key`, `private_key`) VALUES
(1, 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCifgfMx4FOQNCfv7ik6m4L19MozaduaeE754BuTln3+xo7gPmg3xRTUvobjg+Bhbe5cw59/EDvhpe5E8pIJop6+qxsMaVn37iD/FKZh2v4qsIBg3PTa+h++qX4IPbgYVTCd9UWGF3HfJ5ZKG7z/SK+u4y/2bdqj/Imib5pq8pCXQIDAQAB', 'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAKJ+B8zHgU5A0J+/uKTqbgvX0yjNp25p4TvngG5OWff7GjuA+aDfFFNS+huOD4GFt7lzDn38QO+Gl7kTykgminr6rGwxpWffuIP8UpmHa/iqwgGDc9Nr6H76pfgg9uBhVMJ31RYYXcd8nlkobvP9Ir67jL/Zt2qP8iaJvmmrykJdAgMBAAECgYALmeHmreu+cYQzk5WUOKSItez+gchNasPI6htSRMfJm6Tg0LGB2ctys37lzruurKRUWjGTrxnXwA0/Cnmrswy549TrDRHM1iJiapcssjM66wyxMHSWxip+YTLiyHXpPLYQlL9VVAXxGGCxuC2oult3oOh/NBQgMR0DfAiaJHZQBQJBANiA/C1dFklkE/Jvu/vC7IK7wfjvciotP4RzTir4JVXmfbJd1BfTr3hfW/+txOjb9lT9MZ7OlJC37Qa5Tc8Zf8cCQQDAIqKgYrH+i47J1xYnDEohXuyWuupvPNUCB1UjNE+OH1tuwEuAqVQEzgCO79vcS30mfEpo554RU3gZsY2bHrS7AkB5yBQRcEsY/TI7LJ6Q/xQKdZKmdAnDr7AK0NEnWm2l5ADQU/b5cBlDnGAjcZtRYGkvZTyEF695t/ubzJ/33mABAkBDFVS2rv76ovtt2Z0wcQgI8r2kOwrTX+f3V1wQeJk2RBiGaLlz6KsfKlXjkjeviOPfZhIM4qG75urN/cI1YNk1AkEAtxbOlmMeufAKnfo9ZCFgMXAu5wkKT4eanjLTDYMBkjXqbGgF+bckTipcfKZ+Mn8du6koeZLPckbJ4SWo1OM2uw==');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nasabah`
--

CREATE TABLE `tbl_nasabah` (
  `id_nasabah` int(12) NOT NULL,
  `nik_nasabah` varchar(255) NOT NULL,
  `username_nasabah` varchar(255) NOT NULL,
  `password_nasabah` varchar(255) NOT NULL,
  `nama_nasabah` varchar(255) NOT NULL,
  `alamat_nasabah` varchar(255) NOT NULL,
  `jk_nasabah` varchar(255) NOT NULL,
  `id_desa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nasabah`
--

INSERT INTO `tbl_nasabah` (`id_nasabah`, `nik_nasabah`, `username_nasabah`, `password_nasabah`, `nama_nasabah`, `alamat_nasabah`, `jk_nasabah`, `id_desa`) VALUES
(1, '3525031907960001', 'awasian', 'Ekjhq109', 'Abdullah Wasian', 'Desa Prupuh, Kec Panceng, Kab Gresik', 'Laki-laki', 1),
(2, '3525031907930002', 'fathurs', '123', 'Fathurrahman Saeri', 'Jln Raya Prupuh', 'Laki-laki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pencapaian`
--

CREATE TABLE `tbl_pencapaian` (
  `id_pencapaian` int(12) NOT NULL,
  `total_pencapaian_kg` int(12) NOT NULL,
  `id_nasabah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pencapaian`
--

INSERT INTO `tbl_pencapaian` (`id_pencapaian`, `total_pencapaian_kg`, `id_nasabah`) VALUES
(1, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pincode`
--

CREATE TABLE `tbl_pincode` (
  `id_pincode` int(11) NOT NULL,
  `pincode` int(255) NOT NULL,
  `id_nasabah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pincode`
--

INSERT INTO `tbl_pincode` (`id_pincode`, `pincode`, `id_nasabah`) VALUES
(1, 725500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rt_desa`
--

CREATE TABLE `tbl_rt_desa` (
  `id_rt` int(12) NOT NULL,
  `nomor_rt_desa` int(12) NOT NULL,
  `password_rt_desa` varchar(255) NOT NULL,
  `nama_unit_rt_desa` varchar(255) NOT NULL,
  `nama_kepala_rt_desa` varchar(255) NOT NULL,
  `id_desa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `id_saldo` int(12) NOT NULL,
  `jml_saldo_nasabah` int(255) NOT NULL,
  `id_nasabah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_saldo`
--

INSERT INTO `tbl_saldo` (`id_saldo`, `jml_saldo_nasabah`, `id_nasabah`) VALUES
(1, 38000, 1),
(2, 60000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo_monthly`
--

CREATE TABLE `tbl_saldo_monthly` (
  `id_saldo_monthly` int(12) NOT NULL,
  `jml_saldo_monthly` int(12) NOT NULL,
  `starting_date_monthly` date NOT NULL,
  `end_date_monthly` date NOT NULL,
  `id_nasabah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_saldo_monthly`
--

INSERT INTO `tbl_saldo_monthly` (`id_saldo_monthly`, `jml_saldo_monthly`, `starting_date_monthly`, `end_date_monthly`, `id_nasabah`) VALUES
(1, 3000, '2022-01-01', '2022-01-31', 1),
(2, 7500, '2022-01-01', '2022-01-31', 1),
(3, 5000, '2022-02-01', '2022-02-28', 1),
(4, 6000, '2022-01-01', '2022-01-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sampah`
--

CREATE TABLE `tbl_sampah` (
  `id_sampah` int(12) NOT NULL,
  `nama_sampah` varchar(255) NOT NULL,
  `harga_sampah` int(12) NOT NULL,
  `id_kategori_sampah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `id_subs` int(12) NOT NULL,
  `start_subs_date` datetime NOT NULL,
  `end_subs_date` datetime NOT NULL,
  `days_subs` int(12) NOT NULL,
  `id_desa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_sampah`
--

CREATE TABLE `tbl_transaksi_sampah` (
  `id_transaksi_sampah` int(12) NOT NULL,
  `subtotal_transaksi_sampah` int(12) NOT NULL,
  `tgl_transaksi_sampah` datetime NOT NULL,
  `catatan_transaksi_sampah` text NOT NULL,
  `id_nasabah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tbl_item_transaksi_sampah`
--
ALTER TABLE `tbl_item_transaksi_sampah`
  ADD PRIMARY KEY (`id_item_transaksi_sampah`),
  ADD KEY `tbl_item_transaksi_sampah_fk0` (`id_transaksi_sampah`),
  ADD KEY `tbl_item_transaksi_sampah_fk1` (`id_sampah`);

--
-- Indexes for table `tbl_kategori_sampah`
--
ALTER TABLE `tbl_kategori_sampah`
  ADD PRIMARY KEY (`id_kategori_sampah`);

--
-- Indexes for table `tbl_keypair`
--
ALTER TABLE `tbl_keypair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nasabah`
--
ALTER TABLE `tbl_nasabah`
  ADD PRIMARY KEY (`id_nasabah`),
  ADD KEY `tbl_nasabah_fk0` (`id_desa`);

--
-- Indexes for table `tbl_pencapaian`
--
ALTER TABLE `tbl_pencapaian`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `tbl_pencapaian_fk0` (`id_nasabah`);

--
-- Indexes for table `tbl_pincode`
--
ALTER TABLE `tbl_pincode`
  ADD PRIMARY KEY (`id_pincode`);

--
-- Indexes for table `tbl_rt_desa`
--
ALTER TABLE `tbl_rt_desa`
  ADD KEY `tbl_rt_desa_fk0` (`id_desa`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `tbl_saldo_fk0` (`id_nasabah`);

--
-- Indexes for table `tbl_saldo_monthly`
--
ALTER TABLE `tbl_saldo_monthly`
  ADD PRIMARY KEY (`id_saldo_monthly`),
  ADD KEY `tbl_saldo_monthly_fk0` (`id_nasabah`);

--
-- Indexes for table `tbl_sampah`
--
ALTER TABLE `tbl_sampah`
  ADD PRIMARY KEY (`id_sampah`),
  ADD KEY `tbl_sampah_fk0` (`id_kategori_sampah`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`id_subs`),
  ADD KEY `tbl_subscription_fk0` (`id_desa`);

--
-- Indexes for table `tbl_transaksi_sampah`
--
ALTER TABLE `tbl_transaksi_sampah`
  ADD PRIMARY KEY (`id_transaksi_sampah`),
  ADD KEY `tbl_transaksi_sampah_fk0` (`id_nasabah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id_desa` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_item_transaksi_sampah`
--
ALTER TABLE `tbl_item_transaksi_sampah`
  MODIFY `id_item_transaksi_sampah` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori_sampah`
--
ALTER TABLE `tbl_kategori_sampah`
  MODIFY `id_kategori_sampah` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_nasabah`
--
ALTER TABLE `tbl_nasabah`
  MODIFY `id_nasabah` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pencapaian`
--
ALTER TABLE `tbl_pencapaian`
  MODIFY `id_pencapaian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  MODIFY `id_saldo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_saldo_monthly`
--
ALTER TABLE `tbl_saldo_monthly`
  MODIFY `id_saldo_monthly` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sampah`
--
ALTER TABLE `tbl_sampah`
  MODIFY `id_sampah` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `id_subs` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaksi_sampah`
--
ALTER TABLE `tbl_transaksi_sampah`
  MODIFY `id_transaksi_sampah` int(12) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_item_transaksi_sampah`
--
ALTER TABLE `tbl_item_transaksi_sampah`
  ADD CONSTRAINT `tbl_item_transaksi_sampah_fk0` FOREIGN KEY (`id_transaksi_sampah`) REFERENCES `tbl_transaksi_sampah` (`id_transaksi_sampah`),
  ADD CONSTRAINT `tbl_item_transaksi_sampah_fk1` FOREIGN KEY (`id_sampah`) REFERENCES `tbl_sampah` (`id_sampah`);

--
-- Constraints for table `tbl_nasabah`
--
ALTER TABLE `tbl_nasabah`
  ADD CONSTRAINT `tbl_nasabah_fk0` FOREIGN KEY (`id_desa`) REFERENCES `tbl_desa` (`id_desa`);

--
-- Constraints for table `tbl_pencapaian`
--
ALTER TABLE `tbl_pencapaian`
  ADD CONSTRAINT `tbl_pencapaian_fk0` FOREIGN KEY (`id_nasabah`) REFERENCES `tbl_nasabah` (`id_nasabah`);

--
-- Constraints for table `tbl_rt_desa`
--
ALTER TABLE `tbl_rt_desa`
  ADD CONSTRAINT `tbl_rt_desa_fk0` FOREIGN KEY (`id_desa`) REFERENCES `tbl_desa` (`id_desa`);

--
-- Constraints for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD CONSTRAINT `tbl_saldo_fk0` FOREIGN KEY (`id_nasabah`) REFERENCES `tbl_nasabah` (`id_nasabah`);

--
-- Constraints for table `tbl_saldo_monthly`
--
ALTER TABLE `tbl_saldo_monthly`
  ADD CONSTRAINT `tbl_saldo_monthly_fk0` FOREIGN KEY (`id_nasabah`) REFERENCES `tbl_nasabah` (`id_nasabah`);

--
-- Constraints for table `tbl_sampah`
--
ALTER TABLE `tbl_sampah`
  ADD CONSTRAINT `tbl_sampah_fk0` FOREIGN KEY (`id_kategori_sampah`) REFERENCES `tbl_kategori_sampah` (`id_kategori_sampah`);

--
-- Constraints for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD CONSTRAINT `tbl_subscription_fk0` FOREIGN KEY (`id_desa`) REFERENCES `tbl_desa` (`id_desa`);

--
-- Constraints for table `tbl_transaksi_sampah`
--
ALTER TABLE `tbl_transaksi_sampah`
  ADD CONSTRAINT `tbl_transaksi_sampah_fk0` FOREIGN KEY (`id_nasabah`) REFERENCES `tbl_nasabah` (`id_nasabah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
