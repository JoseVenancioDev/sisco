<?php
include '../crud/db.php'; // conecta com o banco

$query = "SELECT discente_matricula, discente_nome FROM tb_jmf_discente ORDER BY discente_nome";
$result = $conn->query($query);

$discentes = [];

while ($row = $result->fetch_assoc()) {
    $discentes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($discentes);
?>
