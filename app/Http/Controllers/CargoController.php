<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/cargos', [
                'page' => $request->page
            ]);

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

    public function edit($id)
    {
        $response = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/cargos/' . $id);

        if ($response->failed()) {
            return redirect()
                ->route('cargos.index')
                ->with('error', 'No fue posible obtener el cargo.');
        }

        $cargo = $response->json();

        return view('cargos.edit', compact('cargo'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken(Session::get('token'))
            ->put(env('API_URL') . '/cargos/' . $id, [
                'nombre_cargo' => $request->nombre_cargo,
                'descripcion' => $request->descripcion,
            ]);

        if ($response->successful()) {

            return redirect()
                ->route('cargos.index')
                ->with('success', 'Cargo actualizado correctamente.');
        }

        return back()
            ->withErrors($response->json())
            ->withInput();
    }

    public function destroy($id)
    {
        $response = Http::withToken(Session::get('token'))
            ->delete(env('API_URL') . '/cargos/' . $id);

        if ($response->successful()) {

            return redirect()
                ->route('cargos.index')
                ->with('success', 'Cargo eliminado correctamente.');
        }

        return redirect()
            ->route('cargos.index')
            ->with('error', 'No fue posible eliminar el cargo.');
    }
}
