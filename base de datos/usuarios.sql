-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2023 a las 15:21:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_curso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `tipo_usuario`) VALUES
(3, 'loginAdmin', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'administrador'),
(4, 'Gracirrrreeee', '74ebe67476b0fd52cd19eb1e06b4119e381437508d0774e298be5cf0da4af3b3f5dd547b19f571c3bc7039c62869595c67d11d80a7e39e17dfda66013e973394', 'usuario'),
(5, 'Gabriel', '5082abaa01171fc8c51f74a41770d7e9e63a43fc21a8353a98d01080537f4187a2df4f8314a183c591ffbe5716aa4dcef72e3cb86272c31ca5e80d557d2c93f5', 'administrador'),
(6, 'Profesor', 'd410d5f72302357e2fdd959a3e2b94adc103b77195d66e0260b797e5a0f3a5a28932e2515347dcd0d3fa1f935cd136e8830b345d77e04ec168401713ffeeaee3', 'administrador'),
(7, 'Christian Peña', 'ffa4a6c132831062099c9e6c59aae53bbdce44259765b85fdfc3e696c056e01c5fc59fd65cc554b0c7a8db87d18dc10ccb115743d9977b49fd68e104a78bd9b1', 'usuario'),
(8, 'Alumno', '4af7a982f850eff53e1287fab34f967c9180909693999ac4c20f68482ac21df88c259999ddc2731b5ba773a0b3eedead05b4f2d8b054fd47890c04b0a2f2866c', 'usuario'),
(9, 'samuel', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'usuario'),
(10, 'Christian', '21d28a7ffe04cdeb677ab3d8b8e5e38fef126cac15f7b8c3023c57fc436cd6d96abd64e20d7788f603cf270be0ab8dfbfa1f88b23209296a6a8305108e1fc93f', 'administrador'),
(11, 'pedro', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
