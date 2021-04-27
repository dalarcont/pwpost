-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2021 at 09:50 PM
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
('PWP6bFknaIEmZ830', 'PWP6bFknaIEmZ83', 0, 'dalarcont', '2021-04-26 23:55:27', 'UPOKANTA', 'UPOLKANTA', 0, '', 0, ''),
('PWP6JWhBq124Moa0', 'PWP6JWhBq124Moa', 0, 'dalarcont', '2021-04-27 16:29:15', 'PRIMER REPOST HDSPM', 'COMENTARIO SOBRE EL POST RAIZ', 1, 'PWPQrkofxO8HtFv', 0, ''),
('PWP7WV8vSLmru0F0', 'PWP7WV8vSLmru0F', 0, 'dalarcont', '2021-04-27 16:27:16', 'PRIMER REPOST HDSPM!', 'MERA MIERDA!', 1, 'PWPQrkofxO8HtFv', 0, ''),
('PWPdc6YboGjwRQl0', 'PWPdc6YboGjwRQl', 0, 'dalarcont', '2021-04-27 16:32:48', 'PRIMER REPOST HDSPM', 'Maldito Uribe', 1, 'PWPQrkofxO8HtFv', 0, ''),
('PWPeuIKi6Pwx1oL0', 'PWPeuIKi6Pwx1oL', 0, 'dalarcont', '2021-04-27 16:48:24', 'Prueba DONTRELOAD::after[newPost] ', 'Probando si esta entrada se publica al top del frontEnd sin necesidad de recargar o dejar en blanco el frontEnd', 0, '', 0, ''),
('PWPfhWip6ISGYTP0', 'PWPfhWip6ISGYTP', 0, 'dalarcont', '2021-04-26 22:51:00', 'PRIMER POST DALARCONT', 'CONTENIDO PRIMARIO DALARCONT', 0, '', 0, ''),
('PWPfhWip6ISGYTP1', 'PWPfhWip6ISGYTP', 1, 'dalarcont', '2021-04-26 22:51:36', 'PRIMER POST DALARCONT EDITADO', 'CONTENIDO PRIMARIO DALARCONT EDITADO', 0, '', 0, ''),
('PWPfhWip6ISGYTP2', 'PWPfhWip6ISGYTP', 2, 'dalarcont', '2021-04-26 22:57:57', 'PRIMER POST DALARCONT EDITADO 2DA', 'CONTENIDO PRIMARIO DALARCONT EDITADO POR SEGUNDA VEZ', 0, '', 0, ''),
('PWPfhWip6ISGYTP3', 'PWPfhWip6ISGYTP', 3, 'dalarcont', '2021-04-27 11:41:26', 'PRIMER POST DALARCONT EDITADO 2DA', 'CONTENIDO PRIMARIO DALARCONT EDITADO POR TERCERA VEZ', 0, '', 0, ''),
('PWPi1YsBxJbkw7V0', 'PWPi1YsBxJbkw7V', 0, 'dalarcont', '2021-04-27 16:33:50', 'No se expresa...', 'Nadie sabe lo que dice ahí, salvo quien lo escribió.', 1, 'PWP6bFknaIEmZ83', 0, ''),
('PWPnw7prLdGzbcP0', 'PWPnw7prLdGzbcP', 0, 'dalarcont', '2021-04-27 16:46:35', 'Prueba DONTRELOAD::after[newPost]', 'Probando si esta entrada se publica al top del frontEnd sin necesidad de recargar o dejar en blanco el frontEnd', 0, '', 0, ''),
('PWPpw1PCtl8oSTY0', 'PWPpw1PCtl8oSTY', 0, 'dalarcont', '2021-04-27 16:42:52', 'Fin del CRUD', 'Hemos finalizado el CRUD!!!!!!<br />\nAbril 27 de 2021 a las 4:42pm', 0, '', 0, ''),
('PWPQrkofxO8HtFv0', 'PWPQrkofxO8HtFv', 0, 'system', '2021-04-26 23:36:32', 'PRIMERA ENTRADA DEL SISTEMA', 'PRIMERA PRIMERA', 0, '', 0, ''),
('PWPRnTPDf92mgrs0', 'PWPRnTPDf92mgrs', 0, 'dalarcont', '2021-04-27 16:21:18', 'Prueba de Repost', 'Contenido de repost (o sea el comentario) xd xd xd', 1, 'PWPQrkofxO8HtFv', 0, ''),
('PWPvRcxJQWhBPOC0', 'PWPvRcxJQWhBPOC', 0, 'dalarcont', '2021-04-27 16:35:59', 'REPOST DE UN REPOST', 'Veremos que al hacer repost a un post que es un repost, nos mostrará que el repost que hicimos es del comentario hecho al repost raíz. RepostInception().', 1, 'PWPdc6YboGjwRQl', 0, ''),
('PWPvRcxJQWhBPOC1', 'PWPvRcxJQWhBPOC', 1, 'dalarcont', '2021-04-27 16:36:55', 'EDITANDO REPOST DE UN REPOST', 'Veremos que al hacer repost a un post que es un repost, nos mostrará que el repost que hicimos es del comentario hecho al repost raíz. RepostInception().<br /><br />\nEsto fue editado. Omg...', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `record` int(11) NOT NULL,
  `uid_user` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `username` tinytext COLLATE utf8_spanish_ci,
  `uid_followed` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `username_followed` tinytext COLLATE utf8_spanish_ci,
  `follow_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`record`, `uid_user`, `username`, `uid_followed`, `username_followed`, `follow_date`) VALUES
(18, 'PWP1beVwLy', 'dalarcont', 'PWP1beVwLy', 'dalarcont', '2021-04-14 15:40:15'),
(19, 'PWPYpxBI1bO8gsX', 'system', 'PWPYpxBI1bO8gsX', 'system', '2021-04-14 15:43:30'),
(20, 'PWPYpxBI1bO8gsX', 'system', 'PWP1beVwLy', 'dalarcont', '2021-04-14 15:44:15'),
(21, 'PWP1beVwLy', 'dalarcont', 'PWPYpxBI1bO8gsX', 'system', '2021-04-14 15:45:11');

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
('PWP6bFknaIEmZ83', 'dalarcont', '2021-04-26 23:55:27', '2021-04-26 23:55:27', 'UPOKANTA', 'UPOLKANTA', 0, NULL, 0, '', 0, ''),
('PWPdc6YboGjwRQl', 'dalarcont', '2021-04-27 16:32:48', '2021-04-27 16:32:48', 'PRIMER REPOST HDSPM', 'Maldito Uribe', 0, NULL, 1, 'PWPQrkofxO8HtFv', 0, ''),
('PWPeuIKi6Pwx1oL', 'dalarcont', '2021-04-27 16:48:24', '2021-04-27 16:48:24', 'Prueba DONTRELOAD::after[newPost] ', 'Probando si esta entrada se publica al top del frontEnd sin necesidad de recargar o dejar en blanco el frontEnd', 0, NULL, 0, '', 0, ''),
('PWPfhWip6ISGYTP', 'dalarcont', '2021-04-26 22:51:00', '2021-04-27 11:41:26', 'PRIMER POST DALARCONT EDITADO 2DA', 'CONTENIDO PRIMARIO DALARCONT EDITADO POR TERCERA VEZ', 3, '2021-04-26 22:57:57', 1, 'PWP6bFknaIEmZ83', 0, ''),
('PWPi1YsBxJbkw7V', 'dalarcont', '2021-04-27 16:33:50', '2021-04-27 16:33:50', 'No se expresa...', 'Nadie sabe lo que dice ahí, salvo quien lo escribió.', 0, NULL, 1, 'PWP6bFknaIEmZ83', 0, ''),
('PWPpw1PCtl8oSTY', 'dalarcont', '2021-04-27 16:42:52', '2021-04-27 16:42:52', 'Fin del CRUD', 'Hemos finalizado el CRUD!!!!!!<br />\nAbril 27 de 2021 a las 4:42pm', 0, NULL, 0, '', 0, ''),
('PWPQrkofxO8HtFv', 'system', '2021-04-26 23:36:32', '2021-04-26 23:36:32', 'PRIMERA ENTRADA DEL SISTEMA', 'PRIMERA PRIMERA', 0, NULL, 0, '', 0, ''),
('PWPvRcxJQWhBPOC', 'dalarcont', '2021-04-27 16:35:59', '2021-04-27 16:36:55', 'EDITANDO REPOST DE UN REPOST', 'Veremos que al hacer repost a un post que es un repost, nos mostrará que el repost que hicimos es del comentario hecho al repost raíz. RepostInception().<br />\nEsto fue editado. Omg...', 1, '2021-04-27 16:35:59', 1, 'PWPdc6YboGjwRQl', 0, '');

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
  `recovery_key` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `following` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Contents all of client users profiles';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid_user`, `username`, `user_fullname`, `user_email`, `user_pswd`, `joindate`, `first_access`, `recovery_key`, `following`) VALUES
('PWP1beVwLy', 'dalarcont', 'Daniel Alarcón Tabares', 'daniel.alarcon@utp.edu.co', 'D4larcont', '2021-04-14', '', NULL, 'null'),
('PWPYpxBI1bO8gsX', 'system', 'SISTEMA', 'registro@pwpost.com', 'sistema', '2021-04-14', '', NULL, 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry_versioncontrol`
--
ALTER TABLE `entry_versioncontrol`
  ADD UNIQUE KEY `commit_id` (`commit_id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`record`),
  ADD UNIQUE KEY `record_UNIQUE` (`record`);

--
-- Indexes for table `general_entries`
--
ALTER TABLE `general_entries`
  ADD UNIQUE KEY `uid_post` (`uid_post`);

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
  MODIFY `record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
