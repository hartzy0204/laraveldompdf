<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class PdfController extends Controller
{
    public function index($id)
    {
        // dd($request->all());

       $user = User::findOrFail($id);


        // Load the Blade view and pass data to it
        $pdf = PDF::loadView('pdf_template', compact('user'));

        // Define a filename for the PDF
        $fileName = 'document.pdf';

        // Save the PDF to the storage directory
        Storage::put('public/pdfs/' . $fileName, $pdf->output());

        // Stream the PDF to the browser
        return $pdf->stream($fileName);
    }
}
