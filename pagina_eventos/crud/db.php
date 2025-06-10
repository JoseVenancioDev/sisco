<?php
$host = 'localhost';
$user = 'root';
$pass = 'bdjmf';
$dbname = 'bd_jmf';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}
?>
