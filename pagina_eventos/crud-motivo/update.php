<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) die("ID não informado.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['eventoMotivo_nome'];
    $descricao = $_POST['eventoMotivo_descricao'];
    $idCategoria = $_POST['eventoMotivo_idCategoria'];

    $stmt = $conn->prepare("UPDATE tb_sisco_eventomotivo SET eventoMotivo_nome=?, eventoMotivo_descricao=?, eventoMotivo_idCategoria=? WHERE eventoMotivo_id=?");
    $stmt->bind_param("ssii", $nome, $descricao, $idCategoria, $id);

    if ($stmt->execute()) {
        header("Location:  update_form.php");
    exit();
    } else {
        echo "Erro ao atualizar: " . $stmt->error;
    }
}

$result = $conn->query("SELECT * FROM tb_sisco_eventomotivo WHERE eventoMotivo_id = $id");
$motivo = $result->fetch_assoc();
?>

<h2>Editar Motivo</h2>
<form method="POST">
    <label>Motivo:</label>
    <input type="text" name="eventoMotivo_nome" value="<?= $motivo['eventoMotivo_nome'] ?>" required><br>

    <label>Descrição:</label>
    <textarea name="eventoMotivo_descricao"><?= $motivo['eventoMotivo_descricao'] ?></textarea><br>

    <label>Categoria:</label>
    <select name="eventoMotivo_idCategoria">
        <?php
        $cat = $conn->query("SELECT * FROM tb_sisco_eventocategoria ORDER BY eventoCategoria_nome");
        while ($c = $cat->fetch_assoc()):
        ?>
        <option value="<?= $c['eventoCategoria_id'] ?>" <?= $motivo['eventoMotivo_idCategoria'] == $c['eventoCategoria_id'] ? 'selected' : '' ?>>
            <?= $c['eventoCategoria_nome'] ?>
        </option>
        <?php endwhile; ?>
    </select><br>

    <button type="submit">Salvar</button>
</form>
