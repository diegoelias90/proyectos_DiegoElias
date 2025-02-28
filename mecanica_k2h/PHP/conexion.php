<?php
//Defino los datos de conexión a la base de datos

$servidor_db = "localhost";
$usuario_db = "root";
$contraseña_db = ""; //No creo que lo lleguemos a usar pero esta en la guía...
$nombre_db = "tallermecanicok2h";

//Crear la conexión con la clase mysqli

$conexion = new mysqli($servidor_db, $usuario_db, $contraseña_db, $nombre_db);

//Verificar la conexión
if($conexion->connect_error){
    die("Conexión fallida: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
?>