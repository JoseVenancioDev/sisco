<title>Sisco - Listar Categorias</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

<?php
include 'db.php';

// Preenche array de categorias (ID => Nome)
$categoria = [];
$query = "SELECT eventoCategoria_id, eventoCategoria_nome FROM tb_sisco_eventocategoria ORDER BY eventoCategoria_nome";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $categoria[$row['eventoCategoria_id']] = $row['eventoCategoria_nome'];
  }
}

// Preenche array de alertas (ID => Quantidade de alertas)
$alerta = [];
$query = "SELECT eventoCategoria_id, ocorreciaCategoria_qtdAlerta FROM tb_sisco_eventocategoria";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $alerta[$row['eventoCategoria_id']] = $row['ocorreciaCategoria_qtdAlerta'];
  }
}

// Preenche array de descrições (ID => Descrição)
$descricao = [];
$query = "SELECT eventoCategoria_id, eventoCategoria_descricao FROM tb_sisco_eventocategoria";
$result = $conn->query($query);
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $descricao[$row['eventoCategoria_id']] = $row['eventoCategoria_descricao'];
  }
}

// Botão de voltar
echo "<a href='../categoria_eventos/index.html' style='display: inline-block; margin: 20px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>⬅ Voltar para Início</a>";

// Exibir tabela
$result = $conn->query("SELECT * FROM tb_sisco_eventocategoria");
echo "<h2>Lista de Categorias</h2>";
echo "<table border='1' id='tabelaCategoria' class='table table-striped table-bordered' style='width:100%'>
  <thead>
  <tr>
    <th>ID</th>
    <th>Categoria</th>
    <th>Alerta</th>
    <th>Descrição</th>
  </tr>
  </thead>
  <tbody>";

while ($row = $result->fetch_assoc()) {
  $id = $row['eventoCategoria_id'];
  echo "<tr>";
  echo "<td>" . $id . "</td>";
  echo "<td>" . ($categoria[$id] ?? '-') . "</td>";
  echo "<td>" . ($alerta[$id] ?? '-') . "</td>";
  echo "<td>" . (!empty($descricao[$id]) ? htmlspecialchars($descricao[$id]) : '-') . "</td>";
  echo "</tr>";
}
echo "</body></table>";
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
