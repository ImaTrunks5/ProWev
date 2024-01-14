<?php include_once("conexion.php");


    $noBoleta = $_POST['txtNoboleta'];
    $nombre = $_POST['txtNombre'];
    $apellidoPaterno = $_POST['txtApPat'];
    $apellidoMaterno = $_POST['txtApMat'];
    $curp = $_POST['txtCurp'];
    $fechaNacimiento = $_POST['dateFecha'];
    $genero = $_POST['txtGen'];
   // $discapacidad = isset($_POST['discapacidadRadio']) ? $_POST['discapacidadRadio'] : '';
   $discapacidad = $_POST['txtDis'];
    
    $calle = $_POST['txtcall'];
    $numeroC = $_POST['txtnumc'];
    $entidadFederativa = $_POST['txtentf'];
    $munAl = $_POST['txtmunAl'];
    $codigoPostal = $_POST['txtcodpos'];
    $telefono = $_POST['txttel'];
    $correo = $_POST['txtcor'];
    
    
    $escuelaProcedencia = $_POST['txtescpro'];
    $nombreEscuela = $_POST['txtnomesc']; 
    $promedio = $_POST['txtprom'];
    $escomOpcion = $_POST['txtescomop'];

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
    
    $sqlAlumno = "INSERT INTO Alumno (NoBoleta,idSalon , Nombre, ApellidoPaterno, ApellidoMaterno, CURP, FechaNacimiento, Genero, Discapacidad, Calle, numeroC, EntidadFederativa, MunicipioAlcaldia, CodigoPostal, Telefono, Correo, EscuelaProcedencia, NombreEscuela, Promedio, ESCOM_Opcion) 
    VALUES ('$noBoleta', '$salonId' , '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$curp', '$fechaNacimiento', '$genero', '$discapacidad', '$calle', '$numeroC', '$entidadFederativa', '$munAl', '$codigoPostal', '$telefono', '$correo', '$escuelaProcedencia', '$nombreEscuela', '$promedio', '$escomOpcion')";

if ($conexion->query($sqlAlumno) !== TRUE) {
    die("Error al insertar datos del alumno: " . $conexion->error);
}


    header("Location: CRUDadmin.html");
?>