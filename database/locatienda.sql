-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 18-10-2012 a las 18:25:55
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `locatienda`
-- 
CREATE DATABASE `locatienda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `locatienda`;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `comentarios`
-- 

CREATE TABLE `comentarios` (
  `idcomentarios` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY  (`idcomentarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `comentarios`
-- 

INSERT INTO `comentarios` VALUES (1, 'makko', 'marcotrunks@hotmail.com', '2012-10-12', 'Este es un comentario como invitado');
INSERT INTO `comentarios` VALUES (3, 'tpk', 'algo@hotmail.com', '2012-10-12', 'Este es un comentario como usuario');
INSERT INTO `comentarios` VALUES (4, 'tpk', 'algo@gmail.com', '2012-10-18', 'Hola este otro comentario como Invitado !!! ');
INSERT INTO `comentarios` VALUES (5, 'Lulu', 'algo@yahoo.com', '2012-10-18', 'Hola otro comentario');
INSERT INTO `comentarios` VALUES (6, 'Gaby', 'gaby@hotmail.com', '2012-10-18', 'Hola es un comentario !! ');
INSERT INTO `comentarios` VALUES (7, 'wendy', 'marcotrunks@hotmail.com', '2012-10-18', 'Hola este un comentario haber si jala el correo ');
INSERT INTO `comentarios` VALUES (8, 'wendy', 'marcotrunks@hotmail.com', '2012-10-18', 'Hola este un comentario haber si jala el correo ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `productos`
-- 

CREATE TABLE `productos` (
  `idtienda` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` varchar(15) NOT NULL,
  PRIMARY KEY  (`idtienda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `productos`
-- 

INSERT INTO `productos` VALUES (2, 'coca 600ml', '8');
INSERT INTO `productos` VALUES (3, 'coca 1l', '11');
INSERT INTO `productos` VALUES (4, 'pepsi 600ml', '7');
INSERT INTO `productos` VALUES (6, 'Galletas', '12');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tienda`
-- 

CREATE TABLE `tienda` (
  `idtienda` int(11) NOT NULL auto_increment,
  `nombre` varchar(60) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `colonia` varchar(25) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `telefono` varchar(15) default NULL,
  `latitud` varchar(45) NOT NULL,
  `longitud` varchar(45) NOT NULL,
  `imagen` text NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY  (`idtienda`),
  KEY `fk_tienda_user1_idx` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `tienda`
-- 

INSERT INTO `tienda` VALUES (2, 'La tiendita', 'privada manuel buen dia', 'obrera', '122', '4432145152', '19.7219172359149', '-101.18577057672121', 'tienda.png', 1);
INSERT INTO `tienda` VALUES (3, 'abarrotero alvin', 'manantial agua blanca', 'manatiales', '184', '3273194', '19.74520498306206', '-101.20409542871096', 'tienda.png', 2);
INSERT INTO `tienda` VALUES (4, 'tienda pake', 'el cholo', 'fidel', '123', NULL, '19.699272555900315', '-101.22849280191042', 'tienda.png', 3);
INSERT INTO `tienda` VALUES (6, 'tiendita', 'agua clara', '', '1234', '3122880', '19.700593', '-101.186421', 'error.png', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `user`
-- 

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL auto_increment,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY  (`iduser`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `user`
-- 

INSERT INTO `user` VALUES (1, 'tpk', '123456', 'marcotrunks18@gmail.com');
INSERT INTO `user` VALUES (2, 'alvin', '123456', 'alvin@hotmail.com');
INSERT INTO `user` VALUES (3, 'pake', '123456', 'xolo@gmail.com');
INSERT INTO `user` VALUES (4, 'makko', '123', 'algo@yahoo.com');
INSERT INTO `user` VALUES (5, 'ale', '123', 'ale@hotmail.com');
INSERT INTO `user` VALUES (6, 'wendy', '123', 'marcotrunks@hotmail.com');
INSERT INTO `user` VALUES (7, 'heidi', '123', 'marcotrunks@hotmail.com');

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `productos`
-- 
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_tienda` FOREIGN KEY (`idtienda`) REFERENCES `tienda` (`idtienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Filtros para la tabla `tienda`
-- 
ALTER TABLE `tienda`
  ADD CONSTRAINT `fk_tienda_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
