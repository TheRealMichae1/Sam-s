-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 01:44 PM
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
-- Database: `policedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mid_name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `device_type` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `first_name`, `last_name`, `mid_name`, `address`, `email`, `contact`, `serial_number`, `comment`, `device_type`, `date`) VALUES
(0, 'Sam', 'Kahula', 'Gongi', 'samkahula0@gmail.com', 'samkahula0@gmail.com', '0977761785', '123123', 'Testing comment form', 'phone', '2023-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Username` varchar(120) DEFAULT NULL,
  `UserEmail` varchar(200) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `RegDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `user_type`) VALUES
('', 'njo@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'user'),
('', 'njolomba3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0', 'michael', 'admin'),
('', 'michael@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0', 'michael@robotai.com', 'admin'),
('', 'samkahula0@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'user'),
('', 'njolomba3@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'user'),
('', 'njolomba3@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'admin'),
('', 'samkahula0@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'admin'),
('', 'samkahula0@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0', 'mike', 'admin'),
('', 'samkahula0@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0', 'Michael', 'admin'),
('', 'pawan@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'admin'),
('', 'pawan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0', 'admin', 'admin'),
('', 'samkahula0@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'admin'),
('', 'njolomba3@gmail.com', '827ccb0eea8a706c4c34a16891f84e', 'michael', 'user'),
('', 'admin@admin', '21232f297a57a5a743894a0e4a801f', 'admin', 'user'),
('', 'samkahula0@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'user'),
('', 'njolomba3@gmail.com', '4297f44b13955235245b2497399d7a', 'Mike', 'admin'),
('', 'samkahula0@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'user'),
('', 'michael@robotai.com', '5f4dcc3b5aa765d61d8327deb882cf', 'admin', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
