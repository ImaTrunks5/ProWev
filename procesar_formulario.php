<?php
$conexion = mysqli_connect("localhost","root","","bdformulario"); // Conexión a la base de datos

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos están definidos y no están vacíos
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


    // Llamar al procedimiento almacenado para obtener el ID del salón
    $sp_salon = 'ObtenerPrimerSalon';
    $stmt = $conexion->prepare("CALL $sp_salon(@salonId)");
    $stmt->execute();

    // Verificar si se ejecutó correctamente
    if (!$stmt) {
        die("Error al ejecutar el procedimiento almacenado: " . $conexion->error);
    }

    // Obtener el ID del salón después de llamar al procedimiento
    $result = $conexion->query("SELECT @salonId AS salonId");
    $salonRow = $result->fetch_assoc();
    $salonId = $salonRow['salonId'];

/* 
    // Llamar al procedimiento almacenado
    $sp_salon = 'ObtenerPrimerSalon';
    $salon = $conexion->query("CALL $sp_salon(salonId)");

    // Obtener el ID del salón después de llamar al procedimiento
    $result = $conexion->query("SELECT @salonId AS salonId");
    $salonRow = $result->fetch_assoc();
    $salonId = $salonRow['salonId'];


    // Verificar si se ejecutó correctamente
    if ($salon) {
        echo "Procedimiento almacenado ejecutado con éxito.";
    } else {
        echo "Error al ejecutar el procedimiento almacenado: " . $conexion->error;
    }
*/
    //insertar en la base de datos
    $sqlAlumno = "INSERT INTO Alumno (NoBoleta,idSalon , Nombre, ApellidoPaterno, ApellidoMaterno, CURP, FechaNacimiento, Genero, Discapacidad, Calle, numeroC, EntidadFederativa, MunicipioAlcaldia, CodigoPostal, Telefono, Correo, EscuelaProcedencia, NombreEscuela, Promedio, ESCOM_Opcion) 
            VALUES ('$noBoleta', '$salonId' , '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$curp', '$fechaNacimiento', '$genero', '$discapacidad', '$calle', '$numeroC', '$entidadFederativa', '$munAl', '$codigoPostal', '$telefono', '$correo', '$escuelaProcedencia', '$nombreEscuela', '$promedio', '$escomOpcion')";



    if ($conexion->query($sqlAlumno) !== TRUE) {
        die("Error al insertar datos del alumno: " . $conexion->error);
    }
    
    //echo "Datos insertados correctamente en la base de datos.";
    

}
$conexion->close(); // Cerrar la conexión

?>
