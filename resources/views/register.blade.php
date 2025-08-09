<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - SecureLogin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-gray-200 p-8 rounded-lg shadow-md w-full max-w-md border border-gray-400">
    <div class="text-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-1">🔐 SecureLogin</h2>
        <h3 class="text-xl font-semibold text-gray-700">REGISTRARSE</h3>
    </div>

    <form method="POST" action="{{ url('/register') }}">


        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-1">Nombre</label>
            <input type="text" id="name" name="name" required
                   class="w-full px-4 py-2 border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Ingrese su nombre">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-1">Correo</label>
            <input type="email" id="email" name="email" required
                   class="w-full px-4 py-2 border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Ingrese su correo electrónico">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 mb-1">Contraseña</label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-2 border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Ingrese una contraseña">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 mb-1">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   class="w-full px-4 py-2 border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Repita la contraseña">
        </div>

        <button type="submit"
                class="w-full bg-black text-white py-2 rounded font-semibold hover:bg-gray-800">
            REGISTRARSE
        </button>
    </form>

    <div class="text-center mt-4">
        <p class="text-sm text-gray-700">
            ¿Ya tienes una cuenta?
            <a href="/login" class="text-blue-600 hover:underline font-semibold">Inicia sesión</a>
        </p>
    </div>
</div>

</body>
</html>
