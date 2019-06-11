-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2019 at 01:27 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartools`
--

-- --------------------------------------------------------

--
-- Table structure for table `alquiler`
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
-- Dumping data for table `alquiler`
--

INSERT INTO `alquiler` (`id`, `id_herramientas`, `estado`, `fecha_alquiler`, `id_usuario`, `megusta`, `comentarios`) VALUES
(1, 1, 'alquilado', '2019-06-07 07:15:26', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `comprar`
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
-- Dumping data for table `comprar`
--

INSERT INTO `comprar` (`id`, `id_recambios`, `estado`, `fecha_venta`, `id_usuario`, `megusta`, `comentarios`) VALUES
(53, 1, 'COMPRADO', '2019-06-11 09:39:48', 1, 1, 'Me gusta'),
(54, 1, 'COMPRADO', '2019-06-11 09:44:20', 1, 1, 'Me gusta'),
(55, 1, 'COMPRADO', '2019-06-11 09:44:40', 1, 1, 'Me gusta'),
(56, 1, 'COMPRADO', '2019-06-11 09:47:35', 1, 1, 'Me gusta'),
(57, 1, 'COMPRADO', '2019-06-11 09:49:00', 1, 1, 'Me gusta'),
(58, 1, 'COMPRADO', '2019-06-11 09:49:12', 1, 1, 'Me gusta'),
(59, 1, 'COMPRADO', '2019-06-11 09:50:06', 1, 1, 'Me gusta'),
(60, 1, 'COMPRADO', '2019-06-11 09:50:57', 1, 1, 'Me gusta'),
(61, 1, 'COMPRADO', '2019-06-11 09:53:26', 1, 1, 'Me gusta'),
(62, 1, 'COMPRADO', '2019-06-11 09:56:44', 1, 1, 'Me gusta'),
(63, 1, 'COMPRADO', '2019-06-11 09:56:56', 1, 1, 'Me gusta'),
(64, 1, 'COMPRADO', '2019-06-11 10:01:15', 1, 1, 'Me gusta'),
(65, 1, 'COMPRADO', '2019-06-11 10:01:19', 1, 1, 'Me gusta'),
(66, 1, 'COMPRADO', '2019-06-11 10:12:06', 1, 1, 'Me gusta');

-- --------------------------------------------------------

--
-- Table structure for table `herramientas`
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
-- Dumping data for table `herramientas`
--

INSERT INTO `herramientas` (`id`, `nombre`, `contenido`, `marca`, `fecha_creacion`, `img`, `precio`, `cantidad`) VALUES
(1, 'Llaves carracas', 'Las llaves carracas son muy útiles, para desmontar cualquier pieza de su vehiculo.', 'facom.png', '2019-05-17 07:16:00', 'carraca.jpg', '9.99', 3),
(2, 'Diagnosis Universal', 'Nuestra diagnosis, está hecha para todo tipo de vehiculos.', 'launch.png', '2019-05-08 12:04:10', 'diagnosis.jpg', '15.99', 3);

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
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
-- Table structure for table `recambios`
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
-- Dumping data for table `recambios`
--

INSERT INTO `recambios` (`id`, `nombre`, `contenido`, `marca`, `fecha_creacion`, `img`, `precio`, `cantidad`) VALUES
(1, 'Agua refrigerante AR-10', 'Esta es una especie agua que sirve para aquellos vehiculos que necesiten agua refrigerante y demas bla bla tu ya me entiendes', 'agua.png', '2019-05-01 06:16:15', 'agua1.png', '4.95', 5),
(2, 'filtro mann filter', 'Este filtro es ideal para aquellos vehiculos que requieren de una excelente respiración, respecto a calidad/precio es de lo mejor del mercado actualmente.', 'man.jpg', '2019-05-13 09:18:11', 'filtro.jpeg', '8.95', 5),
(3, 'luz led', 'Las bombillas led son un tipo de luz que alumbra con mas intensidad que las bombillas amarilla habitual o blanca. El consumo de esta, es menor que la mencionada anteriormente.', 'illume.png', '2019-05-15 11:29:26', 'luzled.jpg', '0.99', 5),
(4, 'aceite repsol 10W-40', 'Aceite repsol 10w-40 es un tipo de aceite semisintético que sirve para regenerar aquellos motores que tienen desgaste, y necesitan una buena lubricación.', 'repsol.png', '2019-05-16 13:32:32', 'aceite.jpg', '14.95', 5),
(5, 'Castrol DEX II', 'Castrol ATF aceite hidráulico para direcciones y cajas de cambio. Uso para aquellos vehículos con cajas de cambios delicadas y sistema de dirección hidráulicas.', 'castrol.png', '2019-05-17 11:00:28', 'hidraulico.jpg', '21.44', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ROLE_USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'yasin', 'info@prueba.com', '$2y$04$lrA3NHnBTe0QPs1D.j1JeuTJOpr.rai4dZquyRgp65sNWcKuOeTaW', 'ROLE_ADMIN'),
(2, 'prueba', 'prueba2@info.com', '$2y$04$ENjb7ro.L.hgFUEVXtP.WOuoWN41oMmLgmiAvsEG3gAzv2I1IDhgO', 'ROLE_USER'),
(3, 'ysn', 'info@info.com', '$2y$04$9LWaEQH/aMyE42K3SqAsme2cFfcO7/3LuHQ./Gkkf/eJ0bpsjbNsG', 'ROLE_USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_recambios` (`id_herramientas`),
  ADD KEY `FK_655BED39FCF8192D` (`id_usuario`);

--
-- Indexes for table `comprar`
--
ALTER TABLE `comprar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkk_id_recambios` (`id_recambios`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_recambios` (`id_recambios`),
  ADD KEY `fk_id_user` (`id_usuario`),
  ADD KEY `unic_fecha_venta` (`fecha_venta`);

--
-- Indexes for table `recambios`
--
ALTER TABLE `recambios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fecha_venta` (`fecha_creacion`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comprar`
--
ALTER TABLE `comprar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recambios`
--
ALTER TABLE `recambios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `FK_655BED39CEC23C14` FOREIGN KEY (`id_herramientas`) REFERENCES `herramientas` (`id`),
  ADD CONSTRAINT `FK_655BED39FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

--
-- Constraints for table `comprar`
--
ALTER TABLE `comprar`
  ADD CONSTRAINT `FK_4195D121C5764CB7` FOREIGN KEY (`id_recambios`) REFERENCES `recambios` (`id`),
  ADD CONSTRAINT `FK_4195D121FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_6A194EF51B14C0F7` FOREIGN KEY (`fecha_venta`) REFERENCES `recambios` (`fecha_creacion`),
  ADD CONSTRAINT `FK_6A194EF5FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
