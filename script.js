// js/script.js

document.getElementById('clientFinderForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    // Capturar valores del formulario
    const sector = document.getElementById('sector').value;
    const companySize = document.getElementById('companySize').value;
    const role = document.getElementById('role').value;
    const region = document.getElementById('region').value;

    // Validar datos básicos
    if (!sector || !companySize || !role) {
        alert('Por favor, completa todos los campos requeridos.');
        return;
    }

    // Mostrar cargando (puede añadirse animación en el futuro)
    const resultsSection = document.getElementById('results');
    const resultsList = document.getElementById('resultsList');
    resultsList.innerHTML = '<li>Cargando resultados...</li>';

    // Preparar datos para enviar al backend
    const formData = {
        sector,
        companySize,
        role,
        region
    };

    try {
        // Petición al servidor PHP (functions.php)
        const response = await fetch('php/functions.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        if (!response.ok) {
            throw new Error('Error en la respuesta del servidor.');
        }

        const data = await response.json();

        // Mostrar resultados
        if (data.success && data.results.length > 0) {
            resultsList.innerHTML = '';
            data.results.forEach(result => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `
                    <strong>Nombre:</strong> ${result.name}<br>
                    <strong>Cargo:</strong> ${result.role}<br>
                    <strong>Empresa:</strong> ${result.company}<br>
                    <a href="${result.link}" target="_blank">Ver Perfil</a>
                `;
                resultsList.appendChild(listItem);
            });
        } else {
            resultsList.innerHTML = '<li>No se encontraron resultados para los criterios especificados.</li>';
        }
    } catch (error) {
        console.error('Error:', error);
        resultsList.innerHTML = '<li>Ocurrió un error al buscar prospectos. Inténtalo nuevamente más tarde.</li>';
    }
});
