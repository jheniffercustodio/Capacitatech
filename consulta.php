<!DOCTYPE html>
<html>
<head>
    <title>Resultados da Consulta</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    </body>
</html>

<?php
// Inclui o arquivo de conexão
include 'conexao.php';

// Obtém os parâmetros do formulário
$nome = $_GET['nome'] ?? '';
$matricula = $_GET['matricula'] ?? '';

// Monta a consulta SQL dinamicamente
$sql = "SELECT * FROM treinamentos WHERE 1=1";
if (!empty($nome)) {
    $sql .= " AND nome_colaborador LIKE :nome";
}
if (!empty($matricula)) {
    $sql .= " AND matricula = :matricula";
}

$stmt = $pdo->prepare($sql);
if (!empty($nome)) {
    $stmt->bindValue(':nome', '%' . $nome . '%');
}
if (!empty($matricula)) {
    $stmt->bindValue(':matricula', $matricula);
}
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Exibe os resultados
if (count($resultados) == 0) {
    echo "<script>showAlert();</script>";
}
if (count($resultados) > 0) {
    echo "<table>
        <tr>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Função</th>
            <th>Treinamento</th>
            <th>Data Início</th>
            <th>Data Conclusão</th>
            <th>Status</th>
            <th>Validade</th>
        </tr>";
    foreach ($resultados as $linha) {
        echo "<tr>
            <td>{$linha['nome_colaborador']}</td>
            <td>{$linha['matricula']}</td>
            <td>{$linha['funcao']}</td>
            <td>{$linha['treinamento']}</td>
            <td>{$linha['data_inicio']}</td>
            <td>{$linha['data_conclusao']}</td>
            <td>{$linha['status']}</td>
            <td>{$linha['validade']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum resultado encontrado para a sua pesquisa.Preencha o(s) campo(s) novamente.";
}
?>
