-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 05-11-2012 a las 20:41:47
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `locatienda`
-- 
CREATE DATABASE `locatienda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `comentarios`
-- 

INSERT INTO `comentarios` VALUES (3, 'bWFyY28=', 'bWFyY290cnVua3MxMjNAZ21haWwuY29t', '0000-00-00', 'RXN0ZSBlcyB1biBjb21lbnRhcmlvIGVuY3JpcHRhZG8=');
INSERT INTO `comentarios` VALUES (4, 'am9zZQ==', 'am9zZUBnbWFpbC5jb20=', '2012-11-01', 'RXMgZXMgdW4gY29tZW50YXJpbyBlbmNyaXB0YWRvIGNvbiBmZWNoYSBidWVuYQ==');
INSERT INTO `comentarios` VALUES (5, 'bWFra28=', 'bWFyY290cnVua3MxOEBob3RtYWlsLmNvbQ==', '2012-11-01', 'RXN0ZXMgZXMgdW4gY29tZW50YXJpbyBlbmNyaXB0YWRvIGNvbW8gdXNlcg==');
INSERT INTO `comentarios` VALUES (7, 'aW52aXRhZG8=', 'bWFyY29AaG90bWFpbC5jb20=', '2012-11-01', 'RXN0ZSBlcyB1biBjb21lbnRhcmlvIGNvbW8gaW52aXRhZG8gZW5jcmlwdGFkbw==');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `productos`
-- 

CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL auto_increment,
  `idtienda` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` varchar(15) NOT NULL,
  PRIMARY KEY  (`idproductos`),
  KEY `idtienda` (`idtienda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- 
-- Volcar la base de datos para la tabla `productos`
-- 

INSERT INTO `productos` VALUES (8, 9, 'Q2VydmV6YQ==', 'Mjg=');
INSERT INTO `productos` VALUES (9, 9, 'UmVmcmVzY28=', 'MTA=');
INSERT INTO `productos` VALUES (11, 9, 'Q2FuZGFkbw==', 'MjU=');
INSERT INTO `productos` VALUES (12, 11, 'UHVsc2VyYXM=', 'MTk=');
INSERT INTO `productos` VALUES (15, 9, 'TW91c2U=', 'NjA=');
INSERT INTO `productos` VALUES (17, 9, 'UGxhdG9z', 'MjI=');
INSERT INTO `productos` VALUES (18, 9, 'R29ycmE=', 'NDU=');
INSERT INTO `productos` VALUES (19, 9, 'VGFsY28=', 'MTg=');
INSERT INTO `productos` VALUES (20, 11, 'Q2VydmV6YQ==', 'MTQ=');
INSERT INTO `productos` VALUES (22, 9, 'TGFwaXo=', 'Ng==');
INSERT INTO `productos` VALUES (23, 9, 'VXNi', 'MTIw');
INSERT INTO `productos` VALUES (24, 9, 'Q2VydmV6YQ==', 'Mjg=');
INSERT INTO `productos` VALUES (25, 9, 'U2FjYWNlamFz', 'MTA=');
INSERT INTO `productos` VALUES (28, 12, 'QWd1YXJkaWVudGU=', 'MTI=');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `tienda`
-- 

INSERT INTO `tienda` VALUES (9, 'VGllbmRhIGVuY3JpcHRhZGE=', 'UHJpdmFkYSA=', 'Q2VudHJv', 'MTIzNA==', 'NDQzMjE0NTE1Mg=', 'MTkuNzAyODc5NzQwMDI3NzA0', 'LTEwMS4xNjYyMTc0NjY1MDM5', 'dGllbmRhLnBuZw==', 3);
INSERT INTO `tienda` VALUES (11, 'T3RyYSB0aWVuZGEgbWFz', 'Q2FsbGU=', 'T2JyZXJh', 'MjM0MzIx', 'NDU2NzU2NDU0MA=', 'MTkuNjk2MjUzNTQyNzU0NTI=', 'LTEwMS4yMjczMjg5MTY2OTkyMQ==', 'YWRkLnBuZw==', 3);
INSERT INTO `tienda` VALUES (12, 'VGllbmRhIHNpbiBzY3JpcHR0dHR0dHR0dHQ=', 'Q2FsbGU=', 'Q2VudHJv', 'MTIz', 'MTIz', 'MTkuNzQwNjcwNTk4MjAxNDgz', 'LTEwMS4yNDIyNzgwNTY0OTQxMQ==', 'dGllbmRhLnBuZw==', 3);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `user`
-- 

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL auto_increment,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`iduser`),
  UNIQUE KEY `user_UNIQUE` (`user`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `user`
-- 

INSERT INTO `user` VALUES (1, 'cm9vdA==', 'cm9vdA==', 'bWFyY290cnVua3NAaG90bWFpbC5jb20=');
INSERT INTO `user` VALUES (3, 'bWFra28=', 'MTIzNDU=', 'bWFyY290cnVua3MxOEBob3RtYWlsLmNvbQ==');
INSERT INTO `user` VALUES (4, 'YWxl', 'MTIz', 'YWxlQGhvdG1haWwuY29t');
INSERT INTO `user` VALUES (5, 'bmVs', 'MTIz', 'bmVsQGhvdG1haWwuY29t');
INSERT INTO `user` VALUES (6, 'dG9tYXM=', 'MTIz', 'dG9teUBob3RtYWlsLmNvbQ==');

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `productos`
-- 
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idtienda`) REFERENCES `tienda` (`idtienda`) ON DELETE CASCADE ON UPDATE NO ACTION;

-- 
-- Filtros para la tabla `tienda`
-- 
ALTER TABLE `tienda`
  ADD CONSTRAINT `tienda_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;
