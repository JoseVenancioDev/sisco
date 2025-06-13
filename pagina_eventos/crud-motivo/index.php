<?php
include 'db.php';

$query = "SELECT m.eventoMotivo_id, m.eventoMotivo_nome, m.eventoMotivo_descricao, c.eventoCategoria_nome 
          FROM tb_sisco_eventomotivo m 
          JOIN tb_sisco_eventocategoria c ON m.eventoMotivo_idCategoria = c.eventoCategoria_id 
          ORDER BY m.eventoMotivo_id ASC";

$result = $conn->query($query);

// Botão de voltar
echo "<a href='../motivo-eventos/index.html' style='display: inline-block; margin: 20px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>⬅ Voltar para Início</a>";
?>

<h2>Lista de Motivos</h2>
<table border="1">
  <tr>
    <th>ID</th>
    <th>Motivo</th>
    <th>Descrição</th>
    <th>Categoria</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['eventoMotivo_id'] ?></td>
      <td><?= $row['eventoMotivo_nome'] ?></td>
      <td><?= $row['eventoMotivo_descricao'] ?></td>
      <td><?= $row['eventoCategoria_nome'] ?></td>
    </tr>
  <?php endwhile; ?>
</table>
