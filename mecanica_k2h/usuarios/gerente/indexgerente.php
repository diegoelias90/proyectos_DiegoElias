<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Mecánico K2H</title>
    <link rel="stylesheet" href="style/stylesgerente.css">
</head>

<header>
    <div class="nosehed">
    <img src="../../media/logok2h.png" alt="logo" class="logoimg">    
    <a href="http://localhost/mesa6tak2h/usuarios/gerente/perfil_gerente.php#" class="button gray" id="">Ver información</a>
</header>
</div>
</header>

<body>

    <!-- Banner principal -->
    <div class="banner-container">
        <img src="../../media/indexcarro.jpg" alt="Land Cruiser" class="banner-img">

        <div class="banner-text">
            <img src="../../media/logok2h.png" alt="nose">
            <h1>TALLER MECÁNICO<br>K2H</h1>
        </div>
        
        <div class="banner-buttons">
            <a href="#" class="button blue" id="tecnicos-btn" onclick="mostrarTecnicos()">Técnicos</a>
            <a href="#" class="button yellow" id="productos-btn" onclick="mostrarProductos()">Productos</a>
        </div>
        
    </div>

    <!-- Sección de Técnicos en Servicio -->

        <div class="image-wrapper">
            <img src="../../media/Diseño sin título (1).png" alt="Técnicos en Servicio" class="service-img">
        </div>


    <!-- Sección de Técnicos Disponibles -->
    <div class="container">
        <div class="banner">
            <img src="../../media/tecnico-br3ebpwj1m82zyrf.jpg" alt="Técnicos Disponibles" class="banner-img">
            <div class="banner-text">
                <h1>TÉCNICOS DISPONIBLES</h1>
                <a href="#" class="banner-button">VER MÁS</a>
            </div>
        </div>

        <!-- Sección de Técnicos Activos -->
        <div class="tecnicos-activos">
            <h2>TÉCNICOS ACTIVOS</h2>
            <br><br>
            <div class="tecnico-card">
                <p><strong>TÉCNICO 1</strong></p>
                <p>Gabriela Hernández ID: 978</p>

                <br><br><br>
            </div>
            <br><br><br>
            <div class="tecnico-card">
                <p><strong>TÉCNICO 2</strong></p>
                <p>Luis Ramírez ID: 9979</p>

                <br><br><br>
            </div>
            <br><br><br>
            <div class="tecnico-card">
                <p><strong>TÉCNICO 3</strong></p>
                <p>Miguel Martínez ID: 980</p>

                <br><br><br>
            </div>
        </div>
    </div>
    <div class="image-wrapper">
        <img src="../../media/Diseño sin título.png" alt="Técnicos en Servicio" class="service-img">
    </div>

    <div class="containerr">
        <div class="banner">
            <img src="../../media/partes_plasticas_limpieza_carro_ya_.webp" alt="Técnicos Disponibles" class="banner-img">
            <div class="banner-text">
                <h1>PRODUCTOS DISPONIBLES</h1>
                <a href="#" class="banner-button">VER MÁS</a>
            </div>
        </div>

        <!-- Sección de Técnicos Activos -->
        <div class="productos-disponibles">
            <h2>Productos disponibles</h2>
            <br><br>
            <div class="producto-card">
                <p><strong>PRODUCTO 1</strong></p>
                <p>Alfombra_Carro ID: 10000</p>
                <br><br><br>
            </div>
            <br><br><br>
            <div class="producto-card">
                <p><strong>PRODUCTO 2</strong></p>
                <p>Funda_Asientos ID: 10001</p>

                <br><br><br>
            </div>
            <br><br><br>
            <div class="producto-card">
                <p><strong>PRODUCTO 3</strong></p>
                <p>Gato_Coche ID: 10002</p>

                <br><br><br>
            </div>
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
                <button type="submit" class="button blue">Guardar Técnico</button>
            </form>
        </div>

        <div id="tecnicosContent">
            <?php 
            include("../../conexion.php");
            $sql = "SELECT Id_Usuario, Nombre, Apellido, Correo, Numero_Telefono, Activo FROM tecnico";
            $result = $conexion->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Teléfono</th><th>Activo</th><th>Acciones</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['Id_Usuario']."</td>";
                    echo "<td>".$row['Nombre']."</td>";
                    echo "<td>".$row['Apellido']."</td>";
                    echo "<td>".$row['Correo']."</td>";
                    echo "<td>".$row['Numero_Telefono']."</td>";
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
            <form action="agregar_producto.php" method="POST">
                <input type="text" name="Id_Producto" placeholder="Id del producto" required>
                <input type="number" name="Precio" placeholder="Precio" required>
                <input type="number" name="Promocion" placeholder="Promocion" required>
                <input type="date" name="fecha_produccion" placeholder="Fecha de Producción" required>
                <input type="date" name="fecha_vencimiento" placeholder="Fecha de Vencimiento" required>
                <input type="number" name="Cantidad" placeholder="Cantidad" required>

                <button type="submit" class="button yellow">Guardar Producto</button>
            </form>
        </div>

        <div id="productosContent">
            <?php 
            include("../../conexion.php");
            $sql = "SELECT Id_Producto, Precio, Promocion, Fecha_Produccion, Fecha_Vencimiento, Cantidad FROM producto";
            $result = $conexion->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Precio</th><th>Promocion</th><th>Produccion</th><th>Vencimiento</th><th>Cantidad</th><th>Acciones</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['Id_Producto']."</td>";
                    echo "<td>".$row['Precio']."</td>";
                    echo "<td>".$row['Promocion']."</td>";
                    echo "<td>".$row['Fecha_Produccion']."</td>";
                    echo "<td>".$row['Fecha_Vencimiento']."</td>";
                    echo "<td>".$row['Cantidad']."</td>";
                    echo "<td>
                            <form action='eliminar_producto.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id_producto' 'value='".$row['Id_Producto']."'>
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
    <script src="script.js"></script>
</body>
<footer>
    <p class="footerrr">Josué Kadosh #19 &nbsp;&nbsp;&nbsp; José Steven #15
        &nbsp;&nbsp;&nbsp;Diego Josué #7 &nbsp;&nbsp;&nbsp; Rodrigo Lemus #6     
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright ©2024 K2H</p>

    <!-- Agrupamos las imágenes de redes sociales en un div -->
    <div class="social-icons">
        <a href="https://www.instagram.com" target="_blank">
            <img src="../../media/image-removebg-preview (2).png" alt="instagram" class="social-icon">
        </a>
        
        <!-- Enlace a Twitter/X -->
        <a href="https://www.twitter.com" target="_blank">
            <img src="../../media/images.png" alt="X(twitter)" class="social-iconn">
        </a>

        <!-- Enlace a Facebook -->
        <a href="https://www.facebook.com" target="_blank">
            <img src="../../media/image-removebg-preview (4).png" alt="Facebook" class="social-icon">
        </a>
    </div>
</footer>
</html>


