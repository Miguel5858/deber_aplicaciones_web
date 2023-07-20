-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2023 a las 22:42:11
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `deber_programacion_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programadores`
--

CREATE TABLE `programadores` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informacion` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programadores`
--

INSERT INTO `programadores` (`id`, `nombres`, `apellidos`, `cargo`, `informacion`, `imagen`) VALUES
(3, 'Linus Benedict', 'Torvalds', 'Ingeniero de software ', 'Linus Benedict Torvalds, es un ingeniero de software finlandés, programador pionero y creador del Linux Kernel en 1991. El kernel Linux, escrito en C, es el componente principal o núcleo utilizado en los Sistemas Operativos Libres. Torvalds, actualmente se desempeña como coordinador principal del proyecto Kernel de Linux, proyecto open source que tiene el soporte de cientos de programadores de todo el mundo.\r\n\r\nActualmente es miembro del consejo de administración de la Linux Foundation, organización que promueve el uso y capacitación online del Sistema Operativo de Linux.', '1689885530_linus_torvalds_linux_SO.jpg'),
(4, 'Guido van', 'Rossum', 'Científico de la computación', 'Guido van Rossum, es un científico de la computación holandés, que es mejor conocido como el padre del lenguaje de programación Python.\r\n\r\nEn la comunidad Python, Van Rossum fue conocido como un «Dictador Benevolente» (BDFL), debido a que era él quién supervisaba el proceso de los nuevos cambios en el lenguaje de Python, y era quien tomaba las ultimas decisiones cuando era necesario. Recientemente, el 12 de Julio del 2018, Van Rossum, abandona la supervisión del desarrollo de Python, debido a que tuvo muchos problemas con los demás miembros de la comunidad, como lo menciona en su último mensaje.\r\n\r\nTrabajó en Google desde 2005 hasta el 7 de diciembre de 2012, donde desarrolló Mondrian, una aplicación web (escrito mayormente en Python) cuya finalidad era de revisar código fuente de los proyectos de Google, el cual lo usaron al interno de la compañía. Actualmente se encuentra trabajando en Dropbox.', '1689885618_guido_van_rossum_2018_scw.jpg'),
(5, 'Mark ', 'Zuckerberg', 'Empresario y programador', 'Nacido en el seno de una familia judía acomodada, su pasión por la informática se manifestó muy pronto; comenzó a programar a los doce años. Cursó estudios en el Ardsley High School y la Phillips Exeter Academy, y en 2002 ingresó en la Universidad de Harvard, Massachusetts. Dos años más tarde, a principios de febrero de 2004, con tan sólo diecinueve años y junto a sus compañeros de habitación en la universidad, lanzó un nuevo sitio web, la red social Facebook.', '1689885696_mark.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`) VALUES
(1, 'Miguel', 'miguel', '$2y$10$PLHpi.Vck/JfrRYFi0lRcebPZYzsps1x72BE3wFI.ifIxdZyLnWP2'),
(2, 'Alejandro Intriago Tobar', 'alejandro', '$2y$10$iXP7V613joOfIs30vraO8.Nz3/GUW.w2gFiKlDlDczayvUugzVPyK'),
(3, 'Tomas Intriago', 'tomas', '$2y$10$64/1QbodYjVl1cE4G2zpkOJf4Knl0X4Q6WlpKTfyNURqWJxcu2Sdy'),
(9, 'Amanda', 'amanda', '$2y$10$Eq7gVCOUtIVnXesrfVjPkOi3r.NUUyiTSkAcUedrkJBjIy0XlMcuW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `programadores`
--
ALTER TABLE `programadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `programadores`
--
ALTER TABLE `programadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
