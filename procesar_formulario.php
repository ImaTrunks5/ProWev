<?php
include 'conexion.php'; // Archivo de conexión

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos están definidos y no están vacíos
    echo "<p>Todo funciona bien.</p>";

    //Obterer datos de identidad
    $noBoleta = $_POST['NoBoleta'];
    $nombre = $_POST['Nombre'];
    $apellidoPaterno = $_POST['Apellido_Paterno'];
    $apellidoMaterno = $_POST['Apellido_Materno'];
    $curp = $_POST['CURP'];
    $fechaNacimiento = $_POST['Fecha'];
    $genero = $_POST['generoRadio'];
    $discapacidad = isset($_POST['discapacidadRadio']) ? $_POST['discapacidadRadio'] : '';

    //Obterer datos de contacto
    $calle = $_POST['Calle'];
    $numeroC = $_POST['NumeroC'];
    $entidadFederativa = $_POST['EntidadFederativa'];
    $munAl = $_POST['MunAl'];
    $codigoPostal = $_POST['CodigoPostal'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['correo'];
    
    //Obterer datos de procedencia
    $escuelaProcedencia = $_POST['EscP'];
    $nombreEscuela = $_POST['NomEsc']; 
    $promedio = $_POST['Promedio'];
    $escomOpcion = $_POST['OpRadio'];

    //isertar datos de identidad en la base de datos
    $sqlIdentidad = "INSERT INTO Identidad (NoBoleta, Nombre, ApellidoPaterno, ApellidoMaterno, CURP, FechaNacimiento, Genero, Discapacidad) 
            VALUES ('$noBoleta', '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$curp', '$fechaNacimiento', '$genero', '$discapacidad')";


    if ($conexion->query($sqlIdentidad) !== TRUE) {
        die("Error al insertar datos de identidad: " . $conexion->error);
    }

    //isertar datos de contacto en la base de datos    
    $sqlContacto = "INSERT INTO Contacto (Calle, numeroC, EntidadFederativa, MunicipioAlcaldia, CodigoPostal, Telefono, Correo, NoBoleta)
    VALUES ('$calle', '$numeroC', '$entidadFederativa', '$munAl', '$codigoPostal', '$telefono', '$correo','$noBoleta')";

    if ($conexion->query($sqlContacto) !== TRUE) {
        die("Error al insertar datos de contacto: " . $conexion->error);
    }

    //isertar datos de procedencia en la base de datos 
    $sqlProcedencia = "INSERT INTO Procedencia (EscuelaProcedencia, NombreEscuela, Promedio, ESCOM_Opcion, NoBoleta)
    VALUES ('$escuelaProcedencia', '$nombreEscuela', '$promedio', '$escomOpcion','$noBoleta')";

    if ($conexion->query($sqlProcedencia) !== TRUE) {
        die("Error al insertar datos de procedencia: " . $conexion->error);
    }

    echo "Datos insertados correctamente en la base de datos.";

}
$conexion->close(); // Cerrar la conexión
?>
