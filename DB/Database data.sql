-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 06:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--
CREATE DATABASE IF NOT EXISTS `ims` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ims`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_contact` varchar(50) DEFAULT NULL,
  `c_gender` varchar(10) DEFAULT NULL,
  `c_addr` varchar(100) DEFAULT NULL,
  `c_postal` varchar(15) DEFAULT NULL,
  `c_cussince` date DEFAULT NULL,
  `c_debit` int(11) DEFAULT NULL,
  `c_credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_contact`, `c_gender`, `c_addr`, `c_postal`, `c_cussince`, `c_debit`, `c_credit`) VALUES
(1, 'John Doe', '0312345678', 'Male', 'Address near', '77150', '2008-09-09', 0, 0),
(2, 'Walter White', '03189265127', 'Male', 'Muhalla Lahori', '77150', '2000-11-01', NULL, NULL),
(3, 'Customer', '0312345678', 'other', 'none', '123', '2005-01-02', NULL, NULL),
(4, 'Ashfaque', '0312345678', 'Male', 'Muhalla Lahori', '77150', '2011-10-11', 0, 1000),
(5, 'Hassnain', '03103582990', 'Male', 'Revenue', '77150', '2002-11-10', 0, 8300),
(6, 'Jesse boardman', '0333763841', 'male', 'Imagination', '77150', '1990-08-01', 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `l_id` int(11) NOT NULL,
  `l_username` varchar(50) DEFAULT NULL,
  `l_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`l_id`, `l_username`, `l_password`) VALUES
(1, 'username', 'fmo/E2KFBmI=');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_price` int(11) DEFAULT NULL,
  `p_qty` int(11) DEFAULT NULL,
  `p_desc` varchar(50) DEFAULT NULL,
  `p_type` varchar(25) DEFAULT NULL,
  `p_supplier` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_qty`, `p_desc`, `p_type`, `p_supplier`) VALUES
(1, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(2, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(3, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(4, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(5, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(6, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(7, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(8, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(9, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(10, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(11, 'Tariq ', 13, 5, 'new desc', 'abc', 'Supplier A'),
(12, 'Tariq ', 13, 5, 'new desc', 'abc', 'Hassnain Ahmed'),
(13, 'Tariq ', 13, 5, 'new desc', 'abc', 'Supplier A'),
(14, 'Tariq ', 13, 50, 'updatedd', 'abc', 'Hassnain Ahmed'),
(15, 'Basmati', 1500, 320, 'It is a cokking oil', 'cooking oil', 'Hassnain Ahmed'),
(16, 'M. Tariq shaikh', 450, 3, 'new desc', 'rice', 'Jai Kumar'),
(17, 'xyz', 0, 0, '', '', 'Asad Junejo'),
(18, 'Rice', 50, 40, 'Cooking Rice', 'eating', 'Aftab'),
(19, 'Hasnain Ahmed', 400, 5, 'yugyugblk', 'rice', 'Jai Kumar'),
(20, 'gttf', 50, 100, '79676', 'ghfvygfy', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL,
  `s_type` varchar(30) DEFAULT NULL,
  `s_supplier` varchar(30) DEFAULT NULL,
  `s_price` int(11) DEFAULT NULL,
  `s_qty` int(11) DEFAULT NULL,
  `s_total` int(11) DEFAULT NULL,
  `s_customer` varchar(20) DEFAULT NULL,
  `s_moneyrecieved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`s_id`, `s_name`, `s_type`, `s_supplier`, `s_price`, `s_qty`, `s_total`, `s_customer`, `s_moneyrecieved`) VALUES
