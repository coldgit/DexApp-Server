-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 02:07 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dexapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `anime_id` int(100) NOT NULL,
  `ani_title` text,
  `img_src` text,
  `summary` text,
  `date_time` text,
  `ani_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `anime_episode`
--
CREATE TABLE `anime_episode` (
`anime_id` int(100)
,`ani_title` text
,`ani_url` text
,`episode_id` int(100)
,`epi_src` text
,`date_time` text
,`episode` text
);

-- --------------------------------------------------------

--
-- Table structure for table `anime_video`
--

CREATE TABLE `anime_video` (
  `anime_id` int(100) DEFAULT NULL,
  `episode_id` int(100) NOT NULL,
  `epi_src` text,
  `date_time` text,
  `episode` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `bookmarked`
--
CREATE TABLE `bookmarked` (
`anime_id` int(100)
,`ani_title` text
,`img_src` text
,`summary` text
,`anime_release` text
,`ani_url` text
,`bookmark_id` int(100)
,`user_id` int(100)
,`username` text
,`email` text
,`role` text
,`acc_created` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `bookmark_id` int(100) NOT NULL,
  `anime_id` int(11) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment_per_episode`
--

CREATE TABLE `comment_per_episode` (
  `epi_id` int(11) DEFAULT NULL,
  `comment_id` int(11) NOT NULL,
  `comment` text,
  `user_id` int(100) DEFAULT NULL,
  `date_time` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(100) NOT NULL,
  `username` text,
  `password` text,
  `email` text,
  `role` text,
  `acc_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `username`, `password`, `email`, `role`, `acc_created`) VALUES
(23, 'dasdasdasdasdasdasdasdas', '$2y$10$8.pbbJUHMdTKf4sE8M0Nc.hZIGlLNR0FgWho59DaBGJZZqD374UWq', 'dasdasdasdasdasdasdasdas@c.c', 'Client', '2016-09-13 17:31:21'),
(24, 'dexter123', '$2y$10$QXC3xPlB7ONBcu85cM7.2eGukJn/tXs2oa8pyCWihWTrGvkSPwvKC', 'dexter123@c.c', 'Client', '2016-09-13 17:49:12'),
(25, 'alvin123', '$2y$10$2EP8SL/akJq9t3KDUZKRQO6UV5Vjg6F6LTSfI91LCoLnWwHcl9t.a', 'alvin123@c.c', 'Client', '2016-09-13 17:57:08'),
(27, 'qwertyui', '$2y$10$H1w6fViW0Q7leKH7F8DniOoCmviNnWWdMQETHqHPphIW5p3uZMrVa', 'qwertyui@c.c', 'Client', '2016-09-13 23:36:43'),
(28, 'arthur123', '$2y$10$B6TWlBSDheegL5n7BGYiyes7lgeXaU6KX4ZQvg3Wzxve9GWQkRd1e', 'arthur123@c.c', 'Client', '2016-09-13 23:39:08'),
(29, 'sadasdasd', '$2y$10$r58ESiTihHU8hiQrgrs3geOzTWPvgtFB2FMrNBO2BQvI01FrBdvy6', 'sadasdasd@c.c', 'Client', '2016-10-23 19:14:24'),
(30, 'admin123', '$2y$10$GxSCUYR4u96TolLKHTz9peC8OzIdNdTxKfrY0kExYWbf9bNN5cmhi', 'admin123@c.c', 'Admin', '2016-10-24 22:26:18');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_anime_episode_and_comments`
--
CREATE TABLE `users_anime_episode_and_comments` (
`anime_id` int(100)
,`ani_title` text
,`img_src` text
,`summary` text
,`anime_release` text
,`ani_url` text
,`episode_id` int(100)
,`epi_src` text
,`episode_release` text
,`episode` text
,`comment_id` int(11)
,`comment` text
,`user_id` int(100)
,`date_time_commented` text
,`username` text
,`email` text
,`role` text
,`acc_created` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `anime_episode`
--
DROP TABLE IF EXISTS `anime_episode`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `anime_episode`  AS  select `anime`.`anime_id` AS `anime_id`,`anime`.`ani_title` AS `ani_title`,`anime`.`ani_url` AS `ani_url`,`anime_video`.`episode_id` AS `episode_id`,`anime_video`.`epi_src` AS `epi_src`,`anime_video`.`date_time` AS `date_time`,`anime_video`.`episode` AS `episode` from (`anime` join `anime_video`) where (`anime`.`anime_id` = `anime_video`.`anime_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `bookmarked`
--
DROP TABLE IF EXISTS `bookmarked`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bookmarked`  AS  select `anime`.`anime_id` AS `anime_id`,`anime`.`ani_title` AS `ani_title`,`anime`.`img_src` AS `img_src`,`anime`.`summary` AS `summary`,`anime`.`date_time` AS `anime_release`,`anime`.`ani_url` AS `ani_url`,`bookmarks`.`bookmark_id` AS `bookmark_id`,`bookmarks`.`user_id` AS `user_id`,`userinfo`.`username` AS `username`,`userinfo`.`email` AS `email`,`userinfo`.`role` AS `role`,`userinfo`.`acc_created` AS `acc_created` from ((`anime` join `bookmarks`) join `userinfo`) where ((`anime`.`anime_id` = `bookmarks`.`anime_id`) and (`bookmarks`.`user_id` = `userinfo`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `users_anime_episode_and_comments`
--
DROP TABLE IF EXISTS `users_anime_episode_and_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_anime_episode_and_comments`  AS  select `anime`.`anime_id` AS `anime_id`,`anime`.`ani_title` AS `ani_title`,`anime`.`img_src` AS `img_src`,`anime`.`summary` AS `summary`,`anime`.`date_time` AS `anime_release`,`anime`.`ani_url` AS `ani_url`,`anime_video`.`episode_id` AS `episode_id`,`anime_video`.`epi_src` AS `epi_src`,`anime_video`.`date_time` AS `episode_release`,`anime_video`.`episode` AS `episode`,`comment_per_episode`.`comment_id` AS `comment_id`,`comment_per_episode`.`comment` AS `comment`,`comment_per_episode`.`user_id` AS `user_id`,`comment_per_episode`.`date_time` AS `date_time_commented`,`userinfo`.`username` AS `username`,`userinfo`.`email` AS `email`,`userinfo`.`role` AS `role`,`userinfo`.`acc_created` AS `acc_created` from (((`anime` join `anime_video`) join `comment_per_episode`) join `userinfo`) where ((`anime`.`anime_id` = `anime_video`.`anime_id`) and (`anime_video`.`episode_id` = `comment_per_episode`.`epi_id`) and (`comment_per_episode`.`user_id` = `userinfo`.`user_id`) and (`userinfo`.`role` = 'Client')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`anime_id`);

--
-- Indexes for table `anime_video`
--
ALTER TABLE `anime_video`
  ADD PRIMARY KEY (`episode_id`),
  ADD KEY `anime_id` (`anime_id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`bookmark_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `anime_id` (`anime_id`);

--
-- Indexes for table `comment_per_episode`
--
ALTER TABLE `comment_per_episode`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `epi_id` (`epi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `anime_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `anime_video`
--
ALTER TABLE `anime_video`
  MODIFY `episode_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_per_episode`
--
ALTER TABLE `comment_per_episode`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anime_video`
--
ALTER TABLE `anime_video`
  ADD CONSTRAINT `anime_video_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookmarks_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_per_episode`
--
ALTER TABLE `comment_per_episode`
  ADD CONSTRAINT `comment_per_episode_ibfk_1` FOREIGN KEY (`epi_id`) REFERENCES `anime_video` (`episode_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_per_episode_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
