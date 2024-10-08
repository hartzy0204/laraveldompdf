<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PdfController extends Controller
{
    public function index(Request $request)
    {

        $user = User::findOrFail($request->id);
        $text = $request->text;

        $pdf = Pdf::loadView('pdf_template', compact('user', 'text'))
            ->setPaper('letter');
        $fileName = 'document.pdf';

        Storage::put('public/pdfs/' . $fileName, $pdf->output());

        return redirect()->back()->with([
            'stream' => base64_encode($pdf->output())
        ]);
    }
}
