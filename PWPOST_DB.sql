-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-04-2021 a las 21:21:36
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
  `pubdate_original` datetime NOT NULL,
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

INSERT INTO `general_entries` (`uuid_post`, `own_user`, `pubdate_original`, `pubdate`, `title`, `content`, `edit_counter`, `edit_lastdate`, `attached_prop`, `attached_uuid_post`, `attached_comment`, `hiddenprop`, `attached_tw_sourcelink`) VALUES
('PWPBIzoSCT6NspF', 'dalarcont', '2021-04-23 15:07:15', '2021-04-23 16:09:06', 'Lorem Ipsum', '<br />\n<br />\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare diam leo. Fusce mauris elit, rhoncus at nibh in, iaculis semper risus. Maecenas maximus arcu arcu. Nam ac laoreet dolor, fringilla sollicitudin elit. Ut sed enim ut risus lobortis venenatis sed non lorem. Phasellus a augue hendrerit, imperdiet est id, dapibus erat. Ut ullamcorper turpis ultricies lectus molestie bibendum. Nulla ac quam sit amet diam venenatis egestas. Curabitur tincidunt nisi eu erat iaculis pharetra. Duis sapien arcu, aliquam quis nisi vel, accumsan euismod sapien. Integer varius, ante non mollis condimentum, turpis metus hendrerit dui, nec sodales leo purus vitae enim. Proin eu congue nunc, vitae euismod turpis. Duis ut quam nec arcu ullamcorper finibus sed in nisi. Donec venenatis, lacus ut consectetur maximus, sapien elit bibendum leo, ac commodo lacus ipsum a tortor. Maecenas ac augue vel lorem tempor interdum id eget nisi. Nullam nunc nisl, aliquet non imperdiet a, imperdiet id tortor.<br />\n<br />\nAenean id commodo mi. Praesent enim felis, efficitur aliquet justo nec, imperdiet fermentum mi. Curabitur sit amet finibus massa. Nullam dolor nibh, maximus a dolor vel, convallis dapibus nunc. Morbi dui arcu, fringilla eget nulla sagittis, rutrum maximus leo. Vivamus vel mauris in est feugiat mollis. Maecenas auctor ante eget suscipit dapibus. Aliquam mollis felis neque, suscipit elementum magna ullamcorper nec. Integer porttitor quis nisl at viverra. Praesent gravida dapibus justo, convallis ullamcorper ex mollis sit amet. Cras non massa ante. Mauris sollicitudin finibus tortor at laoreet. Aliquam aliquam mauris turpis, vel pretium leo fermentum sed. Donec posuere neque lectus, id scelerisque mi faucibus vitae. Quisque sit amet purus erat. Curabitur scelerisque mollis tellus, vel eleifend lacus condimentum at.<br />\n<br />\nUt nec blandit lacus. Donec rhoncus orci eu tortor bibendum, id ultrices sem venenatis. Sed auctor tempus justo dictum gravida. Curabitur molestie pretium neque, at imperdiet tellus tempus sagittis. Integer commodo metus sed nisi sodales, lobortis iaculis felis dictum. Sed ultricies risus ante, quis accumsan ante malesuada sit amet. Pellentesque ex dolor, pellentesque sed tortor in, rhoncus molestie felis. Curabitur et tincidunt dui, dignissim tempus ipsum. Mauris tincidunt interdum pretium. Phasellus eu pellentesque eros. Mauris mattis fermentum tincidunt. Duis tincidunt tempor imperdiet. Phasellus vulputate ullamcorper feugiat. Suspendisse erat mi, egestas in accumsan vitae, aliquet sit amet risus. In eu suscipit tellus, et sollicitudin risus. Nam ultrices eget dolor vel dictum.<br />\n<br />\nNulla laoreet, magna ac varius ullamcorper, metus velit semper tortor, ut gravida nulla velit nec nulla. Donec vestibulum consequat nulla vel feugiat. In auctor rhoncus nibh vel bibendum. Quisque mattis ac tortor id suscipit. Fusce dolor est, dignissim eget fermentum eu, ornare quis nunc. Ut mi dolor, semper ut purus facilisis, dictum ultrices nibh. Praesent fermentum erat ac feugiat malesuada. Duis tincidunt scelerisque varius. Etiam ut felis aliquam, varius felis et, tristique eros. Fusce at vestibulum enim. Nullam suscipit arcu vitae ornare rutrum. Suspendisse consectetur consectetur hendrerit. Donec feugiat fermentum ligula at vulputate. Sed vestibulum leo lorem, a luctus lectus fermentum sed. Vivamus posuere nisi eu sapien pharetra, ac egestas ex finibus.<br />\n<br />\nNulla commodo lacinia velit, vitae ornare lorem congue eu. Sed eu mauris sit amet risus imperdiet faucibus. Nunc rutrum molestie rutrum. Nulla facilisi. Quisque in congue felis. Donec efficitur velit turpis, et maximus purus malesuada vel. Aliquam condimentum ipsum vitae enim pellentesque, ut laoreet metus interdum. Donec nec tortor libero. Cras nisi velit, tincidunt sed purus eu, sagittis pellentesque justo. ', 2, '2021-04-23 15:13:34', 0, '', '', 1, ''),
('PWPCnMQg81ey7oD', 'dalarcont', '2021-04-16 16:04:14', '2021-04-16 16:04:14', 'Facultad Profesional: Nuevo Programa Anulado', 'La Facultad Profesional presenta su nuevo programa académico \"Ingeniería Depresiva\", invita a los interesados a consultar su contenido y generar interés para apuntarse a dicho programa en las próximas inscripciones.<br />\nsdgsdfhsdhsd<br />\nIngeniería Depresiva - 867377<br />\n7 Semestres<br />\nIngeniero(a) Depresivo<br />\nNivel Profesional Simple Titulación<br />\nNIE377', 0, NULL, 0, '', '', 0, ''),
('PWPFClBuZy0zaYT', 'dalarcont', '2021-04-15 15:33:21', '2021-04-15 15:33:21', 'TITULACION DOBLE EN CURSO', 'La Facultad Profesional de la mano de la Presidencia está desarrollando los planes necesarios para que en cuanto la medida entre, los estudiantes antiguos y nuevos podrán graduarse no solo con el título de la Unimísera sino también de la Universidad Deformática de México. <br />\n<br />\n*SOLO PARA PROGRAMAS DE LA FACULTAD PROFESIONAL QUE ENTREN EN EL ACUERDO, ESTUDIANTES EGRESADOS NO PODRÁN SOLICITAR ACREDITACIÓN PARA CONVALIDAR SEGUNDO TÍTULO*', 0, NULL, 0, '', '', 0, ''),
('PWPGv6cAHS09xko', 'dalarcont', '2021-04-15 15:33:38', '2021-04-15 15:33:38', 'Facultad Tecnologías: Nuevo Programa Académico', 'La Facultad Tecnologías presenta su nuevo programa académico \"Tecnología en Gestión de la Cultura Diversamente Sexual\", invita a los interesados a consultar su contenido y generar interés para apuntarse a dicho programa en las próximas inscripciones. <br />\nTecnología en Gestión de la Cultura Diversamente Sexual - 8684337<br />\n5 Semestres<br />\nTecnólogo(a) en Gestión de la Cultura Diversamente Sexual<br />\nNivel Tecnológico Profesional<br />\nNIE4337', 0, NULL, 0, '', '', 0, '');

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
