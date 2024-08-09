<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $data = [ 'holidays' => Holiday::all()];
        $pdf = Pdf::loadView('pdf.holiday', $data);
        return $pdf->download('invoice.pdf');
    }
}
