-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 11:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `cuenta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `dui` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`cuenta`, `nombre`, `saldo`, `dui`) VALUES
(91996, 'Mario', '200.00', '78927824'),
(296664, '', '0.00', ''),
(892842, 'Christian', '500.00', '064245947');

-- --------------------------------------------------------

--
-- Table structure for table `dependientes_banco`
--

CREATE TABLE `dependientes_banco` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `num_identificacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dependientes_banco`
--

INSERT INTO `dependientes_banco` (`id`, `nombre`, `fecha_nacimiento`, `num_identificacion`) VALUES
(1, 'Christian', '2002-10-27', '064245947');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `accion_personal` varchar(30) NOT NULL,
  `estado_aprobacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `cargo`, `accion_personal`, `estado_aprobacion`) VALUES
(2, 'Mario', '', 'Limpieza General', 'Inactivo'),
(8, 'Lucas', '', 'Revision de datos', 'Inactivo'),
(10, '', '', '', 'En espera'),
(11, '', '', '', 'En espera'),
(12, '', '', '', 'En espera'),
(13, '', '', '', 'En espera'),
(14, '', '', '', 'En espera'),
(15, '', '', '', 'En espera'),
(16, '', '', '', 'En espera'),
(17, '', '', '', 'En espera'),
(18, '', '', '', 'En espera'),
(19, '', '', '', 'En espera'),
(20, '', '', '', 'En espera'),
(21, '', '', '', 'En espera'),
(22, '', '', '', 'En espera'),
(23, '', '', '', 'En espera');

-- --------------------------------------------------------

--
-- Table structure for table `prestamos_banco`
--

CREATE TABLE `prestamos_banco` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `salario` float(10,2) NOT NULL,
  `monto` float(10,2) NOT NULL,
  `plazo` int(3) NOT NULL,
  `tasa` float(5,2) NOT NULL,
  `cuota` float(10,2) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `fecha_apertura` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestamos_banco`
--

INSERT INTO `prestamos_banco` (`id`, `nombre_cliente`, `salario`, `monto`, `plazo`, `tasa`, `cuota`, `estado`, `fecha_apertura`) VALUES
(1, 'Christian', 0.00, 100.00, 2, 0.00, 0.00, 'Aprobado', '2023-04-29 13:18:58'),
(2, 'Pablo', 0.00, 300.00, 3, 0.00, 0.00, 'Aprobado', '2023-05-03 19:35:57'),
(3, 'Lucas', 0.00, 200.00, 2, 0.00, 0.00, 'Aprobado', '2023-05-03 19:36:26'),
(4, 'Cristhian', 0.00, 300.00, 20, 0.00, 0.00, 'Aprobado', '2023-05-03 21:40:37'),
(5, 'Pobre', 0.00, 500.00, 10, 0.00, 0.00, 'Desaprobad', '2023-05-04 00:13:49'),
(6, 'Mario', 0.00, 400.00, 10, 0.00, 0.00, 'en espera', '2023-05-09 12:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`id`, `tipo`, `nombre`, `direccion`, `telefono`, `email`) VALUES
(1, 'cliente', 'Christian', 'Parque Residencial Moriah, calle principal, casa 18', '79426266', 'christianjosepena@gmail.com'),
(2, 'cliente', 'Christian', 'Parque Residencial Moriah, calle principal, casa 18', '79426266', 'christianjosepena@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transacciones`
--

CREATE TABLE `transacciones` (
  `cuenta` varchar(255) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `monto` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transacciones`
--

INSERT INTO `transacciones` (`cuenta`, `dui`, `monto`, `tipo`, `fecha`, `hora`) VALUES
('892842', '064245947', '100.00', 'ingreso', '2023-04-19', '0000-00-00'),
('892842', '064245947', '100.00', 'ingreso', '2023-04-20', '2001-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `tipo_usuario`) VALUES
(1, 'Christian', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Cliente'),
(2, 'Jose', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Cajero'),
(3, 'Lucas', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Cliente'),
(4, 'Mario', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Cajero'),
(5, 'Pepe', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Cajero'),
(6, 'Oscar', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Ger.Sucursal'),
(7, 'Aaron', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`cuenta`);

--
-- Indexes for table `dependientes_banco`
--
ALTER TABLE `dependientes_banco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestamos_banco`
--
ALTER TABLE `prestamos_banco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=944457;

--
-- AUTO_INCREMENT for table `dependientes_banco`
--
ALTER TABLE `dependientes_banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `prestamos_banco`
--
ALTER TABLE `prestamos_banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
