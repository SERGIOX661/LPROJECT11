<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - SecureLogin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-gray-200 p-8 rounded-lg shadow-md w-full max-w-md border border-gray-400">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">🔐 SecureLogin</h2>
            <h3 class="text-xl font-semibold text-gray-700">INICIAR SESIÓN</h3>
        </div>

        <form method="POST" action="{{ route('login') }}">

            @csrf <!-- Si vas a manejar inicio de sesión con Laravel -->
            
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
                       placeholder="Ingrese su contraseña">
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" id="remember" name="remember" class="mr-2">
                <label for="remember" class="text-gray-700 text-sm">Recordar mis datos</label>
            </div>

            <button type="submit"
                    class="w-full bg-black text-white py-2 rounded font-semibold hover:bg-gray-800">
                INICIAR SESIÓN
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-700">
                ¿Es tu primera vez? 
                <a href="/register" class="text-blue-600 hover:underline font-semibold">Regístrate</a>
            </p>
            <p class="text-xs text-gray-600 mt-2">
                ¿Olvidaste tu contraseña?
            </p>
        </div>
    </div>

</body>
</html>
