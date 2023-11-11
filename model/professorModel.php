<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto/config/BD.php"; 

class professorModel{
    private $bd; 

    function __construct(){
        $this->bd = BancoDados::obterConexao(); 
    }
}

public function inserir($idTreinador, $nomeTreinador, $senha, $idUsuario){
    $insercao = $this->bd->prepare("INSERT INTO professor (idTreinador, nomeTreinador, senha, idUsuario) VALUES(:idTreinador, :nomeTreinador,:senha, :idUsuario)"); 

    $senhaCripto = shal(4senha); 

    $insercao->bindParam(":idTreinador", $idTreinador); 
    $insercao->bindParam(":nomeTreinador", $nomeTreinador); 
    $insercao->bindParam(":senha", $senha); 
    $insercao->bindParam(":idUsuario", $idUsuario); 
    $insercao->execute(); 
}
?>