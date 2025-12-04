<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Exhibicion;
use Illuminate\Http\Request;

class ExhibicionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoria = $request->input('categoria');

        $categorias = Exhibicion::CATEGORIAS;

        $query = Exhibicion::query()
            ->where('estado', 'Publicado');

        // FILTRO: buscador
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('titulo', 'like', "%$search%")
                ->orWhere('descripcion', 'like', "%$search%");
            });
        }

        // FILTRO: categoría
        if ($categoria) {
            $query->where('categoria', $categoria);
        }

        // Resultados
        $exhibiciones = $query
            ->orderBy('titulo', 'asc')
            ->paginate(12)
            ->withQueryString();

        return view('web.exhibicion-pages.exhibiciones-page', compact(
            'exhibiciones',
            'categorias',
            'search',
            'categoria'
        ));
    }

    public function show($slug)
    {
        $exhibicion = Exhibicion::where('slug', $slug)->firstOrFail();

        return view('web.exhibicion-pages.exhibicion-page', compact('exhibicion'));
    }
}
