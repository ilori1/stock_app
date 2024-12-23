-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 02:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storeapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `category`) VALUES
(22, 'charger'),
(24, 'screen'),
(26, 'hhkk'),
(27, 'phone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `subtotal` double NOT NULL,
  `discount` double NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `total` double NOT NULL,
  `payment_type` tinytext NOT NULL,
  `due` double NOT NULL,
  `paid` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `order_date`, `subtotal`, `discount`, `sgst`, `cgst`, `total`, `payment_type`, `due`, `paid`) VALUES
(93, '2024-05-13', 8009, 0, 0, 0, 8009, 'Cash', -991, 9000),
(94, '2024-05-13', 27007, 0, 0, 0, 27007, 'Cash', -993, 28000),
(95, '2024-05-13', 78064, 1, 0, 0, 77283.36, 'Check', -2716.64, 80000),
(96, '2024-05-13', 10000, 0, 0, 0, 10000, 'Cash', 0, 10000),
(97, '2024-05-14', 7, 0, 0, 0, 7, 'Check', 2, 5),
(98, '2024-05-15', 0, 0, 0, 0, 0, 'Cash', -88, 88),
(99, '2024-05-15', 121000, 0, 0, 0, 121000, 'Card', -9000, 130000),
(100, '2024-05-15', 77000, 0, 0, 0, 77000, 'Card', -423000, 500000),
(101, '2024-05-15', 77000, 0, 0, 0, 77000, 'Card', -423000, 500000),
(102, '2024-05-15', 8000, 0, 0, 0, 8000, 'Cash', -1000, 9000),
(103, '2024-05-15', 3000, 0, 0, 0, 3000, 'Cash', -1000, 4000),
(104, '2024-05-15', 3000, 0, 0, 0, 3000, 'Cash', -2000, 5000),
(105, '2024-05-15', 5000, 0, 0, 0, 5000, 'Cash', -2000, 7000),
(106, '2024-05-15', 21000, 0, 0, 0, 21000, 'Cash', -59000, 80000),
(107, '2024-05-15', 5000, 0, 0, 0, 5000, 'Cash', -1000, 6000),
(108, '2024-05-15', 185007, 0, 0, 0, 185007, 'Card', -936104, 1121111),
(109, '2024-05-15', 14000, 0, 0, 0, 14000, 'Cash', -1000, 15000),
(110, '2024-05-15', 0, 0, 0, 0, 0, 'Cash', -888, 888),
(111, '2024-05-15', 14000, 0, 0, 0, 14000, 'Cash', -1000, 15000),
(112, '2024-05-15', 14000, 0, 0, 0, 14000, 'Cash', -1000, 15000),
(113, '2024-05-15', 14000, 0, 0, 0, 14000, 'Cash', -1000, 15000),
(114, '2024-05-15', 14000, 0, 0, 0, 14000, 'Cash', -1000, 15000),
(115, '2024-05-15', 3000, 0, 0, 0, 3000, 'Cash', -47000, 50000),
(116, '2024-05-15', 5000, 0, 0, 0, 5000, 'Cash', -1000, 6000),
(117, '2024-05-17', 3008, 0, 0, 0, 3008, 'Check', -1992, 5000),
(118, '2024-05-17', 3008, 0, 0, 0, 3008, 'Check', -1992, 5000),
(119, '2024-05-17', 3008, 0, 0, 0, 3008, 'Check', -1992, 5000),
(120, '2024-05-17', 3008, 0, 0, 0, 3008, 'Check', -1992, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_details`
--

CREATE TABLE `tbl_invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `barcode` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` double NOT NULL,
  `saleprice` double NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_invoice_details`
--

INSERT INTO `tbl_invoice_details` (`id`, `invoice_id`, `barcode`, `product_id`, `product_name`, `qty`, `rate`, `saleprice`, `order_date`) VALUES
(72, 93, '33090427', 33, 'ad', 1, 7, 7, '2024-05-13'),
(73, 93, '26065950', 26, 'nam', 1, 2, 2, '2024-05-13'),
(74, 93, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-13'),
(75, 93, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-13'),
(76, 94, '19095821', 19, 'x690', 1, 10000, 10000, '2024-05-13'),
(77, 94, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-13'),
(78, 94, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-13'),
(79, 94, '16095608', 16, 'x657', 1, 7, 7, '2024-05-13'),
(80, 94, '18095739', 18, 'x650', 1, 9000, 9000, '2024-05-13'),
(81, 95, '34090900', 34, 'ilori', 3, 12, 36, '2024-05-13'),
(82, 95, '17095654', 17, 'x657', 1, 8000, 8000, '2024-05-13'),
(83, 95, '19095821', 19, 'x690', 7, 10000, 70000, '2024-05-13'),
(84, 95, '16095608', 16, 'x657', 4, 7, 28, '2024-05-13'),
(85, 96, '19095821', 19, 'x690', 1, 10000, 10000, '2024-05-13'),
(86, 97, '36125013', 36, 'a', 2, 2, 4, '2024-05-14'),
(87, 97, '27084821', 27, 'h', 1, 3, 3, '2024-05-14'),
(88, 99, '22100102', 22, 'x690', 5, 3000, 15000, '2024-05-15'),
(89, 99, '21095948', 21, 'x657', 3, 5000, 15000, '2024-05-15'),
(90, 99, '17095654', 17, 'x657', 8, 8000, 64000, '2024-05-15'),
(91, 99, '18095739', 18, 'x650', 3, 9000, 27000, '2024-05-15'),
(92, 100, '22100102', 22, 'x690', 5, 3000, 15000, '2024-05-15'),
(93, 100, '17095654', 17, 'x657', 6, 8000, 48000, '2024-05-15'),
(94, 100, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-15'),
(95, 100, '18095739', 18, 'x650', 1, 9000, 9000, '2024-05-15'),
(96, 101, '22100102', 22, 'x690', 5, 3000, 15000, '2024-05-15'),
(97, 101, '17095654', 17, 'x657', 6, 8000, 48000, '2024-05-15'),
(98, 101, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-15'),
(99, 101, '18095739', 18, 'x650', 1, 9000, 9000, '2024-05-15'),
(100, 102, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-15'),
(101, 102, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-15'),
(102, 103, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-15'),
(103, 104, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-15'),
(104, 105, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-15'),
(105, 106, '22100102', 22, 'x690', 2, 3000, 6000, '2024-05-15'),
(106, 106, '21095948', 21, 'x657', 3, 5000, 15000, '2024-05-15'),
(107, 107, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-15'),
(108, 108, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-15'),
(109, 108, '16095608', 16, 'x657', 1, 7, 7, '2024-05-15'),
(110, 108, '18095739', 18, 'x650', 20, 9000, 180000, '2024-05-15'),
(111, 109, '17095654', 17, 'x657', 1, 8000, 8000, '2024-05-15'),
(112, 109, '22100102', 22, 'x690', 2, 3000, 6000, '2024-05-15'),
(113, 111, '17095654', 17, 'x657', 1, 8000, 8000, '2024-05-15'),
(114, 111, '22100102', 22, 'x690', 2, 3000, 6000, '2024-05-15'),
(115, 112, '17095654', 17, 'x657', 1, 8000, 8000, '2024-05-15'),
(116, 112, '22100102', 22, 'x690', 2, 3000, 6000, '2024-05-15'),
(117, 113, '17095654', 17, 'x657', 1, 8000, 8000, '2024-05-15'),
(118, 113, '22100102', 22, 'x690', 2, 3000, 6000, '2024-05-15'),
(119, 114, '17095654', 17, 'x657', 1, 8000, 8000, '2024-05-15'),
(120, 114, '22100102', 22, 'x690', 2, 3000, 6000, '2024-05-15'),
(121, 115, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-15'),
(122, 116, '21095948', 21, 'x657', 1, 5000, 5000, '2024-05-15'),
(123, 117, '1', 25, '1', 1, 6, 6, '2024-05-17'),
(124, 117, '40084828', 40, '1', 1, 2, 2, '2024-05-17'),
(125, 117, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-17'),
(126, 118, '1', 25, '1', 1, 6, 6, '2024-05-17'),
(127, 118, '40084828', 40, '1', 1, 2, 2, '2024-05-17'),
(128, 118, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-17'),
(129, 119, '1', 25, '1', 1, 6, 6, '2024-05-17'),
(130, 119, '40084828', 40, '1', 1, 2, 2, '2024-05-17'),
(131, 119, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-17'),
(132, 120, '1', 25, '1', 1, 6, 6, '2024-05-17'),
(133, 120, '40084828', 40, '1', 1, 2, 2, '2024-05-17'),
(134, 120, '22100102', 22, 'x690', 1, 3000, 3000, '2024-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pid` int(11) NOT NULL,
  `barcode` varchar(1000) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `purchaseprice` float NOT NULL,
  `saleprice` float NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pid`, `barcode`, `product`, `category`, `description`, `stock`, `purchaseprice`, `saleprice`, `image`) VALUES
(16, '16095608', 'x657', 'charger', '6', 0, 7, 7, '66354f6844a5c.jpg'),
(17, '17095654', 'x657', 'screen', '\\ddsc', 54, 7000, 8000, '66354f962482c.jpg'),
(18, '18095739', 'x650', 'screen', 'asdfghjk', 89974, 8000, 9000, '66354fc3c5287.jpg'),
(19, '19095821', 'x690', 'screen', 'asdfghjk', 0, 9000, 10000, '66354fedb1cf8.jpg'),
(20, '20095912', 'x624', 'battey', 'x624', 3, 5000, 6000, '66355020743af.jpg'),
(21, '21095948', 'x657', 'battey', 'asdfghjk', 4, 4000, 5000, '663550448aa1a.jpg'),
(22, '22100102', 'x690', 'screen', 'sdfgh', 47, 2000, 3000, '6635508eaf211.jpg'),
(25, '1', '1', 'charger', '', 0, 5, 6, '6640afeaa88b9.png'),
(26, '26065950', 'nam', 'screen', '', 9, 2, 2, '6641039617e61.png'),
(27, '27084821', 'h', 'screen', '', 2, 2, 3, 'default_image.jpg'),
(28, '1', 'h', 'phone', '', 1, 2, 3, 'default_image.jpg'),
(30, '30085137', 'h', 'screen', '', 7, 8, 7, 'default_image.png'),
(31, '5065014005026', 'h', 'phone', '', 7, 8, 7, 'default_image.png'),
(32, '5065014005026', 'u', 'screen', 'u', 6, 8, 8, 'default_image.png'),
(33, '33090427', 'ad', 'screen', 'ade', 1, 8, 7, 'default_image.png'),
(34, '34090900', 'ilori', 'screen', '', 9, 12, 12, 'default_image.png'),
(35, '35124434', '3', 'charger', 'q', 0, 2, 2, 'default_image.png'),
(36, '36125013', 'a', 'screen', '', 29, 2, 2, 'default_image.png'),
(37, '37125038', '2', 'screen', '', 0, 2, 2, 'default_image.png'),
(38, '38125103', 'c', 'charger', '', 22, 2, 2, 'default_image.png'),
(39, '39042421', 'u', 'screen', '689', 123, 5, 4, 'default_image.png'),
(40, '40084828', '1', 'phone', '', 1, 2, 2, 'default_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taxdis`
--

CREATE TABLE `tbl_taxdis` (
  `taxdis_id` int(11) NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_taxdis`
--

INSERT INTO `tbl_taxdis` (`taxdis_id`, `sgst`, `cgst`, `discount`) VALUES
(1, 2.4, 2.4, 10),
(2, 5, 5, 102),
(3, 5, 5, 10),
(4, 2, 2, 1003),
(5, 24, 34, 100),
(6, 2.5, 2.5, 2),
(7, 1, 1, 1),
(8, 1, 1, 0),
(9, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `userpassword` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `useremail`, `userpassword`, `role`) VALUES
(15, 'nasir', 'nasirakande@gmail.com', '111', 'Admin'),
(16, 'user', 'user@gmail.com', '123', 'User'),
(17, 'Ilori Yusuf', 'hitzseryusluckillorry2@gmail.com', '123', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_taxdis`
--
ALTER TABLE `tbl_taxdis`
  ADD PRIMARY KEY (`taxdis_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_invoice_details`
--
ALTER TABLE `tbl_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_taxdis`
--
ALTER TABLE `tbl_taxdis`
  MODIFY `taxdis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
