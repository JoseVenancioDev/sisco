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

echo "<table border='1'>
  <tr>
    <th>ID</th>
    <th>Categoria</th>
    <th>Alerta</th>
    <th>Descrição</th>
  </tr>";

while ($row = $result->fetch_assoc()) {
  $id = $row['eventoCategoria_id'];
  echo "<tr>";
  echo "<td>" . $id . "</td>";
  echo "<td>" . ($categoria[$id] ?? '-') . "</td>";
  echo "<td>" . ($alerta[$id] ?? '-') . "</td>";
  echo "<td>" . (!empty($descricao[$id]) ? htmlspecialchars($descricao[$id]) : '-') . "</td>";
  echo "</tr>";
}
echo "</table>";
?>
