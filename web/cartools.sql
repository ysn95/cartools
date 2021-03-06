-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2019 a las 21:08:24
-- Versión del servidor: 5.7.25-0ubuntu0.16.04.2
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cartools`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_herramientas` int(10) UNSIGNED DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ALQUILADO',
  `fecha_alquiler` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `megusta` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `comentarios` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`id`, `id_herramientas`, `estado`, `fecha_alquiler`, `id_usuario`, `megusta`, `comentarios`) VALUES
(1, 1, 'alquilado', '2019-06-07 07:15:26', 1, 0, ''),
(2, 1, 'ALQUILADO', '2019-06-12 10:50:00', 1, 0, 'sdffds'),
(3, 1, 'ALQUILADO', '2019-06-16 11:45:09', 1, 0, 'Me gusta'),
(4, 1, 'ALQUILADO', '2019-06-12 20:52:54', 1, 0, 'Buenas herramientas.'),
(5, 1, 'ALQUILADO', '2019-06-16 11:45:09', 1, 0, 'Me gusta'),
(6, 2, 'ALQUILADO', '2019-06-12 20:55:33', 1, 0, 'Buen producto'),
(7, 2, 'ALQUILADO', '2019-06-12 20:55:33', 1, 1, 'Me gusta'),
(8, 1, 'ALQUILADO', '2019-06-16 11:45:09', 1, 0, 'Me gusta'),
(9, 1, 'ALQUILADO', '2019-06-16 11:45:22', 1, 0, 'Me gusta'),
(10, 1, 'ALQUILADO', '2019-06-16 11:45:40', 1, 0, 'Buen producto.'),
(11, 1, 'ALQUILADO', '2019-06-16 19:00:21', 1, 0, 'Me gusta'),
(12, 1, 'ALQUILADO', '2019-06-16 11:48:03', 1, 0, 'Hola.'),
(13, 1, 'ALQUILADO', '2019-06-16 19:00:32', 1, 1, 'Me gusta'),
(14, 1, 'ALQUILADO', '2019-06-16 19:00:47', 1, 0, 'Hola carracas.'),
(15, 1, 'ALQUILADO', '2019-06-16 19:04:00', 2, 0, 'Me gusta'),
(16, 1, 'ALQUILADO', '2019-06-16 19:04:06', 2, 1, 'Me gusta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprar`
--

CREATE TABLE `comprar` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_recambios` int(10) UNSIGNED DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'COMPRADO',
  `fecha_venta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `megusta` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `comentarios` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comprar`
--

INSERT INTO `comprar` (`id`, `id_recambios`, `estado`, `fecha_venta`, `id_usuario`, `megusta`, `comentarios`) VALUES
(122, 4, 'COMPRADO', '2019-06-16 09:35:09', 1, 0, 'Me gusta'),
(123, 1, 'COMPRADO', '2019-06-16 09:35:20', 1, 0, 'Me gusta'),
(124, 1, 'COMPRADO', '2019-06-16 09:35:33', 1, 0, 'Me gusta'),
(125, 1, 'COMPRADO', '2019-06-16 09:47:16', 1, 0, 'Me gusta'),
(126, 1, 'COMPRADO', '2019-06-16 09:47:45', 1, 0, 'El producto ha sido bastante bueno.'),
(127, 1, 'COMPRADO', '2019-06-16 09:47:59', 1, 0, 'Me gusta'),
(128, 1, 'COMPRADO', '2019-06-16 09:48:11', 1, 0, 'Somos buena gente.'),
(129, 1, 'COMPRADO', '2019-06-16 09:49:40', 1, 0, 'Me gusta'),
(130, 1, 'COMPRADO', '2019-06-16 09:49:58', 1, 0, 'Un producto excelente.'),
(131, 1, 'COMPRADO', '2019-06-16 09:52:42', 1, 0, 'Me gusta'),
(132, 1, 'COMPRADO', '2019-06-16 09:52:41', 1, 0, 'que tiene que ver?'),
(133, 1, 'COMPRADO', '2019-06-16 09:53:50', 1, 0, 'Me gusta'),
(134, 1, 'COMPRADO', '2019-06-16 09:53:50', 1, 0, 'El producto ha sido bastante bueno.'),
(135, 1, 'COMPRADO', '2019-06-16 09:54:33', 1, 0, 'Me gusta'),
(136, 1, 'COMPRADO', '2019-06-16 09:54:40', 1, 0, 'Me gusta'),
(137, 1, 'COMPRADO', '2019-06-16 09:54:48', 1, 0, 'Me gusta'),
(138, 1, 'COMPRADO', '2019-06-16 09:55:24', 1, 0, 'Me gusta'),
(139, 1, 'COMPRADO', '2019-06-16 10:06:02', 1, 0, 'Me gusta'),
(140, 1, 'COMPRADO', '2019-06-16 09:59:49', 1, 0, 'hola'),
(141, 1, 'COMPRADO', '2019-06-16 10:06:02', 1, 0, 'Me gusta'),
(142, 1, 'COMPRADO', '2019-06-16 10:06:02', 1, 0, 'Me gusta'),
(143, 1, 'COMPRADO', '2019-06-16 10:07:16', 1, 0, 'Me gusta'),
(144, 1, 'COMPRADO', '2019-06-16 10:07:16', 1, 0, 'Que bueno!'),
(145, 1, 'COMPRADO', '2019-06-16 11:25:25', 1, 0, 'Me gusta'),
(146, 1, 'COMPRADO', '2019-06-16 11:24:54', 1, 0, 'Un producto excelente.'),
(147, 1, 'COMPRADO', '2019-06-16 18:33:01', 1, 0, 'Me gusta'),
(148, 1, 'COMPRADO', '2019-06-16 18:26:08', 2, 1, 'Me gusta'),
(149, 1, 'COMPRADO', '2019-06-16 18:34:37', 1, 0, 'Me gusta'),
(150, 1, 'COMPRADO', '2019-06-16 18:51:38', 1, 0, 'Me gusta'),
(151, 1, 'COMPRADO', '2019-06-16 18:51:44', 1, 0, 'Me gusta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contenido` text NOT NULL,
  `marca` varchar(20) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `img` varchar(20) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`id`, `nombre`, `contenido`, `marca`, `fecha_creacion`, `img`, `precio`, `cantidad`) VALUES
