function validarIdentificador(event) {
    event.preventDefault(); // Para que el formulario no se este envíando automaticamente
    
    // Llama el número ingresado en el input y lo lee
    const identificador = document.getElementById('identificador').value;

    // Verificación de los números
    if (identificador >= 1 && identificador <= 10) {
        window.location.href = "/usuarios/gerente/indexgerente.php"; // Gerente
    } else if (identificador >= 11 && identificador <= 30) {
        window.location.href = "/usuarios/tecnico/tecnicomain.php"; // Tecnico
    } else if (identificador > 30) {
        window.location.href = "/usuarios/cliente/indexcliente.php"; // Cliente
    } else {
        alert("Ingresa un número válido.");
    }
}
