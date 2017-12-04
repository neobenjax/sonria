-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2017 a las 22:18:24
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sonria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_sucursales`
--

CREATE TABLE `img_sucursales` (
  `img_id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `img_sucursal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `img_sucursales`
--

INSERT INTO `img_sucursales` (`img_id`, `img`, `img_sucursal`) VALUES
(1, 'aragon1.jpg', 1),
(2, 'aragon2.jpg', 1),
(67, 'IMG_0051.jpg', 23),
(4, 'aragon4.jpg', 1),
(5, 'coapa1.jpg', 2),
(6, 'coapa2.jpg', 2),
(7, 'coapa3.jpg', 2),
(8, 'coapa4.jpg', 2),
(9, 'valle1.jpg', 3),
(10, 'valle2.jpg', 3),
(11, 'valle3.jpg', 3),
(12, 'valle4.jpg', 3),
(13, 'lindavista1.jpg', 4),
(14, 'lindavista2.jpg', 4),
(15, 'lindavista3.jpg', 4),
(16, 'lindavista4.jpg', 4),
(82, 'IMG_0116.jpg', 5),
(55, 'Logo Sonria Centro.png', 22),
(19, 'neza3.jpg', 5),
(20, 'neza4.jpg', 5),
(144, 'FotoA.jpeg', 6),
(25, 'taxquena1.jpg', 7),
(88, 'IMG_0001.jpg', 7),
(27, 'taxquena3.jpg', 7),
(28, 'taxquena4.jpg', 7),
(51, 'rockanfella.jpg', 19),
(50, 'cine.jpg', 20),
(54, 'mpa-todo (1).png', 21),
(34, 'img_javier.png', 15),
(66, 'IMG_0050.jpg', 23),
(57, '2.jpg', 23),
(58, '4.jpg', 23),
(119, 'PolOld.jpg', 25),
(60, '8.jpg', 23),
(61, 'IMG_0091.jpg', 1),
(62, 'IMG_0094.jpg', 1),
(63, 'IMG_0102.jpg', 1),
(64, 'IMG_0106.jpg', 1),
(68, 'IMG_0054.jpg', 23),
(76, 'IMG_0036AA.jpg', 2),
(72, 'IMG_0038.jpg', 2),
(71, 'IMG_0037.jpg', 2),
(73, 'IMG_0042.jpg', 2),
(74, 'IMG_0044.jpg', 2),
(75, 'IMG_0045.jpg', 2),
(77, 'IMG_0058.jpg', 4),
(78, 'IMG_0059.jpg', 4),
(79, 'IMG_0061.jpg', 4),
(80, 'IMG_0071.jpg', 4),
(81, 'IMG_0082.jpg', 4),
(83, 'IMG_0121.jpg', 5),
(84, 'IMG_0123.jpg', 5),
(85, 'IMG_0125.jpg', 5),
(86, 'IMG_0130.jpg', 5),
(87, 'IMG_0132.jpg', 5),
(89, 'IMG_0013.jpg', 7),
(90, 'IMG_0016.jpg', 7),
(91, 'IMG_0021.jpg', 7),
(92, 'IMG_0022.jpg', 7),
(93, 'IMG_0027.jpg', 7),
(143, 'FotoB.jpeg', 6),
(142, 'FotoC.jpeg', 6),
(141, 'FotoD.jpg', 6),
(99, 'IMG_6665.jpg', 6),
(100, 'IMG_0140.jpg', 3),
(101, 'IMG_0147.jpg', 3),
(102, 'IMG_0150.jpg', 3),
(103, 'IMG_0156.jpg', 3),
(106, 'IMG_015aaaa7.jpg', 3),
(118, 'LV1.jpg', 24),
(117, 'LV2.jpg', 24),
(116, 'LV3.jpg', 24),
(137, 'Polanc1.jpg', 26),
(136, 'Polanc2.jpg', 26),
(135, 'Polanc3.jpg', 26),
(134, 'Polanc4.jpg', 26),
(133, 'Polanc4A.jpg', 26),
(132, 'Polanc5.jpg', 26),
(131, 'Polanc6.jpg', 26),
(140, '7-Quevedo.jpg', 27),
(139, '4AA.jpg', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `novedades_id` int(11) NOT NULL,
  `novedades_titulo` varchar(200) NOT NULL,
  `novedades_subtitulo` varchar(500) NOT NULL,
  `novedades_desc` text NOT NULL,
  `novedades_img` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`novedades_id`, `novedades_titulo`, `novedades_subtitulo`, `novedades_desc`, `novedades_img`) VALUES
(10, 'Prueba', 'Subtitulo Prueba', '<p>Algo de texto de prueba de la <b>promociÃ³n</b></p>', '984368.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `promocion_id` int(11) NOT NULL,
  `promocion_titulo` varchar(200) DEFAULT NULL,
  `promocion_desc` varchar(1000) DEFAULT NULL,
  `promocion_img` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`promocion_id`, `promocion_titulo`, `promocion_desc`, `promocion_img`) VALUES
(189, NULL, NULL, '201705-Web-NuncaDejesSonreir.png'),
(190, NULL, NULL, '201705-Web-SonrisaPuerta.png'),
(191, NULL, NULL, '201705-Web-Mision.png'),
(192, NULL, NULL, '201705-Web-HorariosNuevos.png'),
(193, NULL, NULL, '201705-Web-Membresia.png'),
(195, NULL, NULL, '201705-Web-Ubicaciones.png'),
(217, NULL, NULL, '201709-Web-Implantes2.png'),
(197, NULL, NULL, '201705-Web-ValoracionGratis.png'),
(228, NULL, NULL, '1.jpg'),
(223, NULL, NULL, '6.png'),
(200, NULL, NULL, '201707-Web-ProtesisFija.png'),
(224, NULL, NULL, '5.png'),
(225, NULL, NULL, '4.png'),
(226, NULL, NULL, '3.png'),
(227, NULL, NULL, '2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `sucursal_id` int(11) NOT NULL,
  `sucursal` varchar(200) NOT NULL,
  `sucursal_direccion` text,
  `sucursal_tel` varchar(100) DEFAULT NULL,
  `sucursal_mapa` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`sucursal_id`, `sucursal`, `sucursal_direccion`, `sucursal_tel`, `sucursal_mapa`) VALUES
(1, 'Aragon', '<p>				Av Central 120, local 259<br />\r\nPlaza Aragon <br />\r\nCol. Rinconada de Aragon<br />\r\nEcatepec,&nbsp;Edo. de Mexico</p><p>Lunes a Viernes: <b>11 a.m. a 8 p.m.</b></p><p>Sabados: <b>9 a.m. a 6 p.m.</b></p><p>Domingo:&nbsp;<strong>10 a.m. a 6 p.m.</strong></p>', '55 11 34 00', '<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2aaff78e24c3d398&ie=UTF8&t=m&ll=19.530308,-99.027114&spn=0.010112,0.012832&z=15&output=embed"></iframe><br /><small><a href="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2aaff78e24c3d398&ie=UTF8&t=m&ll=19.530308,-99.027114&spn=0.010112,0.012832&z=15&source=embed" target="_blank">Ver en Google Maps</a></small>'),
(2, 'Coapa', '<p>				Calzada del Hueso 503<br />\r\nPlaza Fiesta Coapa, local 12-E <br />\r\nCol. los Girasoles <br />\r\nDel. Coyoacan<br />CMDX</p><p>Lunes a Viernes:&nbsp;<strong>11 a.m. a 8 p.m.</strong></p><p>Sabados:&nbsp;<strong>9 a.m. a 6 p.m.</strong></p>', '55 11 34 00', NULL),
(3, 'Del Valle', '<p>				Xola 710<br />\r\nColonia Del Valle<br />\r\nDel. Benito Juarez<br />\r\nCDMX</p><p>Lunes a Viernes: <b>11&nbsp;a.m. a 8 p.m.</b></p><p>Sabados:&nbsp;<b>9 a.m. a 6 p.m.</b></p>', '55 11 34 00', '<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2ad4f358c4c17f24&ie=UTF8&t=m&source=embed&ll=19.397023,-99.163842&spn=0.01012,0.012832&z=15&output=embed"></iframe><br /><small><a href="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2ad4f358c4c17f24&ie=UTF8&t=m&source=embed&ll=19.397023,-99.163842&spn=0.01012,0.012832&z=15" target="_blank">Ver en Google Maps</a></small>'),
(4, 'Lindavista', '<p>				Montevideo 368<br />\r\nCol. Lindavista<br />\r\nDel. Gustavo A. Madero<br />\r\nCDMX</p><p>Lunes a Viernes:&nbsp;<strong>11 a.m. a 8 p.m.</strong></p><p>Sabados:&nbsp;<strong>9 a.m. a 6 p.m.</strong></p>', '55 11 34 00', '<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2aaa5fd1806cdae8&ie=UTF8&t=m&ll=19.490868,-99.134445&spn=0.010114,0.012832&z=15&output=embed"></iframe><br /><small><a href="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2aaa5fd1806cdae8&ie=UTF8&t=m&ll=19.490868,-99.134445&spn=0.010114,0.012832&z=15&source=embed">Google Maps</a></small>'),
(5, 'Neza', '<p>				Av. Lopez Mateos 110<br />\r\nCol. Metropolitana 1ra. Seccion<br />\r\nCiudad Netzahualcoyotl<br />\r\nEdo. de Mexico						</p><p>Lunes a Viernes:&nbsp;<strong>9 a.m. a 6 p.m.</strong></p><p>Sabados:&nbsp;<strong>9 a.m. a 6 p.m.</strong></p>', '55 11 34 00', '<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2ab8df2464b9934d&ie=UTF8&t=m&ll=19.395849,-99.031534&spn=0.01012,0.012832&z=15&output=embed"></iframe><br /><small><a href="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2ab8df2464b9934d&ie=UTF8&t=m&ll=19.395849,-99.031534&spn=0.01012,0.012832&z=15&source=embed" target="_blank">Ver en Google Maps</a></small>'),
(6, 'Roma', '<p>				Tonala 6<br />\r\nColonia Roma<br />\r\nDel. Cuauhtemoc<br />\r\nCDMX</p><p>Lunes a Viernes:&nbsp;<b>9 a.m. a 9 p.m.</b></p><p>Sabados:&nbsp;<b>9 a.m. a 6 p.m.</b></p>', '55 11 34 00', '<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2ad2fd526fab8d6e&ie=UTF8&t=m&ll=19.421956,-99.163413&spn=0.010118,0.012832&z=15&output=embed"></iframe><br /><small><a href="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2ad2fd526fab8d6e&ie=UTF8&t=m&ll=19.421956,-99.163413&spn=0.010118,0.012832&z=15&source=embed" target="_blank" >Ver en Google Maps</a></small>'),
(7, 'Taxquena', '<p>				Av. Taxquena 1379<br />\r\nCol. Campestre Churubusco <br />\r\nDel. Coyoacan<br />\r\nCDMX 						</p><p>Lunes a Viernes:&nbsp;<strong>11 a.m. a 8 p.m.</strong></p><p>Sabados:&nbsp;<strong>9 a.m. a 6 p.m.</strong></p>', '55 11 34 00', '<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2ad179ae0c57851c&ie=UTF8&t=m&ll=19.340949,-99.138222&spn=0.040493,0.051327&z=13&output=embed"></iframe><br /><small><a href="https://maps.google.com.mx/maps/ms?msa=0&msid=206786743212860266600.0004e2ad179ae0c57851c&ie=UTF8&t=m&ll=19.340949,-99.138222&spn=0.040493,0.051327&z=13&source=embed" target="_blank">Ver en Google Maps</a></small>'),
(23, 'Barranca del Muerto', '<p>Barranca Del Muerto No 400</p><div>Colonia Los Alpes</div><div>Del. Alvaro Obregon</div><div>CDMX</div><div>Lunes a Viernes: <strong>9 a.m. a 9 p.m.</strong></div><div><p>Sabados:&nbsp;<strong>9 a.m. a 6 p.m.</strong></p></div>', '55 11 34 00', '<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps?q=19.362989,-99.189597&num=1&ie=UTF8&t=m&z=14&ll=19.363014,-99.189184&output=embed"></iframe><br /><small><a href="https://maps.google.com.mx/maps?q=19.362989,-99.189597&num=1&ie=UTF8&t=m&z=14&ll=19.363014,-99.189184&source=embed" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>'),
(24, 'Lomas Verdes', '<p>Av. Lomas Verdes 375<br />Col. La Altena II<br />Naucalpan,&nbsp;Edo. de Mexico</p><p>Lunes a Viernes:&nbsp;<b>11 a.m. a 8 p.m.</b></p><p>Sabados:&nbsp;<b>9 a.m. a 6 p.m.</b></p>', '55 11 34 00', NULL),
(26, 'Polanco', '<p>Av Thiers 195<br />Col. Anzures<br />Del. Miguel Hidalgo<br />CDMX</p><p>Lunes a Viernes:&nbsp;<b>11 a.m. a 8 p.m.</b></p><p>Sabados:&nbsp;<b>9 a.m. a 6 p.m.</b></p>', '55 11 34 00', NULL),
(27, 'Miguel A. Quevedo', '<p>Miguel Angel de Quevedo 332</p><div>Col. Barrio de Santa Catarina</div><div>Del. Coyoacan.</div><div>CDMX<br /><p>Lunes a Viernes:&nbsp;<strong>11 a.m. a 8 p.m.</strong></p><p>Sabados:&nbsp;9 a.m. a 6 p.m.</p>										</div>', '55 11 34 00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `tratamiento_id` int(11) NOT NULL,
  `tratamiento` varchar(200) NOT NULL,
  `tratamiento_subtitulo` varchar(500) NOT NULL,
  `tratamiento_banner` varchar(200) NOT NULL,
  `tratamiento_header` varchar(200) NOT NULL,
  `tratamiento_contenido` text NOT NULL,
  `tratamiento_video` varchar(500) NOT NULL,
  `tratamiento_faqs` text NOT NULL,
  `tratamiento_menu` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_pwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_mail`, `usuario_pwd`) VALUES
(1, 'admin', 'admin_sonria123'),
(2, 'angel', 'angel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `img_sucursales`
--
ALTER TABLE `img_sucursales`
  ADD PRIMARY KEY (`img_id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`novedades_id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`promocion_id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`sucursal_id`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`tratamiento_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `img_sucursales`
--
ALTER TABLE `img_sucursales`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `novedades_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `promocion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `sucursal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `tratamiento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
