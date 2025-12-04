<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SalaVirtual;
use Illuminate\Http\Request;

class SalaVirtualController extends Controller
{
    public function index(Request $request)
    {
        $categoria = $request->input('categoria');
        $categorias = SalaVirtual::CATEGORIAS;

        $salas = SalaVirtual::when($categoria, function ($query) use ($categoria) {
                return $query->where('categoria', $categoria);
            })
            ->orderBy('titulo', 'asc')
            ->get();

        return view('web.salavirtual-pages.salas-virtuales-page', compact('salas', 'categorias', 'categoria'));
    }

    public function show($slug)
    {
        $sala = SalaVirtual::where('slug', $slug)->firstOrFail();

        $exhibiciones = $sala->exhibiciones()->orderBy('titulo', 'asc')->get();
        return view('web.salavirtual-pages.sala-virtual-page', compact('sala', 'exhibiciones'));
    }
}
