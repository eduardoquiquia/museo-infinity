<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plato;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function index(Request $request)
    {
        $categoria = $request->input('categoria');

        $categorias = Plato::CATEGORIAS;

        $platos = Plato::when($categoria, function ($query) use ($categoria) {
                return $query->where('categoria', $categoria);
            })
            ->orderBy('nombre', 'asc')
            ->get();

        return view('web.restaurante-page', compact('platos', 'categorias', 'categoria'));
    }
}
