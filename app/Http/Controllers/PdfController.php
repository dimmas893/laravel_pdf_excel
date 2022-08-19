<?php

namespace App\Http\Controllers;

use App\Models\User;
use PDF;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $data = User::all();
        $total = User::count();

        $pdf = PDF::loadView('myPDF', [
            'data' => $data,
            'total' => $total
        ]);

        return $pdf->download('user.pdf');
    }
}
