<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $days = $_POST['day'];
    $preWorkouts = $_POST['preWorkout'];
    $distances = $_POST['distance'];
    $methods = $_POST['method'];
    $speeds = $_POST['speed'];
    $times = $_POST['time'];
    $paces = $_POST['pace'];
    $observations = $_POST['observations'];

    // Cria um novo objeto DOMPDF
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $dompdf = new Dompdf($options);

    // Conteúdo HTML para o PDF
    $html = '<h1>Relatório de Treinamento</h1>';

    // Itera sobre os dados do formulário e adiciona ao HTML
    for ($i = 0; $i < count($days); $i++) {
        $html .= '<h2>Dia da Semana: ' . htmlspecialchars($days[$i]) . '</h2>';
        $html .= '<p><strong>Pré Treino:</strong> ' . htmlspecialchars($preWorkouts[$i]) . '</p>';
        $html .= '<p><strong>Distância:</strong> ' . htmlspecialchars($distances[$i]) . '</p>';
        $html .= '<p><strong>Método:</strong> ' . htmlspecialchars($methods[$i]) . '</p>';
        $html .= '<p><strong>Velocidade:</strong> ' . htmlspecialchars($speeds[$i]) . '</p>';
        $html .= '<p><strong>Tempo:</strong> ' . htmlspecialchars($times[$i]) . '</p>';
        $html .= '<p><strong>Ritmo Min/km:</strong> ' . htmlspecialchars($paces[$i]) . '</p>';
        
        // Verifica se há observações para o dia atual
        if (isset($observations[$i])) {
            $html .= '<p><strong>Observações:</strong> ' . htmlspecialchars($observations[$i]) . '</p>';
        } else {
            $html .= '<p><strong>Observações:</strong> Nenhuma observação fornecida.</p>';
        }
        
        $html .= '';
    }

    // Carrega o conteúdo HTML no DOMPDF
    $dompdf->loadHtml($html);

    // Renderiza o PDF
    $dompdf->render();

    // Nome do arquivo PDF
    $filename = "relatorio_treinamento.pdf";

    // Envia o PDF para o navegador para download
    $dompdf->stream($filename, array("Attachment" => 0));
    exit();
}
?>
