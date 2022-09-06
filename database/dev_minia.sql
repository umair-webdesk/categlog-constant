-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb.devser.net
-- Generation Time: Aug 26, 2022 at 01:08 PM
-- Server version: 10.4.24-MariaDB-log
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_minia`
--

-- --------------------------------------------------------

--
-- Table structure for table `constantcontact_token`
--

CREATE TABLE `constantcontact_token` (
  `id` int(11) NOT NULL,
  `token_type` varchar(255) DEFAULT NULL,
  `expires_in` varchar(255) DEFAULT NULL,
  `access_token` longtext DEFAULT NULL,
  `refresh_token` text DEFAULT NULL,
  `scope` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `constantcontact_token`
--

INSERT INTO `constantcontact_token` (`id`, `token_type`, `expires_in`, `access_token`, `refresh_token`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'Bearer', '86400', 'eyJraWQiOiIycmd3S0Y2cnM4cTRTeWNqbXQ2MkJRMThkVXh6WldaaWJYdHBvQmswZWNJIiwiYWxnIjoiUlMyNTYifQ.eyJ2ZXIiOjEsImp0aSI6IkFULm9oYjNkVWhZNHpEQVFxQTlJa19wb1EtM0diN2tFUW5ZNlNxcklaVEpOX2cub2FycmptcHRxVnlMTW9lMXIwaDYiLCJpc3MiOiJodHRwczovL2lkZW50aXR5LmNvbnN0YW50Y29udGFjdC5jb20vb2F1dGgyL2F1czFsbTNyeTltRjd4MkphMGg4IiwiYXVkIjoiaHR0cHM6Ly9hcGkuY2MuZW1haWwvdjMiLCJpYXQiOjE2NjE1MDA5MjYsImV4cCI6MTY2MTU4NzMyNiwiY2lkIjoiNTJmYWQ1MGItNzdkOS00N2ZkLWJmYzQtYTg5NTY2ODhiM2JiIiwidWlkIjoiMDB1MXA4ZnN4ZnhDS25zVHgwaDgiLCJzY3AiOlsib2ZmbGluZV9hY2Nlc3MiLCJjb250YWN0X2RhdGEiXSwiYXV0aF90aW1lIjoxNjYxNDk2ODYwLCJzdWIiOiJkZXZleXN0dWRpb3NAZ21haWwuY29tIiwicGxhdGZvcm1fdXNlcl9pZCI6IjA0NmZjOWI3LWYyYWItNGFlNi04OGU5LWJlZTA3ZDQwMzJlNiJ9.Yt9eh_7uov2r4jLbedDJ35rrmmpCXbUZNiT8nOlZe4o-NpOLONb5z-jEI4zyyTnRaYBwoNtd2-7gYLxXWM9iBrk9DjY32MwCZ5ZY7Uwl4qMFCu2-4lDptxkLQC6KZ4-vY87s6CDnDcNylhNVzFvGCMcrDfVTAv7dt5wA_1Zsk-YForna72MNZoLDJKqe_5zr2W2A-zbrGQmAn_uTLTsEf24D0mRuUvK-uPzXwqKDjp-3w0xNsoYqc1QqGNZhAxcMC-NX9caXB1sQQHOwkmGWmipl436rV3h37RduKbnyFfU2_wTIA7B2YPwZZqfe5meDA90qdNoN8PC75-LiOL4Bdg', 'ebxaNSxbxH3WTAFWGTaPPjCTpuZ-CxP6GnCinQ8tsJM', 'offline_access contact_data', '2022-08-18 13:16:55', '2022-08-26 03:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `store_url` varchar(255) NOT NULL,
  `store_front_url` varchar(255) DEFAULT NULL,
  `api_username` varchar(25) NOT NULL,
  `api_path` varchar(255) NOT NULL,
  `api_token` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `store_url`, `store_front_url`, `api_username`, `api_path`, `api_token`, `logo`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', '', '1656659010_93254ae89df3cb227ea4.jpg', '2022-06-10 17:30:43', '2022-07-01 12:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', 'admin@email.com', '$2y$10$ZRcpVsfI7QbEz5mlvMZvzeJxc6F6P8Tvcz/6tIz1vHO5ebBwsKCDq', '1', '2022-06-14 17:20:33', '2022-06-20 14:19:40'),
(4, 'Ethan', 'Ethan', 'Hunt', 'Ethan75@gmail.com', '$2y$10$z8QvT6J.S4hHrAOX7KDPPufiMg60FElAyo8GvwozhVTZgIDqYxbnW', '0', '2022-06-29 12:59:48', '2022-07-01 12:34:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `constantcontact_token`
--
ALTER TABLE `constantcontact_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `constantcontact_token`
--
ALTER TABLE `constantcontact_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
