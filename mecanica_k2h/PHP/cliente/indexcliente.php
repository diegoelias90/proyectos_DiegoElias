<?php 
session_start();
include("../conexion.php");

// Verifica la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verifica si el usuario ha iniciado sesión y obtiene su Id_Usuario
if (!isset($_SESSION['Nombre'])) {
    die("Error: No se ha iniciado sesión");
}

$nombreUsuario = $_SESSION['Nombre'];
$sqlUsuario = "SELECT Id_Usuario FROM cliente WHERE Nombre = '$nombreUsuario'";
$resultUsuario = mysqli_query($conexion, $sqlUsuario);
$cliente = mysqli_fetch_assoc($resultUsuario);

if (!$cliente) {
    die("Error: Cliente no encontrado");
}

$idUsuario = $cliente['Id_Usuario']; // Guarda el Id_Usuario del cliente

// Manejar la actualización de cantidad al agregar al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreProducto = $_POST['nombre'];
    $cantidadAgregar = intval($_POST['cantidad']);

    // Consulta para obtener la cantidad actual del producto y su Id_Producto
    $query = "SELECT Id_Producto, Cantidad FROM producto WHERE nombre = '$nombreProducto'";
    $result = mysqli_query($conexion, $query);
    $producto = mysqli_fetch_assoc($result);

    if ($producto) {
        $idProducto = $producto['Id_Producto'];
        $nuevaCantidad = $producto['Cantidad'] - $cantidadAgregar;

        // Actualizar la cantidad en la base de datos
        if ($nuevaCantidad >= 0) {
            $updateQuery = "UPDATE producto SET Cantidad = $nuevaCantidad WHERE Id_Producto = $idProducto";
            mysqli_query($conexion, $updateQuery);

            // Inserción en la tabla producto_pedido con el Id_Usuario
            $insertQuery = "INSERT INTO producto_pedido (Id_Producto, Cantidad, Confirmado, Id_Usuario) VALUES ($idProducto, $cantidadAgregar, 0, $idUsuario)";
            if (mysqli_query($conexion, $insertQuery)) {
                echo "Cantidad actualizada correctamente y pedido agregado.";
            } else {
                echo "Error al insertar en producto_pedido: " . mysqli_error($conexion);
            }
        } else {
            echo "No hay suficiente stock disponible.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../VIEW/cliente/index.css">
    <title>K2H</title>
    <style>
        .modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto; 
  padding: 20px;
  border: 1px solid #888;
  width: 50%; 
}

.close-button {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close-button:hover,
.close-button:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
    </style>
</head>
<body>
    <header>
        <img src="../../MEDIA/unnamed.png" alt="Botón" width="110" height="70">
        <a href="../../index.php"><img src="../../MEDIA/pngwing.com (1).png" width="70" height="70"></a>
        <a href="carrito.php"><img src="../../MEDIA/carro-removebg-preview.png" alt="boton" class="cart" width="70" height="70"></a>
    </header>

    <div class="main-content">
        <div class="category-card">
            <img src="../../MEDIA/Captura de pantalla 2024-09-11 153100.png" width="100%" height="auto">
        </div>
    </div>
    <div class="category-card">
        <img src="../../MEDIA/cososevi.png" width="100%" height="auto">
    </div>
    <div class="card">
        <img src="../../MEDIA/257-SW-La-importancia-del-Mantenimiento-Preventivo-02.png">
        <div class="text">
            <a href="preventivo.php">PREVENTIVO</a>
        </div>
    </div>
    <div class="card">
        <img src="../../MEDIA/checklistfacil-mantenimiento-correctivo.jpg">
        <div class="text">
            <a href="correctivo.php">CORRECTIVO</a>
        </div>
    </div>
    <div class="card">
        <img src="../../MEDIA/los-descuentos-02.jpg">
        <div class="text">
            <a href="promociones.php">PROMOCIONES</a>
        </div>
    </div>
    <div>
        <img src="../../MEDIA/Captura de pantalla 2024-09-11 210049.png" width="100%" height="auto">
    </div>

    <div class="scrolling-buttons-container">
        <span id="scrolling-button-left"><img src="../../MEDIA/dos.png" width="50" height="50"></span>
        <span id="scrolling-button-right"><img src="../../MEDIA/pngwing.com.png" width="50" height="50"></span>
    </div>

    <div class="scrolling-container" id="product-carousel">
        <?php
        $sql = "SELECT foto, nombre, Precio FROM producto";
        $result = mysqli_query($conexion, $sql);
        while ($producto = mysqli_fetch_array($result)) {
            echo '<div class="scrolling-card">';
            echo '<img src="' . $producto['foto'] . '" width="200" height="200" alt="Foto de ' . $producto['nombre'] . '">';
            echo '<h2>' . $producto['nombre'] . '</h2>';
            echo '<h3>$' . $producto['Precio'] . ' &nbsp; <button class="circle-btn" data-nombre="' . $producto['nombre'] . '">+</button></h3>';
            echo '</div>';
        }
        ?>
    </div>

    <div id="quantity-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Selecciona la cantidad</h2>
            <input type="number" id="quantity-input" value="1" min="1">
            <button id="add-to-cart">Agregar al carrito</button>
        </div>
    </div>

    <script src="../../JS/cliente/script.js"></script>
</body>
<footer>
    <p class="footerrr">Josué Kadosh #19 &nbsp;&nbsp;&nbsp; José Steven #15 &nbsp;&nbsp;&nbsp; Diego Josué #7 &nbsp;&nbsp;&nbsp; Rodrigo Lemus #6 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright ©2024 K2H</p>
    <div class="social-icons">
        <a href="https://www.instagram.com" target="_blank">
            <img src="../../MEDIA/image-removebg-preview (2).png" alt="instagram" class="social-icon">
        </a>
        <a href="https://www.twitter.com" target="_blank">
            <img src="../../MEDIA/image-removebg-preview (3).png" alt="X(twitter)" class="social-iconn">
        </a>
        <a href="https://www.facebook.com" target="_blank">
            <img src="../../MEDIA/image-removebg-preview (4).png" alt="Facebook" class="social-icon">
        </a>
    </div>
</footer>
</html>
