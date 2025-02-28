<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Técnico main</title>
    <link rel="stylesheet" href="../../VIEW/tecnico/tecnicomain.css">
</head>
<body>

<header>
    <div>
        <img src="../../MEDIA/unnamed.png" alt="Botón" width="110" height="70">
        <a href="tecnicoperfil.php" class="btn-ver-perfil">Ver Perfil</a>
    </div>
</header>

<div class="banner-container">
    <img src="../../MEDIA/indexcarro.jpg" alt="Land Cruiser" class="banner-img">
    <div class="banner-text">
        <h1>TALLER <br> MECÁNICO <br> K2H</h1>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Técnico main</title>
    <link rel="stylesheet" href="../../VIEW/tecnico/tecnicomain.css">
</head>
<body>

<header>
    <div>
        <img src="../../MEDIA/unnamed.png" alt="Botón" width="110" height="70">
        <a href="tecnicoperfil.php" class="btn-ver-perfil">Ver Perfil</a>
    </div>
</header>

<div class="banner-container">
    <img src="../../MEDIA/indexcarro.jpg" alt="Land Cruiser" class="banner-img">
    <div class="banner-text">
        <h1>TALLER <br> MECÁNICO <br> K2H</h1>
    </div>
</div>

<div class="trabajospendientes">
    <img src="../../MEDIA/trabajospendientes.PNG" alt="" class="trabpendient">
</div>

<div class="citas">
    <!-- Aquí está el contenedor de las citas -->
</div>

<div class="citas2">
        <?php
        session_start();
        include("../conexion.php");

        $sql = "SELECT cliente.Id_Usuario, cliente.Nombre, cliente.Apellido, cliente.Numero_Telefono, preventivo.Cambio_Aire, preventivo.Cambio_Aceite, preventivo.Niveles_Fluidos, preventivo.Bateria, preventivo.Cambio_Frenos, preventivo.Modelo_Vehiculo, preventivo.Ruta_Imagen FROM cliente INNER JOIN preventivo ON cliente.Id_Usuario = preventivo.Id_Usuario";

        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $card = "card_" . $fila['Id_Usuario'];
                echo "
                <div class='card' id='$card'>
                    <h2>Preventivo</h2>
                    <figure>
                        <img src='../../.." . $fila['Ruta_Imagen'] . "' alt='Carro'> <!-- Imagen fija como ejemplo -->
                    </figure>
                    <div class='contenido'>
                        <h3>" . $fila['Nombre'] . " " . $fila['Apellido'] . "</h3>
                        <h4>" . $fila['Numero_Telefono'] . "</h4>
                        <div class='Datos'>
                            <strong>Tipo de servicio:</strong>
                            <ul>";
                if ($fila['Cambio_Aire']) {
                    echo "<li>Cambio de Filtro de Aire</li>";
                }
                if ($fila['Cambio_Aceite']) {
                    echo "<li>Cambio de Filtro de Aceite</li>";
                }
                if ($fila['Niveles_Fluidos']) {
                    echo "<li>Revisión de Niveles de Fluido</li>";
                }
                if ($fila['Bateria']) {
                    echo "<li>Cambio de Batería</li>";
                }
                if ($fila['Cambio_Frenos']) {
                    echo "<li>Cambio de Frenos</li>";
                }
                echo "
                    </ul>
                </div>
                <form action='eliminarpreventivo.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id_tecnico' value='".$fila['Id_Usuario']."'>
                                <button type='submit' onclick='return confirm(\"¿Estás seguro?\")'>Realizar pedido</button>
                            </form>
            </div>
        </div>";
        }
        } else {
            echo "No hay citas programadas.";
        }
        $conexion->close();
        ?>

</div>

<footer>
    <p class="footerrr">Josué Kadosh #19 &nbsp;&nbsp;&nbsp; José Steven #15
        &nbsp;&nbsp;&nbsp; Diego Josué #7 &nbsp;&nbsp;&nbsp; Rodrigo Lemus #6
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Copyright ©2024 K2H</p>
    <div class="social-icons">
        <a href="https://www.instagram.com" target="_blank">
            <img src="../../media/image-removebg-preview (2).png" alt="Instagram" class="social-icon">
        </a>
        <a href="https://www.twitter.com" target="_blank">
            <img src="../../media/image-removebg-preview (3).png" alt="Twitter" class="social-icon">
        </a>
        <a href="https://www.facebook.com" target="_blank">
            <img src="../../media/image-removebg-preview (4).png" alt="Facebook" class="social-icon">
        </a>
    </div>
</footer>

</body>
</html>