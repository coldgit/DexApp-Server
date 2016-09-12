-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2016 at 09:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

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
  `summary` text,
  `date_time` text,
  `ani_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `anime_per_episode`
--
CREATE TABLE `anime_per_episode` (
`anime_id` int(100)
,`ani_title` text
,`summary` text
,`date_time` text
,`episode_id` int(100)
,`epi_src` text
,`epi_date` text
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
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `bookmark_id` int(100) NOT NULL,
  `bookmark_url` text,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `comments_per_epi`
--
CREATE TABLE `comments_per_epi` (
`username` text
,`epi_src` text
,`comment` text
,`date_time` text
);

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
(1, 'asdasdasd', '$2y$10$jb/0e5PjakaoLNVWpVUVHujTJ89oeTZl7ll3d5cNvBKQg4CkI8Yr.', 'asd@asd.com', 'Client', '2016-09-11 00:00:00'),
(2, 'admindex', '$2y$10$69Niu/bp686liCrCT3QBaOqsfO7e/neCbBLqLDq9qe0FkKHIv6iWq', 'coldshots143@gmail.com', 'Admin', '2016-09-11 00:00:00'),
(3, 'dexter123', '$2y$10$Wp3g/LU7EYiCSlknlFblSOH5vpRKkccd/LUF60Ro9.IZSeOnXfxuy', 'dexter@gmail.com', 'Client', '2016-09-11 22:19:56'),
(4, 'asdasdasdasd', '$2y$10$cp6wuR7ajMSQfAHJ5mzDh.l0IOhvVqP3Ne7zbICAIWbLrG3MuINS.', 'asdasdasdasd@m.com', 'Client', '2016-09-11 22:21:55'),
(5, 'saddddddddddddddddddddddddd', '$2y$10$9HSkPwJPX.gcCa41gCGF.ejOnXsWh7woxsohueHtovGtVQ/2jXv1C', 'saddddddddddddddddddddddddd@d.d', 'Client', '2016-09-11 22:29:49'),
(6, 'dhaskjdhaskjdhk', '$2y$10$SYNdeZn7Mc/mOgyXrR.aleu1ED2eStlslo1EK2aUN9U.nzTqHuFDG', 'dhaskjdhaskjdhk@gamil.com', 'Client', '2016-09-11 22:39:24'),
(7, 'qwertyuiopp', '$2y$10$bPgRaoGMlo9nDl9Vcc.rh.uth7.qJ9lbKCuDa4K2Wt7/Kj06NO7FS', 'qwertyuiopp@gmail.com', 'Client', '2016-09-11 22:49:08'),
(8, 'asdasdasdas', '$2y$10$qTu2b2M/DiiLbQxx2Ygc5eU9eRUP5Z2Lxq3o4qACrg/EeBMd3VtIy', 'asdasdasdas@c.c', 'Client', '2016-09-12 16:02:03'),
(9, 'hdkjashdkajsdhaskjdhaskj', '$2y$10$4brjXSwogf1VgFGu0/bOYeGxXhh5lFj.Eqw3Nx/g6oNpcL6AynZP.', 'hdkjashdkajsdhaskjdhaskj@c.c', 'Client', '2016-09-12 16:02:36'),
(10, 'agdhasgdja', '$2y$10$O9EhI5wIRPRmJHFnocqgZ.xlb0vEGSOovlZHabIAQilRziaLWGVfe', 'agdhasgdja@c.c', 'Client', '2016-09-12 16:03:30'),
(11, 'asgdjhasdgjh', '$2y$10$wZU995V3YbJs8Hb9/Vn2N.hfzGkJKpBB29ZLnIgEBiU6JX7UsK1ZS', 'asgdjhasdgjh@c.c', 'Client', '2016-09-12 16:03:42');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_bookmarks`
--
CREATE TABLE `users_bookmarks` (
`username` text
,`bookmark_id` int(100)
,`bookmark_url` text
);

-- --------------------------------------------------------

--
-- Structure for view `anime_per_episode`
--
DROP TABLE IF EXISTS `anime_per_episode`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `anime_per_episode`  AS  select `anime`.`anime_id` AS `anime_id`,`anime`.`ani_title` AS `ani_title`,`anime`.`summary` AS `summary`,`anime`.`date_time` AS `date_time`,`anime_video`.`episode_id` AS `episode_id`,`anime_video`.`epi_src` AS `epi_src`,`anime_video`.`date_time` AS `epi_date`,`anime_video`.`episode` AS `episode` from (`anime` join `anime_video`) where (`anime`.`anime_id` = `anime_video`.`anime_id`) order by `anime`.`ani_title` ;

-- --------------------------------------------------------

--
-- Structure for view `comments_per_epi`
--
DROP TABLE IF EXISTS `comments_per_epi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comments_per_epi`  AS  select `userinfo`.`username` AS `username`,`anime_video`.`epi_src` AS `epi_src`,`comment_per_episode`.`comment` AS `comment`,`comment_per_episode`.`date_time` AS `date_time` from (((`anime` join `anime_video`) join `userinfo`) join `comment_per_episode`) where ((`comment_per_episode`.`user_id` = `userinfo`.`user_id`) and (`comment_per_episode`.`epi_id` = `anime_video`.`episode_id`) and (`anime`.`anime_id` = `anime_video`.`anime_id`)) order by `comment_per_episode`.`date_time` desc ;

-- --------------------------------------------------------

--
-- Structure for view `users_bookmarks`
--
DROP TABLE IF EXISTS `users_bookmarks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_bookmarks`  AS  select `userinfo`.`username` AS `username`,`bookmarks`.`bookmark_id` AS `bookmark_id`,`bookmarks`.`bookmark_url` AS `bookmark_url` from (`userinfo` join `bookmarks`) where (`userinfo`.`user_id` = `bookmarks`.`user_id`) ;

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
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `anime_id` int(100) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
