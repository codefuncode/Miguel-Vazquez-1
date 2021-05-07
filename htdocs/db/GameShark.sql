-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-05-2021 a las 21:30:09
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

INSERT INTO `clasificacion` (`idclasificacion`, `nombre`) VALUES
(1, 'EC-infancia temprana'),
(2, 'E-todos'),
(3, 'E+10-todos sobre 10 años'),
(4, 'T-adolescentes'),
(5, 'M-adolescentes sobre 17 años'),
(6, 'AO-adultos solamente');

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

INSERT INTO `inventario` (`idjuego`, `nombre`, `estado`, `fecha`, `idclasificacion`, `idplataforma`, `cantidad`, `precio`) VALUES
(1, 'nombre ', 'usado', '2020-01-10', 2, 1, 0, 3.99),
(2, 'Nombre del juego ', 'usado', '2021-02-03', 3, 1, 0, 2.02),
(3, 'Nombre del juego 3 ', 'nuevo', '2021-02-03', 1, 1, 0, 2.99),
(4, 'Nombre del juego 3 ', 'nuevo', '2021-02-03', 1, 1, 7, 2.99),
(5, 'Nombre del juego 3 ', 'usado', '2021-02-03', 1, 1, 6, 2.99),
(6, 'Nombre del juego 4 ', 'usado', '2021-02-05', 3, 3, 8, 9.99),
(7, 'Nombre del juego 5 ', 'nuevo', '2021-02-05', 1, 1, 9, 50.49),
(8, 'Nombre del juego 6 ', 'nuevo', '2021-02-05', 1, 1, 6, 50.49),
(9, 'Nombre del juego 7 ', 'nuevo', '2021-02-05', 1, 1, 9, 4.66),
(10, 'Nombre del juego 7 ', 'nuevo', '2021-02-05', 1, 1, 9, 4.66),
(11, 'Nombre del juego 7 ', 'usado', '2021-02-05', 1, 1, 6, 4.66),
(12, 'Nombre del juego 8 ', 'usado', '2021-02-05', 1, 1, 9, 4.66),
(13, 'Nombre del juego 8', 'usado', '2021-02-05', 1, 1, 9, 4.66),
(14, 'Nombre del juego 8', 'usado', '2021-02-05', 1, 1, 9, 4.66),
(15, 'Nombre del juego 8', 'usado', '2021-02-05', 1, 1, 9, 4.66),
(16, 'Nombre del juego 20', 'nuevo', '2021-02-05', 1, 1, 9, 4.66),
(17, 'Nombre del juego 20', 'nuevo', '2021-02-05', 1, 1, 9, 4.66),
(18, 'Ultimo Registro', 'nuevo', '2021-02-27', 2, 7, 6, 9.99),
(19, 'Este se olvido', 'nuevo', '2021-02-27', 1, 1, 6, 2.66),
(20, 'jhbvjh', 'nuevo', '2021-02-27', 1, 1, 26, 6.00),
(21, ' juego 21', 'usado', '2021-02-02', 2, 1, 5, 20.00),
(22, '22', 'usado', '2021-02-10', 1, 1, 5, 2.99),
(23, 'Ultimo', 'nuevo', '2021-02-26', 4, 6, 10, 12.45),
(24, 'ko', 'usado', '2021-02-03', 3, 5, 20, 30.00),
(25, 'g', 'usado', '2021-02-02', 6, 7, 30, 3.00),
(27, 'uno', 'usado', '2021-02-03', 2, 6, 8, 29.97),
(28, 'uno', 'usado', '2021-02-03', 2, 6, 8, 29.97),
(29, 'uno', 'usado', '2021-02-03', 2, 6, 8, 29.97),
(30, 'Ptrueba 1', 'nuevo', '2021-02-18', 2, 10, 30, 9.99),
(31, 'Ptrueba 1', 'nuevo', '2021-02-18', 2, 10, 30, 9.99),
(32, 'PruebaDos', 'nuevo', '2021-03-03', 3, 13, 30, 3.22),
(33, 'Ppppppp', 'nuevo', '2021-04-08', 2, 9, 10, 15.00);

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
-- Estructura de tabla para la tabla `usuario`
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `usuario`, `correo`, `pass`, `tipo_usuario`) VALUES
(1, 'Pepeupdate', 'pepito', 'pepe@mail.com', 'pepito', 'usuario'),
(10, 'admin', 'admin', 'admin@mail.com', 'admin', 'admin'),
(16, 'Carlos', 'user', 'user@main.com', 'user', 'usuario'),
(17, 'Carlos', 'hols', 'hola@mail.com', 'hola', 'usuario');

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
  MODIFY `idjuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `idplataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
