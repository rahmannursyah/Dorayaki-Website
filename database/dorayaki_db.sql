-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 05:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorayaki_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`productId`, `userId`) VALUES
(1, 2),
(1, 5),
(2, 5),
(2, 5),
(2, 5),
(3, 5),
(3, 5),
(3, 5),
(3, 5),
(4, 5),
(4, 5),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `header_transacion_tbl`
--

CREATE TABLE `header_transacion_tbl` (
  `transactionId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Approvement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transacion_tbl`
--

INSERT INTO `header_transacion_tbl` (`transactionId`, `UserId`, `Date`, `Approvement`) VALUES
(1, 2, '2019-10-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(200) NOT NULL,
  `Harga` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Nama`, `Harga`, `img`) VALUES
(1, 'Dorayaki Cokelat', 'Rp5.000', 'cokelat.jpg'),
(2, 'Dorayaki Keju', 'Rp5.000', 'keju.jpg'),
(3, 'DOrayaki Strawberry', 'Rp7.000', 'strawberry.jpg'),
(4, 'Dorayaki Sultan', 'Rp1.000.000', 'sultan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

CREATE TABLE `transaction_tbl` (
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `TransactionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_tbl`
--

INSERT INTO `transaction_tbl` (`UserID`, `ProductID`, `TransactionID`) VALUES
(2, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Cookie` varchar(255) NOT NULL,
  `Cookie_exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `Username`, `Email`, `Password`, `Cookie`, `Cookie_exp`) VALUES
(1, 'kena xss dah wkwkwk', 'xss@xss.com', '$2y$10$BbBlrzx8pUebbY/gvorIjuf3MsNgtznOtU4hDR.UgaMtQqe/51.Ly', '', '0000-00-00'),
(2, 'admin', 'admin@dorayaki.com', '$2y$10$XpR51xlEjKO8s/LA3gQ9IOczynHKZS1u72BBf7wqjXxI1gnDhaZ9C', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `header_transacion_tbl`
--
ALTER TABLE `header_transacion_tbl`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header_transacion_tbl`
--
ALTER TABLE `header_transacion_tbl`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
