-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 07:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bridal_dresses`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `billID` int(8) NOT NULL,
  `bookingID` int(8) NOT NULL,
  `customerID` int(8) NOT NULL,
  `billedDate` date NOT NULL,
  `totalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookeddress`
--

CREATE TABLE `bookeddress` (
  `bookingID` int(8) NOT NULL,
  `Cname` varchar(20) NOT NULL,
  `dressCode` varchar(10) NOT NULL,
  `bookedDate` date NOT NULL,
  `returnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookeddress`
--

INSERT INTO `bookeddress` (`bookingID`, `Cname`, `dressCode`, `bookedDate`, `returnDate`) VALUES
(38682514, 'Jason Eric Silva', 'G001', '2025-03-21', '2025-04-04'),
(58038290, 'Jason Silva', 'G003', '2025-03-21', '2025-03-28'),
(68147632, 'Jason Cody', 'G001', '2025-03-30', '2025-04-04'),
(89018718, 'Jason Cody', 'S001', '2025-03-26', '2025-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(8) NOT NULL,
  `Cname` varchar(20) NOT NULL,
  `Cemail` varchar(30) NOT NULL,
  `Cpassword` varchar(30) NOT NULL,
  `Cdob` date NOT NULL,
  `Cmobile` int(15) NOT NULL,
  `Caddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `Cname`, `Cemail`, `Cpassword`, `Cdob`, `Cmobile`, `Caddress`) VALUES
(1, 'Jason Silva', 'jason@gmail.com', '123', '2000-07-06', 710501589, 'Panchikawatta, Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `dresses`
--

CREATE TABLE `dresses` (
  `dressID` int(8) NOT NULL,
  `dressCode` varchar(10) NOT NULL,
  `dressName` varchar(50) NOT NULL,
  `dressType` varchar(10) NOT NULL,
  `dressPrice` int(10) NOT NULL,
  `dressImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dresses`
--

INSERT INTO `dresses` (`dressID`, `dressCode`, `dressName`, `dressType`, `dressPrice`, `dressImage`) VALUES
(2, 'G001', 'White Diomend Embedded Gown', 'Gown', 250000, 'dress_image/67dbd77237f1b_gown1.webp'),
(3, 'S001', 'Green Saree', 'Saree', 22500, 'dress_image/67dbd7bb13e56_Green-Saree1.jpg'),
(4, 'G002', 'Maroon Gown', 'Gown', 56000, 'dress_image/67dbd8041fc12_Red-Gown1.jpg'),
(5, 'G003', 'Green Gown', 'Gown', 16000, 'dress_image/67dbd834f1efa_Green-Gown1.webp'),
(6, 'SH001', 'Red Shoes', 'Shoe', 7500, 'dress_image/67dbd85737550_shoe4.webp'),
(7, 'F001', 'Blue Frock', 'Frock', 11500, 'dress_image/67dbd8859fba3_frock4.avif'),
(8, 'S002', 'Blue Saree', 'Saree', 14200, 'dress_image/67dbe94a0f060_Blue-Saree1.webp'),
(9, 'S003', 'Yellow Saree', 'Saree', 9500, 'dress_image/67dbe96980289_Yellow-Saree1.webp'),
(10, 'S004', 'Traditional Saree', 'Saree', 27500, 'dress_image/67dbe98900c73_White-Saree.jpg'),
(11, 'F002', 'Red Frock', 'Frock', 8500, 'dress_image/67dbe9aacb4d7_frock3.avif'),
(12, 'F003', 'Orange Frock', 'Frock', 6500, 'dress_image/67dbe9c302c32_frock2.webp'),
(13, 'F004', 'Pink Frock', 'Frock', 6000, 'dress_image/67dbe9d6f3b8a_frock1.avif'),
(14, 'SH002', 'Classic White Shoe', 'Shoe', 11000, 'dress_image/67dbea0b19f19_shoe3.jpg'),
(15, 'SH003', 'High Heels', 'Shoe', 14500, 'dress_image/67dbea227b4f5_shoe1.webp'),
(16, 'SH004', 'Pointy High Heels', 'Shoe', 12750, 'dress_image/67dbea3a8e7ca_shoe2.jpg'),
(17, 'G006', 'Dark Blue Gown', 'Gown', 17500, 'dress_image/67dc554645c85_indian-gown1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inq_id` int(8) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `iemail` varchar(30) NOT NULL,
  `icontactNo` int(15) NOT NULL,
  `imessage` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inq_id`, `iname`, `iemail`, `icontactNo`, `imessage`) VALUES
(5, 'David Mason', 'davidm@gmail.com', 740605410, 'I wand to rent several dresses for my wedding and I am expecting a discount with my purchase. Reply me ASAP!');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_ID` int(8) NOT NULL,
  `sName` varchar(20) NOT NULL,
  `sEmail` varchar(30) NOT NULL,
  `sPassword` varchar(30) NOT NULL,
  `sDOB` date NOT NULL,
  `sMobile` int(15) NOT NULL,
  `sAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `sName`, `sEmail`, `sPassword`, `sDOB`, `sMobile`, `sAddress`) VALUES
(1001, 'Ravishi Dissanayake', 'ravishi@gmail.com', 'ravi', '2000-03-09', 770102030, 'Meegahakotuwa, Kuliyapitiya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`billID`),
  ADD KEY `cusotmer_ID` (`customerID`),
  ADD KEY `book_ID` (`bookingID`);

--
-- Indexes for table `bookeddress`
--
ALTER TABLE `bookeddress`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `dresses`
--
ALTER TABLE `dresses`
  ADD PRIMARY KEY (`dressID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inq_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `billID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345681;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dresses`
--
ALTER TABLE `dresses`
  MODIFY `dressID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inq_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `book_ID` FOREIGN KEY (`bookingID`) REFERENCES `bookeddress` (`bookingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
