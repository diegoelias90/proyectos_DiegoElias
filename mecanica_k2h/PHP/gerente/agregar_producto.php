<?php
include("../conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id_Producto = $_POST['Id_Producto'];
    $Nombre =$_POST['Nombre'];
    $Precio = $_POST['Precio'];
    $Promocion = $_POST['Promocion'];
    $fecha_produccion = $_POST['fecha_produccion'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $cantidad = $_POST['Cantidad'];
    $imagen = '';

    if (isset($_FILES["foto"])) {
        $file = $_FILES["foto"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $carpeta = "../../fotos/";

        // Verificar si el tipo de archivo es una imagen
        if ($tipo != "image/jpg" && $tipo != "image/jpeg" && $tipo != "image/png" && $tipo != "image/gif") {
            echo "Error, el archivo no es una imagen";
        } else {
            // Crear un nombre único para evitar sobrescribir archivos
            $nombre_unico = uniqid() . "_" . $nombre;
            $ruta_destino = $carpeta . $nombre_unico;

            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($ruta_provisional, $ruta_destino)) {
                $imagen = $ruta_destino;

                // Insertar los datos del producto en la base de datos
                $sql = "INSERT INTO producto (Id_Producto, Nombre, Precio, Promocion, Fecha_Produccion, Fecha_Vencimiento, Cantidad, foto) 
                        VALUES ('$Id_Producto','$Nombre', '$Precio', '$Promocion', '$fecha_produccion', '$fecha_vencimiento', '$cantidad', '$imagen')";

                if ($conexion->query($sql) === TRUE) {
                    header("Location:indexgerente.php");
                } else {
                    echo "Error:".sql."<br>".$conexion;
                }
            } else {
                echo "Error al subir la imagen.";
            }
        }
    }
}