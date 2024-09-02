-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-09-2024 a las 01:53:23
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
  `id_categoria` tinyint(4) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Nombre` varchar(20) DEFAULT NULL,
  `Edad` varchar(3) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Contrasena` varchar(15) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Imagen_perfil` text DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `Nombre`, `Edad`, `Correo`, `Contrasena`, `Telefono`, `Imagen_perfil`, `id_rol`) VALUES
('09', 'Thomas David Olaya R', '49', 'tomasworked@gmail.com', 'tomas24*', '', '', 1),
('1028485276', 'Thomas David', '59', 't@gmail.com', 'hola2024', '', '', 1),
('12320993', 'david', '57', 'sadppf@gmail.com', 'laca', '3157622354', '', 1),
('34', 'Thomas', '34', 'tomw@gmail.com', 'FirstService', '', '../../Images/20240619_115240-removebg-preview.png', 1),
('4576', 'Karen', '45', 'karenlore@gmail.com', 'FirstService4', 'NULL', '../../Images/20240619_103430-removebg-preview.png', 1),
('45999', 'Karen', '', 'karenwoee@gmail.com', 'FirstService', '', '', 1),
('459999', 'Thomas', '9', 'tomwork9@gmail.com', 'FirstService', '', '../../Images/20240619_112718-removebg-preview.png', 1),
('59', 'Thomas', '56', 'tomworked@gmail.com', 'FirstService', '', '', 1),
('78', 'Karen Rodrigues', '17', 'karenwork@gmail.com', 'KarenSena24', '', '', 1),
('80', 'Daniel Cumacoss', '20', 'danielworked@gmail.com', 'KarenSena24', '', 'Images/1642627739detallecumpleaños.jpg', 3),
('81', 'Daniel Cumacos', '26', 'danielwor@gmail.com', 'daniel2024', '', '../../Images/1605689482cumple21.jpg', 1),
('82', 'Danna', '32', 'dannaworked@gmail.com', 'FirstService', '', '', 5),
('84', 'Danna More', '179', 'dannawor@gmail.com', 'FirstService', '', '../Images/1651784949mamaestupenda.jpg', 1),
('91', 'Danna Morelo', '37', 'dannawo@gmail.com', 'FirstService', '', '', 4);

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
  `id_estado` smallint(6) NOT NULL,
  `Estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `registro` smallint(6) NOT NULL,
  `id_producto` varchar(25) DEFAULT NULL,
  `Entradas` smallint(6) NOT NULL,
  `salidas` smallint(6) NOT NULL,
  `stock` smallint(6) NOT NULL,
  `Precio_venta` int(11) NOT NULL,
  `Precio_Compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` varchar(25) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `id_estado` smallint(6) DEFAULT NULL
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
('Personal de binestar', 'SI', 'NO', 'NO', 5),
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
  `id_unidad_medida` tinyint(4) NOT NULL,
  `Nombre` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`registro`),
  ADD UNIQUE KEY `id_producto` (`id_producto`),
  ADD KEY `fk_id_producto1` (`id_producto`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lote`),
  ADD KEY `id_producto` (`id_producto`);

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
  ADD KEY `fk_id_lote4` (`id_lote`),
  ADD KEY `fk_id_producto2` (`id_producto`);

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
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_estado` (`id_estado`);

--
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
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
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
  ADD CONSTRAINT `fk_id_producto1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `lote_categoria`
--
ALTER TABLE `lote_categoria`
  ADD CONSTRAINT `fk_id_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_id_lote2` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`);

--
-- Filtros para la tabla `lote_estado`
--
ALTER TABLE `lote_estado`
  ADD CONSTRAINT `fk_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_id_lote3` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`);

--
-- Filtros para la tabla `lote_productos`
--
ALTER TABLE `lote_productos`
  ADD CONSTRAINT `fk_id_lote4` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`),
  ADD CONSTRAINT `fk_id_producto2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

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
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `proveedor_empresa`
--
ALTER TABLE `proveedor_empresa`
  ADD CONSTRAINT `fk_id_contacto1` FOREIGN KEY (`id_contacto`) REFERENCES `contactos_proveedores` (`id_contacto`),
  ADD CONSTRAINT `fk_id_prov2` FOREIGN KEY (`id_empresa_prov`) REFERENCES `empresa` (`id_empresa_prov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
