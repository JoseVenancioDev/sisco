<?php
include '../crud/db.php';

$categoriaId = isset($_GET['eventoCategoria_id']) ? $_GET['eventoCategoria_id'] : null;

if ($categoriaId) {
    $query = "SELECT ocorreciaCategoria_qtdAlerta 
              FROM tb_sisco_eventocategoria 
              WHERE eventoCategoria_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $categoriaId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['ocorreciaCategoria_qtdAlerta' => $row['ocorreciaCategoria_qtdAlerta']]);
    } else {
        echo json_encode(['ocorreciaCategoria_qtdAlerta' => 0]);
    }
} else {
    echo json_encode(['ocorreciaCategoria_qtdAlerta' => 0]);
}
?>