<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de que el archivo login.blade.php exista
    }

    // Maneja el inicio de sesión
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirige al dashboard después del inicio de sesión exitoso
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario autenticado

        // Opcional: puedes invalidar la sesión actual
        $request->session()->invalidate();

        // Opcional: regenerar el token CSRF para mayor seguridad
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirige a la página de login
    }
}
