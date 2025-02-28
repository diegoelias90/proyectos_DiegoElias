<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión Taller de mecánica K2H</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: linear-gradient(150deg, #0D0D0D, #383838, #5D5D5D, #888889, #535353, #262626, #010101);
            height: 100vh;
        }

        .formulario {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: gray;
            border-radius: 10px;
            padding: 40px;
            box-sizing: border-box;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .formulario h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
            color: #fff;
        }

        form .identificador, form .contraseña, form .roles {
            position: relative;
            margin: 30px 0;
            border-bottom: 2px solid #adadad;
        }

        .identificador input, .contraseña input, .roles select {
            width: 100%;
            padding: 10px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
            color: #fff;
        }

        .identificador label, .contraseña label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: 0.3s ease;
            background-color: gray;
            padding: 0 4px;
        }

        .roles label {
            color: #adadad;
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }

        .identificador input:focus ~ label,
        .identificador input:not(:placeholder-shown) ~ label,
        .contraseña input:focus ~ label,
        .contraseña input:not(:placeholder-shown) ~ label {
            top: -10px;
            left: 5px;
            font-size: 12px;
            color: #262626;
        }

        .roles select:focus {
            outline: none;
            border-bottom: 2px solid #262626;
            background: gray;
            color: white;
        }

        input[type="submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #010101;
            border-radius: 25px;
            font-size: 18px;
            color: white;
            cursor: pointer;
            outline: none;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            border-color: gray;
            background: #262626;
            transition: 0.5s;
        }

        .registro {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: black;
        }

        .registro a {
            color: #262626;
            text-decoration: none;
        }

        .registro a:hover {
            text-decoration: underline;
        }
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
                        header("Location: cliente\indexcliente.php");
                        break;
                    case 'tecnico':
                        header("Location: tecnico\tecnicomain.php");
                        break;
                    default:
                        header("Location: gerente\indexgerente.php");
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
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: linear-gradient(150deg, #0D0D0D, #383838, #5D5D5D, #888889, #535353, #262626, #010101);
            height: 100vh;
        }

        .formulario {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: gray;
            border-radius: 10px;
            padding: 40px;
            box-sizing: border-box;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .formulario h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
            color: #black;
        }

        form .identificador, form .contraseña, form .roles {
            position: relative;
            margin: 30px 0;
            border-bottom: 2px solid #adadad;
        }

        .identificador input, .contraseña input, .roles select {
            width: 100%;
            padding: 10px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
            color: #black;
        }

        .identificador label, .contraseña label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: 0.3s ease;
            background-color: gray;
            padding: 0 4px;
        }

        .roles label {
            color: #adadad;
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }

        .identificador input:focus ~ label,
        .identificador input:not(:placeholder-shown) ~ label,
        .contraseña input:focus ~ label,
        .contraseña input:not(:placeholder-shown) ~ label {
            top: -10px;
            left: 5px;
            font-size: 12px;
            color: #262626;
        }

        .roles select:focus {
            outline: none;
            border-bottom: 2px solid #262626;
            background: gray;
            color: white;
        }

        input[type="submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #010101;
            border-radius: 25px;
            font-size: 18px;
            color: white;
            cursor: pointer;
            outline: none;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            border-color: gray;
            background: #262626;
            transition: 0.5s;
        }

        .registro {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: black;
        }

        .registro a {
            color: #262626;
            text-decoration: none;
        }

        .registro a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="formulario">    
        <h1>INICIO DE SESIÓN:</h1>

        <form method="post" action="">
            <div class="identificador">
                <input type="text" id="Nombre" name="Nombre" placeholder=" " required>
                <label for="Nombre">Nombre de Usuario</label>
            </div>

            <div class="contraseña">
                <input type="password" id="contraseña" name="contraseña" placeholder=" " required>
                <label for="contraseña">Contraseña</label>
            </div>

            <div class="roles">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <option value="cliente">Cliente</option>
                    <option value="tecnico">Técnico</option>
                    <option value="gerente">Gerente</option>
                </select>
            </div>
            
            <input type="submit" value="INICIAR" class="boton">
            
            <div class="registro">
                Quiero hacer el <a href="registro.php">registro</a>
            </div>
        </form>
    </div>
</body>
</html>