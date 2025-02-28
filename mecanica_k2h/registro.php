<?php
include("conexion.php");

// Verifica la conexión al servidor.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nombre = $_POST['Nombre']; // Variable para nombre de usuario extraído del formulario.
    $correo = $_POST['correo']; // Variable para correo extraído del formulario.
    $contrasena = $_POST['contraseña']; // Variable para contraseña extraída del formulario.

    // Como es parte de registrarse, se deben de insertar dichos datos a la base de datos.
    // Primero, se realiza el insert con el nombre de la tabla y atributos de la base de datos.
    // Después en VALUES, se colocan las variables que creamos anteriormente que es de lo que ingresará el usuario.
    $sql = "INSERT INTO cliente (Nombre, correo, contrasena)
            VALUES ('$Nombre', '$correo', '$contrasena')";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Taller de mecánica K2H</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>

    <div class="formulario">
        <h1>REGISTRO</h1>
        <form method="post"  action="">
            <div class="inputs">
                <input type="text" id="Nombre" name="Nombre" required>
                <label>Nombre de usuario</label>
            </div>
            
            <div class="inputs">
                <input type="text" id="correo" name="correo" required>
                <label>Correo electrónico</label>
            </div>
            
            <div class="inputs">
                <input type="text" id="contrasena" name="contrasena" required>
                <label>Contraseña</label>
            </div>

            <input type="submit" value="INICIAR" class="boton">
            
            <div class="iniciodesesion">
                Quiero hacer el <a href="iniciodesesion.php">inicio de sesión</a>  
            </div>
        </form>
    </div>

    <script>
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => {
                if (input.value !== '') {
                    input.classList.add('has-content');
                } else {
                    input.classList.remove('has-content');
                }
            });
        });
    </script>
    
</body>
</html>
