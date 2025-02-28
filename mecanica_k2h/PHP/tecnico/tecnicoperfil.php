<?php
session_start();
include("../conexion.php");

$Nombre = $_SESSION['Nombre'];

$sql = "SELECT Nombre, Apellido, Correo, Numero_Telefono, contraseña FROM tecnico WHERE Nombre='$Nombre'";
$result = $conexion->query($sql);

if ($result->num_rows > 0){
    $tecnico = $result->fetch_assoc();
}
else{
    die("Error: Técnico no encontrado");
}
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Técnico</title>
    <link rel="stylesheet" href="../../VIEW/gerente/styleperfil.css">
</head>
<body>
    <h1>Perfil Técnico</h1>

    
        <div class="foto">
            <h2><?php echo htmlspecialchars($tecnico['Nombre']); ?> <?php echo htmlspecialchars($tecnico['Apellido']); ?></h2>
            
            <p ><strong>Correo:</strong> <?php echo htmlspecialchars($tecnico['Correo']); ?></p>
            <p><strong>Contraseña:</strong> <?php echo htmlspecialchars($tecnico['contraseña']); ?></p>
            <p><strong>Telefono:</strong> <?php echo htmlspecialchars($tecnico['Numero_Telefono']); ?></p>
<br><br>
        <a href="tecnicomain.php">
        <button type="submit">Regresar</button>
        </a>
        
        <a href="../../index.php">
        <button type="submit">Cerrar sesión</button>
        </a>
        </div>
  
        </div>
    

    

       
</body>
</html>