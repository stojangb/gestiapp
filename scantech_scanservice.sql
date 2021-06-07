-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2020 a las 20:09:36
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scantech_scanservice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id` int(11) NOT NULL,
  `certificado` int(11) NOT NULL,
  `id_terrestre` int(11) DEFAULT NULL,
  `id_maritimo` int(11) DEFAULT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `certificados`
--

INSERT INTO `certificados` (`id`, `certificado`, `id_terrestre`, `id_maritimo`, `id_servicio`) VALUES
(112, 1, NULL, 505, 247),
(114, 3, NULL, 507, 247),
(115, 4, NULL, 508, 247),
(116, 5, NULL, 509, 247),
(117, 6, NULL, 510, 247),
(118, 7, NULL, 511, 247),
(119, 8, NULL, 512, 247),
(120, 9, NULL, 513, 247),
(121, 10, NULL, 514, 247),
(122, 11, NULL, 515, 247),
(123, 12, NULL, 516, 247),
(124, 13, NULL, 517, 247),
(125, 14, NULL, 518, 247),
(126, 15, NULL, 519, 247),
(127, 16, NULL, 520, 247),
(128, 17, NULL, 521, 247),
(129, 18, NULL, 522, 247),
(130, 19, NULL, 523, 247),
(131, 20, NULL, 524, 247),
(132, 21, NULL, 525, 247),
(133, 22, NULL, 526, 247),
(134, 23, NULL, 527, 247),
(135, 24, NULL, 528, 247),
(136, 25, NULL, 529, 247),
(138, 27, NULL, 531, 248),
(139, 28, NULL, 532, 248),
(140, 29, NULL, 533, 248),
(141, 30, NULL, 534, 248),
(142, 31, NULL, 535, 248),
(143, 32, NULL, 536, 248),
(144, 33, NULL, 537, 248),
(145, 34, NULL, 538, 248),
(146, 35, NULL, 539, 248),
(147, 36, NULL, 540, 248),
(148, 37, NULL, 541, 248),
(149, 38, NULL, 542, 248),
(150, 39, NULL, 543, 248),
(151, 40, NULL, 544, 248),
(152, 41, NULL, 545, 248),
(153, 42, NULL, 546, 248),
(154, 43, NULL, 547, 248),
(155, 44, NULL, 548, 248),
(156, 45, NULL, 549, 248),
(157, 46, NULL, 550, 248),
(158, 47, NULL, 551, 248),
(159, 48, NULL, 552, 249),
(160, 49, NULL, 553, 249),
(161, 50, NULL, 554, 249),
(162, 51, NULL, 555, 249),
(164, 53, NULL, 557, 249),
(165, 54, NULL, 558, 249),
(166, 55, NULL, 559, 249),
(167, 56, NULL, 560, 249),
(168, 57, NULL, 561, 249),
(169, 58, NULL, 562, 249),
(170, 59, NULL, 563, 249),
(171, 60, NULL, 564, 249),
(172, 61, NULL, 565, 249),
(173, 62, NULL, 566, 249),
(174, 63, NULL, 567, 249),
(175, 64, NULL, 568, 249),
(176, 65, NULL, 569, 249),
(177, 66, NULL, 570, 249),
(178, 67, NULL, 571, 249),
(179, 68, NULL, 572, 249),
(180, 69, NULL, 573, 249),
(181, 70, 240, NULL, 250),
(182, 71, 241, NULL, 250),
(183, 72, 242, NULL, 250),
(184, 73, 243, NULL, 250),
(185, 74, 244, NULL, 250),
(186, 75, 245, NULL, 250),
(187, 76, 246, NULL, 250),
(188, 77, 247, NULL, 250),
(189, 78, 248, NULL, 250),
(190, 79, 249, NULL, 250),
(191, 80, 250, NULL, 250),
(192, 81, 251, NULL, 250),
(193, 82, 252, NULL, 250),
(194, 83, 253, NULL, 250),
(195, 84, 254, NULL, 250),
(196, 85, 255, NULL, 250),
(197, 86, 256, NULL, 250),
(198, 87, 257, NULL, 250),
(199, 88, 258, NULL, 250),
(200, 89, NULL, 574, 248),
(201, 90, 259, NULL, 249),
(202, 91, 260, NULL, 250),
(203, 92, 261, NULL, 247),
(204, 93, 262, NULL, 247),
(205, 94, 263, NULL, 247),
(206, 95, 264, NULL, 247),
(207, 96, 265, NULL, 247),
(208, 97, 266, NULL, 247),
(209, 98, 267, NULL, 247),
(210, 99, 268, NULL, 247),
(211, 100, 269, NULL, 247),
(212, 101, 270, NULL, 247),
(213, 102, 271, NULL, 247),
(214, 103, 272, NULL, 247),
(215, 104, 273, NULL, 247),
(216, 105, 274, NULL, 251),
(217, 106, 275, NULL, 251),
(218, 107, NULL, 575, 247),
(219, 108, NULL, 576, 252),
(220, 109, NULL, 577, 253),
(221, 110, NULL, 578, 254),
(222, 111, NULL, 579, 255),
(223, 112, NULL, 580, 252),
(224, 113, NULL, 581, 253),
(225, 114, NULL, 582, 256),
(226, 115, NULL, 583, 257),
(233, 122, 276, NULL, 261),
(234, 123, NULL, 590, 262),
(235, 124, NULL, 591, 262),
(236, 125, NULL, 592, 262),
(237, 126, NULL, 593, 263),
(238, 127, NULL, 594, 263),
(239, 128, NULL, 595, 264),
(240, 129, 277, NULL, 264),
(241, 130, 278, NULL, 263),
(243, 131, NULL, 597, 265),
(244, 132, 279, NULL, 260);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(35) NOT NULL,
  `nombreContacto` varchar(35) COLLATE utf8mb4_bin NOT NULL,
  `nombreEmpresa` varchar(35) COLLATE utf8mb4_bin NOT NULL,
  `rut` varchar(35) COLLATE utf8mb4_bin NOT NULL,
  `correo` varchar(35) COLLATE utf8mb4_bin NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `detalles` varchar(300) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombreContacto`, `nombreEmpresa`, `rut`, `correo`, `telefono`, `detalles`) VALUES
