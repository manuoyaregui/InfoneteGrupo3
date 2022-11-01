-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 26-10-2022 a las 23:34:36
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

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


-- Estructura de tabla para la tabla `articulo`
--
DROP TABLE IF EXISTS `articulo`;

CREATE TABLE `articulo` (
                            `idArticulo` int(11) NOT NULL,
                            `titulo` text NOT NULL,
                            `descripcion` text NOT NULL,
                            `ubicacion` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--
DROP TABLE IF EXISTS `edicion`;
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
DROP TABLE IF EXISTS `edicion_seccion_articulos` CASCADE ;
CREATE TABLE `edicion_seccion_articulos` (
                                             `idEdicion` int(11) NOT NULL,
                                             `idSeccion` int(11) NOT NULL,
                                             `idArticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--
DROP TABLE IF EXISTS `estado`;
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

-- Estructura de tabla para la tabla `producto`
--
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
                            `idProducto` int(11) NOT NULL,
                            `nombre` text NOT NULL,
                            `idTipo` int(11) NOT NULL,
                            `portada` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `idTipo`, `portada`) VALUES
                                                                         (1, 'CLARIN', 2, 'clarin.jpg'),
                                                                         (2, 'LA NACION', 2, 'la-nacion.jpg'),
                                                                         (3, 'PAGINA 12', 2, 'pagina-12.jpg'),
                                                                         (4, 'LA CAPITAL ', 2, 'la-capital.jpg'),
                                                                         (5, 'EL DIA', 2, 'el-dia.jpg'),
                                                                         (6, 'LA GACETA', 2, 'la-gaceta.jpg'),
                                                                         (7, 'LA VOZ', 2, 'la-voz.jpg'),
                                                                         (8, 'OHLALA!', 1, 'ohlala.jpg'),
                                                                         (9, 'PARATI', 1, 'parati.jpg');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--
DROP TABLE IF EXISTS `rol`;
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
                                          (3, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--
DROP TABLE IF EXISTS `seccion`;
CREATE TABLE `seccion` (
                           `idSeccion` int(11) NOT NULL,
                           `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--
DROP TABLE IF EXISTS `tipo_producto`;
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
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
                           `idUsuario` int(11) NOT NULL,
                           `nombre` text NOT NULL,
                           `email` varchar(40) NOT NULL,
                           `password` text NOT NULL,
                           `latitud` varchar(10) NOT NULL,
                           `longitud` varchar(10) NOT NULL,
                           `idRol` int(11) NOT NULL,
                           `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `email`, `password`, `latitud`, `longitud`, `idRol`, `idEstado`) VALUES
                                                                                                                   (1, 'Alan', 'alan@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, 2),
                                                                                                                   (2, 'Macarena', 'macarena@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, 2),
                                                                                                                   (3, 'Miguel', 'miguel@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, 2),
                                                                                                                   (4, 'Pedro', 'pedrito@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, 2),
                                                                                                                   (5, 'Sofia', 'sofia@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, 2),
                                                                                                                   (6, 'Graciela', 'graciela@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 1, 2),
                                                                                                                   (7, 'Fernanda', 'escritor@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '', 2, 2);


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
    ADD PRIMARY KEY (`idProducto`),
    ADD KEY `idTipo` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
    MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
    ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo_producto` (`idTipo`) ON UPDATE CASCADE;

-- Filtros para la tabla `edicion`
--
ALTER TABLE `edicion`
    ADD CONSTRAINT `edicion_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Filtros para la tabla `edicion_seccion_articulos`
--
ALTER TABLE `edicion_seccion_articulos`
    ADD CONSTRAINT `edicion_seccion_articulos_ibfk_1` FOREIGN KEY (`idEdicion`) REFERENCES `edicion` (`idEdicion`) ON UPDATE CASCADE ON DELETE CASCADE,
    ADD CONSTRAINT `edicion_seccion_articulos_ibfk_2` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON UPDATE CASCADE ON DELETE CASCADE,
    ADD CONSTRAINT `edicion_seccion_articulos_ibfk_3` FOREIGN KEY (`idSeccion`) REFERENCES `seccion` (`idSeccion`) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
    ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo_producto` (`idTipo`) ON UPDATE CASCADE ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
    ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON UPDATE CASCADE ON DELETE CASCADE,
    ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON UPDATE CASCADE ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
