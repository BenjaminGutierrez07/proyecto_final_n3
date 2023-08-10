-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2023 at 07:14 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dni` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `permiso` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `nacimiento` date NOT NULL,
  `clase` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `usuario` (`usuario`(100)),
  KEY `dni_2` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`id`, `dni`, `nombre`, `usuario`, `contrasena`, `permiso`, `estado`, `direccion`, `nacimiento`, `clase`) VALUES
(1, 1, 'admin', 'admin@admin', '12345', 'Administrador', 'Activo', '', '0000-00-00', ''),
(2, 3567894, 'Roberto', 'roberto@maestro', '54321', 'Maestro', 'Activo', 'calle juan', '2013-08-23', 'Historia'),
(5, 3687976, 'Javier', 'javier@alumno', '98765', 'Alumno', 'Activo', 'calle la rosa', '2020-02-01', ''),
(6, 1547387, 'Juan', 'juan@alumno', '23456', 'Alumno', 'Activo', 'calle enrique', '2015-04-23', ''),
(7, 1265754, 'Maria', 'maria@maestro', '76543', 'Maestro', 'Activo', 'calle españa', '0000-00-00', 'Ciencias'),
(8, 2765845, 'Angel', 'angel@maestro', '96754', 'Maestro', 'Activo', 'Calle Sol', '2020-03-04', 'Tecnologia'),
(9, 2546754, 'Estefany', 'estefany@maestro', '37658', 'Maestro', 'Activo', 'Calle martines', '2015-07-23', 'Arquitectura'),
(10, 8745643, 'Lucas', 'lucas@maestro', '65987', 'Maestro', 'Activo', 'calle Sucre', '2016-09-28', 'Base de Datos'),
(11, 10495969, 'Valentina', 'valentina@alumno', '47698', 'Alumno', 'Activo', 'calle Azul', '2018-11-27', ''),
(12, 286547, 'Manuel', 'manuel@alumno', '57643', 'Alumno', 'Activo', 'calle estado', '2020-01-20', ''),
(13, 1765987, 'Luz', 'luz@alumno', '64987', 'Alumno', 'Activo', 'calle pascana', '2020-02-20', ''),
(15, 5544365, 'Josefa', 'josefa@alumno', '19543', 'alumno', 'Activo', 'calle jose', '2020-10-12', ''),
(29, 493120, 'Pablo', 'pablo@maestro', '04003', 'Maestro', 'Activo', '', '0000-00-00', 'Matematicas');

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
CREATE TABLE IF NOT EXISTS `clases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clase` varchar(250) NOT NULL,
  `maestro_dni` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `maestro_dni` (`maestro_dni`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clases`
--

INSERT INTO `clases` (`id`, `clase`, `maestro_dni`) VALUES
(1, 'Technologia', 0),
(2, 'Historia', 0),
(3, 'Comunicacion', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
