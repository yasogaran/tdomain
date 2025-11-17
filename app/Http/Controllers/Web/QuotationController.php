<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class QuotationController extends Controller
{
    public function create(): View
    {
        return view('pages.request-quote');
    }
}
