-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 03:16:57
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

DROP SCHEMA IF EXISTS infonete;
CREATE SCHEMA infonete;
USE infonete;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infonete`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--
DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
`idRol` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`)
VALUES (1, 'LECTOR'),
       (2, 'ESCRITOR'),
       (3, 'ADMINISTRADOR'),
       (4, 'EDITOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--
DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
`idEstado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `nombre`)
VALUES (1, 'INACTIVO'),
       (2, 'ACTIVO'),
       (3, 'BLOQUEADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
`idUsuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nombre` text NOT NULL,
`email` varchar(40) NOT NULL,
`password` text NOT NULL,
`latitud` varchar(10) NOT NULL,
`longitud` varchar(10) NOT NULL,
`idRol` int(11) NOT NULL,
`hashVerificacion` text NOT NULL,
`idEstado` int(11) NOT NULL,
FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `email`, `password`, `latitud`, `longitud`, `idRol`, `hashVerificacion`, `idEstado`)
VALUES (1, 'Alan', 'alan@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, '', 2),
       (2, 'Macarena', 'macarena@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, '', 2),
       (3, 'Miguel', 'miguel@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, '', 2),
       (4, 'Pedro', 'pedrito@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, '', 2),
       (5, 'Sofia', 'admin@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 3, '', 2),
       (6, 'Graciela', 'editor@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 4, '', 2),
       (7, 'Fernanda', 'escritor@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 2, '', 2),
       (8, 'Lector', 'lector@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '-34.653141', '-58.475545', 1, '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--
DROP TABLE IF EXISTS `tipo_producto`;

CREATE TABLE `tipo_producto` (
`idTipo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`idTipo`, `nombre`) VALUES
(1, 'REVISTA'),
(2, 'DIARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--
DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
`idProducto` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nombre` text NOT NULL,
`idTipo` int(11) NOT NULL,
`portada` text DEFAULT NULL,
`idEstado` int(11) NOT NULL,
FOREIGN KEY (`idTipo`) REFERENCES `tipo_producto` (`idTipo`),
FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `idTipo`, `portada`, `idEstado`) VALUES
(1, 'CLARIN', 2, 'clarin.jpg', 2),
(2, 'LA NACION', 2, 'la-nacion.jpg', 2),
(3, 'PAGINA 12', 2, 'pagina-12.jpg', 2),
(4, 'LA CAPITAL ', 2, 'la-capital.jpg', 3),
(5, 'EL DIA', 2, 'el-dia.jpg', 2),
(6, 'LA GACETA', 2, 'la-gaceta.jpg', 2),
(7, 'LA VOZ', 2, 'la-voz.jpg', 2),
(8, 'OHLALA!', 1, 'ohlala.jpg', 2),
(9, 'PARATI', 1, 'parati.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--
DROP TABLE IF EXISTS `edicion`;

CREATE TABLE `edicion` (
`idEdicion` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`numero` int(11) NOT NULL,
`portadaEdicion` text DEFAULT NULL,
`precio` float NOT NULL,
`idProducto` int(11) NOT NULL,
`fechaEdicion` date NOT NULL,
FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edicion`


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--
DROP TABLE IF EXISTS `seccion`;

CREATE TABLE `seccion` (
`idSeccion` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`idSeccion`, `nombre`) VALUES
(6, 'Comics'),
(7, 'Moda'),
(8, 'Policial'),
(9, 'Drama'),
(15, 'Nutrición');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--


DROP TABLE IF EXISTS `articulo`;

CREATE TABLE `articulo` (
  `idArticulo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `subtitulo` text NOT NULL,
  `portadaArticulo` text DEFAULT NULL,
  `descripcion` text NOT NULL,
  `latitud` varchar(10) NOT NULL,
  `longitud` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion_seccion_articulos`
--
DROP TABLE IF EXISTS `edicion_seccion_articulos`;

CREATE TABLE `edicion_seccion_articulos` (
`idEdicion` int(11) NOT NULL,
`idSeccion` int(11) NOT NULL,
`idArticulo` int(11) NOT NULL,
FOREIGN KEY (`idEdicion`) REFERENCES `edicion` (`idEdicion`),
FOREIGN KEY (`idSeccion`) REFERENCES `seccion` (`idSeccion`),
FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edicion_seccion_articulos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_de_pago`
--
DROP TABLE IF EXISTS `medio_de_pago`;

CREATE TABLE `medio_de_pago` (
`idMedioDePago` tinyint(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medio_de_pago`
--

INSERT INTO `medio_de_pago` (`idMedioDePago`, `nombre`) VALUES
(1, 'Tarjeta de Credito'),
(2, 'Tarjeta de Debito'),
(3, 'Efectivo'),
(4, 'Mercado Pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--
DROP TABLE IF EXISTS `compra`;

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idEdicion` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `medioDePago` tinyint(4) DEFAULT NULL,
  FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  FOREIGN KEY (`idEdicion`) REFERENCES `edicion` (`idEdicion`),
  FOREIGN KEY (`medioDePago`) REFERENCES `medio_de_pago` (`idMedioDePago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--
DROP TABLE IF EXISTS `suscripcion`;

CREATE TABLE `suscripcion` (
  `idSuscripcion` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaVencimiento` date DEFAULT NULL,
  `idMedioDePago` tinyint(4) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  FOREIGN KEY (`idMedioDePago`) REFERENCES `medio_de_pago` (`idMedioDePago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
