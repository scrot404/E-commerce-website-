-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 10:27 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grocery_shoppy`
--
CREATE DATABASE IF NOT EXISTS `grocery_shoppy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `grocery_shoppy`;

-- --------------------------------------------------------

--
-- Table structure for table `addbrand`
--

CREATE TABLE IF NOT EXISTS `addbrand` (
  `brandid` int(10) NOT NULL AUTO_INCREMENT,
  `brandname` varchar(100) NOT NULL,
  `brandpic` varchar(300) NOT NULL,
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `addbrand`
--

INSERT INTO `addbrand` (`brandid`, `brandname`, `brandpic`) VALUES
(1, 'Tata', '1527059823tata-salt-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `addcat`
--

CREATE TABLE IF NOT EXISTS `addcat` (
  `catid` int(10) NOT NULL AUTO_INCREMENT,
  `catname` varchar(50) NOT NULL,
  `picname` varchar(300) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=503 ;

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

CREATE TABLE IF NOT EXISTS `addproduct` (
  `prodid` int(10) NOT NULL AUTO_INCREMENT,
  `catid` int(10) NOT NULL,
  `subcatid` int(10) NOT NULL,
  `brandid` int(10) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `expiredate` date NOT NULL,
  `prodpic` varchar(300) NOT NULL,
  PRIMARY KEY (`prodid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`prodid`, `catid`, `subcatid`, `brandid`, `prodname`, `price`, `stock`, `discount`, `description`, `expiredate`, `prodpic`) VALUES
(1, 500, 1, 1, 'Cookies', 800, 45, 10, 'good quality and very costly', '2018-05-08', 'noimage.jpg'),
(2, 500, 2, 1, 'noodels', 100, 67, 10, 'good product', '2018-12-31', '1527577670noodels.jpg'),
(3, 500, 1, 1, 'white bread''s', 30, 44, 5, 'good quality', '2018-06-29', '1528353932ww.jpg'),
(4, 501, 3, 1, 'johnson''s baby soap', 70, 19, 2, 'good quality', '2019-06-28', '1528354551download.jpg'),
(5, 501, 3, 1, 'johnson''s baby oil', 170, 27, 2, 'good quality', '2018-06-23', '1528354622Johnsons-Baby-Baby-Oil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addsubcat`
--

CREATE TABLE IF NOT EXISTS `addsubcat` (
  `subcatid` int(10) NOT NULL AUTO_INCREMENT,
  `subcatname` varchar(50) NOT NULL,
  `catid` int(10) NOT NULL,
  `subcatpic` varchar(500) NOT NULL,
  PRIMARY KEY (`subcatid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `addsubcat`
--

INSERT INTO `addsubcat` (`subcatid`, `subcatname`, `catid`, `subcatpic`) VALUES
(1, 'Bakery', 500, '1526889108grocery-food-packaging-material-500x500.jpg'),
(2, 'fast food', 500, '1527059823tata-salt-logo.png'),
(3, 'Detergents', 501, 'lilisubcat.jpg'),
(4, 'Utensils', 501, 'lilisubcat3.jpg'),
(5, 'footwears', 502, 'noimage.jpg'),
(7, 'abc', 500, '1558093870lilisubcatprod3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

CREATE TABLE IF NOT EXISTS `addtocart` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `prodname` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `tamt` int(10) NOT NULL,
  `prodpic` varchar(300) NOT NULL,
  `username` varchar(50) NOT NULL,
  `prodid` int(10) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
  `holdername` varchar(200) NOT NULL,
  `orderno` int(10) NOT NULL AUTO_INCREMENT,
  `address` varchar(150) NOT NULL,
  `method` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `expire` varchar(10) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cvvno` varchar(150) NOT NULL,
  PRIMARY KEY (`orderno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100012 ;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`holdername`, `orderno`, `address`, `method`, `username`, `expire`, `cardno`, `cvvno`) VALUES
('', 100007, 'jalandhar', 'cash', 'anu@gmail.com', '/', '', ''),
('def', 100008, 'Jalandhar', 'cash', 'newuser@gmail.com', '/', '', ''),
('rtgdfg', 100009, 'fdgadfg', 'cash', 'abc@gmail.com', '/', '', ''),
('gfhfgh', 100010, 'ytjuhyth', 'cash', 'abc@gmail.com', '/', '', ''),
('sdfsd', 100011, 'sdfsd', 'card', 'abc@gmail.com', '/', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`srno`, `name`, `subject`, `email`, `message`) VALUES
(1, 'rahul', 'good', 'rahul@gmail.com', 'hdjadjgawjdgsajhdjsgdjtwdgxwjsgjsgwdi'),
(2, 'rohit', 'skjhskfh', 'ndsfc@gmail.com', 'sjckdsikysyidsyicuyhdsiufcidsuihcuhj'),
(3, 'raman', 'effective', 'raman@gmail.com', 'do good be good'),
(4, 'anchal', 'hii', 'amit@gmail.com', 'aefefefefe'),
(5, 'sdfsdf', 'sdfsdf', 'sdfsdf@fgsd.hgdfrg', 'dfghg'),
(6, 'sdfsdf', 'sdfsdf', 'sdfsdf@fgsd.hgdfrg', 'dfghg'),
(7, 'fghf', 'fghfg', 'gfh@tyt.rgtr', 'rtg');

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE IF NOT EXISTS `orderhistory` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `prodname` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `tamt` int(10) NOT NULL,
  `prodpic` varchar(300) NOT NULL,
  `username` varchar(50) NOT NULL,
  `orderno` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `orderhistory`
--

INSERT INTO `orderhistory` (`srno`, `prodname`, `price`, `qty`, `tamt`, `prodpic`, `username`, `orderno`, `status`) VALUES
(4, 'white bread''s', 29, 2, 57, '1528353932ww.jpg', 'anu@gmail.com', 100007, 'Delivered'),
(5, 'johnson''s baby oil', 167, 3, 500, '1528354622Johnsons-Baby-Baby-Oil.jpg', 'anu@gmail.com', 100007, 'Delivered'),
(6, 'white bread''s', 29, 2, 57, '1528353932ww.jpg', 'newuser@gmail.com', 0, 'In Transit'),
(7, 'white bread''s', 29, 2, 57, '1528353932ww.jpg', 'abc@gmail.com', 0, 'order received,Processing'),
(8, 'johnson''s baby soap', 69, 1, 69, '1528354551download.jpg', 'abc@gmail.com', 0, 'order received,Processing'),
(10, 'noodels', 90, 1, 90, '1527577670noodels.jpg', 'abc@gmail.com', 100010, 'In Transit'),
(11, 'noodels', 90, 1, 90, '1527577670noodels.jpg', 'abc@gmail.com', 100011, 'order received,Processing');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `utype` varchar(50) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `phone`, `email`, `password`, `dob`, `gender`, `utype`) VALUES
('abc', '78945612', 'abc@gmail.com', '123', '2018-07-13', 'male', 'normal'),
('amit sharma', '9249384937', 'admin@gmail.com', '321', '1994-10-12', 'male', 'admin'),
('anu', '7589654123', 'anu@gmail.com', '123', '2018-05-13', 'female', 'normal'),
('fddf', 'fddfvg', 'fdsxfs@vcv.dfsd', '123', '0000-00-00', 'male', 'normal'),
('sdfs', 'dfds', 'kiran234@gmail.com', '123', '2018-08-08', 'female', 'normal'),
('Manish', '8794561203', 'manish@gmail.com', '202cb962ac59075b964b07152d234b70', '2000-03-08', 'male', 'normal'),
('neharika', '9684959432', 'neharika@gmail.com', '123', '2000-05-26', 'female', 'normal'),
('newuser', '9345739877', 'newuser@gmail.com', 'dcb7d5858fcc269b0502a322d8cbeb20', '2019-04-16', 'female', 'normal'),
('Rahul', '7894561230', 'rahul1234567@gmail.com', '123', '2018-07-05', 'male', 'normal'),
('Rajesh', '6457890123', 'rajesh@gmail.com', 'dcb7d5858fcc269b0502a322d8cbeb20', '1997-05-07', 'male', 'normal'),
('rohit mehra', '9723546646', 'rohit1@gmail.com', '234', '2018-05-10', 'male', 'normal');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
