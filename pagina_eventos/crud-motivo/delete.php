<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM tb_sisco_eventomotivo WHERE eventoMotivo_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
       header("Location:  delete_form.php");
    exit(); 
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }
} else {
    echo "ID inválido.";
}
?>
