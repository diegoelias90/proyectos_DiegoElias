<?php
session_start();
include("../conexion.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['Nombre'])) {
    die("Error: No se ha iniciado sesión");
}

$Nombre = $_SESSION['Nombre'];
$sql = "SELECT Id_Usuario FROM cliente WHERE Nombre='$Nombre'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $cliente = $result->fetch_assoc();
    $idCliente = $cliente['Id_Usuario'];
} else {
    die("Error: Cliente no encontrado");
}

// Manejar la eliminación de un producto
if (isset($_POST['eliminar'])) {
    $idPedido = intval($_POST['Id_Pedido']);

    // Consulta para obtener la cantidad del producto relacionado
    $query = "SELECT Id_Producto, Cantidad FROM producto_pedido WHERE Id_Pedido = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "i", $idPedido);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $pedido = mysqli_fetch_assoc($result);

    if ($pedido) {
        $idProducto = $pedido['Id_Producto'];
        $cantidadEliminar = $pedido['Cantidad'];

        // Aumentar la cantidad en la tabla producto
        $updateStockQuery = "UPDATE producto SET Cantidad = Cantidad + ? WHERE Id_Producto = ?";
        $stmt = mysqli_prepare($conexion, $updateStockQuery);
        mysqli_stmt_bind_param($stmt, "ii", $cantidadEliminar, $idProducto);
        mysqli_stmt_execute($stmt);

        // Eliminar el pedido
        $deleteQuery = "DELETE FROM producto_pedido WHERE Id_Pedido = ?";
        $stmt = mysqli_prepare($conexion, $deleteQuery);
        mysqli_stmt_bind_param($stmt, "i", $idPedido);
        mysqli_stmt_execute($stmt);
    }
}

// Manejar la confirmación de pedidos
if (isset($_POST['confirmar'])) { // Cambiado a minúsculas
    $updateConfirmadoQuery = "UPDATE producto_pedido SET Confirmado = 1 WHERE Id_Usuario = ? AND Confirmado = 0";
    $stmt = mysqli_prepare($conexion, $updateConfirmadoQuery);
    mysqli_stmt_bind_param($stmt, "i", $idCliente);
    mysqli_stmt_execute($stmt);
}

// Obtener los pedidos del cliente (sin el filtro de Id_Usuario para prueba)
$query = "SELECT pp.Id_Pedido, p.nombre, pp.Cantidad, pp.Confirmado, p.Precio 
          FROM producto_pedido pp
          JOIN producto p ON pp.Id_Producto = p.Id_Producto
          WHERE pp.Confirmado = 0";

$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Comprobar si hay productos en el carrito
if (mysqli_num_rows($result) === 0) {
    $noProductsMessage = "No tienes productos en el carrito.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: black;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        header {
            width: 100%;
            padding: 10px 0;
            background-color: black;
            color: white;
            text-align: center;
        }

        .cart-items {
            width: 80%;
            max-width: 600px;
            margin-top: 20px;
        }

        .cart-item {
            background-color: black;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .cart-item h2 {
            font-size: 18px;
            margin: 0 0 10px;
            color: white;
        }

        .cart-item p {
            font-size: 16px;
            margin: 0 0 10px;
            color: white;
        }

        .cart-item form {
            display: inline;
        }

        button {
            background-color: gray;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .confirm-button {
            margin-top: 20px;
            padding: 10px 20px;
        }

        footer {
            width: 100%;
            padding: 10px 0;
            background-color: black;
            color: white;
            text-align: center;
            margin-top: auto;
        }

        .no-products-message {
            font-size: 16px;
            color: #333;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <img src="../../MEDIA/unnamed.png" alt="Botón" width="110" height="70">
        <h1>Carrito de Compras</h1>
    </header>

    <div class="cart-items">
        <?php if (isset($noProductsMessage)): ?>
            <p class="no-products-message"><?php echo $noProductsMessage; ?></p>
        <?php else: ?>
            <?php while ($pedido = mysqli_fetch_assoc($result)): ?>
                <div class="cart-item">
                    <h2><?php echo htmlspecialchars($pedido['nombre']); ?></h2>
                    <p>Cantidad: <?php echo htmlspecialchars($pedido['Cantidad']); ?></p>
                    <p>Precio por unidad: <?php echo htmlspecialchars($pedido['Precio']); ?> $</p>
                    <p>Total: <?php echo htmlspecialchars($pedido['Precio'] * $pedido['Cantidad']); ?> $</p>
                    <form method="POST">
                        <input type="hidden" name="Id_Pedido" value="<?php echo htmlspecialchars($pedido['Id_Pedido']); ?>">
                        <button type="submit" name="eliminar">Eliminar Producto</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <form method="POST">
        <button type="submit" name="confirmar" class="confirm-button">Confirmar Pedidos</button>
    </form>

    <!-- Botón para regresar a index.php -->
    <form method="GET" action="indexcliente.php">
        <button type="submit" class="confirm-button">Regresar al Inicio</button>
    </form>
    
    <footer>
        <p>&copy; 2024 K2H</p>
    </footer>
</body>
</html>
