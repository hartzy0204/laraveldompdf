<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
        // Example data to pass to the Blade view
        $data = [
            'title' => 'Laravel PDF Example',
            'date' => date('m/d/Y'),
        ];

        // Load the Blade view and pass data to it
        $pdf = PDF::loadView('pdf_template', $data);

        // Define a filename for the PDF
        $fileName = 'document.pdf';

        // Save the PDF to the storage directory
        Storage::put('public/pdfs/' . $fileName, $pdf->output());

        // Stream the PDF to the browser
        return $pdf->stream($fileName);
    }
}
