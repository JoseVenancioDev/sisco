<?php
include 'db.php';

// Recebe os dados do formulário
$id = $_POST['evento_id'];
$colaborador = $_POST['evento_idColaborador'];
$responsavel = $_POST['evento_idResponsavel'];
$categoria = $_POST['eventoCategoria_id'];
$motivo = $_POST['eventoMotivo_id'];
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
$alerta = isset($_POST['evento_alerta']) ? $_POST['evento_alerta'] : 0;


if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Evento cadastrado com sucesso!');
        setTimeout(function() {
            window.location.href = '../cadastro-eventos/index2.html';
        }, 200);
    </script>";
    exit;
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
