<title>Sisco - Eventos</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">



<style>
  /* Estilo customizado para o input nome do arquivo */
  #nomeArquivo {
    max-width: 300px;
    margin-bottom: 1rem;
    border-radius: 0.5rem;
    border: 2px solid #0d6efd;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    transition: border-color 0.3s ease;
  }
  #nomeArquivo:focus {
    outline: none;
    border-color: #0a58ca;
    box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
  }

  /* Estilo dos botões para um visual mais "clean" e moderno */
  .dt-button {
    background-color: #0d6efd !important;
    border: none !important;
    color: white !important;
    border-radius: 0.4rem !important;
    padding: 0.375rem 0.75rem !important;
    font-weight: 600 !important;
    box-shadow: 0 2px 5px rgb(13 110 253 / 0.4);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    margin-right: 0.5rem;
  }
  .dt-button:hover {
    background-color: #0a58ca !important;
    box-shadow: 0 4px 10px rgb(10 88 202 / 0.6);
  }
  .dt-button:focus {
    outline: none !important;
    box-shadow: 0 0 8px 3px rgba(13, 110, 253, 0.75) !important;
  }
</style>

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

// Botão de voltar
echo "<a href='../cadastro-eventos/index2.html' style='display: inline-block; margin: 20px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>⬅ Voltar para Início</a>";
echo "<h2>Lista de Eventos</h2>";
$result = $conn->query("SELECT * FROM tb_sisco_evento");
echo "<table border='1' id='tabelaEventos' class='table table-striped table-bordered' style='width:100%'>
  <thead>
  <tr>
    <th>ID</th>
    <th>Colaborador</th>
    <th>Discente</th>
    <th>Responsável</th>
    <th>Categoria</th>
    <th>Motivo</th>
    <th>Data</th>
    <th>Hora</th>
    <th>Observação</th>
  </tr>
  </head>
  <tbody>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['evento_id'] . "</td>";
  echo "<td>" . ($colaboradores[$row['evento_idColaborador']] ?? 'Desconhecido') . "</td>";
  echo "<td>" . ($discentes[$row['evento_idDiscente']] ?? 'Desconhecido') . "</td>";
  echo "<td>" . ($responsaveis[$row['evento_idResponsavel']] ?? 'Desconhecido') . "</td>";
  echo "<td>" . ($categorias[$row['evento_idCategoria']] ?? 'Desconhecido') . "</td>";
  echo "<td>" . ($motivos[$row['evento_idMotivo']] ?? 'Desconhecido') . "</td>";
  echo "<td>" . $row['evento_data'] . "</td>";
  echo "<td>" . $row['evento_hora'] . "</td>";
  echo "<td>" . (!empty($row['evento_observacao']) ? htmlspecialchars($row['evento_observacao']) : '-') . "</td>";
  echo "</tr>";
}
echo "</tbody></table>";
?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables CSS e JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#tabelaEventos').DataTable({
      dom: 'Bfrtip',
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
      }
    });
  });
</script>

