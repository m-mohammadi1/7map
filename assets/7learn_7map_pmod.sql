-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 09:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `7learn_7map_pmod`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(256) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `verified` bit(1) NOT NULL DEFAULT b'0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `title`, `description`, `phone`, `lat`, `lng`, `type`, `verified`, `created_at`) VALUES
(33, 4, 'كتابخانه ايرانيان', 'اين يك كتاب خانه بزرگ استاين يك كتاب خانه بزرگ استاين يك كتاب خانه بزرگ استاين يك كتاب خانه بزرگ استاين يك كتاب خانه بزرگ استاين يك كتاب خانه بزرگ استاين يك كتاب خانه بزرگ استاين يك كتاب خانه بزرگ است', '09145584235', 35.70243453979492, 51.48412322998047, 1, b'1', '2021-03-03 23:00:12'),
(34, 4, 'تهران برج آزادی', 'محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی محمشسی ', '091564654654', 35.69565200805664, 51.48133850097656, 1, b'1', '2021-03-05 18:02:45'),
(35, 4, 'بیمارستان کودکان', 'یک بیمارستان دولتی یک بیمارستان دولتی یک بیمارستان دولتی یک بیمارستان دولتی یک بیمارستان دولتی یک بیمارستان دولتی یک بیمارستان دولتی یک بیمارستان دولتی یک بیمارستان دولتی یک بیمارستان دولتی ', '04156578978', 35.69990158081055, 51.41697692871094, 3, b'1', '2021-03-05 21:12:58'),
(36, 4, 'تهران برج آزادی', 'اعهاهعاهع', '0915464654', 35.700522720414256, 51.475028515386036, 3, b'1', '2021-03-05 21:20:59'),
(37, 4, 'رستوران نیرو هوایی', 'این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است این یک رستوران است ', '02154683232', 35.701304920288415, 51.4346564766428, 2, b'1', '2021-03-05 21:23:52'),
(38, 13, 'موزه نیروی هوایی ارتش', 'توضیحات موزه نیروی هوایی ارتش توضیحات موزه نیروی هوایی ارتش توضیحات موزه نیروی هوایی ارتش توضیحات موزه نیروی هوایی ارتش توضیحات موزه نیروی هوایی ارتش توضیحات موزه نیروی هوایی ارتش توضیحات موزه نیروی هوایی ارتش توضیحات موزه نیروی هوایی ارتش ', '0215498752', 35.7043387715028, 51.4805513154513, 1, b'1', '2021-03-05 21:29:23'),
(39, 13, 'بازار موزه', 'توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه توضیحات موزه ', '05515454568', 35.69943459961918, 51.475798347445654, 8, b'1', '2021-03-05 21:31:58'),
(40, 4, 'افق کوروش اصلی', 'افق کوروش اصلی واقع در میدان اصلی شهر', '02125645684', 35.704045607271176, 51.4808750124561, 1, b'0', '2021-03-08 19:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`) VALUES
(1, 'عمومی'),
(2, 'رستوران'),
(3, 'بیمارستان'),
(4, 'بانک'),
(5, 'پارک'),
(6, 'پمپ بنزین'),
(7, 'کتابخانه'),
(8, 'موزه');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `created_at`) VALUES
(4, 'mohammad', 'mohammad', 'm@gmail.com', '$2y$10$xn437iro0RCdlb.XsTdQ0uM26jPiixTI0DhSe8kfgvARWxD0oJE4C', '2021-02-07 15:07:59'),
(5, 'علی محمدی', 'ali24', 'ali@gmail.com', '$2y$10$YRCcanoFBWxi0kmXvMxbGehkTqsDgriTxFJsH7/SQCqe03TIRPyE.', '2021-02-07 18:12:52'),
(6, 'علی حمدی', 'alihm', 'alihm@gmail.com', '$2y$10$.pgVfzGVmL.mvkWD4oRtf.k3DdI1NK/jOK5zQYUSUCQIOgc0Y0vt6', '2021-02-09 22:25:23'),
(7, 'ad', 'newuser', 'newuser@gmail.com', '$2y$10$qrmNaoZ4TZNAYh6.fqxlYOIuWVjp8.ouCzcn.AyXjofbD7WnuatPa', '2021-02-09 22:41:24'),
(8, 'شییشس', 'asdasd', 'dsad@asdasd', '$2y$10$vDL5q.i9CmrgKIOuyn1Kq.WMPkCKLklcHWmYNeshSGZKKHqmalI02', '2021-02-09 22:50:29'),
(9, 'ali', 'ali321', 'ali321@gmail.com', '$2y$10$GhudfNPVyfsxgNHM5IiL6uddzmbCU9etF70098.jmstuC7w7HRs0S', '2021-02-11 14:55:00'),
(10, 'ali', 'ali123', 'ali22@gmail.com', '$2y$10$/qHZd0dx6GQ4Bw1zxBFIluqQziO4yhExxCcBeFs/snaUFbTFA9Q8S', '2021-02-24 22:42:59'),
(11, 'ali', 'ali22', 'ali@gmail.pcm', '$2y$10$XkKPgJU6FoDWzvg9T68S8uDy1s9teFUbbujhQKhupbfzAX/lH4CRq', '2021-02-24 23:11:06'),
(12, 'ali', 'ali23', 'ali2ad3@gmail.com', '$2y$10$syhQxlc5EerxA5cZjQ3GB.vvZyeAFxZ/S2uD7Jzr10NKqnMw2XMmm', '2021-02-24 23:21:30'),
(13, 'ali', 'ali44', 'a44li@gmail.com', '$2y$10$UEECeTwYRK/q3/ZPcyAsw.JgN//5KGawrDYa3QF87ntL050SRq3aO', '2021-03-05 21:28:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
