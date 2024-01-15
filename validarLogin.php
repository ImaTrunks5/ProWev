<?php 
$usuario = $_POST['usuario'];
$pasword = $_POST['pasword']; 
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "bdformulario");

// Utilizando consultas preparadas para evitar inyección SQL
$consulta = "SELECT * FROM administrador WHERE usuario = ? AND pasword = ?";
$statement = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($statement, "ss", $usuario, $pasword);
mysqli_stmt_execute($statement);

$resultado = mysqli_stmt_get_result($statement);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    header("location: sesionAdmin.php");
} else {
    include("login.html");
    ?>
    <div class="modal" tabindex="-1" role="dialog" id="errorModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Error en la autenticación</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lo sentimos, la combinación de usuario y contraseña es incorrecta. Por favor, inténtalo de nuevo.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            myModal.show();
        });
    </script>
    <?php
}

mysqli_close($conexion);
?>
