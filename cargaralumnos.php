<?php 
include_once("conexion.php");
//include_once("CRUDadmin.html");

$queryusuarios = mysqli_query($conexion, "SELECT * FROM Alumno ORDER BY NoBoleta asc");

		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['NoBoleta']."</td>";
            echo "<td>".$mostrar['Nombre']."</td>";
            echo "<td>".$mostrar['ApellidoPaterno']."</td>";    
			echo "<td>".$mostrar['ApellidoMaterno']."</td>";  
            echo "<td>".$mostrar['CURP']."</td>"; 
            echo "<td style='width:26%'><a href=\"ver.php?NoBoleta=$mostrar[NoBoleta]\" class='btn btn-info'>Revisar</a>  <a href=\"editar.php?NoBoleta=$mostrar[NoBoleta]\" class='btn btn-primary'>Modificar</a>  <a href=\"eliminar.php?NoBoleta=$mostrar[NoBoleta]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[Nombre]?')\" class='btn btn-danger'>Eliminar</a></td>";    
        }
?>