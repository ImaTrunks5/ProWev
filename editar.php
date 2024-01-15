<?php
include_once("conexion.php");

//include_once("cargaralumnos.php");



$NoBoleta= $_GET['NoBoleta'];

$querybuscar = mysqli_query($conexion, "SELECT * FROM Alumno WHERE NoBoleta=$NoBoleta");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $noBoleta = $mostrar['NoBoleta'];
    $nombre = $mostrar['Nombre'];
    $apellidoPaterno = $mostrar['ApellidoPaterno'];
    $apellidoMaterno = $mostrar['ApellidoMaterno'];
    $curp = $mostrar['CURP'];
    $fechaNacimiento = $mostrar['FechaNacimiento'];
    $genero = $mostrar['Genero'];
    $discapacidad = $mostrar['Discapacidad'];

    //Obterer datos de contacto
    $calle = $mostrar['Calle'];
    $numeroC = $mostrar['NumeroC'];
    $entidadFederativa = $mostrar['EntidadFederativa'];
    $munAl = $mostrar['MunicipioAlcaldia'];
    $codigoPostal = $mostrar['CodigoPostal'];
    $telefono = $mostrar['Telefono'];
    $correo = $mostrar['Correo'];
    
    //Obterer datos de procedencia
    $escuelaProcedencia = $mostrar['EscuelaProcedencia'];
    $nombreEscuela = $mostrar['NombreEscuela']; 
    $promedio = $mostrar['Promedio'];
    $escomOpcion = $mostrar['ESCOM_Opcion'];
    $idsalon=$mostrar['idSalon'];


}

?>
<html>
<head>
    <title>Modificar Alumno</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       
        <style>

            a,input[type="submit"],button
            {
	            font-size: 14px;
	            text-align:center;
	            width: 100px;
	            display: inline-block;
	            background-color:rgb(57, 123, 190);
	            padding: 6px 10px;
	            border-radius:5px;
	            text-decoration: none;
	            color:white;
	            border:1px solid black;
	            cursor:pointer;
            }
            tr {
                min-height: 10px; /* o cualquier valor adecuado */
            }   

        </style>
