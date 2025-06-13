<?php
include 'db.php';

if (!isset($_GET['id'])) {
    echo "ID não fornecido.";
    exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM tb_sisco_eventocategoria WHERE eventoCategoria_id = $id";
$result = $conn->query($query);

if (!$result || $result->num_rows == 0) {
    echo "Registro não encontrado.";
    exit;
}

$row = $result->fetch_assoc();
?>

<h2>Editar Categoria</h2>
<form action="update.php" method="post">
  <input type="hidden" name="id" value="<?= $row['eventoCategoria_id'] ?>">
  
  <label>Nome da Categoria:</label><br>
  <input type="text" name="nome" value="<?= htmlspecialchars($row['eventoCategoria_nome']) ?>"><br><br>

  <label>Qtd Alerta:</label><br>
  <input type="number" name="alerta" value="<?= $row['ocorreciaCategoria_qtdAlerta'] ?>"><br><br>

  <label>Descrição:</label><br>
  <textarea name="descricao"><?= htmlspecialchars($row['eventoCategoria_descricao']) ?></textarea><br><br>

  <button type="submit">Salvar</button>
</form>

<a href="index.php">⬅ Voltar</a>
