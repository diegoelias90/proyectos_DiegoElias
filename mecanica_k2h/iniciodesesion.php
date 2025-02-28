<?php
//Inicia la captura de salida para evitar que se envíe contenido antes de la redirección
ob_start();
//Incluye el archivo que contiene la conexión a la base de datos
include("conexion.php");
//Inicia una nueva sesión o reanuda la existente
session_start();

//Verifica si la solicitud fue realizada mediante el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Obtiene el nombre de usuario, contraseña y rol enviados desde el formulario
        $Nombre = $_POST['Nombre'];
        $contraseña = $_POST['contraseña'];
        $rol = $_POST['rol'];
    
        // Inicializa la variable que almacenará el nombre de la tabla
        $tabla = '';
    
        // Selecciona la tabla correspondiente según el rol del usuario
        switch ($rol) {
            case 'cliente':
                $tabla = 'cliente';
                break;
            case 'tecnico':
                $tabla = 'tecnicos';
                break;
            case 'gerente':
                $tabla = 'gerente';
                break;
        }
        
        //Construye la consulta SQL para buscar al usuario en la tabla correspondiente
        $sql = "SELECT * FROM $tabla WHERE Nombre = '$Nombre'";

        //Ejecuta la consulta
        $result = $conexion->query($sql);

        //Verifica si se encontró al menos un usuario con el nombre indicado
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
        
            // Compara primero la contraseña de la base de datos con la contraseña ingresada.
            if ($usuario['contraseña'] == $contraseña) {
                // Almacena el nombre de usuario y rol en la sesión
                $_SESSION['Nombre'] = $usuario['Nombre'];
                $_SESSION['rol'] = $rol;
        
                // Redireccionar según el rol
                switch ($rol) {
                    case 'cliente':
                        header("Location: usuarios\cliente\indexcliente.php");
                        break;
                    case 'tecnico':
                        header("Location: usuarios\tecnico\tecnicomain.php");
                        break;
                    default:
                        header("Location: usuarios\gerente\indexgerente.php");
                        break;
                }
        
                // Finaliza la ejecución del script para asegurar que no se ejecute más código después de la redirección
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    }
        
        // Cierra la conexión a la base de datos
$conexion->close();
        
        // Finaliza la captura de salida y envía todo el contenido acumulado
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión Taller de mecánica K2H</title>
    <link rel="stylesheet" href="iniciodesesion.css">
    <script src="cambiosdepaginas.js"></script>
</head>
<body>
    <div class="formulario">
        <h1>INICIO DE SESIÓN:</h1>

        <form method="post" action=""><!-- FORMULARIOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->
            <div class="identificador">
                <label for="Nombre">Nombre de Usuario</label>
                <input type="text" id="Nombre" name="Nombre" required> <!-- Tiene que ser nombre_usuario -->
            </div>

            <div class="contraseña">
                <label for="contraseña">Contraseña</label>
                <input type="password" required id="contraseña" name="contraseña">
            </div>

            <label for="rol">Rol:</label><br>
            <select id="rol" name="rol" required>
                <option value="cliente">Cliente</option>
                <option value="tecnico">Técnico</option>
                <option value="gerente">Gerente</option>
            </select><br><br>

            <input type="submit" value="INICIAR" class="boton">
            
            <div class="registro">
                Quiero hacer el <a href="registro.php">registro</a>
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
