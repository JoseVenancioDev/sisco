<?php
include 'db.php';

// Arrays com os dados
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

// Verifica se evento_id foi passado
$evento_id = $_GET['evento_id'] ?? null;
if (!$evento_id) {
    die("ID do evento não informado.");
}

// Busca o evento no banco
$result = $conn->query("SELECT * FROM tb_sisco_evento WHERE evento_id = '$evento_id'");
$evento = $result->fetch_assoc();
if (!$evento) {
    die("Evento não encontrado.");
}
?>

<form action="update.php" method="POST">
    <input type="hidden" name="evento_id" value="<?= $evento['evento_id'] ?>">

    <label>Colaborador:</label>
    <select name="evento_idColaborador">
        <?php foreach ($colaboradores as $id => $nome): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idColaborador'] == $id ? 'selected' : '' ?>>
                <?= $nome ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Responsável:</label>
    <select name="evento_idResponsavel">
        <?php foreach ($responsaveis as $id => $nome): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idResponsavel'] == $id ? 'selected' : '' ?>>
                <?= $nome ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Categoria:</label>
    <select name="evento_idCategoria">
        <?php foreach ($categorias as $id => $desc): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idCategoria'] == $id ? 'selected' : '' ?>>
                <?= $desc ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Motivo:</label>
    <select name="evento_idMotivo">
        <?php foreach ($motivos as $id => $desc): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idMotivo'] == $id ? 'selected' : '' ?>>
                <?= $desc ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Observação:</label>
    <input type="text" name="evento_observacao" value="<?= $evento['evento_observacao'] ?>"><br>

    <label>Data:</label>
    <input type="date" name="evento_data" value="<?= $evento['evento_data'] ?>"><br>

    <label>Hora:</label>
    <input type="time" name="evento_hora" value="<?= $evento['evento_hora'] ?>"><br>

    <label>Discente:</label>
    <select name="evento_idDiscente">
        <?php foreach ($discentes as $id => $nome): ?>
            <option value="<?= $id ?>" <?= $evento['evento_idDiscente'] == $id ? 'selected' : '' ?>>
                <?= $nome ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Salvar</button>
</form>
