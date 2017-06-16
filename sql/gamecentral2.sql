-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-04-2014 a las 17:55:27
-- Versión del servidor: 5.5.35
-- Versión de PHP: 5.4.26-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gamecentral`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(50) DEFAULT NULL,
  `tipo_noticia` varchar(20) DEFAULT NULL,
  `contenido_noticia` longtext,
  `fecha` date DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `titulo_noticia`, `tipo_noticia`, `contenido_noticia`, `fecha`, `autor`) VALUES
(1, 'Smash bros WII U', 'resena', 'contenido', '2014-04-04', 'Luis'),
(2, 'Titanfall', 'destacado', '<span style="color: rgb(255, 255, 255); font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; background-color: rgb(201, 35, 101);">Â¡Ya es viernes de Atomix Podcast! Bienvenidos sean al episodio nÃºmero 13 del podcast con la informaciÃ³n mÃ¡s relevante de la semana en el mundo de los videojuegos, asÃ­ como el anÃ¡lisis y el buen humor del staff de Atomix.El dÃ­a de hoy podrÃ¡n escuchar cuÃ¡les son los lanzamiento</span><br>', '2014-04-05', 'Zero'),
(3, 'Grand Theft Auto V', 'resena', 'Muy padre eeh', '2014-04-06', 'admin'),
(4, 'Xbox 360', 'noticia', 'noticia contenido xbox', '2014-04-07', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) DEFAULT NULL,
  `tipo_producto` varchar(20) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre_sucursal` varchar(50) DEFAULT NULL,
  `direccion_sucursal` varchar(50) DEFAULT NULL,
  `telefono_sucursal` varchar(20) DEFAULT NULL,
  `correo_sucursal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contrasena`, `tipo_usuario`) VALUES
(1, 'admin', '1234', 'administrador'),
(2, 'Luis', '1234', 'colaborador'),
(3, 'Serna', '1234', 'administrador'),
(4, 'silva', '1234', 'colaborador');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
