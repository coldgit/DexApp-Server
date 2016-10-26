-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2016 at 04:20 AM
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

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`anime_id`, `ani_title`, `img_src`, `summary`, `date_time`, `ani_url`) VALUES
(2, 'One Punch Man', 'uploads/3-opm1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:40:21', 'One-Punch-Man'),
(3, 'One Piece', 'uploads/1-op.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:41:03', 'One-Piece'),
(4, 'Nanatsu No Taizai', 'uploads/2-nanatsu.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:41:42', 'Nanatsu-No-Taizai'),
(5, 'No Game No Life', 'uploads/4-ngnl.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:42:00', 'No-Game-No-Life'),
(6, 'Shokugeki No Souma', 'uploads/5-shokugeki.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:42:28', 'Shokugeki-No-Souma'),
(7, 'Haikyuu', 'uploads/6-haikyuu.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:42:45', 'Haikyuu'),
(8, 'Blood Lad', 'uploads/7-bl.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:43:32', 'Blood-Lad'),
(9, 'Code Geass', 'uploads/8-cg.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:43:49', 'Code-Geass'),
(10, 'Death Note', 'uploads/9-dn.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:44:01', 'Death-Note'),
(11, 'Jiu Jitsu Wa Watashi Wa', 'uploads/10-jitsu.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-10-25 20:44:47', 'Jiu-Jitsu-Wa-Watashi-Wa');

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
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `username` varchar(255) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `img_src` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`username`, `gallery_id`, `img_src`, `status`) VALUES
('dexter123123', 1, 'uploads/default.png', 1),
('admin123', 2, 'uploads/default.png', 1);

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
(31, 'dexter123123', '$2y$10$InoL/W2xeK6aMKNi7cMPuOKj1rvjo.Hi/rC20/KgWplyohakt0uQC', 'dexter123123@c.c', 'Client', '2016-10-25 22:31:15'),
(32, 'admin123', '$2y$10$fOuSgOUFuZm1BAF2.nESMenA3LYskfhyj8m2X20GT7VeWN/beDaIG', 'admin123@c.c', 'Admin', '2016-10-25 22:36:08');

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
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

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
  MODIFY `anime_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `anime_video`
--
ALTER TABLE `anime_video`
  MODIFY `episode_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_per_episode`
--
ALTER TABLE `comment_per_episode`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
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