</head>
<body>
<div class="table-responsive" id="formmodificar">
    <form method="POST" >
        <table class="table">
        <tr><th style="background-color: rgb(57, 123, 190);color:white"   colspan="4">Modificar Alumno</th></tr>
		     <tr> 
                <td>Número de Boleta </td>
                <td><input type="text" name="txtNoboleta" value="<?php echo $noBoleta;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtNombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Apellido Paterno</td>
                <td><input type="text" name="txtApPat" value="<?php echo $apellidoPaterno;?>" required></td>
            </tr>
            <tr> 
                <td>Apellido Materno</td>
                <td><input type="text" name="txtApMat" value="<?php echo $apellidoMaterno;?>"required></td>
            </tr>
            <tr> 
                <td>Curp</td>
                <td><input type="text" name="txtCurp" value="<?php echo $curp;?>"required></td>
            </tr>
            <tr> 
                <td>Fecha Nacimiento</td>
                <td><input type="date" name="dateFecha" value="<?php echo $fechaNacimiento ;?>"required></td>
            </tr>
            <tr>
                <td>Género:</td>
                <td>
                <fieldset class="row mb-3">
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="generoRadio" id="masculinoRadio" value="Masculino" <?php echo ($genero == 'Masculino') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="masculinoRadio">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="generoRadio" id="femeninoRadio" value="Femenino" <?php echo ($genero == 'Femenino') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="femeninoRadio">Femenino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="generoRadio" id="otroRadio" value="Otro" <?php echo ($genero == 'Otro') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="otroRadio">Otro</label>
                        </div>
                    </div>
                </fieldset>
            </td>
            </tr>

            <tr> 
                <td >Discapacidad</td>
                <td><input type="text" name="txtDis" value="<?php echo $discapacidad;?>"required></td>
            </tr>
            <tr> 
                <td>Calle</td>
                <td><input type="text" name="txtcall" value="<?php echo $calle;?>"required></td>
            </tr>
            <tr> 
                <td>Número</td>
                <td><input type="text" name="txtnumc" value="<?php echo $numeroC;?>"required></td>
            </tr>
            <tr> 
                <td>Entidad Federativa</td>
                <td><input type="text" name="txtentf" value="<?php echo $entidadFederativa;?>"required></td>
            </tr>
            <tr> 
                <td>Municipio o Alcaldia </td>
                <td><input type="text" name="txtmunAl" value="<?php echo $munAl;?>"required></td>
            </tr>
            <tr> 
                <td>CódigoPostal</td>
                <td><input type="text" name="txtcodpos" value="<?php echo $codigoPostal;?>"required></td>
            </tr>
            <tr> 
                <td>Teléfono</td>
                <td><input type="text" name="txttel" value="<?php echo $telefono;?>"required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="text" name="txtcor" value="<?php echo $correo;?>"required></td>
            </tr>
            <tr> 
                <td>Escuela Procedencia</td>
                <td><input type="text" name="txtescpro" value="<?php echo $escuelaProcedencia;?>"required></td>
            </tr>
            <tr> 
                <td>Nombre Escuela</td>
                <td><input type="text" name="txtnomesc" value="<?php echo $nombreEscuela;?>"></td>
            </tr>
            <tr> 
                <td>Promedio</td>
                <td><input type="text" name="txtprom" value="<?php echo $promedio;?>"required></td>
            </tr>
            <tr> 
                <td>Escom Opción</td>
                <td><input type="text" name="txtescomop" value="<?php echo $escomOpcion;?>"required></td>
            </tr>
    
            <tr>
				
                <td colspan="2">
				<a href="CRUDadmin.html">Cancelar</a>
				<input type="submit"  name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr> 


        </table>




    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
  
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $noBoleta1 = $_POST['txtNoboleta'];
	$nombre1= $_POST['txtNombre'];
    $apellidoPaterno1= $_POST['txtApPat'];
    $apellidoMaterno1=  $_POST['txtApMat'];
	$curp1= $_POST['txtCurp'];
    $fechaNacimiento1 = $_POST['dateFecha'];
    $genero1 =  $_POST['generoRadio'];
    $discapacidad1 = $_POST['txtDis'];
    $calle1 =  $_POST['txtcall'];

    $numeroC1 = $_POST['txtnumc'];
    $entidadFederativa1 = $_POST['txtentf'];
    $munAl1 = $_POST['txtmunAl'];
    $codigoPostal1 = $_POST['txtcodpos'];
    $telefono1 = $_POST['txttel'];
    $correo1 = $_POST['txtcor'];
    
   
    $escuelaProcedencia1 =$_POST['txtescpro'];
    $nombreEscuela1 =$_POST['txtnomesc'];
    $promedio1 = $_POST['txtprom'];
    $escomOpcion1 = $_POST['txtescomop'];
   




    $querymodificar = mysqli_query($conexion, "UPDATE Alumno SET `NoBoleta`='$noBoleta1',`Nombre`='$nombre1',`ApellidoPaterno`='$apellidoPaterno1',`ApellidoMaterno`='$apellidoMaterno1',`CURP`='$curp1',`FechaNacimiento`='$fechaNacimiento1',`Genero`='$genero1',`Discapacidad`='$discapacidad1',`Calle`='$calle1',`NumeroC`='$numeroC1',`EntidadFederativa`='$entidadFederativa1',`MunicipioAlcaldia`='$munAl1',`CodigoPostal`='$codigoPostal1',`Telefono`='$telefono1',`Correo`='$correo1',`EscuelaProcedencia`='$escuelaProcedencia1',`NombreEscuela` " . ($nombreEscuela1 != '' ? "='$nombreEscuela1'" : '=NULL') . ",`Promedio`='$promedio1',`ESCOM_Opcion`='$escomOpcion1',`idSalon`='$idsalon' WHERE NoBoleta=$NoBoleta");
    echo "<script>window.location.href = 'CRUDadmin.html';</script>";

    
}
?>

    
    