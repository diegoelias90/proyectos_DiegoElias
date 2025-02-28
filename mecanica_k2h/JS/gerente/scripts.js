        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('overlay');
            const popup = document.getElementById('popup');
            const popupContent = document.getElementById('popupContent');
            const closePopup = document.getElementById('closePopup');
            const tecnicosBtn = document.getElementById('tecnicos-btn');
        
            tecnicosBtn.addEventListener('click', function(e) {
                e.preventDefault();
                popupContent.innerHTML = `
                      
                `;
                overlay.style.display = 'block';
            });
        
            closePopup.addEventListener('click', function() {
                overlay.style.display = 'none';
            });
        
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    overlay.style.display = 'none';
                }
            });
        });
        



    document.addEventListener('DOMContentLoaded', function() {
        const overlay = document.getElementById('overlayy');
        const popup = document.getElementById('popupp');
        const popupContent = document.getElementById('popupContentt');
        const closePopup = document.getElementById('closePopupp');
        const tecnicosBtn = document.getElementById('productos-btn');
        const borrarProductoBtn = document.getElementById('Borrarpop');
        const agregarProductoBtn = document.getElementById('Agregarpop')
    
        tecnicosBtn.addEventListener('click', function(e) {
            e.preventDefault();
            popupContentt.innerHTML = `
                <div class="productos-disponibles">
                    <h2>Productos Disponibles</h2>
                    <div class="producto-card">
                        <p>Nombre:<br> Alfombra_Carro</p>
                        <p>ID: <br> 10000</p>
                        <p>Precio: <br>100$</p>
                        <p>Promocion: <br>0.1</p>
                        <p>Fecha_Producción: <br>2024-07-01</p>
                        <p>Fecha_Vencimiento: <br>2025-07-01 </p>
                        <p>Cantidad: <br>200</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Funda_Asientos</p>
                        <p>ID: <br> 10001</p>
                        <p>Precio: <br>150$</p>
                        <p>Promocion: <br>0.15</p>
                        <p>Fecha_Producción: <br>2024-07-02</p>
                        <p>Fecha_Vencimiento: <br>2025-07-02 </p>
                        <p>Cantidad: <br>130</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Gato_Coche</p>
                        <p>ID: <br> 10002</p>
                        <p>Precio: <br>120$</p>
                        <p>Promocion: <br>0.1</p>
                        <p>Fecha_Producción: <br>2024-07-03</p>
                        <p>Fecha_Vencimiento: <br>2025-07-03 </p>
                        <p>Cantidad: <br>325</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Limpiaparabrisas</p>
                        <p>ID: <br> 10003</p>
                        <p>Precio: <br>130$</p>
                        <p>Promocion: <br>0.2</p>
                        <p>Fecha_Producción: <br>2024-07-04</p>
                        <p>Fecha_Vencimiento: <br>2025-07-04 </p>
                        <p>Cantidad: <br>180</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Autoradio</p>
                        <p>ID: <br> 10004</p>
                        <p>Precio: <br>110$</p>
                        <p>Promocion: <br>0.1</p>
                        <p>Fecha_Producción: <br>2024-07-05</p>
                        <p>Fecha_Vencimiento: <br>2025-07-05 </p>
                        <p>Cantidad: <br>100</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Tapacubos</p>
                        <p>ID: <br> 10005</p>
                        <p>Precio: <br>160$</p>
                        <p>Promocion: <br>0.05</p>
                        <p>Fecha_Producción: <br>2024-07-06</p>
                        <p>Fecha_Vencimiento: <br>2025-07-06 </p>
                        <p>Cantidad: <br>200</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Amortiguadores</p>
                        <p>ID: <br> 10006</p>
                        <p>Precio: <br>140$</p>
                        <p>Promocion: <br>0.1</p>
                        <p>Fecha_Producción: <br>2024-07-07</p>
                        <p>Fecha_Vencimiento: <br>2025-07-07 </p>
                        <p>Cantidad: <br>300</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Bateria_Coche</p>
                        <p>ID: <br> 10007</p>
                        <p>Precio: <br>170$</p>
                        <p>Promocion: <br>0.2</p>
                        <p>Fecha_Producción: <br>2024-07-08</p>
                        <p>Fecha_Vencimiento: <br>2025-07-08 </p>
                        <p>Cantidad: <br>150</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Radiador</p>
                        <p>ID: <br> 10008</p>
                        <p>Precio: <br>180$</p>
                        <p>Promocion: <br>0.2</p>
                        <p>Fecha_Producción: <br>2024-07-09</p>
                        <p>Fecha_Vencimiento: <br>2025-07-09 </p>
                        <p>Cantidad: <br>165</p>
                    </div>
                    <div class="producto-card">
                        <p>Nombre:<br> Llantas</p>
                        <p>ID: <br> 10009</p>
                        <p>Precio: <br>200$</p>
                        <p>Promocion: <br>0.15</p>
                        <p>Fecha_Producción: <br>2024-07-10</p>
                        <p>Fecha_Vencimiento: <br>2025-07-10 </p>
                        <p>Cantidad: <br>110</p>
                    </div>
                    
                </div>
            `;
            overlayy.style.display = 'block';
        });
    
        closePopupp.addEventListener('click', function() {
            overlayy.style.display = 'none';
        });
    
        overlayy.addEventListener('click', function(e) {
            if (e.target === overlayy) {
                overlayy.style.display = 'none';
            }
        });
    
        // Nuevo evento para el botón de borrar producto
        borrarProductoBtn.addEventListener('click', function() {
            const productId = prompt("Ingrese el ID del producto a eliminar:");
            if (productId !== null) {
                const cantidad = prompt("Ingrese la cantidad de productos a eliminar:");
                if (cantidad !== null) {
                    alert(`Se eliminará ${cantidad} unidad(es) del producto con ID: ${productId}`);
                }
            }
        });
        agregarProductoBtn.addEventListener('click', function() {
            const productId = prompt("Ingrese el ID del producto a agregar:");
            if (productId !== null) {
                const cantidad = prompt("Ingrese la cantidad de productos a agregar:");
                if (cantidad !== null) {
                    alert(`Se Agregara ${cantidad} unidad(es) del producto con ID: ${productId}`);
                }
            }
        });
    });
 
    