-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2025 at 01:16 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `civihqzq_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `btc` varchar(255) DEFAULT NULL,
  `eth` varchar(255) DEFAULT NULL,
  `ltc` varchar(255) DEFAULT NULL,
  `bch` varchar(255) DEFAULT NULL,
  `xrp` varchar(255) DEFAULT NULL,
  `sol` varchar(255) DEFAULT NULL,
  `usdt` varchar(255) DEFAULT NULL,
  `doge` varchar(255) DEFAULT NULL,
  `shib` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `btc`, `eth`, `ltc`, `bch`, `xrp`, `sol`, `usdt`, `doge`, `shib`) VALUES
(1, 'adminbitpromarketprime', 'hW1V5vfTAdkM', 'bc1qcz5sk7v4udrmgysvv7jp5q5x0vcdt5smn60zqs', '0xD5106F4E773C5D91Fbd929444e53729E137e89A9', 'ltc1qhlak4mll3u4d36t9hqhcz934nudadzyd5msyfz', 'qpmve67fhymjlnh72aj58sr2j2l0m06r3uy0fx0hp8', 'rN1sk9k7dVu2AaMZVYJVaGRicPchqSxRmN', '9sLik3AQJisTRDg1dW6GmBauMocNd8jneir896pTZuXx', '0xD5106F4E773C5D91Fbd929444e53729E137e89A9', 'DTamP8hqozaKnhSLqryAXR7myFQe1xsEuD', '0xD5106F4E773C5D91Fbd929444e53729E137e89A9');

-- --------------------------------------------------------

--
-- Table structure for table `copy_traders`
--

CREATE TABLE `copy_traders` (
  `id` int(11) NOT NULL,
  `trader_name` varchar(100) NOT NULL,
  `win_rate` decimal(5,2) NOT NULL,
  `profit_percent` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `copy_traders`
--

INSERT INTO `copy_traders` (`id`, `trader_name`, `win_rate`, `profit_percent`, `created_at`) VALUES
(1, 'John Doe', 85.20, 30.50, '2025-03-15 11:30:44'),
(3, 'Robert Johnson', 90.30, 40.70, '2025-03-15 11:30:44'),
(4, 'Emily Davis', 82.50, 28.90, '2025-03-15 11:30:44'),
(5, 'Michael Brown', 88.90, 35.30, '2025-03-15 11:30:44'),
(6, 'Sophia Wilson', 76.40, 22.80, '2025-03-15 11:30:44'),
(7, 'David Martinez', 91.70, 45.20, '2025-03-15 11:30:44'),
(8, 'Olivia Taylor', 80.10, 26.40, '2025-03-15 11:30:44'),
(9, 'James Anderson', 87.60, 33.80, '2025-03-15 11:30:44'),
(11, 'Test Mikky', 90.00, 100.00, '2025-03-15 11:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `daily_profit` decimal(10,2) NOT NULL,
  `total_profit` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `start_date` timestamp NULL DEFAULT current_timestamp(),
  `end_date` timestamp GENERATED ALWAYS AS (`start_date` + interval `duration` day) STORED,
  `status` enum('active','completed','cancelled') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duration_spent` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `user_id`, `package`, `amount`, `daily_profit`, `total_profit`, `duration`, `start_date`, `status`, `created_at`, `updated_at`, `duration_spent`) VALUES
