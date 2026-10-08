-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2026 at 07:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `allstudents`
--

CREATE TABLE `allstudents` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allstudents`
--

INSERT INTO `allstudents` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Rokon Mahmud', 'rokon@gmail.com', '01753031073'),
(2, 'Roni Hasan', 'roni@gmail.com', '10956238978'),
(3, 'Mahir', 'mahir@gmail.com', '01745128632'),
(4, 'Sumon', 'sumon@gmail.com', '0189562314'),
(5, 'Sabbir', 'sabbir@gmail.com', '01978526341'),
(6, 'Rohmot', 'rohmot@gmail.com', '01315201036'),
(7, 'Rakib', 'rakib@gmail.com', '01315467520');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allstudents`
--
ALTER TABLE `allstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allstudents`
--
ALTER TABLE `allstudents`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
