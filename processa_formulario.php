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

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $objetivo = $_POST["observations"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];

    // Inserir dados na tabela do banco de dados
    $sql = "INSERT INTO alunos (nome, email, senha, objetivo, idade, sexo, altura, peso)
            VALUES ('$nome', '$email', '$senha', '$objetivo', '$idade', '$sexo', '$altura', '$peso')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
