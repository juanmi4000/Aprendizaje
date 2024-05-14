<?php

/* Routes */
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

/* :: para llamar a un método estático */
/* Cuando se hace una llamada por / se devuelve la vista que en este caso es welcome.blade.php */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludos', function () {
    return view('app');
});

Route::get('/services', function () {
    return "Hola a todos desde una ruta";
});

/* Route::get('/tareas', function () {
    /* todo es la carpeta de la aplicación y podemos llamar a cualquier archivo de la carpeta con punto
    return view('todos.index');
})->name('todos'); */

Route::get('/tareas', [TodosController::class, 'index'])->name('todos');
Route::post('/tareas', [TodosController::class, 'store'])->name('todos');

Route::get('/tareas/{id}', [TodosController::class, 'show'])->name('todos-edit');
Route::patch('/tareas/{id}', [TodosController::class, 'update'])->name('todos-update');
Route::delete('/tareas/{id}', [TodosController::class, 'destroy'])->name('todos-destroy');

/* De esta forma hacemos que se llamen según la clase */
Route::resource('categories', CategoriesController::class);




