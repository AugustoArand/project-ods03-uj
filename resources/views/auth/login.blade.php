<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LibertAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-[#99C9E714] to-[#1081c777] min-h-screen flex items-center justify-center py-8">
    <div class="w-full max-w-md mx-4">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#094F8B]">LibertAR Digital</h1>
            <p class="text-[#1081C7] mt-2">Sua jornada para liberdade</p>
        </div>

        <!-- Card de Login -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-[#1081C7]">
            <h2 class="text-2xl font-bold text-[#094F8B] mb-2 text-center">Acesse sua conta</h2>
            <p class="text-[#1081C7] mb-6 text-center">Digite suas credenciais para continuar</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-[#094F8B] mb-1">E-mail</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="email"
                        class="w-full px-4 py-2 border border-[#1081C7] rounded-lg focus:ring-2 focus:ring-[#1081C7] focus:border-[#1081C7] transition"
                        placeholder="seu@email.com"
                    >
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Senha -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-[#094F8B] mb-1">Senha</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="w-full px-4 py-2 border border-[#1081C7] rounded-lg focus:ring-2 focus:ring-[#1081C7] focus:border-[#1081C7] transition"
                        placeholder="Sua senha"
                    >
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lembrar de mim -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            class="h-4 w-4 text-[#1081C7] focus:ring-[#1081C7] border-[#1081C7] rounded"
                        >
                        <label for="remember" class="ml-2 block text-sm text-[#094F8B]">Lembrar de mim</label>
                    </div>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-[#1081C7] hover:text-[#0c6093]">
                        Esqueceu sua senha?
                    </a>
                    @endif
                </div>

                <!-- Botão de Login -->
                <button type="submit" class="w-full bg-[#1081C7] text-white py-3 px-4 rounded-lg font-medium hover:bg-[#0c6093] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1081C7] transition">
                    Entrar
                </button>
            </form>

            <!-- Divisor -->
            <div class="relative flex items-center my-6">
                <div class="flex-grow border-t border-[#1081C7]"></div>
                <span class="flex-shrink mx-4 text-[#1081C7] text-sm">ou</span>
                <div class="flex-grow border-t border-[#1081C7]"></div>
            </div>

            <!-- Link para Registro -->
            <div class="text-center">
                <p class="text-[#1081C7] text-sm">
                    Não tem uma conta?
                    <a href="{{ route('register') }}" class="text-[#094F8B] hover:text-[#0c6093] font-medium">
                        Cadastre-se aqui
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6">
            <p class="text-[#1081C7] text-sm">&copy; {{ date('Y') }} LibertAR. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>
