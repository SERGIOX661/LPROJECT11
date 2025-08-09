<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voto;
use Carbon\Carbon;

class AglomeracionController extends Controller
{
    // Registrar un voto
    public function votar(Request $request)
    {
        // Validación del formulario
        $request->validate([
            'punto' => 'required|string',
            'nivel' => 'required|in:bajo,medio,alto'
        ]);

        // Crear un nuevo voto con estado vigente
        Voto::create([
            'local_id' => $this->getLocalId($request->punto),
            'nivel' => $request->nivel,
            'estado' => 'vigente'
        ]);

        // Actualizar votos caducados automáticamente
        self::actualizarEstados();

        return back()->with('success', '¡Gracias por votar!');
    }

    // Obtener el nivel actual para un punto
    public static function obtenerNivelActual($punto)
    {
        self::actualizarEstados(); // <- Limpieza automática

        $localId = self::getLocalId($punto);

        return Voto::where('local_id', $localId)
            ->where('estado', 'vigente') // Solo votos vigentes
            ->selectRaw('nivel, COUNT(*) as total')
            ->groupBy('nivel')
            ->orderByDesc('total')
            ->value('nivel');
    }

    // Marcar como caducados los votos con más de 2 minutos
    public static function actualizarEstados()
    {
        Voto::where('estado', 'vigente')
            ->where('created_at', '<', Carbon::now()->subMinutes(2))
            ->update(['estado' => 'caducado']);
    }

    // Convertir el nombre del punto al ID del local
    private static function getLocalId($punto)
    {
        return match ($punto) {
            'punto1' => 1,
            'punto2' => 2,
            'punto3' => 3,
            'punto4' => 4,
            'punto5' => 5,
            'punto6' => 6,
            default => null,
        };
    }
}
