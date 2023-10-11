-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 10:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2= User',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(65) NOT NULL,
  `token_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `middle_name`, `email`, `password`, `type`, `date_created`, `token`, `token_expiration`) VALUES
(1, '', '', '', 'rb@yahoo.com', '123', 2, '2023-09-30 03:49:38', '', NULL),
(2, '', '', '', 'robellnomorosa@yahoo.com', '$2y$10$TH6wDVtQnigC0Rf0r2UWCeky2rwDx87hIDIOy8SyEwT/FgnbIKuqK', 2, '2023-10-03 04:48:20', 'l3VQ8ArtI3L4oLknVYFcmR0FtBudVq6PJVLAOxei5716EEVBc92tcz9x8epdDfQh', '2023-10-05 08:06:14'),
(4, '', '', '', 'rjb@yahoo.com', '$2y$10$MS4H69HUhhF6prjqzZFbs.DULVlf.gZFGz3.khwo5EKvO30rTl8rW', 2, '2023-10-03 05:37:13', '', NULL),
(5, '', '', '', 'gpt@yahoo.com', '$2y$10$Vi/iv.41TOuEVvMoFTIwUeKZvDQ3Bjibxgm39MRxcVKy6w7vcEi9y', 2, '2023-10-03 05:37:59', '', NULL),
(6, '', '', '', 'rwqrwq@yahoo.com', '$2y$10$NjFqLI9sjGrEFL9WOCy8Ku13W68SO5jRzxM5q4Rk/wQ2fSJ/0xiJu', 2, '2023-10-03 05:40:11', '', NULL),
(7, '', '', '', 'rwqrdawq@yahoo.com', '$2y$10$E2rqbg9i/RAKIe9P5DYEO.N2U/Ypyo38aRG/ysQNVmkBdY6U9TcPK', 2, '2023-10-03 05:41:32', '', NULL),
(8, '', '', '', 'asf@yahoo.com', '$2y$10$qetseEYBuKGZdhOmn11CDO2VRR2ZwAwhUa2kjV5fZtrROUVW7wRGq', 2, '2023-10-03 05:44:12', '', NULL),
(9, '', '', '', 'gp2t@yahoo.com', '$2y$10$93xiYYoquaz8Fq10Ud06luXUv9xtZOJlfq3uwlWvKwOb8g6phDbRW', 2, '2023-10-03 05:44:23', '', NULL),
(10, '', '', '', 'caws@gmail.com', '$2y$10$GtlXik7vAphglrwOHUOipeE.XD1lThHiljULcDZbiDI/2aOldZZMC', 2, '2023-10-03 05:45:51', '', NULL),
(11, '', '', '', 'vdawvdawomorosa@yahoo.com', '$2y$10$1nTjqK7.M71WS5cGUKkUS.aArxtRezDgbmWx5JP9hX3gHYURu5W96', 2, '2023-10-03 05:47:00', '', NULL),
(12, '', '', '', 'vfawevawea@yahoo.com', '$2y$10$e441hWOkxM/WPBOHcWGUOun9a1/ugY.B.B01x6F12ylOUwuhaqNpK', 2, '2023-10-03 05:47:40', '', NULL),
(13, '', '', '', 'cdawa@gmail.com', '$2y$10$CY8V3CoYoHzbRoPMd4humes.FT6YEASot0OJYDdlE09cnzXcBnei6', 2, '2023-10-03 05:48:04', '', NULL),
(14, '', '', '', 'ramzezferrera@gmail.com', '$2y$10$KrPYXHR1Wu62/jff9DOU4uIR0oNAPm5vnTLeRvcILmfd1Sa8WpPju', 2, '2023-10-03 06:06:52', 'UvZ9mjY8hKbzMlKGwgBkogvNOetp932GTo7ecI4lwXzks5Xxr7QH64Qy1yn4U7nK', '2023-10-10 09:53:54'),
(15, '', '', '', 'rbb@yahoo.com', '$2y$10$IlmvQX.Z3dQDXyqyb/1VQe7tG1Er34GHo18WiMLi/ibSLTE9nnXv.', 2, '2023-10-03 08:21:36', '', NULL),
(16, '', '', '', 'rrrb@yahoo.com', '$2y$10$Xw3YzR5v494o9Kw.P1Ia7.KYcCy6nK7nOj3qbY51tbnUVUaUjCATq', 2, '2023-10-04 06:52:42', '', NULL),
(17, '', '', '', 'rrrrrrrrr@yahoo.com', '$2y$10$zWuDgHEQAEvlHpZmS6HYbuZRVK1LHDpuY/H5FZKVRSwo7icPwTcpS', 2, '2023-10-04 06:53:15', '', NULL),
(18, '', '', '', 'johnleoabella379@gmail.com', '$2y$10$5jqfWonqpAnO3dDYTxNCrOdnZLyZwD3APpTLaXZz0rwrQag.MYcxe', 2, '2023-10-04 07:37:00', 'wG4an8ShIO6woG420MtDKdKBALliEjIw6KUvcc2jRck9vN17meBZyNsya3D0nZ6N', '2023-10-05 23:04:40'),
(19, '', '', '', 'qwerty@yahoo.com', '$2y$10$lfVadcl.ZCEeld5HKdvEDu72Ij6SBCtPvJ1WCaD/w5dqGgSwBUfgm', 2, '2023-10-04 07:41:14', 'oMYWhudx1AELUX3FNAnFBA4BBBcXUc8vt5gYFVTeZ1mQMRCBQyUO9BJoED1egqH6', '2023-10-04 02:46:16'),
(20, '', '', '', '01234567@yahoo.com', '$2y$10$LtUSi40BQAL4BAcLyuv1/OOvtf2vKuYJ5fahMq1ubFAQ8kPDAs/WS', 2, '2023-10-07 05:17:17', '', NULL),
(21, '', '', '', '123456789@yahoo.com', '$2y$10$q4aI.l5deiulq/sReAtaDORpHzAGqXpuKNgp0ujcE0TeaziJTDnOa', 2, '2023-10-07 05:18:59', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
