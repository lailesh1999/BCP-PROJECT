-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 05:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(4) NOT NULL DEFAULT '0',
  `deleted` varchar(4) NOT NULL DEFAULT '0',
  `inserted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `deleted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `updated_by_id` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `category_name`, `created_date`, `status`, `deleted`, `inserted_by_id`, `deleted_by_id`, `updated_by_id`) VALUES
(1, 'tablet23', '2022-10-15 05:08:42', '0', '1', '2117031', '2117031', '2117031'),
(2, 'tablet', '2022-10-15 05:11:51', '0', '0', '2117031', 'pending', '2117031'),
(3, 'abc', '2022-10-15 05:12:15', '0', '0', '2117031', 'pending', '2117031'),
(4, 'aaa123', '2022-10-15 05:12:24', '0', '1', '2117031', '2117031', 'pending'),
(5, 'aaa', '2022-10-25 05:44:03', '0', '0', '2117031', 'pending', 'pending'),
(6, 'sss', '2022-11-11 04:15:20', '0', '0', '1', 'pending', 'pending'),
(7, 'syrub', '2022-11-12 15:25:38', '0', '0', '1', 'pending', 'pending'),
(8, 'syrub', '2022-11-12 15:25:38', '0', '0', '1', 'pending', 'pending'),
(9, 'aaa', '2022-11-12 15:29:05', '0', '0', '1', 'pending', 'pending'),
(10, 'aaaa', '2022-11-12 15:29:13', '0', '0', '1', 'pending', 'pending'),
(11, 'aaa', '2022-11-16 17:12:59', '0', '0', '1', 'pending', 'pending'),
(12, 'aa', '2023-01-01 17:50:29', '0', '0', '1', 'pending', 'pending'),
(13, 'dd', '2023-01-01 17:53:56', '0', '0', '1', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(35) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `deleted` int(5) NOT NULL DEFAULT '0',
  `status` int(5) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inserted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `deleted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `updated_by_id` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`customer_id`, `customer_name`, `address`, `email`, `contact`, `deleted`, `status`, `created_date`, `inserted_by_id`, `deleted_by_id`, `updated_by_id`) VALUES
(1, 'lailesh veigas', 'neyyamugaru house vorlady post via manjeshwar', 'lailesh07@gmail.com', '9074080165', 0, 0, '2022-11-27 05:22:41', '1', 'pending', 'pending'),
(2, 'aaa', 'manglore', 'lailesh07@gmail.com', '9074080165', 0, 0, '2023-01-01 18:01:54', '1', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail_tbl`
--

CREATE TABLE `invoice_detail_tbl` (
  `invoice_detail_id` int(10) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_detail_tbl`
--

INSERT INTO `invoice_detail_tbl` (`invoice_detail_id`, `invoice_id`, `product_id`, `stock_id`, `quantity`, `price`, `created_date`) VALUES
(34, 33, 18, 9, 5, 33, '2022-12-30 07:45:27'),
(35, 33, 19, 8, 3, 14, '2022-12-30 07:45:27'),
(36, 34, 19, 8, 7, 14, '2022-12-30 10:21:11'),
(37, 34, 18, 9, 9, 33, '2022-12-30 10:21:11'),
(38, 35, 19, 8, 1, 14, '2022-12-31 10:41:07'),
(39, 36, 19, 8, 1, 14, '2023-01-01 18:03:17'),
(40, 36, 18, 9, 1, 33, '2023-01-01 18:03:17'),
(41, 37, 19, 8, 1, 14, '2023-01-15 13:06:10'),
(42, 38, 19, 8, 4, 14, '2023-01-17 09:17:22'),
(43, 39, 19, 8, 4, 14, '2023-01-17 09:18:07'),
(44, 40, 19, 8, 4, 14, '2023-01-17 09:18:39'),
(45, 41, 19, 8, 2, 14, '2023-01-17 09:19:52'),
(46, 42, 19, 8, 1, 14, '2023-01-17 09:21:46'),
(47, 43, 19, 8, 2, 14, '2023-01-17 09:23:49'),
(48, 44, 19, 8, 2, 14, '2023-01-17 09:25:26'),
(49, 45, 19, 8, 2, 14, '2023-01-17 09:27:57'),
(50, 45, 18, 9, 2, 33, '2023-01-17 09:27:57'),
(51, 46, 18, 10, 1, 12, '2023-01-29 05:15:45'),
(52, 47, 18, 10, 14, 12, '2023-01-29 06:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tbl`
--

CREATE TABLE `invoice_tbl` (
  `invoice_id` int(10) NOT NULL,
  `order_no` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `grand_total` int(10) NOT NULL,
  `order_status` int(10) NOT NULL,
  `billing_person_id` int(10) NOT NULL,
  `deleted` int(5) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_tbl`
--

INSERT INTO `invoice_tbl` (`invoice_id`, `order_no`, `customer_id`, `grand_total`, `order_status`, `billing_person_id`, `deleted`, `created_date`) VALUES
(33, 8940391, 1, 207, 0, 0, 0, '2022-12-30 07:45:27'),
(34, 5699484, 1, 395, 0, 0, 0, '2022-12-30 10:21:11'),
(35, 5717594, 1, 14, 0, 0, 0, '2022-12-31 10:41:07'),
(36, 2148455, 2, 47, 0, 0, 0, '2023-01-01 18:03:17'),
(37, 2425750, 1, 14, 0, 0, 0, '2023-01-15 13:06:10'),
(38, 4124191, 1, 56, 0, 0, 0, '2023-01-17 09:17:22'),
(39, 4124191, 1, 56, 0, 0, 0, '2023-01-17 09:18:07'),
(40, 4124191, 1, 56, 0, 0, 0, '2023-01-17 09:18:39'),
(41, 4190700, 1, 28, 0, 0, 0, '2023-01-17 09:19:52'),
(42, 2246722, 1, 14, 0, 0, 0, '2023-01-17 09:21:46'),
(43, 4234773, 1, 28, 0, 0, 0, '2023-01-17 09:23:49'),
(44, 6781116, 1, 28, 0, 0, 0, '2023-01-17 09:25:26'),
(45, 6538724, 1, 94, 0, 0, 0, '2023-01-17 09:27:57'),
(46, 9333814, 1, 12, 0, 0, 0, '2023-01-29 05:15:45'),
(47, 1621060, 1, 168, 0, 0, 0, '2023-01-29 06:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `tax_id` int(10) NOT NULL,
  `product_name` varchar(15) NOT NULL,
  `packing` varchar(15) NOT NULL,
  `generic_name` varchar(15) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(5) NOT NULL,
  `deleted` int(5) NOT NULL,
  `inserted_by_id` varchar(13) NOT NULL DEFAULT 'pending',
  `deleted_by_id` varchar(13) NOT NULL DEFAULT 'pending',
  `updated_by_id` varchar(13) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `category_id`, `supplier_id`, `unit_id`, `tax_id`, `product_name`, `packing`, `generic_name`, `created_date`, `status`, `deleted`, `inserted_by_id`, `deleted_by_id`, `updated_by_id`) VALUES
(16, 5, 2, 2, 4, 'no cold123', '14tabs123  ', 'sss234', '2022-11-11 10:00:47', 0, 1, '1', '1', '1'),
(18, 2, 4, 1, 6, 'no cold', '12tabs', 'no cold', '2022-11-11 10:47:22', 0, 0, '1', 'pending', 'pending'),
(19, 2, 3, 1, 6, 'dolo', '12tabs', 'dolo', '2022-11-11 11:19:31', 0, 0, '1', 'pending', 'pending'),
(20, 2, 3, 1, 6, 'paracetamel', '14tabs', 'paracetamol 650', '2023-01-29 10:04:27', 0, 0, '1', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_tbl`
--

CREATE TABLE `purchase_tbl` (
  `purchase_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `purchase_price` int(10) NOT NULL,
  `invoice_number` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `status` int(5) NOT NULL,
  `deleted` int(5) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inserted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `deleted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `updated_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `order_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_tbl`
--

INSERT INTO `purchase_tbl` (`purchase_id`, `product_id`, `supplier_id`, `quantity`, `purchase_price`, `invoice_number`, `total_price`, `status`, `deleted`, `created_date`, `inserted_by_id`, `deleted_by_id`, `updated_by_id`, `order_number`) VALUES
(6, 17, 3, 20, 12, 2117031, 240, 0, 0, '2022-11-11 13:35:55', '1', 'pending', 'pending', 0),
(7, 19, 3, 50, 12, 2117031, 600, 0, 0, '2022-11-15 08:45:47', '1', 'pending', 'pending', 0),
(8, 18, 4, 35, 10, 2117033, 350, 0, 0, '2022-12-11 06:10:14', '1', 'pending', 'pending', 0),
(9, 19, 3, 100, 12, 2117031, 1200, 0, 0, '2022-12-27 11:45:30', '1', 'pending', 'pending', 0),
(10, 18, 4, 100, 35, 2117031, 3500, 0, 0, '2022-12-27 11:46:04', '1', 'pending', 'pending', 0),
(11, 18, 4, 3, 12, 2117033, 36, 0, 0, '2023-01-26 04:30:21', '1', 'pending', 'pending', 0),
(12, 20, 3, 200, 30, 4998, 6000, 0, 0, '2023-01-29 10:05:28', '1', 'pending', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_tbl`
--

CREATE TABLE `stock_tbl` (
  `stock_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `batch_number` varchar(10) NOT NULL,
  `expiry_date` date NOT NULL,
  `mrp` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `deleted` int(5) NOT NULL DEFAULT '0',
  `inserted_by_id` varchar(15) NOT NULL DEFAULT '0',
  `deleted_by_id` varchar(15) NOT NULL DEFAULT '0',
  `updated_by_id` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_tbl`
--

INSERT INTO `stock_tbl` (`stock_id`, `supplier_id`, `product_id`, `quantity`, `batch_number`, `expiry_date`, `mrp`, `rate`, `created_date`, `status`, `deleted`, `inserted_by_id`, `deleted_by_id`, `updated_by_id`) VALUES
(8, 4, 18, 4, 'cold001', '2022-12-30', 13, 14, '2023-01-26 03:37:53', '0', 0, '1', '0', '1'),
(9, 4, 18, 3, 'c002', '2023-01-31', 34, 33, '2023-01-26 11:01:37', '0', 0, '1', '0', '1'),
(10, 4, 18, 85, 'c003', '2023-01-29', 14, 12, '2023-01-29 06:10:01', '0', 0, '1', '0', '0'),
(11, 3, 20, 200, 'C006', '2023-01-31', 35, 30, '2023-01-29 10:05:28', '0', 0, '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbl`
--

CREATE TABLE `supplier_tbl` (
  `supplier_id` int(10) NOT NULL,
  `supplier_name` varchar(25) NOT NULL,
  `supplier_contact` varchar(14) NOT NULL,
  `supplier_email` varchar(50) NOT NULL,
  `supplier_address` varchar(70) NOT NULL,
  `tax` varchar(10) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(5) NOT NULL DEFAULT '0',
  `inserted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `updated_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `deleted_by_id` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_tbl`
--

INSERT INTO `supplier_tbl` (`supplier_id`, `supplier_name`, `supplier_contact`, `supplier_email`, `supplier_address`, `tax`, `status`, `created_date`, `deleted`, `inserted_by_id`, `updated_by_id`, `deleted_by_id`) VALUES
(1, 'lailesh veigas', '', 'lailesh@gmail.com', 'manglore', '50000', '0', '2022-10-25 16:19:36', '1', '2117031', 'pending', '2117031'),
(2, 'a', '8547513360', 'laileshveigas1999@gmail.com', 'manglore1222', '25004444', '0', '2022-10-25 16:22:18', '1', '2117031', '2117031', '1'),
(3, 'lailesh', '9961003680', 'lailesh@gmail.com', 'manglore', '200', '0', '2022-11-11 06:18:25', '0', '1', 'pending', 'pending'),
(4, 'royal', '9961003680', 'royal@gmail.com', 'kasargod', '100', '0', '2022-11-11 10:45:53', '0', '1', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tax_tbl`
--

CREATE TABLE `tax_tbl` (
  `tax_id` int(10) NOT NULL,
  `tax_name` varchar(20) NOT NULL,
  `tax_rate` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(4) NOT NULL DEFAULT '0',
  `deleted` varchar(4) NOT NULL DEFAULT '0',
  `deleted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `updated_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `inserted_by_id` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_tbl`
--

INSERT INTO `tax_tbl` (`tax_id`, `tax_name`, `tax_rate`, `created_date`, `status`, `deleted`, `deleted_by_id`, `updated_by_id`, `inserted_by_id`) VALUES
(1, 'GST', 20, '2022-10-15 11:52:56', '0', '1', '2117031', 'pending', '2117031'),
(2, 'sales tax', 45, '2022-10-15 11:53:53', '0', '1', '2117031', 'pending', '2117031'),
(3, 'GST', 45, '2022-10-15 12:00:07', '0', '1', '2117031', '2117031', '2117031'),
(4, 'sales tax', 20, '2022-10-15 12:07:19', '0', '0', 'pending', '1', '2117031'),
(5, 'sales', 45, '2022-10-25 05:39:51', '0', '1', '1', 'pending', '2117031'),
(6, 'NO TAX', 0, '2022-11-11 05:45:27', '0', '0', 'pending', '1', '1'),
(7, 'NO TAX', 0, '2022-11-12 11:07:18', '0', '1', '1', 'pending', '1'),
(8, 'sales', 45, '2022-11-12 11:10:51', '0', '0', 'pending', 'pending', '1'),
(9, 'GST', 1000000, '2022-11-12 11:20:36', '0', '0', 'pending', '1', '1'),
(10, 'sales', 0, '2022-11-12 11:53:57', '0', '1', '1', 'pending', '1'),
(11, 'Hello', 2117032, '2022-11-16 17:28:26', '0', '0', 'pending', 'pending', '1'),
(12, 'NO TAX', 0, '2022-11-28 08:20:34', '0', '0', 'pending', 'pending', '1');

-- --------------------------------------------------------

--
-- Table structure for table `unit_tbl`
--

CREATE TABLE `unit_tbl` (
  `unit_id` int(10) NOT NULL,
  `unit_name` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(5) NOT NULL DEFAULT '0',
  `deleted` varchar(5) NOT NULL DEFAULT '0',
  `inserted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `deleted_by_id` varchar(10) NOT NULL DEFAULT 'pending',
  `updated_by_id` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_tbl`
--

INSERT INTO `unit_tbl` (`unit_id`, `unit_name`, `created_date`, `status`, `deleted`, `inserted_by_id`, `deleted_by_id`, `updated_by_id`) VALUES
(1, 'ml', '2022-10-14 15:11:37', '0', '0', '2117031', 'pending', 'pending'),
(2, 'kilogram', '2022-10-14 15:11:42', '0', '0', '2117031', 'pending', '2117031'),
(3, 'litre', '2022-10-14 15:12:00', '0', '0', '2117031', 'pending', '2117031'),
(4, 'gram', '2022-11-12 14:53:37', '0', '0', '1', 'pending', 'pending'),
(5, 'gram', '2022-11-12 14:53:54', '0', '0', '1', 'pending', 'pending'),
(6, 'dd', '2023-01-22 10:21:34', '0', '0', '1', 'pending', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice_detail_tbl`
--
ALTER TABLE `invoice_detail_tbl`
  ADD PRIMARY KEY (`invoice_detail_id`);

--
-- Indexes for table `invoice_tbl`
--
ALTER TABLE `invoice_tbl`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_tbl`
--
ALTER TABLE `purchase_tbl`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `stock_tbl`
--
ALTER TABLE `stock_tbl`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tax_tbl`
--
ALTER TABLE `tax_tbl`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_detail_tbl`
--
ALTER TABLE `invoice_detail_tbl`
  MODIFY `invoice_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `invoice_tbl`
--
ALTER TABLE `invoice_tbl`
  MODIFY `invoice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchase_tbl`
--
ALTER TABLE `purchase_tbl`
  MODIFY `purchase_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_tbl`
--
ALTER TABLE `stock_tbl`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tax_tbl`
--
ALTER TABLE `tax_tbl`
  MODIFY `tax_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  MODIFY `unit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
