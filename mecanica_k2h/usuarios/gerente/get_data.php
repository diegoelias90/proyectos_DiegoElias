<?php
include("../../conexion.php");
session_start();

// Verifica si el usuario tiene permisos de administrador
if ($_SESSION['rol'] != 'gerente') {
    echo "Acceso denegado.";
    exit();
}

// Inicializa las variables
$titulo = "Selecciona una opción"; // Valor predeterminado
$result = null; // Inicializa result
$columnas = []; // Inicializa columnas

// Obtiene la opción seleccionada
$opcion = $_POST['opcion'] ?? '';

// Variables para almacenar la consulta SQL y las columnas a mostrar
$sql = "";

switch ($opcion) {
    case 'tecnico':
        $sql = "SELECT Id_Usuario, Nombre, Apellido, Correo, Numero_Telefono, Activo FROM tecnico";
        $columnas = ['ID Usuario', 'Nombre', 'Apellido', 'Correo', 'Número de Teléfono', 'Activo'];
        break;
    case 'Productos':
        $sql = "SELECT Id_Producto, Precio, Promocion, Fecha_Produccion, Fecha_Vencimiento, Cantidad FROM producto";
        $columnas = ['ID Producto', 'Precio', 'Promoción', 'Fecha de Producción', 'Fecha de Vencimiento','Cantidad'];
        break;
    default:
        echo "Selección no válida.";
        exit();
}

// Ejecutar la consulta
$result = $conexion->query($sql);

// Procesar resultados
if ($result && $result->num_rows > 0) {
    echo "<h2>$titulo</h2>";
    echo "<table>";
    echo "<tr>";
    foreach ($columnas as $columna) {
        echo "<th>" . htmlspecialchars($columna) . "</th>";
    }
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron registros.</p>";
}

$conexion->close();
?>
