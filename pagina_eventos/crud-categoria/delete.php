<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM tb_sisco_eventocategoria WHERE eventoCategoria_id = $id";
    if ($conn->query($query)) {
        header("Location: delete_form.php");
        exit;
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    echo "ID inválido.";
}
?>
