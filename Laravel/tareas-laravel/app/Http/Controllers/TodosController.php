<?php
/* Un controlador es un archivo php que maneja las solicitudes HTTP entrantes y define cómo se deben responder a ellas */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * index para mostrar todos los elementos de la tabla
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formaulario de edicion de un todo
     */

     /* insert */
     public function store(Request $request) {
        /* Validamos los datos de la request */
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save(); /* Guardamos el nuevo elemento en la tabla */

        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
     }

     /* index */
     public function index() {
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]); /* De esta manera le digo que me pase los elementos de la tabla a todos.index. Como si le pasase parámetros */
     }

     /* index */
     public function show($id) {
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]); /* De esta manera le digo que me pase los elementos de la tabla a todos */
     }

     /* index */
     public function update(Request $request, $id) {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();

        /* Se puede utilizar para hacer un debug rápida, pero tener cuidado porque da demasiada información */
        //dd($todo);

        //return view('todos.index', ['success' => 'Tarea actualizada']); /* De esta manera le digo que me pase los elementos de la tabla a todos */
        return redirect()->route('todos', ['id' => $id])->with('success', 'Tarea actualizada!!'); /* redirecionamos */
     }

     /* index */
     public function destroy($id) {
        $todo = Todo::find($id);
        $todo->delete();
        //return view('todos.index', ['todos' => $todos]); /* De esta manera le digo que me pase los elementos de la tabla a todos */
        return redirect()->route('todos')->with('success', 'Tarea eliminada correctamente');
     }
}
