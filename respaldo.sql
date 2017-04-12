-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-04-2017 a las 10:12:54
-- Versión del servidor: 5.5.51-38.2
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lapera_liga_chileno_alemana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_correos`
--

CREATE TABLE IF NOT EXISTS `log_correos` (
  `id` int(11) NOT NULL,
  `destinatarios` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `registro_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `log_correos`
--

INSERT INTO `log_correos` (`id`, `destinatarios`, `registro_id`, `created`) VALUES
(4, ' jaimeirazabal1@gmail.com', 4, '2017-04-12 15:02:12'),
(3, 'taymetayme8@gmail.com', 4, '2017-04-12 15:02:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
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
  `genero` varchar(10) DEFAULT NULL,
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
  `nombreAnfitrion` varchar(100) DEFAULT NULL,
  `foto` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `colegio`, `nombre`, `curso`, `fechaDeNacimiento`, `nacionalidad`, `mail`, `fuma`, `direccion`, `vivocon`, `hobbys`, `genero`, `numIdentidad`, `religion`, `celular`, `tallapolera`, `telefonofijo`, `nivelidioma`, `otrosAntecedentes`, `nombrePadre`, `edadPadre`, `mailPadre`, `celularPadre`, `nombreMadre`, `edadMadre`, `mailMadre`, `celularMadre`, `tengoParientes`, `tengoAnfitriones`, `nombreAnfitrion`, `foto`, `created`) VALUES
(4, 'El Colegio donde estudié', 'Jaime Irazabal', 'Curso (hoy)', '2017-04-07', 'Nacionalidad(es)', 'jaimeirazabal1@gmail.com', 0, 'Dirección', 'Eltern', 'HobbiesHobbiesHobbies', 'männlich', '16923509', 'Religión', '+49 4143299925', 'L', '165156165', 'Deutsch |                          Nivel del idioma extranjera', 'Otros antecedentes importantes', 'Apellidos y nombre padre', 502, 'padre@gmail.com', '+56 11111321', 'Apellidos y nombre madre', 45, 'madre@gmail.com', '+56 22222321', 0, 0, 'aaa', '2017_04_07_20_05_44_header_castilleja.jpg', '2017-04-07 15:13:01'),
(5, 'Mi colegio', 'Nombre completo', 'Curso (hoy)', '2017-04-07', 'Nacionalidad(es)', 'jaimeirazabal1@gmail.com', 0, 'Dirección', 'Eltern', 'HobbiesHobbiesHobbies', 'weiblich', '16923509', 'Religión', '+56 4143299925', 'S', '165156165', 'Deutsch |             Nivel del idioma extranjera', 'Otros antecedentes importantes', 'Apellidos y nombre padre', 50, 'padre@gmail.com', '+56 11111', 'Apellidos y nombre madre', 45, 'madre@gmail.com', '+56 22222', 1, NULL, NULL, '2017_04_07_17_14_48_ford fiesta.jpg', '2017-04-07 15:14:48'),
(8, 'Jose Victorino Lastarria', 'Mauro Nicolás Rojas Vivanco', 'Innovación', '1987-10-15', 'Chileno', 'contacto@maurorojas.cl', 1, 'Cirujano Guzman ', 'Mutter', 'karate', 'männlich', '16743561-0', 'Ninguna', '+56 990859686', 'm', '+5622356598', 'Spanisch | alto', 'no tengo enfermedades', 'jose cuadra', 55, 'juan@lala.cl', '+56 99065630', 'juana cruz', 40, 'juanluis@lala.cl', '+56 655986565', 1, NULL, 'Gorbea 1992, son dos personas', '2017_04_10_09_58_41_Null24.jpg', '2017-04-10 14:58:41'),
(9, 'Villarrica', 'Almut Rysse', '33dd', '1990-01-12', 'alemán ', 'almut.ryssel@gmail.com', 0, 'am dorf 123, 07745 Dorf ', 'Eltern', 'Viele', 'weiblich', '240674777', 'ninguna', '+56 981355691', 'S', '03017452829', 'Deutsch |    B2', 'Ich bin gesund ', 'Ryssel Arne', 54, 'blbla@gmail.com', '+56 15276489320', 'Ryssel Antje', 52, 'bajalaj@gmail.com', '+56 143592020', 1, NULL, 'liebestrasae blavla', '2017_04_10_11_07_56_12079198_880458612045220_623816448580017606_n.jpg', '2017-04-10 15:43:34'),
(10, 'Villarrica', 'Almut Rysse', '10', '1990-01-12', 'alemán ', 'almut.ryssel@gmail.com', 0, 'am dorf 123, 07745 Dorf ', 'Eltern', 'Viele', 'weiblich', '240674777', 'ninguna', '+56 981355691', 'S', '03017452829', 'Deutsch |   B2', 'Ich bin gesund ', 'Ryssel Arne', 54, 'blbla@gmail.com', '+56 15276489320', 'Ryssel Antje', 52, 'bajalaj@gmail.com', '+56 143592020', 1, NULL, 'asdasd', '2017_04_10_10_44_37_IMG-20170405-WA0011.jpg', '2017-04-10 15:44:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `password`, `created`) VALUES
(1, 'admin', 'admin', '2017-04-07 12:07:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `log_correos`
--
ALTER TABLE `log_correos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `log_correos`
--
ALTER TABLE `log_correos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
