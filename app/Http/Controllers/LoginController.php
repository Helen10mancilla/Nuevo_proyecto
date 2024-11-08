<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    protected function authenticated(Request $request, $user)
{
    // Verificamos el rol del usuario para redirigir
    if ($user->role === 'admin') {
        return redirect()->route('admin.panel');  // Ruta del panel de administrador
    }
    
    return redirect()->route('home');  // Redirige al home si no es admin
}
}


    return redirect()->route('home');  // Redirige al home si no es admin

