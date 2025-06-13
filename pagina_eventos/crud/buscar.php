<?php
include 'db.php';

$termo = $_GET['q'] ?? '';

$sql = "
SELECT 
    d.discente_matricula, 
    d.discente_nome, 
    d.discente_idResponsavel,
    r.responsavelLegal_id,
    r.responsavelLegal_nome
FROM tb_jmf_discente d
LEFT JOIN tb_jmf_responsavellegal r 
    ON r.responsavelLegal_id = d.discente_idResponsavel
WHERE d.discente_nome LIKE ?
";

$stmt = $conn->prepare($sql);
$like = "%" . $termo . "%";
$stmt->bind_param("s", $like);
$stmt->execute();
$result = $stmt->get_result();

$discentes = [];
while ($row = $result->fetch_assoc()) {
    $discentes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($discentes);
?>
