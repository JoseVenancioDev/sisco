<?php
include 'db.php';

// Verifica se o parâmetro foi enviado e é numérico
if (!isset($_GET['evento_id']) || !is_numeric($_GET['evento_id'])) {
    die("ID inválido.");
}

$id = intval($_GET['evento_id']); // sanitiza como número

// Usa prepared statement para segurança
$stmt = $conn->prepare("DELETE FROM tb_sisco_evento WHERE evento_id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao excluir: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
