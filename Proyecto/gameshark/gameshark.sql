-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 03:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameshark`
--

-- --------------------------------------------------------

--
-- Table structure for table `clasificacion`
--

CREATE TABLE `clasificacion` (
  `idclasificacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clasificacion`
--

INSERT INTO `clasificacion` (`idclasificacion`, `nombre`) VALUES
(1, 'EC-infancia temprana'),
(2, 'E-todos'),
(3, 'E+10-todos sobre 10 años'),
(4, 'T-adolescentes'),
(5, 'M-adolescentes sobre 17 años'),
(6, 'AO-adultos solamente');

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `idjuego` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `idclasificacion` int(11) NOT NULL,
  `idplataforma` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`idjuego`, `nombre`, `estado`, `fecha`, `idclasificacion`, `idplataforma`, `cantidad`, `precio`) VALUES
(1, 'Monster Hunter Rise', 'nuevo', '2021-03-26', 4, 2, 99, 59.99),
(5, 'Monster Hunter World', 'nuevo', '2018-01-19', 4, 14, 99, 59.99),
(6, 'Monster Hunter Generations Ultimate', 'nuevo', '2018-08-28', 4, 2, 99, 59.99),
(7, 'Sonic Mania ', 'nuevo', '2017-08-15', 2, 2, 99, 19.99),
(8, 'Sonic Forces ', 'nuevo', '2017-11-07', 3, 14, 99, 39.99),
(9, 'Pokemon Sword', 'nuevo', '2019-11-15', 2, 2, 99, 59.99),
(10, 'Pokemon Shield', 'usado', '2017-11-15', 2, 2, 99, 49.99),
(11, 'Sonic The Hedgehog', 'usado', '2006-11-14', 3, 9, 99, 19.99),
(12, 'Resident Evil Village ', 'nuevo', '2021-05-07', 5, 15, 99, 59.99),
(13, 'My Hero One\'s Justice 2', 'usado', '2020-03-11', 4, 8, 99, 49.99);

-- --------------------------------------------------------

--
-- Table structure for table `plataforma`
--

CREATE TABLE `plataforma` (
  `idplataforma` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plataforma`
--

INSERT INTO `plataforma` (`idplataforma`, `nombre`) VALUES
(1, '3DS'),
(2, 'Switch'),
(3, 'DS'),
(4, 'Wii'),
(5, 'Wii U'),
(6, 'Gamecube'),
(7, 'Xbox Series X'),
(8, 'Xbox one'),
(9, 'Xbox 360'),
(10, 'Xbox'),
(11, 'PS1'),
(12, 'PS2'),
(13, 'PS3'),
(14, 'PS4'),
(15, 'PS5'),
(16, 'PSP'),
(17, 'PS Vita');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `tipo_usuario` varchar(10) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `usuario`, `correo`, `pass`, `tipo_usuario`) VALUES
(1, 'Pepe', 'pepito', 'pepe@mail.com', 'gbdsafbdfbfgb', 'usuario'),
(2, 'Pepe1', 'pepito1', 'pepe1@mail.com', 'dghsdrhdf', 'usuario'),
(3, 'admin', 'admin', 'admin@mail.com', 'admin', 'admin'),
(4, 'lolo', 'lolito', 'lolo@mail.com', 'dfgdsafbdfab', 'usuario'),
(5, 'usuario', 'usuario', 'usuario@mail.com', 'usuario', 'usuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`idclasificacion`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idjuego`),
  ADD KEY `FK_Clasificacion` (`idclasificacion`),
  ADD KEY `FK_Plataforma` (`idplataforma`);

--
-- Indexes for table `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`idplataforma`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `idclasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idjuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `idplataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_Clasificacion` FOREIGN KEY (`idclasificacion`) REFERENCES `clasificacion` (`idclasificacion`),
  ADD CONSTRAINT `FK_Plataforma` FOREIGN KEY (`idplataforma`) REFERENCES `plataforma` (`idplataforma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
