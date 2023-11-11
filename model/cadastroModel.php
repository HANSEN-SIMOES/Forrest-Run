<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto/config/BD.php"; 

class UsuarioModel{
    private $bd; 

    function __construct(){
        $this->bd = BancoDados::obterConexao(); 
    }
}

public function inserir($nome, $email, $senha){
    $insercao = $this->bd->prepare("INSERT INTO usuario (nome, email, senha) VALUES(:nome,:email, :senha)"); 

    $senhaCripto = shal(4senha); 

    $insercao->bindParam(":nome", $nome); 
    $insercao->bindParam(":email", $email); 
    $insercao->bindParam(":senha", $senha); 
    $insercao->execute(); 
}
?>