(874, '', 'Blumar Puerto Montt', '7917361-4', '', '', ''),
(877, '', 'don comas', '10479089-5', '', '', ''),
(878, '', 'Don Objetos', '111111111-1', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maritimo`
--

CREATE TABLE `maritimo` (
  `id` int(11) NOT NULL,
  `id_objetomaritimo` int(10) NOT NULL,
  `vueltafalsa` int(10) NOT NULL,
  `idservicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `maritimo`
--

INSERT INTO `maritimo` (`id`, `id_objetomaritimo`, `vueltafalsa`, `idservicio`) VALUES
(505, 133, 0, 247),
(507, 131, 0, 247),
(508, 130, 0, 247),
(509, 129, 0, 247),
(510, 128, 0, 247),
(511, 127, 0, 247),
(512, 126, 0, 247),
(513, 125, 0, 247),
(514, 116, 0, 247),
(515, 124, 0, 247),
(516, 123, 0, 247),
(517, 122, 0, 247),
(518, 121, 0, 247),
(519, 120, 0, 247),
(520, 119, 0, 247),
(521, 118, 0, 247),
(522, 117, 0, 247),
(523, 95, 0, 247),
(524, 94, 0, 247),
(525, 93, 0, 247),
(526, 92, 0, 247),
(527, 91, 0, 247),
(528, 90, 0, 247),
(529, 89, 0, 247),
(531, 133, 0, 248),
(532, 132, 0, 248),
(533, 131, 0, 248),
(534, 130, 0, 248),
(535, 129, 0, 248),
(536, 128, 0, 248),
(537, 127, 0, 248),
(538, 126, 0, 248),
(539, 125, 0, 248),
(540, 124, 0, 248),
(541, 117, 0, 248),
(542, 123, 0, 248),
(543, 122, 0, 248),
(544, 95, 0, 248),
(545, 121, 0, 248),
(546, 120, 0, 248),
(547, 119, 0, 248),
(548, 118, 0, 248),
(549, 116, 0, 248),
(550, 94, 1, 248),
(551, 93, 1, 248),
(552, 133, 1, 249),
(553, 132, 0, 249),
(554, 131, 0, 249),
(555, 127, 0, 249),
(557, 89, 1, 249),
(558, 90, 0, 249),
(559, 91, 0, 249),
(560, 92, 0, 249),
(561, 93, 0, 249),
(562, 94, 0, 249),
(563, 95, 0, 249),
(564, 116, 0, 249),
(565, 117, 0, 249),
(566, 118, 0, 249),
(567, 119, 0, 249),
(568, 120, 0, 249),
(569, 121, 0, 249),
(570, 123, 0, 249),
(571, 122, 0, 249),
(572, 124, 0, 249),
(573, 126, 0, 249),
(574, 135, 0, 248),
(575, 132, 1, 247),
(576, 138, 1, 252),
(577, 138, 1, 253),
(578, 138, 1, 254),
(579, 138, 1, 255),
(580, 137, 1, 252),
(581, 137, 1, 253),
(582, 138, 1, 256),
(583, 138, 1, 257),
(590, 135, 1, 262),
(591, 133, 1, 262),
(592, 132, 1, 262),
(593, 135, 1, 263),
(594, 133, 1, 263),
(595, 133, 1, 264),
(597, 88, 1, 265);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetomaritimo`
--

CREATE TABLE `objetomaritimo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) COLLATE utf8mb4_bin NOT NULL,
  `matricula` varchar(35) COLLATE utf8mb4_bin NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `objetomaritimo`
