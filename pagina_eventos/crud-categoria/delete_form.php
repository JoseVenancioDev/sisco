<title>Sisco - Deletar Categorias</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
<?php
include 'db.php';

// Buscar todas as categorias
$categorias = [];
$query = "SELECT * FROM tb_sisco_eventocategoria ORDER BY eventoCategoria_id";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $categorias[] = $row;
  }
}

// Botão de voltar
echo "<a href='../categoria_eventos/index.html' style='display: inline-block; margin: 20px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>⬅ Voltar para Início</a>";

// Exibir tabela de categorias
echo "<h2>Lista de Categorias</h2>";
echo "<table border='1' id='tabelaCategoria' class='table table-striped table-bordered' style='width:100%'>
  <thead>
  <tr>
    <th>ID</th>
    <th>Nome da Categoria</th>
    <th>Qtd Alerta</th>
    <th>Descrição</th>
    <th>Ação</th>
  </tr>
  </thead>
  <tbody>";

foreach ($categorias as $cat) {
  echo "<tr>";
  echo "<td>" . $cat['eventoCategoria_id'] . "</td>";
  echo "<td>" . htmlspecialchars($cat['eventoCategoria_nome']) . "</td>";
  echo "<td>" . $cat['ocorreciaCategoria_qtdAlerta'] . "</td>";
  echo "<td>" . (!empty($cat['eventoCategoria_descricao']) ? htmlspecialchars($cat['eventoCategoria_descricao']) : '-') . "</td>";
  echo "<td><a class='btn btn-danger' href='delete.php?id=" . $cat['eventoCategoria_id'] . "' onclick=\"return confirm('Deseja excluir esta categoria?')\">Deletar</a></td>";
  echo "</tr>";
}
echo "</tbody></table>";
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
