<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf()
    {
        // Dados que serão passados para o PDF
       $data = [
    'empresa' => 'Diamond  Tech Ltda.',
    'numero' => '2025-001',
    'data' => now()->format('d/m/Y'),
    'cliente' => 'Lote Bernardo Macango',
    'endereco' => 'Rua Central, 1000',
    'itens' => [
        ['descricao' => 'Produto A', 'quantidade' => 2, 'valor' => 50.00],
        ['descricao' => 'Produto B', 'quantidade' => 1, 'valor' => 100.00],
    ],
    'total' => 200.00,
];
        // HTML que será convertido em PDF
        $html = view('pdf.tamplate', $data)->render();

        // Configuração do mPDF
        $mpdf = new Mpdf([
            'mode' => 'utf-8',          // Codificação UTF-8
            'format' => 'A4',            // Formato A4
            'default_font' => 'arial',   // Fonte padrão
            'margin_left' => 10,         // Margem esquerda
            'margin_right' => 10,        // Margem direita
            'margin_top' => 15,          // Margem superior
            'margin_bottom' => 15,       // Margem inferior
        ]);

        // Adiciona o HTML ao PDF
        $mpdf->WriteHTML($html);

        // Retorna o PDF para o navegador
        return $mpdf->Output('Fatura.pdf', 'I'); // 'I' = Abre no navegador
    }
}