--

INSERT INTO `objetomaritimo` (`id`, `nombre`, `matricula`, `idcliente`) VALUES
(88, 'Don Nicolas', 'CV2161', 874),
(89, 'Eidsvag', 'CB9976', 874),
(90, 'Isla Chelin', 'CB8783', 874),
(91, 'Quellonina', 'CB3616', 874),
(92, 'Don Arturo', 'CA5188', 874),
(93, 'Rigel', 'PMO7665', 874),
(94, 'Amatista', 'CB9985', 874),
(95, 'Mar de Coral', 'CB6623', 874),
(116, 'Eduardo V', 'CA2224', 874),
(117, 'Doña Mariela', 'CB9021', 874),
(118, 'Elba America', 'CA2838', 874),
(119, 'Don Baldo I', 'CA4478', 874),
(120, 'Taykali Yurani', 'CB9123', 874),
(121, 'Los Rios I', 'CA6972', 874),
(122, 'Jaqueline I', 'CA3065', 874),
(123, 'Reina Ana', 'CA8135', 874),
(124, 'Don Matias', 'CA2836', 874),
(125, 'Don Rupe II', 'CA4051', 874),
(126, 'Antares II', 'CB8832', 874),
(127, 'Navsur III', 'CA6770', 874),
(128, 'Redes Sur', 'CA2574', 874),
(129, 'Poseidon III', 'CB9964', 874),
(130, 'Naomi Salem', 'CB8016', 874),
(131, 'Los Rios II', 'CA5504', 874),
(132, 'Isla Victoria', 'CA5191', 874),
(133, 'Cabo Machelan', 'CA6624', 874),
(135, 'Santa Katharinza', 'CB0101', 874),
(136, 'Santa Lucia', 'AAAA00', 877),
(137, 'Santa Señora', 'AAAA01', 877),
(138, 'Santa Teresa', 'AAAA02', 877);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros`
--

CREATE TABLE `otros` (
  `id` int(11) NOT NULL,
  `id_producto_nombre` int(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_maritimo` int(11) DEFAULT NULL,
  `id_terrestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `otros`
--

INSERT INTO `otros` (`id`, `id_producto_nombre`, `cantidad`, `id_servicio`, `id_maritimo`, `id_terrestre`) VALUES
(298, 100, 5, 251, NULL, 274),
(302, 101, 50, 248, 574, NULL),
(303, 103, 60, 248, 534, NULL),
(304, 94, 5, 248, 534, NULL),
(305, 95, 5, 250, NULL, 244),
(306, 100, 3, 250, NULL, 242),
(307, 101, 9, 250, NULL, 241),
(308, 98, 8, 250, NULL, 252),
(309, 107, 6, 250, NULL, 255),
(310, 100, 5, 261, NULL, 276);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `productos` varchar(35) COLLATE utf8mb4_bin NOT NULL,
  `tipoproducto` varchar(35) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `productos`, `tipoproducto`) VALUES
(89, 'Camion', 'Terrestre'),
(94, 'Bins Cosecha', 'Otro'),
(95, 'Contenedores Redes', 'Otro'),
(98, 'Mat. Ret.', 'Otro'),
(100, 'Piscinas', 'Otro'),
(101, 'Bins Mort.', 'Otro'),
(102, 'Pasillo Doble', 'Otro'),
(103, 'Pasillo Simple', 'Otro'),
(104, 'Pasillo T', 'Otro'),
(105, 'Cruceta Pasillos', 'Otro'),
(106, 'Flot. Grandes', 'Otro'),
(107, 'Flot. Chicos', 'Otro'),
(108, 'Boyas', 'Otro'),
(109, 'Boyas Met.', 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idservicios` int(11) NOT NULL,
  `detalles` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idservicios`, `detalles`, `fecha`) VALUES
(247, '1', '2020-09-04'),
(248, '2', '2020-09-07'),
(249, '3', '2020-09-09'),
(250, '4', '2020-09-12'),
(251, '5', '2020-09-14'),
(252, '1', '2020-09-02'),
(253, '2', '2020-09-03'),
(254, '3', '2020-09-04'),
(255, '4', '2020-09-04'),
(256, '5', '2020-09-05'),
(257, '6', '2020-09-06'),
(258, '7', '2020-09-07'),
(259, '8', '2020-09-08'),
(260, '9', '2020-09-09'),
(261, '1', '2020-09-01'),
(262, '6', '2020-09-15'),
(263, '7', '2020-09-15'),
(264, '8', '2020-09-16'),
(265, '9', '2020-09-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_cliente`
--

