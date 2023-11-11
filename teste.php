<?php
// Conectar ao banco de dados (substitua pelos seus detalhes de conexão)
$servername = "localhost";
$username = "root";
$password = "";
$database = "teste";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para selecionar todos os alunos
$sql = "SELECT * FROM alunos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir os dados de cada aluno
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Email: " . $row["email"]. "<br>";
        // ... (exibir outros dados conforme necessário)
    }
} else {
    echo "Nenhum resultado encontrado na tabela alunos.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>