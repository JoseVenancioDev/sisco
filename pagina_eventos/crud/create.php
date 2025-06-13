<?php
include 'db.php';

$id = $_POST['evento_id'];
$colaborador = $_POST['evento_idColaborador'];
$responsavel = $_POST['evento_idResponsavel'];
$categoria = $_POST['evento_idCategoria'];
$motivo = $_POST['evento_idMotivo'];
$observacao = $_POST['evento_observacao'];
$data = $_POST['evento_data'];
$hora = $_POST['evento_hora'];
$discente = $_POST['evento_idDiscente'];

$sql = "INSERT INTO tb_sisco_evento (evento_idColaborador, evento_idResponsavel, evento_idCategoria, evento_idMotivo, evento_observacao, evento_data, evento_hora, evento_idDiscente)
        VALUES ('$colaborador', '$responsavel', '$categoria', '$motivo', '$observacao', '$data', '$hora', '$discente')";

$conn->query($sql);
header("Location: ../cadastro-eventos/index.html");
?>