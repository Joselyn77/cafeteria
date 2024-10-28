<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        /* Estilos básicos para centrar el formulario y mejorar su apariencia */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #333333;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .error-message {
            background-color: #ffe6e6;
            color: #d9534f;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: left;
        }
        .login-button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #ffffff;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
