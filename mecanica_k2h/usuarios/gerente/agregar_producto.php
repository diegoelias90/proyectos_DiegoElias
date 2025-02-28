<?php
include("../../conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id_Producto = $_POST['Id_Producto'];
    $Precio = $_POST['Precio'];
    $Promocion = $_POST['Promocion'];
    $fecha_produccion = $_POST['fecha_produccion'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $cantidad = $_POST['Cantidad'];

    $sql = "INSERT INTO producto (Id_Producto, Precio, Promocion, Fecha_Produccion, Fecha_Vencimiento,  Cantidad ) 
            VALUES ('$Id_Producto', '$Precio','$Promocion', '$fecha_produccion', '$fecha_vencimiento', '$cantidad')";
    
    if ($conexion->query($sql) === TRUE) {
        header("Location: indexgerente.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>
