<?php
include 'db.php';

$colaboradores = [];
$query = "SELECT colaborador_matricula, colaborador_nome FROM tb_jmf_colaborador ORDER BY colaborador_nome";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $colaboradores[$row['colaborador_matricula']] = $row['colaborador_nome'];
  }
}

$discentes = [];
$query = "SELECT discente_matricula, discente_nome FROM tb_jmf_discente ORDER BY discente_nome";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $discentes[$row['discente_matricula']] = $row['discente_nome'];
  }
}
$responsaveis = [];
$query = "SELECT responsavelLegal_id, responsavelLegal_nome FROM tb_jmf_responsavellegal ORDER BY responsavelLegal_nome";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $responsaveis[$row['responsavelLegal_id']] = $row['responsavelLegal_nome'];
  }
}

$categorias = [];
$query = "SELECT eventoCategoria_id, eventoCategoria_nome FROM tb_sisco_eventocategoria ORDER BY eventoCategoria_nome";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $categorias[$row['eventoCategoria_id']] = $row['eventoCategoria_nome'];
  }
}

$motivos = [];
$query = "SELECT eventoMotivo_id, eventoMotivo_nome FROM tb_sisco_eventomotivo ORDER BY eventoMotivo_nome";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $motivos[$row['eventoMotivo_id']] = $row['eventoMotivo_nome'];
  }
}

// Verifica se evento_id foi passado
$evento_id = $_GET['evento_id'] ?? null;
if (!$evento_id) {
    die("ID do evento não informado.");
}

// Busca o evento no banco
$result = $conn->query("SELECT * FROM tb_sisco_evento WHERE evento_id = '$evento_id'");
$evento = $result->fetch_assoc();
if (!$evento) {
    die("Evento não encontrado.");
}
?>

<!-- Adicione isso no <head> da sua página, se ainda não estiver usando Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
  <h2>Editar Evento</h2>
  <form action="update.php" method="POST">
    <input type="hidden" name="evento_id" value="<?= $evento['evento_id'] ?>">
    
    <div class="col-md-full mb-3">
      <label class="form-label">Colaborador:</label>
      <select class="form-select" name="evento_idColaborador">
        <?php foreach ($colaboradores as $id => $nome): ?>
          <option value="<?= $id ?>" <?= $evento['evento_idColaborador'] == $id ? 'selected' : '' ?>>
            <?= $nome ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="row">
      
      <div class="col-md-6 mb-3">
        <label class="form-label">Discente:</label>
        <select class="form-select" name="evento_idDiscente">
          <?php foreach ($discentes as $id => $nome): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idDiscente'] == $id ? 'selected' : '' ?>>
              <?= $nome ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Responsável:</label>
        <select class="form-select" name="evento_idResponsavel">
          <?php foreach ($responsaveis as $id => $nome): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idResponsavel'] == $id ? 'selected' : '' ?>>
              <?= $nome ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Categoria:</label>
        <select class="form-select" name="evento_idCategoria">
          <?php foreach ($categorias as $id => $desc): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idCategoria'] == $id ? 'selected' : '' ?>>
              <?= $desc ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Motivo:</label>
        <select class="form-select" name="evento_idMotivo">
          <?php foreach ($motivos as $id => $desc): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idMotivo'] == $id ? 'selected' : '' ?>>
              <?= $desc ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-12 mb-3">
        <label class="form-label">Observação:</label>
        <input type="text" class="form-control" name="evento_observacao" value="<?= $evento['evento_observacao'] ?>">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Data:</label>
        <input type="date" class="form-control" name="evento_data" value="<?= $evento['evento_data'] ?>">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Hora:</label>
        <input type="time" class="form-control" name="evento_hora" value="<?= $evento['evento_hora'] ?>">
      </div>

      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" onclick="history.back()">Cancelar</button>
      </div>
    </div>
  </form>
</div>

