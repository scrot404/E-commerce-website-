-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 02:42 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_shoppy`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbrand`
--

CREATE TABLE `addbrand` (
  `brandid` int(10) NOT NULL,
  `brandname` varchar(100) NOT NULL,
  `brandpic` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbrand`
--

INSERT INTO `addbrand` (`brandid`, `brandname`, `brandpic`) VALUES
(1, 'Tata', '1527059823tata-salt-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `addcat`
--

CREATE TABLE `addcat` (
  `catid` int(10) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `picname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addcat`
--

INSERT INTO `addcat` (`catid`, `catname`, `picname`) VALUES
(500, 'Kitchen', '1526889108grocery-food-packaging-material-500x500.jpg'),
(501, 'Household', 'noimage.jpg'),
(502, 'bakery', '1526975075a10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `prodid` int(10) NOT NULL,
  `catid` int(10) NOT NULL,
  `subcatid` int(10) NOT NULL,
  `brandid` int(10) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `expiredate` date NOT NULL,
  `prodpic` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`prodid`, `catid`, `subcatid`, `brandid`, `prodname`, `price`, `stock`, `discount`, `description`, `expiredate`, `prodpic`) VALUES
(1, 500, 1, 1, 'Cookies', 800, 30, 10, 'good quality and very costly', '2018-05-08', 'noimage.jpg'),
(2, 500, 2, 1, 'noodels', 100, 70, 10, 'good product', '2018-12-31', '1527577670noodels.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addsubcat`
--

CREATE TABLE `addsubcat` (
  `subcatid` int(10) NOT NULL,
  `subcatname` varchar(50) NOT NULL,
  `catid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addsubcat`
--

INSERT INTO `addsubcat` (`subcatid`, `subcatname`, `catid`) VALUES
(1, 'Bakery', 500),
(2, 'fast food', 500),
(3, 'Detergents', 501),
(4, 'Utensils', 501),
(5, 'footwears', 502);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `srno` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`srno`, `name`, `subject`, `email`, `message`) VALUES
(1, 'rahul', 'good', 'rahul@gmail.com', 'hdjadjgawjdgsajhdjsgdjtwdgxwjsgjsgwdi'),
(2, 'rohit', 'skjhskfh', 'ndsfc@gmail.com', 'sjckdsikysyidsyicuyhdsiufcidsuihcuhj'),
(3, 'raman', 'effective', 'raman@gmail.com', 'do good be good'),
(4, 'anchal', 'hii', 'amit@gmail.com', 'aefefefefe');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `utype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `phone`, `email`, `password`, `dob`, `gender`, `utype`) VALUES
('amit sharma', '9249384937', 'amit@gmail.com', '123', '1994-10-12', 'male', 'admin'),
('anu', '7589654123', 'anu@gmail.com', '123', '2018-05-13', 'female', 'normal'),
('neharika', '9684959432', 'neharika@gmail.com', '123', '2000-05-26', 'female', 'normal'),
('rohit mehra', '9723546646', 'rohit1@gmail.com', '234', '2018-05-10', 'male', 'normal'),
('rohit sharma', '9878454551', 'rohit@gmail.com', '123', '0000-00-00', 'male', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbrand`
--
ALTER TABLE `addbrand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `addcat`
--
ALTER TABLE `addcat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `addsubcat`
--
ALTER TABLE `addsubcat`
  ADD PRIMARY KEY (`subcatid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbrand`
--
ALTER TABLE `addbrand`
  MODIFY `brandid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `addcat`
--
ALTER TABLE `addcat`
  MODIFY `catid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
--
-- AUTO_INCREMENT for table `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `prodid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `addsubcat`
--
ALTER TABLE `addsubcat`
  MODIFY `subcatid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
