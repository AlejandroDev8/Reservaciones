<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->rol === 0) {
            // Si el usuario tiene rol 0, solo se muestran sus reservaciones
            $reservaciones = Reservacion::where('user_id', $user->id)->get();
        } elseif ($user->rol === 1) {
            // Si el usuario tiene rol 1, se muestran todas las reservaciones
            $reservaciones = Reservacion::all();
        } else {
            // Otros roles no tienen acceso a esta página
            abort(403, 'No tiene permiso para acceder a esta página.');
        }

        return view('reservaciones.index', compact('reservaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Reservacion::class);
        return view('reservaciones.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservacion $reservacion)
    {
        $this->authorize('update', $reservacion);

        return view('reservaciones.edit', [
            'reservacion' => $reservacion
        ]);
    }
}