(1, 1, 'basic', 100.00, 5.00, 150.00, 30, '2025-03-02 10:57:45', 'active', '2025-03-02 10:57:45', '2025-03-03 22:02:35', 1),
(2, 1, 'basic', 100.00, 5.00, 150.00, 30, '2025-03-03 09:33:49', 'active', '2025-03-03 09:33:49', '2025-03-03 22:02:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `live_trading`
--

CREATE TABLE `live_trading` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `trade_type` enum('BUY','SELL') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `result` varchar(20) DEFAULT NULL,
  `profit` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','completed') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `completed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_trading`
--

INSERT INTO `live_trading` (`id`, `user_id`, `stock`, `trade_type`, `amount`, `duration`, `result`, `profit`, `status`, `created_at`, `completed_at`) VALUES
(1, 1, 'GOOGL', 'SELL', 100.00, 30, 'Loss', -100.00, 'pending', '2025-03-02 09:45:22', NULL),
(2, 1, 'TSLA', 'BUY', 500.00, 30, 'Loss', -500.00, 'pending', '2025-03-16 03:30:32', NULL),
(3, 1, 'GOOGL', 'SELL', 200.00, 15, 'Profit', 240.00, 'completed', '2025-03-16 03:42:59', NULL),
(4, 8, 'GOOGL', 'BUY', 50.00, 60, '0', -50.00, 'pending', '2025-03-26 11:42:33', NULL),
(5, 8, 'TSLA', 'SELL', 2.00, 30, '0', -2.00, 'pending', '2025-03-26 11:45:16', NULL),
(6, 8, 'TSLA', 'SELL', 2.00, 30, '0', -2.00, 'pending', '2025-03-26 11:45:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miners`
--

CREATE TABLE `miners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roi` decimal(10,2) NOT NULL,
  `max_amount` decimal(15,3) NOT NULL,
  `min_amount` decimal(15,3) NOT NULL,
  `cycle` int(11) NOT NULL,
  `cryptocurrency` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `miners`
--

INSERT INTO `miners` (`id`, `name`, `roi`, `max_amount`, `min_amount`, `cycle`, `cryptocurrency`, `created_at`, `updated_at`) VALUES
(1, 'BTC Miner 5000', 35.50, 2.000, 1.500, 3, 'BTC', '2025-03-15 08:19:56', '2025-03-15 08:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `mining_history`
--

CREATE TABLE `mining_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `miner_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `duration` int(11) NOT NULL,
  `used_duration` int(11) DEFAULT 0,
  `start_date` timestamp NULL DEFAULT current_timestamp(),
  `end_date` timestamp NULL DEFAULT NULL,
  `status` enum('active','completed','cancelled') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mining_history`
--

INSERT INTO `mining_history` (`id`, `user_id`, `miner_id`, `amount`, `currency`, `duration`, `used_duration`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 1.00, 'BTC', 30, 0, '2024-01-31 23:00:00', '2024-02-29 23:00:00', 'cancelled', '2025-03-15 09:01:09', '2025-03-15 10:27:46'),
(8, 1, 1, 2.50, 'ETH', 30, 0, '2024-01-09 23:00:00', '2024-02-09 23:00:00', 'completed', '2025-03-15 09:01:09', '2025-03-15 09:01:09'),
(9, 1, 1, 5.75, 'LTC', 40, 0, '2024-02-04 23:00:00', '2024-03-14 23:00:00', 'active', '2025-03-15 09:01:09', '2025-03-15 09:01:09'),
(10, 1, 1, 100.00, 'ADA', 20, 0, '2024-02-19 23:00:00', '2024-03-10 23:00:00', 'active', '2025-03-15 09:01:09', '2025-03-15 09:01:09'),
(11, 1, 1, 0.75, 'BTC', 30, 0, '2023-12-14 23:00:00', '2024-01-14 23:00:00', 'cancelled', '2025-03-15 09:01:09', '2025-03-15 09:01:09'),
(12, 1, 1, 3.20, 'LTC', 40, 0, '2023-12-31 23:00:00', '2024-02-09 23:00:00', 'completed', '2025-03-15 09:01:09', '2025-03-15 09:01:09'),
(13, 1, 1, 2.00, 'BTC', 3, 0, '2025-03-15 23:00:00', '2025-03-18 23:00:00', 'active', '2025-03-16 11:58:29', '2025-03-16 11:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `recipient_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `user_name`, `message`, `recipient_type`, `status`, `created_at`) VALUES
(1, 1, 'Test Dev', 'Your withdrawal request has been approved.', 'user', 'unread', '2025-03-14 09:27:13'),
(3, 1, 'Test Dev', 'Your deposit of $196 has been Approved', 'user', 'unread', '2025-03-14 13:39:08'),
(4, 1, 'Test Dev', 'Your deposit of $400 has been Declined', 'user', 'unread', '2025-03-14 13:39:28'),
(5, 1, 'Test Dev', 'Your withdrawal request of $139 has been Approved', 'user', 'unread', '2025-03-14 14:00:32'),
(6, 1, 'Test Dev', 'Your withdrawal request of $100 has been Declined', 'user', 'unread', '2025-03-14 14:01:01'),
(7, 1, 'root', 'You received a profit of $15000.', 'user', 'unread', '2025-03-14 21:20:46'),
(8, 1, 'root', 'A loss of $10000 has been deducted from your profit balance.', 'user', 'unread', '2025-03-14 21:20:59'),
(9, 1, 'techie', 'This is a test b=notification.', 'user', 'unread', '2025-03-15 06:49:33'),
(10, 1, 'Test Dev', 'Your transaction of $200 has been Approved', 'user', 'unread', '2025-03-15 15:22:22'),
(11, 1, 'Test Dev', 'Your transaction of $139 has been Declined', 'user', 'unread', '2025-03-15 15:22:25'),
(12, 2, 'Obiregoodluck', 'Account is due for maintenance, kindly contact support ', 'user', 'unread', '2025-03-18 22:46:46'),
(13, 7, 'Johan Stenberg', 'You received a profit of $25.', 'user', 'unread', '2025-03-25 13:21:35'),
(14, 7, 'Johan Stenberg', 'You received a profit of $31.', 'user', 'unread', '2025-03-26 09:20:33'),
(15, 7, 'Johan Stenberg', 'A loss of $7 has been deducted from your profit balance.', 'user', 'unread', '2025-03-26 09:20:59'),
(16, 7, 'Johan Stenberg', 'You received a profit of $15.', 'user', 'unread', '2025-03-26 11:49:48'),
(17, 1, 'Test Dev', 'Your withdrawal request of $100 has been Approved', 'user', 'unread', '2025-03-26 12:01:34'),
(18, 8, 'Alan', 'Your withdrawal request of $98 has been Approved', 'user', 'unread', '2025-03-26 12:03:16'),
(19, 7, 'Johan Stenberg', 'You received a profit of $10.', 'user', 'unread', '2025-03-28 18:36:33'),
(20, 7, 'Johan Stenberg', 'You received a profit of $60.', 'user', 'unread', '2025-03-28 18:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `signal_packages`
--

CREATE TABLE `signal_packages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `accuracy` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `roi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `signal_packages`
--

INSERT INTO `signal_packages` (`id`, `name`, `price`, `accuracy`, `duration`, `roi`) VALUES
(1, 'Beginner', 1500.00, 90, 15, 15),
(2, 'Pro Signals', 4000.00, 92, 60, 15),
(3, 'VIP Signals', 10500.00, 95, 90, 20);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `accuracy` decimal(5,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `roi` decimal(5,2) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `package_name`, `price`, `accuracy`, `duration`, `roi`, `subscribed_at`) VALUES
(3, 1, 'Beginner', 1500.00, 90.00, 15, 15.00, '2025-03-28 15:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `transaction_type` enum('deposit','withdrawal','upgrade') NOT NULL,
  `method` varchar(50) NOT NULL,
  `wallet_address` varchar(255) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` enum('pending','approved','declined') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notification_id` varchar(50) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `username`, `transaction_type`, `method`, `wallet_address`, `amount`, `status`, `created_at`, `updated_at`, `notification_id`, `bank_name`, `account_name`, `account_number`) VALUES
(1, 1, 'techie', 'upgrade', 'LITECOIN', NULL, 139.00, 'declined', '2025-03-02 06:04:33', '2025-03-15 15:22:25', NULL, NULL, NULL, NULL),
(2, 1, 'techie', 'deposit', 'BITCOIN', NULL, 196.00, 'approved', '2025-03-02 07:02:47', '2025-03-14 13:39:08', NULL, NULL, NULL, NULL),
(3, 1, 'techie', 'upgrade', 'ETHEREUM', NULL, 200.00, 'approved', '2025-03-02 07:08:37', '2025-03-15 15:22:22', NULL, NULL, NULL, NULL),
(4, 1, 'techie', 'deposit', 'SOL_Solana', NULL, 400.00, 'declined', '2025-03-02 07:09:05', '2025-03-14 13:39:28', NULL, NULL, NULL, NULL),
(5, 1, 'techie', 'withdrawal', 'LITECOIN', 'some_wallet', 100.00, 'declined', '2025-03-02 07:49:30', '2025-03-14 14:01:01', NULL, NULL, NULL, NULL),
(6, 1, 'techie', 'withdrawal', 'XRP_Ripple', 'some_wallet', 139.00, 'approved', '2025-03-02 07:50:23', '2025-03-14 14:00:32', NULL, NULL, NULL, NULL),
(7, 1, 'techie', 'upgrade', 'BITCOIN', NULL, 100.00, 'approved', '2025-03-03 09:13:02', '2025-03-04 14:28:47', NULL, NULL, NULL, NULL),
(8, 1, 'techie', 'deposit', 'LITECOIN', NULL, 26.00, 'approved', '2025-03-15 01:23:50', '2025-03-15 01:23:50', NULL, NULL, NULL, NULL),
(9, 1, 'techie', 'deposit', 'ETHEREUM', NULL, 761.00, 'approved', '2025-03-15 01:23:50', '2025-03-15 01:23:50', NULL, NULL, NULL, NULL),
(10, 1, 'techie', 'withdrawal', 'BITCOIN', NULL, 323.00, 'declined', '2025-03-15 01:29:06', '2025-03-15 01:29:06', NULL, NULL, NULL, NULL),
(11, 1, 'techie', 'withdrawal', 'SOL_Solana', NULL, 890.00, 'approved', '2025-03-15 01:29:06', '2025-03-15 01:29:06', NULL, NULL, NULL, NULL),
(12, 1, 'techie', 'withdrawal', 'BITCOINCASH', NULL, 827.00, 'approved', '2025-03-15 01:29:06', '2025-03-15 01:29:06', NULL, NULL, NULL, NULL),
(13, 1, 'techie', 'withdrawal', 'LITECOIN', NULL, 455.00, 'declined', '2025-03-15 01:29:06', '2025-03-15 01:29:06', NULL, NULL, NULL, NULL),
(14, 1, 'techie', 'withdrawal', 'Bank-Transfer', '', 100.00, 'approved', '2025-03-19 10:45:53', '2025-03-26 12:01:34', NULL, 'First Bank', 'Bank Name', '12345678'),
(15, 4, 'Jay_nobes', 'deposit', 'BITCOIN', NULL, 480.00, 'pending', '2025-03-20 13:32:18', '2025-03-20 13:32:18', NULL, NULL, NULL, NULL),
(16, 7, 'Stempa', 'deposit', 'BITCOIN', NULL, 1895.00, 'pending', '2025-03-25 12:03:18', '2025-03-25 12:03:18', NULL, NULL, NULL, NULL),
(17, 7, 'Stempa', 'deposit', 'BITCOIN', NULL, 1895.00, 'pending', '2025-03-25 12:03:38', '2025-03-25 12:03:38', NULL, NULL, NULL, NULL),
(18, 1, 'techie', 'withdrawal', 'BITCOIN', 'test_wallet', 300.00, 'pending', '2025-03-26 06:00:58', '2025-03-26 06:00:58', NULL, '', '', ''),
(19, 2, 'Obiregoodluck', 'withdrawal', 'BITCOIN', 'Haishsisjsjeiehh3', 540.00, 'pending', '2025-03-26 09:21:55', '2025-03-26 09:21:55', NULL, '', '', ''),
(20, 8, 'Souza', 'withdrawal', 'ETHEREUM', 'bc1q55xqzcn993pg2llfw2mtnvtahw8crqlh6nyazg', 44.00, 'pending', '2025-03-26 11:48:15', '2025-03-26 11:48:15', NULL, '', '', ''),
(21, 8, 'Souza', 'withdrawal', 'ETHEREUM', '0x68405A36f03FF25D8Ae181E7e4FF53cD3765A6BE', 98.00, 'approved', '2025-03-26 11:57:55', '2025-03-26 12:03:16', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `home_address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(10) DEFAULT '$',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `account_type` varchar(50) DEFAULT 'Basic',
  `password` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `balance` decimal(15,2) DEFAULT 0.00,
  `account_status` enum('active','suspended','closed') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trade_progress` int(11) DEFAULT 0,
  `signal_strength` int(11) DEFAULT 0,
  `total_investment` decimal(15,2) DEFAULT 0.00,
  `profit_balance` decimal(15,2) DEFAULT 0.00,
  `btc` decimal(15,8) DEFAULT 0.00000000,
  `eth` decimal(15,8) DEFAULT 0.00000000,
  `usdt` decimal(15,2) DEFAULT 0.00,
  `bnb` decimal(15,8) DEFAULT 0.00000000,
  `ltc` decimal(15,8) DEFAULT 0.00000000,
  `doge` decimal(15,8) DEFAULT 0.00000000,
  `xrp` decimal(15,8) DEFAULT 0.00000000,
  `shib` decimal(15,8) DEFAULT 0.00000000,
  `sol` decimal(15,8) DEFAULT 0.00000000,
  `verified` int(11) DEFAULT 0,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `lock_copy_traders` tinyint(1) DEFAULT 0,
  `lock_trading` tinyint(1) DEFAULT 0,
  `show_popup` tinyint(1) NOT NULL DEFAULT 0,
  `popup_message` varchar(255) NOT NULL,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `home_address`, `city`, `postal_code`, `country`, `currency`, `phone`, `email`, `account_type`, `password`, `password_hash`, `balance`, `account_status`, `created_at`, `updated_at`, `trade_progress`, `signal_strength`, `total_investment`, `profit_balance`, `btc`, `eth`, `usdt`, `bnb`, `ltc`, `doge`, `xrp`, `shib`, `sol`, `verified`, `blocked`, `lock_copy_traders`, `lock_trading`, `show_popup`, `popup_message`, `otp`) VALUES
(1, 'Test Dev', 'techie', 'Test Address', 'Benin CIty', '100100', 'Bahrain', '$', '12345678', 'mngene4@gmail.com', 'Basic', '12345', '$2y$10$Rfcv.jHe75/OzhaNAelrq.6CpyjT0YQKgo9mKBnVXJNmLFuY0R/wq', 15500.00, 'active', '2025-02-24 13:48:38', '2025-03-28 15:07:30', 52, 64, 23500.00, 50000.00, 10.00000000, 10.00000000, 10.00, 10.00000000, 10.00000000, 10.00000000, 10.00000000, 10.00000000, 10.00000000, 1, 0, 0, 0, 0, '', 5678),
(2, 'Obire Goodluck', 'Obiregoodluck', 'New york', 'New York', '322', 'Canada', '', '4558748804', 'obiregoodluck@gmail.com', 'Basic', 'Eric_123', '$2y$10$SrdgAaTGzNGbcOlBuUzHYeY2hRaV7.oyb6.IsibKuNKRLH6QnCbF2', 21000.00, 'active', '2025-03-18 08:40:20', '2025-03-25 18:46:37', 52, 62, 20000.00, 5000.00, 0.51376880, 0.00000000, 200.00, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 1, 0, 0, 0, 1, 'Account maintenance ', 51846),
(3, 'George Declan', 'Geo', '4 Road', 'Sbk', '', 'Nigeria', '', '08104490343', 'georgedeclan75@gmail.com', 'Basic', '78789999', '$2y$10$WBxDblJVl/AASqdjiOsAwO1HKYvoxwixu.muMl3snWabtSMPW2u56', 0.00, 'active', '2025-03-18 10:55:03', '2025-03-18 10:55:03', 0, 0, 0.00, 0.00, 0.00000000, 0.00000000, 0.00, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0, 0, 0, 0, 0, '', NULL),
(4, 'Jamie Noble', 'Jay_nobes', 'Ballyguile Beg', 'Wicklow', 'A67 AX50', 'Ireland', '', '0858663923', 'jamienoble2002@outlook.ie', 'Basic', 'Tobydog007@', '$2y$10$B/aSmi0qeC4M.M7/3jumNui6MlCVvuZbNJNr2z5YW1locANLQ63zu', 0.00, 'active', '2025-03-20 13:27:41', '2025-03-20 13:27:41', 0, 0, 0.00, 0.00, 0.00000000, 0.00000000, 0.00, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0, 0, 0, 0, 0, '', NULL),
(5, 'nNMnddrhXcCLUcO', 'EXrNhkjCVK', 'fmQWnUyTN', 'ICYPOJYXUJHWNC', 'nRMVPQQVlabPa', 'Zimbabwe', '', '3147624332', 'kellyfloellaeg92@gmail.com', 'Basic', 'rac7K2Z6h7VALn!', '$2y$10$wpq96sj1g/zi2Zos/iGnPu//5pf3ieuDxWo9J6oFjyH7p2vcY8.ou', 0.00, 'active', '2025-03-21 18:02:46', '2025-03-21 18:02:46', 0, 0, 0.00, 0.00, 0.00000000, 0.00000000, 0.00, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0, 0, 0, 0, 0, '', NULL),
(6, 'LsbIksztqoJveMf', 'yRlWFiaXCMeaKfp', 'lmKixPlNHDtD', 'VZSoSSxuJ', 'oLlhGWjudBQ', 'Zimbabwe', '', '5649094219', 'kerrhubbards@gmail.com', 'Basic', 'XlhK3xYIOjcKOi!', '$2y$10$fNLbpBFjv6l9g.xWbLdxOOv4FKwdnWmaw4vb/1eFItTpMwjyUbxZu', 0.00, 'active', '2025-03-22 08:26:07', '2025-03-22 08:26:07', 0, 0, 0.00, 0.00, 0.00000000, 0.00000000, 0.00, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0, 0, 0, 0, 0, '', NULL),
(7, 'Johan Stenberg', 'Stempa', 'AlderholmsvÃ¤gen 6', 'SkellefteÃ¥', '', 'Sweden', '', '0722090068', 'stenbergj49@gmail.com', 'Basic', 'sommarlov', '$2y$10$QHTkziFBnzHtRbCsUXUWEeuy8jHrkZUN/ajH2gx1k/e72M8K1r7Oq', 189.00, 'active', '2025-03-24 17:45:48', '2025-03-28 21:45:44', 38, 98, 189.00, 213.00, 0.00220000, 0.00000000, 0.00, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 1, 0, 0, 0, 0, '', NULL),
(8, 'Alan', 'Souza', 'Rua Luiz Gomes', 'SÃ£o Paulo', '02559049', 'Brazil', '', '11979509665', 'alanfg93@gmail.com', 'Basic', 'Cripto2025', '$2y$10$48kOX6ws3ANR4.dltd557OfCOPeTbO9KXAXvSqt94Ixr91W76Qnue', 0.00, 'active', '2025-03-25 14:56:12', '2025-03-26 12:14:21', 0, 98, 0.00, 0.00, 0.00000000, 0.00000000, 0.00, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 1, 0, 0, 0, 0, '', 269017),
(9, 'Eugene', 'Eugene952', 'Asaba', 'Delta', '', 'Nigeria', '', '08101302890', 'aneneeugene952@gmail.com', 'Basic', 'Eugene$951684', '$2y$10$MmdPH8Kc3L77EDthCeellOqmL7A.JPuA82cyU7ySbx5bVErqzpwJK', 0.00, 'active', '2025-03-27 11:19:11', '2025-03-27 11:19:11', 0, 0, 0.00, 0.00, 0.00000000, 0.00000000, 0.00, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0.00000000, 0, 0, 0, 0, 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_copy_traders`
--

CREATE TABLE `user_copy_traders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `copied_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_copy_traders`
--

INSERT INTO `user_copy_traders` (`id`, `user_id`, `trader_id`, `copied_at`) VALUES
(2, 1, 1, '2025-03-23 00:37:08'),
(4, 7, 3, '2025-03-25 12:17:05'),
(6, 8, 7, '2025-03-25 17:57:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `copy_traders`
--
ALTER TABLE `copy_traders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `live_trading`
--
ALTER TABLE `live_trading`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `miners`
--
ALTER TABLE `miners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mining_history`
--
ALTER TABLE `mining_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `miner_id` (`miner_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `signal_packages`
--
ALTER TABLE `signal_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_copy_traders`
--
ALTER TABLE `user_copy_traders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `trader_id` (`trader_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `copy_traders`
--
ALTER TABLE `copy_traders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `live_trading`
--
ALTER TABLE `live_trading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `miners`
--
ALTER TABLE `miners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mining_history`
--
ALTER TABLE `mining_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `signal_packages`
--
ALTER TABLE `signal_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_copy_traders`
--
ALTER TABLE `user_copy_traders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `investments`
--
ALTER TABLE `investments`
  ADD CONSTRAINT `investments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `live_trading`
--
ALTER TABLE `live_trading`
  ADD CONSTRAINT `live_trading_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mining_history`
--
ALTER TABLE `mining_history`
  ADD CONSTRAINT `mining_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mining_history_ibfk_2` FOREIGN KEY (`miner_id`) REFERENCES `miners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_copy_traders`
--
ALTER TABLE `user_copy_traders`
  ADD CONSTRAINT `user_copy_traders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_copy_traders_ibfk_2` FOREIGN KEY (`trader_id`) REFERENCES `copy_traders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
