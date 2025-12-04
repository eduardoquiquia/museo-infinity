<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Exhibicion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $eventos = Evento::where('estado', 'activo')
            ->where('fecha', '>=', now()->toDateString())
            ->orderBy('fecha', 'asc')
            ->take(2)
            ->get();

        $exhibiciones = Exhibicion::where('destacada', true)
            ->take(3)
            ->get();

        return view('web.home-page', compact('eventos', 'exhibiciones'));
    }
}
