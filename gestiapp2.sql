-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2021 a las 00:38:31
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestiapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `nombre`) VALUES
(1, 'ITAU'),
(2, 'Banco de Chile'),
(3, 'Banco Estado'),
(4, 'No tiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(30) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `detalles` varchar(800) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `id_forma_pago` int(11) DEFAULT NULL,
  `rut` varchar(30) DEFAULT NULL,
  `id_banco` int(11) DEFAULT NULL,
  `n_cuenta` varchar(30) DEFAULT NULL,
  `id_tipo_cuenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_completo`, `direccion`, `telefono`, `detalles`, `correo`, `id_forma_pago`, `rut`, `id_banco`, `n_cuenta`, `id_tipo_cuenta`) VALUES
(5, 'esteban', 'direccion 212', '', '', '123', 1, '-', 1, '', 1),
(10, 'Enrique', '', '', '', '', 1, '1234-5', 1, '', 1),
(12, 'Ninguno', '', '', '', 'No Borrar', 1, '', 1, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto_elegido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `nombre`, `precio`, `id_venta`, `id_producto_elegido`) VALUES
(17, 'Falda', 2000, 4, 15),
(24, 'Seguro de vida', 1300, 12, 14),
(27, 'martillos', 2000, 13, 18),
(28, 'martillos', 2000, 13, 18),
(32, '12', 11111, 14, 19),
(33, 'Falda', 526, 4, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas_usuario`
--

CREATE TABLE `empresas_usuario` (
  `id` int(11) NOT NULL,
  `nombre_abreviado` varchar(30) NOT NULL,
  `razon_social` varchar(30) NOT NULL,
  `rut` varchar(30) NOT NULL,
  `giro` varchar(60) NOT NULL,
  `id_usuarios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas_usuario`
--

INSERT INTO `empresas_usuario` (`id`, `nombre_abreviado`, `razon_social`, `rut`, `giro`, `id_usuarios`) VALUES
(9, 'empresa constructora LN SA', 'Constructora social', '18758308-8', 'Almacenes y construccion', NULL),
(10, 'empresa UNO ', 'empresa UNO AFP', '74444444', 'AFP', NULL),
(11, 'Jeressan', 'jeressan LTDA', '2858585-9', 'Ropa y vestuario', NULL),
(13, '1', '1', '1', '1', NULL),
(14, '1', '2', '2', '2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id`, `nombre`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de crédito'),
(3, 'Tarjeta de débito'),
(4, 'Cheque'),
(5, 'Chequera electrónica'),
(6, 'No tiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_egreso`
--

CREATE TABLE `ingreso_egreso` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingreso_egreso`
--

INSERT INTO `ingreso_egreso` (`id`, `tipo`, `nombre`, `id_empresa`, `monto`) VALUES
(2, 0, 'Gasto Luz y agua', 11, 60000),
(4, 1, 'Beneficio estatal', 11, 8798),
(5, 0, 'Beneficio pymes', 11, 111),
(6, 1, 'hola', 10, 100000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `detalles` varchar(600) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `recordatorio` datetime DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `nombre`, `detalles`, `fecha`, `recordatorio`, `id_cliente`) VALUES
(3, 'Compras', 'Cazuela, pepinos', '2021-07-10 16:57:26', '0000-00-00 00:00:00', 5),
(4, 'aji', '', '2021-07-10 18:43:11', '0000-00-00 00:00:00', 5),
(5, 'nota editada', 'arroz', '2021-07-10 18:50:49', '2021-07-11 10:29:00', 10),
(7, '111', '', '2021-07-13 13:40:33', '0000-00-00 00:00:00', 5),
(8, '111', '', '2021-07-13 13:40:35', '0000-00-00 00:00:00', 5),
(9, '111', '', '2021-07-13 13:40:39', '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `cantidad`, `precio`, `id_empresa`) VALUES
(14, 'Seguro de vida', 19, 1300, 10),
(15, 'Falda', 4, 2000, 11),
(16, 'poleron', 3, 3000, 11),
(17, 'Seguro de Cesantia', 999, 10000, 10),
(18, 'martillos', 1, 2000, 9),
(19, '12', 0, 11111, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuenta`
--

CREATE TABLE `tipo_cuenta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_cuenta`
--

INSERT INTO `tipo_cuenta` (`id`, `nombre`) VALUES
(1, 'Cuenta vista'),
(2, 'Cuenta corriente'),
(3, 'Cuenta de ahorro'),
(4, 'No tiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `activo` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `clave`, `activo`, `nombre`) VALUES
(4, 'sc', 'sc', 1, 'sc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `id_cliente` int(11) NOT NULL,
  `id_empresas_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `id_cliente`, `id_empresas_usuario`) VALUES
(4, '2021-07-08 13:03:00', 5, 11),
(5, '2021-07-08 13:03:00', 5, 11),
(6, '0000-00-00 00:00:00', 5, 11),
(7, '0000-00-00 00:00:00', 10, 11),
(8, '0000-00-00 00:00:00', 5, 11),
(9, '2021-07-21 13:03:00', 5, 11),
(10, '0000-00-00 00:00:00', 10, 11),
(12, '2021-07-08 17:42:00', 10, 10),
(13, '2021-07-23 13:34:00', 10, 9),
(14, '2021-09-22 14:56:00', 5, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_forma_pago` (`id_forma_pago`),
  ADD KEY `id_tipo_cuenta` (`id_tipo_cuenta`),
  ADD KEY `id_banco` (`id_banco`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto_elegido` (`id_producto_elegido`);

--
-- Indices de la tabla `empresas_usuario`
--
ALTER TABLE `empresas_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso_egreso`
--
ALTER TABLE `ingreso_egreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_empresa`);

--
-- Indices de la tabla `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`,`id_empresas_usuario`),
  ADD KEY `id_empresas_usuario` (`id_empresas_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `empresas_usuario`
--
ALTER TABLE `empresas_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ingreso_egreso`
--
ALTER TABLE `ingreso_egreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_forma_pago`) REFERENCES `forma_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_tipo_cuenta`) REFERENCES `tipo_cuenta` (`id`),
  ADD CONSTRAINT `clientes_ibfk_3` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`);

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`id_producto_elegido`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `ingreso_egreso`
--
ALTER TABLE `ingreso_egreso`
  ADD CONSTRAINT `ingreso_egreso_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas_usuario` (`id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_empresas_usuario`) REFERENCES `empresas_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
