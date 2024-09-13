-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 13-09-2024 a las 23:58:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `abreviatura` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `abreviatura`) VALUES
(1, 'Alimentos', 'AL'),
(2, 'Productos de aseo', 'AS'),
(3, 'Articulos de cocina', 'CK'),
(4, 'Dispositivos tecnologicos', 'DT'),
(5, 'Salsamentarias', 'SA'),
(6, 'Articulos de proteccion personal', 'PP'),
(7, 'Articulos escolares', 'SC'),
(8, 'Muebles', 'MB'),
(9, 'Cuidado de la salud', 'CS'),
(10, 'Productos para bebes', 'BB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_proveedores`
--

CREATE TABLE `contactos_proveedores` (
  `id_contacto` tinyint(4) NOT NULL,
  `id_empresa_prov` tinyint(4) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `N_Contacto` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle` varchar(20) NOT NULL,
  `id_producto` varchar(25) DEFAULT NULL,
  `Fecha_entrega` datetime DEFAULT NULL,
  `id_empleado` varchar(20) DEFAULT NULL,
  `id_unidad_medida` varchar(20) DEFAULT NULL,
  `cantidad` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` varchar(12) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Edad` varchar(3) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Contrasena` varchar(15) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Imagen_perfil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_rol`, `Nombre`, `Edad`, `Correo`, `Contrasena`, `Telefono`, `Imagen_perfil`) VALUES
('0000001', 1, 'Administrador', '', 'administrador@gmail.com', 'admin2024', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_proveedora`
--

CREATE TABLE `empresa_proveedora` (
  `id_empresa_proveedora` int(11) NOT NULL,
  `empresa_proveedora` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa_proveedora`
--

INSERT INTO `empresa_proveedora` (`id_empresa_proveedora`, `empresa_proveedora`) VALUES
(1, 'Proveedores Alimenticios S.A.'),
(2, 'Limpieza Total S.A.'),
(3, 'Cocina Facil Ltda.'),
(4, 'TecnoMundo S.A.'),
(5, 'Salsas y Embutidos XYZ'),
(6, 'Proteccion Plus S.A.'),
(7, 'Escolar Express S.A.'),
(8, 'Muebles y Mas S.A.'),
(9, 'Salud Integral Ltda.'),
(10, 'Bebe Feliz S.A.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `Estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `Estado`) VALUES
(1, 'Excelente'),
(2, 'En Revision'),
(3, 'Expirado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_producto` varchar(8) NOT NULL,
  `Nombre` varchar(80) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Stock` mediumint(9) DEFAULT NULL,
  `id_unidad_de_medida` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_producto`, `Nombre`, `Imagen`, `Precio`, `Stock`, `id_unidad_de_medida`, `id_categoria`) VALUES
('AL000001', 'Arroz Basmati 1kg', 'imagenes/arroz_basmati_1kg.jpg', 2500, 3400, 4, 1),
('AL000011', 'Arroz Integral 1kg', 'imagenes/arroz_integral_1kg.jpg', 2700, 100, 4, 1),
('AL000012', 'Aceite de Oliva 500ml', 'imagenes/aceite_oliva_500ml.jpg', 3200, 60, 2, 1),
('AL000013', 'Harina de Trigo 1kg', 'imagenes/harina_trigo_1kg.jpg', 1200, 80, 4, 1),
('AS000002', 'Detergente Liquido 1L', 'imagenes/detergente_liquido_1L.jpg', 1800, 80, 2, 2),
('AS000014', 'Limpiador Multiusos 500ml', 'imagenes/limpiador_multiusos_500ml.jpg', 1500, 90, 2, 2),
('AS000015', 'Detergente en Polvo 1kg', 'imagenes/detergente_en_polvo_1kg.jpg', 1600, 70, 2, 2),
('AS000016', 'Desinfectante de Superficies 1L', 'imagenes/desinfectante_superficies_1L.jpg', 2000, 85, 2, 2),
('BB000010', 'Panales Talla M 30 Unidades', 'imagenes/panales_talla_m.jpg', 1000, 90, 3, 10),
('CK000003', 'Cuchara de Cocina de Acero', 'imagenes/cuchara_cocina_acero.jpg', 600, 120, 3, 3),
('CK000017', 'Cuchillo de Chef', 'imagenes/cuchillo_chef.jpg', 2500, 75, 3, 3),
('CK000018', 'Olla de Acero Inoxidable 3L', 'imagenes/olla_acero_3L.jpg', 5000, 40, 3, 3),
('CK000019', 'Juego de Cucharas Medidoras', 'imagenes/juego_cucharas_medidoras.jpg', 800, 150, 3, 3),
('CS000009', 'Vitamina C 1000mg 60 Tabletas', 'imagenes/vitamina_c_1000mg.jpg', 1500, 70, 3, 9),
('DT000004', 'Auriculares Bluetooth Ina', 'imagenes/auriculares_bluetooth.jpg', 5500, 25, 3, 4),
('DT000020', 'Altavoz Bluetooth', 'imagenes/altavoz_bluetooth.jpg', 3500, 35, 3, 4),
('DT000021', 'Cargador Inalambrico', 'imagenes/cargador_inalambrico.jpg', 2000, 50, 3, 4),
('DT000022', 'Camara de Seguridad Wi-Fi', 'imagenes/camara_seguridad_wifi.jpg', 8000, 20, 3, 4),
('MB000008', 'Silla Ergonomica de Oficina', 'imagenes/silla_ergonomica.jpg', 15000, 15, 3, 8),
('PP000006', 'Guantes de Proteccion Nitrilo', 'imagenes/guantes_proteccion_nitrilo.jpg', 1200, 100, 3, 6),
('PP000026', 'Mascara de Proteccion', 'imagenes/mascara_proteccion.jpg', 1800, 80, 3, 6),
('PP000027', 'Gafas de Seguridad', 'imagenes/gafas_seguridad.jpg', 2200, 60, 3, 6),
('PP000028', 'Casco de Seguridad', 'imagenes/casco_seguridad.jpg', 3500, 40, 3, 6),
('SA000005', 'Jamon Curado 250g', 'imagenes/jamon_curado_250g.jpg', 3000, 50, 5, 5),
('SA000023', 'Salami 200g', 'imagenes/salami_200g.jpg', 2500, 70, 5, 5),
('SA000024', 'Pechuga de Pavo 300g', 'imagenes/pechuga_pavo_300g.jpg', 2700, 60, 5, 5),
('SA000025', 'Chorizo Espanol 250g', 'imagenes/chorizo_espanol_250g.jpg', 2900, 55, 5, 5),
('SC000007', 'Cuaderno Rayado 100 Hojas', 'imagenes/cuaderno_rayado_100_hojas.jpg', 400, 200, 3, 7),
('SC000029', 'Boligrafo de Color', 'imagenes/boligrafo_color.jpg', 300, 250, 3, 7),
('SC000030', 'Marcadores Textiles', 'imagenes/marcadores_textiles.jpg', 500, 180, 3, 7),
('SC000031', 'Carpeta A4', 'imagenes/carpeta_A4.jpg', 700, 150, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lote` varchar(25) NOT NULL,
  `id_producto` varchar(25) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `cantidad_productos` mediumint(9) DEFAULT NULL,
  `id_unidad_de_medida` int(11) DEFAULT NULL,
  `Fecha_Elaboracion` varchar(20) DEFAULT NULL,
  `Fecha_Expiracion` varchar(20) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id_lote`, `id_producto`, `id_estado`, `id_categoria`, `cantidad_productos`, `id_unidad_de_medida`, `Fecha_Elaboracion`, `Fecha_Expiracion`, `id_proveedor`, `id_ubicacion`) VALUES
('L001', 'AL000001', 1, 1, 100, 1, '2024-08-01', '2025-08-01', 1, 1),
('L002', 'AL000011', 1, 1, 80, 1, '2024-08-05', '2025-08-05', 1, 1),
('L003', 'AL000012', 1, 1, 60, 2, '2024-08-10', '2025-08-10', 2, 2),
('L004', 'AL000013', 1, 1, 70, 1, '2024-08-15', '2025-08-15', 1, 1),
('L005', 'AS000002', 1, 2, 50, 2, '2024-08-20', '2025-08-20', 2, 2),
('L006', 'AS000014', 1, 2, 40, 2, '2024-08-25', '2025-08-25', 2, 2),
('L007', 'AS000015', 1, 2, 30, 2, '2024-08-30', '2025-08-30', 2, 2),
('L008', 'AS000016', 1, 2, 45, 2, '2024-09-01', '2025-09-01', 2, 2),
('L009', 'BB000010', 1, 3, 100, 3, '2024-09-05', '2025-09-05', 3, 3),
('L010', 'CK000003', 1, 3, 50, 3, '2024-09-10', '2025-09-10', 3, 3),
('L011', 'CK000017', 1, 3, 30, 3, '2024-09-15', '2025-09-15', 3, 3),
('L012', 'CK000018', 1, 3, 20, 3, '2024-09-20', '2025-09-20', 3, 3),
('L013', 'CK000019', 1, 3, 60, 3, '2024-09-25', '2025-09-25', 3, 3),
('L014', 'CS000009', 1, 3, 150, 3, '2024-09-30', '2025-09-30', 4, 4),
('L015', 'DT000004', 1, 3, 30, 3, '2024-10-05', '2025-10-05', 4, 4),
('L016', 'DT000020', 1, 3, 25, 3, '2024-10-10', '2025-10-10', 4, 4),
('L017', 'DT000021', 1, 3, 40, 3, '2024-10-15', '2025-10-15', 4, 4),
('L018', 'DT000022', 1, 3, 15, 3, '2024-10-20', '2025-10-20', 4, 4),
('L019', 'MB000008', 1, 3, 10, 3, '2024-10-25', '2025-10-25', 5, 5),
('L020', 'PP000006', 1, 3, 50, 3, '2024-11-01', '2025-11-01', 6, 6),
('L021', 'PP000026', 1, 3, 40, 3, '2024-11-05', '2025-11-05', 6, 6),
('L022', 'PP000027', 1, 3, 30, 3, '2024-11-10', '2025-11-10', 6, 6),
('L023', 'PP000028', 1, 3, 20, 3, '2024-11-15', '2025-11-15', 6, 6),
('L024', 'SA000005', 1, 5, 40, 5, '2024-11-20', '2025-11-20', 7, 7),
('L025', 'SA000023', 1, 5, 30, 5, '2024-11-25', '2025-11-25', 7, 7),
('L026', 'SA000024', 1, 5, 25, 5, '2024-12-01', '2025-12-01', 7, 7),
('L027', 'SA000025', 1, 5, 30, 5, '2024-12-05', '2025-12-05', 7, 7),
('L028', 'SC000007', 1, 3, 100, 3, '2024-12-10', '2025-12-10', 8, 8),
('L029', 'SC000029', 1, 3, 150, 3, '2024-12-15', '2025-12-15', 8, 8),
('L030', 'SC000030', 1, 3, 120, 3, '2024-12-20', '2025-12-20', 8, 8),
('L031', 'SC000031', 1, 3, 90, 3, '2024-12-25', '2025-12-25', 8, 8),
('L032', 'AL000001', 1, 1, 3000, 4, '2024-09-02', '2025-01-25', 1, 9),
('L033', 'AL000001', 1, 1, 300, 4, '2024-09-04', '2024-10-10', 1, 10),
('L034', 'AL000001', 1, 1, 3400, 4, '2024-09-03', '2024-10-04', 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_detalle` varchar(20) DEFAULT NULL,
  `Fecha_peticion` varchar(20) DEFAULT NULL,
  `id_empresa` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `registro` smallint(6) DEFAULT NULL,
  `id_empleado` varchar(12) NOT NULL,
  `id_rol` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_empresa`
--

CREATE TABLE `proveedor_empresa` (
  `id_empresa_prov` tinyint(4) DEFAULT NULL,
  `id_contacto` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_nombre` varchar(25) DEFAULT NULL,
  `Crear_Roles` varchar(10) DEFAULT 'NO',
  `Modificar_permisos` varchar(10) DEFAULT 'NO',
  `Menu_administracion` varchar(10) DEFAULT 'NO',
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_nombre`, `Crear_Roles`, `Modificar_permisos`, `Menu_administracion`, `id_rol`) VALUES
('Administrador', 'SI', 'SI', 'SI', 1),
('Empleado', 'NO', 'NO', 'NO', 2),
('Coordinador', 'NO', 'NO', 'NO', 3),
('Jefe de almacen', 'NO', 'NO', 'NO', 4),
('Personal de binestar', 'NO', 'NO', 'SI', 5),
('Ejecutivo', 'NO', 'NO', 'NO', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `Modulo_Estante` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `Modulo_Estante`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5'),
(6, 'A6'),
(7, 'A7'),
(8, 'A8'),
(9, 'B1'),
(10, 'B2'),
(11, 'B3'),
(12, 'B4'),
(13, 'B5'),
(14, 'B6'),
(15, 'B7'),
(16, 'B8'),
(17, 'C1'),
(18, 'C2'),
(19, 'C3'),
(20, 'C4'),
(21, 'C5'),
(22, 'C6'),
(23, 'C7'),
(24, 'C8'),
(25, 'D1'),
(26, 'D2'),
(27, 'D3'),
(28, 'D4'),
(29, 'D5'),
(30, 'D6'),
(31, 'D7'),
(32, 'D8'),
(33, 'E1'),
(34, 'E2'),
(35, 'E3'),
(36, 'E4'),
(37, 'E5'),
(38, 'E6'),
(39, 'E7'),
(40, 'E8'),
(41, 'F1'),
(42, 'F2'),
(43, 'F3'),
(44, 'F4'),
(45, 'F5'),
(46, 'F6'),
(47, 'F7'),
(48, 'F8'),
(49, 'G1'),
(50, 'G2'),
(51, 'G3'),
(52, 'G4'),
(53, 'G5'),
(54, 'G6'),
(55, 'G7'),
(56, 'G8'),
(57, 'H1'),
(58, 'H2'),
(59, 'H3'),
(60, 'H4'),
(61, 'H5'),
(62, 'H6'),
(63, 'H7'),
(64, 'H8'),
(65, 'I1'),
(66, 'I2'),
(67, 'I3'),
(68, 'I4'),
(69, 'I5'),
(70, 'I6'),
(71, 'I7'),
(72, 'I8'),
(73, 'J1'),
(74, 'J2'),
(75, 'J3'),
(76, 'J4'),
(77, 'J5'),
(78, 'J6'),
(79, 'J7'),
(80, 'J8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_de_medida`
--

CREATE TABLE `unidades_de_medida` (
  `id_unidad_medida` int(11) NOT NULL,
  `unidad_medida` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidades_de_medida`
--

INSERT INTO `unidades_de_medida` (`id_unidad_medida`, `unidad_medida`) VALUES
(1, 'metros'),
(2, 'litros'),
(3, 'unidades'),
(4, 'kilogramos'),
(5, 'gramos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_hoy`
--

CREATE TABLE `ventas_hoy` (
  `id_ventas` smallint(6) NOT NULL,
  `id_producto` varchar(25) DEFAULT NULL,
  `Fecha_Salida` varchar(20) DEFAULT NULL,
  `ventas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `empresa_proveedora`
--
ALTER TABLE `empresa_proveedora`
  ADD PRIMARY KEY (`id_empresa_proveedora`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_unidad_de_medida` (`id_unidad_de_medida`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lote`),
  ADD KEY `fk_estado` (`id_estado`),
  ADD KEY `fk_unidad_de_medida` (`id_unidad_de_medida`),
  ADD KEY `fk_proveedor` (`id_proveedor`),
  ADD KEY `fk_ubicacion` (`id_ubicacion`),
  ADD KEY `categoria` (`id_categoria`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `unidades_de_medida`
--
ALTER TABLE `unidades_de_medida`
  ADD PRIMARY KEY (`id_unidad_medida`);

--
-- Indices de la tabla `ventas_hoy`
--
ALTER TABLE `ventas_hoy`
  ADD PRIMARY KEY (`id_ventas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa_proveedora`
--
ALTER TABLE `empresa_proveedora`
  MODIFY `id_empresa_proveedora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `unidades_de_medida`
--
ALTER TABLE `unidades_de_medida`
  MODIFY `id_unidad_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_unidad_de_medida`) REFERENCES `unidades_de_medida` (`id_unidad_medida`),
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `empresa_proveedora` (`id_empresa_proveedora`),
  ADD CONSTRAINT `fk_ubicacion` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id_ubicacion`),
  ADD CONSTRAINT `fk_unidad_de_medida` FOREIGN KEY (`id_unidad_de_medida`) REFERENCES `unidades_de_medida` (`id_unidad_medida`),
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
