-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2020 at 01:15 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_short_desc` varchar(255) NOT NULL,
  `category_long_desc` text NOT NULL,
  `category_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_short_desc`, `category_long_desc`, `category_status`) VALUES
(1, 'Computer', 'Computer Short Description', '                                                                <font face=\"Arial, Verdana\"><span xss=\"removed\">Computer Long </span></font><div><font face=\"Arial, Verdana\"><span xss=\"removed\">Description</span></font></div>                                                                ', 1),
(2, 'Furniture', 'Furniture Short Description', '<font face=\"Arial, Verdana\"><span xss=removed>Furniture</span></font><div><font face=\"Arial, Verdana\"><span xss=removed>Long </span></font><div><span xss=removed>Description</span></div></div>', 1),
(3, 'Pets', 'Pets', '<span xss=removed>erg erg eg eg erg</span><span xss=removed>erg erg eg eg erg</span><span xss=removed>erg erg eg eg erg</span><span xss=removed>erg erg eg eg erg</span><span xss=removed>erg erg eg eg erg</span><span xss=removed>erg erg eg eg erg</span><span xss=removed>erg erg eg eg erg</span>', 1),
(4, 'Skin Care', 'Skin Care', 'werf&nbsp;ClothingClothingClothingClothingClothingClothingClothingClothingClothingClothingClothing', 1),
(5, 'Sports', 'gergersdf s e', '<span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(5) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `mobile_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `email_address`, `password`, `activated`, `mobile_number`, `address`, `country`, `city`, `zip_code`) VALUES
(1, 'Customer One', 'customerone@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '', 'Bangladesh', 'Dhaka', ''),
(2, 'Customer Two', 'baratahmed123@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '01706351202', '1 no police gate, Dampara, WASA, Chittagong.', 'Dubai', 'Khulna', '4000'),
(3, 'Customer Three', 'customerthree@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '01706351202', '1 no police gate, Dampara, WASA, Chittagong.', 'Bangladesh', 'Chattogram', '4000'),
(4, '', 'admin@admin.com', '25f9e794323b453885f5181f1b624d0b', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_short_desc` varchar(255) NOT NULL,
  `product_long_desc` text NOT NULL,
  `product_qty` int(5) NOT NULL,
  `product_image` text NOT NULL,
  `top_product` int(1) NOT NULL COMMENT '1=top product for slider, 0=not top products',
  `product_status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_price`, `product_short_desc`, `product_long_desc`, `product_qty`, `product_image`, `top_product`, `product_status`) VALUES
(3, 1, 0, 'Lenovo Ideapad 310', 46000.00, 'grfdyj djytd yt djytd', 'wedwedwd', 21, 'uploads/25.jpg', 1, 1),
(4, 1, 0, 'HP 310', 38000.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 21, 'uploads/960x0.jpg', 0, 1),
(5, 1, 0, 'ASUS', 35000.00, 'grfdyj djytd yt djytd', 'd<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 24, 'uploads/chuwi-herobook-header.jpg', 0, 1),
(6, 2, 0, 'Chair', 1000.00, 'grfdyj djytd yt djytd', 'dtgh rth rth rth<span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span><span xss=\"removed\">sdfvd fgd</span>', 34, 'uploads/5xtmf-living-room-furniture-QUIVER-190408-1554761698055.jpeg', 1, 1),
(7, 2, 0, 'Table', 5000.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 12, 'uploads/DiningSets_450x450.jpg', 0, 1),
(8, 2, 0, 'Chair Table ', 9000.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 56, 'uploads/bernhardt_calista_homepage_banner.jpg', 0, 1),
(9, 3, 0, 'Cats', 400.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 34, 'uploads/why-cats-are-best-pets-1559241235.jpg', 1, 1),
(10, 3, 0, 'Dogs', 2000.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 3, 'uploads/in34dex.jpeg', 0, 1),
(11, 3, 0, 'Puppy', 900.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 31, 'uploads/imajhsdges.jpeg', 0, 1),
(12, 4, 0, 'fair & Lovely', 300.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 12, 'uploads/12126.jpg', 1, 1),
(13, 4, 0, 'Vitchy', 250.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 23, 'uploads/AQ-Rich-cream-362x400-v1.jpg', 0, 1),
(14, 4, 0, 'Facial Cream', 120.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span><span xss=removed>sdfvd fgd</span>', 13, 'uploads/roots-skincare-cream.png', 0, 1),
(15, 5, 0, 'Bat', 500.00, 'grfdyj djytd yt djytd', '<span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span><span xss=removed>dsdvsdv</span>', 2, 'uploads/418wa9WLqxL__SX355_.jpg', 1, 1),
(16, 5, 0, 'Glove', 2000.00, 'grfdyj djytd yt djytd', '<span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span><span xss=removed>sdfsds df </span>', 3, 'uploads/88_glove_long_home_page.png', 1, 1),
(17, 1, 0, 'Test Product Up', 2342.00, 'grfdyj djytd yt djytd', '<div xss=\"removed\"><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span><span xss=\"removed\">hdjhsd suyd fuys d</span></div>', 34, 'uploads/lenovo-laptop-500x500.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `city` varchar(23) DEFAULT NULL,
  `zip_code` int(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `customer_id`, `customer_name`, `email_address`, `address`, `mobile_number`, `country`, `city`, `zip_code`) VALUES
(1, 2, 'Customer Two', 'baratahmed123@mail.com', '1 no police gate, Dampara, WASA, Chittagong.', '01706351202', 'Dubai', 'Khulna', 4000),
(2, 3, 'Customer Three', 'customerthree@gmail.com', '1 no police gate, Dampara, WASA, Chittagong.', '01706351202', 'Bangladesh', 'Chattogram', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` tinyint(3) NOT NULL,
  `user_status` tinyint(3) NOT NULL COMMENT '1=active, 2=inactive, 3=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_email`, `user_name`, `user_password`, `user_role`, `user_status`) VALUES
(1, 'baratahmed23@gmail.com', 'Admin', '$2y$10$xlsxJv3A1kivjW17l1GajO1xcOXliY/t3LDdCHN18RlSYesLd.IvW', 1, 1),
(2, 'baratahmed23@gmail.com', 'Barat', '$2y$10$O1iROP8P4C4PKlrwAlezRuUdI2zqqp/YhrAHKR/nGZ4XJm5HavyKq', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
