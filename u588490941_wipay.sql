-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2022 at 02:02 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u588490941_wipay`
--

-- --------------------------------------------------------

--
-- Table structure for table `shopify_orders`
--

CREATE TABLE `shopify_orders` (
  `id` int(255) NOT NULL,
  `shopify_id` int(255) NOT NULL,
  `app_id` int(255) NOT NULL,
  `checkout_id` int(255) NOT NULL,
  `checkout_token` varchar(255) NOT NULL,
  `confirmed` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `current_total_price` decimal(65,2) NOT NULL,
  `gateway` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `fulfillable_quantity` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `shopify_shop` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopify_orders`
--

INSERT INTO `shopify_orders` (`id`, `shopify_id`, `app_id`, `checkout_id`, `checkout_token`, `confirmed`, `contact_email`, `created_at`, `currency`, `current_total_price`, `gateway`, `first_name`, `last_name`, `fulfillable_quantity`, `product_name`, `shopify_shop`, `datetime`) VALUES
(1, 2147483647, 580111, 2147483647, '2d247582a9f65aad695763bb7e9d9658', '1', 'shaynhacker@gmail.com', '2022-01-05T10:41:56-05:00', 'JMD', '582.50', 'WiPay', 'Shayn', 'Hacker', 1, 'Made In Jamaica T Shirt', 'deyah', '2022-01-05 15:42:00'),
(2, 2147483647, 580111, 2147483647, '58296d469ba2db7f9039f35d8c8be20f', '1', 'shaynhacker@gmail.com', '2022-01-03T20:07:54-05:00', 'JMD', '582.50', 'WiPay', 'Shayn', 'Hacker', 1, 'Made In Jamaica T Shirt', 'deyah', '2022-01-05 17:16:10'),
(3, 2147483647, 580111, 2147483647, '7a37dd325aa05386ab008d4aa4aa4cb4', '1', 'shaynhacker@gmail.com', '2022-01-04T08:12:03-05:00', 'JMD', '582.50', 'WiPay', 'Shayn', 'Hacker', 1, 'Made In Jamaica T Shirt', 'deyah', '2022-01-05 17:49:39'),
(4, 2147483647, 580111, 2147483647, '02fb4605650da425e44b89f0deec34ed', '1', 'shaynhacker@gmail.com', '2022-01-04T21:08:23-05:00', 'JMD', '582.50', 'WiPay', 'Shayn', 'Hacker', 1, 'Made In Jamaica T Shirt', 'deyah', '2022-01-05 18:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `shopify_stores`
--

CREATE TABLE `shopify_stores` (
  `id` int(25) NOT NULL,
  `store_url` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `install_date` datetime NOT NULL,
  `SandboxAPIKey` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SandboxAccountNumber` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LiveAPIKey` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LiveAccountNumber` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `environment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FeeStructure` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopify_stores`
--

INSERT INTO `shopify_stores` (`id`, `store_url`, `access_token`, `install_date`, `SandboxAPIKey`, `SandboxAccountNumber`, `LiveAPIKey`, `LiveAccountNumber`, `environment`, `FeeStructure`, `currency`) VALUES
(1, 'wiproducts.myshopify.com', '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', '2021-12-11 13:41:15', '', '', '', '', '', '', ''),
(2, 'wipaylove.myshopify.com', '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', '2021-12-11 19:06:40', '123', '1234567890', '', '', 'sandbox', 'customer_pay', 'JMD'),
(6, 'deyah.myshopify.com', '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', '2021-12-20 16:24:06', '123', '1234567890', '', '', 'sandbox', 'merchant_absorb', 'TTD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shopify_orders`
--
ALTER TABLE `shopify_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopify_stores`
--
ALTER TABLE `shopify_stores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shopify_orders`
--
ALTER TABLE `shopify_orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopify_stores`
--
ALTER TABLE `shopify_stores`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
