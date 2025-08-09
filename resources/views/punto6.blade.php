<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Casino Med - Punto 6</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-4xl border">
    <!-- Título -->
    <div class="mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Casino - Medicina </h2>
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
                    <span>Bajo</span>
                    <p class="text-xs text-gray-500">Actualizado hace 5 minutos</p>
                </div>
                <button class="text-blue-600 hover:text-blue-800 text-2xl" title="Refrescar">&#10052;</button>
            </div>
            <p class="text-sm text-gray-600 mb-2">
                ¿Cómo está la aglomeración ahora? Tu voto ayuda a otros usuarios.
            </p>
            <div class="flex justify-between">
                <button class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded">Bajo</button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded">Medio</button>
                <button class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded">Alto</button>
            </div>
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

    <!-- Etiquetas -->
    <div class="mt-6 bg-yellow-50 border border-yellow-200 p-4 rounded-lg">
        <h3 class="font-semibold mb-2">Etiquetas</h3>
        <div class="flex flex-wrap gap-2 text-sm mb-2">
            <span class="bg-yellow-200 px-2 py-1 rounded">Café con leche</span>
            <span class="bg-yellow-200 px-2 py-1 rounded">Hamburguesas veganas</span>
            <span class="bg-yellow-200 px-2 py-1 rounded">Red bull</span>
            <span class="bg-yellow-200 px-2 py-1 rounded">Monster</span>

        </div>
        <div class="flex items-center gap-2">
            <input type="text" placeholder="Nueva etiqueta" class="flex-1 px-2 py-1 border border-gray-300 rounded">
            <button class="bg-gray-800 text-white px-3 py-1 rounded">Añadir</button>
        </div>
    </div>

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

</body>
</html>
