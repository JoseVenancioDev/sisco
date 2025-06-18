<title>Sisco - Editar Categorias</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
<?php
include 'db.php';

echo "<a href='../categoria_eventos/index.html' style='display: inline-block; margin: 20px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>⬅ Voltar para Início</a>";

$result = $conn->query("SELECT * FROM tb_sisco_eventocategoria");
echo "<h2>Lista de Categorias</h2>";
echo "<table border='1' style='border-collapse: collapse; style='width:100%'' id='tabelaCategoria' class='table table-striped table-bordered'>
  <thead>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Qtd Alerta</th>
    <th>Ação</th>
  </tr>
  </thead>
  <tbody>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['eventoCategoria_id'] . "</td>";
  echo "<td>" . $row['eventoCategoria_nome'] . "</td>";
  echo "<td>" . (!empty($row['eventoCategoria_descricao']) ? htmlspecialchars($row['eventoCategoria_descricao']) : '-') . "</td>";
  echo "<td>" . ($row['ocorreciaCategoria_qtdAlerta'] ?? '3') . "</td>"; // fallback ao default
  echo "<td><a class='btn btn-primary' href='edit.php?id=" . $row['eventoCategoria_id'] . "'>Editar</a></td>";
  echo "</tr>";
}
echo "</tbody></table>";

$conn->close();
?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script>
  $(document).ready(function () {
    $('#tabelaCategoria').DataTable({
      dom: 'Bfrtip',
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
      }
    });
  });
</script>