<?php
include("../../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST['id_producto'];

    $sql = "DELETE FROM producto WHERE Id_Producto = '$id_producto'";

    if ($conexion->query($sql) === TRUE) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar producto: " . $conexion->error;
    }

    $conexion->close();

    header("Location: indexgerente.php");
    exit();
}
?>
