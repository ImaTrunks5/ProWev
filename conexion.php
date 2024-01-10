<?php
    $conexion = mysqli_connect("localhost","root","","bdformulario");
    $consulta = "SELECT * FROM alumno";
    $resultado = mysqli_query($conexion,$consulta);
?>