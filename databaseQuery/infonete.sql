-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 14-11-2022 a las 22:53:03
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

DROP SCHEMA IF EXISTS infonete;
CREATE SCHEMA infonete;
USE infonete;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idArticulo` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `latitud` varchar(10) NOT NULL,
  `longitud` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `titulo`, `descripcion`, `latitud`, `longitud`) VALUES
(1, 'Nuevo homicidio en Caballito', '<h2>Homicidio en Rivadavia</h2><h3 style=\"text-align: right; \">lorem ipsum dolor</h3><p style=\"text-align: right;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td>hola</td><td>que</td></tr><tr><td>tal</td><td>infonete</td></tr></tbody></table><p style=\"text-align: right;\"><br></p>', '-34.671002', '-58.488034'),
(2, 'titulo', '<h1>asdasadasdads</h1>', '-34.671637', '-58.485545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idEdicion` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `medioDePago` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `idEdicion` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `precio` float NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion_seccion_articulos`
--

CREATE TABLE `edicion_seccion_articulos` (
  `idEdicion` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edicion_seccion_articulos`
--

INSERT INTO `edicion_seccion_articulos` (`idEdicion`, `idSeccion`, `idArticulo`) VALUES
(0, 8, 1),
(0, 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `nombre`) VALUES
(1, 'INACTIVO'),
(2, 'ACTIVO'),
(3, 'BLOQUEADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_de_pago`
--

CREATE TABLE `medio_de_pago` (
  `idMedioDePago` tinyint(4) NOT NULL,
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
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `idTipo` int(11) NOT NULL,
  `portada` text,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `idTipo`, `portada`, `idEstado`) VALUES
(1, 'CLARIN', 2, 'clarin.jpg', 2),
(2, 'LA NACION', 2, 'la-nacion.jpg', 2),
(3, 'PAGINA 12', 2, 'pagina-12.jpg', 2),
(4, 'LA CAPITAL ', 2, 'la-capital.jpg', 1),
(5, 'EL DIA', 2, 'el-dia.jpg', 1),
(6, 'LA GACETA', 2, 'la-gaceta.jpg', 1),
(7, 'LA VOZ', 2, 'la-voz.jpg', 1),
(8, 'OHLALA!', 1, 'ohlala.jpg', 1),
(9, 'PARATI', 1, 'parati.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'LECTOR'),
(2, 'ESCRITOR'),
(3, 'ADMINISTRADOR'),
(4, 'EDITOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `idSeccion` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `idSuscripcion` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaVencimiento` date DEFAULT NULL,
  `medioDePago` tinyint(4) DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `idTipo` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `latitud` varchar(10) NOT NULL,
  `longitud` varchar(10) NOT NULL,
  `idRol` int(11) NOT NULL,
  `hashVerificacion` text NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `email`, `password`, `latitud`, `longitud`, `idRol`, `hashVerificacion`, `idEstado`) VALUES
(1, 'Alan', 'alan@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, '', 2),
(2, 'Macarena', 'macarena@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, '', 2),
(3, 'Miguel', 'miguel@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, '', 2),
(4, 'Pedro', 'pedrito@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, '', 2),
(5, 'Sofia', 'admin@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 3, '', 2),
(6, 'Graciela', 'editor@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 4, '', 2),
(7, 'Fernanda', 'escritor@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 2, '', 2),
(8, 'Lector', 'lector@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '-34.653141', '-58.475545', 1, '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idEdicion` (`idEdicion`),
  ADD KEY `medioDePago` (`medioDePago`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`idEdicion`);

--
-- Indices de la tabla `medio_de_pago`
--
ALTER TABLE `medio_de_pago`
  ADD PRIMARY KEY (`idMedioDePago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idTipo` (`idTipo`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`idSeccion`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`idSuscripcion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `medioDePago` (`medioDePago`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idEstado` (`idEstado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `idEdicion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `idSuscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`idEdicion`) REFERENCES `edicion` (`idEdicion`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`medioDePago`) REFERENCES `medio_de_pago` (`idMedioDePago`);

--
-- Filtros para la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `suscripcion_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `suscripcion_ibfk_3` FOREIGN KEY (`medioDePago`) REFERENCES `medio_de_pago` (`idMedioDePago`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
