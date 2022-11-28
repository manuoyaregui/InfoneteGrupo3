-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 06:16:40
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

DROP DATABASE IF EXISTS infonete;
CREATE DATABASE infonete;
use infonete;
--

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
                                                                                                                                      (1, 'Dólar hoy: el blue se disparó $8 y cruzó la barrera de los $300', 'La divisa estadounidense subió $8, su marca más alta desde el 27 de julio', 'portadaDolar.png', '<h1 style=\"margin-right: 0px; margin-bottom: 2rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; font-family: Georgia, &quot;serif&quot;; font-size: 1.1875rem; vertical-align: baseline; color: rgb(51, 51, 51);\"><b>H</b>oy el&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">dólar blue</span>&nbsp;se disparó en la City porteña a $302, $8 (2,7%) más que el cierre de ayer. Con esta suba, la más pronunciada en más de un mes, la brecha cambiaria con el dólar minorista ($168, según el precio de venta en el Banco Nación) se estiró al 82%. Se trata de la cotización nominal más alta del dólar paralelo desde el 27 de julio, cuando cerró en $314.</h1><p class=\"com-paragraph   --s\" style=\"margin-right: 0px; margin-bottom: 2rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; font-family: Georgia, &quot;serif&quot;; font-size: 1.1875rem; vertical-align: baseline; color: rgb(51, 51, 51);\">Los tipos de cambios financieros también operaron a la suba. El&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">dólar MEP</span>&nbsp;aparece en pantallas a $305,21, con un alza diaria del 1,8% frente a los&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">$299,84 en los que cerró ayer, con los que también rompió el techo de $300</span>. El contado con liquidación (CCL) se negoció a $317,37 (2,1%). En lo que va del mes, subieron 4% y 3,3%, respectivamente.</p><p class=\"com-paragraph   --s\" style=\"margin-right: 0px; margin-bottom: 2rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; font-family: Georgia, &quot;serif&quot;; font-size: 1.1875rem; vertical-align: baseline; color: rgb(51, 51, 51);\"><div class=\"content-media\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; font-size: 16px; vertical-align: baseline; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><section role=\"button\" class=\"mod-media --zoom  \" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 16px; vertical-align: baseline; display: block; position: relative;\"><figure role=\"button\" class=\"mod-figure \" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 16px; vertical-align: baseline; display: block; position: relative; width: 733.328px; cursor: pointer;\"></figure></section></div></p><p class=\"com-paragraph   --s\" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 100; font-stretch: inherit; line-height: 1.875rem; font-family: Georgia, &quot;serif&quot;; font-size: 1.1875rem; vertical-align: baseline; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">“<strong style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">El dólar blue se está despertando.<span>&nbsp;</span></strong>Estuvo durante mucho tiempo anestesiado porque estaba el blanqueo de la construcción y, en otros casos, porque pegó un golpe la recesión. Las empresas están desarmando stock y como resguardo, compran dólares. Sube el dólar bolsa, el CCL y, por ende, sube el blue.<span>&nbsp;</span><strong style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline;\">Todos los dólares se van a alinear a una gran suba.<span>&nbsp;</span></strong>Mantenemos<span>&nbsp;</span><mark class=\"hl_underline\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline; color: inherit; background: transparent; text-decoration: underline 2px rgb(255, 255, 36);\">nuestro pronóstico de un dólar $400 para fin de año</mark>”, comentó el economista Salvador Di Stefano.</p><p class=\"com-paragraph   --s\" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; vertical-align: baseline; orphans: 2; text-align: start; text-indent: 0px; widows: 2; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><a href=\"https://resizer.glanacion.com/resizer/xniVGUvJ-TPMq3FEhxYsxuos8Wk=/879x0/filters:format(webp):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/lanacionar/ZY5JN4AWDNEMJFYYIZDFAMAMTE.JPG\" target=\"_blank\">https://resizer.glanacion.com/resizer/xniVGUvJ-TPMq3FEhxYsxuos8Wk=/879x0/filters:format(webp):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/lanacionar/ZY5JN4AWDNEMJFYYIZDFAMAMTE.JPG</a><font color=\"#333333\" face=\"Georgia, serif\"><span style=\"font-size: 17.8125px;\"></span></font></p><p class=\"com-paragraph   --s\" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; vertical-align: baseline; orphans: 2; text-align: start; text-indent: 0px; widows: 2; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgb(51, 51, 51); font-family: Georgia, &quot;serif&quot;; font-size: 19px;\">El tipo de cambio oficial mayorista se ofreció a $162,12 (+0,2%). En las pantallas del Banco Nación,&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: Georgia, &quot;serif&quot;; font-size: 19px; vertical-align: baseline; color: rgb(51, 51, 51);\">el dólar minorista se vendió a $168 (+0,3%),</span><span style=\"color: rgb(51, 51, 51); font-family: Georgia, &quot;serif&quot;; font-size: 19px;\">&nbsp;cotización de referencia para el dólar ahorro ($277,2), tarjeta ($294) y Qatar ($336).</span></p><p class=\"com-paragraph   --s\" style=\"box-sizing: border-box; margin: 0px 0px 2rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.875rem; vertical-align: baseline; orphans: 2; text-align: start; text-indent: 0px; widows: 2; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgb(51, 51, 51); font-family: Georgia, &quot;serif&quot;; font-size: 19px;\">Según el economista Fernando Marull, la causa que explica la suba del blue se vincula con la situación de “stress” de la deuda en pesos. “</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 700; font-stretch: inherit; line-height: inherit; font-family: Georgia, &quot;serif&quot;; font-size: 19px; vertical-align: baseline; color: rgb(51, 51, 51);\">Asumimos que el BCRA emitirá lo que tenga que emitir para evitar un reperfilamiento. Como viene haciendo, y como pasó en junio. Esos pesos presionarán al dólar paralelo, y a la larga terminarán en los bancos</span><span style=\"color: rgb(51, 51, 51); font-family: Georgia, &quot;serif&quot;; font-size: 19px;\">, en forma de más Leliqs. La incertidumbre sobre la deuda y la pérdida de reservas hoy son los dos factores locales que pueden hacer mover al paralelo“, destacaron desde su consultora, FMyA.</span><font color=\"#333333\" face=\"Georgia, serif\"><span style=\"font-size: 17.8125px;\"><br></span></font></p>', '-34.608118', '-58.370296', 2),
                                                                                                                                      (2, 'Duro golpe a Kicillof: Buenos Aires podría perder hasta $200.000 millones en 2023 si la Corte falla en favor de la Ciudad', 'Se trata de la mitad de las transferencias discrecionales que la provincia prevé recibir de la Nación en medio del año electoral', 'kicilof.png', '<p class=\"com-paragraph   --s\"><strong>La posibilidad de que la Corte Suprema resuelva a favor de la ciudad de Buenos Aires&nbsp;</strong>en la&nbsp;<a class=\"com-link\" title=\"pelea por los fondos de la coparticipaci&oacute;n\" href=\"https://www.lanacion.com.ar/politica/un-fallo-inminente-de-la-corte-puede-devolverle-a-la-ciudad-los-fondos-que-le-recorto-el-gobierno-nid21112022/\" target=\"_self\" data-reactroot=\"\">pelea por los fondos de la coparticipaci&oacute;n</a>&nbsp;que la Naci&oacute;n le detrajo en 2020 no s&oacute;lo ser&iacute;a vista como un triunfo pol&iacute;tico del jefe de gobierno porte&ntilde;o,&nbsp;<strong>Horacio Rodr&iacute;guez Larreta</strong>. Significar&iacute;a, adem&aacute;s,&nbsp;<mark class=\"hl_underline\">un duro golpe para el gobernador Axel Kicillof y las arcas bonaerenses</mark>, que en el acto dejar&iacute;an de percibir aquellos fondos millonarios que les giraba el Tesoro nacional de manera discrecional.</p>\r\n<p class=\"com-paragraph   --s\">El impacto ser&iacute;a tremendo.&nbsp;<mark class=\"hl_underline\">En efecto, el<strong>&nbsp;Fondo de Fortalecimiento Fiscal&nbsp;</strong>bonaerense &ndash;que se nutre de los recursos coparticipables detra&iacute;dos de la Capital&ndash; est&aacute; presupuestado en<strong>&nbsp;$200.745 millones</strong>&nbsp;para el a&ntilde;o pr&oacute;ximo.&nbsp;</mark>Se trata de nada menos que&nbsp;<mark class=\"hl_underline\">la mitad del total de las transferencias discrecionales que la Naci&oacute;n prev&eacute; girarle a la provincia en 2023, un a&ntilde;o electoral.</mark></p>\r\n<p class=\"com-paragraph   --s\">Si el m&aacute;ximo tribunal decidiera devolverle todos esos fondos a la Capital,&nbsp;<strong>Buenos Aires se ver&iacute;a privada de recursos claves</strong>. Por ejemplo, para realizar&nbsp;<strong>obras p&uacute;blicas</strong>: seg&uacute;n el proyecto de presupuesto bonaerense para el a&ntilde;o pr&oacute;ximo, la cifra supera todo lo que se prev&eacute; asignar en gastos de capital al Ministerio de Infraestructura y Servicios P&uacute;blicos: $185.585 millones.</p>\r\n<p class=\"com-paragraph   --s\">Hay m&aacute;s ejemplos comparativos que sirven para dimensionar el posible impacto. Por caso, seg&uacute;n el presupuesto 2023,<strong>&nbsp;esos $200.745 millones implican cinco partidas anuales de inversi&oacute;n de insumos de capital para las fuerzas de seguridad bonaerenses</strong>&nbsp;(compra de patrulleros, helic&oacute;pteros y equipos de seguridad). Son tambi&eacute;n dos presupuestos enteros en gasto para insumos, equipamiento e infraestructura de la Direcci&oacute;n General de Educaci&oacute;n y Cultura, la jurisdicci&oacute;n m&aacute;s importante de la administraci&oacute;n bonaerense.</p>\r\n<p class=\"com-paragraph   --s\">Est&aacute; visto entonces que un fallo adverso de la Corte Suprema ser&iacute;a una p&eacute;sima noticia para las ambiciones de Kicillof &ndash;que aspira a la reelecci&oacute;n&ndash; y para&nbsp;<strong>Cristina y M&aacute;ximo Kirchner</strong>, que necesitan nutrir de recursos discrecionales a su basti&oacute;n electoral.&nbsp;<mark class=\"hl_underline\">En la Casa Rosada recibieron con cierto alivio que el fallo, que intuyen&nbsp;</mark><a class=\"com-link\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; vertical-align: baseline; outline: none; text-decoration: none; color: rgb(2, 80, 201);\" title=\"&lt;mark class=&quot;hl_underline&quot;&gt;desfavorable&lt;/mark&gt;\" href=\"https://www.lanacion.com.ar/politica/tension-entre-la-ciudad-y-la-nacion-por-los-tiempos-de-la-corte-para-definir-la-disputa-por-la-nid24112022/\" target=\"_self\" data-reactroot=\"\"><mark class=\"hl_underline\">desfavorable</mark></a><mark class=\"hl_underline\">, no se firmara el pasado jueves</mark>. La demora no hizo otra cosa que agitar los temores en el gobierno porte&ntilde;o, que sospecha presiones de la Casa Rosada para que la sentencia se posponga hasta el a&ntilde;o pr&oacute;ximo.</p>', '-34.674708', '-58.483356', 2),
                                                                                                                                      (4, 'Rige el nuevo dólar soja y advierten que podría hacer subir las cotizaciones paralelas', 'Los economistas se basan en la emisión asociada y la demanda de productores al liquidar; también señalan las ventajas en términos de reservas y de recaudación', 'dolarSoja.png', '<p class=\"com-paragraph  --capital --s\">En las &uacute;ltimas semanas los d&oacute;lares financieros se despertaron y empezaron a subir y a ponerse al d&iacute;a respecto de la inflaci&oacute;n acumulada. De esta forma, el viernes pasado el blue volvi&oacute; a superar la barrera de los $320,&nbsp;<a class=\"com-link\" title=\"una cifra que no se observaba desde mediados de julio, \" href=\"https://www.lanacion.com.ar/economia/dolar/dolar-hoy-el-blue-supera-una-barrera-y-cierra-la-semana-14-arriba-nid25112022/\" target=\"_self\" data-reactroot=\"\">una cifra que no se observaba desde mediados de julio,&nbsp;</a>mientras que el d&oacute;lar Bolsa (tambi&eacute;n llamado MEP) cerr&oacute; a $316,07 y el contado con liquidaci&oacute;n (CCL), a $323,17. La entrada en vigor de l<strong>a nueva versi&oacute;n del d&oacute;lar soja</strong>&nbsp;&ndash;cotizaci&oacute;n que fue de $200 en el programa original y que ahora ser&aacute; actualizada por inflaci&oacute;n hasta los $230&ndash;&nbsp;<strong>no apaciguar&iacute;a, sino que podr&iacute;a darle m&aacute;s aire a la escalada de los paralelos por la emisi&oacute;n monetaria asociada y la demanda de los productores al liquidar la cosecha y hacerse de pesos.</strong></p>\r\n<p class=\"com-paragraph   --s\">Al igual que en la primera versi&oacute;n del programa, la diferencia entre los d&oacute;lares que el Banco Central compra m&aacute;s caros y los que vende al tipo de cambio oficial&nbsp;<a class=\"com-link\" title=\"ser&aacute; compensada por el Tesoro mediante una letra colocada en el BCRA.\" href=\"https://www.lanacion.com.ar/economia/lo-presentan-hoy-el-gobierno-anuncia-un-nuevo-dolar-soja-nid25112022/\" target=\"_self\" data-reactroot=\"\">ser&aacute; compensada por el Tesoro mediante una letra colocada en el BCRA.</a></p>\r\n<p class=\"com-paragraph   --s\"><strong>&ldquo;En vista del efecto monetario que volver&iacute;a a tener asociada la nueva versi&oacute;n del d&oacute;lar soja, ser&iacute;a previsible una continuidad del reacomodamiento alcista reciente en los d&oacute;lares financieros&rdquo;,&nbsp;</strong>anticip&oacute; el economista Gustavo Ber, y agreg&oacute; que&nbsp;<strong>la emisi&oacute;n monetaria, junto al desaf&iacute;o que representa el creciente roll-over de la deuda en pesos por delante, as&iacute; como el adelantamiento del clima electoral, &ldquo;inclinan a los inversores hacia una mayor dolarizaci&oacute;n,</strong>&nbsp;mientras en contraposici&oacute;n van cerrando las apuestas hacia el carry trade de los &uacute;ltimos tiempos&rdquo;.</p>\r\n<p class=\"com-paragraph   --s\">Por su parte, el analista financiero Christian Buteler desestim&oacute; un impacto inmediato, aunque s&iacute; lo avizora en el mediano plazo, como sucedi&oacute; con la primera versi&oacute;n del d&oacute;lar soja.<strong>&nbsp;&ldquo;No creo que ma&ntilde;ana mismo tengas alg&uacute;n impacto en el tipo de cambio por la implementaci&oacute;n del d&oacute;lar soja. El impacto lo vas a tener cuando los productores empiecen a recibir los pesos, como pas&oacute; con el programa d&oacute;lar soja 1.</strong>&nbsp;A mediados de septiembre, el d&oacute;lar empez&oacute; a subir y termin&oacute; un 10% arriba del m&iacute;nimo que hab&iacute;a tocado ese mismo mes. Obviamente los productores terminan dolarizando parte de los pesos que reciben en el MEP, que es el &uacute;nico mercado en que pueden hacerlo. Entonces la realidad es que no creo que haya un impacto ma&ntilde;ana, pero s&iacute; en el mediano plazo&rdquo;, analiz&oacute;.</p>\r\n<p class=\"com-paragraph   --s\">Para el economista y socio en FMyA Fernando Marull, lo que ocurri&oacute; en septiembre pasado es un hecho, pero entiende que la suba de las cotizaciones paralelas ser&iacute;a algo transitorio, ya que los efectos del plan d&oacute;lar soja fueron m&aacute;s auspiciosos que negativos.</p>', '-34.672555', '-58.479408', 2),
                                                                                                                                      (5, 'Lionel Messi fue amenazado por el boxeador mexicano Canelo Álvarez', 'El campeón mundial de los supermedianos se enojó al ver que el capitán argentino desplazó con un pie una camiseta tricolor en el festejo en el vestuario tras el 2-0 del sábado en Qatar', 'canelo.png', '<p><strong>Lionel Messi</strong>&nbsp;no tiene m&aacute;s &ldquo;enemigos&rdquo; que los hinchas que lo critican, incluso en su pa&iacute;s. Pero este domingo surgi&oacute; sorpresivamente uno p&uacute;blico y de gran peso. Supermediano, exactamente: el&nbsp;<strong>boxeador mexicano Sa&uacute;l &ldquo;Canelo&rdquo; &Aacute;lvarez</strong>. El famoso pugilista pelirrojo escribi&oacute; una&nbsp;<strong>amenaza en Twitter</strong>&nbsp;contra el capit&aacute;n del seleccionado argentino, que este s&aacute;bado venci&oacute; al de M&eacute;xico por 2-0 en el Mundital Qatar 2022.</p>\r\n<p>&iquest;Qu&eacute; sucedi&oacute;? Horas despu&eacute;s del triunfo albiceleste, que dej&oacute; muy complicado al equipo tricolor en su objetivo de pasar de rueda, trascendi&oacute; un video del festejo del plantel albiceleste en el vestuario del estadio de Lusail. Y hubo un detalle que Canelo &Aacute;lvarez&nbsp;<strong>interpret&oacute; como una afrenta a su patria</strong>, y que lo condujo a tuitear furioso en la noche del domingo.</p>\r\n<p><strong>&ldquo;Vieron a Messi limpiando el piso con nuestra playera y bandera ????&rdquo;</strong>, interrog&oacute; el boxeador a sus 2.100.000 seguidores en esa red social. En seguida la pregunta se hizo viral, y a las tres horas ya ten&iacute;a 16.000 retuiteos y 106.000 &ldquo;me gusta&rdquo;.</p>\r\n<p class=\"com-paragraph   --s\">El enojo no qued&oacute; en eso y pas&oacute; a una amenaza velada.&nbsp;<strong>&ldquo;Que le pida a Dios que no me lo encuentre!!&rdquo;</strong>, escribi&oacute; &Aacute;lvarez de inmediato, con&nbsp;<strong>emojis de pu&ntilde;etazos, insultos de una cara iracunda y llamas</strong>. Ese segundo tuit fue m&aacute;s &ldquo;exitoso&rdquo;: 21.000 retuiteos, 114.000 &ldquo;me gusta&rdquo;.</p>\r\n<p class=\"com-paragraph   --s\">El mexicano es hoy por hoy uno de los mejores boxeadores del mundo. No mucho m&aacute;s alto ni m&aacute;s pesado que el futbolista rosarino: 1,74 metros contra 1,7, y 76 kilos contra 72. Pero, por supuesto, est&aacute; preparado como para aniquilar f&iacute;sicamente a un adversario.</p>\r\n<div class=\"mod-banner --caja3_mob  \">\r\n<div id=\"caja3_mob\" class=\"com-banner \" data-slot-group=\"nota\" data-device=\"mobile\" data-subscription=\"false\" data-ad-unit-path=\"/133919216/la_nacion_mobile/Nota/caja3_mob\" data-targeting=\"{&quot;sitio&quot;:&quot;lanacion&quot;,&quot;seccion&quot;:&quot;nota&quot;}\" data-without-hide=\"true\" data-size=\"[[320,100],[300,250],[1,1],[300,450]]\" data-sizemap=\"[]\" data-prebid-enabled=\"true\"></div>\r\n</div>\r\n<div class=\"com-embed --twitter\">&nbsp;</div>', '-34.673014', '-58.484086', 2),
                                                                                                                                      (7, 'Mundial Qatar 2022. Las mujeres de los jugadores de la Selección: visitas, apoyo y desahogo', 'Parejas, padres e hijos del plantel de Scaloni están en Doha y son el sostén del grupo; hoy volvieron a visitarlos en la concentración; dónde se alojan y quiénes son', 'selecEspos.png', '<p>DOHA (Enviado especial).- La tarde del domingo fue de desahogo. Tambi&eacute;n de abrazos y festejos contenidos.<strong>&nbsp;Los familiares de los jugadores volvieron el d&iacute;a despu&eacute;s del triunfo ante M&eacute;xico a encontrarse con los protagonistas.</strong>&nbsp;El semblante fue completamente diferente al del mi&eacute;rcoles pasado, cuando parejas, padres e hijos de los jugadores del plantel argentino tuvieron la misi&oacute;n de levantarles el &aacute;nimo tras el golpe de los sauditas.</p>\r\n<p>&nbsp;</p>\r\n<p class=\"com-paragraph   --s\">En cada Mundial, el entorno familiar de los deportistas se transforma en un&nbsp;<strong>sost&eacute;n esencial&nbsp;</strong>para mantener la actitud en un torneo que se vive con las pulsaciones a mil y cualquier golpe an&iacute;mico puede significar la vuelta a casa.</p>\r\n<p class=\"com-paragraph   --s\">Esta vez, los allegados fueron al predio del seleccionado nacional para reencontrarse&nbsp;<strong>en un clima m&aacute;s distendido</strong>&nbsp;y este domingo compartieron en sus redes sociales los encuentros, para as&iacute; alentar a los argentinos que deber&aacute;n&nbsp;<strong>enfrentarse a Polonia el mi&eacute;rcoles</strong>&nbsp;con el objetivo de ubicarse primeros en el&nbsp;<strong>grupo C.</strong></p>\r\n<div class=\"content-media\">aaaa</div>\r\n<p>\"&gt;</p>', '-34.670331', '-58.477090', 2),
                                                                                                                                      (8, 'El análisis de Jorge Asís sobre el escenario electoral y por qué prefiere “candidatos suplentes”', 'En diálogo con José Del Rio en Comunidad de Negocios, el escritor y periodista opinó sobre el escenario electoral y sobre los principales candidatos a pelear por la presidencia en 2023', 'jorgeAsis.png', '<p>En esa l&iacute;nea, As&iacute;s analiz&oacute; por qu&eacute; todav&iacute;a los principales candidatos no definen su candidatura. &ldquo;Inteligentemente, Massa, Macri, la doctora [Cristina Kirchner], Rodr&iacute;guez Larreta todav&iacute;a no dicen que son candidatos y todos saben que pueden ser candidatos. El problema es que la moneda est&aacute; tan en el aire... todo es incierto&rdquo;, argument&oacute;.</p>\r\n<p>&nbsp;</p>\r\n<p class=\"com-paragraph   --s\">Seg&uacute;n plante&oacute; en otro momento, &ldquo;el albertismo no existe, es una superstici&oacute;n&rdquo;, y continu&oacute;: &ldquo;Es un intento de cuatro, cinco amigos de sostenerlo. Si me contratan como asesor, yo le dir&iacute;a: &lsquo;Est&aacute; bien, h&aacute;galo Presidente, por lo menos para que le traigan el caf&eacute; al menos tibio&rsquo;&rdquo;.</p>\r\n<h2 class=\"com-title --l\">Sobre Cristina Kirchner</h2>\r\n<p class=\"com-paragraph   --s\">Consultado sobre la figura de la vicepresidenta de la Naci&oacute;n y sobre por qu&eacute; se separa del Gobierno, As&iacute;s analiz&oacute;: &ldquo;Intuyo que es una habilidad y una forma tomar distancia de su propia creaci&oacute;n.&nbsp;<strong>El Gobierno es una creaci&oacute;n de la doctora.&nbsp;</strong>El fracaso de Alberto Fern&aacute;ndez es el principal motivo de recuperaci&oacute;n de Mauricio Macri&rdquo;.</p>\r\n<p class=\"com-paragraph   --s\">Tambi&eacute;n, plante&oacute;: &ldquo;Esta mujer hoy tiene que pagar las facturas de cuentas pendientes, por supuesto de su marido. No es una estrategia defensiva. Lo que menos quiere el kirchnerismo es de que se hable de esas caracter&iacute;sticas que tuvo el gran pr&oacute;cer, el gran formador. Creo que la se&ntilde;ora paga la complicidad desinformativa de propietarios de grandes medios de comunicaci&oacute;n que estaban pr&aacute;cticamente unificados con ella&rdquo;.</p>\r\n<p>\"&gt;</p>\r\n<p>\"&gt;</p>\r\n<p>\"&gt;</p>\r\n<p>\"&gt;</p>\r\n<p>\"&gt;</p>', '-34.671743', '-58.478592', 2),
                                                                                                                                      (9, 'El análisis de Jorge Asís sobre el escenario electoral y por qué prefiere “candidatos suplentes”', 'En diálogo con José Del Rio en Comunidad de Negocios, el escritor y periodista opinó sobre el escenario electoral y sobre los principales candidatos a pelear por la presidencia en 2023', 'jorgeAsis.png', '<p class=\"com-paragraph  --capital --s\">El escritor y periodista<strong>&nbsp;Jorge As&iacute;s&nbsp;</strong>opin&oacute; esta noche en di&aacute;logo con Jos&eacute; Del Rio, por LN+, sobre el escenario de la Argentina de ac&aacute; a diciembre y opin&oacute; que en la contienda electoral prefiere que la disputa se juegue entre los&nbsp;<strong>candidatos suplentes.</strong></p>\r\n<p class=\"com-paragraph   --s\">&ldquo;Si el a&ntilde;o que viene la contienda es entre Macri y la doctora [Cristina Kirchner], ser&aacute; un torneo del pasado. Es una competencia para ver cu&aacute;l fue el peor pasado y te garantiza una continuidad de beligerancia, porque los dos tienen much&iacute;sima resistencia&rdquo;, comenz&oacute;. Y continu&oacute;: &ldquo;Es tal vez mejor para la Argentina que sean suplemente. No es una declaraci&oacute;n pol&iacute;tico-ideol&oacute;gica.&nbsp;<strong>Si es Rodr&iacute;guez Larreta contra Massa, ser&aacute; un pa&iacute;s completamente distintito&rdquo;.</strong></p>', '-34.671637', '-58.484043', 4);

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

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `idUsuario`, `idEdicion`, `fecha`, `precio`, `medioDePago`) VALUES
    (1, 6, 1, '2022-11-28', 300, 1);

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
                                                                                                                        (1, 1, 'portadaedicion1.jpg', 300, 2, '2022-11-15', 2),
                                                                                                                        (2, 2, 'lanacEdi2.png', 350, 2, '2022-11-28', 2);

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
                                                                                     (1, 16, 1),
                                                                                     (1, 16, 4),
                                                                                     (1, 17, 2),
                                                                                     (1, 18, 5),
                                                                                     (2, 16, 9),
                                                                                     (2, 18, 7);

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
                                                (3, 'BLOQUEADO'),
                                                (4, 'PENDIENTE'),
                                                (5, 'DESAPROBADO');

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
                                                  (16, 'Economia'),
                                                  (17, 'Politica'),
                                                  (18, 'Deportes');

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
                                                                                                                                       (8, 'Lector', 'lector@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '-34.653141', '-58.475545', 1, '', 2),
                                                                                                                                       (9, 'rodrigo', 'escritor2@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 2, '3e2cfe7f6b908775cb847a1b60576581', 2);

--
-- Índices para tablas volcadas
--

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
    ADD PRIMARY KEY (`idEdicion`,`idSeccion`,`idArticulo`),
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
    MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
    MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
    MODIFY `idEdicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
    MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
    MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
    MODIFY `idSuscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
    MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
    MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
    ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

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
