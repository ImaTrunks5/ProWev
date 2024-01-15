<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $NoBoleta = $_POST['NoBoleta'];
        $NombrePDF = './PDF/'.$NoBoleta.'ExamenSimulacro.pdf';

        if (file_exists($NombrePDF))
        {
            header('Location: '.$NombrePDF);
        } else {
            echo "El archivo no existe";
        }
    }
?>