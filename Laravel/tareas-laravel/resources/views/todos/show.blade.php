@extends('app');

@section('content')
<!-- php artisan make:model nombre-modelo -m => esto sirve para crear un modelo y tener una relacion entre nuestras tablas y el modelo  -->
	<div class="container w-25 border p-4 mt-4"> <form
		action="{{ route('todos-update', ['id' => $todo->id]) }}" method="POST">
        @method('PATCH')
		<!-- @csrf => para realizar el post se debe poner esta etiqueta y evitar problemas de seguridad -->
		@csrf

		@if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

		@error('title')
            <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
		<div class="mb-3">
			<label for="title" class="form-label">Título de la tarea</label>
			<input type="text" name="title" class="form-control" aria-describedby="emailHelp" value="{{ $todo->title }}">
		</div>
		<button type="submit" class="btn btn-primary">Actualizar tarea</button>

	</form>
</div>
@endsection

