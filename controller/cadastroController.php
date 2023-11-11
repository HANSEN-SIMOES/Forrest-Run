<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto/config/BD.php"; 

$usuarioModel = new UsuarioModel();

$acao = $_GET["acao"]; 

if ($acao =="create"){
    $nome = $_POST["nome"]
    $email = $_POST["email"]
    $senha = $_POST["senha"]

    $usuarioModel->inserir($nome, $email, $senha); 

    echo "<div class ='card-panel teal lighten-2'>Usuario inserido.</div>"; 
}
?>