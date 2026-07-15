<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $response = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/cargos');

        if ($response->failed()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'No fue posible obtener los cargos.');
        }

        $cargos = $response->json();

        return view('cargos.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function store(Request $request)
    {
        $response = Http::withToken(Session::get('token'))
            ->post(env('API_URL') . '/cargos', [
                'nombre_cargo' => $request->nombre_cargo,
                'descripcion' => $request->descripcion,
            ]);

        if ($response->successful()) {

            return redirect()
                ->route('cargos.index')
                ->with('success', 'Cargo registrado correctamente.');
        }

        return back()
            ->withErrors($response->json())
            ->withInput();
    }
}
