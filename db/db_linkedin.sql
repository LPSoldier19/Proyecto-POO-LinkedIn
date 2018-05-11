-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-05-2018 a las 06:29:39
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

--
-- Volcado de datos para la tabla `tbl_amigos`
--

INSERT INTO `tbl_amigos` (`codigo_usuario_amigo`, `codigo_usuario`) VALUES
(14, 1),
(15, 1),
(1, 14),
(1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_chats`
--

DROP TABLE IF EXISTS `tbl_chats`;
CREATE TABLE IF NOT EXISTS `tbl_chats` (
  `codigo_chat` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario_amigo` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`codigo_chat`),
  KEY `fk_tbl_chats_tbl_amigos1_idx` (`codigo_usuario_amigo`,`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_chats`
--

INSERT INTO `tbl_chats` (`codigo_chat`, `codigo_usuario_amigo`, `codigo_usuario`) VALUES
(1, 1, 4),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios`
--

DROP TABLE IF EXISTS `tbl_comentarios`;
CREATE TABLE IF NOT EXISTS `tbl_comentarios` (
  `codigo_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_publicacion` int(11) NOT NULL,
  `fecha_comentario` datetime DEFAULT NULL,
  `contenido_comentario` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo_comentario`),
  KEY `fk_tbl_comentarios_tbl_publicaciones1_idx` (`codigo_publicacion`),
  KEY `fk_tbl_comentarios_tbl_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_comentarios`
--

INSERT INTO `tbl_comentarios` (`codigo_comentario`, `codigo_usuario`, `codigo_publicacion`, `fecha_comentario`, `contenido_comentario`) VALUES
(3, 14, 21, '2018-05-10 09:40:08', 'Funcionara ahora?'),
(4, 14, 26, '2018-05-10 15:13:56', 'Intento 2');

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
  `url_imagen_empleo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo_empleo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_empleos`
--

INSERT INTO `tbl_empleos` (`codigo_empleo`, `nombre_empleo`, `descripcion_empleo`, `telefono_empleo`, `direccion_empleo`, `url_imagen_empleo`) VALUES
(1, 'BAC Credomatic', 'Se busca cajero principiante, motivado para trabajar, que sea Bachiller en Contaduria Publica y Finanzas, con buena educacion y con certificado de cursos de atencion al cliente.', '+504 2336-6565', 'Blvd. Morazan', 'img/img-empleo/bac.png'),
(3, 'Ficohsa', 'Se busca gerente para nueva sucursal Fichosa La Ceiba, que viva en la ciudad, con titulo universitario y preferiblemente con cursos de atencion al cliente.', '+504 2236-3636', 'La Ceiba, Atlantida, Honduras', 'img/img-empleo/ficohsa.png'),
(4, 'Chillis', 'Se busca mesero de genero femenino sin ningun tipo de experiencia laboral con bachillerato en ciencias y letras', '+504 2235-5880', 'Los Proceres,Tegucigalpa, Honduras', 'img/img-empleo/chillis.png'),
(5, 'Diunsa', 'Se busca cajero sin ningun tipo de experiencia laboral con titulo de bachillerato en contaduria publica y finanzas', '+504 2220-8580', 'Los Proceres,Tegucigalpa, Honduras', 'img/img-empleo/diunsa.jpg'),
(6, 'Almacenes Lady Lee', 'Se busca personal de apoyo para el area de bodegas, sin ningun tipo de experiencia laboral', '+504 2335-7986', 'Mall Multiplaza,Tegucigalpa, Honduras', 'img/img-empleo/ladylee.png'),
(7, 'Breado Co', 'Se busca distribuidor de producto con transporte, capaz de movilizarse a nivel nacional, sin ningun tipo de experiencia', '+504 2145-7896', 'Colonia Miraflores,Tegucigalpa, Honduras', 'img/img-empleo/breadco.jpg'),
(8, 'Burger King', 'Se busca mesero para nueva sucursal, sin ningun tipo de experiencia laboral, con buenos modales', '+504 2586-7898', 'Boulevard del Norte ,San Pedro Sula, Honduras', 'img/img-empleo/burgerking.png'),
(9, 'Pizza Hut', 'Se busca mesero para nueva sucursal, sin ningun tipo de experiencia laboral, con buenos modales', '+504 2586-7898', 'Boulevard Fuerzas Armadas, Tegucigalpa, Honduras', 'img/img-empleo/pizzahut.png');

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

--
-- Volcado de datos para la tabla `tbl_empleos_guardados`
--

