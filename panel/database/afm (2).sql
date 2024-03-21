-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 09:01 AM
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
-- Database: `afm`
--

-- --------------------------------------------------------

--
-- Table structure for table `message_db`
--

CREATE TABLE `message_db` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `message_db`
--

INSERT INTO `message_db` (`id`, `sender`, `receiver`, `subject`, `text`) VALUES
(7, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(8, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(9, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(10, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(11, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(12, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(13, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(14, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(15, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(16, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(17, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(18, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(19, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(20, '1130899098', '1130899098', 'سلام', 'سلام محمد'),
(23, '1130899098', 'ali', 'salam', 'hello'),
(24, '1130899098', 'ali', 'salam', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `nots_db`
--

CREATE TABLE `nots_db` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `note_text` text DEFAULT NULL,
  `note_image` varchar(255) DEFAULT NULL,
  `note_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nots_db`
--

INSERT INTO `nots_db` (`id`, `username`, `note_text`, `note_image`, `note_name`) VALUES
(22, 'all', 'main', 'https://www.toptal.com/', 'for-all');

-- --------------------------------------------------------

--
-- Table structure for table `users_db`
--

CREATE TABLE `users_db` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `prampet1` text DEFAULT NULL,
  `prampet2` text DEFAULT NULL,
  `prampet3` text DEFAULT NULL,
  `prampet4` text DEFAULT NULL,
  `prampet5` text DEFAULT NULL,
  `text_variable` text DEFAULT NULL,
  `chat_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_db`
--

INSERT INTO `users_db` (`id`, `username`, `password`, `access`, `email`, `tel`, `prampet1`, `prampet2`, `prampet3`, `prampet4`, `prampet5`, `text_variable`, `chat_id`) VALUES
(16, '1130899098', '1130899098fm', 'adminstrator', 'mypc264fm@gmail.com', '09139071917', 'hello', '[num_1]+[num_2]*[num_1]+[num_2]&[num_1]+[num_2]', '', '', '', 'i am mohammad\r\n', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message_db`
--
ALTER TABLE `message_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nots_db`
--
ALTER TABLE `nots_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_db`
--
ALTER TABLE `users_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message_db`
--
ALTER TABLE `message_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nots_db`
--
ALTER TABLE `nots_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users_db`
--
ALTER TABLE `users_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
