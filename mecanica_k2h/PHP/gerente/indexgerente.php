<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Mecánico K2H</title>
    <link rel="stylesheet" href="../../VIEW/gerente/stylesgerente.css">
</head>

<header>
    <div class="nosehed">
    <img src="../../MEDIA/logok2h.png" alt="logo" class="logoimg">    
    <a href="perfil_gerente.php " class="button gray" id="">Ver información</a>
</header>
</div>
</header>

<body>

        <style>
        /* Estilo para el contenedor del formulario */
        .overlay .popup {
            padding: 20px; /* Añadir espacio interno */
            border-radius: 8px; /* Bordes redondeados */
            background-color: #f9f9f9; /* Color de fondo más claro */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Sombra suave */
        }

        /* Estilo para los inputs de los formularios */
        .overlay form input[type="text"],
        .overlay form input[type="number"],
        .overlay form input[type="email"],
        .overlay form input[type="tel"],
        .overlay form input[type="date"],
        .overlay form input[type="file"] {
            width: 100%; /* Hacer que los inputs ocupen el 100% del ancho */
            padding: 12px; /* Añadir espacio interno */
            margin: 10px 0; /* Espacio entre inputs */
            border: 1px solid #ccc; /* Borde suave */
            border-radius: 4px; /* Bordes redondeados */
            font-size: 16px; /* Tamaño de fuente más grande */
        }

        /* Estilo para el botón de guardar */
        .overlay form button {
            width: 100%; /* Hacer que el botón ocupe el 100% del ancho */
            padding: 12px; /* Añadir espacio interno */
            border: none; /* Sin borde */
            border-radius: 4px; /* Bordes redondeados */
            font-size: 16px; /* Tamaño de fuente más grande */
            cursor: pointer; /* Cambiar el cursor al pasar sobre el botón */
        }

        /* Cambiar color del botón en hover */
        .overlay form button:hover {
            background-color: #0056b3; /* Cambiar a un azul más oscuro */
            color: white; /* Cambiar texto a blanco */
        }


        </style>

    <!-- Banner principal -->
    <div class="banner-container">
        <img src="../../MEDIA/indexcarro.jpg" alt="Land Cruiser" class="banner-img">

        <div class="banner-text">
            <img src="../../MEDIA/logok2h.png" alt="nose">
            <h1>TALLER MECÁNICO<br>K2H</h1>
        </div>
        
        <div class="banner-buttons">
            <a href="#" class="button blue" id="tecnicos-btn" onclick="mostrarTecnicos()">Técnicos</a>
            <a href="#" class="button yellow" id="productos-btn" onclick="mostrarProductos()">Productos</a>
        </div>
        
    </div>

    <!-- Sección de Técnicos en Servicio -->

        <div class="image-wrapper">
            <img src="../../MEDIA/Diseño sin título (1).png" alt="Técnicos en Servicio" class="service-img">
        </div>


    <!-- Sección de Técnicos Disponibles -->
    <div class="container">
        <div class="banner">
            <img src="../../MEDIA/tecnico-br3ebpwj1m82zyrf.jpg" alt="Técnicos Disponibles" class="banner-img">
            <div class="banner-text">
                <h1>TÉCNICOS DISPONIBLES</h1>
                <a href="#" class="banner-button">VER MÁS</a>
            </div>
        </div>

        <!-- Sección de Técnicos Activos -->
    <div class="tecnicos-activos">
    <h2>TÉCNICOS ACTIVOS</h2>
    <br><br>

    <?php 
    include("../conexion.php"); // Conecta a la base de datos

    // Consulta para obtener técnicos activos (donde Activo = 1)
    $sql = "SELECT Id_Usuario, Nombre, Apellido FROM tecnico WHERE Activo = 1";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Bucle para mostrar cada técnico activo en una tarjeta
        while($row = $result->fetch_assoc()) {
            echo "<div class='tecnico-card'>";
            echo "<p><strong>TÉCNICO ID: " . $row['Id_Usuario'] . "</strong></p> <br>";
            echo "<p>Nombre: " . $row['Nombre'] . "<br> " . $row['Apellido'] . "</p> ";
            echo "<br><br>";
            echo "</div>";
        }
    } else {
        echo "<p>No hay técnicos activos en este momento.</p>";
    }
    ?>
    <br><br><br>
</div>
            
        </div>
    </div>
    <div class="image-wrapper">
        <img src="../../MEDIA/Diseño sin título.png" alt="Técnicos en Servicio" class="service-img">
    </div>

    <div class="containerr">
        <div class="banner">
            <img src="../../MEDIA/partes_plasticas_limpieza_carro_ya_.webp" alt="Técnicos Disponibles" class="banner-img">
            <div class="banner-text">
                <h1>PRODUCTOS DISPONIBLES</h1>
                <a href="#" class="banner-button">VER MÁS</a>
            </div>
        </div>

        <!-- Sección de Técnicos Activos -->
        <div class="productos-disponibles">
            <h2>Productos Baratos</h2>
            <br><br>
    <?php 
    include("../conexion.php"); // Conecta a la base de datos

    // Consulta para obtener técnicos activos (donde Activo = 1)
    $sql = "SELECT Id_Producto, Precio, Cantidad FROM producto WHERE Precio <= 130.00";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Bucle para mostrar cada técnico activo en una tarjeta
        while($row = $result->fetch_assoc()) {
            echo "<div class='tecnico-card'>";
            echo "<p><strong>TÉCNICO ID: " . $row['Id_Producto'] . "</strong></p> <br>";
            echo "<p>Precio: " . $row['Precio'] . "</p> <br> " ;
            echo "<p>Cantidad: " . $row['Cantidad'] . "</p>";
            echo "<br><br>";
            echo "</div>";
        }
    } else {
        echo "<p>No hay técnicos activos en este momento.</p>";
    }
    ?>
    <br><br><br>