(1, 'basmati', 'rice', 'supplier', 1500, 2, 3000, 'Caroline', NULL),
(2, 'basmati', 'rice', 'supplier', 1500, 2, 3000, '', NULL),
(3, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 5, 7500, 'jhon doe', NULL),
(4, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 4, 6000, 'jhon doe', NULL),
(5, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 5, 7500, 'jhon doe', NULL),
(6, 'basmati', '1500', '', 486, 5, 2430, '10 57', NULL),
(7, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, '12 36', NULL),
(8, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, '12 36', NULL),
(9, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(10, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(11, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(12, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(13, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(14, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(15, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(16, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(17, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(18, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(19, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 2, 3000, 'new customer', NULL),
(20, '', '', '', 0, 0, 0, '', NULL),
(21, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 100, 150000, '', NULL),
(22, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(23, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, '', NULL),
(24, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 5, 7500, 'jhon doe', NULL),
(25, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, '', NULL),
(26, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, '', NULL),
(27, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', NULL),
(28, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 8, 12000, 'abcdefg', NULL),
(29, 'tariq', 'abc', 'Hassnain Ahmed', 13, 1, 1500, 'new customer', NULL),
(30, 'tariq', 'abc', 'Hassnain Ahmed', 13, 1, 1500, '10 57', NULL),
(31, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'ashfaque', NULL),
(32, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'ashfaque', NULL),
(33, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 2, 3000, 'ashfaque', NULL),
(34, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'ashfaque', NULL),
(35, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'ashfaque', NULL),
(36, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 2, 3000, 'ashfaque', NULL),
(37, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 2, 3000, 'ashfaque', NULL),
(38, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 2, 3000, 'ashfaque', NULL),
(39, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'new customer', 1500),
(40, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, '', 1500),
(41, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 5, 7500, 'Hassnain', 0),
(42, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'Hassnain', 0),
(43, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 5, 7500, 'ashfaque', 7500),
(44, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'Hassnain', 0),
(45, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'Hassnain', 1500),
(46, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 5, 7500, 'hassnain', 0),
(47, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 550),
(48, 'rice', 'eating', 'Aftab', 50, 100, 5000, 'jesse boardman', 0),
(49, 'rice', 'eating', 'Aftab', 50, 5, 250, 'Hassnain', 0),
(50, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 300),
(51, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 0),
(52, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 1000),
(53, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 0),
(54, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 100),
(55, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 0),
(56, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 100),
(57, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 100),
(58, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 0),
(59, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 5, 7500, 'new', 0),
(60, 'rice', 'eating', 'Aftab', 50, 5, 250, 'hassnain', 0),
(61, 'rice', 'eating', 'Aftab', 50, 1, 50, '', 0),
(62, 'rice', 'eating', 'Aftab', 50, 45, 2250, '', 0),
(63, 'rice', 'eating', 'Aftab', 50, 1, 50, 'hassnain', 100),
(64, 'basmati', 'cooking oil', 'Hassnain Ahmed', 1500, 1, 1500, 'hassnain', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(25) DEFAULT NULL,
  `s_addr` varchar(50) DEFAULT NULL,
  `s_phone` varchar(20) DEFAULT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `s_companyname` varchar(50) DEFAULT NULL,
  `s_companycontact` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `s_name`, `s_addr`, `s_phone`, `s_email`, `s_companyname`, `s_companycontact`) VALUES
(1, 'Supplier A', 'Bristoal near 8th Street', '03123456689', 'suppliername@gmail.com', 'Good foods', '091237981273'),
(2, 'Hassnain Ahmed', 'Revenue', '03123456789', 'ahmedhasnain726@gmail.com', 'Software', 'null'),
(3, 'Jai Kumar', 'Dhari Muhalla', '0318762312', 'jaikumar@gmail.com', 'Best Materials', '03189423712'),
(4, 'Asad Junejo', 'Muhalla Lahori', '03128512923', 'junejiasad55@gmail.com', 'Junejo Mills', '0312841123'),
(5, 'Aftab', 'Bakrani Road', '03333763841', 'aftabchandio79@gmail.com', '', ''),
(6, 'abcd', 'lahori Muhalla', '03123456689', 'jeteb46207@irebah.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
