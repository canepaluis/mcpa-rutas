-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 04:02 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd-peu-con_data-v1.11`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrativos`
--

CREATE TABLE `administrativos` (
  `Num_Control` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_materno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_paterno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1,
  `ID_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `administrativos`
--

INSERT INTO `administrativos` (`Num_Control`, `Nombres`, `Apellido_materno`, `Apellido_paterno`, `Imagen`, `Estatus`, `ID_Carrera`) VALUES
(269256901, 'Roberto Javier', 'Paz ', 'Valencia', 'foto.png', 1, 2),
(269256926, 'Oscar Martín', 'Valle ', 'Flores', 'manuel.jpg', 1, 2),
(269256945, 'Juan Eliseo', 'Contreras', 'García', 'foto.png', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `ID_Alu` int(11) NOT NULL,
  `Ap_Pat` varchar(255) DEFAULT NULL,
  `Ap_Mat` varchar(255) DEFAULT NULL,
  `Nom_Alu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`ID_Alu`, `Ap_Pat`, `Ap_Mat`, `Nom_Alu`) VALUES
(0, 'Velazquez', 'Rodriguez', 'Mario');

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `Matricula` int(11) NOT NULL,
  `Nombres` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_Materno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_Paterno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Carrera` int(11) NOT NULL,
  `Plan_estudio` int(11) NOT NULL,
  `Creditos_Acumulados` int(11) NOT NULL,
  `Periodo_Ingreso` int(11) NOT NULL,
  `Periodo_Actual` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(255) COLLATE utf8_spanish_ci DEFAULT 'foto.png',
  `Estatus` enum('Activo','Baja','Temporal','Egresado') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Activo',
  `Tipo_Ingreso` int(11) NOT NULL,
  `Grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`Matricula`, `Nombres`, `Apellido_Materno`, `Apellido_Paterno`, `ID_Carrera`, `Plan_estudio`, `Creditos_Acumulados`, `Periodo_Ingreso`, `Periodo_Actual`, `Imagen`, `Estatus`, `Tipo_Ingreso`, `Grupo`) VALUES
