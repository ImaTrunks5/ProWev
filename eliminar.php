<?php
    include_once("conexion.php");
    $noBoleta = $_GET['NoBoleta'];
 
    mysqli_query($conexion, "DELETE FROM Alumno WHERE NoBoleta=$noBoleta");
    header("Location: CRUDadmin.html");

?>