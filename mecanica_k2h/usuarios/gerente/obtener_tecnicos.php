<?php
include("../../conexion.php");

$sql = "SELECT Id_Usuario, Nombre, Apellido, Correo, Numero_Telefono, Activo FROM tecnico";
$result = $conexion->query($sql);

$output = "";
if ($result->num_rows > 0) {
    $output .= "
        <table>
            <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Activo</th>
                <th>Acciones</th> <!-- Nueva columna para acciones -->
            </tr>";
    
    while($row = $result->fetch_assoc()) {
        $output .= "
            <tr>
                <td>" . htmlspecialchars($row['Id_Usuario']) . "</td>
                <td>" . htmlspecialchars($row['Nombre']) . "</td>
                <td>" . htmlspecialchars($row['Apellido']) . "</td>
                <td>" . htmlspecialchars($row['Correo']) . "</td>
                <td>" . htmlspecialchars($row['Numero_Telefono']) . "</td>
                <td>" . htmlspecialchars($row['Activo']) . "</td>
                
                <td>
                    <button onclick=\"eliminarTecnico(" . $row['Id_Usuario'] . ")\">Eliminar</button> <!-- Botón de eliminación -->
                </td>
            </tr>";
    }
    
    $output .= "</table>";
} else {
    $output = "<p>No se encontraron técnicos</p>";
}

echo $output;
$conexion->close();
?>
