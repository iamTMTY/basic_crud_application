-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 06:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuri_task_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses_for_user_12`
--

CREATE TABLE `courses_for_user_12` (
  `id` int(255) UNSIGNED NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `tutor_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_for_user_12`
--

INSERT INTO `courses_for_user_12` (`id`, `course`, `tutor_name`) VALUES
(5, 'algorithm and data structures', 'net ninja');

-- --------------------------------------------------------

--
-- Table structure for table `courses_for_user_14`
--

CREATE TABLE `courses_for_user_14` (
  `id` int(255) UNSIGNED NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `tutor_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_for_user_14`
--

INSERT INTO `courses_for_user_14` (`id`, `course`, `tutor_name`) VALUES
(1, 'whatevr', 'temitayo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`) VALUES
(12, 'johndoe@gmail.com', 'john', 'doe', '827ccb0eea8a706c4c34a16891f84e7b'),
(14, 'janedoe@gmail.com', 'jane', 'doe', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_for_user_12`
--
ALTER TABLE `courses_for_user_12`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_for_user_14`
--
ALTER TABLE `courses_for_user_14`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_for_user_12`
--
ALTER TABLE `courses_for_user_12`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses_for_user_14`
--
ALTER TABLE `courses_for_user_14`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
