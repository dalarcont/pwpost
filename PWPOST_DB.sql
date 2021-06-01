-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2021 at 10:54 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwpostdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry_versioncontrol`
--

CREATE TABLE `entry_versioncontrol` (
  `commit_id` varchar(16) COLLATE utf8_spanish_ci NOT NULL COMMENT 'VersionControlCommitId',
  `uid_post` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'PostUniqueID',
  `edit_version` int(1) NOT NULL COMMENT 'EditionRecord',
  `own_user` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'OwnerID',
  `pubdate` datetime NOT NULL COMMENT 'PublishDate',
  `title` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'TitleEntrie',
  `content` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'ContentEntrie',
  `attached_prop` tinyint(1) NOT NULL COMMENT 'isRepost?',
  `attached_uid_post` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'PostUIDSource',
  `hiddenprop` tinyint(1) NOT NULL COMMENT 'isHidden?',
  `attached_tw_sourcelink` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'TwitterSource'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Contents all of entries published by all users';

--
-- Dumping data for table `entry_versioncontrol`
--

INSERT INTO `entry_versioncontrol` (`commit_id`, `uid_post`, `edit_version`, `own_user`, `pubdate`, `title`, `content`, `attached_prop`, `attached_uid_post`, `hiddenprop`, `attached_tw_sourcelink`) VALUES
('PWP8T02ESQAYzrW0', 'PWP8T02ESQAYzrW', 0, 'dalarcont', '2021-05-31 16:30:39', 'Prube post con edicion', 'CONTENIDO PRIMARIO', 0, '', 0, ''),
('PWP8T02ESQAYzrW1', 'PWP8T02ESQAYzrW', 1, 'dalarcont', '2021-05-31 16:30:45', 'Prube post con edicion', 'CONTENIDO SECUNDARIO', 0, '', 0, ''),
('PWPg95n1NYWRq4B0', 'PWPg95n1NYWRq4B', 0, 'dalarcont', '2021-06-01 13:28:03', 'Repost a mi seguidor', 'Repost del primer post de mi seguidor Alan Brito', 1, 'PWPSbliqVH0GOj2', 0, ''),
('PWPImW0JTOcAVUL0', 'PWPImW0JTOcAVUL', 0, 'dalarcont', '2021-05-31 16:29:25', 'Prueba simple', 'Publicando un post simple', 0, '', 0, ''),
('PWPiUW8MTlOPRZX0', 'PWPiUW8MTlOPRZX', 0, 'dalarcont', '2021-05-31 16:32:06', 'Prueba de privacidad', 'Este post lo verá el autor pero no la persona que le haga repost', 0, '', 0, ''),
('PWPKs9AxuX7tNBZ0', 'PWPKs9AxuX7tNBZ', 0, 'dalarcont', '2021-05-31 16:32:29', 'Prueba de repost', 'Haciendo repost al primer post de prueba', 1, 'PWPImW0JTOcAVUL', 0, ''),
('PWPOi8n9olkD5ye0', 'PWPOi8n9olkD5ye', 0, 'alanbrito', '2021-05-31 16:57:44', 'Repost a un seguido', 'Estoy haciendo repost a un seguido.', 1, 'PWP8T02ESQAYzrW', 0, ''),
('PWPSbliqVH0GOj20', 'PWPSbliqVH0GOj2', 0, 'alanbrito', '2021-05-31 16:51:33', 'PRIMERA ENTRADA ALAN BRITO', 'Alan brito publica esta entrada', 0, '', 0, ''),
('PWPZ9CsDJWGweB20', 'PWPZ9CsDJWGweB2', 0, 'dalarcont', '2021-05-31 16:30:21', 'Prueba de contenido html incrustado', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/9OUurVdRGsc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `record` int(11) NOT NULL,
  `uid_user` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `username` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `uid_followed` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `username_followed` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `follow_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`record`, `uid_user`, `username`, `uid_followed`, `username_followed`, `follow_date`) VALUES
