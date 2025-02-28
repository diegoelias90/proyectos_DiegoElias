<?php
session_start();
include("../conexion.php");

if (!isset($_SESSION['Nombre'])) {
    die("Error: No se ha iniciado sesión");
}

$Nombre = $_SESSION['Nombre'];
$sql = "SELECT Id_Usuario FROM cliente WHERE Nombre='$Nombre'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $cliente = $result->fetch_assoc();
    $Id_Usuario = $cliente['Id_Usuario'];
} else {
    die("Error: Cliente no encontrado");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asignar valores de los checkboxes, si no están seleccionados, se establece en 0
    $Cambio_Aire = isset($_POST['Cambio_Aire']) ? 1 : 0;
    $Cambio_Aceite = isset($_POST['Cambio_Aceite']) ? 1 : 0;
    $Niveles_Fluidos = isset($_POST['Niveles_Fluidos']) ? 1 : 0;
    $Bateria = isset($_POST['Bateria']) ? 1 : 0;
    $Cambio_Frenos = isset($_POST['Cambio_Frenos']) ? 1 : 0;
    $Modelo_Vehiculo = $_POST['Modelo_Carro']; // Capturar el modelo del carro y guardarlo como 'Modelo_Vehiculo'
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
                $sql = "INSERT INTO preventivo (Id_Usuario, Cambio_Aire, Cambio_Aceite, Niveles_Fluidos, Bateria, Cambio_Frenos, Modelo_Vehiculo, Ruta_Imagen) 
                        VALUES ('$Id_Usuario', '$Cambio_Aire', '$Cambio_Aceite', '$Niveles_Fluidos', '$Bateria', '$Cambio_Frenos', '$Modelo_Vehiculo', '$imagen')";

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
  <title>Preventivos</title>
  <link rel="stylesheet" href="../../VIEW/cliente/preventivocs.css">
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
    <h1>Preventivos</h1>
    <span class="close-btn"><a href="../indexcliente.php">X</a></span>
  </header>
  <main>
  <form action="preventivo.php" method="POST" enctype="multipart/form-data">
    <section class="service" id="service1">
      <input type="checkbox" name="Cambio_Aire" value="1" id="checkbox1">
      <label for="checkbox1">
        <img src="../../MEDIA/filtroaire.jpg" alt="Cambio de filtro de aire">
        <div class="service-info">
          <h2>Cambio de filtro de aire</h2>
          <p>Reemplazamos el filtro de aire de tu motor para garantizar una entrada de aire limpia y mejorar la eficiencia de combustible, además de proteger los componentes internos del motor.</p>
          <h3>$29.99</h3>
        </div>
      </label>
    </section>
    <section class="service" id="service2">
      <input type="checkbox" name="Cambio_Aceite" value="1" id="checkbox2">
      <label for="checkbox2">
        <img src="../../MEDIA/bateria.jpg" alt="Revisión de batería">
        <div class="service-info">
          <h2>Revisión de batería</h2>
          <p>Verificamos el estado de carga y la capacidad de tu batería para asegurar que funcione correctamente y prevenir fallos inesperados.</p>
          <h3>$29.99</h3>
        </div>
      </label>
    </section>
    <section class="service" id="service3">
      <input type="checkbox" name="Niveles_Fluidos" value="1" id="checkbox3">
      <label for="checkbox3">
        <img src="../../MEDIA/aceite.jpg" alt="Cambio de filtro de aceite">
        <div class="service-info">
          <h2>Cambio de filtro de aceite</h2>
          <p>Cambiamos el filtro de aceite para eliminar impurezas y asegurar una correcta lubricación del motor, extendiendo su vida útil y rendimiento.</p>
          <h3>$29.99</h3>
        </div>
      </label>
    </section>
    <section class="service" id="service4">
      <input type="checkbox" name="Bateria" value="1" id="checkbox4">
      <label for="checkbox4">
        <img src="../../MEDIA/frenos.jpg" alt="Revisión de frenos">
        <div class="service-info">
          <h2>Revisión de frenos</h2>
          <p>Inspeccionamos el estado de las pastillas, discos y líquido de frenos, garantizando que el sistema funcione de manera segura y eficiente.</p>
          <h3>$29.99</h3>
        </div>
      </label>
    </section>
    <section class="service" id="service5">
      <input type="checkbox" name="Cambio_Frenos" value="1" id="checkbox5">
      <label for="checkbox5">
        <img src="../../MEDIA/liquidos.jpg" alt="Verificación de niveles de fluidos">
        <div class="service-info">
          <h2>Verificación de niveles de fluidos</h2>
          <p>Revisamos los niveles de aceite, refrigerante, líquido de frenos y otros fluidos esenciales para mantener el buen funcionamiento del vehículo.</p>
          <h3>$29.99</h3>
        </div>
      </label>
      </section>
      <div class="form-container">
  <div class="model-input">
    <h3>Modelo específico del carro</h3>
    <input type="text" name="Modelo_Carro" placeholder="Ingrese el modelo del carro" required>
  </div>

  <div class="upload-input">
    <h3>Imagen del vehículo</h3>
    <input type="file" accept="image/*" id="imagen" name="imagen" required>
  </div>

  <div class="button-container">
    <button type="submit" class="boton-confirmar">Confirmar</button>
  </div>
</div>
  </main>
</body>
</html>