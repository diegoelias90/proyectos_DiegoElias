<?php
session_start();
include("../conexion.php");



$Nombre = $_SESSION['Nombre'];

$sql = "SELECT Nombre, Apellido, Correo, Numero_Telefono, contraseña FROM gerente WHERE Nombre='$Nombre'";
$result = $conexion->query($sql);

if ($result->num_rows > 0){
    $gerente = $result->fetch_assoc();
}
else{
    die("Error: Gerente no encontrado");
}
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Cliente</title>
    <link rel="stylesheet" href="../../VIEW/gerente/styleperfil.css">
</head>
<body>
    <h1>Perfil Gerente</h1>

    
        <div class="foto">
            <h2><?php echo htmlspecialchars($gerente['Nombre']); ?> <?php echo htmlspecialchars($gerente['Apellido']); ?></h2>
            
            <p ><strong>Correo:</strong> <?php echo htmlspecialchars($gerente['Correo']); ?></p>
            <p><strong>Contraseña:</strong> <?php echo htmlspecialchars($gerente['contraseña']); ?></p>
            <p><strong>Telefono:</strong> <?php echo htmlspecialchars($gerente['Numero_Telefono']); ?></p>
<br><br>
        <a href="indexgerente.php">
        <button type="submit">Regresar</button>
        </a>
        
        <a href="../../index.php">
        <button type="submit">Cerrar sesión</button>
        </a>
        </div>
  
        </div>
    

    

       
</body>
</html>
