<title>Sisco - Editar Categorias</title>

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

<!-- Inclua no <head> se ainda não tiver Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <h2 class="mb-4">Editar Categoria</h2>

  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['eventoCategoria_id'] ?>">

    <div class="mb-3">
      <label class="form-label">Nome da Categoria:</label>
      <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($row['eventoCategoria_nome']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Qtd Alerta:</label>
      <input type="number" min="1" max="10" class="form-control" name="alerta" value="<?= $row['ocorreciaCategoria_qtdAlerta'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Descrição:</label>
      <textarea class="form-control" name="descricao" rows="3"><?= htmlspecialchars($row['eventoCategoria_descricao']) ?></textarea>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <button type="button" class="btn btn-secondary" onclick="history.back()">Cancelar</button>
    </div>
  </form>
</div>

