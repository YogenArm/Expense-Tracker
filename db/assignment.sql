-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 08:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `income_or_expense`
--

CREATE TABLE `income_or_expense` (
  `expense_id` int(11) NOT NULL,
  `expense_title` varchar(255) NOT NULL,
  `expense_category` varchar(255) NOT NULL,
  `expense_description` longtext DEFAULT NULL,
  `expense_amount` int(11) NOT NULL,
  `expense_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expense_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income_or_expense`
--

INSERT INTO `income_or_expense` (`expense_id`, `expense_title`, `expense_category`, `expense_description`, `expense_amount`, `expense_at`, `expense_type`) VALUES
(18, 'new expense', 'Rent', 'test', 500, '2021-12-18 15:41:44', 'exp'),
(19, 'revenue1', 'Advertising fees', 'test', 1000, '2021-12-18 15:42:07', 'rev'),
(20, 'test', 'Goods Sales', 'tse', 232, '2021-12-18 15:50:41', 'rev'),
(21, 'selling goods', 'Goods Sales', 'selling to abc pvt ltd', 18, '2021-12-18 16:13:58', 'rev'),
(22, 'Hourse Rent', 'Rent', 'Give 2 month hourse rent', 250, '2021-12-18 16:14:57', 'exp');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transaction_foreign_id` int(11) NOT NULL,
  `transaction_month` varchar(255) NOT NULL,
  `transaction_year` varchar(255) NOT NULL,
  `transaction_at` datetime NOT NULL DEFAULT current_timestamp(),
  `transaction_amount` int(11) NOT NULL,
  `transaction_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction_type`, `transaction_foreign_id`, `transaction_month`, `transaction_year`, `transaction_at`, `transaction_amount`, `transaction_balance`) VALUES
(11, 'expense', 18, 'December', '2021', '2021-12-18 15:41:44', 500, -500),
(12, 'revenue', 19, 'December', '2021', '2021-12-18 15:42:07', 1000, 500),
(13, 'revenue', 20, 'December', '2021', '2021-12-18 15:50:41', 232, 732),
(14, 'revenue', 21, 'December', '2021', '2021-12-18 16:13:58', 18, 750),
(16, 'expense', 18, 'October', '2021', '2021-10-21 16:14:57', 500, -500),
(17, 'revenue', 19, 'October', '2021', '2021-10-21 16:14:57', 1000, 500),
(18, 'revenue', 20, 'October', '2021', '2021-10-05 15:50:41', 232, 732),
(19, 'revenue', 21, 'October', '2021', '2021-10-17 16:13:58', 18, 750),
(20, 'expense', 22, 'October', '2021', '2021-10-09 16:14:57', 250, 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `balance` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `balance`) VALUES
(1, 'yogen', 'Yogen Armoogum', '12345', 500),
(5, 'yogen1', 'Yogen Armoogum', '123456', 500),
(6, 'yogen2', 'Yogen Armoogum', '123457', 500),
(7, 'yogen3', 'Yogen Armoogum', '123458', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `income_or_expense`
--
ALTER TABLE `income_or_expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `income_or_expense`
--
ALTER TABLE `income_or_expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
