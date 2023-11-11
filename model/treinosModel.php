<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/projeto/config/BD.php"; 

class professorModel{
    private $bd; 

    function __construct(){
        $this->bd = BancoDados::obterConexao(); 
    }
}

public function inserir($idTreino, $idAluno, $dataTreino, $preTreino, $distancia, $metodo, $velocidade, $tempo, $ritmo, $observacao){
    $insercao = $this->bd->prepare("INSERT INTO treinos (idTreino, IdAluno, dataTreino, preTreino, distancia, metodo, velocidade, tempo, ritmo, observacao) VALUES(:idTreinador, :nomeTreinador,:senha, :idUsuario)"); 

    $senhaCripto = shal(4senha); 

    $insercao->bindParam(":idTreinador", $idTreino); 
    $insercao->bindParam(":nomeTreinador", $nomeTreinador); 
    $insercao->bindParam(":senha", $senha); 
    $insercao->bindParam(":idUsuario", $idUsuario); 
    $insercao->execute(); 
}
?>