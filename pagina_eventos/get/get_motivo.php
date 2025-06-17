<?php
include '../crud/db.php';

$categoriaId = isset($_GET['categoria_id']) ? $_GET['categoria_id'] : null;

if ($categoriaId) {
    $query = "SELECT eventoMotivo_id, eventoMotivo_nome, eventoMotivo_idCategoria 
              FROM tb_sisco_eventomotivo 
              WHERE eventoMotivo_idCategoria = ? 
              ORDER BY eventoMotivo_nome";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $categoriaId);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $query = "SELECT eventoMotivo_id, eventoMotivo_nome, eventoMotivo_idCategoria 
              FROM tb_sisco_eventomotivo 
              ORDER BY eventoMotivo_nome";
    $result = $conn->query($query);
}

$motivo = [];

while ($row = $result->fetch_assoc()) {
    $motivo[] = $row;
}

header('Content-Type: application/json');
echo json_encode($motivo);
?>