</div>
            
    </div>


    <div id="tecnicosOverlay" class="overlay">
    <div class="popup">
        <span class="close-btn" onclick="cerrarPopup('tecnicosOverlay')">&times;</span>
        <h2>Técnicos </h2>
        
        <!-- Agregamos el botón y formulario para nuevo técnico -->
        <button onclick="mostrarFormularioTecnico()" class="button blue">Agregar Técnico</button>
        
        <!-- Formulario para agregar técnico (inicialmente oculto) -->
        <div id="formularioTecnico" style="display: none;">
            <form action="agregar_tecnico.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="tel" name="telefono" placeholder="Número de Teléfono" required>
                <input type="text" name="contraseña" placeholder="Contraseña" required>
                <input type="number" name="Activo" placeholder="Activo" required>
                <button type="submit" class="button blue">Guardar Técnico</button>
            </form>
        </div>

        <div id="tecnicosContent">
            <?php 
            include("../conexion.php");
            $sql = "SELECT Id_Usuario, Nombre, Apellido, Correo, Numero_Telefono, Activo, contraseña FROM tecnico";
            $result = $conexion->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Teléfono</th><th>Contraseña</th><th>Activo</th><th>Acciones</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['Id_Usuario']."</td>";
                    echo "<td>".$row['Nombre']."</td>";
                    echo "<td>".$row['Apellido']."</td>";
                    echo "<td>".$row['Correo']."</td>";
                    echo "<td>".$row['Numero_Telefono']."</td>";
                    echo "<td>".$row['contraseña']."</td>";
                    echo "<td>".$row['Activo']."</td>";
                    
                    echo "<td>
                            <form action='eliminar_tecnico.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id_tecnico' value='".$row['Id_Usuario']."'>
                                <button type='submit' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No hay técnicos registrados";
            }
            ?>
        </div>
    </div>

    
</div>

<div id="productosOverlay" class="overlay">
    <div class="popup">
        <span class="close-btn" onclick="cerrarPopup('productosOverlay')">&times;</span>
        <h2>Productos Disponibles</h2>

        <!-- Formulario para agregar producto (inicialmente oculto) -->
        <button onclick="mostrarFormularioProducto()" class="button yellow">Agregar Producto</button>

        <div id="formularioProducto" style="display: none;">
            <form action="agregar_producto.php" method="POST", enctype="multipart/form-data">
                <input type="text" name="Id_Producto" placeholder="Id del producto" required>
                <input type="text" name="Nombre" placeholder="Nombre producto" required>
                <input type="number" name="Precio" placeholder="Precio" required>
                <input type="number" name="Promocion" placeholder="Promocion" required>
                <input type="date" name="fecha_produccion" placeholder="Fecha de Producción" required>
                <input type="date" name="fecha_vencimiento" placeholder="Fecha de Vencimiento" required>
                <input type="number" name="Cantidad" placeholder="Cantidad" required>
                <input type="file" name="foto" placeholder="foto" required>

                <button type="submit" class="button yellow">Guardar Producto</button>
            </form>
        </div>

        <!-- Dentro del div productosContent -->
<div id="productosContent">
    <?php 
    include("../conexion.php");
    // Modificamos la consulta para incluir la columna foto
    $sql = "SELECT Id_Producto, Nombre, Precio, Promocion, Fecha_Produccion, Fecha_Vencimiento, Cantidad, foto FROM producto";
    $result = $conexion->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>";
        // Agregamos la columna Imagen al encabezado
        echo "<tr><th>ID</th><th>Imagen</th><th>Precio</th><th>Nombre</th><th>Promocion</th><th>Produccion</th><th>Vencimiento</th><th>Cantidad</th><th>Acciones</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['Id_Producto']."</td>";
            // Agregamos la celda con la imagen
            echo "<td><img src='".$row['foto']."' alt='Producto' style='width: 100px; height: auto;'></td>";
            echo "<td>".$row['Precio']."</td>";
            echo "<td>".$row['Nombre']."</td>";
            echo "<td>".$row['Promocion']."</td>";
            echo "<td>".$row['Fecha_Produccion']."</td>";
            echo "<td>".$row['Fecha_Vencimiento']."</td>";
            echo "<td>".$row['Cantidad']."</td>";
            echo "<td>
                    <form action='eliminar_producto.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='id_cant' value='".$row['Id_Producto']."'>
                        <button type='submit' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay Productos registrados";
    }
    ?>
</div>
        
    </div>
</div>


    <!-- Archivo JS externo -->
    <script src="../../JS/gerente/script.js"></script>
</body>
<footer>
    <p class="footerrr">Josué Kadosh #19 &nbsp;&nbsp;&nbsp; José Steven #15
        &nbsp;&nbsp;&nbsp;Diego Josué #7 &nbsp;&nbsp;&nbsp; Rodrigo Lemus #6     
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright ©2024 K2H</p>

    <!-- Agrupamos las imágenes de redes sociales en un div -->
    <div class="social-icons">
        <a href="https://www.instagram.com" target="_blank">
            <img src="../../MEDIA/image-removebg-preview (2).png" alt="instagram" class="social-icon">
        </a>
        
        <!-- Enlace a Twitter/X -->
        <a href="https://www.twitter.com" target="_blank">
            <img src="../../MEDIA/images.png" alt="X(twitter)" class="social-iconn">
        </a>

        <!-- Enlace a Facebook -->
        <a href="https://www.facebook.com" target="_blank">
            <img src="../../MEDIA/image-removebg-preview (4).png" alt="Facebook" class="social-icon">
        </a>
    </div>
</footer>
</html>


