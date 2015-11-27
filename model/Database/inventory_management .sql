-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2015 at 05:01 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `database_id` int(11) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `barcode_number` int(11) NOT NULL DEFAULT '0',
  `item_name` varchar(50) NOT NULL,
  `manufacturer` varchar(20) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `date_bought` date NOT NULL,
  `last_repair_date` date NOT NULL,
  `conditions` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`database_id`, `item_number`, `barcode_number`, `item_name`, `manufacturer`, `price`, `date_bought`, `last_repair_date`, `conditions`, `location`, `department`, `userid`, `quantity`) VALUES
(1, '3500', 2147483647, 'web Server', 'Samsung', 15000, '2014-04-20', '2014-03-14', 'Excellent', 'LAB 304', 'Electrical Engineering', 0, 0),
(2, '4365', 2363, 'tool kits', 'Sonny', 1234, '1970-01-01', '1970-01-01', '', 'LH221', 'Computer Science', 0, 0),
(3, '456', 3724640, '34545', 'HP', 547, '1970-01-01', '1970-01-01', 'bad', 'library', 'computer science', 0, 0),
(4, '56432', 4089, 'internet cables', 'Sonny', 200, '1970-01-01', '1970-01-01', 'Good', 'Lab', 'Management Info Systems', 0, 0),
(5, '5698756', 45694, 'Clasic laptop 2', 'Lenovo', 4500, '2015-10-02', '2014-02-02', 'fair', 'lab', 'Computer Engineering', 0, 0),
(6, '600', 3489757, 'DELALI-', 'Samsung', 5000, '2012-04-12', '2014-08-10', 'poor', 'LAB221', 'Electrical Engineering', 0, 0),
(7, '111', 222, 'Test', 'Samsung', 333, '0000-00-00', '0000-00-00', 'Testing', 'Accra', 'CS', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_halls`
--

CREATE TABLE IF NOT EXISTS `lecture_halls` (
  `id` int(11) NOT NULL,
  `hall_number` varchar(100) NOT NULL DEFAULT '0',
  `hall_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_halls`
--

INSERT INTO `lecture_halls` (`id`, `hall_number`, `hall_name`) VALUES
(1, '100', 'Library'),
(2, '200', 'LIB'),
(3, 'LAB 221', 'My Lab'),
(4, 'LAB 402', 'EEngineering Lab');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `unique_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL DEFAULT '0',
  `manufacturer_name` varchar(255) NOT NULL,
  `phone_number` int(12) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`unique_id`, `manufacturer_id`, `manufacturer_name`, `phone_number`, `email`, `address`) VALUES
(1, 346, 'Ashesi', 46784, '', ''),
(2, 400, 'Sony', 2350423, '', ''),
(3, 999, 'Samsung', 34567, '', ''),
(4, 2000, 'lenovo', 2, '', ''),
(5, 364534, 'HP 23', 235472, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `xx_user`
--

CREATE TABLE IF NOT EXISTS `xx_user` (
  `user_id` int(110) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xx_user`
--

INSERT INTO `xx_user` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_phone`) VALUES
(2, 'ben', 'ben', 'ben@gmail.com', '0542615890'),
(5, 'dan', 'dan', 'dan@gmail.com', '5645674854'),
(6, 'ruth', 'ruth', 'ruth@gmail.com', '345734568346'),
(7, 'franco', 'franco', 'franco@gmail.com', '45629362893'),
(8, 'davie', 'davie', 'davie@gmail.com', '6452382434');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`database_id`);

--
-- Indexes for table `lecture_halls`
--
ALTER TABLE `lecture_halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `xx_user`
--
ALTER TABLE `xx_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `database_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lecture_halls`
--
ALTER TABLE `lecture_halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `unique_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `xx_user`
--
ALTER TABLE `xx_user`
  MODIFY `user_id` int(110) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
