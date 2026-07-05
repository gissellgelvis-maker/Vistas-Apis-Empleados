<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Mostrar la vista de inicio de sesión.
     */
    public function index()
    {
        return view('auth.login');
    }

    
    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Consumir la API
        $response = Http::post(env('API_URL') . '/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Si ocurre un error
        if ($response->failed()) {
            return back()
                ->withErrors([
                    'error' => $response->json()['message'] ?? 'No fue posible registrar el usuario.'
                ])
                ->withInput();
        }

        // Obtener la respuesta de la API
        $data = $response->json();

        // Guardar el token y el usuario en la sesión
        Session::put('token', $data['token']);
        Session::put('user', $data['user']);

        // Redirigir al dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Procesar el inicio de sesión.
     */
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Enviar la petición a la API
        $response = Http::post(env('API_URL') . '/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Si las credenciales son incorrectas
        if ($response->failed()) {
            return back()->withErrors([
                'email' => 'Correo o contraseña incorrectos.'
            ])->withInput();
        }

        // Obtener los datos devueltos por la API
        $data = $response->json();

        // Guardar el token y el usuario en la sesión
        Session::put('token', $data['token']);
        Session::put('user', $data['user']);

        // Redirigir al dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Mostrar el dashboard.
     */
    public function dashboard()
    {
        // Verificar si el usuario inició sesión
        if (!Session::has('token')) {
            return redirect()->route('login');
        }

        return view('dashboard.index');
    }

    /**
     * Cerrar sesión.
     */
    public function logout() {}
}
