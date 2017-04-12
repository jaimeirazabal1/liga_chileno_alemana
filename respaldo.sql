-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2017 a las 20:12:08
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liga_chileno_alemana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `colegio` varchar(40) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `curso` varchar(40) NOT NULL,
  `fechaDeNacimiento` date NOT NULL,
  `nacionalidad` varchar(30) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `fuma` tinyint(1) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `vivocon` varchar(30) NOT NULL,
  `hobbys` varchar(50) NOT NULL,
  `genero` tinyint(1) DEFAULT NULL,
  `numIdentidad` varchar(30) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `tallapolera` varchar(2) NOT NULL,
  `telefonofijo` varchar(20) NOT NULL,
  `nivelidioma` varchar(100) NOT NULL,
  `otrosAntecedentes` varchar(200) NOT NULL,
  `nombrePadre` varchar(100) NOT NULL,
  `edadPadre` int(11) NOT NULL,
  `mailPadre` varchar(40) NOT NULL,
  `celularPadre` varchar(20) NOT NULL,
  `nombreMadre` varchar(100) NOT NULL,
  `edadMadre` int(11) NOT NULL,
  `mailMadre` varchar(40) NOT NULL,
  `celularMadre` varchar(20) NOT NULL,
  `tengoParientes` tinyint(1) DEFAULT NULL,
  `tengoAnfitriones` tinyint(1) DEFAULT NULL,
  `nombreAnfitrion` varchar(100) NOT NULL,
  `foto` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `colegio`, `nombre`, `curso`, `fechaDeNacimiento`, `nacionalidad`, `mail`, `fuma`, `direccion`, `vivocon`, `hobbys`, `genero`, `numIdentidad`, `religion`, `celular`, `tallapolera`, `telefonofijo`, `nivelidioma`, `otrosAntecedentes`, `nombrePadre`, `edadPadre`, `mailPadre`, `celularPadre`, `nombreMadre`, `edadMadre`, `mailMadre`, `celularMadre`, `tengoParientes`, `tengoAnfitriones`, `nombreAnfitrion`, `foto`, `created`) VALUES
(4, 'El Colegio donde estudié', 'Jaime Irazabal', 'Curso (hoy)', '2017-04-07', 'Nacionalidad(es)', 'mail@gmail.com', 0, 'Dirección', 'Eltern', 'HobbiesHobbiesHobbies', 0, '16923509', 'Religión', '+49 4143299925', 's', '165156165', 'Deutsch |        Nivel del idioma extranjera', 'Otros antecedentes importantes', 'Apellidos y nombre padre', 502, 'padre@gmail.com', '+56 11111321', 'Apellidos y nombre madre', 45, 'madre@gmail.com', '+56 22222321', 1, NULL, 'Ya tengo familia anfitriona (Nombre, dirección, mail)', '2017_04_07_20_05_44_header_castilleja.jpg', '2017-04-07 15:13:01'),
(5, 'Mi colegio', 'Nombre completo', 'Curso (hoy)', '2017-04-07', 'Nacionalidad(es)', 'mail@gmail.com', 0, 'Dirección', 'Eltern', 'HobbiesHobbiesHobbies', 0, '16923509', 'Religión', '+56 4143299925', 's', '165156165', 'Deutsch | Nivel del idioma extranjera', 'Otros antecedentes importantes', 'Apellidos y nombre padre', 50, 'padre@gmail.com', '+56 11111', 'Apellidos y nombre madre', 45, 'madre@gmail.com', '+56 22222', 0, NULL, 'Ya tengo familia anfitriona (Nombre, dirección, mail)', '2017_04_07_17_14_48_ford fiesta.jpg', '2017-04-07 15:14:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `password`, `created`) VALUES
(1, 'admin', 'admin', '2017-04-07 12:07:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
