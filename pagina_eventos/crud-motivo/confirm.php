<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura e sanitiza os dados
    $nome = trim($_POST['eventoMotivo_nome'] ?? '');
    $descricao = trim($_POST['eventoMotivo_descricao'] ?? '');
    $idCategoria = intval($_POST['eventoMotivo_idCategoria'] ?? 0);

    // Validações
    $erros = [];

    if ($idCategoria === 0) {
        $erros[] = "Categoria inválida. Selecione uma categoria.";
    }

    if (empty($nome)) {
        $erros[] = "O nome do motivo é obrigatório.";
    } elseif (mb_strlen($nome) > 50) {
        $erros[] = "O nome do motivo deve ter no máximo 50 caracteres.";
    }

    if (!empty($descricao) && mb_strlen($descricao) > 300) {
        $erros[] = "A descrição deve ter no máximo 300 caracteres.";
    }

    // Se houver erros, exibe e interrompe
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<p style='color:red;'>$erro</p>";
        }
        exit;
    }

    // Insere no banco
    $stmt = $conn->prepare("INSERT INTO tb_sisco_eventomotivo (eventoMotivo_idCategoria, eventoMotivo_nome, eventoMotivo_descricao) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $idCategoria, $nome, $descricao);

    if ($stmt->execute()) {
        header("Location:  ../motivo-eventos/index.html");
    exit();
    } else {
        echo "<p style='color:red;'>Erro ao cadastrar motivo: " . $stmt->error . "</p>";
    }
}
?>
