<?php
include 'db.php';
header('Content-Type: application/json');

// Consulta os dados
$sql = "SELECT e.evento_id,
       d.discente_nome AS nome_discente,
       c.colaborador_nome AS nome_colaborador,
       r.responsavelLegal_nome AS nome_responsavel,
       ec.eventoCategoria_nome AS nome_categoria,
       m.eventoMotivo_nome AS motivo_nome,
       e.evento_data,
       e.evento_hora,
       e.evento_observacao,
       e.evento_dateTime
FROM tb_sisco_evento e
LEFT JOIN tb_jmf_discente d ON
 e.evento_idDiscente = d.discente_matricula
LEFT JOIN tb_jmf_colaborador c ON
 e.evento_idColaborador = c.colaborador_matricula
LEFT JOIN tb_jmf_responsavellegal r ON
 e.evento_idResponsavel = r.responsavelLegal_id
LEFT JOIN tb_sisco_eventomotivo m ON
 e.evento_idMotivo = m.eventoMotivo_id
LEFT JOIN tb_sisco_eventocategoria ec ON
 e.evento_idCategoria = ec.eventoCategoria_id

ORDER BY e.evento_data DESC
";

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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn->close();
?>
