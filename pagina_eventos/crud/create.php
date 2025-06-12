<?php
include 'db.php';

function limpar($conn, $valor) {
    return mysqli_real_escape_string($conn, trim($valor));
}

// Recebe os dados corretos conforme enviados pelo JavaScript
$id         = limpar($conn, $_POST['id'] ?? '');
$discente   = limpar($conn, $_POST['discente'] ?? '');
$colaborador= limpar($conn, $_POST['colaborador'] ?? '');
$responsavel= limpar($conn, $_POST['responsavel'] ?? '');
$categoria  = limpar($conn, $_POST['categoria'] ?? '');
$motivo     = limpar($conn, $_POST['motivo'] ?? '');
$data       = limpar($conn, $_POST['data'] ?? '');
$hora       = limpar($conn, $_POST['hora'] ?? '');
$observacao = limpar($conn, $_POST['observacao'] ?? '');
$datetime   = limpar($conn, $_POST['datetime'] ?? '');

// Validação básica


// Monta SQL com placeholders
$sql = "INSERT INTO tb_sisco_evento (
    evento_id, evento_idDiscente, evento_idColaborador, evento_idResponsavel,
    evento_idCategoria, evento_idMotivo, evento_data, evento_hora,
    evento_observacao, evento_dateTime
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao preparar: ' . $conn->error]);
    exit;
}

$stmt->bind_param("iiiiisssss", $id, $discente, $colaborador, $responsavel, $categoria, $motivo, $data, $hora, $observacao, $datetime);

if ($stmt->execute()) {
    echo json_encode(['status' => 'ok']);
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
