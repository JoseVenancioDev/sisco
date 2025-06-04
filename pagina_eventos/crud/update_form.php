<?php
include 'db.php';

if (!isset($_GET['evento_id']) || !is_numeric($_GET['evento_id'])) {
    die("ID inválido ou não informado.");
}

$id = intval($_GET['evento_id']); // força a ser número inteiro

$result = $conn->query("SELECT * FROM tb_sisco_evento WHERE evento_id=$id");
$evento = $result->fetch_assoc();

if (!$result || $result->num_rows === 0) {
    die("Evento não encontrado.");
}

$evento = $result->fetch_assoc();
?>

<form action="update.php" method="POST">
  <input type="hidden" name="evento_id" value="<?= $evento['evento_ id'] ?>">
  <input type="text" name="evento_idColaborador" value="<?= $evento['evento_idColaborador'] ?>" placeholder="Colaborador"><br>
  <input type="text" name="evento_idResponsavel" value="<?= $evento['evento_idResponsavel'] ?>" placeholder="Responsável"><br>
  <input type="text" name="evento_idCategoria" value="<?= $evento['evento_idCategoria'] ?>" placeholder="Categoria"><br>
  <input type="text" name="evento_idMotivo" value="<?= $evento['evento_idMotivo'] ?>" placeholder="Motivo"><br>
  <input type="text" name="evento_observacao" value="<?= $evento['evento_observacao'] ?>" placeholder="Observação"><br>
  <input type="date" name="evento_data" value="<?= $evento['evento_data'] ?>"><br>
  <input type="time" name="evento_hora" value="<?= $evento['evento_hora'] ?>"><br>
  <input type="text" name="evento_idDiscente" value="<?= $evento['evento_idDiscente'] ?>" placeholder="Discente"><br>
  <button type="submit">Atualizar</button>
</form>
