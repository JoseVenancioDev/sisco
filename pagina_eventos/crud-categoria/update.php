<?php
include 'db.php';

if (isset($_POST['id'], $_POST['nome'], $_POST['alerta'], $_POST['descricao'])) {
    $id = intval($_POST['id']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $alerta = intval($_POST['alerta']);
    $descricao = $conn->real_escape_string($_POST['descricao']);

    $query = "UPDATE tb_sisco_eventocategoria 
              SET eventoCategoria_nome = '$nome', 
                  ocorreciaCategoria_qtdAlerta = $alerta, 
                  eventoCategoria_descricao = '$descricao' 
              WHERE eventoCategoria_id = $id";

    if ($conn->query($query)) {
        header("Location: update_form.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
} else {
    echo "Dados incompletos.";
}
?>
