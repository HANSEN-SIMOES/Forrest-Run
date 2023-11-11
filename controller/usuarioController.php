<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/projetoNovo/config/BD.php"; 

$usuarioModel = new UsuarioModel();

$acao = $_GET["acao"]; 

if ($acao =="create"){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuarioModel->inserir($nome, $email, $senha); 

    echo "<script>alert('usuario cadastrado com sucesso');
                    location.href='/projetoNovo/cadastro.php';</script>"; 
}
?>