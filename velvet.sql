-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 03:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `velvet`
--
CREATE DATABASE IF NOT EXISTS `velvet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `velvet`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `description_media_url` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `description_media_url`, `user_id`, `post_id`) VALUES
(23, 'EZ !', '/', 1, 93),
(26, 'dsadasd', '/', 9, 73),
(28, 'BOG TE JEBO', '/', 8, 100),
(29, 'Testni komentar !', '/', 1, 92);

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `comment_id`, `user_id`) VALUES
(21, 25, 8);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `is_friend` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `user_id2`, `is_friend`) VALUES
(202, 8, 9, 'true'),
(214, 9, 1, 'true'),
(215, 8, 1, 'true'),
(217, 1, 6, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `message_media_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `reciever_id`, `message`, `message_media_url`) VALUES
(93, 1, 6, 'Poruka', '/'),
(94, 6, 1, 'Poruka', '/'),
(95, 6, 1, 'Poruka', '/'),
(96, 1, 6, 'Poruka', '/'),
(97, 6, 1, 'Poruka', '/'),
(98, 1, 6, 'Poruka', '/'),
(99, 6, 1, 'Poruka', '/'),
(100, 1, 6, 'Poruka', '/'),
(101, 1, 6, 'Poruka', '/'),
(102, 1, 6, 'Poruka', '/'),
(103, 1, 6, 'Poruka', '/'),
(104, 1, 6, 'Poruka', '/'),
(105, 1, 6, 'Poruka', '/'),
(106, 1, 6, 'isljhdalskjdhjklasd', '/'),
(107, 1, 6, 'csadasda', '/');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `description_media_url` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `description`, `description_media_url`, `user_id`, `createdAt`) VALUES
(73, 'Hello everyone ! Have you already watched Arcane ? Feel free to comment what you think about it. I think that it is amazing. Can not wait for new season.', '/jinx.jpg', 1, '2021-11-27 03:20:20'),
(92, 'What do you think of my new digital painting ?', '/4k-desktop-wallpaper.-1920×1200.jpg', 1, '2021-11-27 18:07:39'),
(102, 'Hello everyone !', '/', 1, '2021-12-03 03:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `user_id`) VALUES
(253, 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_status` varchar(20) NOT NULL,
  `profile_picture_url` varchar(100) NOT NULL,
  `user_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password`, `account_status`, `profile_picture_url`, `user_description`) VALUES
(1, 'Mile97', 'Mile Raspudic', 'raspudic88@gmail.com', '123', 'admin', '/thumb-1920-1188254.jpg', 'Hello everyone. Im Mile, 23 years old. I made this social network for learning fullstack web development. Feel free to send me message about any bugs or features that you want me to add. Enjoy :)'),
(6, 'Zyla', 'Marin Zilic', 'zyla@gmail.com', '12345', 'user', '/default.png', '/'),
(8, 'Milan', 'Milan Eres', 'milan@gmail.com', '12345', 'user', '/default.png', '/'),
(9, 'Nare', 'Josip Kordic', 'nare@gmail.com', '12345', 'user', '/0eb8bc784a1e90e86bdca774a41d3935.jpg', 'Hello everyone !!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;