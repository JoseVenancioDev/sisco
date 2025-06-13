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

$sql = "UPDATE tb_sisco_evento SET 
        evento_idColaborador='$colaborador',
        evento_idResponsavel='$responsavel',
        evento_idCategoria='$categoria',
        evento_idMotivo='$motivo',
        evento_observacao='$observacao',
        evento_data='$data',
        evento_hora='$hora',
        evento_idDiscente='$discente'
        WHERE evento_id='$id'";


$conn->query($sql);
header("Location: update_form.php");
?>