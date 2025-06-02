<?php
include 'db.php';

$colaborador = $_POST['evento_idColaborador'];
$responsavel = $_POST['evento_idResponsavel'];
$categoria = $_POST['event_idCategoria'];
$motivo = $_POST['evento_idMotivo'];
$observacao = $_POST['evento_observacao'];
$data = $_POST['evento_data'];
$hora = $_POST['evento_hora'];
$cursista = $_POST['cursista_matricula'];

$sql = "INSERT INTO tb_evento (evento_idColaborador, evento_idResponsavel, evento_idCategoria, evento_idMotivo, evento_observacao, evento_data, evento_hora, cursista_matricula)
        VALUES ('$colaborador', '$responsavel', '$categoria', '$motivo', '$observacao', '$data', '$hora', '$cursista')";

$conn->query($sql);
header("Location: index.php");
?>
