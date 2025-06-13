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


echo "<a href='../cadastro-eventos/index2.html' style='display: inline-block; margin: 20px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>⬅ Voltar para Início</a>";

$result = $conn->query("SELECT * FROM tb_sisco_evento");

echo "<table border='1'>
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
    <th>Ação</th>
  </tr>";

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
  echo "<td><a href='delete.php?evento_id=" . $row['evento_id'] . "' onclick=\"return confirm('Deseja excluir?')\">🗑️</a></td>";
  echo "</tr>";
}
echo "</table>";
?>
