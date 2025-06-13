<?php
include '../crud/db.php'; // conecta com o banco

$query = "SELECT responsavelLegal_id, responsavelLegal_nome FROM tb_jmf_responsavellegal ORDER BY responsavelLegal_nome";
$result = $conn->query($query);

$responsavel = [];

while ($row = $result->fetch_assoc()) {
    $responsavel[] = $row;
}

header('Content-Type: application/json');
echo json_encode($responsavel);
?>
