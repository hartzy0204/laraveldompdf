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


       $user = User::findOrFail($id);


        $pdf = PDF::loadView('pdf_template', compact('user'));

        $fileName = 'document.pdf';

        Storage::put('public/pdfs/' . $fileName, $pdf->output());

        return $pdf->stream($fileName);
    }
}
