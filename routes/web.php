<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\WelcomeController;
use App\Models\Venta;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;


Route::get('/', [WelcomeController::class, 'welcome']);

Route::get('/admin_panel', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/jaja', [DashboardController::class, 'jaja'])->middleware(['auth', 'verified']);
Route::middleware('auth')->group(function () {
    
    //ruta categorias
    Route::resource('/categoria',CategoriaController::class);
    //ruta productos
    Route::resource('/producto',ProductoController::class);
    //ruta Ventas
    Route::resource('/venta',VentaController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //pdf
    Route::get('/pdfProductos', [PdfController::class, 'pdfProductos'])->name('pdf.productos');
});


// Ruta del panel de administrador, solo accesible si el usuario tiene el rol de admin
Route::get('/admin', function () {
    return view('admin_panel');
})->middleware('auth')->name('admin.panel');

// Ruta del panel de cliente, solo accesible si el usuario tiene el rol de cliente
Route::get('/cliente', function () {
    return view('client_panel');
})->middleware('auth')->name('client.panel');

Route::get('/admin', function() {
    return view('admin_panel');  // Esta es la vista que se carga
});
Route::get('/cliente', function () {
    return view('vista_cliente'); // Usa el nombre correcto de la vista aquí
});




require __DIR__.'/auth.php';
