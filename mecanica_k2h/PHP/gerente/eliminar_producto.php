<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura el ID del técnico a eliminar
    $id_cant = $_POST['id_cant'];

    // Elimina el técnico de la base de datos
    $sql = "DELETE FROM producto WHERE Id_Producto = '$id_cant'";

    if ($conexion->query($sql) === TRUE) {
        echo "Técnico eliminado correctamente.";
    } else {
        echo "Error al eliminar técnico: " . $conexion->error;
    }

    $conexion->close();

    // Redirige de vuelta a la página de técnicos
    header("Location: indexgerente.php");
    exit();
}
?>
