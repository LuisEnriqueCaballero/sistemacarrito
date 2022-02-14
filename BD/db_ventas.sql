-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 14:27:00
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_producto`, `id_categoria`, `id_imagen`, `id_usuario`, `nombre`, `descripcion`, `cantidad`, `precio`, `fechaCaptura`) VALUES
(1, 2, 0, 6, 'ENRIQUE', 'ddd', 1, 213, '2022-02-09'),
(3, 2, 11, 6, 'FRESA', 'FRIO RICO', 2, 15, '2022-02-11'),
(4, 5, 12, 6, 'ADIDAS', 'POLO DE ALGODON 100% PERUANO', 2, 1500, '2022-02-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreCategoria` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `id_usuario`, `nombreCategoria`, `fechaCaptura`) VALUES
(2, 6, 'HELADOS', '2022-02-03'),
(4, 6, 'AUTOS', '2022-02-08'),
(5, 6, 'POLO', '2022-02-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rfc` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `rfc`) VALUES
(1, 6, 'luis', 'EEE', 'E', 'EEEgg', '555', 'EEE'),
(3, 6, 'ENRIQUE', 'CABALLERO', 'SS', 'SS', '5555', 'SSS'),
(4, 6, 'Andy', 'POLO', 'LOS JIRASOLES', 'ELPAPURI@gamil.com', '99955211', 'los jupiter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ruta` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_categoria`, `nombre`, `ruta`, `fechaSubida`) VALUES
(2, 0, 'itachi.jpg', '', '2022-02-04'),
(3, 0, 'design.png', '../../archivos/design.png', '2022-02-08'),
(4, 2, 'design.png', '../../archivos/design.png', '2022-02-08'),
(5, 4, 'toyota.jpg', '../../archivos/toyota.jpg', '2022-02-08'),
(6, 4, 'toyota.jpg', '../../archivos/toyota.jpg', '2022-02-08'),
(7, 4, 'toyota.jpg', '../../archivos/toyota.jpg', '2022-02-09'),
(8, 4, 'toyota.jpg', '../../archivos/toyota.jpg', '2022-02-09'),
(9, 2, 'luisenrique.jpg', '../../archivos/luisenrique.jpg', '2022-02-09'),
(11, 2, 'itachi.jpg', '../../archivos/itachi.jpg', '2022-02-11'),
(12, 5, 'pique_acero.jpg', '../../archivos/pique_acero.jpg', '2022-02-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(225) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` tinytext COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `fechaCaptura`) VALUES
(4, 'Pipa del 8', 'Ursa Phaton lancer', 'support@hotmail.com', '3b3eb0498fef7fbfca0cf08d86a1815d62ba18ea', '2022-01-31'),
(6, 'admin', 'admin', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2022-01-31'),
(10, 'PEPE', 'PEPE', 'PEPE', '3d72e9967fe1a33d2ba707551bec221eca7ebebf', '2022-02-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_producto`, `id_usuario`, `precio`, `fechaCompra`) VALUES
(1, 4, 1, 6, 15, '2022-02-11'),
(1, 1, 4, 6, 1500, '2022-02-11'),
(1, 4, 4, 6, 1500, '2022-02-11'),
(2, 4, 4, 6, 1500, '2022-02-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
