<?php
include '../crud/db.php'; // conecta com o banco

$query = "SELECT eventoMotivo_id, eventoMotivo_nome FROM tb_sisco_eventomotivo ORDER BY eventoMotivo_nome";
$result = $conn->query($query);

$motivo = [];

while ($row = $result->fetch_assoc()) {
    $motivo[] = $row;
}

header('Content-Type: application/json');
echo json_encode($motivo);
?>
