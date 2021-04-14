-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-04-2021 a las 23:09:31
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pwpostdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `following`
--

CREATE TABLE `following` (
  `record` int(11) NOT NULL,
  `uuid_user` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `username` tinytext COLLATE utf8_spanish_ci,
  `uuid_followed` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `username_followed` tinytext COLLATE utf8_spanish_ci,
  `follow_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `following`
--

INSERT INTO `following` (`record`, `uuid_user`, `username`, `uuid_followed`, `username_followed`, `follow_date`) VALUES
(18, 'PWP1beVwLy', 'dalarcont', 'PWP1beVwLy', 'dalarcont', '2021-04-14 15:40:15'),
(19, 'PWPYpxBI1bO8gsX', 'system', 'PWPYpxBI1bO8gsX', 'system', '2021-04-14 15:43:30'),
(20, 'PWPYpxBI1bO8gsX', 'system', 'PWP1beVwLy', 'dalarcont', '2021-04-14 15:44:15'),
(21, 'PWP1beVwLy', 'dalarcont', 'PWPYpxBI1bO8gsX', 'system', '2021-04-14 15:45:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_entries`
--

CREATE TABLE `general_entries` (
  `uuid_post` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'PostUniqueID',
  `own_user` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'OwnerID',
  `pubdate` datetime NOT NULL COMMENT 'PublishDate',
  `title` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'TitleEntrie',
  `content` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'ContentEntrie',
  `edit_counter` int(2) DEFAULT NULL,
  `edit_lastdate` datetime DEFAULT NULL,
  `attached_prop` tinyint(1) NOT NULL COMMENT 'isRepost?',
  `attached_uuid_post` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'PostUIDSource',
  `attached_comment` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'AttachedComment',
  `hiddenprop` tinyint(1) NOT NULL COMMENT 'isHidden?',
  `attached_tw_sourcelink` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'TwitterSource'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Contents all of entries published by all users';

--
-- Volcado de datos para la tabla `general_entries`
--

INSERT INTO `general_entries` (`uuid_post`, `own_user`, `pubdate`, `title`, `content`, `edit_counter`, `edit_lastdate`, `attached_prop`, `attached_uuid_post`, `attached_comment`, `hiddenprop`, `attached_tw_sourcelink`) VALUES
('petro', 'dalarcont', '2021-04-14 15:50:53', 'PRUEBA 3', 'CONTENIDO 3 LINEA DOBLE<br /> <br /> CONTENIDO 3 LINEA DOBLE<br /> CON REPOST', NULL, NULL, 1, 'simple', '', 0, ''),
('triple', 'upok', '2021-04-14 15:50:53', 'PRUEBA 3', 'CONTENIDO 3 LINEA DOBLE<br /> <br /> CONTENIDO 3 LINEA DOBLE<br /> CON REPOST', NULL, NULL, 1, 'simple', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `uuid_user` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'UniqueID',
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`uuid_user`, `username`, `user_fullname`, `user_email`, `user_pswd`, `joindate`, `first_access`, `recovery_key`, `following`) VALUES
('PWP1beVwLy', 'dalarcont', 'Daniel Alarcón Tabares', 'daniel.alarcon@utp.edu.co', 'D4larcont', '2021-04-14', '', NULL, 'null'),
('PWPYpxBI1bO8gsX', 'system', 'SISTEMA', 'registro@pwpost.com', 'sistema', '2021-04-14', '', NULL, 'null');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`record`),
  ADD UNIQUE KEY `record_UNIQUE` (`record`);

--
-- Indices de la tabla `general_entries`
--
ALTER TABLE `general_entries`
  ADD UNIQUE KEY `uuid_post_UNIQUE` (`uuid_post`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `following`
--
ALTER TABLE `following`
  MODIFY `record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
