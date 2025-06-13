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

<form action="update.php" method="POST">
    <input type="hidden" name="evento_id" value="<?= $evento['evento_id'] ?>">

    <label>Colaborador:</label>
    <select name="evento_idColaborador">
        <?php foreach ($colaboradores as $id => $nome): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idColaborador'] == $id ? 'selected' : '' ?>>
                <?= $nome ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Responsável:</label>
    <select name="evento_idResponsavel">
        <?php foreach ($responsaveis as $id => $nome): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idResponsavel'] == $id ? 'selected' : '' ?>>
                <?= $nome ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Categoria:</label>
    <select name="evento_idCategoria">
        <?php foreach ($categorias as $id => $desc): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idCategoria'] == $id ? 'selected' : '' ?>>
                <?= $desc ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Motivo:</label>
    <select name="evento_idMotivo">
        <?php foreach ($motivos as $id => $desc): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idMotivo'] == $id ? 'selected' : '' ?>>
                <?= $desc ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Observação:</label>
    <input type="text" name="evento_observacao" value="<?= $evento['evento_observacao'] ?>"><br>

    <label>Data:</label>
    <input type="date" name="evento_data" value="<?= $evento['evento_data'] ?>"><br>

    <label>Hora:</label>
    <input type="time" name="evento_hora" value="<?= $evento['evento_hora'] ?>"><br>

    <label>Discente:</label>
    <select name="evento_idDiscente">
        <?php foreach ($discentes as $id => $nome): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idDiscente'] == $id ? 'selected' : '' ?>>
                <?= $nome ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Salvar</button>
</form>
