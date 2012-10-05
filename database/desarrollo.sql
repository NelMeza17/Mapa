-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-10-2012 a las 14:46:48
-- Versión del servidor: 5.1.63
-- Versión de PHP: 5.3.5-1ubuntu7.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `desarrollo`
--
CREATE DATABASE `desarrollo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `desarrollo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenadas`
--

CREATE TABLE IF NOT EXISTS `coordenadas` (
  `coordenadas` text NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `coordenadas`
--

INSERT INTO `coordenadas` (`coordenadas`, `nombre`) VALUES
('19.74520498306206, -101.20409542871096', 'Abarrotes Torreon Nuevo'),
('19.710383192061162, -101.18735844445803', 'Abarrotes El tpk'),
('19.699272555900315, -101.22849280191042', 'Abarrotes El Xolo'),
('19.682827398704124, -101.15843350244143', 'Campo de Golf'),
('19.739388413808882, -101.17250973535158', 'Abarrotes El Gato'),
('19.67361414019128, -101.22280651879885', 'Abarrotes El culeron'),
('19.7219172359149, -101.18577057672121', 'Tec Morelia'),
('19.73405637251836, -101.22486645532229', 'Abarrotes Quinceo'),
('19.708039922102852, -101.20375210595705', 'Abarrotes Desarrollo'),
('19.713595032169668, -101.20299035859682', 'Los Borrachos'),
('19.703191668376714, -101.24083096337893', 'Abarrotes La quemada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `coordenadas` text NOT NULL,
  `tienda` text NOT NULL,
  `producto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`coordenadas`, `tienda`, `producto`) VALUES
('19.74520498306206, -101.20409542871096', 'Abarrotes Torreon Nuevo', 'Pecsi'),
('19.74520498306206, -101.20409542871096', 'Abarrotes Torreon Nuevo', 'Coca-Cola'),
('19.74520498306206, -101.20409542871096', 'Abarrotes Torreon Nuevo', 'Tecate Light'),
('19.710383192061162, -101.18735844445803', 'Abarrotes El tpk', 'Cerveza Corona'),
('19.710383192061162, -101.18735844445803', 'Abarrotes El tpk', 'Cerveza Indio'),
('19.710383192061162, -101.18735844445803', 'Abarrotes El tpk', 'Cigarro Marlboro'),
('19.710383192061162, -101.18735844445803', 'Abarrotes El tpk', 'Cigarros Euro'),
('19.699272555900315, -101.22849280191042', 'Abarrotes El Xolo', 'Pistaches'),
('19.699272555900315, -101.22849280191042', 'Abarrotes El Xolo', 'Cacahuates'),
('19.699272555900315, -101.22849280191042', 'Abarrotes El Xolo', 'Rexona'),
('19.699272555900315, -101.22849280191042', 'Abarrotes El Xolo', 'Sabritas'),
('19.682827398704124, -101.15843350244143', 'Campo de Golf', 'Tacos'),
('19.682827398704124, -101.15843350244143', 'Campo de Golf', 'Agua'),
('19.739388413808882, -101.17250973535158', 'Abarrotes El Gato', 'Mandiles'),
('19.739388413808882, -101.17250973535158', 'Abarrotes El Gato', 'Carteras'),
('19.739388413808882, -101.17250973535158', 'Abarrotes El Gato', 'CafÃ©'),
('19.67361414019128, -101.22280651879885', 'Abarrotes El culeron', 'Coca-Cola'),
('19.7219172359149, -101.18577057672121', 'Tec Morelia', 'Agua'),
('19.7219172359149, -101.18577057672121', 'Tec Morelia', 'Refrescos'),
('19.7219172359149, -101.18577057672121', 'Tec Morelia', 'Baguetes'),
('19.7219172359149, -101.18577057672121', 'Tec Morelia', 'Empanadas'),
('19.73405637251836, -101.22486645532229', 'Abarrotes Quinceo', 'Galletas'),
('19.73405637251836, -101.22486645532229', 'Abarrotes Quinceo', 'Sabritas'),
('19.73405637251836, -101.22486645532229', 'Abarrotes Quinceo', 'Cigarros Euro'),
('19.73405637251836, -101.22486645532229', 'Abarrotes Quinceo', 'Agua'),
('19.73405637251836, -101.22486645532229', 'Abarrotes Quinceo', 'Cerveza Corona'),
('19.73405637251836, -101.22486645532229', 'Abarrotes Quinceo', 'Cactus'),
('19.67361414019128, -101.22280651879885', 'Abarrotes El culeron', 'Pepsi'),
('19.67361414019128, -101.22280651879885', 'Abarrotes El culeron', 'Vasos'),
('19.67361414019128, -101.22280651879885', 'Abarrotes El culeron', 'Hielos'),
('19.699272555900315, -101.22849280191042', 'Abarrotes El Xolo', 'Agua'),
('19.67361414019128, -101.22280651879885', 'Abarrotes El culeron', 'Cocada'),
('19.713595032169668, -101.20299035859682', 'Los Borrachos', 'Cerveza Victoria'),
('19.713595032169668, -101.20299035859682', 'Los Borrachos', 'Tostadas de ceviche'),
('19.703191668376714, -101.24083096337893', 'Abarrotes La quemada', 'Maiz'),
('19.703191668376714, -101.24083096337893', 'Abarrotes La quemada', 'Harina'),
('19.703191668376714, -101.24083096337893', 'Abarrotes La quemada', 'Sorgo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `user`
--

INSERT INTO `user` (`usuario`, `password`) VALUES
('root', '123456');
