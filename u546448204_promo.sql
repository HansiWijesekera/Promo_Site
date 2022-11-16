-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2022 at 05:50 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u546448204_promo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `status`) VALUES
(1, 'Resturants', 'A'),
(2, 'Banks', 'A'),
(3, 'Fashion', 'A'),
(4, 'Medicine', 'A'),
(5, 'Electronics', 'A'),
(6, 'Card Promotions', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `companyName` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contactNumber` varchar(50) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `categoryId` varchar(50) DEFAULT NULL,
  `registeredDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyId`, `userId`, `companyName`, `address`, `contactNumber`, `picture`, `website`, `email`, `categoryId`, `registeredDate`, `status`) VALUES
(20, 22, 'Pizza Hut', 'Nugegoda', '0712453655', 'Pizza_Hut_download.png', 'https://www.pizzahut.lk/', 'PizzaHutSl@gmail.com', '1', '2022-10-04', 'A'),
(21, 23, 'NOLIMIT', 'Maharagama', '0254421233', 'NOLIMIT_download_(1).png', 'https://www.nolimit.lk/', 'Nolimit.sl@gmail.com', '3', '2022-10-04', 'A'),
(22, 24, 'Commercial Bank Sl', 'Colombo', '0112536544', 'Commercial_Bank_Sl_Visitsl-com-3.jpg', 'www.combank.lk', 'combank@yahoo.com', '2', '2022-10-04', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promoId` int(11) NOT NULL,
  `companyId` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `addedDate` date DEFAULT NULL,
  `expireDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promoId`, `companyId`, `title`, `photo`, `link`, `addedDate`, `expireDate`) VALUES
(15, 20, 'Week End Vibes', '15_2c57108b-bd66-4640-b86d-fa70760bbf70.jpeg', 'www.pizzahut.lk', '2022-10-04', '2023-01-01'),
(14, 20, 'My Box Promo', '14_download.jpg', 'www.pizzahut.lk', '2022-10-04', '2023-01-01'),
(13, 20, 'Weekend Offer 01', '13_promo.lk-promo-e24781476edc42a1a70d85e0f5e68ea8.jpg', 'www.pizzahut.lk', '2022-10-04', '2023-01-01'),
(16, 20, 'Special Offer', '16_mypromo.lk-promo-fdfe6ee6dfc84d379ce1e99b6e73882e.jpg', 'www.pizzahut.lk', '2022-10-04', '2023-01-01'),
(17, 21, '30% Off', '17_download_(1).jpg', 'https://www.nolimit.lk/', '2022-10-04', '2023-01-01'),
(18, 21, 'Seasonal Offer', '18_download_(2).jpg', 'https://www.nolimit.lk/', '2022-10-04', '2023-01-01'),
(19, 21, 'Awrudu Wasi', '19_download_(3).jpg', 'https://www.nolimit.lk/', '2022-10-04', '2023-01-01'),
(20, 21, 'Licc Jeans Offer', '20_images.jpg', 'https://www.nolimit.lk/', '2022-10-04', '2023-01-01'),
(21, 22, 'Glomark Offer', '21_download_(4).jpg', 'www.combank.lk', '2022-10-04', '2023-01-01'),
(22, 22, 'Seasonal Offer', '22_download_(2).png', 'www.combank.lk', '2022-10-04', '2023-01-01'),
(23, 22, 'HNB Offer', '23_images_(1).jpg', 'www.combank.lk', '2022-10-04', '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `promo_subcategories`
--

CREATE TABLE `promo_subcategories` (
  `promoId` int(11) DEFAULT NULL,
  `subcatId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_subcategories`
--

INSERT INTO `promo_subcategories` (`promoId`, `subcatId`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subCatId` int(11) NOT NULL,
  `mainCatId` int(11) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subCatId`, `mainCatId`, `description`, `status`) VALUES
(1, 1, 'Chicken', 'A'),
(2, 1, 'Rice', 'A'),
(3, 1, 'Drinks', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `userType` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `password`, `userType`) VALUES
(1, 'Admin', '900150983cd24fb0d6963f7d28e17f72', 1),
(24, 'combank', '900150983cd24fb0d6963f7d28e17f72', 2),
(23, 'NOLOMIT', '900150983cd24fb0d6963f7d28e17f72', 2),
(22, 'PizzaHut1', '900150983cd24fb0d6963f7d28e17f72', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyId`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promoId`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subCatId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
