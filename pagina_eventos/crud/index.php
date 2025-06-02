<?php
include 'db.php';
$result = $conn->query("SELECT * FROM tb_evento");
?>

<div class="table-container">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Colaborador</th>
        <th>Responsável</th>
        <th>Categoria</th>
        <th>Motivo</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Observação</th>
        <th>Cursista</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['evento_idColaborador'] ?></td>
        <td><?= $row['evento_idResponsavel'] ?></td>
        <td><?= $row['evento_idCategoria'] ?></td>
        <td><?= $row['evento_idMotivo'] ?></td>
        <td><?= $row['evento_data'] ?></td>
        <td><?= $row['evento_hora'] ?></td>
        <td><?= $row['evento_observacao'] ?></td>
        <td><?= $row['cursista_matricula'] ?></td>
        <td>
          <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja excluir?')">🗑️</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