(201500096, 'Carlos', 'Gomez', 'Rodriguez', 2, 3, 255, 3212, '3211', 'foto.png', 'Activo', 1, 1),
(201800091, 'Alvaro', 'Salvador', 'Torruco', 2, 2, 200, 3212, '3211', 'alv.jpg', 'Activo', 3, 1),
(201900065, 'Cinthia Fernanda', 'Torres', 'Frias', 3, 3, 156, 3212, '3211', 'foto.png', 'Activo', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `ID_Area` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`ID_Area`, `Nombre`, `Estatus`) VALUES
(1, 'PE de Ingeniería en Software', 1),
(2, 'Recursos Humanos', 1),
(3, 'PE de Licenciatura en Pymes', 1),
(4, 'Rectoria', 1),
(5, 'PE de Ingeniería en biomedica', 1),
(6, 'Ninguno', 1),
(7, 'Secretaria administrativa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `area_academica`
--

CREATE TABLE `area_academica` (
  `ID_Area_Aca` int(11) NOT NULL,
  `Nombre_Aca` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `area_academica`
--

INSERT INTO `area_academica` (`ID_Area_Aca`, `Nombre_Aca`) VALUES
(1, 'Recursos Humanos'),
(2, 'Matemáticas y Física'),
(3, 'Biología'),
(4, 'Computación y Electrónica'),
(5, 'Química'),
(6, 'Departamento de ingles');

-- --------------------------------------------------------

--
-- Table structure for table `asignatura`
--

CREATE TABLE `asignatura` (
  `ID_Asig` int(11) NOT NULL,
  `Nombre_Asig` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_Corto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Unidades` int(11) NOT NULL,
  `ID_Area_Aca` int(11) NOT NULL,
  `Creditos` decimal(5,2) NOT NULL,
  `Hrs_Clase` int(11) NOT NULL,
  `Hrs_Practicas` int(11) NOT NULL,
  `Hrs_Totales` int(11) NOT NULL,
  `Caracterizacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Objetivos` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Com_Especifica` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Ruta_Descarga` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Cuat` int(11) NOT NULL,
  `Clave` int(11) NOT NULL,
  `Clave_Materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `asignatura`
--

INSERT INTO `asignatura` (`ID_Asig`, `Nombre_Asig`, `Nombre_Corto`, `Unidades`, `ID_Area_Aca`, `Creditos`, `Hrs_Clase`, `Hrs_Practicas`, `Hrs_Totales`, `Caracterizacion`, `Objetivos`, `Com_Especifica`, `Ruta_Descarga`, `ID_Cuat`, `Clave`, `Clave_Materia`) VALUES
(1, 'Ingles I', 'Ing I', 8, 6, '5.00', 30, 0, 30, 'Son maestros calificados para que enseñen a los alumnos una nueva lengua.', 'ensenar gramática y pronunciación. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 1, 'ALGLin_I'),
(2, 'Introduccion a las matematicas ', 'Int Mat', 10, 2, '10.00', 35, 0, 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 1, 'DesHum_I'),
(3, 'Desarollo Humano y Valores', 'Valores', 4, 1, '45.00', 10, 0, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 1, 'Ana_I'),
(4, 'Quimica Basica', 'Quim', 1, 5, '150.00', 8, 2, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 2, 'ING_I'),
(5, 'Ingles', 'ING', 10, 6, '250.00', 8, 0, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 2, 'ING_I'),
(6, 'Algebra Lineal ', 'AlgLin', 6, 2, '650.00', 10, 0, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 2, 'ING_I'),
(7, 'Ingles', 'Ing', 6, 6, '450.00', 7, 0, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 3, 'ING_I'),
(8, 'Valores del ser', 'Val', 3, 1, '450.00', 7, 3, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 3, 'ING_I'),
(9, 'Fundamentos de anatomía ', 'FunAna', 2, 1, '250.00', 4, 2, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 3, 'MAT_I'),
(10, 'Ingles', 'Ing', 6, 6, '450.00', 8, 0, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 4, 4, 'ING_I'),
(11, 'Desarrollo Humano', 'DesHum', 2, 1, '250.00', 3, 1, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 4, 'DESHUM_1'),
(12, 'Valores ', 'Val', 6, 1, '650.00', 4, 2, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 4, 'VAL_1'),
(13, 'InglesI', 'Ing', 6, 6, '450.00', 7, 0, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 5, 'ING_I'),
(14, 'Valores del Ser', 'Val', 3, 1, '250.00', 3, 2, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 5, 'VAL_SER_I'),
(15, 'Micro economia', 'MicroEco', 6, 2, '650.00', 6, 0, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillu', 1, 5, 'MIECO_I');

-- --------------------------------------------------------

--
-- Table structure for table `asignaturas_docente`
--

CREATE TABLE `asignaturas_docente` (
  `Num_Control` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL,
  `ID_Asignatura` int(11) NOT NULL,
  `Estatus` enum('Actual','Activo','Desactivado') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `asignaturas_docente`
--

INSERT INTO `asignaturas_docente` (`Num_Control`, `ID_Carrera`, `ID_Asignatura`, `Estatus`) VALUES
(214748362, 2, 3, 'Actual'),
(214748362, 2, 1, 'Activo'),
(2147483647, 2, 2, 'Actual');

-- --------------------------------------------------------

--
-- Table structure for table `aulas`
--

CREATE TABLE `aulas` (
  `ID_Aula` int(11) NOT NULL,
  `Nombre_Aula` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ID_Edificio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `aulas`
--

INSERT INTO `aulas` (`ID_Aula`, `Nombre_Aula`, `ID_Edificio`) VALUES
(1, 'A1', 1),
(2, 'A2', 1),
(3, 'A3', 1),
(4, 'A5', 1),
(5, 'T1', 2),
(6, 'T2', 2),
(7, 'A4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bachilleres`
--

CREATE TABLE `bachilleres` (
  `ID_Bachiller` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bachilleres`
--

INSERT INTO `bachilleres` (`ID_Bachiller`, `Nombre`, `Estatus`) VALUES
(1, 'COBACH', 1),
(2, 'CONALEP', 1),
(3, 'CBTIS 272', 1),
(4, 'CECYTE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bachilleres_areas`
--

CREATE TABLE `bachilleres_areas` (
  `ID_Bach_Area` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bachilleres_areas`
--

INSERT INTO `bachilleres_areas` (`ID_Bach_Area`, `Nombre`, `Estatus`) VALUES
(1, 'Físico-Matematico', 1),
(2, 'Ciencias biologicas', 1),
(3, 'Ciencias sociales', 1),
(4, 'Artes y Humanidades', 1);

-- --------------------------------------------------------

--
-- Table structure for table `becas`
--

CREATE TABLE `becas` (
  `ID_Beca` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `becas`
--

INSERT INTO `becas` (`ID_Beca`, `Nombre`, `Estatus`) VALUES
(1, 'Ninguno', 1),
(2, 'Subes', 1),
(3, 'Amlo', 1),
(4, 'Estudiante', 1),
(5, 'Transporte', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE `carrera` (
  `ID_Carrera` int(11) NOT NULL,
  `Nom_Carrera` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Niv` int(11) NOT NULL,
  `ID_Sit` int(11) NOT NULL,
  `Inicio` date NOT NULL,
  `Terminacion` date NOT NULL,
  `Cordinador` varchar(75) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`ID_Carrera`, `Nom_Carrera`, `ID_Niv`, `ID_Sit`, `Inicio`, `Terminacion`, `Cordinador`) VALUES
(1, 'Licenciatura en Pymes', 1, 1, '2021-01-01', '2023-01-01', 'Mariano'),
(2, 'Ingeniería Software', 1, 1, '2021-01-01', '2023-01-01', 'Manuel'),
(3, 'Terapia Fisica', 1, 1, '2021-01-01', '2025-01-01', 'Chavoya'),
(4, 'Ingenieria en biomedica', 1, 1, '2021-01-01', '2024-01-01', 'Moises'),
(5, 'Licenciatura en administración', 1, 1, '2021-01-01', '2026-01-01', 'wensceslao');

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `ID_Mt_Ctl` int(11) NOT NULL,
  `Domicilio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Tel_Domicilio` bigint(20) NOT NULL,
  `Celular` bigint(20) NOT NULL,
  `Nombre_Emergencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Tel_Emergencia` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`ID_Mt_Ctl`, `Domicilio`, `Tel_Domicilio`, `Celular`, `Nombre_Emergencia`, `Tel_Emergencia`) VALUES
(201500096, 'SM 260 MZ 2 LT 9 ', 9981484970, 9981484970, 'Nora Salvador', 9981127411),
(201500096, 'SM 260 MZ 2 LT 9', 9981484970, 9981484970, 'Nora Salvador', 9981127411),
(2147483647, 'SM 103 MZ 115 LT 12', 2131235434, 9982457961, 'Mariana Xiu', 9981499515),
(201800091, 'SM 45 MZ 1 LT 55', 3243243243, 9841578441, 'Maria Vazquez', 9987752366),
(269256901, 'SM 105', 8847895, 9984758555, 'Juan Canul', 9983459588),
(201900065, 'SM 23', 2539578, 9983657891, 'Alberto', 9982487732),
(269256926, 'SM 100 MZ 100 LT 20', 9998751232, 9984526890, 'Alejandro Gomez', 9897894545),
(269256945, 'SM 228 MZ 65 LT 36', 1369874, 9989875636, 'Maria Perez', 9986598963),
(269865236, 'SM 221 MZ 65 LT 36', 9988752226, 9889899898, 'Daniel Tun', 9878979798),
(269874563, 'SM 221 MZ 125 LT 55', 9981123547, 9981113247, 'Fernanda Lopez', 9984751452),
(214748362, 'SM 227 MZ 125 LT 55', 9987152231, 9981021451, 'Jose Diaz', 9984320350);

-- --------------------------------------------------------

--
-- Table structure for table `cuatrimestre`
--

CREATE TABLE `cuatrimestre` (
  `ID_Cuat` int(11) NOT NULL,
  `Nombre_Cuat` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cuatrimestre`
--

INSERT INTO `cuatrimestre` (`ID_Cuat`, `Nombre_Cuat`) VALUES
(1, 'Primero'),
(2, 'Segundo '),
(3, 'Tercero'),
(4, 'Cuarto '),
(5, 'Quinto');

-- --------------------------------------------------------

--
-- Table structure for table `cuenta`
--

CREATE TABLE `cuenta` (
  `ID_Mt_Ctl` int(11) NOT NULL,
  `Passw` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cuenta`
--

INSERT INTO `cuenta` (`ID_Mt_Ctl`, `Passw`, `ID_Perfil`) VALUES
(201500096, '22336987', 1),
(201800091, '11223344', 1),
(269256926, '123456', 4),
(269865236, '987654321', 3),
(2147483647, '1234698', 2),
(200000004, '147852369', 5),
(214748362, '55554789', 2),
(201900065, '123456cf', 1),
(269256901, '123456rp', 4),
(269256945, '123456jc', 4),
(269874563, '123456dg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cuestionario`
--

CREATE TABLE `cuestionario` (
  `ID_Cuest` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Pre1` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre2` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre3` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre4` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre5` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre6` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre7` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre8` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre9` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre10` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre11` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre12` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre13` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre14` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre15` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre16` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre17` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre18` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre19` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre20` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre21` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre22` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre23` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre24` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre25` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre26` text COLLATE utf8_spanish_ci NOT NULL,
  `Pre27` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cuestionario`
--

INSERT INTO `cuestionario` (`ID_Cuest`, `Tipo`, `Pre1`, `Pre2`, `Pre3`, `Pre4`, `Pre5`, `Pre6`, `Pre7`, `Pre8`, `Pre9`, `Pre10`, `Pre11`, `Pre12`, `Pre13`, `Pre14`, `Pre15`, `Pre16`, `Pre17`, `Pre18`, `Pre19`, `Pre20`, `Pre21`, `Pre22`, `Pre23`, `Pre24`, `Pre25`, `Pre26`, `Pre27`) VALUES
(1, 1, '¿El maestro realiza una evaluación diagnóstica al inicio del cuatrimestre?\r\n', '¿El maestro Implementa actividades que te permiten vincularte con el contexto social?\r\n', '¿El maestro te da a conocer los contenidos de la materia que imparte?\r\n', '¿El maestro lleva a cabo un registro permanente de los resultados de aprendizaje?\r\n', '¿El maestro promueve un pensamiento reflexivo y crítico a partir de los contenidos educativos?\r\n', '¿Tu maestro genera soluciones creativas ante eventualidades que pudieran presentarse en el aula?\r\n', '¿Tu maestro selecciona  los materiales apropiados incluyendo las nuevas tecnologías y el análisis de casos para el desarrollo de tus competencias, implementándolas en el salón de clase?\r\n', '¿Tu maestro comunica los contenidos de su asignatura de manera clara en los diferentes ambientes de aprendizaje?\r\n', '¿Tu maestro proporciona oportunidades y herramientas para avanzar en los procesos de construcción del conocimiento?\r\n', '¿Tu maestro evalúa los aprendizaje apegados al enfoque por competencias?\r\n', '¿Tu maestro fortalece los conocimientos mediante la retroalimentación, despues de la evaluación de los aprendizajes?\r\n', '¿Tu maestro utiliza diferentes herramientas para la evaluación bajo el enfoque de competencias?\r\n', '¿Tu maestro evalua de manera justa y objetiva los aprendizajes?\r\n', '¿Tu maestro práctica y promueve el respeto a la diversidad de creencias, valores e ideas?\r\n', '¿Tu maestro favorece el diálogo como mecanismo para la resolución de conflictos?\r\n', '¿Tu maestro estimula la participación de los estudiantes en la definición de normas de trabajo y convivencia?\r\n', '¿Tu maestro alienta a que los estudiantes se expresen en un marco de respeto y armonia?\r\n', '¿Tu maestro favorece el sentido de pertenencia institucional en los alumnos?\r\n', '¿Tu maestro Promueve el interes y respeto a valores cívicos, éticos y ecológicos?\r\n', '¿Tu maestro promueve el interes por el conocimiento a través de la investigación y la generación de proyectos?', '', '', '', '', '', '', ''),
(2, 2, 'Presentación (arreglo personal)\r\n', 'Comportamiento en el curso del trabajo\r\n', 'Puntualidad\r\n', 'Cooperacion\r\n', 'Iniciativa en el desarrollo de su trabajo\r\n', 'Capacidad para resolver problemas: De organización de trabajo y relaciones con terceros\r\n', 'Capacidad para resolver problemas: De índole técnica \r\n', 'Relación con el personal de la universidad y público en general\r\n', 'Capacidad para trabajar en equipo\r\nEntrega oportuna de reportes, indicadores e informes solicitados\r\n', 'Entrega oportuna de evaluaciones de personal a su cargo\r\n', 'Conocimiento de la gestión de calidad\r\n', 'Aplicación de la política de calidad\r\n', 'Iniciativa para eficientar procedimientos de calidad', 'Conocimiento de los procedimientos aplicables a su área y su aplicación en el trabajo\r\n', 'Habilidad para detectar problemas\r\n', 'Planeación y organización del trabajo\r\n', 'Supervisión oportuna y eficaz del personal a su cargo \r\n', 'Seguimiento de instrucciones\r\n', 'Cierre completo del trabajo\r\n', 'Calidad de informes y documentos: Redacción y presentación\r\n', 'Calidad de informes y documentos: contenido\r\n\r\n', 'Oportunidad en el servicio: comunicación de problemas a su jefe inmediato o directivo', 'Oportunidad en el servicio: elaboración de informes y memoranda\r\n', 'Oportunidad en el servicio: cumplimiento de fechas limite\r\n', 'Oportunidad en el servicio: uso eficaz de equipo de computo en el trabajo', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `datos_adicionales`
--

CREATE TABLE `datos_adicionales` (
  `Matricula` int(11) NOT NULL,
  `ID_Indigena` int(11) NOT NULL,
  `ID_Beca` int(11) NOT NULL,
  `ID_Discapacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `datos_adicionales`
--

INSERT INTO `datos_adicionales` (`Matricula`, `ID_Indigena`, `ID_Beca`, `ID_Discapacidad`) VALUES
(201500096, 1, 1, 1),
(201800091, 2, 1, 1),
(201900065, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `datos_generales`
--

CREATE TABLE `datos_generales` (
  `ID_Mt_Ctl` int(11) NOT NULL,
  `ID_Origen` int(11) NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `CURP` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `RFC` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `Estado_Civil` enum('SOLTERO','CASADO','DIVORCIADO','SEPARACION EN PROCESO JUDICIAL','VIUDO','CONCUBINATO') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'SOLTERO',
  `Genero` enum('HOMBRE','MUJER','NO ESPECIFICADO') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO ESPECIFICADO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `datos_generales`
--

INSERT INTO `datos_generales` (`ID_Mt_Ctl`, `ID_Origen`, `Fecha_Nac`, `CURP`, `RFC`, `Estado_Civil`, `Genero`) VALUES
(201500096, 5, '1994-03-02', 'GRC940302HQRLRL06', 'GRC9403025VA', 'SOLTERO', 'HOMBRE'),
(201800091, 5, '1994-10-02', 'SATA940302HQRLRL06', 'SATA9403025VA', 'SOLTERO', 'HOMBRE'),
(201900065, 9, '1997-04-11', 'FTCF810411HQRLSO25', 'FTCF810411W56', 'SOLTERO', 'MUJER'),
(269256901, 12, '1981-04-11', 'VPRJ810411HQRLSO25', 'VPRJ810711W58', 'DIVORCIADO', 'HOMBRE'),
(269256926, 2, '1976-10-25', 'FVMO000430HQRLRL56', 'FVMO400430Q41', 'CASADO', 'HOMBRE'),
(269256945, 10, '1965-02-05', 'GCJE000430HQRLRL56', 'GCJE0504430Q4', 'SOLTERO', 'HOMBRE'),
(269865236, 5, '1978-07-22', 'MHDJ980722HQRLC165', 'MHDJ980722HY9', 'DIVORCIADO', 'HOMBRE'),
(269874563, 15, '1960-01-25', 'DGAD980722HQRLC165', 'DGAD980722HY9', 'VIUDO', 'HOMBRE'),
(214748362, 5, '1970-04-30', 'LBHA990224FGQCA066', 'LBHA990224FH1', 'CASADO', 'HOMBRE'),
(2147483647, 5, '1974-08-12', 'CXM990224FGQCA064', 'CXM990224FH1', 'CASADO', 'HOMBRE');

-- --------------------------------------------------------

--
-- Table structure for table `datos_indigena`
--

CREATE TABLE `datos_indigena` (
  `ID_Indigena` int(11) NOT NULL,
  `ID_Grupo_Indigena` int(11) NOT NULL,
  `ID_Lengua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `datos_indigena`
--

INSERT INTO `datos_indigena` (`ID_Indigena`, `ID_Grupo_Indigena`, `ID_Lengua`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `datos_laborales`
--

CREATE TABLE `datos_laborales` (
  `Num_Control` int(11) NOT NULL,
  `ID_Area` int(11) NOT NULL,
  `ID_Departamento` int(11) NOT NULL,
  `Fecha_ingreso` date NOT NULL,
  `ID_Puesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `datos_laborales`
--

INSERT INTO `datos_laborales` (`Num_Control`, `ID_Area`, `ID_Departamento`, `Fecha_ingreso`, `ID_Puesto`) VALUES
(269256901, 6, 3, '2015-05-15', 7),
(269256926, 6, 5, '2014-03-15', 7),
(269256945, 2, 1, '2015-10-05', 7),
(269865236, 1, 4, '2017-05-08', 2),
(269874563, 3, 4, '2015-11-25', 4),
(214748362, 1, 4, '2016-06-06', 1),
(2147483647, 1, 4, '2018-08-20', 6);

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `ID_Departamento` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`ID_Departamento`, `Nombre`, `Estatus`) VALUES
(1, 'Recursos Humanos', 1),
(2, 'Gestión empresarial', 1),
(3, 'Servicios escolares', 1),
(4, 'Secretaria académica', 1),
(5, 'Servicios generales', 1);

-- --------------------------------------------------------

--
-- Table structure for table `descripcion`
--

CREATE TABLE `descripcion` (
  `ID_Descripcion` int(11) NOT NULL,
  `Descripcion` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `descripcion`
--

INSERT INTO `descripcion` (`ID_Descripcion`, `Descripcion`) VALUES
(1, 'Enero - Abril'),
(2, 'Mayo - Agosto'),
(3, 'Sep - Dic');

-- --------------------------------------------------------

--
-- Table structure for table `dias`
--

CREATE TABLE `dias` (
  `ID_Dia` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dias`
--

INSERT INTO `dias` (`ID_Dia`, `Nombre`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miércoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sábado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `ID_Director` int(11) NOT NULL,
  `ID_Personal` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`ID_Director`, `ID_Personal`, `ID_Carrera`) VALUES
(0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `director_carrera`
--

CREATE TABLE `director_carrera` (
  `Num_Control` int(11) NOT NULL,
  `Nombres` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_materno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_paterno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1,
  `ID_Carrera` int(11) NOT NULL,
  `ID_Periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `director_carrera`
--

INSERT INTO `director_carrera` (`Num_Control`, `Nombres`, `Apellido_materno`, `Apellido_paterno`, `Imagen`, `Estatus`, `ID_Carrera`, `ID_Periodo`) VALUES
(269865236, 'Diego Alejandro', 'Herrera ', 'Moreno', 'manuel.jpg', 1, 3, 3211),
(269874563, 'Daniel Andres', 'Gómez', 'Delgado', 'foto.png', 1, 2, 3211);

-- --------------------------------------------------------

--
-- Table structure for table `discapacidades`
--

CREATE TABLE `discapacidades` (
  `ID_Discapacidad` int(11) NOT NULL,
  `Nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `discapacidades`
--

INSERT INTO `discapacidades` (`ID_Discapacidad`, `Nombre`, `Estatus`) VALUES
(1, 'Ninguno', 1),
(2, 'Motora', 1),
(3, 'Sensorial', 1),
(4, 'Intelectual', 1),
(5, 'Psiquica', 1),
(6, 'Viscera', 1);

-- --------------------------------------------------------

--
-- Table structure for table `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `ID_Disponibilidad` int(11) NOT NULL,
  `ID_Periodo` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `ID_Segmento_carrera` int(11) NOT NULL,
  `ID_Dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `disp_profesor_materia`
--

CREATE TABLE `disp_profesor_materia` (
  `ID_Disponibilidad` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `ID_Asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `docentes`
--

CREATE TABLE `docentes` (
  `Num_Control` int(11) NOT NULL,
  `Nombres` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_materno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_paterno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1,
  `ID_Grado` int(11) NOT NULL,
  `Periodo_Actual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `docentes`
--

INSERT INTO `docentes` (`Num_Control`, `Nombres`, `Apellido_materno`, `Apellido_paterno`, `Imagen`, `Estatus`, `ID_Grado`, `Periodo_Actual`) VALUES
(214748362, 'Hugo Andres', 'Barrera', 'Lopez', 'foto.png', 1, 2, 3211),
(2147483647, 'Mariano', 'Xiu', 'Chan', 'alv.jpg', 1, 3, 3211);

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE `documentos` (
  `ID_Mt_Ctl` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` enum('Correcto','Incorrecto') COLLATE utf8_spanish_ci NOT NULL,
  `ID_Tipo_Doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`ID_Mt_Ctl`, `Nombre`, `Ruta`, `Estatus`, `ID_Tipo_Doc`) VALUES
(2147483647, '214748364_Currículum.pdf', '214748364_Currículum.pdf', 'Correcto', 4),
(201800091, '201800025_actadenacimiento.pdf', '201800025_actadenacimiento.pdf', 'Correcto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `edificios`
--

CREATE TABLE `edificios` (
  `ID_Edificio` int(11) NOT NULL,
  `Nombre_Edificio` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `edificios`
--

INSERT INTO `edificios` (`ID_Edificio`, `Nombre_Edificio`) VALUES
(1, 'Unidad A'),
(2, 'Edificio de terapia física'),
(3, 'Anexo 1'),
(4, 'Biblioteca');

-- --------------------------------------------------------

--
-- Table structure for table `enc_alumno`
--

CREATE TABLE `enc_alumno` (
  `ID_Enc` int(11) NOT NULL,
  `Matricula` int(11) NOT NULL,
  `ID_Periodo` int(11) NOT NULL,
  `Status` enum('1','0') COLLATE utf8_spanish_ci NOT NULL,
  `ID_Cuest` int(11) NOT NULL,
  `ID_Alu` int(11) NOT NULL,
  `ID_Pe` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `enc_alumno`
--

INSERT INTO `enc_alumno` (`ID_Enc`, `Matricula`, `ID_Periodo`, `Status`, `ID_Cuest`, `ID_Alu`, `ID_Pe`) VALUES
(1, 201800091, 3122, '0', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `enc_director`
--

CREATE TABLE `enc_director` (
  `ID_enD` int(11) NOT NULL,
  `Num_Control` int(11) NOT NULL,
  `ID_Periodo` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL,
  `ID_Cuest` int(11) NOT NULL,
  `ID_Director` int(11) NOT NULL,
  `Clave_Pe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `ID_Estado` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`ID_Estado`, `Nombre`, `Estatus`) VALUES
(1, 'Aguascalientes', 1),
(2, 'Baja California', 1),
(3, 'Baja California Sur', 1),
(4, 'Campeche', 1),
(5, 'Chiapas', 1),
(6, 'Chihuahua', 1),
(7, 'Coahuila de Zaragoza', 1),
(8, 'Colima', 1),
(9, 'Durango', 1),
(10, 'Estado de México', 1),
(11, 'Guanajuato', 1),
(12, 'Guerrero', 1),
(13, 'Hidalgo', 1),
(14, 'Jalisco', 1),
(15, 'Michoacán de Ocampo', 1),
(16, 'Morelos', 1),
(17, 'Nayarit', 1),
(18, 'Nuevo León', 1),
(19, 'Oaxaca', 1),
(20, 'Puebla', 1),
(21, 'Querétaro', 1),
(22, 'Quintana Roo', 1),
(23, 'San Luis Potosí', 1),
(24, 'Sinaloa', 1),
(25, 'Sonora', 1),
(26, 'Tabasco', 1),
(27, 'Tamaulipas', 1),
(28, 'Tlaxcala', 1),
(29, 'Veracruz de Ignacio de la Llave', 1),
(30, 'Yucatán', 1),
(31, 'Zacateca', 1);

-- --------------------------------------------------------

--
-- Table structure for table `estatus`
--

CREATE TABLE `estatus` (
  `ID_Estatus` int(11) NOT NULL,
  `Estatus` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `estatus`
--

INSERT INTO `estatus` (`ID_Estatus`, `Estatus`) VALUES
(1, 'Activo'),
(2, 'Finalizado');

-- --------------------------------------------------------

--
-- Table structure for table `estatus_perfil`
--

CREATE TABLE `estatus_perfil` (
  `ID_Estatus_Perfil` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `estatus_perfil`
--

INSERT INTO `estatus_perfil` (`ID_Estatus_Perfil`, `Nombre`) VALUES
(1, 'Activo'),
(2, 'Baja');

-- --------------------------------------------------------

--
-- Table structure for table `eval_alumno`
--

CREATE TABLE `eval_alumno` (
  `ID_evalA` int(11) NOT NULL,
  `ID_Enc` int(11) NOT NULL,
  `Num_Control` int(11) NOT NULL,
  `ID_Asig` int(11) NOT NULL,
  `R1` int(11) NOT NULL,
  `R2` int(11) NOT NULL,
  `R3` int(11) NOT NULL,
  `R4` int(11) NOT NULL,
  `R5` int(11) NOT NULL,
  `R6` int(11) NOT NULL,
  `R7` int(11) NOT NULL,
  `R8` int(11) NOT NULL,
  `R9` int(11) NOT NULL,
  `R10` int(11) NOT NULL,
  `R11` int(11) NOT NULL,
  `R12` int(11) NOT NULL,
  `R13` int(11) NOT NULL,
  `R14` int(11) NOT NULL,
  `R15` int(11) NOT NULL,
  `R16` int(11) NOT NULL,
  `R17` int(11) NOT NULL,
  `R18` int(11) NOT NULL,
  `R19` int(11) NOT NULL,
  `R20` int(11) NOT NULL,
  `R21` int(11) NOT NULL,
  `R22` int(11) NOT NULL,
  `R23` int(11) NOT NULL,
  `R24` int(11) NOT NULL,
  `R25` int(11) NOT NULL,
  `R26` int(11) NOT NULL,
  `R27` int(11) NOT NULL,
  `Comentario` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `eval_alumno`
--

INSERT INTO `eval_alumno` (`ID_evalA`, `ID_Enc`, `Num_Control`, `ID_Asig`, `R1`, `R2`, `R3`, `R4`, `R5`, `R6`, `R7`, `R8`, `R9`, `R10`, `R11`, `R12`, `R13`, `R14`, `R15`, `R16`, `R17`, `R18`, `R19`, `R20`, `R21`, `R22`, `R23`, `R24`, `R25`, `R26`, `R27`, `Comentario`) VALUES
(1, 1, 2147483647, 5, 2, 3, 3, 4, 4, 4, 3, 3, 3, 3, 1, 1, 2, 4, 4, 4, 3, 4, 3, 2, 0, 0, 0, 0, 0, 0, 0, 'clases dinamicas y muy prácticas.');

-- --------------------------------------------------------

--
-- Table structure for table `eval_director`
--

CREATE TABLE `eval_director` (
  `ID_evalDirec` int(11) NOT NULL,
  `ID_enD` int(11) NOT NULL,
  `Num_Control` int(11) NOT NULL,
  `Comen` text COLLATE utf8_spanish_ci NOT NULL,
  `Comen_A` text COLLATE utf8_spanish_ci NOT NULL,
  `R1` int(11) NOT NULL,
  `R2` int(11) NOT NULL,
  `R3` int(11) NOT NULL,
  `R4` int(11) NOT NULL,
  `R5` int(11) NOT NULL,
  `R6` int(11) NOT NULL,
  `R7` int(11) NOT NULL,
  `R8` int(11) NOT NULL,
  `R9` int(11) NOT NULL,
  `R10` int(11) NOT NULL,
  `R11` int(11) NOT NULL,
  `R12` int(11) NOT NULL,
  `R13` int(11) NOT NULL,
  `R14` int(11) NOT NULL,
  `R15` int(11) NOT NULL,
  `R16` int(11) NOT NULL,
  `R17` int(11) NOT NULL,
  `R18` int(11) NOT NULL,
  `R19` int(11) NOT NULL,
  `R20` int(11) NOT NULL,
  `R21` int(11) NOT NULL,
  `R22` int(11) NOT NULL,
  `R23` int(11) NOT NULL,
  `R24` int(11) NOT NULL,
  `R25` int(11) NOT NULL,
  `R26` int(11) NOT NULL,
  `R27` int(11) NOT NULL,
  `ID_Personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `eval_docente`
--

CREATE TABLE `eval_docente` (
  `ID_evalD` int(11) NOT NULL,
  `ID_Evaluador` int(11) NOT NULL,
  `Num_Control` int(11) NOT NULL,
  `Comen` text COLLATE utf8_spanish_ci NOT NULL,
  `Comen_A` text COLLATE utf8_spanish_ci NOT NULL,
  `R1` int(11) NOT NULL,
  `R2` int(11) NOT NULL,
  `R3` int(11) NOT NULL,
  `R4` int(11) NOT NULL,
  `R5` int(11) NOT NULL,
  `R6` int(11) NOT NULL,
  `R7` int(11) NOT NULL,
  `R8` int(11) NOT NULL,
  `R9` int(11) NOT NULL,
  `R10` int(11) NOT NULL,
  `R11` int(11) NOT NULL,
  `R12` int(11) NOT NULL,
  `R13` int(11) NOT NULL,
  `R14` int(11) NOT NULL,
  `R15` int(11) NOT NULL,
  `R16` int(11) NOT NULL,
  `R17` int(11) NOT NULL,
  `R18` int(11) NOT NULL,
  `R19` int(11) NOT NULL,
  `R20` int(11) NOT NULL,
  `R21` int(11) NOT NULL,
  `R22` int(11) NOT NULL,
  `R23` int(11) NOT NULL,
  `R24` int(11) NOT NULL,
  `R25` int(11) NOT NULL,
  `R26` int(11) NOT NULL,
  `R27` int(11) NOT NULL,
  `ID_Personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `grados`
--

CREATE TABLE `grados` (
  `ID_Grado` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `grados`
--

INSERT INTO `grados` (`ID_Grado`, `Nombre`, `Estatus`) VALUES
(1, 'Licenciatura o Ingenieria', 1),
(2, 'Doctorado', 1),
(3, 'Maestria', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `ID_Grupos` int(11) NOT NULL,
  `Clave` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Grado_Cuatri` int(11) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Inscritos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`ID_Grupos`, `Clave`, `Grado_Cuatri`, `Capacidad`, `Inscritos`) VALUES
(1, 'IS81', 8, 30, 26),
(2, 'IS21', 2, 30, 24),
(3, 'IS51', 5, 30, 29);

-- --------------------------------------------------------

--
-- Table structure for table `grupos_eval`
--

CREATE TABLE `grupos_eval` (
  `No_Grupo` int(11) NOT NULL,
  `C_Grupo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Periodo` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL,
  `ID_Asig` int(11) NOT NULL,
  `Nom_G` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Num_Control` int(11) NOT NULL,
  `ID_Personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `grupos_eval`
--

INSERT INTO `grupos_eval` (`No_Grupo`, `C_Grupo`, `ID_Periodo`, `ID_Carrera`, `ID_Asig`, `Nom_G`, `Num_Control`, `ID_Personal`) VALUES
(1, 'IS81', 3211, 2, 5, 'OCTAVO MATUTINO SOFTWARE', 2147483647, 0),
(2, 'IS31', 3211, 2, 14, 'TERCERO MATUTINO SOFTWARE', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grupo_indigena`
--

CREATE TABLE `grupo_indigena` (
  `ID_Grupo_Indigena` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estatus` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `grupo_indigena`
--

INSERT INTO `grupo_indigena` (`ID_Grupo_Indigena`, `Nombre`, `Estatus`) VALUES
(1, 'Ninguno', 1),
(2, 'Maya', 1),
(3, 'Mexicas', 1),
(4, 'Zapoteca', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_periodo_plan_carrera_turno`
--

CREATE TABLE `g_periodo_plan_carrera_turno` (
  `ID_Grupos` int(11) NOT NULL,
  `ID_Periodo` int(11) NOT NULL,
  `ID_Turno` int(11) NOT NULL,
  `ID_Plan` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `historial_docente`
--

CREATE TABLE `historial_docente` (
  `Num_Control` int(11) NOT NULL,
  `Periodo` int(11) NOT NULL,
  `ID_Asig` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `historial_docente`
--

INSERT INTO `historial_docente` (`Num_Control`, `Periodo`, `ID_Asig`, `ID_Carrera`) VALUES
(2147483647, 3212, 1, 2),
(2147483647, 3212, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `horarios_materia`
--

CREATE TABLE `horarios_materia` (
  `ID_Horario_M` int(11) NOT NULL,
  `ID_Grupos` int(11) NOT NULL,
  `ID_Asig` int(11) NOT NULL,
  `ID_Disponibilidad` int(11) NOT NULL,
  `ID_Aula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `lengua_indigena`
--

CREATE TABLE `lengua_indigena` (
  `ID_Lengua` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lengua_indigena`
--

INSERT INTO `lengua_indigena` (`ID_Lengua`, `Nombre`, `Estatus`) VALUES
(1, 'Niguno', 1),
(2, 'Maya', 1),
(3, 'Nahuatl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lista`
--

CREATE TABLE `lista` (
  `ID_Lista` int(11) NOT NULL,
  `ID_Periodo` int(11) NOT NULL,
  `Matricula` int(11) NOT NULL,
  `ID_Asig` int(11) NOT NULL,
  `No_Grupo` int(11) NOT NULL,
  `ID_Alu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lista`
--

INSERT INTO `lista` (`ID_Lista`, `ID_Periodo`, `Matricula`, `ID_Asig`, `No_Grupo`, `ID_Alu`) VALUES
(1, 3122, 201800091, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE `municipios` (
  `ID_Municipio` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`ID_Municipio`, `Nombre`, `Estatus`) VALUES
(2, 'COZUMEL', 1),
(3, 'FELIPE CARRILLO PUERTO', 1),
(4, 'ISLA MUJERES', 1),
(5, 'OTHÓN P. BLANCO', 1),
(6, 'BENITO JUÁREZ', 1),
(7, 'JOSÉ MARÍA MORELOS', 1),
(8, 'LÁZARO CÁRDENAS', 1),
(9, 'SOLIDARIDAD', 1),
(10, 'TULUM', 1),
(11, 'BACALAR', 1),
(12, 'PUERTO MORELOS', 1),
(13, 'SAN LUIS POTOSÍ', 1),
(14, 'AHUALULCO', 1),
(15, 'ALAQUINES', 1),
(16, 'AQUISMÓN', 1),
(17, 'ARMADILLO DE LOS INFANTE', 1),
(18, 'CÁRDENAS', 1),
(19, 'CATORCE', 1),
(20, 'CEDRAL', 1),
(21, 'CERRITOS', 1),
(22, 'CERRO DE SAN PEDRO', 1),
(23, 'CIUDAD DEL MAÍZ', 1),
(24, 'CIUDAD FERNÁNDEZ', 1),
(25, 'TANCANHUITZ', 1),
(26, 'CIUDAD VALLES', 1),
(27, 'COXCATLÁN', 1),
(28, 'CHARCAS', 1),
(29, 'EBANO', 1),
(30, 'GUADALCÁZAR', 1),
(31, 'HUEHUETLÁN', 1),
(32, 'LAGUNILLAS', 1),
(33, 'MATEHUALA', 1),
(34, 'MEXQUITIC DE CARMONA', 1),
(35, 'MOCTEZUMA', 1),
(36, 'RAYÓN', 1),
(37, 'RIOVERDE', 1),
(38, 'SALINAS', 1),
(39, 'SAN ANTONIO', 1),
(40, 'SAN CIRO DE ACOSTA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE `nivel` (
  `ID_Niv` int(11) NOT NULL,
  `Niv_Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nivel`
--

INSERT INTO `nivel` (`ID_Niv`, `Niv_Nombre`) VALUES
(1, 'licenciatura'),
(2, 'Maestria'),
(3, 'Doctorado');

-- --------------------------------------------------------

--
-- Table structure for table `origen`
--

CREATE TABLE `origen` (
  `ID_Origen` int(11) NOT NULL,
  `ID_Pais` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `ID_Municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `origen`
--

INSERT INTO `origen` (`ID_Origen`, `ID_Pais`, `ID_Estado`, `ID_Municipio`) VALUES
(1, 118, 22, 2),
(2, 118, 22, 3),
(3, 118, 22, 4),
(4, 118, 22, 5),
(5, 118, 22, 6),
(6, 118, 22, 7),
(7, 118, 22, 8),
(8, 118, 22, 9),
(9, 118, 22, 10),
(10, 118, 22, 11),
(11, 118, 22, 12),
(12, 118, 22, 13),
(13, 118, 22, 14),
(14, 118, 22, 15),
(15, 118, 22, 16),
(16, 118, 22, 17),
(17, 118, 22, 18),
(18, 118, 22, 19),
(19, 118, 22, 20),
(20, 118, 22, 21),
(21, 118, 22, 22),
(22, 118, 22, 23),
(23, 118, 22, 24),
(24, 118, 22, 25),
(25, 118, 22, 26),
(26, 118, 22, 27),
(27, 118, 22, 28),
(28, 118, 22, 29),
(29, 118, 22, 30),
(30, 118, 22, 31),
(31, 118, 22, 32),
(32, 118, 22, 33),
(33, 118, 22, 34),
(34, 118, 22, 35),
(35, 118, 22, 36),
(36, 118, 22, 37),
(37, 118, 22, 38),
(38, 118, 22, 39),
(39, 118, 22, 40);

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE `paises` (
  `ID_Pais` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`ID_Pais`, `Nombre`, `Estatus`) VALUES
(1, 'Afganistán', 1),
(2, 'Albania', 1),
(3, 'Alemania', 1),
(4, 'Andorra', 1),
(5, 'Angola', 1),
(6, 'Antigua y Barbuda', 1),
(7, 'Arabia Saudita', 1),
(8, 'Argelia', 1),
(9, 'Argentina', 1),
(10, 'Armenia', 1),
(11, 'Australia', 1),
(12, 'Austria', 1),
(13, 'Azerbaiyán', 1),
(14, 'Bahamas', 1),
(15, 'Bangladés', 1),
(16, 'Barbados', 1),
(17, 'Baréin', 1),
(18, 'Bélgica', 1),
(19, 'Belice', 1),
(20, 'Benín', 1),
(21, 'Bielorrusia', 1),
(22, 'Birmania/Myanmar', 1),
(23, 'Bolivia', 1),
(24, 'Bosnia y Herzegovina', 1),
(25, 'Botsuana', 1),
(26, 'Brasil', 1),
(27, 'Brunéi', 1),
(28, 'Bulgaria', 1),
(29, 'Burkina Faso', 1),
(30, 'Burundi', 1),
(31, 'Bután', 1),
(32, 'Cabo Verde', 1),
(33, 'Camboya', 1),
(34, 'Camerún', 1),
(35, 'Canadá', 1),
(36, 'Catar', 1),
(37, 'Chad', 1),
(38, 'Chile', 1),
(39, 'China', 1),
(40, 'Chipre', 1),
(41, 'Ciudad del Vaticano', 1),
(42, 'Colombia', 1),
(43, 'Comoras', 1),
(44, 'Corea del Norte', 1),
(45, 'Corea del Sur', 1),
(46, 'Costa de Marfil', 1),
(47, 'Costa Rica', 1),
(48, 'Croacia', 1),
(49, 'Cuba', 1),
(50, 'Dinamarca', 1),
(51, 'Dominica', 1),
(52, 'Ecuador', 1),
(53, 'Egipto', 1),
(54, 'El Salvador', 1),
(55, 'Emiratos Árabes Unidos', 1),
(56, 'Eritrea', 1),
(57, 'Eslovaquia', 1),
(58, 'Eslovenia', 1),
(59, 'España', 1),
(60, 'Estados Unidos', 1),
(61, 'Estonia', 1),
(62, 'Etiopía', 1),
(63, 'Filipinas', 1),
(64, 'Finlandia', 1),
(65, 'Fiyi', 1),
(66, 'Francia', 1),
(67, 'Gabón', 1),
(68, 'Gambia', 1),
(69, 'Georgia', 1),
(70, 'Ghana', 1),
(71, 'Granada', 1),
(72, 'Grecia', 1),
(73, 'Guatemala', 1),
(74, 'Guyana', 1),
(75, 'Guinea', 1),
(76, 'Guinea ecuatorial', 1),
(77, 'Guinea-Bisáu', 1),
(78, 'Haití', 1),
(79, 'Honduras', 1),
(80, 'Hungría', 1),
(81, 'India', 1),
(82, 'Indonesia', 1),
(83, 'Irak', 1),
(84, 'Irán', 1),
(85, 'Irlanda', 1),
(86, 'Islandia', 1),
(87, 'Islas Marshall', 1),
(88, 'Islas Salomón', 1),
(89, 'Israel', 1),
(90, 'Italia', 1),
(91, 'Jamaica', 1),
(92, 'Japón', 1),
(93, 'Jordania', 1),
(94, 'Kazajistán', 1),
(95, 'Kenia', 1),
(96, 'Kirguistán', 1),
(97, 'Kiribati', 1),
(98, 'Kuwait', 1),
(99, 'Laos', 1),
(100, 'Lesoto', 1),
(101, 'Letonia', 1),
(102, 'Líbano', 1),
(103, 'Liberia', 1),
(104, 'Libia', 1),
(105, 'Liechtenstein', 1),
(106, 'Lituania', 1),
(107, 'Luxemburgo', 1),
(108, 'Macedonia del Norte', 1),
(109, 'Madagascar', 1),
(110, 'Malasia', 1),
(111, 'Malaui', 1),
(112, 'Maldivas', 1),
(113, 'Malí', 1),
(114, 'Malta', 1),
(115, 'Marruecos', 1),
(116, 'Mauricio', 1),
(117, 'Mauritania', 1),
(118, 'México', 1),
(119, 'Micronesia', 1),
(120, 'Moldavia', 1),
(121, 'Mónaco', 1),
(122, 'Mongolia', 1),
(123, 'Montenegro', 1),
(124, 'Mozambique', 1),
(125, 'Namibia', 1),
(126, 'Nauru', 1),
(127, 'Nepal', 1),
(128, 'Nicaragua', 1),
(129, 'Níger', 1),
(130, 'Nigeria', 1),
(131, 'Noruega', 1),
(132, 'Nueva Zelanda', 1),
(133, 'Omán', 1),
(134, 'Países Bajos', 1),
(135, 'Pakistán', 1),
(136, 'Palaos', 1),
(137, 'Panamá', 1),
(138, 'Papúa Nueva Guinea', 1),
(139, 'Paraguay', 1),
(140, 'Perú', 1),
(141, 'Polonia', 1),
(142, 'Portugal', 1),
(143, 'Reino Unido', 1),
(144, 'República Centroafricana', 1),
(145, 'República Checa', 1),
(146, 'República del Congo', 1),
(147, 'República Democrática del Congo', 1),
(148, 'República Dominicana', 1),
(149, 'República Sudafricana', 1),
(150, 'Ruanda', 1),
(151, 'Rumanía', 1),
(152, 'Rusia', 1),
(153, 'Samoa', 1),
(154, 'San Cristóbal y Nieves', 1),
(155, 'San Marino', 1),
(156, 'San Vicente y las Granadinas', 1),
(157, 'Santa Lucía', 1),
(158, 'Santo Tomé y Príncipe', 1),
(159, 'Senegal', 1),
(160, 'Serbia', 1),
(161, 'Seychelles', 1),
(162, 'Sierra Leona', 1),
(163, 'Singapur', 1),
(164, 'Siria', 1),
(165, 'Somalia', 1),
(166, 'Sri Lanka', 1),
(167, 'Suazilandia', 1),
(168, 'Sudán', 1),
(169, 'Sudán del Sur', 1),
(170, 'Suecia', 1),
(171, 'Suiza', 1),
(172, 'Surinam', 1),
(173, 'Tailandia', 1),
(174, 'Tanzania', 1),
(175, 'Tayikistán', 1),
(176, 'Timor Oriental', 1),
(177, 'Togo', 1),
(178, 'Tonga', 1),
(179, 'Trinidad y Tobago', 1),
(180, 'Túnez', 1),
(181, 'Turkmenistán', 1),
(182, 'Turquía', 1),
(183, 'Tuvalu', 1),
(184, 'Ucrania', 1),
(185, 'Uganda', 1),
(186, 'Uruguay', 1),
(187, 'Uzbekistán', 1),
(188, 'Vanuatu', 1),
(189, 'Venezuela', 1),
(190, 'Vietnam', 1),
(191, 'Yemen', 1),
(192, 'Yibuti', 1),
(193, 'Zambia', 1),
(194, 'Zimbabue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `ID_Perfil` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`ID_Perfil`, `Nombre`, `Estatus`) VALUES
(1, 'Alumno', 1),
(2, 'Docente', 1),
(3, 'Director', 1),
(4, 'Administrativo', 1),
(5, 'Administrador', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periodos`
--

CREATE TABLE `periodos` (
  `ID_Periodo` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `ID_Descripcion` int(11) NOT NULL,
  `ID_Estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `periodos`
--

INSERT INTO `periodos` (`ID_Periodo`, `Anio`, `ID_Descripcion`, `ID_Estatus`) VALUES
(3211, 2021, 1, 1),
(3212, 2020, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `ID_Personal` int(11) NOT NULL,
  `Apellido_P` varchar(255) DEFAULT NULL,
  `Nombre_P` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`ID_Personal`, `Apellido_P`, `Nombre_P`) VALUES
(0, 'Vazquez', 'Rodrigo');

-- --------------------------------------------------------

--
-- Table structure for table `plan_de_estudio`
--

CREATE TABLE `plan_de_estudio` (
  `Clave` int(11) NOT NULL,
  `Clave_Oficial` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Carrera` int(11) NOT NULL,
  `Total_Materias` int(11) NOT NULL,
  `Creditos_Total` int(11) NOT NULL,
  `Per_Duracion` int(11) NOT NULL,
  `Per_Max` int(11) NOT NULL,
  `Cod_Revision` varchar(3) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `plan_de_estudio`
--

INSERT INTO `plan_de_estudio` (`Clave`, `Clave_Oficial`, `ID_Carrera`, `Total_Materias`, `Creditos_Total`, `Per_Duracion`, `Per_Max`, `Cod_Revision`) VALUES
(1, 'PM2', 1, 10, 600, 3, 4, 'A'),
(2, 'ISF1', 2, 16, 650, 4, 5, 'B'),
(3, 'MAN1', 3, 14, 700, 5, 6, 'C'),
(4, 'BIO', 4, 12, 600, 4, 5, 'A'),
(5, 'ADMON', 5, 14, 650, 4, 5, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `procedencia`
--

CREATE TABLE `procedencia` (
  `ID_Bachiller` int(11) NOT NULL,
  `Fecha_egreso` date NOT NULL,
  `ID_Bach_Area` int(11) NOT NULL,
  `Prom_Gral` double(10,0) NOT NULL,
  `Prom_Exani_2` double(10,0) NOT NULL,
  `Prom_EGEL` double(10,0) NOT NULL,
  `Prom_TOEFL` double(10,0) NOT NULL,
  `Matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `procedencia`
--

INSERT INTO `procedencia` (`ID_Bachiller`, `Fecha_egreso`, `ID_Bach_Area`, `Prom_Gral`, `Prom_Exani_2`, `Prom_EGEL`, `Prom_TOEFL`, `Matricula`) VALUES
(1, '2016-09-21', 1, 9, 9, 7, 0, 201500096),
(2, '2019-01-11', 2, 8, 8, 8, 0, 201800091),
(3, '2018-12-15', 1, 9, 7, 8, 0, 201900065);

-- --------------------------------------------------------

--
-- Table structure for table `puestos`
--

CREATE TABLE `puestos` (
  `ID_Puesto` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `puestos`
--

INSERT INTO `puestos` (`ID_Puesto`, `Nombre`, `Estatus`) VALUES
(1, 'Docente de tiempo completo', 1),
(2, 'Coordinador de Ingenieria en Software', 1),
(3, 'Rector', 1),
(4, 'Coordinador de Linceciatura en Pymes', 1),
(5, 'Coordinador de Ingenieria en biomedica', 1),
(6, 'Docente de asignatura', 1),
(7, 'Jefe de departamento', 1),
(8, 'Auxiliar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `segmentos`
--

CREATE TABLE `segmentos` (
  `ID_Segmento` int(11) NOT NULL,
  `Num_Segmento` int(11) NOT NULL,
  `Hora_Inicio` time NOT NULL,
  `Hora_Fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `segmentos`
--

INSERT INTO `segmentos` (`ID_Segmento`, `Num_Segmento`, `Hora_Inicio`, `Hora_Fin`) VALUES
(1, 1, '07:00:00', '07:50:00'),
(2, 2, '07:50:00', '08:40:00'),
(3, 3, '08:40:00', '09:30:00'),
(4, 4, '09:40:00', '10:30:00'),
(5, 5, '10:30:00', '11:20:00'),
(6, 6, '11:20:00', '12:10:00'),
(7, 7, '12:10:00', '13:00:00'),
(8, 8, '13:00:00', '13:50:00'),
(9, 9, '14:00:00', '14:50:00'),
(10, 10, '14:50:00', '15:40:00'),
(11, 11, '15:40:00', '16:30:00'),
(12, 12, '16:30:00', '17:20:00'),
(13, 13, '17:20:00', '18:10:00'),
(14, 14, '18:10:00', '19:00:00'),
(15, 15, '19:00:00', '19:50:00'),
(16, 16, '19:50:00', '20:40:00'),
(26, 11, '15:40:00', '16:30:00'),
(27, 12, '16:30:00', '17:20:00'),
(28, 13, '17:20:00', '18:10:00'),
(29, 14, '18:10:00', '19:00:00'),
(30, 15, '19:00:00', '19:50:00'),
(31, 16, '19:50:00', '19:50:00'),
(32, 17, '19:50:00', '20:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `segmentos_carrera`
--

CREATE TABLE `segmentos_carrera` (
  `ID_Segmento_carrera` int(11) NOT NULL,
  `ID_Segmento` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `servicio_medico`
--

CREATE TABLE `servicio_medico` (
  `ID_Mt_Ctl` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Num_Afiliacion` bigint(20) NOT NULL,
  `Estatus` enum('VIGENTE','VENCIDO') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'VIGENTE',
  `Tipo_Sangre` enum('A+','B+','O+','AB+','A-','B-','O-','AB-','') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A+'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `servicio_medico`
--

INSERT INTO `servicio_medico` (`ID_Mt_Ctl`, `Nombre`, `Num_Afiliacion`, `Estatus`, `Tipo_Sangre`) VALUES
(201500096, 'IMSS', 82119424701, 'VIGENTE', 'A+'),
(201800091, 'IMSS', 15478961956, 'VIGENTE', 'AB+'),
(201900065, 'ISSSTE', 1658168135, 'VIGENTE', 'B+'),
(269865236, 'GALEANA', 1651684119681681, 'VIGENTE', 'O+'),
(269874563, 'IMSS', 9884981980411, 'VIGENTE', 'O-'),
(269256926, 'IMSS', 11478861956, 'VIGENTE', 'O-'),
(269256945, 'ISSSTE', 1178168135, 'VIGENTE', 'O+'),
(269256901, 'IMSS', 15477462949, 'VIGENTE', 'AB+'),
(214748362, 'ISSSTE', 1758480135, 'VIGENTE', 'B-'),
(2147483647, 'ISSSTE', 1658164569, 'VIGENTE', 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `situacion`
--

CREATE TABLE `situacion` (
  `ID_sit` int(11) NOT NULL,
  `Sit_Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `situacion`
--

INSERT INTO `situacion` (`ID_sit`, `Sit_Nombre`) VALUES
(1, 'Vigente'),
(2, 'En liquidación'),
(3, 'Liquidada');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_documentos`
--

CREATE TABLE `tipo_documentos` (
  `ID_Tipo_Doc` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tipo_documentos`
--

INSERT INTO `tipo_documentos` (`ID_Tipo_Doc`, `Nombre`, `Estatus`) VALUES
(1, 'Institucional', 1),
(2, 'Administrativo', 1),
(3, 'Educacional', 1),
(4, 'Profesional', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_ingreso`
--

CREATE TABLE `tipo_ingreso` (
  `ID_Ingreso` int(11) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tipo_ingreso`
--

INSERT INTO `tipo_ingreso` (`ID_Ingreso`, `Nombre`, `Estatus`) VALUES
(1, 'Selección', 1),
(2, 'Equivalencia', 1),
(3, 'Convalidación', 1),
(4, 'Revalidación', 1),
(5, 'Traslado', 1);

-- --------------------------------------------------------

--
-- Table structure for table `turno`
--

CREATE TABLE `turno` (
  `ID_Turno` int(11) NOT NULL,
  `Turno` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `turno`
--

INSERT INTO `turno` (`ID_Turno`, `Turno`) VALUES
(1, 'Matutino'),
(2, 'Vespertino');

-- --------------------------------------------------------

--
-- Table structure for table `unidades`
--

CREATE TABLE `unidades` (
  `ID_Unid` int(11) NOT NULL,
  `Num_unidad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Sub_Unidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Titulo_Unidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Competencia` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Actividades` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `unidades`
--

INSERT INTO `unidades` (`ID_Unid`, `Num_unidad`, `Sub_Unidad`, `Titulo_Unidad`, `Competencia`, `Actividades`, `ID_Asig`) VALUES
(1, '1', 'Sub uno', 'Descripción uno', 'Competencias genéricas uno', 'Actividades de aprendizaje uno', 1),
(2, '3', 'Gramática y verb to be', 'Inglés I', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 1),
(3, '2', 'Algebra y geometría analítica', 'Matemáticas para Ingeniería', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 2),
(4, '2', 'Propiedades de la tabla periódica', 'Química Básica', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 4),
(5, '1', 'Importancia de trabajar en equipo', 'Valores y trabajo en equipo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 3),
(6, '4', 'Partes del humano', 'Analísis y comprensión del cuerpo humano', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique nulla nec orci pharetra, id faucibus felis elementum. Donec sagittis consectetur dui, id mattis mauris elementum at. Nullam tempus, ipsum at aliquet interdum, arcu neque tincidunt ipsum, ut eleifend mi dolor cursus tortor. Cras et justo lacus. Phasellus non tincidunt ex. Sed ut vestibulum sapien. Aliquam dictum ante eu nunc convallis vulputate. Aenean feugiat, quam sit amet congue varius, nibh leo ullamcorper enim, eu ', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`Num_Control`) USING BTREE,
  ADD KEY `Index_Carrera` (`ID_Carrera`),
  ADD KEY `Estatus` (`Estatus`);

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`ID_Alu`);

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Matricula`) USING BTREE,
  ADD KEY `alumnos_plan_estudios` (`Plan_estudio`) USING BTREE,
  ADD KEY `Index_Periodo_Ingreso` (`Periodo_Ingreso`) USING BTREE,
  ADD KEY `Index_Grupo` (`Grupo`),
  ADD KEY `Index_Tipo_Ingreso` (`Tipo_Ingreso`) USING BTREE;

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`ID_Area`) USING BTREE,
  ADD KEY `Estatus` (`Estatus`) USING BTREE;

--
-- Indexes for table `area_academica`
--
ALTER TABLE `area_academica`
  ADD PRIMARY KEY (`ID_Area_Aca`) USING BTREE;

--
-- Indexes for table `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`ID_Asig`) USING BTREE,
  ADD KEY `ID_Area_Aca` (`ID_Area_Aca`) USING BTREE,
  ADD KEY `fk_cuatrimestre` (`ID_Cuat`) USING BTREE,
  ADD KEY `fk_clave` (`Clave`) USING BTREE;

--
-- Indexes for table `asignaturas_docente`
--
ALTER TABLE `asignaturas_docente`
  ADD KEY `Index_Num_Control` (`Num_Control`),
  ADD KEY `Index_Asignatura` (`ID_Asignatura`),
  ADD KEY `Index_Carrera` (`ID_Carrera`);

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`ID_Aula`) USING BTREE,
  ADD KEY `fk_aulas_edificio` (`ID_Edificio`) USING BTREE;

--
-- Indexes for table `bachilleres`
--
ALTER TABLE `bachilleres`
  ADD PRIMARY KEY (`ID_Bachiller`) USING BTREE,
  ADD KEY `Estatus` (`Estatus`);

--
-- Indexes for table `bachilleres_areas`
--
ALTER TABLE `bachilleres_areas`
  ADD PRIMARY KEY (`ID_Bach_Area`) USING BTREE,
  ADD KEY `Estatus` (`Estatus`);

--
-- Indexes for table `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`ID_Beca`) USING BTREE,
  ADD KEY `Estatus` (`Estatus`);

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID_Carrera`) USING BTREE,
  ADD KEY `ID_Niv` (`ID_Niv`) USING BTREE,
  ADD KEY `ID_Sit` (`ID_Sit`) USING BTREE;

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD KEY `Index_Mt_Ctl` (`ID_Mt_Ctl`) USING BTREE;

--
-- Indexes for table `cuatrimestre`
--
ALTER TABLE `cuatrimestre`
  ADD PRIMARY KEY (`ID_Cuat`) USING BTREE;

--
-- Indexes for table `cuenta`
--
ALTER TABLE `cuenta`
  ADD KEY `Index_Matricula_Control` (`ID_Mt_Ctl`),
  ADD KEY `Index_Perfil` (`ID_Perfil`);

--
-- Indexes for table `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`ID_Cuest`) USING BTREE;

--
-- Indexes for table `datos_adicionales`
--
ALTER TABLE `datos_adicionales`
  ADD KEY `ID_Beca` (`ID_Beca`) USING BTREE,
  ADD KEY `Index_Matricula` (`Matricula`),
  ADD KEY `Index_discapacidad` (`ID_Discapacidad`),
  ADD KEY `Index_Indigena` (`ID_Indigena`);

--
-- Indexes for table `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD KEY `Index_Origen` (`ID_Origen`),
  ADD KEY `Index_Mt_Ctl` (`ID_Mt_Ctl`) USING BTREE;

--
-- Indexes for table `datos_indigena`
--
ALTER TABLE `datos_indigena`
  ADD PRIMARY KEY (`ID_Indigena`),
  ADD KEY `Index_Grupo_Indigena` (`ID_Grupo_Indigena`),
  ADD KEY `Index_Lengua` (`ID_Lengua`);

--
-- Indexes for table `datos_laborales`
--
ALTER TABLE `datos_laborales`
  ADD KEY `ID_Puesto` (`ID_Puesto`) USING BTREE,
  ADD KEY `Index_Num_Control` (`Num_Control`),
  ADD KEY `Index_departamento` (`ID_Departamento`),
  ADD KEY `Index_Area` (`ID_Area`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`ID_Departamento`),
  ADD KEY `Estatus` (`Estatus`);

--
-- Indexes for table `descripcion`
--
ALTER TABLE `descripcion`
  ADD PRIMARY KEY (`ID_Descripcion`) USING BTREE;

--
-- Indexes for table `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`ID_Dia`) USING BTREE;

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`ID_Director`);

--
-- Indexes for table `director_carrera`
--
ALTER TABLE `director_carrera`
  ADD PRIMARY KEY (`Num_Control`) USING BTREE,
  ADD KEY `carrera_director_carrera` (`ID_Carrera`) USING BTREE,
  ADD KEY `ID_Periodo` (`ID_Periodo`) USING BTREE,
  ADD KEY `Estatus` (`Estatus`);

--
-- Indexes for table `discapacidades`
--
ALTER TABLE `discapacidades`
  ADD PRIMARY KEY (`ID_Discapacidad`),
  ADD KEY `Estatus` (`Estatus`);

--
-- Indexes for table `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`ID_Disponibilidad`) USING BTREE,
  ADD KEY `fk_disponibilidad_docente` (`ID_Docente`),
  ADD KEY `fk_disponibilidad_periodo` (`ID_Periodo`),
  ADD KEY `fk_disponibilidad_dia` (`ID_Dia`),
  ADD KEY `fk_disponibilidad_segmento_carrera` (`ID_Segmento_carrera`);

--
-- Indexes for table `disp_profesor_materia`
--
ALTER TABLE `disp_profesor_materia`
  ADD KEY `fk_d_p_m_disp` (`ID_Disponibilidad`) USING BTREE,
  ADD KEY `fk_d_p_m_profesor` (`ID_Docente`) USING BTREE,
  ADD KEY `fk_d_p_m_asig` (`ID_Asig`) USING BTREE;

--
-- Indexes for table `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`Num_Control`) USING BTREE,
  ADD KEY `ID_Grado` (`ID_Grado`) USING BTREE,
  ADD KEY `Index_Periodo_Actual` (`Periodo_Actual`),
  ADD KEY `Estatus` (`Estatus`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD KEY `ID_Tipo_Doc` (`ID_Tipo_Doc`) USING BTREE,
  ADD KEY `ID_Mt_Ctl` (`ID_Mt_Ctl`) USING BTREE;

--
-- Indexes for table `edificios`
--
ALTER TABLE `edificios`
  ADD PRIMARY KEY (`ID_Edificio`) USING BTREE;

--
-- Indexes for table `enc_alumno`
--
ALTER TABLE `enc_alumno`
  ADD PRIMARY KEY (`ID_Enc`) USING BTREE,
  ADD KEY `alumnos_Encuesta` (`Matricula`) USING BTREE,
  ADD KEY `Encuesta_Cuestionario` (`ID_Cuest`) USING BTREE,
  ADD KEY `ID_Alu` (`ID_Alu`);

--
-- Indexes for table `enc_director`
--
ALTER TABLE `enc_director`
  ADD PRIMARY KEY (`ID_enD`) USING BTREE,
  ADD KEY `encDirector_Cuestionario` (`ID_Cuest`) USING BTREE,
  ADD KEY `encuesta_director` (`Num_Control`) USING BTREE,
  ADD KEY `director_periodo` (`ID_Periodo`) USING BTREE;

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID_Estado`) USING BTREE,
  ADD KEY `Index_Estatus` (`Estatus`);

--
-- Indexes for table `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`ID_Estatus`) USING BTREE;

--
-- Indexes for table `estatus_perfil`
--
ALTER TABLE `estatus_perfil`
  ADD PRIMARY KEY (`ID_Estatus_Perfil`);

--
-- Indexes for table `eval_alumno`
--
ALTER TABLE `eval_alumno`
  ADD PRIMARY KEY (`ID_evalA`) USING BTREE,
  ADD KEY `Encuesta_Eval` (`ID_Enc`) USING BTREE,
  ADD KEY `eval_asignatura` (`ID_Asig`) USING BTREE,
  ADD KEY `personal_evalALUMNO` (`Num_Control`) USING BTREE;

--
-- Indexes for table `eval_director`
--
ALTER TABLE `eval_director`
  ADD PRIMARY KEY (`ID_evalDirec`),
  ADD KEY `director_personal` (`Num_Control`) USING BTREE,
  ADD KEY `director_encuesta` (`ID_enD`) USING BTREE,
  ADD KEY `ID_Personal` (`ID_Personal`);

--
-- Indexes for table `eval_docente`
--
ALTER TABLE `eval_docente`
  ADD PRIMARY KEY (`ID_evalD`),
  ADD KEY `evalDOCENTE_personal` (`Num_Control`) USING BTREE,
  ADD KEY `ID_Personal` (`ID_Personal`);

--
-- Indexes for table `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`ID_Grado`) USING BTREE,
  ADD KEY `grados_ibfk_1` (`Estatus`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`ID_Grupos`) USING BTREE;

--
-- Indexes for table `grupos_eval`
--
ALTER TABLE `grupos_eval`
  ADD PRIMARY KEY (`No_Grupo`) USING BTREE,
  ADD KEY `grupo_asignatura` (`ID_Asig`) USING BTREE,
  ADD KEY `grupo_personal` (`Num_Control`) USING BTREE,
  ADD KEY `grupo_periodo` (`ID_Periodo`) USING BTREE,
  ADD KEY `grupo_carrera` (`ID_Carrera`) USING BTREE,
  ADD KEY `ID_Personal` (`ID_Personal`);

--
-- Indexes for table `grupo_indigena`
--
ALTER TABLE `grupo_indigena`
  ADD PRIMARY KEY (`ID_Grupo_Indigena`) USING BTREE,
  ADD KEY `Index_Estatus` (`Estatus`);

--
-- Indexes for table `g_periodo_plan_carrera_turno`
--
ALTER TABLE `g_periodo_plan_carrera_turno`
  ADD KEY `fk_g_grupos` (`ID_Grupos`) USING BTREE,
  ADD KEY `fk_g_periodo` (`ID_Periodo`) USING BTREE,
  ADD KEY `fk_g_turno` (`ID_Turno`) USING BTREE,
  ADD KEY `fk_g_plan` (`ID_Plan`) USING BTREE,
  ADD KEY `fk_g_carrera` (`ID_Carrera`) USING BTREE;

--
-- Indexes for table `historial_docente`
--
ALTER TABLE `historial_docente`
  ADD KEY `Num_Control` (`Num_Control`) USING BTREE,
  ADD KEY `carrera_historial_docente` (`ID_Carrera`) USING BTREE,
  ADD KEY `asignatura_historial_docente` (`ID_Asig`) USING BTREE,
  ADD KEY `Index_Periodo` (`Periodo`);

--
-- Indexes for table `horarios_materia`
--
ALTER TABLE `horarios_materia`
  ADD PRIMARY KEY (`ID_Horario_M`) USING BTREE,
  ADD KEY `fk_h_m_grupos` (`ID_Grupos`) USING BTREE,
  ADD KEY `fk_h_m_asig` (`ID_Asig`) USING BTREE,
  ADD KEY `fk_h_m_disponibilidad` (`ID_Disponibilidad`) USING BTREE,
  ADD KEY `fk_h_m_aula` (`ID_Aula`) USING BTREE;

--
-- Indexes for table `lengua_indigena`
--
ALTER TABLE `lengua_indigena`
  ADD PRIMARY KEY (`ID_Lengua`) USING BTREE,
  ADD KEY `lengua_indigena_ibfk_1` (`Estatus`);

--
-- Indexes for table `lista`
--
ALTER TABLE `lista`
  ADD KEY `alumnos_lista` (`Matricula`) USING BTREE,
  ADD KEY `lista_grupo` (`No_Grupo`) USING BTREE,
  ADD KEY `ID_Asig` (`ID_Asig`),
  ADD KEY `ID_Alu` (`ID_Alu`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`ID_Municipio`) USING BTREE,
  ADD KEY `Index_Estatus` (`Estatus`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`ID_Niv`) USING BTREE;

--
-- Indexes for table `origen`
--
ALTER TABLE `origen`
  ADD PRIMARY KEY (`ID_Origen`),
  ADD KEY `Index_Pais` (`ID_Pais`),
  ADD KEY `Index_Estado` (`ID_Estado`),
  ADD KEY `Index_Municipio` (`ID_Municipio`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`ID_Pais`) USING BTREE,
  ADD KEY `Index_Estatus` (`Estatus`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`ID_Perfil`) USING BTREE,
  ADD KEY `perfiles_ibfk_1` (`Estatus`);

--
-- Indexes for table `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`ID_Periodo`) USING BTREE,
  ADD KEY `ID_Estatus` (`ID_Estatus`) USING BTREE,
  ADD KEY `fk_periodos_descripcion` (`ID_Descripcion`) USING BTREE;

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`ID_Personal`);

--
-- Indexes for table `plan_de_estudio`
--
ALTER TABLE `plan_de_estudio`
  ADD PRIMARY KEY (`Clave`) USING BTREE,
  ADD KEY `ID_Carrera` (`ID_Carrera`) USING BTREE;

--
-- Indexes for table `procedencia`
--
ALTER TABLE `procedencia`
  ADD KEY `ID_Bachiller` (`ID_Bachiller`) USING BTREE,
  ADD KEY `ID_Bach_Area` (`ID_Bach_Area`) USING BTREE,
  ADD KEY `Matricula` (`Matricula`);

--
-- Indexes for table `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`ID_Puesto`) USING BTREE,
  ADD KEY `Index_Estatus` (`Estatus`);

--
-- Indexes for table `segmentos`
--
ALTER TABLE `segmentos`
  ADD PRIMARY KEY (`ID_Segmento`) USING BTREE;

--
-- Indexes for table `segmentos_carrera`
--
ALTER TABLE `segmentos_carrera`
  ADD PRIMARY KEY (`ID_Segmento_carrera`),
  ADD KEY `fk_s_c_segmento` (`ID_Segmento`) USING BTREE,
  ADD KEY `fk_s_c_carrera` (`ID_Carrera`) USING BTREE;

--
-- Indexes for table `servicio_medico`
--
ALTER TABLE `servicio_medico`
  ADD KEY `ID_Mt_Ctl` (`ID_Mt_Ctl`);

--
-- Indexes for table `situacion`
--
ALTER TABLE `situacion`
  ADD PRIMARY KEY (`ID_sit`) USING BTREE;

--
-- Indexes for table `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  ADD PRIMARY KEY (`ID_Tipo_Doc`) USING BTREE,
  ADD KEY `Index_Estatus` (`Estatus`);

--
-- Indexes for table `tipo_ingreso`
--
ALTER TABLE `tipo_ingreso`
  ADD PRIMARY KEY (`ID_Ingreso`),
  ADD KEY `Index_Estatus` (`Estatus`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`ID_Turno`) USING BTREE;

--
-- Indexes for table `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`ID_Unid`) USING BTREE,
  ADD KEY `fk_asignatura` (`ID_Asig`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrativos`
--
ALTER TABLE `administrativos`
  MODIFY `Num_Control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269256946;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `ID_Area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `area_academica`
--
ALTER TABLE `area_academica`
  MODIFY `ID_Area_Aca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `ID_Asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `ID_Aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bachilleres`
--
ALTER TABLE `bachilleres`
  MODIFY `ID_Bachiller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bachilleres_areas`
--
ALTER TABLE `bachilleres_areas`
  MODIFY `ID_Bach_Area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `becas`
--
ALTER TABLE `becas`
  MODIFY `ID_Beca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `ID_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cuatrimestre`
--
ALTER TABLE `cuatrimestre`
  MODIFY `ID_Cuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `ID_Cuest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datos_indigena`
--
ALTER TABLE `datos_indigena`
  MODIFY `ID_Indigena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `ID_Departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `descripcion`
--
ALTER TABLE `descripcion`
  MODIFY `ID_Descripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dias`
--
ALTER TABLE `dias`
  MODIFY `ID_Dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discapacidades`
--
ALTER TABLE `discapacidades`
  MODIFY `ID_Discapacidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `ID_Disponibilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `edificios`
--
ALTER TABLE `edificios`
  MODIFY `ID_Edificio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enc_alumno`
--
ALTER TABLE `enc_alumno`
  MODIFY `ID_Enc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enc_director`
--
ALTER TABLE `enc_director`
  MODIFY `ID_enD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `estatus`
--
ALTER TABLE `estatus`
  MODIFY `ID_Estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `estatus_perfil`
--
ALTER TABLE `estatus_perfil`
  MODIFY `ID_Estatus_Perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eval_alumno`
--
ALTER TABLE `eval_alumno`
  MODIFY `ID_evalA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grados`
--
ALTER TABLE `grados`
  MODIFY `ID_Grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `ID_Grupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grupos_eval`
--
ALTER TABLE `grupos_eval`
  MODIFY `No_Grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grupo_indigena`
--
ALTER TABLE `grupo_indigena`
  MODIFY `ID_Grupo_Indigena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `horarios_materia`
--
ALTER TABLE `horarios_materia`
  MODIFY `ID_Horario_M` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lengua_indigena`
--
ALTER TABLE `lengua_indigena`
  MODIFY `ID_Lengua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `origen`
--
ALTER TABLE `origen`
  MODIFY `ID_Origen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `puestos`
--
ALTER TABLE `puestos`
  MODIFY `ID_Puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `segmentos_carrera`
--
ALTER TABLE `segmentos_carrera`
  MODIFY `ID_Segmento_carrera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  MODIFY `ID_Tipo_Doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipo_ingreso`
--
ALTER TABLE `tipo_ingreso`
  MODIFY `ID_Ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unidades`
--
ALTER TABLE `unidades`
  MODIFY `ID_Unid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrativos`
--
ALTER TABLE `administrativos`
  ADD CONSTRAINT `Index_Carrera` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`),
  ADD CONSTRAINT `administrativos_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `Index_Grupo` FOREIGN KEY (`Grupo`) REFERENCES `grupos` (`ID_Grupos`),
  ADD CONSTRAINT `Index_Periodo_Ingreso` FOREIGN KEY (`Periodo_Ingreso`) REFERENCES `periodos` (`ID_Periodo`),
  ADD CONSTRAINT `Index_Tipo_Ingreso` FOREIGN KEY (`Tipo_Ingreso`) REFERENCES `tipo_ingreso` (`ID_Ingreso`),
  ADD CONSTRAINT `alumnos_plan_estudios` FOREIGN KEY (`Plan_estudio`) REFERENCES `plan_de_estudio` (`Clave`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `Estatus` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`Clave`) REFERENCES `plan_de_estudio` (`Clave`),
  ADD CONSTRAINT `asignatura_ibfk_2` FOREIGN KEY (`ID_Area_Aca`) REFERENCES `area_academica` (`ID_Area_Aca`),
  ADD CONSTRAINT `asignatura_ibfk_3` FOREIGN KEY (`ID_Cuat`) REFERENCES `cuatrimestre` (`ID_Cuat`);

--
-- Constraints for table `asignaturas_docente`
--
ALTER TABLE `asignaturas_docente`
  ADD CONSTRAINT `Index_Asignatura` FOREIGN KEY (`ID_Asignatura`) REFERENCES `asignatura` (`ID_Asig`),
  ADD CONSTRAINT `asignaturas_docente_ibfk_1` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`);

--
-- Constraints for table `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aulas_edificio` FOREIGN KEY (`ID_Edificio`) REFERENCES `edificios` (`ID_Edificio`);

--
-- Constraints for table `bachilleres`
--
ALTER TABLE `bachilleres`
  ADD CONSTRAINT `bachilleres_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `bachilleres_areas`
--
ALTER TABLE `bachilleres_areas`
  ADD CONSTRAINT `Index_Estatus` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `becas`
--
ALTER TABLE `becas`
  ADD CONSTRAINT `becas_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera_ibfk_1` FOREIGN KEY (`ID_Niv`) REFERENCES `nivel` (`ID_Niv`),
  ADD CONSTRAINT `carrera_ibfk_2` FOREIGN KEY (`ID_Sit`) REFERENCES `situacion` (`ID_sit`);

--
-- Constraints for table `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `Index_Perfil` FOREIGN KEY (`ID_Perfil`) REFERENCES `perfiles` (`ID_Perfil`);

--
-- Constraints for table `datos_adicionales`
--
ALTER TABLE `datos_adicionales`
  ADD CONSTRAINT `ID_Beca` FOREIGN KEY (`ID_Beca`) REFERENCES `becas` (`ID_Beca`),
  ADD CONSTRAINT `Index_Indigena` FOREIGN KEY (`ID_Indigena`) REFERENCES `datos_indigena` (`ID_Indigena`),
  ADD CONSTRAINT `Index_Matricula` FOREIGN KEY (`Matricula`) REFERENCES `alumnos` (`Matricula`),
  ADD CONSTRAINT `Index_discapacidad` FOREIGN KEY (`ID_Discapacidad`) REFERENCES `discapacidades` (`ID_Discapacidad`);

--
-- Constraints for table `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD CONSTRAINT `Index_Origen` FOREIGN KEY (`ID_Origen`) REFERENCES `origen` (`ID_Origen`);

--
-- Constraints for table `datos_indigena`
--
ALTER TABLE `datos_indigena`
  ADD CONSTRAINT `Index_Grupo_Indigena` FOREIGN KEY (`ID_Grupo_Indigena`) REFERENCES `grupo_indigena` (`ID_Grupo_Indigena`),
  ADD CONSTRAINT `Index_Lengua` FOREIGN KEY (`ID_Lengua`) REFERENCES `lengua_indigena` (`ID_Lengua`);

--
-- Constraints for table `datos_laborales`
--
ALTER TABLE `datos_laborales`
  ADD CONSTRAINT `ID_Puesto` FOREIGN KEY (`ID_Puesto`) REFERENCES `puestos` (`ID_Puesto`),
  ADD CONSTRAINT `Index_Area` FOREIGN KEY (`ID_Area`) REFERENCES `areas` (`ID_Area`),
  ADD CONSTRAINT `Index_departamento` FOREIGN KEY (`ID_Departamento`) REFERENCES `departamentos` (`ID_Departamento`);

--
-- Constraints for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `director_carrera`
--
ALTER TABLE `director_carrera`
  ADD CONSTRAINT `ID_Periodo` FOREIGN KEY (`ID_Periodo`) REFERENCES `periodos` (`ID_Periodo`),
  ADD CONSTRAINT `carrera_director_carrera` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`),
  ADD CONSTRAINT `director_carrera_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `discapacidades`
--
ALTER TABLE `discapacidades`
  ADD CONSTRAINT `discapacidades_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `fk_disponibilidad_dia` FOREIGN KEY (`ID_Dia`) REFERENCES `dias` (`ID_Dia`),
  ADD CONSTRAINT `fk_disponibilidad_docente` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`Num_Control`),
  ADD CONSTRAINT `fk_disponibilidad_periodo` FOREIGN KEY (`ID_Periodo`) REFERENCES `periodos` (`ID_Periodo`),
  ADD CONSTRAINT `fk_disponibilidad_segmento_carrera` FOREIGN KEY (`ID_Segmento_carrera`) REFERENCES `segmentos_carrera` (`ID_Segmento_carrera`);

--
-- Constraints for table `disp_profesor_materia`
--
ALTER TABLE `disp_profesor_materia`
  ADD CONSTRAINT `fk_d_p_m_asig` FOREIGN KEY (`ID_Asig`) REFERENCES `asignatura` (`ID_Asig`),
  ADD CONSTRAINT `fk_d_p_m_disp` FOREIGN KEY (`ID_Disponibilidad`) REFERENCES `disponibilidad` (`ID_Disponibilidad`),
  ADD CONSTRAINT `fk_d_p_m_docente` FOREIGN KEY (`ID_Docente`) REFERENCES `docentes` (`Num_Control`);

--
-- Constraints for table `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `ID_Grado` FOREIGN KEY (`ID_Grado`) REFERENCES `grados` (`ID_Grado`),
  ADD CONSTRAINT `Index_Periodo_Actual` FOREIGN KEY (`Periodo_Actual`) REFERENCES `periodos` (`ID_Periodo`),
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `ID_Tipo_Doc` FOREIGN KEY (`ID_Tipo_Doc`) REFERENCES `tipo_documentos` (`ID_Tipo_Doc`);

--
-- Constraints for table `enc_alumno`
--
ALTER TABLE `enc_alumno`
  ADD CONSTRAINT `enc_alumno_ibfk_1` FOREIGN KEY (`ID_Alu`) REFERENCES `alumno` (`ID_Alu`);

--
-- Constraints for table `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estados_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `eval_director`
--
ALTER TABLE `eval_director`
  ADD CONSTRAINT `eval_director_ibfk_1` FOREIGN KEY (`ID_Personal`) REFERENCES `personal` (`ID_Personal`);

--
-- Constraints for table `eval_docente`
--
ALTER TABLE `eval_docente`
  ADD CONSTRAINT `eval_docente_ibfk_1` FOREIGN KEY (`ID_Personal`) REFERENCES `personal` (`ID_Personal`);

--
-- Constraints for table `grados`
--
ALTER TABLE `grados`
  ADD CONSTRAINT `grados_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `grupos_eval`
--
ALTER TABLE `grupos_eval`
  ADD CONSTRAINT `grupos_eval_ibfk_1` FOREIGN KEY (`ID_Personal`) REFERENCES `personal` (`ID_Personal`);

--
-- Constraints for table `grupo_indigena`
--
ALTER TABLE `grupo_indigena`
  ADD CONSTRAINT `grupo_indigena_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `g_periodo_plan_carrera_turno`
--
ALTER TABLE `g_periodo_plan_carrera_turno`
  ADD CONSTRAINT `	ID_Plan ` FOREIGN KEY (`ID_Plan`) REFERENCES `plan_de_estudio` (`Clave`),
  ADD CONSTRAINT `ID_Carrera ` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`),
  ADD CONSTRAINT `fk_g_grupos` FOREIGN KEY (`ID_Grupos`) REFERENCES `grupos` (`ID_Grupos`),
  ADD CONSTRAINT `fk_g_periodo` FOREIGN KEY (`ID_Periodo`) REFERENCES `periodos` (`ID_Periodo`),
  ADD CONSTRAINT `fk_g_turno` FOREIGN KEY (`ID_Turno`) REFERENCES `turno` (`ID_Turno`);

--
-- Constraints for table `historial_docente`
--
ALTER TABLE `historial_docente`
  ADD CONSTRAINT `Index_Periodo` FOREIGN KEY (`Periodo`) REFERENCES `periodos` (`ID_Periodo`),
  ADD CONSTRAINT `Num_Control` FOREIGN KEY (`Num_Control`) REFERENCES `docentes` (`Num_Control`),
  ADD CONSTRAINT `asignatura_historial_docente` FOREIGN KEY (`ID_Asig`) REFERENCES `asignatura` (`ID_Asig`),
  ADD CONSTRAINT `carrera_historial_docente` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`);

--
-- Constraints for table `horarios_materia`
--
ALTER TABLE `horarios_materia`
  ADD CONSTRAINT `fk_h_m_asig` FOREIGN KEY (`ID_Asig`) REFERENCES `asignatura` (`ID_Asig`),
  ADD CONSTRAINT `fk_h_m_aula` FOREIGN KEY (`ID_Aula`) REFERENCES `aulas` (`ID_Aula`),
  ADD CONSTRAINT `fk_h_m_disp` FOREIGN KEY (`ID_Disponibilidad`) REFERENCES `disponibilidad` (`ID_Disponibilidad`),
  ADD CONSTRAINT `fk_h_m_grupos` FOREIGN KEY (`ID_Grupos`) REFERENCES `grupos` (`ID_Grupos`);

--
-- Constraints for table `lengua_indigena`
--
ALTER TABLE `lengua_indigena`
  ADD CONSTRAINT `lengua_indigena_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`ID_Asig`) REFERENCES `asignatura` (`ID_Asig`),
  ADD CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`ID_Alu`) REFERENCES `alumno` (`ID_Alu`);

--
-- Constraints for table `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `origen`
--
ALTER TABLE `origen`
  ADD CONSTRAINT `Index_Estado` FOREIGN KEY (`ID_Estado`) REFERENCES `estados` (`ID_Estado`),
  ADD CONSTRAINT `Index_Municipio` FOREIGN KEY (`ID_Municipio`) REFERENCES `municipios` (`ID_Municipio`),
  ADD CONSTRAINT `Index_Pais` FOREIGN KEY (`ID_Pais`) REFERENCES `paises` (`ID_Pais`);

--
-- Constraints for table `paises`
--
ALTER TABLE `paises`
  ADD CONSTRAINT `paises_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `perfiles_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `periodos`
--
ALTER TABLE `periodos`
  ADD CONSTRAINT `fk_periodo_descripcion` FOREIGN KEY (`ID_Descripcion`) REFERENCES `descripcion` (`ID_Descripcion`),
  ADD CONSTRAINT `fk_periodo_estatus` FOREIGN KEY (`ID_Estatus`) REFERENCES `estatus` (`ID_Estatus`);

--
-- Constraints for table `plan_de_estudio`
--
ALTER TABLE `plan_de_estudio`
  ADD CONSTRAINT `plan_de_estudio_ibfk_1` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`);

--
-- Constraints for table `procedencia`
--
ALTER TABLE `procedencia`
  ADD CONSTRAINT `ID_Bach_Area` FOREIGN KEY (`ID_Bach_Area`) REFERENCES `bachilleres_areas` (`ID_Bach_Area`),
  ADD CONSTRAINT `ID_Bachiller` FOREIGN KEY (`ID_Bachiller`) REFERENCES `bachilleres` (`ID_Bachiller`),
  ADD CONSTRAINT `Matricula` FOREIGN KEY (`Matricula`) REFERENCES `alumnos` (`Matricula`);

--
-- Constraints for table `puestos`
--
ALTER TABLE `puestos`
  ADD CONSTRAINT `puestos_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `segmentos_carrera`
--
ALTER TABLE `segmentos_carrera`
  ADD CONSTRAINT `fk_s_c_carrera` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`),
  ADD CONSTRAINT `fk_s_c_segmento` FOREIGN KEY (`ID_Segmento`) REFERENCES `segmentos` (`ID_Segmento`);

--
-- Constraints for table `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  ADD CONSTRAINT `tipo_documentos_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `tipo_ingreso`
--
ALTER TABLE `tipo_ingreso`
  ADD CONSTRAINT `tipo_ingreso_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus_perfil` (`ID_Estatus_Perfil`);

--
-- Constraints for table `unidades`
--
ALTER TABLE `unidades`
  ADD CONSTRAINT `unidades_ibfk_1` FOREIGN KEY (`ID_Asig`) REFERENCES `asignatura` (`ID_Asig`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
