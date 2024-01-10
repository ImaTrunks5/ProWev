-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2024 a las 06:03:05
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
-- Base de datos: `sistema`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `NoBoleta` varchar(20) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApellidoPaterno` varchar(50) DEFAULT NULL,
  `ApellidoMaterno` varchar(50) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Genero` varchar(20) DEFAULT NULL,
  `Discapacidad` varchar(100) DEFAULT NULL,
  `Calle` varchar(100) DEFAULT NULL,
  `NumeroC` varchar(10) DEFAULT NULL,
  `EntidadFederativa` varchar(50) DEFAULT NULL,
  `MunicipioAlcaldia` varchar(50) DEFAULT NULL,
  `CodigoPostal` varchar(10) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `EscuelaProcedencia` varchar(100) DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `ESCOM_Opcion` varchar(20) DEFAULT NULL,
  `idSalon` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`NoBoleta`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `CURP`, `FechaNacimiento`, `Genero`, `Discapacidad`, `Calle`, `NumeroC`, `EntidadFederativa`, `MunicipioAlcaldia`, `CodigoPostal`, `Telefono`, `Correo`, `EscuelaProcedencia`, `Promedio`, `ESCOM_Opcion`, `idSalon`) 
VALUES
('2022630001', 'Juan', 'Pérez', 'González', 'PERJ930101HDFLRN05', '2003-01-01', 'Masculino', 'Ninguna', 'Av. Insurgentes Sur', '1234', 'Ciudad de México', 'Benito Juárez', '03810', '5551234567', 'juanP@alumno.ipn.mx', 'CECyT 1 González Vázquez Vega', 8.5, 'Primer opción', '1A'),
('2022630002', 'María', 'García', 'López', 'GALM950202MSPRRN09', '2002-02-02', 'Femenino', 'Ninguna', 'Calle Reforma', '567', 'Nuevo León', 'Monterrey', '64000', '8187654321', 'margarc@alumnoguinda.ipn.mx', 'CECyT 2 Miguel Bernard', 9.2, 'Segunda opción', '1A'),
('2022630003', 'Luis', 'Hernández', 'Martínez', 'HEMA980303MTSRRN03', '1998-03-03', 'Masculino', 'Ninguna', 'Calle Hidalgo', '890', 'Jalisco', 'Guadalajara', '44100', '3339876543', 'luishdz@alumno.ipn.com', 'CECyT 5 Benito Juárez García', 8.9, 'Tercer opción', '1A'),
('2022630004', 'Ana', 'Rodríguez', 'Sánchez', 'ROSA970404MSMRRN08', '2001-04-04', 'Femenino', 'Discapacidad auditiva', 'Av. Juárez', '101', 'Puebla', 'Puebla', '72000', '2225554444', 'annna@alumnoguinda.mx.com', 'Preparatoria 2 de octubre', 8, 'Primer opción', '1A'),
('2022630005', 'Pedro', 'López', 'Díaz', 'LODP960505HGRRRN07', '1999-05-05', 'Masculino', 'Discapacidad motriz usuaria de silla de ruedas', 'Av. Revolución', '2468', 'Baja California', 'Tijuana', '22000', '6643332222', 'pedrolopz@alumno.ipn.com', 'CECyT 15 Diódoro Antúnez Echegaray', 9.5, 'Segunda opción', '1A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `idSalon` varchar(10) NOT NULL,
  `capacidadMAX` int(11) DEFAULT NULL,
  `alumnosRegistrados` int(10) DEFAULT NULL,
  `horario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`idSalon`, `capacidadMAX`, `alumnosRegistrados`, `horario`) VALUES
('1A', 6, 5, 'horario1A'),
('1B', 6, 0, 'horario1B'),
('1C', 6, 0, 'horario1C');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`NoBoleta`),
  ADD KEY `alumno_Salon` (`idSalon`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`idSalon`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_Salon` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`) ON DELETE CASCADE;
COMMIT;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerPrimerSalon` (OUT `salonId` VARCHAR(10))   BEGIN
    -- Inicializar la variable con un valor predeterminado (puedes ajustar según tus necesidades)
    SET salonId = NULL;

    -- Obtener el primer salón que cumple con la condición
    SELECT salon.idSalon INTO salonId
    FROM salon
    WHERE salon.alumnosregistrados < 6
    ORDER BY salon.idSalon
    LIMIT 1;

    -- Verificar si se obtuvo un idSalon válido
    IF salonId IS NOT NULL THEN
        -- Incrementar en 1 el campo alumnosRegistrados para el salón obtenido
        UPDATE salon
        SET alumnosRegistrados = alumnosRegistrados + 1
        WHERE idSalon = salonId;
    END IF;
END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
