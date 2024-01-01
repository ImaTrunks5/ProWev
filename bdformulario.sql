-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 03:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdformulario`
--

-- --------------------------------------------------------

-- Table structure for table `identidad`
CREATE TABLE Identidad (
    NoBoleta VARCHAR(20),
    Nombre VARCHAR(50),
    ApellidoPaterno VARCHAR(50),
    ApellidoMaterno VARCHAR(50),
    CURP VARCHAR(18),
    FechaNacimiento DATE,
    Genero VARCHAR(20),
    Discapacidad VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `Identidad`
  ADD PRIMARY KEY (`NoBoleta`);
COMMIT;

-- Table structure for table `contacto`
CREATE TABLE Contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Calle VARCHAR(100),
    NumeroC VARCHAR(10),
    EntidadFederativa VARCHAR(50),
    MunicipioAlcaldia VARCHAR(50),
    CodigoPostal VARCHAR(10),
    Telefono VARCHAR(15),
    Correo VARCHAR(100),
    NoBoleta VARCHAR(20),
    CONSTRAINT `contacto_NoBoleta` FOREIGN KEY (`NoBoleta`) REFERENCES Identidad(NoBoleta)  ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Table structure for table `procedencia`
CREATE TABLE Procedencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    EscuelaProcedencia VARCHAR(100),
    NombreEscuela VARCHAR(100),
    Promedio FLOAT,
    ESCOM_Opcion VARCHAR(20),
    NoBoleta VARCHAR(20),
    CONSTRAINT `procedencia_NoBoleta` FOREIGN KEY (`NoBoleta`) REFERENCES Identidad(NoBoleta)  ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table `identidad`
INSERT INTO Identidad (NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, CURP, FechaNacimiento, Genero, Discapacidad)
VALUES 
('2022630001', 'Juan', 'Pérez', 'González', 'PERJ930101HDFLRN05', '2003-01-01', 'Masculino', 'Ninguna'),
('2022630002', 'María', 'García', 'López', 'GALM950202MSPRRN09', '2002-02-02', 'Femenino', 'Ninguna'),
('2022630003', 'Luis', 'Hernández', 'Martínez', 'HEMA980303MTSRRN03', '1998-03-03', 'Masculino', 'Ninguna'),
('2022630004', 'Ana', 'Rodríguez', 'Sánchez', 'ROSA970404MSMRRN08', '2001-04-04', 'Femenino', 'Discapacidad auditiva'),
('2022630005', 'Pedro', 'López', 'Díaz', 'LODP960505HGRRRN07', '1999-05-05', 'Masculino', 'Discapacidad motriz usuaria de silla de ruedas');



-- Dumping data for table `contacto`
INSERT INTO Contacto (Calle, NumeroC, EntidadFederativa, MunicipioAlcaldia, CodigoPostal, Telefono, Correo, NoBoleta)
VALUES 
('Av. Insurgentes Sur', '1234', 'Ciudad de México', 'Benito Juárez', '03810', '5551234567', 'ejemplo1@correo.com', '2022630001'),
('Calle Reforma', '567', 'Nuevo León', 'Monterrey', '64000', '8187654321', 'ejemplo2@correo.com', '2022630002'),
('Calle Hidalgo', '890', 'Jalisco', 'Guadalajara', '44100', '3339876543', 'ejemplo3@correo.com', '2022630003'),
('Av. Juárez', '101', 'Puebla', 'Puebla', '72000', '2225554444', 'ejemplo4@correo.com', '2022630004'),
('Av. Revolución', '2468', 'Baja California', 'Tijuana', '22000', '6643332222', 'ejemplo5@correo.com', '2022630005');


-- Dumping data for table `procedencia`
INSERT INTO Procedencia (EscuelaProcedencia, NombreEscuela, Promedio, ESCOM_Opcion, NoBoleta)
VALUES 
('CECyT 1 González Vázquez Vega', NULL, 8.5, 'Primer opción', '2022630001'),
('CECyT 2 Miguel Bernard', 'Escuela Secundaria XYZ', 9.2, 'Segunda opción', '2022630002'),
('CECyT 5 Benito Juárez García', NULL, 8.9, 'Tercer opción', '2022630003'),
('CECyT 12 José María Morelos y Pavón', 'Preparatoria ABC', 8.0, 'Primer opción', '2022630004'),
('CECyT 15 Diódoro Antúnez Echegaray', NULL, 9.5, 'Segunda opción', '2022630005');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
