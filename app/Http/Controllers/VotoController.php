<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voto;
use Illuminate\Support\Facades\Auth;

class VotoController extends Controller
{
    public function guardarVoto(Request $request)
    {
        $request->validate([
        'local_id' => 'required|integer',
        'nivel' => 'required|in:bajo,medio,alto',
    ]);

        Voto::create([
        'local_id' => $request->local_id,
        'nivel' => $request->nivel
    ]);

        return back()->with('success', '✅ ¡Voto registrado correctamente!');
    }
}
