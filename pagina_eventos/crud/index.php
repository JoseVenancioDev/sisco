<?php
include 'db.php';

// Consulta os dados
$sql = "SELECT 
    evento_id,
    evento_data,
    evento_hora,
    evento_idResponsavel,
    evento_idColaborador,
    evento_idDiscente,
    evento_idCursista,
    evento_idCategoria,
    evento_idMotivo,
    evento_observacao,
FROM tb_sisco_evento
ORDER BY evento_data DESC, evento_hora DESC";

$result = $conn->query($sql);

// Array para armazenar os dados
$eventos = [];

while ($row = $result->fetch_assoc()) {
    $eventos[] = $row;
}

// Retorna os dados em formato esperado pelo DataTables
echo json_encode([
    "data" => $eventos
]);

$conn->close();
?>
