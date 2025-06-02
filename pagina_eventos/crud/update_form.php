<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM eventos WHERE id=$id");
$evento = $result->fetch_assoc();
?>

<form action="update.php" method="POST">
  <input type="hidden" name="evento_id" value="<?= $evento['id'] ?>">
  <input type="text" name="evento_idColaborador" value="<?= $evento['evento_idColaborador'] ?>" placeholder="Colaborador"><br>
  <input type="text" name="evento_idResponsavel" value="<?= $evento['evento_idResponsavel'] ?>" placeholder="Responsável"><br>
  <input type="text" name="evento_idCategoria" value="<?= $evento['evento_idCategoria'] ?>" placeholder="Categoria"><br>
  <input type="text" name="evento_idMotivo" value="<?= $evento['evento_idMotivo'] ?>" placeholder="Motivo"><br>
  <input type="text" name="evento_observacao" value="<?= $evento['evento_observacao'] ?>" placeholder="Observação"><br>
  <input type="date" name="evento_data" value="<?= $evento['evento_data'] ?>"><br>
  <input type="time" name="evento_hora" value="<?= $evento['evento_hora'] ?>"><br>
  <input type="text" name="cursista_matricula" value="<?= $evento['cursista_matricula'] ?>" placeholder="Cursista"><br>
  <button type="submit">Atualizar</button>
</form>
