-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2017 a las 18:44:38
-- Versión del servidor: 5.7.10-log
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_yii2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `nombre_articulo` varchar(100) DEFAULT NULL,
  `Url` text,
  `descripcion` text,
  `puntaje_articulo` decimal(10,0) DEFAULT NULL,
  `ciudad` varchar(15) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL,
  `fehca_revision` date DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_estados` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_autores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`,`id_escuela`,`id_estados`,`id_categoria`),
  ADD UNIQUE KEY `id_categoria_3` (`id_categoria`),
  ADD KEY `Escuelas_Articulo` (`id_escuela`),
  ADD KEY `Estados_Articulo` (`id_estados`),
  ADD KEY `id_autores` (`id_autores`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_categoria_2` (`id_categoria`),
  ADD KEY `id_estados` (`id_estados`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
