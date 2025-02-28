<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura el ID del técnico a eliminar
    $id_tecnico = $_POST['id_tecnico'];

    // Elimina el técnico de la base de datos
    $sql = "DELETE FROM tecnico WHERE Id_Usuario = '$id_tecnico'";

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
