-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 17-11-2022 a las 17:56:12
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

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
-- Estructura de tabla para la tabla `articulo`
--

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

CREATE TABLE `articulo` (
                            `idArticulo` int(11) NOT NULL,
                            `titulo` text NOT NULL,
                            `subtitulo` text NOT NULL,
                            `portadaArticulo` text DEFAULT NULL,
                            `descripcion` longtext NOT NULL,
                            `latitud` varchar(10) NOT NULL,
                            `longitud` varchar(10) NOT NULL,
                            `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `titulo`, `subtitulo`, `portadaArticulo`, `descripcion`, `latitud`, `longitud`, `idEstado`) VALUES
    (1, 'Dólar hoy: el blue se disparó $8 y cruzó la barrera de los $300', 'La divisa estadounidense subió $8, su marca más alta desde el 27 de julio', 'portadaDolar.png', '<h1 style=\"margin-right: 0px; margin-bottom: 2rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; font-family: Georgia, &quot;serif&quot;; font-size: 1.1875rem; vertical-align: baseline; color: rgb(51, 51, 51);\"><b>H</b>oy el&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">dólar blue</span>&nbsp;se disparó en la City porteña a $302, $8 (2,7%) más que el cierre de ayer. Con esta suba, la más pronunciada en más de un mes, la brecha cambiaria con el dólar minorista ($168, según el precio de venta en el Banco Nación) se estiró al 82%. Se trata de la cotización nominal más alta del dólar paralelo desde el 27 de julio, cuando cerró en $314.</h1><p class=\"com-paragraph   --s\" style=\"margin-right: 0px; margin-bottom: 2rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; font-family: Georgia, &quot;serif&quot;; font-size: 1.1875rem; vertical-align: baseline; color: rgb(51, 51, 51);\">Los tipos de cambios financieros también operaron a la suba. El&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">dólar MEP</span>&nbsp;aparece en pantallas a $305,21, con un alza diaria del 1,8% frente a los&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">$299,84 en los que cerró ayer, con los que también rompió el techo de $300</span>. El contado con liquidación (CCL) se negoció a $317,37 (2,1%). En lo que va del mes, subieron 4% y 3,3%, respectivamente.</p><p class=\"com-paragraph   --s\" style=\"margin-right: 0px; margin-bottom: 2rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; font-family: Georgia, &quot;serif&quot;; font-size: 1.1875rem; vertical-align: baseline; color: rgb(51, 51, 51);\"><div class=\"content-media\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; font-size: 16px; vertical-align: baseline; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><section role=\"button\" class=\"mod-media --zoom  \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 16px; vertical-align: baseline; display: block; position: relative;\"><figure role=\"button\" class=\"mod-figure \" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 16px; vertical-align: baseline; display: block; position: relative; width: 733.328px; cursor: pointer;\"></figure></section></div></p><p class=\"com-paragraph   --s\" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 100; font-stretch: inherit; line-height: 1.875rem; font-family: Georgia, &quot;serif&quot;; font-size: 1.1875rem; vertical-align: baseline; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">“<strong style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">El dólar blue se está despertando.<span>&nbsp;</span></strong>Estuvo durante mucho tiempo anestesiado porque estaba el blanqueo de la construcción y, en otros casos, porque pegó un golpe la recesión. Las empresas están desarmando stock y como resguardo, compran dólares. Sube el dólar bolsa, el CCL y, por ende, sube el blue.<span>&nbsp;</span><strong style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">Todos los dólares se van a alinear a una gran suba.<span>&nbsp;</span></strong>Mantenemos<span>&nbsp;</span><mark class=\"hl_underline\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline; color: inherit; background: transparent; text-decoration: underline 2px rgb(255, 255, 36);\">nuestro pronóstico de un dólar $400 para fin de año</mark>”, comentó el economista Salvador Di Stefano.</p><p class=\"com-paragraph   --s\" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; vertical-align: baseline; orphans: 2; text-align: start; text-indent: 0px; widows: 2; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><a href=\"https://resizer.glanacion.com/resizer/xniVGUvJ-TPMq3FEhxYsxuos8Wk=/879x0/filters:format(webp):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/lanacionar/ZY5JN4AWDNEMJFYYIZDFAMAMTE.JPG\" target=\"_blank\">https://resizer.glanacion.com/resizer/xniVGUvJ-TPMq3FEhxYsxuos8Wk=/879x0/filters:format(webp):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/lanacionar/ZY5JN4AWDNEMJFYYIZDFAMAMTE.JPG</a><font color=\"#333333\" face=\"Georgia, serif\"><span style=\"font-size: 17.8125px;\"></span></font></p><p class=\"com-paragraph   --s\" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; vertical-align: baseline; orphans: 2; text-align: start; text-indent: 0px; widows: 2; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgb(51, 51, 51); font-family: Georgia, &quot;serif&quot;; font-size: 19px;\">El tipo de cambio oficial mayorista se ofreció a $162,12 (+0,2%). En las pantallas del Banco Nación,&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: Georgia, &quot;serif&quot;; font-size: 19px; vertical-align: baseline; color: rgb(51, 51, 51);\">el dólar minorista se vendió a $168 (+0,3%),</span><span style=\"color: rgb(51, 51, 51); font-family: Georgia, &quot;serif&quot;; font-size: 19px;\">&nbsp;cotización de referencia para el dólar ahorro ($277,2), tarjeta ($294) y Qatar ($336).</span></p><p class=\"com-paragraph   --s\" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; vertical-align: baseline; orphans: 2; text-align: start; text-indent: 0px; widows: 2; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgb(51, 51, 51); font-family: Georgia, &quot;serif&quot;; font-size: 19px;\">Según el economista Fernando Marull, la causa que explica la suba del blue se vincula con la situación de “stress” de la deuda en pesos. “</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: Georgia, &quot;serif&quot;; font-size: 19px; vertical-align: baseline; color: rgb(51, 51, 51);\">Asumimos que el BCRA emitirá lo que tenga que emitir para evitar un reperfilamiento. Como viene haciendo, y como pasó en junio. Esos pesos presionarán al dólar paralelo, y a la larga terminarán en los bancos</span><span style=\"color: rgb(51, 51, 51); font-family: Georgia, &quot;serif&quot;; font-size: 19px;\">, en forma de más Leliqs. La incertidumbre sobre la deuda y la pérdida de reservas hoy son los dos factores locales que pueden hacer mover al paralelo“, destacaron desde su consultora, FMyA.</span><font color=\"#333333\" face=\"Georgia, serif\"><span style=\"font-size: 17.8125px;\"><br></span></font></p>', '-34.608118', '-58.370296', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
                          `idCompra` int(11) NOT NULL,
                          `idUsuario` int(11) DEFAULT NULL,
                          `idEdicion` int(11) DEFAULT NULL,
                          `fecha` date NOT NULL DEFAULT current_timestamp(),
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
                           `portadaEdicion` text DEFAULT NULL,
                           `precio` float NOT NULL,
                           `idProducto` int(11) NOT NULL,
                           `fechaEdicion` date NOT NULL,
                           `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`idEdicion`, `numero`, `portadaEdicion`, `precio`, `idProducto`, `fechaEdicion`, `idEstado`) VALUES
    (1, 1, 'portadaedicion1.jpg', 300, 2, '2022-11-15', 1);

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
    (1, 16, 1);


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
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
                            `idProducto` int(11) NOT NULL,
                            `nombre` text NOT NULL,
                            `idTipo` int(11) NOT NULL,
                            `portada` text DEFAULT NULL,
                            `precioSuscripcion` float NOT NULL,
                            `idEscritor` int(11) NOT NULL,
                            `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `idTipo`, `portada`, `precioSuscripcion`, `idEscritor`, `idEstado`) VALUES
                                                                                                          (1, 'CLARIN', 2, 'clarin.jpg', 465, 7, 2),
                                                                                                          (2, 'LA NACION', 2, 'la-nacion.jpg', 350, 7, 2),
                                                                                                          (3, 'PAGINA 12', 2, 'pagina-12.jpg', 400, 7, 2),
                                                                                                          (4, 'LA CAPITAL ', 2, 'la-capital.jpg', 650, 7, 3),
                                                                                                          (5, 'EL DIA', 2, 'el-dia.jpg', 325, 7, 2),
                                                                                                          (6, 'LA GACETA', 2, 'la-gaceta.jpg', 500, 7, 2),
                                                                                                          (7, 'LA VOZ', 2, 'la-voz.jpg', 435, 7, 2),
                                                                                                          (8, 'OHLALA!', 1, 'ohlala.jpg', 615, 7, 2),
                                                                                                          (9, 'PARATI', 1, 'parati.jpg', 425, 7, 2);

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
                                                  (15, 'Nutrición'),
                                                  (16, 'Economia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
                               `idSuscripcion` int(11) NOT NULL,
                               `idUsuario` int(11) DEFAULT NULL,
                               `idProducto` int(11) DEFAULT NULL,
                               `fechaInicio` date NOT NULL DEFAULT current_timestamp(),
                               `fechaVencimiento` date NOT NULL,
                               `idMedioDePago` tinyint(4) DEFAULT NULL,
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
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
    ADD PRIMARY KEY (`idArticulo`),
    ADD KEY `idEstado` (`idEstado`);

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
    ADD PRIMARY KEY (`idEdicion`),
    ADD KEY `idProducto` (`idProducto`),
    ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `edicion_seccion_articulos`
--
ALTER TABLE `edicion_seccion_articulos`
    ADD KEY `idEdicion` (`idEdicion`),
    ADD KEY `idSeccion` (`idSeccion`),
    ADD KEY `idArticulo` (`idArticulo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
    ADD PRIMARY KEY (`idEstado`);

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
    ADD KEY `idEscritor` (`idEscritor`),
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
    ADD KEY `idMedioDePago` (`idMedioDePago`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
    ADD PRIMARY KEY (`idTipo`);

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
    MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
    MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
    MODIFY `idEdicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
    MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medio_de_pago`
--
ALTER TABLE `medio_de_pago`
    MODIFY `idMedioDePago` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
    MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
    MODIFY `idSuscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
    MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Filtros para la tabla `edicion`
--
ALTER TABLE `edicion`
    ADD CONSTRAINT `edicion_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
    ADD CONSTRAINT `edicion_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
    ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);


--
-- Filtros para la tabla `edicion_seccion_articulos`
--
ALTER TABLE `edicion_seccion_articulos`
    ADD CONSTRAINT `edicion_seccion_articulos_ibfk_1` FOREIGN KEY (`idEdicion`) REFERENCES `edicion` (`idEdicion`),
    ADD CONSTRAINT `edicion_seccion_articulos_ibfk_2` FOREIGN KEY (`idSeccion`) REFERENCES `seccion` (`idSeccion`),
    ADD CONSTRAINT `edicion_seccion_articulos_ibfk_3` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
    ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo_producto` (`idTipo`),
    ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idEscritor`) REFERENCES `usuario` (`idUsuario`),
    ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
    ADD CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
    ADD CONSTRAINT `suscripcion_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
    ADD CONSTRAINT `suscripcion_ibfk_3` FOREIGN KEY (`idMedioDePago`) REFERENCES `medio_de_pago` (`idMedioDePago`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
    ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
    ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
