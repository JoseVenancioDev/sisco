<?php
include 'db.php';

$nome = $_POST['eventoCategoria_nome'];
$descricao = !empty(trim($_POST['eventoCategoria_descricao'])) ? $_POST['eventoCategoria_descricao'] : NULL;
$alerta = isset($_POST['ocorreciaCategoria_qtdAlerta']) ? intval($_POST['ocorreciaCategoria_qtdAlerta']) : NULL;

$campos = "eventoCategoria_nome";
$valores = "'$nome'";

if ($descricao !== NULL) {
    $campos .= ", eventoCategoria_descricao";
    $valores .= ", '$descricao'";
}

if ($alerta !== NULL) {
    $campos .= ", ocorreciaCategoria_qtdAlerta";
    $valores .= ", $alerta";
}

$sql = "INSERT INTO tb_sisco_eventocategoria ($campos) VALUES ($valores)";


// Executa e confirma
if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Categoria cadastrada com sucesso!');
        setTimeout(function() {
            window.location.href = '../categoria_eventos/index.html';
        }, 200);
    </script>";
    exit;
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
?>
