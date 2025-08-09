<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Minimarket - Punto 4</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-4xl border">
    <!-- Título -->
    <div class="mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Minimarket </h2>
        <p class="text-gray-500">Cafetería</p>
    </div>

    <!-- Imagen y Estado -->
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Imagen -->
        <div class="w-full md:w-1/2">
            <img src="{{ asset('punto4.png') }}" alt="Casino UTA" class="rounded-lg shadow">
        </div>

        <!-- Estado Aglomeración -->
        <div class="w-full md:w-1/2 bg-gray-100 p-4 rounded-lg">
            <h3 class="font-semibold mb-2">Estado de Aglomeración</h3>
            <div class="flex items-center justify-between mb-2">
                <div class="text-sm text-gray-700">
                    <strong class="block">Nivel Actual:</strong>
                    <span id="nivel-actual">Presiona refrescar</span>
                    <p id="info-actualizado" class="text-xs text-gray-500 hidden">Actualizado hace unos segundos</p>

                </div>
                <button id="btn-refrescar" type="button" class="text-blue-600 hover:text-blue-800 text-2xl" title="Refrescar">&#10052;</button>
            </div>
            <p class="text-sm text-gray-600 mb-2">
                ¿Cómo está la aglomeración ahora? Tu voto ayuda a otros usuarios.
            </p>

            @auth
<form action="{{ route('votar') }}" method="POST" class="flex justify-between">
    @csrf
    <input type="hidden" name="local_id" value="4">
    <button name="nivel" value="bajo" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded">Bajo</button>
    <button name="nivel" value="medio" class="px-3 py-1 bg-blue-600 text-white rounded">Medio</button>
    <button name="nivel" value="alto" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded">Alto</button>
</form>
@else
<p class="text-sm text-red-500">Debes <a href="{{ route('login') }}" class="text-blue-600 underline">iniciar sesión</a> para votar.</p>
@endauth
</div>
    </div>

    <!-- Métodos de pago y Dietas -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Métodos de pago -->
        <div class="bg-gray-100 p-4 rounded-lg">
            <h3 class="font-semibold mb-2">Métodos de Pago</h3>
            <div class="flex flex-wrap gap-2 text-sm">
                <span class="bg-white px-2 py-1 rounded shadow">Tarjeta</span>
                <span class="bg-white px-2 py-1 rounded shadow">Efectivo</span>
                <span class="bg-white px-2 py-1 rounded shadow">Junaeb</span>
            </div>
        </div>

        <!-- Dietas -->
        <div class="bg-gray-100 p-4 rounded-lg">
            <h3 class="font-semibold mb-2">Dietas</h3>
            <div class="flex flex-wrap gap-2 text-sm">
                <span class="bg-white px-2 py-1 rounded shadow">Vegana</span>
                <span class="bg-white px-2 py-1 rounded shadow">Vegetariana</span>
                <span class="bg-white px-2 py-1 rounded shadow">Celiaca</span>
                <span class="bg-white px-2 py-1 rounded shadow">Proteica</span>
            </div>
        </div>
    </div>


    <!-- Sección de Comentarios -->
<div class="mt-6">
    <button onclick="toggleComentarios()" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">
        Mostrar/Ocultar Comentarios
    </button>

    <div id="comentarios-section" class="hidden">
        <h3 class="text-xl font-semibold mb-2">Comentarios</h3>

        <!-- Lista de comentarios -->
        @php
            $comentarios = \App\Models\Comentario::where('punto', 'punto3')->latest()->take(50)->get();
        @endphp

        <ul class="space-y-2 mb-4">
            @forelse ($comentarios as $comentario)
                <li class="bg-gray-100 p-2 rounded">{{ $comentario->contenido }}</li>
            @empty
                <li class="text-gray-500">Sin comentarios aún.</li>
            @endforelse
        </ul>

        @auth
            <!-- Formulario para comentar -->
            <form action="{{ route('comentarios.store') }}" method="POST" class="flex gap-2">
                @csrf
                <input type="hidden" name="punto" value="punto4">
                <input type="text" name="contenido" placeholder="Escribe tu comentario"
                       class="flex-1 px-2 py-1 border rounded" required>
                <button class="bg-gray-800 text-white px-3 py-1 rounded">Enviar</button>
            </form>
        @else
            <p class="text-sm text-red-500">
                Debes <a href="{{ route('login') }}" class="text-blue-600 underline">iniciar sesión</a> para comentar.
            </p>
        @endauth
    </div>
</div>

<script>
    function toggleComentarios() {
        const section = document.getElementById('comentarios-section');
        section.classList.toggle('hidden');
    }
</script>


    <!-- Información Adicional -->
    <div class="mt-6 bg-gray-100 p-4 rounded-lg">
        <h3 class="font-semibold mb-2">Información Adicional</h3>
        <p class="text-sm text-gray-700">
            <strong>Horario:</strong><br>
            Lunes - Viernes: 7:00 - 21:00<br>
            Sábado - Domingo: 8:00 - 22:00
        </p>
    </div>
</div>

<script>
    document.getElementById('btn-refrescar').addEventListener('click', function () {
        fetch('/nivel-actual/punto4')
            .then(response => response.json())
            .then(data => {
                document.getElementById('nivel-actual').textContent = data.nivel ?? 'Sin datos';
                document.getElementById('info-actualizado').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error al obtener el nivel:', error);
                document.getElementById('nivel-actual').textContent = 'Error';
            });
    });
</script>

</body>
</html>
