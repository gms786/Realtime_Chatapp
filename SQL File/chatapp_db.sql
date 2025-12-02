-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2025 at 10:39 AM
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
-- Database: `chatapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `msg_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `msg_img`) VALUES
(26, 1107293194, 1289544059, 'g', NULL),
(27, 1107293194, 1289544059, 'hello', NULL),
(28, 1107293194, 1289544059, 'how are you', NULL),
(29, 1107293194, 1289544059, '', '1745846190IMG_20240413_175738.jpg'),
(30, 1289544059, 1107293194, '', '1745846308Screenshot_28-4-2025_15588_img.freepik.com.jpeg'),
(31, 1107293194, 1289544059, '', '1745846920Sign (3).jpg'),
(32, 1107293194, 1289544059, 'this is me', '1745847152_IMG_20240413_175738.jpg'),
(33, 1107293194, 1289544059, 'this is me', '1745847171_IMG_20240413_175738.jpg'),
(34, 1107293194, 1289544059, '', '1745847181_IMG_20240413_175738.jpg'),
(35, 1107293194, 1289544059, '', '1745847228Sign (3).jpg'),
(36, 1107293194, 1289544059, 'hello', NULL),
(37, 1289544059, 1708870996, 'Hi', NULL),
(38, 1708870996, 1289544059, 'hi', NULL),
(39, 1708870996, 1289544059, '', '1745903629Screenshot_28-4-2025_15588_img.freepik.com.jpeg'),
(40, 1213140513, 1289544059, 'Hi', NULL),
(41, 1213140513, 1289544059, '', '17466692653d-rendering-young-cartoon-tiger.jpg'),
(42, 1289544059, 1213140513, 'Hello', NULL),
(43, 1289544059, 1213140513, 'How are you ?', NULL),
(44, 1289544059, 1670886948, 'hello', NULL),
(45, 1289544059, 1670886948, '', '1747054677ER.drawio.png'),
(46, 1670886948, 1289544059, 'Hello', NULL),
(47, 1289544059, 1252928562, 'Hi', NULL),
(48, 1289544059, 1252928562, '', '1747121901gaus.jpeg'),
(49, 1252928562, 1289544059, 'hello sir', NULL),
(50, 1708870996, 1289544059, 'hello', NULL),
(51, 1289544059, 1708870996, 'hi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `failed_attempts` int(11) DEFAULT 0,
  `lock_until` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `unique_id`, `name`, `email`, `password`, `img`, `status`, `failed_attempts`, `lock_until`, `created_at`) VALUES
(1107293194, 0, 'john', 'johndoe@gmail.com', '6e0b7076126a29d5dfcbd54835387b7b', 'Screenshot_28-4-2025_15588_img.freepik.com.jpeg', 'Offline Now', 0, NULL, '2025-04-28 13:03:37'),
(1213140513, 0, 'sushant', 'sushantshinde5657@gmail.com', 'dcfdd9b691bf2c32f564fef507ea55d6', 'WhatsApp Image 2025-05-08 at 11.11.10 PM.jpeg', 'Offline Now', 0, NULL, '2025-04-29 05:15:19'),
(1252928562, 0, 'vishal', 'vishal.kamble40@gmail.com', '01e70ef35b60ca856a22d974811c9611', 'default-avatar.png', 'Offline Now', 3, '2025-05-13 16:10:14', '2025-05-13 07:37:18'),
(1289544059, 0, 'gms', 'gaushmohammadsiddiqui@gmail.com', '1157cbb67eac0a2f69fe139893e243a6', 'default-avatar.pngIMG_20240413_175738.jpg', 'Offline Now', 0, NULL, '2025-04-28 13:04:23'),
(1670886948, 0, 'test1', 'test@gmail.com', '309031d05eb343448b725b09a3635f13', 'default-avatar.png', 'Offline Now', 0, NULL, '2025-05-12 11:31:41'),
(1708870996, 0, 'jennifer', 'jennifer@gmail.com', 'a3504ce3a21476e10c02b725dfba6381', 'Screenshot_28-4-2025_1658_img.freepik.com.jpeg', 'Offline Now', 0, NULL, '2025-04-28 16:50:37'),
(1727354920, 0, 'Arif', 'arifsiddiqui36@gmail.com', 'd53d757c0f838ea49fb46e09cbcc3cb1', 'default-avatar.png', 'Offline Now', 0, NULL, '2025-04-28 16:47:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1727354921;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
