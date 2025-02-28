<?php
include("../../conexion.php");

$sql = "SELECT Id_Producto, Precio, Promocion, Fecha_Produccion, Fecha_Vencimiento, Cantidad FROM producto";
$result = $conexion->query($sql);

$output = "";
if ($result->num_rows > 0) {
    $output .= "
        <table>
            <tr>
                <th>ID Producto</th>
                <th>Precio</th>
                <th>Promoción</th>
                <th>Fecha Producción</th>
                <th>Fecha Vencimiento</th>
                <th>Cantidad</th>
                <th>Acciones</th> <!-- Nueva columna para acciones -->
            </tr>";
    
    while($row = $result->fetch_assoc()) {
        $output .= "
            <tr>
                <td>" . htmlspecialchars($row['Id_Producto']) . "</td>
                <td>" . htmlspecialchars($row['Precio']) . "</td>
                <td>" . htmlspecialchars($row['Promocion']) . "</td>
                <td>" . htmlspecialchars($row['Fecha_Produccion']) . "</td>
                <td>" . htmlspecialchars($row['Fecha_Vencimiento']) . "</td>
                <td>" . htmlspecialchars($row['Cantidad']) . "</td>
                <td>
                    <button onclick=\"eliminarProducto(" . $row['Id_Producto'] . ")\">Eliminar</button> <!-- Botón de eliminación -->
                </td>
            </tr>";
    }
    
    $output .= "</table>";
} else {
    $output = "<p>No se encontraron productos</p>";
}

echo $output;
$conexion->close();
?>