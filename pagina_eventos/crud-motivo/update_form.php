<title>Sisco - Editar Motivos</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

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
<table border="1" id="tabelaMotivos" class='table table-striped table-bordered' style='width:100%'>
  <thead>
  <tr>
    <th>ID</th>
    <th>Motivo</th>
    <th>Descrição</th>
    <th>Categoria</th>
    <th>Ações</th>
  </tr>
  </thead>
  <tbody>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['eventoMotivo_id'] ?></td>
      <td><?= $row['eventoMotivo_nome'] ?></td>
      <td><?= $row['eventoMotivo_descricao'] ?></td>
      <td><?= $row['eventoCategoria_nome'] ?></td>
      <td>
        <a class="btn btn-primary" href="update.php?id=<?= $row['eventoMotivo_id'] ?>">Editar</a>
      </td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script>
  $(document).ready(function () {
    $('#tabelaMotivos').DataTable({
      dom: 'Bfrtip',
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
      }
    });
  });
</script>