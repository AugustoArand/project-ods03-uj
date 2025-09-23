<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibertAR - Sua Jornada para Liberdade</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-[#99C9E714] to-[#1081c777] min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-xl font-bold text-[#094F8B]">LibertAR Digital</span>
                </div>

                <!-- Links de navegação (visíveis em desktop) -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-[#094F8B] hover:text-[#1081C7] transition">Início</a>
                    <a href="#" class="text-[#094F8B] hover:text-[#1081C7] transition">Sobre</a>
                    <a href="#" class="text-[#094F8B] hover:text-[#1081C7] transition">Como Funciona</a>


                </div>

                <!-- Botões de autenticação -->
                <div class="flex items-center space-x-4">
                    <a href="/login" class="text-[#1081C7] hover:text-[#0c6093] transition">Entrar</a>
                    <a href="/register" class="bg-[#1081C7] text-white px-4 py-2 rounded-lg hover:bg-[#0c6093] transition">
                        Cadastrar
                    </a>

                    <!-- Botão mobile menu -->
                    <button id="mobile-menu-button" class="md:hidden focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1081C7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile (oculto por padrão) -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="block px-3 py-2 text-gray-600 hover:text-primary-700">Início</a>
                <a href="#" class="block px-3 py-2 text-gray-600 hover:text-primary-700">Sobre</a>
                <a href="#" class="block px-3 py-2 text-gray-600 hover:text-primary-700">Como Funciona</a>
                <a href="#" class="block px-3 py-2 text-gray-600 hover:text-primary-700">Depoimentos</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-[#094F8B] mb-6">Sua Jornada para uma Vida Livre do Cigarro</h1>
            <p class="text-xl text-[#1081C7] max-w-3xl mx-auto mb-10">
                Plataforma interativa baseada em evidências científicas para ajudar você a parar de fumar. Monitoramento personalizado, apoio da comunidade e ferramentas motivacionais.
            </p>
            <a href="/login" class="inline-block bg-[#1081C7] text-white px-8 py-3 rounded-lg font-medium hover:bg-[#0c6093] transition text-lg">
                Comece Agora
            </a>
        </div>

        <div class="mt-12">
           <img src="{{ asset('images/cigarrate.jpg') }}" alt="cigarro" class="h-72 w-auto mx-auto rounded-lg shadow-lg">
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-[#094F8B] mb-12">
            Como o LibertARI pode ajudar você
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-gray-50 p-6 rounded-xl border border-[#1081C7]">
                <div class="w-12 h-12 bg-[#1081C733] rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1081C7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                    <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/>
                </svg>
                </div>
                <h3 class="font-semibold text-lg text-[#094F8B] mb-2">
                Monitoramento Personalizado
                </h3>
                <p class="text-[#1081C7] text-sm">
                Acompanhe seu progresso com métricas detalhadas: economia financeira, tempo de vida recuperado e cigarros não fumados.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-gray-50 p-6 rounded-xl border border-[#1081C7]">
                <div class="w-12 h-12 bg-[#1081C733] rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1081C7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2 0 3-1 3-3s-1-3-3-3-3 1-3 3 1 3 3 3zm0 0v6m-6 0h12"/>
                </svg>
                </div>
                <h3 class="font-semibold text-lg text-[#094F8B] mb-2">
                Comunidade de Apoio
                </h3>
                <p class="text-[#1081C7] text-sm">
                Conecte-se com outros usuários, compartilhe experiências e receba suporte emocional em sua jornada.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="bg-gray-50 p-6 rounded-xl border border-[#1081C7]">
                <div class="w-12 h-12 bg-[#1081C733] rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1081C7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 6v6l4 2"/>
                </svg>
                </div>
                <h3 class="font-semibold text-lg text-[#094F8B] mb-2">
                Comunidade de Apoio
                </h3>
                <p class="text-[#1081C7] text-sm">
                Conecte-se com outros usuários, compartilhe experiências e receba suporte emocional em sua jornada.
                </p>
            </div>
            </div>
        </div>
    </section>



    <!-- CTA Section -->
    <section class="py-16 text-white" style="background: linear-gradient(135deg, #18ABCC87, #318EADF2);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Descubra quanto você pode ganhar ao deixar o cigarro</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Cadastre-se gratuitamente e comece a transformar sua vida hoje mesmo.</p>
            <a href="/register" class="inline-block bg-white text-[#1081C7] px-8 py-3 rounded-lg font-medium hover:bg-gray-100 transition text-lg">
            Criar Minha Conta
            </a>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <span class="text-xl font-bold text-[#094F8B]">LibertAR</span>
                    <p class="mt-2 text-[#1081C7]">Sua jornada para liberdade começa aqui.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-[#1081C7] hover:text-[#094F8B] transition">Termos de Uso</a>
                    <a href="#" class="text-[#1081C7] hover:text-[#094F8B] transition">Privacidade</a>
                    <a href="#" class="text-[#1081C7] hover:text-[#094F8B] transition">Contato</a>
                </div>
            </div>
            <div class="border-t border-[#1081C7] mt-8 pt-8 text-center text-[#1081C7]">
                <p>&copy; 2025 LibertAR. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>


    <script>
        // Funcionalidade para o menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
