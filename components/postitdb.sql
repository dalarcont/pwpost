-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-03-2021 a las 00:40:07
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `postitdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_entries`
--

CREATE TABLE `general_entries` (
  `uuid_post` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'PostUniqueID',
  `own_user` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'OwnerID',
  `pubdate` datetime NOT NULL COMMENT 'PublishDate',
  `title` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'TitleEntrie',
  `content` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'ContentEntrie',
  `attached_prop` tinyint(1) NOT NULL COMMENT 'isRepost?',
  `attached_uuid_post` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'PostUIDSource',
  `attached_comment` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'AttachedComment',
  `hiddenprop` tinyint(1) NOT NULL COMMENT 'isHidden?',
  `attached_tw_sourcelink` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'TwitterSource'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Contents all of entries published by all users';

--
-- Volcado de datos para la tabla `general_entries`
--

INSERT INTO `general_entries` (`uuid_post`, `own_user`, `pubdate`, `title`, `content`, `attached_prop`, `attached_uuid_post`, `attached_comment`, `hiddenprop`, `attached_tw_sourcelink`) VALUES
('5dtjxdfhxryjdut', 'system', '2021-03-03 19:13:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 12', 0, '', '', 0, ''),
('5ywsedrtjdxf', 'system', '2021-03-03 19:03:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 11', 0, '', '', 0, ''),
('APPTEST00002', 'system', '2021-03-03 17:33:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 3', 0, '', '', 1, ''),
('APTTEST000001', 'system', '2021-03-03 17:43:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 2', 0, '', '', 0, ''),
('dfgsd', 'system', '2021-03-03 17:53:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 4', 0, '', '', 0, ''),
('dfgsdfgsdfg', 'system', '2021-03-03 18:03:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 5', 0, '', '', 0, ''),
('fcghjct7eu5', 'system', '2021-03-03 18:53:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 10', 0, '', '', 0, ''),
('fdghje5', 'system', '2021-03-03 17:33:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 15', 0, '', '', 0, ''),
('ISUFH8W974Q98h8', 'system', '2021-03-03 17:33:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema', 0, '', '', 0, ''),
('ISUFH8X084Q98h8', 'dalarcont', '2021-03-01 17:33:00', 'Heart of Glass - Blondie', '<iframe width=\"125\" height=\"150\" src=\"https://www.youtube.com/embed/WGU_4-5RaxU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, '', '', 0, ''),
('ISUFH8X084Q99i8', 'dalarcont2', '2021-03-01 17:33:00', 'Post de prueba numero 2', 'Contenido de prueba numero 2', 0, '', '', 0, ''),
('jfd5rywsertx', 'system', '2021-03-03 18:23:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 7', 0, '', '', 0, ''),
('ndryuety7urt', 'system', '2021-03-03 18:13:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 6', 0, '', '', 0, ''),
('r56w4ers', 'system', '2021-03-03 19:23:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 13', 0, '', '', 1, ''),
('rd6ucftdfg', 'system', '2021-03-03 18:43:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 9', 0, '', '', 0, ''),
('sdgsdhgwegw', 'system', '2021-03-03 18:33:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 8', 0, '', '', 0, ''),
('vbnmvtyue', 'system', '2021-03-03 19:33:00', 'Sistema Administrativo', 'Primer post ejecutado por el sistema 14', 0, '', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pi_users`
--

CREATE TABLE `pi_users` (
  `uuid_user` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'UniqueID',
  `username` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Username',
  `user_fullname` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Fullname',
  `user_email` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Email',
  `user_pswd` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'Password',
  `joindate` date NOT NULL COMMENT 'JoinDate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Contents all of client users profiles';

--
-- Volcado de datos para la tabla `pi_users`
--

INSERT INTO `pi_users` (`uuid_user`, `username`, `user_fullname`, `user_email`, `user_pswd`, `joindate`) VALUES
('65EDU6SY54S453WEI8D78YO8', 'dalarcont', 'Daniel Alarcon Tabares', 'daniel.alarcon@utp.edu.co', 'dalarcont', '2021-03-01'),
('SYSTEM', 'system', 'Sistema', 'system@postit', 'system', '2021-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `general_entries`
--
ALTER TABLE `general_entries`
  ADD PRIMARY KEY (`uuid_post`);

--
-- Indices de la tabla `pi_users`
--
ALTER TABLE `pi_users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
