-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-02-2021 a las 00:55:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `GameShark`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `idclasificacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` ( `nombre`) VALUES
('EC-infancia temprana'),
('E-todos'),
('E+10-todos sobre 10 años'),
('T-adolescentes'),
('M-adolescentes sobre 17 años'),
('AO-adultos solamente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
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
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`nombre`, `estado`, `fecha`, `idclasificacion`, `idplataforma`, `cantidad`, `precio`) VALUES
( 'nombre ', 'usado', '2020-01-10', 2, 1, 6, 3.99),
( 'Nombre del juego ', 'usado', '2021-02-03', 3, 1, 12, 2.02),
('Nombre del juego 3 ', 'nuevo', '2021-02-03', 1, 1, 12, 2.99),
( 'Nombre del juego 3 ', 'nuevo', '2021-02-03', 1, 1, 12, 2.99),
('Nombre del juego 3 ', 'usado', '2021-02-03', 1, 1, 12, 2.99),
( 'Nombre del juego 4 ', 'usado', '2021-02-05', 3, 3, 9, 9.99),
( 'Nombre del juego 5 ', 'nuevo', '2021-02-05', 1, 1, 9, 50.49),
( 'Nombre del juego 6 ', 'nuevo', '2021-02-05', 1, 1, 9, 50.49),
('Nombre del juego 7 ', 'nuevo', '2021-02-05', 1, 1, 9, 4.66),
( 'Nombre del juego 7 ', 'nuevo', '2021-02-05', 1, 1, 9, 4.66),
( 'Nombre del juego 7 ', 'usado', '2021-02-05', 1, 1, 9, 4.66),
( 'Nombre del juego 8 ', 'usado', '2021-02-05', 1, 1, 9, 4.66),
('Nombre del juego 8', 'usado', '2021-02-05', 1, 1, 9, 4.66),
( 'Nombre del juego 8', 'usado', '2021-02-05', 1, 1, 9, 4.66),
( 'Nombre del juego 8', 'usado', '2021-02-05', 1, 1, 9, 4.66),
( 'Nombre del juego 20', 'nuevo', '2021-02-05', 1, 1, 9, 4.66),
( 'Nombre del juego 20', 'nuevo', '2021-02-05', 1, 1, 9, 4.66),
('Ultimo Registro', 'nuevo', '2021-02-27', 2, 7, 10, 9.99),
('Este se olvido', 'nuevo', '2021-02-27', 1, 1, 6, 2.66),
( 'jhbvjh', 'nuevo', '2021-02-27', 1, 1, 33, 6.00),
(' juego 21', 'usado', '2021-02-02', 2, 1, 5, 20.00),
('22', 'usado', '2021-02-10', 1, 1, 5, 2.99),
( 'Ultimo', 'nuevo', '2021-02-26', 4, 6, 10, 12.45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `idplataforma` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`nombre`) VALUES
( '3DS'),
('Switch'),
( 'DS'),
('Wii'),
( 'Wii U'),
( 'Gamecube'),
( 'Xbox Series X'),
('Xbox one'),
('Xbox 360'),
( 'Xbox'),
( 'PS1'),
( 'PS2'),
( 'PS3'),
('PS4'),
('PS5'),
( 'PSP'),
('PS Vita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `usuario`, `correo`, `pass`) VALUES
('Pepe', 'pepito', 'pepe@mail.com', 'gbdsafbdfbfgb'),
('Pepe1', 'pepito1', 'pepe1@mail.com', 'dghsdrhdf'),
('admin', 'admin', 'admin@mail.com', 'admin'),
('lolo', 'lolito', 'lolo@mail.com', 'dfgdsafbdfab');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`idclasificacion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idjuego`),
  ADD KEY `FK_Clasificacion` (`idclasificacion`),
  ADD KEY `FK_Plataforma` (`idplataforma`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`idplataforma`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `idclasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idjuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `idplataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_Clasificacion` FOREIGN KEY (`idclasificacion`) REFERENCES `clasificacion` (`idclasificacion`),
  ADD CONSTRAINT `FK_Plataforma` FOREIGN KEY (`idplataforma`) REFERENCES `plataforma` (`idplataforma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
