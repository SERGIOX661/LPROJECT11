<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        // Validar que el contenido no venga vacío
        $request->validate([
        'contenido' => 'required|string|max:255',
        'punto' => 'required|string'
    ]);

    Comentario::create([
        'contenido' => $request->contenido,
        'punto' => $request->punto,
        'user_id' => auth()->id()
    ]);



        // Volver a la misma página
        return redirect()->back();
    }
}
