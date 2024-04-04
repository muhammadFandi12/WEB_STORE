-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 04:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `email`, `username`, `password`, `roles`) VALUES
(9, 'admin@gmail.com', 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(10, 'fandi@gmail.com', 'fandi', '$2y$10$e33v69IPzxZSABZ1cMy1/eq48KpKtWVaSrth128Zfo8dz5nbgFE3q', 'user'),
(11, 'asep@gmail.com', 'asep', '$2y$10$fHBaOTAkRUPQZJkcW39lQOnGp.XIRhXjab2gJhdhewidNM3z8oFVW', 'admin'),
(12, 'novan@gmail.com', 'novan', '$2y$10$IwBvLfO0qnPYX68x4clPqO.k6U7aEY.v/jZwWuC8/8UY/Uxk.crO.', 'user'),
(14, 'rangga@gmail.com', 'rangga', '$2y$10$LH/E/xCDmeSl/DiHzGvArOWwnY1H248YWKxXi8xDBLi1watIZYvpi', 'staff'),
(15, 'perdana@gmail.com', 'perdana', '$2y$10$MON0L6y6O8y9iuh2WAstu.8KO3kVjZHbZ2nvnc08au8MpwqIPl65i', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `orderan` varchar(255) NOT NULL,
  `statusOrder` varchar(20) NOT NULL,
  `hargaSatuan` int(255) NOT NULL,
  `kuantitas` int(255) NOT NULL,
  `totalHarga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`id`, `user`, `image_url`, `orderan`, `statusOrder`, `hargaSatuan`, `kuantitas`, `totalHarga`) VALUES
(1, 'novan', 'image/bmw_m4.jpg', 'BMW M4', 'Verified', 120000000, 1, 120000000),
(2, 'fandi', 'image/bmw_m2.jpg', 'BMW M2', 'Verified', 15000000, 2, 30000000),
(3, 'fandi', 'image/bmw_m2.jpg', 'BMW M2', 'Verified', 15000000, 2, 30000000),
(4, 'novan', 'image/bmw_m4.jpg', 'BMW M4', 'Verified', 120000000, 1, 120000000),
(5, 'perdana', 'image/bmw_m2.jpg', 'BMW M2', 'Verified', 15000000, 1, 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int(5) NOT NULL,
  `price` int(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `model`, `year`, `price`, `image_url`) VALUES
(7, 'BMW i8', 2020, 90000000, 'bmw_i8.jpg'),
(8, 'BMW M4', 2021, 120000000, 'bmw_m4.jpg'),
(9, 'BMW M2', 2023, 15000000, 'bmw_m2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(4) NOT NULL,
  `id_order` int(4) NOT NULL,
  `user` varchar(255) NOT NULL,
  `item_order` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `terbayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_order`, `user`, `item_order`, `status`, `terbayar`) VALUES
(1, 1, 'novan', 'BMW M4', 'Unverified', 0),
(2, 2, 'fandi', 'BMW M2', 'Unverified', 0),
(3, 3, 'fandi', 'BMW M2', 'Unverified', 0),
(4, 4, 'novan', 'BMW M4', 'Unverified', 0),
(5, 5, 'perdana', 'BMW M2', 'Unverified', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
