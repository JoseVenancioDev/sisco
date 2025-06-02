<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nome_do_banco"; // 🔁 Substitua pelo nome real do seu banco

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$id = $_POST['evento_id'];
$colaborador = $_POST['evento_idColaborador'];
$responsavel = $_POST['evento_idResponsavel'];
$categoria = $_POST['evento_idCategoria'];
$motivo = $_POST['evento_idMotivo'];
$observacao = $_POST['evento_observacao'];
$data = $_POST['evento_data'];
$hora = $_POST['evento_hora'];
$cursista = $_POST['cursista_matricula'];

// Prepara e executa o INSERT
$sql = "INSERT INTO tb_evento (evento_idColaborador, evento_idResponsavel, evento_idCategoria, evento_idMotivo, evento_observacao, evento_data, evento_hora, cursista_matricula)
        VALUES ('$colaborador', '$responsavel', '$categoria', '$motivo', '$observacao', '$data', '$hora', '$cursista')";

if ($conn->query($sql) === TRUE) {
    echo "Evento cadastrado com sucesso!";
    header("Location: index.html"); // redireciona de volta
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