(23, 'PWP6uWZvXd8LJPg', 'dalarcont', 'PWP6uWZvXd8LJPg', 'dalarcont', '2021-05-31 16:16:56'),
(24, 'PWP6LT5rvhZN1Qd', 'alanbrito', 'PWP6LT5rvhZN1Qd', 'alanbrito', '2021-05-31 16:17:58'),
(25, 'PWP6LT5rvhZN1Qd', 'alanbrito', 'PWP6uWZvXd8LJPg', 'dalarcont', '2021-05-31 16:56:25'),
(26, 'PWP6uWZvXd8LJPg', 'dalarcont', 'PWP6LT5rvhZN1Qd', 'alanbrito', '2021-05-31 16:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `general_entries`
--

CREATE TABLE `general_entries` (
  `uid_post` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'PostUniqueID',
  `own_user` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'OwnerID',
  `pubdate_original` datetime NOT NULL,
  `pubdate` datetime NOT NULL COMMENT 'PublishDate',
  `title` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'TitleEntrie',
  `content` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'ContentEntrie',
  `edit_counter` int(2) DEFAULT NULL,
  `edit_lastdate` datetime DEFAULT NULL,
  `attached_prop` tinyint(1) NOT NULL COMMENT 'isRepost?',
  `attached_uid_post` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'PostUIDSource',
  `hiddenprop` tinyint(1) NOT NULL COMMENT 'isHidden?',
  `attached_tw_sourcelink` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'TwitterSource'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Contents all of entries published by all users';

--
-- Dumping data for table `general_entries`
--

INSERT INTO `general_entries` (`uid_post`, `own_user`, `pubdate_original`, `pubdate`, `title`, `content`, `edit_counter`, `edit_lastdate`, `attached_prop`, `attached_uid_post`, `hiddenprop`, `attached_tw_sourcelink`) VALUES
('PWP8T02ESQAYzrW', 'dalarcont', '2021-05-31 16:30:39', '2021-05-31 16:30:45', 'Prube post con edicion', 'CONTENIDO SECUNDARIO', 1, '2021-05-31 16:30:39', 0, '', 0, ''),
('PWPg95n1NYWRq4B', 'dalarcont', '2021-06-01 13:28:03', '2021-06-01 13:28:03', 'Repost a mi seguidor', 'Repost del primer post de mi seguidor Alan Brito', 0, NULL, 1, 'PWPSbliqVH0GOj2', 0, ''),
('PWPImW0JTOcAVUL', 'dalarcont', '2021-05-31 16:29:25', '2021-05-31 16:29:25', 'Prueba simple', 'Publicando un post simple', 0, NULL, 0, '', 0, ''),
('PWPiUW8MTlOPRZX', 'dalarcont', '2021-05-31 16:32:06', '2021-05-31 16:32:06', 'Prueba de privacidad', 'Este post lo verá el autor pero no la persona que le haga repost', 0, NULL, 0, '', 1, ''),
('PWPKs9AxuX7tNBZ', 'dalarcont', '2021-05-31 16:32:28', '2021-05-31 16:32:28', 'Prueba de repost', 'Haciendo repost al primer post de prueba', 0, NULL, 1, 'PWPImW0JTOcAVUL', 0, ''),
('PWPOi8n9olkD5ye', 'alanbrito', '2021-05-31 16:57:44', '2021-05-31 16:57:44', 'Repost a un seguido', 'Estoy haciendo repost a un seguido.', 0, NULL, 1, 'PWP8T02ESQAYzrW', 0, ''),
('PWPSbliqVH0GOj2', 'alanbrito', '2021-05-31 16:51:33', '2021-05-31 16:51:33', 'PRIMERA ENTRADA ALAN BRITO', 'Alan brito publica esta entrada', 0, NULL, 0, '', 0, ''),
('PWPZ9CsDJWGweB2', 'dalarcont', '2021-05-31 16:30:21', '2021-05-31 16:30:21', 'Prueba de contenido html incrustado', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/9OUurVdRGsc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, NULL, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `likedpost`
--

CREATE TABLE `likedpost` (
  `username` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `likedpost_id` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `likedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `likedpost`
--

INSERT INTO `likedpost` (`username`, `likedpost_id`, `likedate`) VALUES
('dalarcont', 'PWPg95n1NYWRq4B', '2021-06-01 17:45:16'),
('dalarcont', 'PWPZ9CsDJWGweB2', '2021-06-01 17:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid_user` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'UniqueID',
  `username` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Username',
  `user_fullname` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Fullname',
  `user_email` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Email',
  `user_pswd` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Password',
  `joindate` date NOT NULL COMMENT 'JoinDate',
  `first_access` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recovery_key` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Contents all of client users profiles';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid_user`, `username`, `user_fullname`, `user_email`, `user_pswd`, `joindate`, `first_access`, `recovery_key`) VALUES
('PWP6LT5rvhZN1Qd', 'alanbrito', 'Alan Brito', 'danielalarckon@gmail.com', 'alanbrito', '2021-05-31', '', NULL),
('PWP6uWZvXd8LJPg', 'dalarcont', 'Daniel Alarcón Tabares', 'daniel.alarcon@utp.edu.co', 'D4larcont', '2021-05-31', '', NULL),
('PWPabcdefghijkl', 'system', 'Sistema Administrador', 'system@pwpost.com', 'system', '0000-00-00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry_versioncontrol`
--
ALTER TABLE `entry_versioncontrol`
  ADD UNIQUE KEY `commit_id` (`commit_id`),
  ADD KEY `own_user` (`own_user`),
  ADD KEY `uid_post` (`uid_post`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`record`),
  ADD UNIQUE KEY `record_UNIQUE` (`record`),
  ADD KEY `username` (`username`),
  ADD KEY `username_followed` (`username_followed`);

--
-- Indexes for table `general_entries`
--
ALTER TABLE `general_entries`
  ADD UNIQUE KEY `uid_post` (`uid_post`),
  ADD KEY `own_user` (`own_user`);

--
-- Indexes for table `likedpost`
--
ALTER TABLE `likedpost`
  ADD KEY `username` (`username`),
  ADD KEY `likedpost_id` (`likedpost_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry_versioncontrol`
--
ALTER TABLE `entry_versioncontrol`
  ADD CONSTRAINT `entry_versioncontrol_ibfk_1` FOREIGN KEY (`own_user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entry_versioncontrol_ibfk_2` FOREIGN KEY (`uid_post`) REFERENCES `general_entries` (`uid_post`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`username_followed`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general_entries`
--
ALTER TABLE `general_entries`
  ADD CONSTRAINT `general_entries_ibfk_1` FOREIGN KEY (`own_user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likedpost`
--
ALTER TABLE `likedpost`
  ADD CONSTRAINT `likedpost_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likedpost_ibfk_2` FOREIGN KEY (`likedpost_id`) REFERENCES `general_entries` (`uid_post`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
