-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 01:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `main` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL DEFAULT '0',
  `last_login` bigint(20) NOT NULL DEFAULT 0,
  `last_logout` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `cpassword`, `status`, `main`, `code`, `last_login`, `last_logout`, `image`) VALUES
(2, 'siyam', 'si31siyam@gmail.com', '$2y$10$xdV77g/0bwULjzPET1nUQuxbR/MlY2RKK16EWue9Vn9EnuqIowXE.', '$2y$10$0dcNprm6EA.yLHd7C4uYG.LSN5/io6.IFUsaMLTSNN2gn7RwJADc6', '1', '1', '414550', 1704716910, '2024-01-08 18:28:25', 'images/SiyamPic (1) copy.jpg'),
(4, 'admin', 'admin@gmail.com', '$2y$10$kIh20ODmJuudW7OyotW//uWew54QsEEgHttMQ1V0YF6Q9SO9Nmc.a', '$2y$10$iUjusCUoTrkorWX7Gh7I2OQ0RxDEmqRFF6lfXopPT38u6NDevnkyq', '1', '0', '0', 1689618065, '2023-07-18 00:21:00', ''),
(48, 'siyam2', 'contact.simoviezone@gmail.com', '$2y$10$.aM0h2D6Hup16q1q/FPR2uUGdBv6fxL8raVbA3bbelqB/jqRg3rXi', '$2y$10$m0.QS.SCyP1l2evRAUKYNu3/1SqmkIK3v93kgVi18s00f1OHAmMDG', '1', '0', '0', 1663748042, '2022-09-21 14:13:57', ''),
(51, 'evan', 'purificationevan04@gmail.com', '$2y$10$sW0WqybX3DLkT.NOaYHlSuMv0QrwvDFyWj5xsZKBKPq80IaVjKv4O', '$2y$10$Z8GbFHuQCbV5CkN.uY0gFOmuGWbbfzkBt484h7emcxtPvXkg/hkJi', '1', '1', '0', 1663427416, '2022-09-18 09:40:00', ''),
(52, 'abdussalam', 'as14504433@gmail.com', '$2y$10$Osgeb8xUuvYM9yU14TchquCFgq8FXOhEjtk94VXbtdOb7nXR3az52', '$2y$10$1CzLx8.oRbklPvJu90og0.5pAHDGOOje4MYiZxRfOBQtTv3v/533m', '1', '1', '0', 1689623581, '2023-07-18 01:52:56', 'images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(255) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL DEFAULT 1,
  `shipping_charge` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_used_user`
--

CREATE TABLE `coupon_used_user` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon_used_user`
--

INSERT INTO `coupon_used_user` (`id`, `user_id`, `coupon_code`) VALUES
(1, 2, 'SIYAM10'),
(2, 1, 'SIYAM70'),
(3, 1, 'SIYAM10'),
(4, 2, 'SIYAM70'),
(5, 1, 'ARPSYM80'),
(6, 1, 'ARPSYM80'),
(7, 1, 'ARPSYM80'),
(8, 1, 'SIYAM70');

-- --------------------------------------------------------

--
-- Table structure for table `cupon`
--

CREATE TABLE `cupon` (
  `cupon_id` int(255) NOT NULL,
  `cupon_code` varchar(255) NOT NULL,
  `cupon_type` varchar(255) NOT NULL,
  `cupon_value` varchar(255) NOT NULL,
  `cupon_min_value` varchar(255) NOT NULL,
  `cupon_status` int(255) NOT NULL DEFAULT 1,
  `cupon_created_at` varchar(255) NOT NULL,
  `expired` varchar(255) NOT NULL,
  `repeat_use` varchar(255) NOT NULL DEFAULT '1',
  `max_ammount` varchar(255) NOT NULL,
  `max_users` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cupon`
--

INSERT INTO `cupon` (`cupon_id`, `cupon_code`, `cupon_type`, `cupon_value`, `cupon_min_value`, `cupon_status`, `cupon_created_at`, `expired`, `repeat_use`, `max_ammount`, `max_users`) VALUES
(1, 'SIYAM70', 'Taka', '100', '500', 1, '1703611067 ', '8640000000', '3', '', ''),
(2, 'SIYAM10', 'Percent', '90', '400', 1, '1703611067 ', '8600400000', '1', '', ''),
(4, 'SIAR20', 'Percent', '20', '500', 1, '1703957805', '1800', '1', '300', '1'),
(5, 'ARS30', 'Percent', '30', '500', 1, '1703959512', '1800', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `coupon_id` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_discount` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `comment` text NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `cancellation_time` varchar(255) NOT NULL,
  `estimate_delivery` varchar(255) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `o_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `orderNo` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `review_status` int(255) NOT NULL DEFAULT 0,
  `order_status` varchar(255) NOT NULL DEFAULT '0',
  `created_time` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `product_status` varchar(255) NOT NULL DEFAULT '1',
  `information` text NOT NULL,
  `image` text NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `image_4` text NOT NULL,
  `shipping_charge` varchar(255) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL,
  `added_at` varchar(255) NOT NULL,
  `trending_status` int(11) NOT NULL DEFAULT 0,
  `original_price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `replay_review`
--

CREATE TABLE `replay_review` (
  `replay_id` int(255) NOT NULL,
  `r_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `replay` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_id` int(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `order_items_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `image_4` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `s_id` int(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `last_login` bigint(20) NOT NULL DEFAULT 0,
  `last_logout` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `email`, `mobile`, `address`, `password`, `cpassword`, `date`, `created_time`, `city`, `division`, `postal_code`, `last_login`, `last_logout`) VALUES
(1, 'siyam', 'MD Saymum Islam', 'Siyam', 'siyam@gmail.com', '01722146631', 'Bonpara, Natore', '$2y$10$w5khwdizdC1.pBhGyxsd3eigBszvJygi5yH7wGEKIURgpsCi4XoUG', '$2y$10$vjjaBk5u2V7IyU2k1Wp1MujdGn.wQaRcrLCkpyBI0mO7qSaqnxQVq', '13 Dec 2023', '04:42 AM', 'Dhaka', 'Rajshahi', '6430', 1704707971, '2024-01-08 16:00:06'),
(2, 'admin', 'Md ', 'Saymum', 'admin@gmail.com', '0185404552', 'Lalmonirhat', '$2y$10$Dg8aQQZaPoFMN64RxKiGrO9YoGwFVcGxwqM2GCTvUL6YNR7kxv6pa', '$2y$10$3ngiWSgTi8b5n8T1XRQPsupZGWaqzDKTCz.KcombGdQEfKjvE7WkS', '0000-00-00', '0', 'Lalmonirhat', 'Rangpur', '5000', 1703959316, '2023-12-31 00:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `w_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupon_used_user`
--
ALTER TABLE `coupon_used_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`cupon_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replay_review`
--
ALTER TABLE `replay_review`
  ADD PRIMARY KEY (`replay_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `coupon_used_user`
--
ALTER TABLE `coupon_used_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cupon`
--
ALTER TABLE `cupon`
  MODIFY `cupon_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `o_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `replay_review`
--
ALTER TABLE `replay_review`
  MODIFY `replay_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `s_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
