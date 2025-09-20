<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibertAR Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen">

        <aside class="bg-white text-[#094F8B] w-64 p-6 flex flex-col items-center shadow-lg">
            <div class="mb-8">
                <h1 class="text-2xl font-bold">LibertAR</h1>
            </div>
            <nav class="w-full">
                <ul>
                    <li class="mb-4">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#1081C7] hover:text-white transition-colors duration-200">
                            <span class="mr-3">📊</span>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#1081C7] hover:text-white transition-colors duration-200">
                            <span class="mr-3">🎯</span>
                            Minhas Metas
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#1081C7] hover:text-white transition-colors duration-200">
                            <span class="mr-3">📚</span>
                            Recursos
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#1081C7] hover:text-white transition-colors duration-200">
                            <span class="mr-3">⚙️</span>
                            Configurações
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <header class="bg-white p-6 shadow-md flex justify-between items-center sticky top-0 z-10">
                <div>
                    <h2 class="text-2xl font-semibold text-[#094F8B]">Dashboard Principal</h2>
                    <p class="text-sm text-gray-500">Bem-vindo(a), [Nome do Usuário]!</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-[#1081C7] transition-colors duration-200">
                        🔔
                    </a>
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-gray-600">
                        <a href="#">👤</a>
                    </div>
                </div>
            </header>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white p-6 rounded-xl shadow-md border border-[#1081C7]">
                    <h3 class="text-lg font-bold text-[#094F8B] mb-2">Cigarros Reduzidos</h3>
                    <p class="text-3xl font-extrabold text-[#1081C7]">245</p>
                    <p class="text-sm text-gray-500 mt-1">Neste mês</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border border-[#1081C7]">
                    <h3 class="text-lg font-bold text-[#094F8B] mb-2">Dinheiro Economizado</h3>
                    <p class="text-3xl font-extrabold text-[#1081C7]">R$ 150,00</p>
                    <p class="text-sm text-gray-500 mt-1">Desde o início</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border border-[#1081C7]">
                    <h3 class="text-lg font-bold text-[#094F8B] mb-2">Sua Dependência</h3>
                    <p class="text-3xl font-extrabold text-green-500">Baixa</p>
                    <p class="text-sm text-gray-500 mt-1">Teste de Fagerström: 3</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border border-[#1081C7]">
                    <h3 class="text-lg font-bold text-[#094F8B] mb-2">Dias Sem Fumar</h3>
                    <p class="text-3xl font-extrabold text-purple-600">12</p>
                    <p class="text-sm text-gray-500 mt-1">Sua melhor marca</p>
                </div>

            </div>

            <div class="p-6">
                <div class="bg-white p-6 rounded-xl shadow-md border border-[#1081C7]">
                    <h3 class="text-xl font-bold text-[#094F8B] mb-4">Seu Progresso</h3>
                    <canvas id="myChart" class="w-full"></canvas>
                </div>
            </div>
        </main>

    </div>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Cigarros Fumados por Dia',
                    data: [25, 20, 18, 15, 12, 10],
                    borderColor: '#1081C7',
                    backgroundColor: 'rgba(16, 129, 199, 0.2)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>