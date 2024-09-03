-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 03-09-2024 a las 05:31:16
=======
-- Tiempo de generación: 02-09-2024 a las 05:33:34
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
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
<<<<<<< HEAD
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'lacteos'),
(2, 'vegetales'),
(3, 'frutas'),
(4, 'carnes'),
(5, 'productos_aseo'),
(6, 'utencilios_cocina'),
(7, 'dispositivos_tecnolo'),
(8, 'salsamentarias'),
(9, 'snaks'),
(10, 'utiles_escolares');

=======
  `id_categoria` tinyint(4) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
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
('09', 1, 'Thomas David Olaya R', '49', 'tomasworked@gmail.com', 'tomas24*', '', ''),
('1028485276', 1, 'Thomas David', '59', 't@gmail.com', 'hola2024', '', ''),
('12320993', 1, 'david', '57', 'sadppf@gmail.com', 'laca', '3157622354', ''),
('34', 1, 'Thomas', '34', 'tomw@gmail.com', 'FirstService', '', '../../Images/20240619_115240-removebg-preview.png'),
('456868689', 1, 'Juan Pablo', '56', 'janpol@gmail.com', 'FirstService', '', '../Images/FotoAguacateSinFonod.png'),
('4576', 1, 'Karen', '45', 'karenlore@gmail.com', 'FirstService4', 'NULL', '../../Images/20240619_103430-removebg-preview.png'),
('45999', 1, 'Karen', '', 'karenwoee@gmail.com', 'FirstService', '', ''),
('459999', 1, 'Thomas', '9', 'tomwork9@gmail.com', 'FirstService', '', '../../Images/20240619_112718-removebg-preview.png'),
('59', 1, 'Thomas', '56', 'tomworked@gmail.com', 'FirstService', '', ''),
('78', 1, 'Karen Rodrigues', '17', 'karenwork@gmail.com', 'KarenSena24', '', ''),
<<<<<<< HEAD
('80', 2, 'Daniel Cumacoss', '20', 'danielworked@gmail.com', 'KarenSena24', '', 'Images/1642627739detallecumpleaños.jpg'),
('81', 1, 'Daniel Cumacos', '26', 'danielwor@gmail.com', 'daniel2024', '', '../../Images/1605689482cumple21.jpg'),
('8289474', 2, 'Danna', '32', 'dannaworked@gmail.com', 'FirstService', '', '../Images/20240619_103430-removebg-preview.png'),
=======
('80', 4, 'Daniel Cumacoss', '20', 'danielworked@gmail.com', 'KarenSena24', '', 'Images/1642627739detallecumpleaños.jpg'),
('81', 1, 'Daniel Cumacos', '26', 'danielwor@gmail.com', 'daniel2024', '', '../../Images/1605689482cumple21.jpg'),
('82', 5, 'Danna', '32', 'dannaworked@gmail.com', 'FirstService', '', ''),
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
('84', 1, 'Danna More', '179', 'dannawor@gmail.com', 'FirstService', '', '../Images/1651784949mamaestupenda.jpg'),
('91', 4, 'Danna Morelo', '37', 'dannawo@gmail.com', 'FirstService', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa_prov` tinyint(4) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
<<<<<<< HEAD
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

=======
  `id_estado` smallint(6) NOT NULL,
  `Estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
<<<<<<< HEAD
  `id_producto` varchar(25) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
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
('P001', 'Leche', 'leche.jpg', 20, 100, 1, 1),
('P002', 'Yogur', 'yogur.jpg', 25, 50, 1, 1),
('P003', 'Zanahorias', 'zanahorias.jpg', 15, 200, 2, 2),
('P004', 'Br?coli', 'brocoli.jpg', 30, 80, 2, 2),
('P005', 'Manzanas', 'manzanas.jpg', 12, 150, 3, 3),
('P006', 'Bananas', 'bananas.jpg', 10, 120, 3, 3),
('P007', 'Pollo', 'pollo.jpg', 50, 60, 4, 4),
('P008', 'Res', 'res.jpg', 70, 30, 4, 4),
('P009', 'Jab?n', 'jab?n.jpg', 5, 200, 1, 5),
('P010', 'Champ?', 'champu.jpg', 7, 100, 1, 5),
('P011', 'Sart?n', 'sarten.jpg', 25, 15, 4, 6),
('P012', 'Cuchara de madera', 'cuchara.jpg', 10, 50, 4, 6),
('P013', 'Smartphone', 'smartphone.jpg', 300, 10, 4, 7),
('P014', 'Laptop', 'laptop.jpg', 700, 5, 4, 7),
('P015', 'Jam?n', 'jamon.jpg', 40, 20, 4, 8),
('P016', 'Salami', 'salami.jpg', 35, 25, 4, 8),
('P017', 'Papas fritas', 'papas_fritas.jpg', 8, 150, 2, 9),
('P018', 'Galletas', 'galletas.jpg', 5, 200, 2, 9),
('P019', 'Cuadernos', 'cuadernos.jpg', 3, 500, 1, 10),
('P020', 'L?pices', 'lapices.jpg', 1, 1000, 1, 10);

=======
  `registro` smallint(6) NOT NULL,
  `id_producto` varchar(25) DEFAULT NULL,
  `Entradas` smallint(6) NOT NULL,
  `salidas` smallint(6) NOT NULL,
  `stock` smallint(6) NOT NULL,
  `Precio_venta` int(11) NOT NULL,
  `Precio_Compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lote` varchar(25) NOT NULL,
  `id_producto` varchar(25) DEFAULT NULL,
  `cantidad_productos` mediumint(9) DEFAULT NULL,
  `Fecha_Elaboracion` varchar(20) DEFAULT NULL,
  `Fecha_Expiracion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote_categoria`
--

CREATE TABLE `lote_categoria` (
  `id_lote` varchar(25) DEFAULT NULL,
  `id_categoria` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote_estado`
--

CREATE TABLE `lote_estado` (
  `id_lote` varchar(25) DEFAULT NULL,
  `id_estado` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote_productos`
--

CREATE TABLE `lote_productos` (
  `id_lote` varchar(25) DEFAULT NULL,
  `id_producto` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote_proveedor`
--

CREATE TABLE `lote_proveedor` (
  `id_lote` varchar(25) DEFAULT NULL,
  `id_empresa_prov` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote_ubicacion`
--

CREATE TABLE `lote_ubicacion` (
  `id_lote` varchar(25) DEFAULT NULL,
  `id_ubicacion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote_unidad_medida`
--

CREATE TABLE `lote_unidad_medida` (
  `id_lote` varchar(25) DEFAULT NULL,
  `id_unidad_medida` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` tinyint(4) NOT NULL,
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
<<<<<<< HEAD
=======
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` varchar(25) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `id_estado` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
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
  `id_ubicacion` tinyint(4) NOT NULL,
  `id_cajas` varchar(10) DEFAULT NULL,
  `Modulo` varchar(15) DEFAULT NULL,
  `Estante` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_de_medida`
--

CREATE TABLE `unidades_de_medida` (
<<<<<<< HEAD
  `id_unidad_medida` int(11) NOT NULL,
  `unidad_medida` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidades_de_medida`
--

INSERT INTO `unidades_de_medida` (`id_unidad_medida`, `unidad_medida`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL);

=======
  `id_unidad_medida` tinyint(4) NOT NULL,
  `Nombre` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
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
-- Indices de la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `fk_id_empresa_prov` (`id_empresa_prov`);

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
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa_prov`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
<<<<<<< HEAD
  ADD KEY `id_unidad_de_medida` (`id_unidad_de_medida`),
  ADD KEY `id_categoria` (`id_categoria`);
=======
  ADD PRIMARY KEY (`registro`),
  ADD UNIQUE KEY `id_producto` (`id_producto`),
  ADD KEY `fk_id_producto1` (`id_producto`);
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
<<<<<<< HEAD
  ADD PRIMARY KEY (`id_lote`);
=======
  ADD PRIMARY KEY (`id_lote`),
  ADD KEY `id_producto` (`id_producto`);
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc

--
-- Indices de la tabla `lote_categoria`
--
ALTER TABLE `lote_categoria`
  ADD KEY `fk_id_lote2` (`id_lote`),
  ADD KEY `fk_id_categoria1` (`id_categoria`);

--
-- Indices de la tabla `lote_estado`
--
ALTER TABLE `lote_estado`
  ADD KEY `fk_id_lote3` (`id_lote`),
  ADD KEY `fk_id_estado` (`id_estado`);

--
-- Indices de la tabla `lote_productos`
--
ALTER TABLE `lote_productos`
<<<<<<< HEAD
  ADD KEY `fk_id_lote4` (`id_lote`);
=======
  ADD KEY `fk_id_lote4` (`id_lote`),
  ADD KEY `fk_id_producto2` (`id_producto`);
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc

--
-- Indices de la tabla `lote_proveedor`
--
ALTER TABLE `lote_proveedor`
  ADD KEY `fk_id_lote5` (`id_lote`),
  ADD KEY `fk_id_proveedor1` (`id_empresa_prov`);

--
-- Indices de la tabla `lote_ubicacion`
--
ALTER TABLE `lote_ubicacion`
  ADD KEY `fk_id_lote6` (`id_lote`),
  ADD KEY `fk_id_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `lote_unidad_medida`
--
ALTER TABLE `lote_unidad_medida`
  ADD KEY `fk_id_lote7` (`id_lote`);

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
<<<<<<< HEAD
=======
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_estado` (`id_estado`);

--
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
-- Indices de la tabla `proveedor_empresa`
--
ALTER TABLE `proveedor_empresa`
  ADD KEY `fk_id_prov2` (`id_empresa_prov`),
  ADD KEY `fk_id_contacto1` (`id_contacto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`),
  ADD KEY `fk_id_cajas` (`id_cajas`);

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
<<<<<<< HEAD
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
=======
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
<<<<<<< HEAD
-- AUTO_INCREMENT de la tabla `unidades_de_medida`
--
ALTER TABLE `unidades_de_medida`
  MODIFY `id_unidad_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
=======
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  ADD CONSTRAINT `fk_id_empresa_prov` FOREIGN KEY (`id_empresa_prov`) REFERENCES `empresa` (`id_empresa_prov`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
<<<<<<< HEAD
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_unidad_de_medida`) REFERENCES `unidades_de_medida` (`id_unidad_medida`),
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
=======
  ADD CONSTRAINT `fk_id_producto1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc

--
-- Filtros para la tabla `lote_categoria`
--
ALTER TABLE `lote_categoria`
<<<<<<< HEAD
=======
  ADD CONSTRAINT `fk_id_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
  ADD CONSTRAINT `fk_id_lote2` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`);

--
-- Filtros para la tabla `lote_estado`
--
ALTER TABLE `lote_estado`
<<<<<<< HEAD
=======
  ADD CONSTRAINT `fk_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
  ADD CONSTRAINT `fk_id_lote3` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`);

--
-- Filtros para la tabla `lote_productos`
--
ALTER TABLE `lote_productos`
<<<<<<< HEAD
  ADD CONSTRAINT `fk_id_lote4` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`);
=======
  ADD CONSTRAINT `fk_id_lote4` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`),
  ADD CONSTRAINT `fk_id_producto2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc

--
-- Filtros para la tabla `lote_proveedor`
--
ALTER TABLE `lote_proveedor`
  ADD CONSTRAINT `fk_id_lote5` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`),
  ADD CONSTRAINT `fk_id_proveedor1` FOREIGN KEY (`id_empresa_prov`) REFERENCES `empresa` (`id_empresa_prov`);

--
-- Filtros para la tabla `lote_ubicacion`
--
ALTER TABLE `lote_ubicacion`
  ADD CONSTRAINT `fk_id_lote6` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`),
  ADD CONSTRAINT `fk_id_ubicacion` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id_ubicacion`);

--
-- Filtros para la tabla `lote_unidad_medida`
--
ALTER TABLE `lote_unidad_medida`
  ADD CONSTRAINT `fk_id_lote7` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`);

--
<<<<<<< HEAD
=======
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
>>>>>>> 079b0b7738855d580b918e9ebb9b17dbcb9149cc
-- Filtros para la tabla `proveedor_empresa`
--
ALTER TABLE `proveedor_empresa`
  ADD CONSTRAINT `fk_id_contacto1` FOREIGN KEY (`id_contacto`) REFERENCES `contactos_proveedores` (`id_contacto`),
  ADD CONSTRAINT `fk_id_prov2` FOREIGN KEY (`id_empresa_prov`) REFERENCES `empresa` (`id_empresa_prov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