INSERT INTO `tbl_empleos_guardados` (`codigo_empleo_guardado`, `codigo_usuario`) VALUES
(1, 1),
(3, 1),
(3, 4),
(3, 14),
(4, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_generos`
--

DROP TABLE IF EXISTS `tbl_generos`;
CREATE TABLE IF NOT EXISTS `tbl_generos` (
  `codigo_genero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `codigo_usuario` int(11) NOT NULL,
  `contenido_mensaje` varchar(500) DEFAULT NULL,
  `fecha_mensaje` datetime DEFAULT NULL,
  PRIMARY KEY (`codigo_mensaje`),
  KEY `fk_tbl_mensajes_tbl_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_mensajes`
--

INSERT INTO `tbl_mensajes` (`codigo_mensaje`, `codigo_usuario`, `contenido_mensaje`, `fecha_mensaje`) VALUES
(1, 14, 'Hola', '2018-05-10 17:42:26');

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
  `contenido_publicacion` varchar(300) DEFAULT NULL,
  `numero_likes` int(45) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `ubicacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo_publicacion`),
  KEY `fk_tbl_publicaciones_tbl_usuarios_idx` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_publicaciones`
--

INSERT INTO `tbl_publicaciones` (`codigo_publicacion`, `codigo_usuario`, `contenido_publicacion`, `numero_likes`, `fecha_publicacion`, `ubicacion`) VALUES
(19, 1, 'Holisss', NULL, '2018-05-09 16:34:05', 'Calle RepÃºblica del Ecuador, Tegucigalpa, Honduras'),
(20, 1, 'Esta es mi segunda publicacion ', NULL, '2018-05-09 17:43:55', 'Calle RepÃºblica del Ecuador, Tegucigalpa, Honduras'),
(21, 4, 'Primera publicacion desde otro usuario', NULL, '2018-05-09 21:40:56', 'Calle RepÃºblica del Ecuador, Tegucigalpa, Honduras'),
(24, 1, 'Hola a todos', NULL, '2018-05-10 07:13:45', ''),
(25, 1, 'Intento de publicacion', NULL, '2018-05-10 08:50:21', 'Modesto Rodas, Tegucigalpa, Honduras'),
(26, 14, 'Primera publicacion desde el ultimo usuario registrado actualmente', NULL, '2018-05-10 09:02:51', 'Modesto Rodas, Tegucigalpa, Honduras');

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
  `titular` varchar(200) DEFAULT NULL,
  `educacion` varchar(200) DEFAULT NULL,
  `logros` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo_usuario`),
  KEY `fk_tbl_usuarios_tbl_generos1_idx` (`codigo_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `codigo_genero`, `nombre_usuario`, `apellido_usuario`, `correo`, `contrasena`, `url_imagen_perfil`, `titular`, `educacion`, `logros`) VALUES
(1, 1, 'Rafael', 'Bautista', 'rafael.bautista1@hotmail.es', 'bcdcb29ed2aab16d48c11485264df665e906bdd9', 'img/profile-pics/usuario4.jpg', 'Estudiante en Universidad Nacional AutÃ³noma de Honduras (UNAH)', 'Universidad Nacional AutÃ³noma de Honduras (UNAH)', 'Certificado de Photoshop en NextU'),
(2, 1, 'Alejandro', 'Bautista', 'alejandro@gmail.com', '2d09563fb5d7e92c6642519acacbde85e6c76b3c', 'img/profile-pics/usuario1.jpg', 'Estudiante en Interamerican School', 'Interamerican School', 'Certificado curso de Ingles #1 - IHCI'),
(4, 1, 'Walter', 'Bautista', 'walter@gmail.com', 'bcdcb29ed2aab16d48c11485264df665e906bdd9', 'img/profile-pics/usuario3.jpg', 'Estudiante en Centro Universitario Tecnologico (CEUTEC)', 'Centro Universitario Tecnologico (CEUTEC)', 'Certificado de excel avanzado en INFOP'),
(14, 2, 'Sandra', 'Santos', 'sandra@gmail.com', 'bcdcb29ed2aab16d48c11485264df665e906bdd9', 'img/profile-pics/usuario7.jpg', 'Gerente General en Banco Ficohsa', 'Instituto HondureÃ±o de Cultura Interamericana (IHCI)', 'Diploma de secretariado bilingÃ¼e - IHCI'),
(15, 2, 'Angie', 'MembreÃ±o', 'angie@gmail.com', 'bcdcb29ed2aab16d48c11485264df665e906bdd9', 'img/profile-pics/usuario8.jpg', 'Estudiante en Universidad Nacional Autonoma de Honduras (UNAH)', 'Universidad Nacional Autonoma de Honduras (UNAH)', 'Certificado Ingles Basico-2 - INFOP');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_empleos_guardados`
--
ALTER TABLE `tbl_empleos_guardados`
  ADD CONSTRAINT `fk_tbl_empleos_has_tbl_usuarios_tbl_empleos1` FOREIGN KEY (`codigo_empleo_guardado`) REFERENCES `tbl_empleos` (`codigo_empleo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_empleos_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_mensajes`
--
ALTER TABLE `tbl_mensajes`
  ADD CONSTRAINT `fk_tbl_mensajes_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