CREATE TABLE `servicio_cliente` (
  `id` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `servicio_cliente`
--

INSERT INTO `servicio_cliente` (`id`, `idservicio`, `idcliente`) VALUES
(168, 247, 874),
(169, 248, 874),
(170, 249, 874),
(171, 250, 874),
(172, 251, 874),
(173, 252, 877),
(174, 253, 877),
(175, 254, 877),
(176, 255, 877),
(177, 256, 877),
(178, 257, 877),
(179, 258, 877),
(180, 259, 877),
(181, 260, 877),
(182, 261, 878),
(183, 262, 874),
(184, 263, 874),
(185, 264, 874),
(186, 265, 874);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terrestre`
--

CREATE TABLE `terrestre` (
  `id` int(11) NOT NULL,
  `matricula` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `id_producto_nombre` int(10) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_maritimo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `terrestre`
--

INSERT INTO `terrestre` (`id`, `matricula`, `id_producto_nombre`, `id_servicio`, `id_maritimo`) VALUES
(240, 'AAAA00', 89, 250, NULL),
(241, 'AAAA01', 89, 250, NULL),
(242, 'AAAA02', 89, 250, NULL),
(243, 'AAAA03', 89, 250, NULL),
(244, 'AAAA04', 89, 250, NULL),
(245, 'AAAA05', 89, 250, NULL),
(246, 'AAAA06', 89, 250, NULL),
(247, 'AAAA7', 89, 250, NULL),
(248, 'AAAA08', 89, 250, NULL),
(249, 'AAAA09', 89, 250, NULL),
(250, 'AAAA10', 89, 250, NULL),
(251, 'AAAA11', 89, 250, NULL),
(252, 'AAAA12', 89, 250, NULL),
(253, 'AAAA13', 89, 250, NULL),
(254, 'AAAA14', 89, 250, NULL),
(255, 'AAAA15', 89, 250, NULL),
(256, 'AAAA16', 89, 250, NULL),
(257, 'AAAA17', 89, 250, NULL),
(258, 'AAAA18', 89, 250, NULL),
(259, 'STKT12', 89, 249, NULL),
(260, 'STKT13', 89, 250, NULL),
(261, 'BBBB00', 89, 247, NULL),
(262, 'BBBB01', 89, 247, NULL),
(263, 'BBBB02', 89, 247, NULL),
(264, 'BBBB03', 89, 247, NULL),
(265, 'BBBB04', 89, 247, NULL),
(266, 'BBBB05', 89, 247, NULL),
(267, 'BBBB06', 89, 247, NULL),
(268, 'BBBB07', 89, 247, NULL),
(269, 'BBBB08', 89, 247, NULL),
(270, 'BBBB09', 89, 247, NULL),
(271, 'BBBB10', 89, 247, NULL),
(272, 'BBBB11', 89, 247, NULL),
(273, 'BBBB12', 89, 247, NULL),
(274, 'CCCC1', 89, 251, NULL),
(275, 'CCCC2', 89, 251, NULL),
(276, 'AAAA01', 89, 261, NULL),
(277, 'NUNC01', 89, 264, NULL),
(278, 'NUNC01', 89, 263, NULL),
(279, 'AAAA0012', 89, 260, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotrabajo`
--

CREATE TABLE `tipotrabajo` (
  `id` int(11) NOT NULL,
  `tipotrabajo` varchar(35) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `tipotrabajo`
--

INSERT INTO `tipotrabajo` (`id`, `tipotrabajo`) VALUES
(39, 'Desinfección'),
(40, 'Sanitización'),
(41, 'Ensilaje'),
(44, 'Alcoholgen'),
(45, 'Terapia Genica'),
(46, 'Terapia Intensiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id` int(11) NOT NULL,
  `id_tipotrabajo` int(11) NOT NULL,
  `id_maritimo` int(11) DEFAULT NULL,
  `id_terrestre` int(11) DEFAULT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id`, `id_tipotrabajo`, `id_maritimo`, `id_terrestre`, `id_servicio`) VALUES
(597, 39, 505, NULL, 247),
(599, 44, 507, NULL, 247),
(600, 45, 508, NULL, 247),
(601, 46, 509, NULL, 247),
(602, 39, 510, NULL, 247),
(603, 40, 511, NULL, 247),
(604, 45, 512, NULL, 247),
(605, 44, 513, NULL, 247),
(606, 45, 513, NULL, 247),
(607, 39, 514, NULL, 247),
(608, 44, 515, NULL, 247),
(609, 46, 516, NULL, 247),
(610, 40, 517, NULL, 247),
(611, 39, 518, NULL, 247),
(612, 44, 519, NULL, 247),
(613, 40, 520, NULL, 247),
(614, 45, 521, NULL, 247),
(615, 45, 522, NULL, 247),
(616, 40, 523, NULL, 247),
(617, 45, 523, NULL, 247),
(618, 44, 524, NULL, 247),
(619, 44, 525, NULL, 247),
(620, 46, 526, NULL, 247),
(621, 44, 527, NULL, 247),
(622, 40, 528, NULL, 247),
(623, 45, 528, NULL, 247),
(624, 45, 529, NULL, 247),
(626, 39, 531, NULL, 248),
(627, 40, 532, NULL, 248),
(628, 44, 533, NULL, 248),
(629, 40, 534, NULL, 248),
(630, 39, 535, NULL, 248),
(631, 45, 537, NULL, 248),
(632, 40, 538, NULL, 248),
(633, 44, 539, NULL, 248),
(634, 40, 540, NULL, 248),
(635, 39, 541, NULL, 248),
(636, 45, 542, NULL, 248),
(637, 40, 543, NULL, 248),
(638, 45, 544, NULL, 248),
(639, 45, 545, NULL, 248),
(640, 41, 546, NULL, 248),
(641, 44, 547, NULL, 248),
(642, 40, 548, NULL, 248),
(643, 39, 549, NULL, 248),
(644, 46, 549, NULL, 248),
(645, 39, 550, NULL, 248),
(646, 40, 550, NULL, 248),
(647, 41, 550, NULL, 248),
(648, 44, 550, NULL, 248),
(649, 45, 550, NULL, 248),
(650, 46, 550, NULL, 248),
(651, 40, 551, NULL, 248),
(652, 41, 551, NULL, 248),
(653, 45, 551, NULL, 248),
(654, 39, 552, NULL, 249),
(655, 40, 552, NULL, 249),
(656, 41, 552, NULL, 249),
(657, 44, 552, NULL, 249),
(658, 45, 552, NULL, 249),
(659, 46, 552, NULL, 249),
(660, 39, 553, NULL, 249),
(661, 40, 553, NULL, 249),
(662, 40, 554, NULL, 249),
(663, 41, 554, NULL, 249),
(664, 45, 554, NULL, 249),
(665, 39, 555, NULL, 249),
(666, 40, 555, NULL, 249),
(667, 44, 555, NULL, 249),
(670, 40, 557, NULL, 249),
(671, 41, 557, NULL, 249),
(672, 45, 558, NULL, 249),
(673, 45, 559, NULL, 249),
(674, 40, 560, NULL, 249),
(675, 41, 560, NULL, 249),
(676, 39, 561, NULL, 249),
(677, 45, 562, NULL, 249),
(678, 40, 563, NULL, 249),
(679, 45, 563, NULL, 249),
(680, 46, 564, NULL, 249),
(681, 41, 565, NULL, 249),
(682, 45, 565, NULL, 249),
(683, 45, 566, NULL, 249),
(684, 46, 567, NULL, 249),
(685, 46, 568, NULL, 249),
(686, 45, 569, NULL, 249),
(687, 46, 569, NULL, 249),
(688, 39, 570, NULL, 249),
(689, 44, 570, NULL, 249),
(690, 46, 571, NULL, 249),
(691, 40, 572, NULL, 249),
(692, 45, 572, NULL, 249),
(693, 45, 573, NULL, 249),
(694, 39, NULL, 240, 250),
(695, 39, NULL, 242, 250),
(697, 40, NULL, 244, 250),
(698, 44, NULL, 245, 250),
(699, 39, NULL, 246, 250),
(700, 39, NULL, 247, 250),
(701, 45, NULL, 247, 250),
(702, 40, NULL, 248, 250),
(703, 41, NULL, 248, 250),
(704, 39, NULL, 249, 250),
(705, 40, NULL, 250, 250),
(706, 44, NULL, 251, 250),
(707, 45, NULL, 252, 250),
(708, 39, NULL, 253, 250),
(709, 44, NULL, 253, 250),
(710, 40, NULL, 254, 250),
(711, 39, NULL, 243, 250),
(712, 40, NULL, 243, 250),
(713, 41, NULL, 243, 250),
(714, 44, NULL, 243, 250),
(715, 45, NULL, 243, 250),
(716, 46, NULL, 243, 250),
(717, 39, NULL, 255, 250),
(718, 40, NULL, 255, 250),
(719, 41, NULL, 255, 250),
(720, 44, NULL, 255, 250),
(721, 45, NULL, 255, 250),
(722, 46, NULL, 255, 250),
(723, 39, NULL, 256, 250),
(724, 40, NULL, 256, 250),
(725, 44, NULL, 256, 250),
(726, 39, NULL, 257, 250),
(727, 40, NULL, 257, 250),
(728, 44, NULL, 257, 250),
(729, 45, NULL, 257, 250),
(730, 39, NULL, 258, 250),
(731, 44, NULL, 258, 250),
(732, 39, 574, NULL, 248),
(733, 39, NULL, 259, 249),
(734, 40, NULL, 260, 250),
(735, 39, NULL, 261, 247),
(736, 39, NULL, 262, 247),
(737, 44, NULL, 263, 247),
(738, 39, NULL, 264, 247),
(739, 40, NULL, 264, 247),
(740, 44, NULL, 265, 247),
(741, 40, NULL, 266, 247),
(742, 44, NULL, 267, 247),
(743, 39, NULL, 268, 247),
(744, 44, NULL, 269, 247),
(745, 45, NULL, 269, 247),
(746, 39, NULL, 270, 247),
(747, 39, NULL, 271, 247),
(748, 44, NULL, 271, 247),
(749, 40, NULL, 272, 247),
(750, 40, NULL, 273, 247),
(751, 41, NULL, 273, 247),
(752, 44, NULL, 273, 247),
(753, 39, NULL, 274, 251),
(754, 44, NULL, 274, 251),
(755, 40, NULL, 275, 251),
(756, 39, 575, NULL, 247),
(757, 44, 575, NULL, 247),
(772, 40, 590, NULL, 262),
(773, 45, 591, NULL, 262),
(774, 40, 592, NULL, 262),
(775, 40, NULL, 277, 264),
(776, 45, NULL, 278, 263),
(778, 39, 597, NULL, 265),
(779, 39, NULL, 279, 260),
(780, 39, 583, NULL, 257),
(781, 39, 582, NULL, 256),
(782, 39, 579, NULL, 255),
(783, 39, 578, NULL, 254),
(784, 39, 577, NULL, 253),
(785, 40, 581, NULL, 253),
(786, 39, 576, NULL, 252),
(787, 40, 580, NULL, 252);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `username`, `password`, `usuario`) VALUES
(2, 'as', 'as', 'as', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_terrestre` (`id_terrestre`,`id_maritimo`),
  ADD KEY `id_maritimo` (`id_maritimo`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maritimo`
--
ALTER TABLE `maritimo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idservicio` (`idservicio`),
  ADD KEY `id_objetomaritimo` (`id_objetomaritimo`);

--
-- Indices de la tabla `objetomaritimo`
--
ALTER TABLE `objetomaritimo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idlugar` (`idcliente`);

--
-- Indices de la tabla `otros`
--
ALTER TABLE `otros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_servicio` (`id_servicio`,`id_maritimo`),
  ADD KEY `id_terrestre` (`id_terrestre`),
  ADD KEY `otros_ibfk_3` (`id_maritimo`),
  ADD KEY `id_producto_nombre` (`id_producto_nombre`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicios`);

--
-- Indices de la tabla `servicio_cliente`
--
ALTER TABLE `servicio_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idservicio` (`idservicio`,`idcliente`),
  ADD KEY `servicio_cliente_ibfk_1` (`idcliente`);

--
-- Indices de la tabla `terrestre`
--
ALTER TABLE `terrestre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_servicio` (`id_servicio`,`id_maritimo`),
  ADD KEY `terrestre_ibfk_2` (`id_maritimo`),
  ADD KEY `id_producto_nombre` (`id_producto_nombre`);

--
-- Indices de la tabla `tipotrabajo`
--
ALTER TABLE `tipotrabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_maritimo` (`id_maritimo`,`id_terrestre`),
  ADD KEY `id_terrestre` (`id_terrestre`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_tipotrabajo` (`id_tipotrabajo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=879;

--
-- AUTO_INCREMENT de la tabla `maritimo`
--
ALTER TABLE `maritimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=598;

--
-- AUTO_INCREMENT de la tabla `objetomaritimo`
--
ALTER TABLE `objetomaritimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `otros`
--
ALTER TABLE `otros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idservicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT de la tabla `servicio_cliente`
--
ALTER TABLE `servicio_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT de la tabla `terrestre`
--
ALTER TABLE `terrestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT de la tabla `tipotrabajo`
--
ALTER TABLE `tipotrabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD CONSTRAINT `certificados_ibfk_1` FOREIGN KEY (`id_terrestre`) REFERENCES `terrestre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificados_ibfk_2` FOREIGN KEY (`id_maritimo`) REFERENCES `maritimo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificados_ibfk_3` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maritimo`
--
ALTER TABLE `maritimo`
  ADD CONSTRAINT `maritimo_ibfk_1` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maritimo_ibfk_2` FOREIGN KEY (`id_objetomaritimo`) REFERENCES `objetomaritimo` (`id`);

--
-- Filtros para la tabla `objetomaritimo`
--
ALTER TABLE `objetomaritimo`
  ADD CONSTRAINT `objetomaritimo_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `otros`
--
ALTER TABLE `otros`
  ADD CONSTRAINT `otros_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `otros_ibfk_2` FOREIGN KEY (`id_terrestre`) REFERENCES `terrestre` (`id`),
  ADD CONSTRAINT `otros_ibfk_3` FOREIGN KEY (`id_maritimo`) REFERENCES `maritimo` (`id`),
  ADD CONSTRAINT `otros_ibfk_4` FOREIGN KEY (`id_producto_nombre`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `servicio_cliente`
--
ALTER TABLE `servicio_cliente`
  ADD CONSTRAINT `servicio_cliente_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `servicio_cliente_ibfk_2` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `terrestre`
--
ALTER TABLE `terrestre`
  ADD CONSTRAINT `terrestre_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `terrestre_ibfk_2` FOREIGN KEY (`id_maritimo`) REFERENCES `maritimo` (`id`),
  ADD CONSTRAINT `terrestre_ibfk_3` FOREIGN KEY (`id_producto_nombre`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`id_terrestre`) REFERENCES `terrestre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajo_ibfk_3` FOREIGN KEY (`id_maritimo`) REFERENCES `maritimo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajo_ibfk_4` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajo_ibfk_5` FOREIGN KEY (`id_tipotrabajo`) REFERENCES `tipotrabajo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
