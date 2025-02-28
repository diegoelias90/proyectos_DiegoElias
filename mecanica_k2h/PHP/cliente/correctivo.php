<?php
include("../conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asignar valores de los checkboxes, si no están seleccionados, se establece en 0
    $Sistema_Frenos = isset($_POST['Sistema_Frenos']) ? 1 : 0;
    $Bomba_Agua = isset($_POST['Bomba_Agua']) ? 1 : 0;
    $Sistema_Electrico = isset($_POST['Sistema_Electrico']) ? 1 : 0;
    $Sistema_Direccion = isset($_POST['Sistema_Direccion']) ? 1 : 0;
    $Sistema_Transmision = isset($_POST['Sistema_Transmision']) ? 1 : 0;
    $Modelo_Vehiculo = $_POST['Modelo_Vehiculo']; // Capturar el modelo del vehículo
    $imagen = '';

    // Manejo de la imagen
    if (isset($_FILES["imagen"])) {
        $file = $_FILES["imagen"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/img/";

        // Verificar si la carpeta existe y crearla si no
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        // Verificar si el archivo es una imagen válida
        if ($tipo != "image/jpg" && $tipo != "image/jpeg" && $tipo != "image/png" && $tipo != "image/gif") {
            echo "Error, el archivo no es una imagen";
        } else {
            // Crear un nombre único para evitar sobrescribir archivos
            $nombre_unico = uniqid() . "_" . $nombre;
            $ruta_destino = $carpeta . $nombre_unico;

            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($ruta_provisional, $ruta_destino)) {
                $imagen = "/img/" . $nombre_unico; // Ruta relativa para la base de datos

                // Inserta los datos en la base de datos
                $sql = "INSERT INTO correctivo (Sistema_Frenos, Bomba_Agua, Sistema_Electrico, Sistema_Direccion, Sistema_Transmision, Modelo_Vehiculo, Ruta_Imagen) 
                        VALUES ('$Sistema_Frenos', '$Bomba_Agua', '$Sistema_Electrico', '$Sistema_Direccion', '$Sistema_Transmision', '$Modelo_Vehiculo', '$imagen')";

                if ($conexion->query($sql) === TRUE) {
                    // Redirige después de la inserción exitosa
                    header("Location: indexcliente.php");
                    exit();
                } else {
                    echo "Error en la inserción: " . $sql . "<br>" . $conexion->error;
                }
            } else {
                echo "Error al subir la imagen.";
            }
        }
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Correctivos</title>
  <link rel="stylesheet" href="../../VIEW/cliente/correctivo.css">
  <style>
    .service {
      display: flex;
      align-items: center;
      padding: 10px;
      border: 2px solid #ccc;
      margin-bottom: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s, border-color 0.3s;
    }
    .service input[type="checkbox"] {
      display: none;
    }
    .service label {
      display: flex;
      align-items: center;
      cursor: pointer;
      width: 100%;
    }
    .service-info {
      margin-left: 10px;
    }
    .service input[type="checkbox"]:checked + label {
      background-color: #cce5ff;
      border-color: #007bff;
    }
  </style>
</head>
<body>
  <header>
    <h1>Correctivos</h1>
    <span class="close-btn"><a href="indexcliente.php">X</a></span>
  </header>
  <main>
    <form action="correctivo.php" method="POST" enctype="multipart/form-data">
      <section class="service" id="service1">
        <input type="checkbox" name="Sistema_Frenos" value="1" id="checkbox1">
        <label for="checkbox1">
          <img src="../../MEDIA/frenos.jpg" alt="Sistema de frenos">
          <div class="service-info">
            <h2>Reparación de sistema de frenos</h2>
            <p>Seguridad ante todo con frenos confiables que te brindan tranquilidad en cada frenada.</p>
            <h3>$59.99</h3>
          </div>
        </label>
      </section>
      <section class="service" id="service2">
        <input type="checkbox" name="Bomba_Agua" value="1" id="checkbox2">
        <label for="checkbox2">
          <img src="../../MEDIA/bagua.jpg" alt="Bomba de agua">
          <div class="service-info">
            <h2>Cambio de bomba de agua</h2>
            <p>Manten tu motor a la temperatura perfecta y evita sobrecalentamientos.</p>
            <h3>$59.99</h3>
          </div>
        </label>
      </section>
      <section class="service" id="service3">
        <input type="checkbox" name="Sistema_Electrico" value="1" id="checkbox3">
        <label for="checkbox3">
          <img src="../../MEDIA/electro.jpg" alt="Sistema eléctrico">
          <div class="service-info">
            <h2>Reparación del sistema eléctrico</h2>
            <p>Diagnóstico y reparación rápida para garantizar que todo funcione como nuevo.</p>
            <h3>$59.99</h3>
          </div>
        </label>
      </section>
      <section class="service" id="service4">
        <input type="checkbox" name="Sistema_Direccion" value="1" id="checkbox4">
        <label for="checkbox4">
          <img src="../../MEDIA/minovia.png" alt="Sistema de dirección">
          <div class="service-info">
            <h2>Reparación del sistema de dirección</h2>
            <p>Asegura el control total de tu auto con una dirección precisa y suave.</p>
            <h3>$59.99</h3>
          </div>
        </label>
      </section>
      <div class="model-input">
        <h3>Modelo específico del vehículo</h3>
        <input type="text" name="Modelo_Vehiculo" placeholder="Ingrese el modelo del vehículo" required>
      </div>
      <div class="model-input">
        <h3>Imagen del vehículo</h3>
        <input type="file" accept="image/*" id="imagen" name="imagen" required>
      </div>
      <div class="boton-container">
        <button type="submit" class="boton-confirmar">Confirmar</button>
      </div>
    </form>
  </main>
</body>
</html>