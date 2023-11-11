<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o ID do aluno selecionado no campo de seleção
    $alunoId = $_POST['aluno_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "teste";
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Verificar a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Consulta preparada para recuperar o nome do aluno selecionado
    $sql = "SELECT nome FROM alunos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $alunoId);
    $stmt->execute();
    $stmt->bind_result($alunoNome);
    $stmt->fetch();
    $stmt->close();
    
    // Criar um novo objeto DOMPDF
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $dompdf = new Dompdf($options);

    // Conteúdo HTML para o PDF
    $html = '<h1>Relatório de Treinamento</h1>';
    $html .= '<h2>Informações do Aluno</h2>';
    $html .= '<p><strong>Nome do Aluno:</strong> ' . htmlspecialchars($alunoNome) . '</p>';

    // Iterar sobre os dados do formulário e adicioná-los ao HTML
    $html .= '<h2>Dados de Treinamento</h2>';
    for ($i = 0; $i < count($_POST['day']); $i++) {
        $html .= '<h3>Dia da Semana: ' . htmlspecialchars($_POST['day'][$i]) . '</h3>';
        $html .= '<p><strong>Pré Treino:</strong> ' . htmlspecialchars($_POST['preWorkout'][$i]) . '</p>';
        $html .= '<p><strong>Distância:</strong> ' . htmlspecialchars($_POST['distance'][$i]) . '</p>';
        $html .= '<p><strong>Método:</strong> ' . htmlspecialchars($_POST['method'][$i]) . '</p>';
        $html .= '<p><strong>Velocidade:</strong> ' . htmlspecialchars($_POST['speed'][$i]) . '</p>';
        $html .= '<p><strong>Tempo:</strong> ' . htmlspecialchars($_POST['time'][$i]) . '</p>';
        $html .= '<p><strong>Ritmo Min/km:</strong> ' . htmlspecialchars($_POST['pace'][$i]) . '</p>';
        
        if (isset($_POST['observations'][$i])) {
            $html .= '<p><strong>Observações:</strong> ' . htmlspecialchars($_POST['observations'][$i]) . '</p>';
        } else {
            $html .= '<p><strong>Observações:</strong> Nenhuma observação fornecida.</p>';
        }

        $html .= '<hr>';
    }

    // Carregar o conteúdo HTML no DOMPDF
    $dompdf->loadHtml($html);

    // Renderizar o PDF
    $dompdf->render();

    // Nome do arquivo PDF
    $filename = "relatorio_treinamento.pdf";

    // Enviar o PDF para o navegador para download
    $dompdf->stream($filename, array("Attachment" => 0));
    exit();
}
?>
