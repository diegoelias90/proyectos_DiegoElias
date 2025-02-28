document.addEventListener('DOMContentLoaded', function() {
    const scrollContainer = document.getElementById('product-carousel');
    const scrollLeft = document.getElementById('scrolling-button-left');
    const scrollRight = document.getElementById('scrolling-button-right');

    // Modal
    const modal = document.getElementById('quantity-modal');
    const closeButton = document.querySelector('.close-button');
    const addToCartButton = document.getElementById('add-to-cart');
    let selectedProductName = '';

    // Función para mostrar el modal
    function showModal(productName) {
        selectedProductName = productName; // Guardar el nombre del producto
        modal.style.display = 'block';
    }

    // Cerrar el modal
    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Evento para agregar al carrito
    addToCartButton.addEventListener('click', function() {
        const quantity = document.getElementById('quantity-input').value;

        // Enviar la cantidad al servidor
        const formData = new FormData();
        formData.append('nombre', selectedProductName);
        formData.append('cantidad', quantity);

        fetch('', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Respuesta del servidor
            modal.style.display = 'none'; // Cierra el modal
        })
        .catch(error => console.error('Error:', error));
    });

    // Agregar evento al botón +
    document.querySelectorAll('.circle-btn').forEach(button => {
        button.addEventListener('click', function() {
            showModal(button.getAttribute('data-nombre'));
        });
    });

    scrollLeft.addEventListener('click', function() {
        scrollContainer.scrollLeft -= 300; 
    });
    scrollRight.addEventListener('click', function() {
        scrollContainer.scrollLeft += 300; 
    });
});

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    const modal = document.getElementById('quantity-modal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
