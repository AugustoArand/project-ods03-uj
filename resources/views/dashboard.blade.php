<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LibertAR Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f0f7ff; 
        }
        .active-tab {
            background-color: white;
            color: #094F8B;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .tab-button {
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            background-color: transparent;
            color: #4b5563;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }
        .tab-button:hover {
            background-color: #e5e7eb;
        }
    </style>
</head>
<body class="font-sans">

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0">
                <h1 class="text-2xl font-bold text-[#094F8B]">LibertAR Digital</h1>
            </div>

            <div class="relative" x-data="{ open: false }">
                {{-- Botão que abre/fecha o menu --}}
                <button @click="open = ! open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                    <div>Olá, {{ Auth::user()->name }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>

                {{-- Conteúdo do menu --}}
                <div x-show="open"
                     @click.away="open = false"
                     x-transition
                     class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                     style="display: none;">

                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Meu Perfil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Sair
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mb-6 bg-gray-100 p-1.5 rounded-full inline-flex">
            <nav class="flex space-x-2" aria-label="Tabs">
                <button class="tab-button active-tab" data-tab="tab-profile">Perfil</button>
                <button class="tab-button" data-tab="tab-community">Comunidade</button>
                <button class="tab-button" data-tab="tab-challenges">Desafios</button>
                <button class="tab-button" data-tab="tab-education">Educação</button>
            </nav>
        </div>

        <div>
            <div id="tab-profile" class="tab-content space-y-6">
                <div class="bg-blue-100/60 p-6 rounded-xl shadow-md flex items-center space-x-6">
                    <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-4xl flex-shrink-0">R</div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Ryan França</h2>
                        <p class="text-blue-800"><span class="font-bold text-5xl">559</span> Dias consecutivos</p>
                        <div class="mt-2">
                            <span class="text-sm font-medium text-gray-600">Meta: 1 ano livre</span>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 23%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h3 class="font-semibold text-gray-600">Economia Financeira</h3>
                        <p class="text-4xl font-bold text-green-600 mt-2">R$ 12005</p>
                        <p class="text-sm text-gray-500">Economizados desde que parou</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h3 class="font-semibold text-gray-600">Tempo Recuperado</h3>
                        <p class="text-4xl font-bold text-blue-600 mt-2">124h 21min</p>
                        <p class="text-sm text-gray-500">De vida recuperada</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <h3 class="font-semibold text-gray-600">Cigarros Evitados</h3>
                        <p class="text-4xl font-bold text-purple-600 mt-2">23123</p>
                        <p class="text-sm text-gray-500">Cigarros não fumados</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md space-y-4">
                    <h3 class="font-semibold text-gray-800">Metas Personalizadas</h3>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span>Parou de fumar</span>
                            <span class="font-bold text-green-600">10/02/2024</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span>Primeira semana completa</span>
                            <span class="font-bold text-blue-600">17/02/2024</span>
                        </div>
                    </div>
                 </div>
            </div>

            <div id="tab-community" class="tab-content hidden space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-bold text-gray-800">Comunidade LibertAR</h2>
                    <p class="text-gray-600 mt-1">Conecte-se com outros usuários em sua jornada</p>
                </div>
                <div class="bg-green-50 p-5 rounded-xl border border-green-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">E</div>
                        <div>
                            <p class="font-semibold">Emanuel Sales</p>
                            <p class="text-sm text-gray-500">25 dias sem fumar</p>
                        </div>
                    </div>
                    <p class="mt-3 text-gray-700">"Hoje completo 25 dias! O apoio da comunidade foi fundamental. Obrigada a todos! 🙏"</p>
                </div>
                <div class="bg-blue-50 p-5 rounded-xl border border-blue-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">G</div>
                        <div>
                            <p class="font-semibold">Gabriel Muniz</p>
                            <p class="text-sm text-gray-500">128 dias sem coca</p>
                        </div>
                    </div>
                    <p class="mt-3 text-gray-700">"Dica do dia: quando der vontade de beber refri, faça 10 respirações profundas. Funciona comigo!"</p>
                </div>
                <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Participar da Discussão</button>
            </div>

            <div id="tab-challenges" class="tab-content hidden space-y-6">
                 <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-bold text-gray-800">Desafios Semanais</h2>
                    <div class="mt-4 border p-4 rounded-lg">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold">Semana da Hidratação</h3>
                            <span class="text-xs font-medium bg-green-100 text-green-800 px-2 py-1 rounded-full">Em progresso</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Beba pelo menos 2 litros de água por dia durante esta semana.</p>
                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                            <div class="bg-green-500 h-1.5 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="mt-4 border p-4 rounded-lg">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold">Exercícios Respiratórios</h3>
                             <span class="text-xs font-medium bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Próximo</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Pratique 5 minutos de exercícios respiratórios diariamente.</p>
                    </div>
                 </div>
                 <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-bold text-gray-800">Suas Conquistas</h2>
                    <div class="grid grid-cols-3 gap-4 mt-4 text-center">
                        <div class="bg-yellow-100/60 p-4 rounded-lg">
                            <p class="text-2xl">🏆</p>
                            <p class="text-sm font-semibold text-yellow-800 mt-1">Primeira Semana</p>
                        </div>
                         <div class="bg-green-100/60 p-4 rounded-lg">
                            <p class="text-2xl">🥇</p>
                            <p class="text-sm font-semibold text-green-800 mt-1">Primeiro Mês</p>
                        </div>
                         <div class="bg-gray-200 p-4 rounded-lg opacity-60">
                            <p class="text-2xl">🥈</p>
                            <p class="text-sm font-semibold text-gray-600 mt-1">Três Meses</p>
                        </div>
                    </div>
                 </div>
            </div>

            <div id="tab-education" class="tab-content hidden space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-bold text-gray-800">Conteúdo Educativo</h2>
                    <div class="mt-4 border p-4 rounded-lg">
                         <div class="flex justify-between items-center">
                            <h3 class="font-semibold">Como seus pulmões se recuperam</h3>
                            <span class="text-xs font-medium bg-green-100 text-green-800 px-2 py-1 rounded-full">Em progresso</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Entenda o processo de recuperação pulmonar após parar de fumar.</p>
                        <p class="text-xs text-blue-600 font-semibold mt-2">5 MIN DE LEITURA</p>
                    </div>
                    <div class="mt-4 border p-4 rounded-lg">
                         <div class="flex justify-between items-center">
                            <h3 class="font-semibold">Impacto financeiro do tabagismo</h3>
                             <span class="text-xs font-medium bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Próximo</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Veja como parar de fumar pode mudar sua vida.</p>
                        <p class="text-xs text-blue-600 font-semibold mt-2">3 MIN DE LEITURA</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-bold text-gray-800">Depoimentos Inspiradores</h2>
                    <div class="bg-green-50 p-4 rounded-lg mt-4 border border-green-200">
                        <p class="text-gray-700 italic">"Parei de fumar há 2 anos usando o LibertAR Digital. A plataforma me ajudou a entender minha dependência e me manteve motivada com o progresso visual."</p>
                        <p class="text-right font-semibold text-sm mt-2">- Ana Costa, 34 anos</p>
                    </div>
                     <div class="bg-blue-50 p-4 rounded-lg mt-4 border border-blue-200">
                        <p class="text-gray-700 italic">"O apoio da comunidade foi essencial. Nos momentos difíceis, sempre havia alguém para dar uma palavra de incentivo."</p>
                        <p class="text-right font-semibold text-sm mt-2">- Carlos Oliveira, 45 anos</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    tabButtons.forEach(btn => btn.classList.remove('active-tab'));
                    tabContents.forEach(content => content.classList.add('hidden'));

                    
                    button.classList.add('active-tab');

                    const tabId = button.getAttribute('data-tab');
                    document.getElementById(tabId).classList.remove('hidden');
                });
            });
        });
    </script>
</body>
</html>