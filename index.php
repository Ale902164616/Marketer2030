<?php
// index.php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientFinder AI</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>ClientFinder AI</h1>
            <p>Encuentra prospectos relevantes en LinkedIn con inteligencia artificial.</p>
        </div>
    </header>

    <main>
        <section class="form-section">
            <h2>Buscar Prospectos</h2>
            <form id="clientFinderForm">
                <label for="sector">Sector:</label>
                <input type="text" id="sector" name="sector" placeholder="e.g., Tecnología, Salud" required>

                <label for="companySize">Tamaño de Empresa:</label>
                <select id="companySize" name="companySize" required>
                    <option value="">Seleccionar...</option>
                    <option value="small">Pequeña</option>
                    <option value="medium">Mediana</option>
                    <option value="large">Grande</option>
                </select>

                <label for="role">Cargo:</label>
                <input type="text" id="role" name="role" placeholder="e.g., Director de Marketing" required>

                <label for="region">Región:</label>
                <input type="text" id="region" name="region" placeholder="e.g., América Latina">

                <button type="submit">Buscar Prospectos</button>
            </form>
        </section>

        <section id="results" class="results-section">
            <h2>Resultados de la Búsqueda</h2>
            <ul id="resultsList">
                <!-- Los resultados se cargarán dinámicamente aquí -->
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 ClientFinder AI. Todos los derechos reservados.</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>

