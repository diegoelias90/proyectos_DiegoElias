document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.getElementById('overlay');
    const popup = document.getElementById('popup');
    const popupContent = document.getElementById('popupContent');
    const closePopup = document.getElementById('closePopup');
    const tecnicosBtn = document.getElementById('tecnicos-btn');

    tecnicosBtn.addEventListener('click', function(e) {
        e.preventDefault();
        fetch('get_tecnicos.php')
            .then(response => response.json())
            .then(data => {
                let content = `
                    <div class="tecnicos-activos">
                        <h2>TÉCNICOS ACTIVOS</h2>
                `;
                data.forEach(tecnico => {
                    content += `
                        <div class="tecnico-card">
                            <p>Nombre: ${tecnico.Nombre}</p>
                            <p>Apellido: ${tecnico.Apellido}</p>
                            <p>ID: ${tecnico.Id_Usuario}</p>
                            <p>Correo: ${tecnico.Correo}</p>
                            <p>Número: ${tecnico.Numero_Telefono}</p>
                        </div>
                    `;
                });
                content += `</div>`;
                popupContent.innerHTML = content;
                overlay.style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
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
