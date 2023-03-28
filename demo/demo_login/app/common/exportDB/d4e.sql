-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 11:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d4e`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--
CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL DEFAULT 1,
  `reset_password_token` varchar(100) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `actived_flag`, `reset_password_token`, `updated`, `created`) VALUES
(1, 'admin1', md5('admin1'), 1, md5(CURRENT_TIMESTAMP()), CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP()),
(2, 'admin2', md5('admin2'), 1, md5(CURRENT_TIMESTAMP()), CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());
CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `TEXT` varchar(255) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_video` int(11) DEFAULT NULL,
  `comment_grade` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `TEXT`, `date_time`, `id_user`, `id_video`, `comment_grade`) VALUES
(1, 'Great video! Thanks for sharing.', '2023-03-22 13:30:00', 1, 1, 95);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `NAME` varchar(32) DEFAULT NULL,
  `PASSWORD` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `mail` varchar(32) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `moderator` tinyint(1) DEFAULT NULL,
  `user_grade` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `NAME`, `PASSWORD`, `last_name`, `mail`, `birth_date`, `moderator`, `user_grade`) VALUES
(1, 'Hoang', 'password1', 'Hoang', 'Hoang.Phuong@example.com', '2001-01-01', 0, 80);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `RESUME` varchar(255) DEFAULT NULL,
  `video_grade` int(11) DEFAULT NULL,
  `video_tag` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `title`, `content`, `RESUME`, `video_grade`) VALUES
(1, 'How to make a cake', 'In this video, we show you how to make a delicious cake from scratch.', 'Learn how to bake a cake with this step-by-step tutorial.', 90),
(2, 'How to make a cake', 'In this video, we show you how to make a delicious cake from scratch.', 'Learn how to bake a cake with this step-by-step tutorial.', 90),
(3, 'How to make a cake', 'In this video, we show you how to make a delicious cake from scratch.', 'Learn how to bake a cake with this step-by-step tutorial.', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_video` (`id_video`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
