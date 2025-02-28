<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura el ID del técnico a eliminar
    $id_prev = $_POST['id_tecnico'];

    // Elimina el técnico de la base de datos
    $sql = "DELETE FROM preventivo WHERE Id_Usuario = '$id_prev'";


    if ($conexion->query($sql) === TRUE) {
        echo "card eliminado correctamente.";
    } else {
        echo "Error al eliminar card: " . $conexion->error;
    }

    $conexion->close();

    // Redirige de vuelta a la página de técnicos
    header("Location: tecnicomain.php");
    exit();
}
?>