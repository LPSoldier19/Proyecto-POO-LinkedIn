-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-05-2018 a las 01:25:26
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_linkedin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_amigos`
--

DROP TABLE IF EXISTS `tbl_amigos`;
CREATE TABLE IF NOT EXISTS `tbl_amigos` (
  `codigo_usuario_amigo` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`codigo_usuario_amigo`,`codigo_usuario`),
  KEY `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios2_idx` (`codigo_usuario`),
  KEY `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios1_idx` (`codigo_usuario_amigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_chats`
--

DROP TABLE IF EXISTS `tbl_chats`;
CREATE TABLE IF NOT EXISTS `tbl_chats` (
  `codigo_chat` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`codigo_chat`),
  KEY `fk_tbl_chats_tbl_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios`
--

DROP TABLE IF EXISTS `tbl_comentarios`;
CREATE TABLE IF NOT EXISTS `tbl_comentarios` (
  `codigo_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_publicacion` int(11) NOT NULL,
  `fecha_comentario` varchar(45) DEFAULT NULL,
  `contenido_comentario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_comentario`),
  KEY `fk_tbl_comentarios_tbl_publicaciones1_idx` (`codigo_publicacion`),
  KEY `fk_tbl_comentarios_tbl_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleos`
--

DROP TABLE IF EXISTS `tbl_empleos`;
CREATE TABLE IF NOT EXISTS `tbl_empleos` (
  `codigo_empleo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empleo` varchar(45) DEFAULT NULL,
  `descripcion_empleo` varchar(500) DEFAULT NULL,
  `telefono_empleo` varchar(45) DEFAULT NULL,
  `direccion_empleo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo_empleo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_empleos`
--

INSERT INTO `tbl_empleos` (`codigo_empleo`, `nombre_empleo`, `descripcion_empleo`, `telefono_empleo`, `direccion_empleo`) VALUES
(1, 'BAC Credomatic', 'Se busca cajero principiante, motivado para trabajar, que sea Bachiller en Contaduria Publica y Finanzas', '2336-6565', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleos_guardados`
--

DROP TABLE IF EXISTS `tbl_empleos_guardados`;
CREATE TABLE IF NOT EXISTS `tbl_empleos_guardados` (
  `codigo_empleo_guardado` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`codigo_empleo_guardado`,`codigo_usuario`),
  KEY `fk_tbl_empleos_has_tbl_usuarios_tbl_usuarios1_idx` (`codigo_usuario`),
  KEY `fk_tbl_empleos_has_tbl_usuarios_tbl_empleos1_idx` (`codigo_empleo_guardado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_generos`
--

DROP TABLE IF EXISTS `tbl_generos`;
CREATE TABLE IF NOT EXISTS `tbl_generos` (
  `codigo_genero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_generos`
--

INSERT INTO `tbl_generos` (`codigo_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mensajes`
--

DROP TABLE IF EXISTS `tbl_mensajes`;
CREATE TABLE IF NOT EXISTS `tbl_mensajes` (
  `codigo_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `contenido_mensaje` varchar(45) DEFAULT NULL,
  `fecha_mensaje` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mensajes_amigos`
--

DROP TABLE IF EXISTS `tbl_mensajes_amigos`;
CREATE TABLE IF NOT EXISTS `tbl_mensajes_amigos` (
  `codigo_mensaje_amigo` int(11) NOT NULL,
  `codigo_usuario_amigo` int(11) NOT NULL,
  PRIMARY KEY (`codigo_mensaje_amigo`,`codigo_usuario_amigo`),
  KEY `fk_tbl_mensajes_has_tbl_usuarios_tbl_usuarios1_idx` (`codigo_usuario_amigo`),
  KEY `fk_tbl_mensajes_has_tbl_usuarios_tbl_mensajes1_idx` (`codigo_mensaje_amigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_publicaciones`
--

DROP TABLE IF EXISTS `tbl_publicaciones`;
CREATE TABLE IF NOT EXISTS `tbl_publicaciones` (
  `codigo_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `contenido_publicacion` varchar(45) DEFAULT NULL,
  `numero_likes` varchar(45) DEFAULT NULL,
  `fecha-publicacion` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_publicacion`),
  KEY `fk_tbl_publicaciones_tbl_usuarios_idx` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_genero` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `apellido_usuario` varchar(45) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `url_imagen_perfil` varchar(45) DEFAULT NULL,
  `titular` varchar(45) DEFAULT NULL,
  `educacion` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `sector` varchar(45) DEFAULT NULL,
  `logros` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_usuario`),
  KEY `fk_tbl_usuarios_tbl_generos1_idx` (`codigo_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `codigo_genero`, `nombre_usuario`, `apellido_usuario`, `correo`, `contrasena`, `url_imagen_perfil`, `titular`, `educacion`, `pais`, `sector`, `logros`) VALUES
(1, 1, 'Rafael', 'Bautista', 'rafael.bautista1@hotmail.es', 'bcdcb29ed2aab16d48c11485264df665e906bdd9', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Alejandro', 'Bautista', 'alejandro@gmail.com', '2d09563fb5d7e92c6642519acacbde85e6c76b3c', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 'Sandra', 'Santos', 'sandra@gmail.com', '5449a21db45725d6ccf8f3008202876fe680db02', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'Walter', 'Bautista', 'walter@gmail.com', 'bcdcb29ed2aab16d48c11485264df665e906bdd9', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_amigos`
--
ALTER TABLE `tbl_amigos`
  ADD CONSTRAINT `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario_amigo`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_usuarios_has_tbl_usuarios_tbl_usuarios2` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_chats`
--
ALTER TABLE `tbl_chats`
  ADD CONSTRAINT `fk_tbl_chats_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD CONSTRAINT `fk_tbl_comentarios_tbl_publicaciones1` FOREIGN KEY (`codigo_publicacion`) REFERENCES `tbl_publicaciones` (`codigo_publicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_comentarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_empleos_guardados`
--
ALTER TABLE `tbl_empleos_guardados`
  ADD CONSTRAINT `fk_tbl_empleos_has_tbl_usuarios_tbl_empleos1` FOREIGN KEY (`codigo_empleo_guardado`) REFERENCES `tbl_empleos` (`codigo_empleo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_empleos_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_mensajes_amigos`
--
ALTER TABLE `tbl_mensajes_amigos`
  ADD CONSTRAINT `fk_tbl_mensajes_has_tbl_usuarios_tbl_mensajes1` FOREIGN KEY (`codigo_mensaje_amigo`) REFERENCES `tbl_mensajes` (`codigo_mensaje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_mensajes_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario_amigo`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_publicaciones`
--
ALTER TABLE `tbl_publicaciones`
  ADD CONSTRAINT `fk_tbl_publicaciones_tbl_usuarios` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_generos1` FOREIGN KEY (`codigo_genero`) REFERENCES `tbl_generos` (`codigo_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
