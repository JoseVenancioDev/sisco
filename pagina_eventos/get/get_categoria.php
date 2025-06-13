<?php
include '../crud/db.php'; // conecta com o banco

$query = "SELECT eventoCategoria_id, eventoCategoria_nome FROM tb_sisco_eventocategoria ORDER BY eventoCategoria_nome";
$result = $conn->query($query);

$categoria = [];

while ($row = $result->fetch_assoc()) {
    $categoria[] = $row;
}

header('Content-Type: application/json');
echo json_encode($categoria);
?>
