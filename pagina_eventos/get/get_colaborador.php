<?php
include '../crud/db.php'; // conecta com o banco

$query = "SELECT colaborador_matricula, colaborador_nome FROM tb_jmf_colaborador ORDER BY colaborador_nome";
$result = $conn->query($query);

$colaboradores = [];

while ($row = $result->fetch_assoc()) {
    $colaboradores[] = $row;
}

header('Content-Type: application/json');
echo json_encode($colaboradores);
?>
