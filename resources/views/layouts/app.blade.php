<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MaternArte - Apoio para Mães de Primeira Viagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #A65D57;
            --secondary-color: #D3A4A2;
            --background-color: #FFF5F5;
            --text-color: #4A3735;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            min-height: 100vh;
        }
        /* Navegação Superior */
        .top-nav {
            background-color: var(--background-color);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(166, 93, 87, 0.1);
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        .logo-maternarte{
            height: 40px;
        }
        .text-maternarte{
        height: 80px;
        width: auto;
        }
        .nav-items {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: var(--primary-color);
        }
        .nav-link.active {
            color: var(--primary-color);
        }
        .btn-sair {
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }
        .btn-sair i {
            font-size: 1.1rem;
        }
        .btn-auth {
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .btn-login {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }
        .btn-login:hover {
            background-color: var(--primary-color);
            color: white;
        }
        .btn-register {
            background-color: var(--primary-color);
            color: white;
        }
        .btn-register:hover {
            background-color: var(--secondary-color);
            color: var(--text-color);
        }
        /* Conteúdo */
        .main-content {
            padding: 2rem;
        }
        /* Footer */
        footer {
            text-align: center;
            padding: 1rem;
            color: var(--text-color);
            opacity: 0.8;
            font-size: 0.9rem;
            margin-top: auto;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            window.fetchConfig = {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            };
        });
    </script>
</head>
<body>
    <nav class="top-nav">
        <a href="/" class="logo-container">
            <img src="{{ asset('images/logo_maternarte.png') }}" alt="MaternArte Logo" class="logo-maternarte">
            <img src="{{ asset('images/text_maternarte.png') }}" alt="Logo MaternArte" class="text-maternarte">
        </a>
        <div class="nav-items">
            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Início</a>
            <a href="/sobre" class="nav-link {{ request()->is('sobre*') ? 'active' : '' }}">Sobre</a>
            <a href="/recursos" class="nav-link {{ request()->is('recursos*') ? 'active' : '' }}">Recursos</a>
            @auth
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-sair" style="border: none; background: none; cursor: pointer; padding: 0;">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Sair</span>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-auth btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn-auth btn-register">Registrar</a>
            @endauth
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <footer>
        © MaternArte {{ date('Y') }} Todos os direitos reservados
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/notifications.js') }}"></script>
    @stack('scripts')
</body>
</html> 