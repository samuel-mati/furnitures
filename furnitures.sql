-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 01:36 PM
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
-- Database: `furnitures`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('approved','declined') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `item`, `qty`, `price`, `status`) VALUES
(1, 'Chair', 5, 50.00, 'approved'),
(2, 'Table', 2, 150.00, 'declined'),
(3, 'Sofa', 1, 300.00, 'approved'),
(4, 'Desk', 3, 100.00, 'declined'),
(5, 'Bookshelf', 4, 80.00, 'approved'),
(6, 'Bed', 2, 200.00, 'declined'),
(7, 'Dresser', 1, 150.00, 'approved'),
(8, 'Nightstand', 2, 50.00, 'declined'),
(9, 'Cabinet', 3, 120.00, 'approved'),
(10, 'Coffee Table', 1, 80.00, 'declined'),
(11, 'TV Stand', 2, 100.00, 'approved'),
(12, 'Mirror', 1, 40.00, 'declined'),
(13, 'Wardrobe', 2, 250.00, 'approved'),
(14, 'Shoe Rack', 3, 60.00, 'declined'),
(15, 'Side Table', 2, 30.00, 'approved'),
(16, 'Lamp', 1, 20.00, 'declined'),
(17, 'Rug', 2, 70.00, 'approved'),
(18, 'Vase', 1, 25.00, 'declined'),
(19, 'Curtains', 4, 45.00, 'approved'),
(20, 'Pillow', 6, 15.00, 'declined'),
(21, 'Blanket', 3, 35.00, 'approved'),
(22, 'Clock', 1, 10.00, 'declined'),
(23, 'Artwork', 2, 90.00, 'approved'),
(24, 'Plant', 1, 55.00, 'declined');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `email`, `designation`, `phone`, `password`, `image`) VALUES
('Adele Richard', 'arichard@2024', 'Admin', '02154556985', 'adele2023', 'doctor-2.png'),
('Samuel Mati', 'sammxsaf@gmail.com', 'Admin', '0790642046', 'samuel476', 'user-1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
