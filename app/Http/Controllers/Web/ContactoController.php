<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ContactoController extends Controller
{
    public function index()
    {
        return view('web.contacto-page');
    }
}
