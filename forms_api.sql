-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 09:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forms_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `fields` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `form_id`, `fields`, `created_at`) VALUES
(1, 4, 'a:7:{s:10:\"first_name\";s:6:\"Kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:18:\"This is my comment\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:1:{i:0;s:7:\"Reading\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-29 22:58:21'),
(2, 4, 'a:7:{s:10:\"first_name\";s:6:\"Kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:18:\"This is my comment\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:1:{i:0;s:7:\"Reading\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-29 22:59:18'),
(3, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:18:\"this is my comment\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:2:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-29 23:00:03'),
(4, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:17:\"this i my comment\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:3:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";i:2;s:7:\"Cooking\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-29 23:02:42'),
(6, 4, 'a:8:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:18:\"this is my comment\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:2:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";}s:7:\"captcha\";s:0:\"\";s:7:\"form_id\";s:1:\"4\";}', '2024-05-29 23:43:57'),
(7, 4, 'a:8:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:10:\"my comment\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:2:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";}s:7:\"captcha\";s:0:\"\";s:7:\"form_id\";s:1:\"4\";}', '2024-05-29 23:44:35'),
(8, 4, 'a:8:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:10:\"sldkfjslkd\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:1:{i:0;s:7:\"Reading\";}s:7:\"captcha\";s:1:\"7\";s:7:\"form_id\";s:1:\"4\";}', '2024-05-29 23:45:36'),
(9, 4, 'a:8:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:8:\"lskdjflk\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:2:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";}s:7:\"captcha\";s:1:\"7\";s:7:\"form_id\";s:1:\"4\";}', '2024-05-29 23:53:46'),
(10, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:8:\"sldkfjlk\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:2:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-30 00:27:34'),
(11, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:8:\"sldkfjlk\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:2:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-30 00:29:19'),
(12, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:8:\"sldkfjlk\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:2:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-30 00:30:38'),
(13, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:7:\"i am in\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:1:{i:0;s:7:\"Reading\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-30 00:31:35'),
(14, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:7:\"i am in\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:1:{i:0;s:7:\"Reading\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-30 00:34:14'),
(15, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:7:\"i am in\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:1:{i:0;s:9:\"Traveling\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-30 00:35:46'),
(16, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:6:\"slkdfj\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:1:{i:0;s:9:\"Traveling\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-30 00:37:32'),
(17, 4, 'a:7:{s:10:\"first_name\";s:6:\"kashif\";s:5:\"email\";s:16:\"kashif@gmail.com\";s:7:\"message\";s:15:\"this is testing\";s:7:\"country\";s:3:\"USA\";s:6:\"gender\";s:4:\"Male\";s:8:\"interest\";a:2:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";}s:7:\"form_id\";s:1:\"4\";}', '2024-05-30 00:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `fields` text NOT NULL,
  `validation_rules` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `form_name`, `fields`, `validation_rules`) VALUES
(2, 'Contact Form', 'a:5:{i:0;a:3:{s:4:\"type\";s:5:\"input\";s:4:\"name\";s:10:\"first_name\";s:12:\"isEmailField\";b:1;}i:1;a:3:{s:4:\"type\";s:8:\"textarea\";s:4:\"name\";s:7:\"message\";s:12:\"isEmailField\";b:1;}i:2;a:4:{s:4:\"type\";s:6:\"select\";s:4:\"name\";s:7:\"country\";s:7:\"options\";a:2:{i:0;s:3:\"USA\";i:1;s:6:\"Canada\";}s:12:\"isEmailField\";b:1;}i:3;a:4:{s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:6:\"gender\";s:7:\"options\";a:2:{i:0;s:4:\"Male\";i:1;s:6:\"Female\";}s:12:\"isEmailField\";b:0;}i:4;a:4:{s:4:\"type\";s:8:\"checkbox\";s:4:\"name\";s:11:\"agree_terms\";s:5:\"label\";s:16:\"I agree to terms\";s:12:\"isEmailField\";b:0;}}', 'a:4:{s:10:\"first_name\";a:1:{s:8:\"required\";b:1;}s:7:\"country\";a:1:{s:8:\"required\";b:1;}s:6:\"gender\";a:1:{s:8:\"required\";b:1;}s:11:\"agree_terms\";a:1:{s:8:\"required\";b:1;}}'),
(3, 'Contact Form 2', 'a:5:{i:0;a:3:{s:4:\"type\";s:5:\"input\";s:4:\"name\";s:10:\"first_name\";s:12:\"isEmailField\";b:1;}i:1;a:3:{s:4:\"type\";s:8:\"textarea\";s:4:\"name\";s:7:\"message\";s:12:\"isEmailField\";b:1;}i:2;a:4:{s:4:\"type\";s:6:\"select\";s:4:\"name\";s:7:\"country\";s:7:\"options\";a:2:{i:0;s:3:\"USA\";i:1;s:6:\"Canada\";}s:12:\"isEmailField\";b:1;}i:3;a:4:{s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:6:\"gender\";s:7:\"options\";a:2:{i:0;s:4:\"Male\";i:1;s:6:\"Female\";}s:12:\"isEmailField\";b:0;}i:4;a:4:{s:4:\"type\";s:8:\"checkbox\";s:4:\"name\";s:8:\"interest\";s:7:\"options\";a:4:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";i:2;s:7:\"Cooking\";i:3;s:6:\"Sports\";}s:12:\"isEmailField\";b:0;}}', 'a:4:{s:10:\"first_name\";a:1:{s:8:\"required\";b:1;}s:7:\"country\";a:1:{s:8:\"required\";b:1;}s:6:\"gender\";a:1:{s:8:\"required\";b:1;}s:8:\"interest\";a:1:{s:8:\"required\";b:1;}}'),
(4, 'Contact Form 3', 'a:6:{i:0;a:3:{s:4:\"type\";s:5:\"input\";s:4:\"name\";s:10:\"first_name\";s:12:\"isEmailField\";b:1;}i:1;a:3:{s:4:\"type\";s:5:\"input\";s:4:\"name\";s:5:\"email\";s:12:\"isEmailField\";b:1;}i:2;a:3:{s:4:\"type\";s:8:\"textarea\";s:4:\"name\";s:7:\"message\";s:12:\"isEmailField\";b:1;}i:3;a:4:{s:4:\"type\";s:6:\"select\";s:4:\"name\";s:7:\"country\";s:7:\"options\";a:2:{i:0;s:3:\"USA\";i:1;s:6:\"Canada\";}s:12:\"isEmailField\";b:1;}i:4;a:4:{s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:6:\"gender\";s:7:\"options\";a:2:{i:0;s:4:\"Male\";i:1;s:6:\"Female\";}s:12:\"isEmailField\";b:0;}i:5;a:4:{s:4:\"type\";s:8:\"checkbox\";s:4:\"name\";s:8:\"interest\";s:7:\"options\";a:4:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";i:2;s:7:\"Cooking\";i:3;s:6:\"Sports\";}s:12:\"isEmailField\";b:0;}}', 'a:5:{s:10:\"first_name\";a:1:{s:8:\"required\";b:1;}s:5:\"email\";a:2:{s:8:\"required\";b:1;s:5:\"email\";b:1;}s:7:\"country\";a:1:{s:8:\"required\";b:1;}s:6:\"gender\";a:1:{s:8:\"required\";b:1;}s:8:\"interest\";a:1:{s:8:\"required\";b:1;}}'),
(5, 'Contact Form 4', 'a:6:{i:0;a:3:{s:4:\"type\";s:5:\"input\";s:4:\"name\";s:10:\"first_name\";s:12:\"isEmailField\";b:1;}i:1;a:3:{s:4:\"type\";s:5:\"input\";s:4:\"name\";s:5:\"email\";s:12:\"isEmailField\";b:1;}i:2;a:3:{s:4:\"type\";s:8:\"textarea\";s:4:\"name\";s:7:\"message\";s:12:\"isEmailField\";b:1;}i:3;a:4:{s:4:\"type\";s:6:\"select\";s:4:\"name\";s:7:\"country\";s:7:\"options\";a:2:{i:0;s:3:\"USA\";i:1;s:6:\"Canada\";}s:12:\"isEmailField\";b:1;}i:4;a:4:{s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:6:\"gender\";s:7:\"options\";a:2:{i:0;s:4:\"Male\";i:1;s:6:\"Female\";}s:12:\"isEmailField\";b:0;}i:5;a:4:{s:4:\"type\";s:8:\"checkbox\";s:4:\"name\";s:8:\"interest\";s:7:\"options\";a:4:{i:0;s:7:\"Reading\";i:1;s:9:\"Traveling\";i:2;s:7:\"Cooking\";i:3;s:6:\"Sports\";}s:12:\"isEmailField\";b:0;}}', 'a:5:{s:10:\"first_name\";a:1:{s:8:\"required\";b:1;}s:5:\"email\";a:2:{s:8:\"required\";b:1;s:5:\"email\";b:1;}s:7:\"country\";a:1:{s:8:\"required\";b:1;}s:6:\"gender\";a:1:{s:8:\"required\";b:1;}s:8:\"interest\";a:1:{s:8:\"required\";b:1;}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `entries_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
