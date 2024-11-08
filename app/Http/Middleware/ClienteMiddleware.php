use Illuminate\Support\Facades\Auth;

public function redirigirSegunRol() {
    $user = Auth::user();

    if ($user->role == 'cliente') {
        return redirect()->route('cliente');
    } else {
        // Redirige a otras vistas según el rol
        return redirect()->route('otroRol');
    }
}
