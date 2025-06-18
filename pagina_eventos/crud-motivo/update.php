<title>Sisco - Editar Motivos</title>
<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) die("ID não informado.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['eventoMotivo_nome'];
    $descricao = $_POST['eventoMotivo_descricao'];
    $idCategoria = $_POST['eventoMotivo_idCategoria'];

    $stmt = $conn->prepare("UPDATE tb_sisco_eventomotivo SET eventoMotivo_nome=?, eventoMotivo_descricao=?, eventoMotivo_idCategoria=? WHERE eventoMotivo_id=?");
    $stmt->bind_param("ssii", $nome, $descricao, $idCategoria, $id);

    if ($stmt->execute()) {
        header("Location:  update_form.php");
    exit();
    } else {
        echo "Erro ao atualizar: " . $stmt->error;
    }
}

$result = $conn->query("SELECT * FROM tb_sisco_eventomotivo WHERE eventoMotivo_id = $id");
$motivo = $result->fetch_assoc();
?>

<h2>Editar Motivo</h2>
<!-- Inclua no <head> da sua página, se ainda não tiver -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <h2 class="mb-4">Editar Motivo</h2>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Motivo:</label>
      <input type="text" class="form-control" name="eventoMotivo_nome" value="<?= $motivo['eventoMotivo_nome'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Descrição:</label>
      <textarea class="form-control" name="eventoMotivo_descricao" rows="3" required><?= $motivo['eventoMotivo_descricao'] ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Categoria:</label>
      <select class="form-select" name="eventoMotivo_idCategoria">
        <?php
        $cat = $conn->query("SELECT * FROM tb_sisco_eventocategoria ORDER BY eventoCategoria_nome");
        while ($c = $cat->fetch_assoc()):
        ?>
        <option value="<?= $c['eventoCategoria_id'] ?>" <?= $motivo['eventoMotivo_idCategoria'] == $c['eventoCategoria_id'] ? 'selected' : '' ?>>
          <?= $c['eventoCategoria_nome'] ?>
        </option>
        <?php endwhile; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <button type="button" class="btn btn-secondary" onclick="history.back()">Cancelar</button>

  </form>
</div>
