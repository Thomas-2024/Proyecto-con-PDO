-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 09-09-2024 a las 21:44:00
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
-- Base de datos: `iua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Alimentos'),
(2, 'Productos de aseo'),
(3, 'Articulos de cocina'),
(4, 'Dispositivos tecnologicos'),
(5, 'Salsamentarias'),
(6, 'Articulos de proteccion personal'),
(7, 'Articulos escolares'),
(8, 'Muebles'),
(9, 'Cuidado de la salud'),
(10, 'Productos para bebes');

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
('80', 2, 'Daniel Cumacoss', '20', 'danielworked@gmail.com', 'KarenSena24', '', 'Images/1642627739detallecumpleaños.jpg'),
('81', 1, 'Daniel Cumacos', '26', 'danielwor@gmail.com', 'daniel2024', '', '../../Images/1605689482cumple21.jpg'),
('8289474', 2, 'Danna', '32', 'dannaworked@gmail.com', 'FirstService', '', '../Images/20240619_103430-removebg-preview.png'),
('84', 1, 'Danna More', '179', 'dannawor@gmail.com', 'FirstService', '', '../Images/1651784949mamaestupenda.jpg'),
('91', 4, 'Danna Morelo', '37', 'dannawo@gmail.com', 'FirstService', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa_proveedora` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
("P000001", 'Arroz Basmati 1kg', 'imagenes/arroz_basmati_1kg.jpg', 2500, 150, 4, 1),
("P000002", 'Detergente Líquido 1L', 'imagenes/detergente_liquido_1L.jpg', 1800, 80, 2, 2),
("P000003", 'Cuchara de Cocina de Acer', 'imagenes/cuchara_cocina_acero.jpg', 600, 120, 3, 3),
("P000004", 'Auriculares Bluetooth Ina', 'imagenes/auriculares_bluetooth.jpg', 5500, 25, 3, 4),
("P000005", 'Jamón Curado 250g', 'imagenes/jamon_curado_250g.jpg', 3000, 50, 5, 5),
("P000006", 'Guantes de Protección Nit', 'imagenes/guantes_proteccion_nitrilo.jpg', 1200, 100, 3, 6),
("P000007", 'Cuaderno Rayado 100 Hojas', 'imagenes/cuaderno_rayado_100_hojas.jpg', 400, 200, 3, 7),
("P000008", 'Silla Ergonomica de Ofici', 'imagenes/silla_ergonomica.jpg', 15000, 15, 3, 8),
("P000009", 'Vitamina C 1000mg 60 Tabl', 'imagenes/vitamina_c_1000mg.jpg', 1500, 70, 3, 9),
("P000010", 'Pañales Talla M 30 Unidad', 'imagenes/panales_talla_m.jpg', 1000, 90, 3, 10),
("P000011", 'Arroz Integral 1kg', 'imagenes/arroz_integral_1kg.jpg', 2700, 100, 4, 1),
("P000012", 'Aceite de Oliva 500ml', 'imagenes/aceite_oliva_500ml.jpg', 3200, 60, 2, 1),
("P000013", 'Harina de Trigo 1kg', 'imagenes/harina_trigo_1kg.jpg', 1200, 80, 4, 1),
("P000014", 'Limpiador Multiusos 500ml', 'imagenes/limpiador_multiusos_500ml.jpg', 1500, 90, 2, 2),
("P000015", 'Detergente en Polvo 1kg', 'imagenes/detergente_en_polvo_1kg.jpg', 1600, 70, 2, 2),
("P000016", 'Desinfectante de Superficies 1L', 'imagenes/desinfectante_superficies_1L.jpg', 2000, 85, 2, 2),
("P000017", 'Cuchillo de Chef', 'imagenes/cuchillo_chef.jpg', 2500, 75, 3, 3),
("P000018", 'Olla de Acero Inoxidable 3L', 'imagenes/olla_acero_3L.jpg', 5000, 40, 3, 3),
("P000019", 'Juego de Cucharas Medidoras', 'imagenes/juego_cucharas_medidoras.jpg', 800, 150, 3, 3),
("P000020", 'Altavoz Bluetooth', 'imagenes/altavoz_bluetooth.jpg', 3500, 35, 3, 4),
("P000021", 'Cargador Inalámbrico', 'imagenes/cargador_inalambrico.jpg', 2000, 50, 3, 4),
("P000022", 'Cámara de Seguridad Wi-Fi', 'imagenes/camara_seguridad_wifi.jpg', 8000, 20, 3, 4),
("P000023", 'Salami 200g', 'imagenes/salami_200g.jpg', 2500, 70, 5, 5),
("P000024", 'Pechuga de Pavo 300g', 'imagenes/pechuga_pavo_300g.jpg', 2700, 60, 5, 5),
("P000025", 'Chorizo Español 250g', 'imagenes/chorizo_espanol_250g.jpg', 2900, 55, 5, 5),
("P000026", 'Máscara de Protección', 'imagenes/mascara_proteccion.jpg', 1800, 80, 3, 6),
("P000027", 'Gafas de Seguridad', 'imagenes/gafas_seguridad.jpg', 2200, 60, 3, 6),
("P000028", 'Casco de Seguridad', 'imagenes/casco_seguridad.jpg', 3500, 40, 3, 6),
("P000029", 'Bolígrafo de Color', 'imagenes/boligrafo_color.jpg', 300, 250, 3, 7),
("P000030", 'Marcadores Textiles', 'imagenes/marcadores_textiles.jpg', 500, 180, 3, 7),
("P000031", 'Carpeta A4', 'imagenes/carpeta_A4.jpg', 700, 150, 3, 7);
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
  `id_cajas` varchar(10) DEFAULT NULL,
  `Modulo` varchar(15) DEFAULT NULL,
  `Estante` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
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
  ADD PRIMARY KEY (`id_lote`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
