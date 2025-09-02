<!-- resources/views/auth/onboarding.blade.php -->
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete seu Perfil - LibertARI</title>
    <!-- Importando Tailwind CSS via CDN (para desenvolvimento) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-5">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md overflow-hidden">
        <!-- Cabeçalho -->
        <div class="bg-blue-800 text-white p-6 text-center">
            <h1 class="text-2xl font-bold mb-1">Complete seu Perfil</h1>
            <p class="text-blue-100">Bem-vindo ao LibertARI</p>
        </div>

        <!-- Formulário -->
        <div class="p-6">
            <form id="profileForm">
                <!-- Seção hábitos de fumar -->
                <h2 class="text-lg font-semibold text-blue-800 mb-4 pb-2 border-b border-gray-200">
                    Sobre seu hábito de fumar
                </h2>

                <div class="mb-5">
                    <label for="cigarettes" class="block text-sm font-medium text-gray-700 mb-1">
                        Cigarros por dia <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="number"
                        id="cigarettes"
                        name="cigarettes"
                        min="0"
                        max="100"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        placeholder="Ex: 10"
                    >
                    <p class="text-xs text-gray-500 mt-1">Informe a quantidade média de cigarros que você fuma por dia</p>
                </div>

                <div class="mb-5">
                    <label for="smokingYears" class="block text-sm font-medium text-gray-700 mb-1">
                        Tempo fumando (anos) <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="number"
                        id="smokingYears"
                        name="smokingYears"
                        min="0"
                        max="100"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        placeholder="Ex: 5"
                    >
                    <p class="text-xs text-gray-500 mt-1">Há quantos anos você fuma?</p>
                </div>

                <!-- Seção atividade física -->
                <h2 class="text-lg font-semibold text-blue-800 mb-4 pb-2 border-b border-gray-200 mt-8">
                    Atividade Física
                </h2>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Pratica atividade física? <span class="text-red-500">*</span>
                    </label>
                    <div class="flex space-x-6">
                        <div class="flex items-center">
                            <input
                                type="radio"
                                id="exercise-yes"
                                name="exercise"
                                value="yes"
                                required
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500"
                            >
                            <label for="exercise-yes" class="ml-2 block text-sm text-gray-700">Sim</label>
                        </div>
                        <div class="flex items-center">
                            <input
                                type="radio"
                                id="exercise-no"
                                name="exercise"
                                value="no"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500"
                            >
                            <label for="exercise-no" class="ml-2 block text-sm text-gray-700">Não</label>
                        </div>
                    </div>
                </div>

                <!-- Botão de envio -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
                >
                    Completar Cadastro e Começar
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validação básica
            const cigarettes = document.getElementById('cigarettes').value;
            const smokingYears = document.getElementById('smokingYears').value;
            const exercise = document.querySelector('input[name="exercise"]:checked');

            if (!cigarettes || !smokingYears || !exercise) {
                alert('Por favor, preencha todos os campos obrigatórios.');
                return;
            }

            // Simulação de envio do formulário
            alert('Perfil completo! Redirecionando...');
            // Aqui normalmente você faria o redirecionamento ou enviaria os dados para o servidor
        });
    </script>
</body>
</html>
@endsection
