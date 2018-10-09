-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2018 a las 11:24:33
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(3) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `apellidos` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nombre`, `apellidos`) VALUES
(1, 'Brandon', 'Sanderson');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_x_libro`
--

CREATE TABLE `autor_x_libro` (
  `idautor` int(3) NOT NULL,
  `idisbn` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autor_x_libro`
--

INSERT INTO `autor_x_libro` (`idautor`, `idisbn`) VALUES
(1, '9788466658911');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion`
--

CREATE TABLE `coleccion` (
  `id` int(3) NOT NULL,
  `coleccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `coleccion`
--

INSERT INTO `coleccion` (`id`, `coleccion`) VALUES
(1, 'Mistborn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id` int(3) NOT NULL,
  `editorial` varchar(64) DEFAULT NULL,
  `direccion` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `editorial`, `direccion`) VALUES
(1, 'Penguin Random House', 'Barcelona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuadernacion`
--

CREATE TABLE `encuadernacion` (
  `id` int(2) NOT NULL,
  `modelo` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuadernacion`
--

INSERT INTO `encuadernacion` (`id`, `modelo`) VALUES
(1, 'tapa dura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `id` int(2) NOT NULL,
  `formato` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`id`, `formato`) VALUES
(1, 'Papel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(3) NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`, `descripcion`) VALUES
(1, 'FantasÃ­a', 'alquimia y batallas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ilustrador`
--

CREATE TABLE `ilustrador` (
  `id` int(3) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `apellidos` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ilustrador`
--

INSERT INTO `ilustrador` (`id`, `nombre`, `apellidos`) VALUES
(1, 'Jota', 'Morgan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ilustrador_x_libro`
--

CREATE TABLE `ilustrador_x_libro` (
  `idilustrador` int(3) NOT NULL,
  `idisbn` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ilustrador_x_libro`
--

INSERT INTO `ilustrador_x_libro` (`idilustrador`, `idisbn`) VALUES
(1, '9788466658911');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `nombre` varchar(128) NOT NULL,
  `fecha` int(8) DEFAULT NULL,
  `deposito_legal` varchar(128) DEFAULT NULL,
  `caratula` varchar(128) NOT NULL,
  `unidades` int(6) NOT NULL,
  `num_impresion` int(6) DEFAULT NULL,
  `edicion` int(2) NOT NULL,
  `idioma` varchar(16) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `idencuadernacion` int(2) NOT NULL,
  `ideditorial` int(3) NOT NULL,
  `idtipologia` int(2) NOT NULL,
  `idcoleccion` int(3) NOT NULL,
  `idgenero` int(3) NOT NULL,
  `idformato` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`nombre`, `fecha`, `deposito_legal`, `caratula`, `unidades`, `num_impresion`, `edicion`, `idioma`, `ISBN`, `idencuadernacion`, `ideditorial`, `idtipologia`, `idcoleccion`, `idgenero`, `idformato`) VALUES
('El hÃ©roe de las Eras', 2006, 'B26.5252017', 'De_las_eras.jpg', 5, 1, 1, 'Castellano', '9788466658911', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipologia`
--

CREATE TABLE `tipologia` (
  `id` int(2) NOT NULL,
  `tipo` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipologia`
--

INSERT INTO `tipologia` (`id`, `tipo`) VALUES
(1, 'impresiÃ³n digital');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autor_x_libro`
--
ALTER TABLE `autor_x_libro`
  ADD PRIMARY KEY (`idautor`,`idisbn`),
  ADD KEY `idisbn` (`idisbn`);

--
-- Indices de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuadernacion`
--
ALTER TABLE `encuadernacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ilustrador`
--
ALTER TABLE `ilustrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ilustrador_x_libro`
--
ALTER TABLE `ilustrador_x_libro`
  ADD PRIMARY KEY (`idilustrador`,`idisbn`),
  ADD KEY `idisbn` (`idisbn`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `idencuadernacion` (`idencuadernacion`),
  ADD KEY `idformato` (`idformato`),
  ADD KEY `idtipologia` (`idtipologia`),
  ADD KEY `ideditorial` (`ideditorial`),
  ADD KEY `idcoleccion` (`idcoleccion`),
  ADD KEY `idgenero` (`idgenero`);

--
-- Indices de la tabla `tipologia`
--
ALTER TABLE `tipologia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `encuadernacion`
--
ALTER TABLE `encuadernacion`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ilustrador`
--
ALTER TABLE `ilustrador`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipologia`
--
ALTER TABLE `tipologia`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autor_x_libro`
--
ALTER TABLE `autor_x_libro`
  ADD CONSTRAINT `autor_x_libro_ibfk_1` FOREIGN KEY (`idautor`) REFERENCES `autor` (`id`),
  ADD CONSTRAINT `autor_x_libro_ibfk_2` FOREIGN KEY (`idisbn`) REFERENCES `libro` (`ISBN`);

--
-- Filtros para la tabla `ilustrador_x_libro`
--
ALTER TABLE `ilustrador_x_libro`
  ADD CONSTRAINT `ilustrador_x_libro_ibfk_1` FOREIGN KEY (`idilustrador`) REFERENCES `ilustrador` (`id`),
  ADD CONSTRAINT `ilustrador_x_libro_ibfk_2` FOREIGN KEY (`idisbn`) REFERENCES `libro` (`ISBN`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idencuadernacion`) REFERENCES `encuadernacion` (`id`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`idformato`) REFERENCES `formato` (`id`),
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`idtipologia`) REFERENCES `tipologia` (`id`),
  ADD CONSTRAINT `libro_ibfk_4` FOREIGN KEY (`ideditorial`) REFERENCES `editorial` (`id`),
  ADD CONSTRAINT `libro_ibfk_5` FOREIGN KEY (`idcoleccion`) REFERENCES `coleccion` (`id`),
  ADD CONSTRAINT `libro_ibfk_6` FOREIGN KEY (`idgenero`) REFERENCES `genero` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
