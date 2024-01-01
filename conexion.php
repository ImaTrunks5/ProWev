<?php
    $conexion = mysqli_connect("localhost","root","","bdformulario");
    $consulta = "SELECT * FROM Procedencia";
    $resultado = mysqli_query($conexion,$consulta);
    $numFilasResultado = mysqli_num_rows($resultado);
    echo "El numero de registros que tenemos en nuestra BD son:
    $numFilasResultado";

?>