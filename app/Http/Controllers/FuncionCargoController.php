<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FuncionCargoController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/funciones-cargo', [
                'page' => $request->page
            ]);

        if ($response->failed()) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'No fue posible obtener las funciones.');
        }

        $funciones = $response->json();

        return view('funciones.index', compact('funciones'));
    }

    public function create()
    {
        $response = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/cargos');

        if ($response->failed()) {
            return redirect()
                ->route('funciones.index')
                ->with('error', 'No fue posible obtener los cargos.');
        }

        $cargos = $response->json();

        return view('funciones.create', compact('cargos'));
    }

    public function store(Request $request)
    {
        $response = Http::withToken(Session::get('token'))
            ->post(env('API_URL') . '/funciones-cargo', [
                'descripcion_funcion' => $request->descripcion_funcion,
                'estado' => $request->estado,
                'id_cargo' => $request->id_cargo,
            ]);

        if ($response->successful()) {

            return redirect()
                ->route('funciones.index')
                ->with('success', 'Función registrada correctamente.');
        }

        return back()
            ->withErrors($response->json())
            ->withInput();
    }

    public function edit($id)
    {
        $funcionResponse = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/funciones-cargo/' . $id);

        $cargosResponse = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/cargos');

        if ($funcionResponse->failed() || $cargosResponse->failed()) {

            return redirect()
                ->route('funciones.index')
                ->with('error', 'No fue posible cargar la información.');
        }

        $funcion = $funcionResponse->json();
        $cargos = $cargosResponse->json();

        return view('funciones.edit', compact('funcion', 'cargos'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken(Session::get('token'))
            ->put(env('API_URL') . '/funciones-cargo/' . $id, [
                'descripcion_funcion' => $request->descripcion_funcion,
                'estado' => $request->estado,
                'id_cargo' => $request->id_cargo,
            ]);

        if ($response->successful()) {

            return redirect()
                ->route('funciones.index')
                ->with('success', 'Función actualizada correctamente.');
        }

        return back()
            ->withErrors($response->json())
            ->withInput();
    }

    public function destroy($id)
    {
        $response = Http::withToken(Session::get('token'))
            ->delete(env('API_URL') . '/funciones-cargo/' . $id);

        if ($response->successful()) {

            return redirect()
                ->route('funciones.index')
                ->with('success', 'Función eliminada correctamente.');
        }

        return redirect()
            ->route('funciones.index')
            ->with('error', 'No fue posible eliminar la función.');
    }
}
