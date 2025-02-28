<?php
include("conexion.php");

// Verifica la conexión al servidor.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nombre = $_POST['Nombre']; // Variable para nombre de usuario extraído del formulario.
    $Apellido = $_POST['Apellido'];
    $Numero_Telefono = $_POST['Numero_Telefono'];
    $Correo = $_POST['Correo']; // Variable para correo extraído del formulario.
    $Contraseña = $_POST['Contraseña']; // Variable para contraseña extraída del formulario.

    // Como es parte de registrarse, se deben de insertar dichos datos a la base de datos.
    // Primero, se realiza el insert con el nombre de la tabla y atributos de la base de datos.
    // Después en VALUES, se colocan las variables que creamos anteriormente que es de lo que ingresará el usuario.
    $sql = "INSERT INTO cliente (Nombre, Apellido, Numero_Telefono, Correo, Tipo_Usuario, Contraseña )
            VALUES ('$Nombre', '$Apellido', '$Numero_Telefono', '$Correo', 'Cliente', '$Contraseña')";

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
    <link rel="stylesheet" href="../VIEW/registro.css">
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
                <input type="text" id="Apellido" name="Apellido" required>
                <label>Apellido </label>
            </div>

            <div class="inputs">
                <input type="int" id="Numero_Telefono" name="Numero_Telefono" required>
                <label>Número telefónico</label>
            </div>
            
            <div class="inputs">
                <input type="text" id="Correo" name="Correo" required>
                <label>Correo electrónico</label>
            </div>
            
            <div class="inputs">
                <input type="text" id="Contraseña" name="Contraseña" required>
                <label>Contraseña</label>
            </div>

            <input type="submit" value="INICIAR" class="boton" onclick = "CambiarPagina()">
            
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

        function CambiarPagina(){
            window.location.href = "cliente/indexcliente.php";
        }
    </script>
    
</body>
</html>