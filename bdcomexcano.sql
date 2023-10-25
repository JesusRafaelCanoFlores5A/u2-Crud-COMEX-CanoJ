-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 21:33:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcomexcano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`name`, `email`, `username`, `password`, `id`) VALUES
('Jesus Rafael Cano Flores\r\n', 'rafamations12@gmail.com', 'Rafa', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Jesus Cano', 'bones18@gmail.com', 'Jesus', '81dc9bdb52d04dc20036dbd8313ed055', 2),
('Hola', 'hola@1', 'hola', '81dc9bdb52d04dc20036dbd8313ed055', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pintura`
--

CREATE TABLE `pintura` (
  `id_pintura` int(11) NOT NULL,
  `pintura_nombre` varchar(500) NOT NULL,
  `precio` int(11) NOT NULL,
  `litros` int(11) NOT NULL,
  `esquema` varchar(500) NOT NULL,
  `descuento` int(11) NOT NULL,
  `proveedor` varchar(500) NOT NULL,
  `codigo` varchar(500) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pintura`
--

INSERT INTO `pintura` (`id_pintura`, `pintura_nombre`, `precio`, `litros`, `esquema`, `descuento`, `proveedor`, `codigo`, `id_usuario`, `id`) VALUES
(1, 'Rojo', 150, 2, 'Escarlata', 15, 'Comex', '#45F45', 3, 1),
(2, 'Azul', 200, 4, 'Indigo', 50, 'Berel', '#917FA', 1, 2),
(3, 'verde', 175, 3, 'primaveral', 25, 'Sherwin Williams', '#81FD12', 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pintura`
--
ALTER TABLE `pintura`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pintura`
--
ALTER TABLE `pintura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
