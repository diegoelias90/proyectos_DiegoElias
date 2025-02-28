
const services = document.querySelectorAll('.service');
const closeBtn = document.querySelector('.close-btn');

services.forEach(service => {
  service.addEventListener('click', () => {
    service.classList.toggle('active');
  });
});

closeBtn.addEventListener('click', () => {
  services.forEach(service => {
    service.classList.remove('active');
  });
});
const button = document.getElementById('botonc');

button.addEventListener('click', function() {
  alert('¡El pedido se a agregado al carrito!');
});

