<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GestionLineaController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified'])->name('dashboard')->prefix('dashboard')->group(function() {
    Route::get('/', [indexController::class, 'dashboard']);
    
});

Route::middleware(['auth', 'role:admin|jefe|empleado'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

    Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');

    Route::resource('/permissions', PermissionController::class);

    Route::resource('/users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');


});

// Route::get('admin/profile', [UserController::class, 'profile'])->name('admin.users.profile');


Route::middleware(['auth', 'role:admin|jefe'])->name('personal.')->prefix('personal')->group(function() {
    Route::resource('/', PersonalController::class);
    Route::get('/{personal}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
    Route::put('/{personal}', [PersonalController::class, 'update'])->name('personal.update');
    Route::delete('/{personal}', [PersonalController::class, 'destroy'])->name('personal.destroy');
});

Route::middleware(['auth', 'role:admin|jefe'])->name('lineas.')->prefix('lineas')->group(function() {
    Route::resource('/', LineaController::class);
    Route::get('/{linea}/edit', [LineaController::class, 'edit'])->name('lineas.edit');
    Route::put('/{linea}', [LineaController::class, 'update'])->name('lineas.update');
    Route::delete('/{linea}', [LineaController::class, 'destroy'])->name('lineas.destroy');
});

Route::middleware(['auth', 'role:admin|jefe'])->name('gestionLineas.')->prefix('gestionLineas')->group(function() {
    Route::resource('/', GestionLineaController::class);
    Route::get('/{gestionLinea}/edit', [GestionLineaController::class, 'edit'])->name('gestionLineas.edit');
    Route::put('/{gestionLinea}', [GestionLineaController::class, 'update'])->name('gestionLineas.update');
    Route::delete('/{gestionLinea}', [GestionLineaController::class, 'destroy'])->name('gestionLineas.destroy');
});

Route::middleware(['auth', 'role:admin|jefe|empleado'])->name('reportes.')->prefix('reportes')->group(function() {
    Route::resource('/', ReporteController::class);
});

Route::post('reportes/report', [ReporteController::class, 'report'])->name('reportes.report');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
