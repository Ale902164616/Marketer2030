<?php
// php/functions.php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
        exit();
    }

    $sector = $data['sector'] ?? '';
    $companySize = $data['companySize'] ?? '';
    $role = $data['role'] ?? '';
    $region = $data['region'] ?? '';

    if (!$sector || !$companySize || !$role) {
        echo json_encode(['success' => false, 'message' => 'Faltan campos obligatorios']);
        exit();
    }

    // Aquí iría la lógica para llamar a la API de LinkedIn y OpenAI
    // Por ejemplo, haciendo una petición a LinkedIn para obtener prospectos

    // Ejemplo de respuesta de prospectos simulados
    $prospects = [
        [
            'name' => 'Juan Pérez',
            'role' => 'Director de Marketing',
            'company' => 'TechCorp',
            'link' => 'https://linkedin.com/in/juanperez'
        ],
        [
            'name' => 'Ana García',
            'role' => 'Gerente de Ventas',
            'company' => 'InnovateX',
            'link' => 'https://linkedin.com/in/anagarcia'
        ]
    ];

    echo json_encode(['success' => true, 'results' => $prospects]);
}
?>
