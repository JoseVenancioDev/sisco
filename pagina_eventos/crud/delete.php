<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM tb_evento WHERE id=$id");
header("Location: index.php");
?>
