-- phpMyAdmin SQL Dump
-- version 3.4.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2013 a las 17:44:16
-- Versión del servidor: 5.1.62
-- Versión de PHP: 5.3.13-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `backbasev2`
--
CREATE DATABASE `backbasev2` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `backbasev2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `clave` varchar(255) COLLATE utf8_bin NOT NULL,
  `activo` int(1) DEFAULT NULL,
  `es_editable` tinyint(1) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `activo`, `es_editable`, `eliminado`) VALUES
(1, 'Nombre', 'Apellido', 'nombre@apellido.com', 'admin', '!74a0777b72f785c824f1969474444bd25c3f64e6!', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_permiso`
--

CREATE TABLE IF NOT EXISTS `administrador_permiso` (
  `administrador_id` int(12) NOT NULL,
  `permiso_id` int(12) NOT NULL,
  KEY `administrador_permiso_fk1` (`administrador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `administrador_permiso`
--

INSERT INTO `administrador_permiso` (`administrador_id`, `permiso_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `padre_id` int(12) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `activo` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `entidad` varchar(255) COLLATE utf8_bin NOT NULL,
  `valor` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `entidad`, `valor`) VALUES
(1, 'listados/cantidad', '20'),
(2, 'logs/cantidad', '50'),
(3, 'smtp/host', ''),
(4, 'smtp/user', ''),
(5, 'smtp/pass', ''),
(6, 'smtp/activo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `tabla` varchar(255) COLLATE utf8_bin NOT NULL,
  `tabla_id` int(12) NOT NULL,
  `administrador_id` int(12) NOT NULL,
  `fecha` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tabla` (`tabla`),
  KEY `tabla_id` (`tabla_id`),
  KEY `log_fk1` (`administrador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_bin NOT NULL,
  `copete` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion_corta` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion_larga` text COLLATE utf8_bin NOT NULL,
  `fecha` int(12) NOT NULL,
  `activo` int(1) NOT NULL,
  `destacado` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_archivo`
--

CREATE TABLE IF NOT EXISTS `noticia_archivo` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `noticia_id` int(12) NOT NULL,
  `archivo` varchar(255) COLLATE utf8_bin NOT NULL,
  `extension` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL,
  `activo` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `noticia_archivo_fk1` (`noticia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_imagen`
--

CREATE TABLE IF NOT EXISTS `noticia_imagen` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `noticia_id` int(12) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_bin NOT NULL,
  `extension` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL,
  `activo` int(1) NOT NULL,
  `principal` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `noticia_imagen_fk1` (`noticia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(12) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion_corta` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion_larga` text COLLATE utf8_bin NOT NULL,
  `activo` int(1) NOT NULL,
  `destacado` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_fk1` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_archivo`
--

CREATE TABLE IF NOT EXISTS `producto_archivo` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `producto_id` int(12) NOT NULL,
  `archivo` varchar(255) COLLATE utf8_bin NOT NULL,
  `extension` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL,
  `activo` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_archivo_fk1` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_imagen`
--

CREATE TABLE IF NOT EXISTS `producto_imagen` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `producto_id` int(12) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_bin NOT NULL,
  `extension` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL,
  `activo` int(1) NOT NULL,
  `principal` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_imagen_fk1` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `activo` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slideshow_imagen`
--

CREATE TABLE IF NOT EXISTS `slideshow_imagen` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `slideshow_id` int(12) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_bin NOT NULL,
  `extension` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL,
  `activo` int(1) NOT NULL,
  `principal` int(1) NOT NULL,
  `orden` int(12) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slideshow_imagen_fk1` (`slideshow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador_permiso`
--
ALTER TABLE `administrador_permiso`
  ADD CONSTRAINT `administrador_permiso_fk1` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_fk1` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticia_archivo`
--
ALTER TABLE `noticia_archivo`
  ADD CONSTRAINT `noticia_archivo_fk2` FOREIGN KEY (`noticia_id`) REFERENCES `noticia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticia_imagen`
--
ALTER TABLE `noticia_imagen`
  ADD CONSTRAINT `noticia_imagen_fk1` FOREIGN KEY (`noticia_id`) REFERENCES `noticia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_fk1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_archivo`
--
ALTER TABLE `producto_archivo`
  ADD CONSTRAINT `producto_archivo_fk1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_imagen`
--
ALTER TABLE `producto_imagen`
  ADD CONSTRAINT `producto_imagen_fk1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `slideshow_imagen`
--
ALTER TABLE `slideshow_imagen`
  ADD CONSTRAINT `slideshow_imagen_fk1` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshow` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
