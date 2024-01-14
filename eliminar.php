<?php
    include_once("conexion.php");
    $noBoleta = $_POST['NoBoleta'];
 
    mysqli_query($conexion, "DELETE FROM Alumno WHERE cod=$noBoleta");
    header("Location: CRUDadmin.html");

?>