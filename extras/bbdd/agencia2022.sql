
--
-- Base de datos: `agencia2022`
--
CREATE SCHEMA `agencia2022` DEFAULT CHARACTER SET utf8mb4;
USE agencia2022;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `idDestino` int UNSIGNED NOT NULL,
  `destNombre` varchar(45) NOT NULL,
  `idRegion` tinyint UNSIGNED NOT NULL COMMENT 'Referencia a tabla regiones',
  `destPrecio` varchar(45) NOT NULL,
  `destAsientos` tinyint NOT NULL COMMENT 'Cantidad total de asientos',
  `destDisponibles` tinyint NOT NULL,
  `destActivo` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`idDestino`, `destNombre`, `idRegion`, `destPrecio`, `destAsientos`, `destDisponibles`, `destActivo`) VALUES
(1, 'Londres (Heathrow)', 5, '9711', 5, 5, 1),
(2, 'Amsterdam (Schiphol)', 5, '6231', 5, 5, 1),
(3, 'Miami (Wilcox Field)', 4, '6517', 5, 5, 1),
(4, 'Tokio (Narita)', 7, '8704', 5, 5, 1),
(5, 'Kuala Lumpur (KLIA)', 8, '8570', 5, 5, 1),
(6, 'Bangkok (Suvarnabhumi)', 8, '8469', 5, 5, 1),
(7, 'París (Charles de Gaulle)', 5, '7713', 5, 5, 1),
(8, 'Cancún (Cancún)', 3, '6494', 5, 5, 1),
(9, 'Milán (Malpensa)', 5, '6756', 5, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `idRegion` tinyint UNSIGNED NOT NULL,
  `regNombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`idRegion`, `regNombre`) VALUES
(2, 'América Central'),
(4, 'América del Norte'),
(1, 'América del Sur'),
(7, 'Asia'),
(3, 'Caribe y México'),
(6, 'Europa del Este'),
(5, 'Europa Occidental'),
(8, 'Oceanía');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`idDestino`),
  ADD UNIQUE KEY `destNombre_UNIQUE` (`destNombre`),
  ADD KEY `fkRegiones_idx` (`idRegion`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`idRegion`),
  ADD UNIQUE KEY `regNombre_UNIQUE` (`regNombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `idDestino` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `idRegion` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD CONSTRAINT `fkRegiones` FOREIGN KEY (`idRegion`) REFERENCES `regiones` (`idRegion`);
COMMIT;

