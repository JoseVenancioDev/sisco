<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

// Função para limpar e validar
function limpar($conn, $valor) {
    return mysqli_real_escape_string($conn, trim($valor));
}

// Coleta dos dados do formulário
$evento_id   = limpar($conn, $_POST['evento_id'] ?? '');
$discente    = limpar($conn, $_POST['evento_idDiscente'] ?? '');
$colaborador = limpar($conn, $_POST['evento_idColaborador'] ?? '');
$responsavel = limpar($conn, $_POST['evento_idResponsavel'] ?? '');
$categoria   = limpar($conn, $_POST['evento_idCategoria'] ?? '');
$motivo      = limpar($conn, $_POST['evento_idMotivo'] ?? '');
$data        = limpar($conn, $_POST['evento_data'] ?? '');
$hora        = limpar($conn, $_POST['evento_hora'] ?? '');
$observacao  = limpar($conn, $_POST['evento_observacao'] ?? '');
$datetime    = limpar($conn, $_POST['evento_datetime'] ?? '');


// Verifica campos obrigatórios
if (
    !$discente || !$colaborador || !$responsavel || !$categoria ||
    !$motivo || !$data || !$hora
) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Preencha todos os campos obrigatórios.']);
    exit;
}

// SQL com parâmetros
$sql = "INSERT INTO tb_sisco_evento (
    evento_id,
    evento_idDiscente,
    evento_idColaborador,
    evento_idResponsavel,
    evento_idCategoria,
    evento_idMotivo,
    evento_data,
    evento_hora,
    evento_observacao,
    evento_dateTime
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao preparar statement: ' . $conn->error]);
    exit;
}

// Faz o bind dos valores
$stmt->bind_param(
    "iissiissss",
    $evento_id, // 4 inteiros, 5 strings
    $discente,
    $colaborador,
    $responsavel,
    $categoria,
    $motivo,
    $data,
    $hora,
    $observacao,
    $datetime
);

// Executa
if ($stmt->execute()) {
    echo json_encode(['status' => 'ok']);
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => $stmt->error]);
}

$stmt->close();
$conn->close();
