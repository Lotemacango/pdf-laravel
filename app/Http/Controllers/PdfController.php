<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PdfController extends Controller
{
    public function gerarPdf()
    {
       
        $mpdf = new Mpdf();
        $mpdf->WriteHTML('<h1>PDF gerado com mPDF!</h1>');









     $mpdf->WriteHTML('________________________________________________</h1>  </hr>  ');
        return response($mpdf->Output('', 'S'))->header('Content-Type', 'application/pdf');
    }
}