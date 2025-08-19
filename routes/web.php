<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//ruta para la vista de bienvenida y dashboard principal
Route::get('/', function () {
    return view('welcome');
});

//ruta para la vista de index
Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//rutas de autenticación con Google
Route::get('/google-auth/redirect', function () {
return Socialite::driver('google')->redirect();
})->name('google.redirect');

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate(
        [
            'google_id' => $user_google->id,
        ],
        [
            'name'  => $user_google->name,
            'email' => $user_google->email,
        ]
    );

    // Inicia sesión al usuario
    Auth::login($user);
    return redirect('dashboard');
});

// Ruta del dashboard del administrador
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware(['auth']);

// Ruta para admin/usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware(['auth', 'verified',]);
// Ruta para gestión de usuarios panel crear
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware(['auth', 'verified']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware(['auth', 'verified']);
// Ruta para ver usuario por id
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware(['auth', 'verified']);
// Ruta para ver editar usuario
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware(['auth', 'verified']);
// Ruta para enviar la actualizacion de usuario
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware(['auth', 'verified']);
// Ruta para ver eliminar usuario
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware(['auth', 'verified']);
// Ruta para mandar la eliminacion
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware(['auth', 'verified']);

//rutas de ventas
Route::get('/admin/inventario', [App\Http\Controllers\InventarioController::class, 'index'])->name('admin.inventario.index')->middleware(['auth', 'verified']);
// Ruta para gestión de ventas panel crear
Route::get('/admin/inventario/create', [App\Http\Controllers\InventarioController::class, 'create'])->name('admin.inventario.create')->middleware(['auth', 'verified']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/inventario/create', [App\Http\Controllers\InventarioController::class, 'store'])->name('admin.inventario.store')->middleware(['auth', 'verified']);
// Ruta para ver Venta por id
Route::get('/admin/inventario/{id}', [App\Http\Controllers\InventarioController::class, 'show'])->name('admin.inventario.show')->middleware(['auth', 'verified']);
// Ruta para ver editar Venta
Route::get('/admin/inventario/{id}/edit', [App\Http\Controllers\InventarioController::class, 'edit'])->name('admin.inventario.edit')->middleware(['auth', 'verified']);
// Ruta para enviar la actualizacion Venta
Route::put('/admin/inventario/{id}', [App\Http\Controllers\InventarioController::class, 'update'])->name('admin.inventario.update')->middleware(['auth', 'verified']);
// Ruta para ver eliminar Venta
Route::get('/admin/inventario/{id}/confirm-delete', [App\Http\Controllers\InventarioController::class, 'confirmDelete'])->name('admin.inventario.confirmDelete')->middleware(['auth', 'verified']);
// Ruta para mandar la eliminacion
Route::delete('/admin/inventario/{id}', [App\Http\Controllers\InventarioController::class, 'destroy'])->name('admin.inventario.destroy')->middleware(['auth', 'verified']);


//Rutas para ver usuario activo
//Route::get('/admin/sesiones', [App\Http\Controllers\SessionController::class, 'index'])->name('admin.sesiones.index')->middleware(['auth', 'verified', 'two_factor']);


//rutas AJAX -- valida para obtener los usuarios activos
Route::get('/admin/sesiones', [App\Http\Controllers\SessionController::class, 'index'])->name('admin.sesiones.index')->middleware(['auth', 'verified']);
Route::get('/admin/sesiones/activos', [App\Http\Controllers\SessionController::class, 'obtenerUsuariosActivos'])->name('admin.sesiones.obtener')->middleware(['auth', 'verified']);
