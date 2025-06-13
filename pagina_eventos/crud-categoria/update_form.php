<?php
include 'db.php';

echo "<a href='../categoria_eventos/index.html' style='display: inline-block; margin: 20px 0; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>⬅ Voltar para Início</a>";

$result = $conn->query("SELECT * FROM tb_sisco_eventocategoria");

echo "<table border='1' style='border-collapse: collapse;'>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Qtd Alerta</th>
    <th>Ação</th>
  </tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['eventoCategoria_id'] . "</td>";
  echo "<td>" . $row['eventoCategoria_nome'] . "</td>";
  echo "<td>" . (!empty($row['eventoCategoria_descricao']) ? htmlspecialchars($row['eventoCategoria_descricao']) : '-') . "</td>";
  echo "<td>" . ($row['ocorreciaCategoria_qtdAlerta'] ?? '3') . "</td>"; // fallback ao default
  echo "<td><a href='edit.php?id=" . $row['eventoCategoria_id'] . "'>📝 Editar</a></td>";
  echo "</tr>";
}
echo "</table>";

$conn->close();
?>
