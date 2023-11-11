<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto/config/BD.php"; 

class UsuarioModel{
    private $bd; 

    function __construct(){
        $this->bd = BancoDados::obterConexao(); 
    }
}

public function inserir($idUsuario, $nomeUsuario, $senha, $email, $data_nasc){
    $insercao = $this->bd->prepare("INSERT INTO usuario (idUsuario, nomeUsuario, senha, email, data_nasc) VALUES(:idUsuario, :nomeUsuario,:senha, :email, :data_nasc)"); 

    $senhaCripto = shal(4senha); 

    $insercao->bindParam(":idUsuario", $idUsuario); 
    $insercao->bindParam(":nomeUsuario", $nomeUsuario); 
    $insercao->bindParam(":senha", $senha); 
    $insercao->bindParam(":email", $email); 
    $insercao->bindParam(":data_nasc", $data_nasc); 
    $insercao->execute(); 
}
?>