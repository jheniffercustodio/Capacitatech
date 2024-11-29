<?php
$host = 'localhost'; // Endereço do servidor MySQL
$db = 'treinamentos'; // Nome do banco de dados
$user = 'root'; // Usuário do MySQL
$password = 'Jheniffer1307@'; // Senha do MySQL 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
