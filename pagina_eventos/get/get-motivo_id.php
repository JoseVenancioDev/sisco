<?php
include '../crud/db.php'; // conecta com o banco

$query = "SELECT eventoMotivo_id FROM tb_sisco_eventomotivo";
$result = $conn->query($query);

$id = [];

while ($row = $result->fetch_assoc()) {
    $id[] = $row['eventoMotivo_id'];
}

// Envia JSON para o front-end
header('Content-Type: application/json');
// Transforma o array $id em um array apenas com os números dos IDs
$intIds = array_map('intval', $id);
$maxId = max($intIds);
$nextId = $maxId + 1;
echo json_encode(['nextId' => $nextId]);
