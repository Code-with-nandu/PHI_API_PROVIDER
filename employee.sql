-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 06:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `profile_pic`) VALUES
(1, 'Ravi shankar', 'artofliving@gurudev.com', 'https://gurudev.artofliving.org/wp-content/uploads/2022/10/270-Gurudev-Sri-Sri-Ravi-Shankar.jpg'),
(2, 'John Doe', 'john.doe@example.com', 'https://gurudev.artofliving.org/wp-content/uploads/2022/10/270-Gurudev-Sri-Sri-Ravi-Shankar.jpg'),
(3, 'Isabella Moore', 'isabella.moore@example.com', 'https://gurudev.artofliving.org/wp-content/uploads/2022/10/270-Gurudev-Sri-Sri-Ravi-Shankar.jpg'),
(4, 'William Wilson', 'william.wilson@example.com', 'https://gurudev.artofliving.org/wp-content/uploads/2022/10/270-Gurudev-Sri-Sri-Ravi-Shankar.jpg'),
(5, 'sri srsi ravishankar', 'aaa1992@gmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK0T1s2_uBFRH70YNyRkJzliJyGE0VwTYNNMCe7WQeomoX3EW4'),
(6, 'Jay Gurudev ', 'jay@gmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK0T1s2_uBFRH70YNyRkJzliJyGE0VwTYNNMCe7WQeomoX3EW4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
