<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compra</title>
    <link rel="stylesheet" href="../css/carro.css">
</head>
<body>
    <header>
        <h1>Carrito de compra</h1>
        <span class="close-btn"><a href="../indexcliente.php">X</a></span>
    </header>
    <main>
        <div class="product">
            <img src="../imagenes/aceite.jpg" alt="Aceite Pennzoil 1.25Gal">
            <div class="product-info">
                <h3>Aceite Pennzoil 1.25Gal</h3>
                <p>Precio: $29.99</p>
            </div>
        </div>
        <div class="product">
            <img src="../imagenes/asiento.jpg" alt="Funda de asientos personalizada">
            <div class="product-info">
                <h3>Funda de asientos personalizada</h3>
                <p>Precio: $29.99</p>
            </div>
        </div>
        <div class="product">
            <img src="../imagenes/messi.jpg" alt="Stickers personalizables">
            <div class="product-info">
                <h3>Stickers personalizables</h3>
                <p>Precio: $3.99 C/U</p>
            </div>
        </div>
        <div class="model-input">
            <h3>Modelo especifico del carro</h3>
            <input type="text" placeholder="Ingrese el modelo del carro">
        </div>
        <div class="model-input">
            <h3>Modelo especifico del carro con su imagen</h3>
            <input type="text" placeholder="Ingrese el modelo del carro">
            <input type="file" accept="image/*" id="imagen" name="imagen">
            <label for="imagen">Subir imagen</label>
          </div>
        <div class="total">
            <h2>SUBTOTAL(3 PRODUCTOS): $63.97</h2>
            <button class="confirm-button">Confirmar pedido</button>
        </div>
    </main>
    <script src="../java/carro.js"></script>
</body>
</html>