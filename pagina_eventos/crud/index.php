<?php 
include 'db.php';

$colaboradores = [
  '4786271X' => 'WERBSON FALCAO DE LIMA',
  '01952' => 'Raphael Sanzio de Carvalho Silva',
  '9788191X' => 'MARIO FAGNER LOUREIRO DA ROCHA',
  '81054258' => 'Adriano Jose Sousa dos Anjos',
  '16849219' => 'ROSELENA FERNANDES SILVA'
];

$discentes = [
  '1587238' => 'SAMYA EVELYN DE LIMA SILVA',
  '1686320' => 'BIANCA SOUSA DOS SANTOS',
  '1687262' => 'RAFAEL SANTOS SILVA'
];

$responsaveis = [
  '1' => 'FRANCISCO ANTONIO DE FREITAS DO NASCIMENTO',
  '2' => 'JOSE WIRATAN MARQUES',
  '3' => 'ANTONIO MACIEL DE OLIVEIRA'
];

$categorias = [
  '1' => 'Impontualidade',
  '2' => 'Fardamento incompleto',
  '3' => 'Acessórios inapropriados'
];

$motivos = [
  '1' => 'Transporte atrasou',
  '2' => 'Ausência da blusa da farda',
  '3' => 'Boné, toca ou chapeú'
];

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
  echo "</tr>";
}
echo "</table>";
?>