(1, 'Llaves carracas', 'Las llaves carracas son muy útiles, para desmontar cualquier pieza de su vehiculo.', 'facom.png', '2019-05-17 07:16:00', 'carraca.jpg', '9.99', 3),
(2, 'Diagnosis Universal', 'Nuestra diagnosis, está hecha para todo tipo de vehiculos.', 'launch.png', '2019-05-08 12:04:10', 'diagnosis.jpg', '15.99', 3),
(3, 'Arrancador portátil', 'Excelente arrancador para aquellos coches que necesiten bastante potencia para su arranque 12V/24V.', 'logo-bosch.jpg', '2019-06-11 13:39:00', 'bosch.jpg', '17.99', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `fecha_venta` datetime DEFAULT NULL,
  `id_recambios` int(10) UNSIGNED NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recambios`
--

CREATE TABLE `recambios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `img` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recambios`
--

INSERT INTO `recambios` (`id`, `nombre`, `contenido`, `marca`, `fecha_creacion`, `img`, `precio`, `cantidad`) VALUES
(1, 'Agua refrigerante AR-10', 'Esta es una especie agua que sirve para aquellos vehiculos que necesiten agua refrigerante y demas bla bla tu ya me entiendes', 'agua.png', '2019-05-01 06:16:15', 'agua1.png', '4.95', 5),
(2, 'filtro mann filter', 'Este filtro es ideal para aquellos vehiculos que requieren de una excelente respiración, respecto a calidad/precio es de lo mejor del mercado actualmente.', 'man.jpg', '2019-05-13 09:18:11', 'filtro.jpeg', '8.95', 5),
(3, 'luz led', 'Las bombillas led son un tipo de luz que alumbra con mas intensidad que las bombillas amarilla habitual o blanca. El consumo de esta, es menor que la mencionada anteriormente.', 'illume.png', '2019-05-15 11:29:26', 'luzled.jpg', '0.99', 5),
(4, 'aceite repsol 10W-40', 'Aceite repsol 10w-40 es un tipo de aceite semisintético que sirve para regenerar aquellos motores que tienen desgaste, y necesitan una buena lubricación.', 'repsol.png', '2019-05-16 13:32:32', 'aceite.jpg', '14.95', 5),
(5, 'Castrol DEX II', 'Castrol ATF aceite hidráulico para direcciones y cajas de cambio. Uso para aquellos vehículos con cajas de cambios delicadas y sistema de dirección hidráulicas.', 'castrol.png', '2019-05-17 11:00:28', 'hidraulico.jpg', '21.44', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ROLE_USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'yasin', 'info@prueba.com', '$2y$04$lrA3NHnBTe0QPs1D.j1JeuTJOpr.rai4dZquyRgp65sNWcKuOeTaW', 'ROLE_ADMIN'),
(2, 'prueba', 'prueba2@info.com', '$2y$04$ENjb7ro.L.hgFUEVXtP.WOuoWN41oMmLgmiAvsEG3gAzv2I1IDhgO', 'ROLE_USER'),
(3, 'ysn', 'info@info.com', '$2y$04$9LWaEQH/aMyE42K3SqAsme2cFfcO7/3LuHQ./Gkkf/eJ0bpsjbNsG', 'ROLE_USER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_recambios` (`id_herramientas`),
  ADD KEY `FK_655BED39FCF8192D` (`id_usuario`);

--
-- Indices de la tabla `comprar`
--
ALTER TABLE `comprar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkk_id_recambios` (`id_recambios`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_recambios` (`id_recambios`),
  ADD KEY `fk_id_user` (`id_usuario`),
  ADD KEY `unic_fecha_venta` (`fecha_venta`);

--
-- Indices de la tabla `recambios`
--
ALTER TABLE `recambios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fecha_venta` (`fecha_creacion`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `comprar`
--
ALTER TABLE `comprar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recambios`
--
ALTER TABLE `recambios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `FK_655BED39CEC23C14` FOREIGN KEY (`id_herramientas`) REFERENCES `herramientas` (`id`),
  ADD CONSTRAINT `FK_655BED39FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `comprar`
--
ALTER TABLE `comprar`
  ADD CONSTRAINT `FK_4195D121C5764CB7` FOREIGN KEY (`id_recambios`) REFERENCES `recambios` (`id`),
  ADD CONSTRAINT `FK_4195D121FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_6A194EF51B14C0F7` FOREIGN KEY (`fecha_venta`) REFERENCES `recambios` (`fecha_creacion`),
  ADD CONSTRAINT `FK_6A194EF5FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
