function mostrarTecnicos() {
    document.getElementById('tecnicosOverlay').style.display = 'block';
}

function mostrarProductos() {
    document.getElementById('productosOverlay').style.display = 'block';
}

function cerrarPopup(overlayId) {
    document.getElementById(overlayId).style.display = 'none';
}

function mostrarFormularioTecnico() {
    document.getElementById('formularioTecnico').style.display = 'block';
}

function mostrarFormularioProducto() {
    document.getElementById('formularioProducto').style.display = 'block';
}
// Cerrar popup al hacer clic fuera de él
window.onclick = function(event) {
    if (event.target.classList.contains('overlay')) {
        event.target.style.display = 'none';
    }
}