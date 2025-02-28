<?php
include("../../conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $Activo = $_POST['Activo'];

    
    $sql = "INSERT INTO tecnico (Nombre, Apellido, Correo, Numero_Telefono, Activo) 
            VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$Activo')";
    
    if ($conexion->query($sql) === TRUE) {
        header("Location: indexgerente.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>
