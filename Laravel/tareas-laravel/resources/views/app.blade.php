<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mis tareas</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
		<style>
			body {
				margin: 0;
				padding: 0;
				font-family: sans-serif;
			}
			.color-container {
				width: 16px;
				height: 16px;
				display: inline-block;
				border-radius: 5px;
			}

			a {
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<header>
			<ul class="nav justify-content-center">
				<li class="nav-item">
					<p class="nav-link">Mis tareas</p>
				</li>
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="{{ route('todos') }}">Tareas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('categories.index') }}">Categorías</a>
				</li>
			</ul>
		</header>
        <!-- Es una directiva que pone un contenedor de contenido en el que se colocan los elementos que se quieran mostrar -->
        @yield('content')
	</body>
</html>

