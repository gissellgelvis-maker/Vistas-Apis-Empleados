<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class EmpleadoController extends Controller
{
    public function index()
    {
        // Consumir la API
        $response = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/empleados');

        // Si la API responde con un error
        if ($response->failed()) {
            return redirect()->route('dashboard')
                ->with('error', 'No fue posible obtener los empleados.');
        }

        // Convertir la respuesta JSON en un arreglo
        $empleados = $response->json();

        // Enviar los datos a la vista
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $response = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/cargos');

        if ($response->failed()) {
            return redirect()->route('empleados.index')
                ->with('error', 'No fue posible cargar los cargos.');
        }

        $cargos = $response->json();

        return view('empleados.create', compact('cargos'));
    }

    public function store(Request $request)
    {
        $response = Http::withToken(Session::get('token'))
            ->post(env('API_URL') . '/empleados', [
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'fecha_ingreso' => $request->fecha_ingreso,
                'salario' => $request->salario,
                'id_cargo' => $request->id_cargo,
                'estado' => $request->estado,
            ]);

        if ($response->successful()) {
            return redirect()
                ->route('empleados.index')
                ->with('success', 'Empleado registrado correctamente.');
        }

        if ($response->status() == 422) {

            return back()
                ->withErrors($response->json()['errors'])
                ->withInput();
        }

        return back()
            ->with('error', 'Ocurrió un error inesperado.')
            ->withInput();
    }

    public function edit($id)
    {
        // Obtener el empleado
        $empleadoResponse = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/empleados/' . $id);

        // Obtener los cargos
        $cargosResponse = Http::withToken(Session::get('token'))
            ->get(env('API_URL') . '/cargos');

        if ($empleadoResponse->failed() || $cargosResponse->failed()) {

            return redirect()
                ->route('empleados.index')
                ->with('error', 'No fue posible cargar la información del empleado.');
        }

        $empleado = $empleadoResponse->json();
        $cargos = $cargosResponse->json();

        return view('empleados.edit', compact('empleado', 'cargos'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken(Session::get('token'))
            ->put(env('API_URL') . '/empleados/' . $id, [
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'fecha_ingreso' => $request->fecha_ingreso,
                'salario' => $request->salario,
                'id_cargo' => $request->id_cargo,
                'estado' => $request->estado,
            ]);

        if ($response->successful()) {
            return redirect()
                ->route('empleados.index')
                ->with('success', 'Empleado actualizado correctamente.');
        }

        if ($response->status() == 422) {

            return back()
                ->withErrors($response->json()['errors'])
                ->withInput();
        }

        return back()
            ->with('error', 'No fue posible actualizar el empleado.')
            ->withInput();
    }

    /*Eliminar un empleado */
    public function destroy($id)
    {
        $response = Http::withToken(Session::get('token'))
            ->delete(env('API_URL') . '/empleados/' . $id);

        if ($response->successful()) {

            return redirect()
                ->route('empleados.index')
                ->with('success', 'Empleado eliminado correctamente.');
        }

        return redirect()
            ->route('empleados.index')
            ->with('error', 'No fue posible eliminar el empleado.');
    }
}
