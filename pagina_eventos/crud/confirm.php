<?php
include 'db.php';

// Recebe os dados do formulário
$id = $_POST['evento_id'];
$colaborador = $_POST['evento_idColaborador'];
$responsavel = $_POST['evento_idResponsavel'];
$categoria = $_POST['evento_idCategoria'];
$motivo = $_POST['evento_idMotivo'];
$observacao = isset($_POST['evento_observacao']) && !empty(trim($_POST['evento_observacao'])) ? $_POST['evento_observacao'] : NULL;
$data = $_POST['evento_data'];
$hora = $_POST['evento_hora'];
$discente = $_POST['evento_idDiscente'];

// Prepara e executa o INSERT
$sql = "INSERT INTO tb_sisco_evento (
    evento_id,
    evento_idColaborador, 
    evento_idResponsavel, 
    evento_idCategoria, 
    evento_idMotivo, 
    evento_observacao, 
    evento_data, 
    evento_hora, 
    evento_idDiscente
) VALUES (
    '$id',
    '$colaborador', 
    '$responsavel', 
    '$categoria', 
    '$motivo', 
    " . ($observacao !== NULL ? "'$observacao'" : "NULL") . ", 
    '$data', 
    '$hora', 
    '$discente'
)";


if ($conn->query($sql) === TRUE) {
    echo "Evento cadastrado com sucesso!";
    header("Location: ../cadastro-eventos/index.html");
    exit;
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
