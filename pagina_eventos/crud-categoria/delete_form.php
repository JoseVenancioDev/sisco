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
echo "<table border='1'>
  <tr>
    <th>ID</th>
    <th>Nome da Categoria</th>
    <th>Qtd Alerta</th>
    <th>Descrição</th>
    <th>Ação</th>
  </tr>";

foreach ($categorias as $cat) {
  echo "<tr>";
  echo "<td>" . $cat['eventoCategoria_id'] . "</td>";
  echo "<td>" . htmlspecialchars($cat['eventoCategoria_nome']) . "</td>";
  echo "<td>" . $cat['ocorreciaCategoria_qtdAlerta'] . "</td>";
  echo "<td>" . (!empty($cat['eventoCategoria_descricao']) ? htmlspecialchars($cat['eventoCategoria_descricao']) : '-') . "</td>";
  echo "<td><a href='delete.php?id=" . $cat['eventoCategoria_id'] . "' onclick=\"return confirm('Deseja excluir esta categoria?')\">🗑️ Excluir</a></td>";
  echo "</tr>";
}
echo "</table>";
?>
