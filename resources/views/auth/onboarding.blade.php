
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboarding - LibertAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-[#99C9E714] to-[#1081c777] min-h-screen flex items-center justify-center py-8">
    <div class="w-full max-w-2xl mx-4">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#094F8B]">LibertAR Digital</h1>
            <p class="text-[#1081C7] mt-2">Sua jornada para liberdade</p>
        </div>

        <!-- Card do Questionário -->
        <div class="bg-white rounded-xl shadow-md p-6 border border-[#1081C7]">
            <!-- Progresso -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-xl font-bold text-[#094F8B]">Teste de Fagerström</h2>
                    <span class="text-sm text-[#1081C7]">Pergunta <span id="currentQuestion">1</span> de 6</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div id="progressBar" class="bg-[#1081C7] h-2 rounded-full" style="width: 16.66%"></div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 border border-[#1081C7]">
            {{-- BLOCO PARA EXIBIR ERROS --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Opa!</strong>
                    <span class="block sm:inline">Algo deu errado.</span>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form id="profileForm" method="POST" action="{{ route('onboarding.store') }}">
                @csrf

                <!-- Dados Básicos (primeira etapa) -->
                <div id="basicInfo" class="question-step">
                    <h3 class="text-lg font-semibold text-[#094F8B] mb-4">Informações Básicas</h3>

                    <div class="mb-4">
                        <label for="cigarros_por_dia_inicial" class="block text-sm font-medium text-[#094F8B] mb-1">
                            Cigarros por dia <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="number"
                            id="cigarros_por_dia_inicial"
                            name="cigarros_por_dia_inicial"
                            min="0"
                            max="100"
                            required
                            class="w-full px-4 py-2 border border-[#1081C7] rounded-lg focus:ring-2 focus:ring-[#1081C7] focus:border-[#1081C7] transition"
                            placeholder="Ex: 10"
                        >
                    </div>

                    <div class="mb-4">
                        <label for="tempo_fumando_anos" class="block text-sm font-medium text-[#094F8B] mb-1">
                            Tempo fumando (anos) <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="number"
                            id="tempo_fumando_anos"
                            name="tempo_fumando_anos"
                            min="0"
                            max="100"
                            required
                            class="w-full px-4 py-2 border border-[#1081C7] rounded-lg focus:ring-2 focus:ring-[#1081C7] focus:border-[#1081C7] transition"
                            placeholder="Ex: 5"
                        >
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-[#094F8B] mb-2">
                            Pratica atividade física? <span class="text-red-500">*</span>
                        </label>
                        <div class="flex space-x-6">
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    id="pratica_atividade_fisica_sim"
                                    name="pratica_atividade_fisica"
                                    value="1"
                                    required
                                    class="h-4 w-4 text-[#1081C7] focus:ring-[#1081C7] border-[#1081C7] rounded"
                                >
                                <label for="pratica_atividade_fisica_sim" class="ml-2 block text-sm text-[#094F8B]">Sim</label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    id="pratica_atividade_fisica_nao"
                                    name="pratica_atividade_fisica"
                                    value="0"
                                    class="h-4 w-4 text-[#1081C7] focus:ring-[#1081C7] border-[#1081C7] rounded"
                                >
                                <label for="pratica_atividade_fisica_nao" class="ml-2 block text-sm text-[#094F8B]">Não</label>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="nextQuestion()" class="w-full bg-[#1081C7] text-white py-3 px-4 rounded-lg font-medium hover:bg-[#0c6093] transition">
                        Próxima Etapa
                    </button>
                </div>

                <!-- Teste de Fagerström (etapas seguintes) -->
                <div id="fagerstromTest" class="question-step hidden">
                    <h3 class="text-lg font-semibold text-[#094F8B] mb-4" id="questionText"></h3>

                    <div id="optionsContainer" class="space-y-3 mb-6"></div>

                    <div class="flex space-x-4">
                        <button type="button" onclick="prevQuestion()" class="flex-1 bg-gray-300 text-gray-700 py-3 px-4 rounded-lg font-medium hover:bg-gray-400 transition">
                            Anterior
                        </button>
                        <button type="button" onclick="nextQuestion()" class="flex-1 bg-[#1081C7] text-white py-3 px-4 rounded-lg font-medium hover:bg-[#0c6093] transition" id="nextButton">
                            Próxima
                        </button>
                    </div>
                </div>

                <!-- Botão de submit (última etapa) -->
                <button type="submit" id="submitButton" class="hidden w-full bg-[#1081C7] text-white py-3 px-4 rounded-lg font-medium hover:bg-[#0c6093] transition">
                    Completar Cadastro
                </button>
            </form>

            <div class="text-center mt-6">
                <a href="{{ route('dashboard') }}" class="text-[#1081C7] hover:text-[#0c6093] text-sm">
                    Pular Teste
                </a>
            </div>
        </div>
    </div>

    <script>
    const fagerstromQuestions = [
        // ... (seu array de perguntas permanece o mesmo, sem alterações aqui) ...
        {
            question: "Quanto tempo depois de acordar você fuma o primeiro cigarro?",
            options: [
                { value: 3, text: "Nos primeiros 5 minutos" },
                { value: 2, text: "Entre 6-30 minutos" },
                { value: 1, text: "Entre 31-60 minutos" },
                { value: 0, text: "Após 60 minutos" }
            ]
        },
        {
            question: "Você acha difícil não fumar em lugares onde é proibido?",
            options: [
                { value: 1, text: "Sim" },
                { value: 0, text: "Não" }
            ]
        },
        {
            question: "Qual cigarro do dia traz mais satisfação?",
            options: [
                { value: 1, text: "O primeiro da manhã" },
                { value: 0, text: "Qualquer outro" }
            ]
        },
        {
            question: "Quantos cigarros você fuma por dia?",
            options: [
                { value: 0, text: "10 ou menos" },
                { value: 1, text: "11-20" },
                { value: 2, text: "21-30" },
                { value: 3, text: "31 ou mais" }
            ]
        },
        {
            question: "Você fuma mais frequentemente durante as primeiras horas após acordar?",
            options: [
                { value: 1, text: "Sim" },
                { value: 0, text: "Não" }
            ]
        },
        {
            question: "Você fuma mesmo doente, quando precisa ficar de cama na maior parte do dia?",
            options: [
                { value: 1, text: "Sim" },
                { value: 0, text: "Não" }
            ]
        }
    ];

    let currentStep = 0;
    const totalSteps = 1 + fagerstromQuestions.length;

    // --- NOVA ALTERAÇÃO 1: Objeto para armazenar as respostas ---
    let fagerstromAnswers = {};

    function nextQuestion() {
        // --- NOVA ALTERAÇÃO 2: Salvar a resposta da etapa atual antes de avançar ---
        if (currentStep > 0 && currentStep <= fagerstromQuestions.length) {
            const questionIndex = currentStep - 1;
            const questionName = `fagerstrom_q${questionIndex + 1}`;
            const selectedOption = document.querySelector(`input[name="${questionName}"]:checked`);

            if (!selectedOption) {
                alert('Por favor, selecione uma resposta para continuar.');
                return; // Impede de avançar sem responder
            }
            fagerstromAnswers[questionName] = selectedOption.value;
        }

        // A lógica de navegação continua a mesma
        if (currentStep === 0) {
            document.getElementById('basicInfo').classList.add('hidden');
            document.getElementById('fagerstromTest').classList.remove('hidden');
            currentStep = 1;
            showQuestion(0);
        } else if (currentStep <= fagerstromQuestions.length) {
            const questionIndex = currentStep - 1;
            if (questionIndex < fagerstromQuestions.length - 1) {
                showQuestion(questionIndex + 1);
                currentStep++;
            } else {
                document.getElementById('fagerstromTest').classList.add('hidden');
                document.getElementById('submitButton').classList.remove('hidden');
                currentStep++;
            }
        }
        updateProgress();
    }

    function prevQuestion() {
        // A lógica de voltar continua a mesma
        if (currentStep === 1) {
            document.getElementById('fagerstromTest').classList.add('hidden');
            document.getElementById('basicInfo').classList.remove('hidden');
            document.getElementById('submitButton').classList.add('hidden');
            currentStep = 0;
        } else if (currentStep > 1 && currentStep <= fagerstromQuestions.length + 1) {
            document.getElementById('fagerstromTest').classList.remove('hidden');
            document.getElementById('submitButton').classList.add('hidden');
            const questionIndex = currentStep - 2;
            showQuestion(questionIndex);
            currentStep--;
        }
        updateProgress();
    }

    function showQuestion(index) {
        // ... (A função showQuestion permanece a mesma, sem alterações) ...
        const question = fagerstromQuestions[index];
        document.getElementById('questionText').textContent = question.question;

        const optionsContainer = document.getElementById('optionsContainer');
        optionsContainer.innerHTML = '';

        question.options.forEach(option => {
            const optionId = `q${index}_opt${option.value}`;
            // Verifica se já existe uma resposta para esta pergunta para pré-selecionar
            const isChecked = fagerstromAnswers[`fagerstrom_q${index + 1}`] == option.value ? 'checked' : '';
            optionsContainer.innerHTML += `
                <div class="flex items-center">
                    <input
                        type="radio"
                        id="${optionId}"
                        name="fagerstrom_q${index + 1}"
                        value="${option.value}"
                        required
                        ${isChecked}
                        class="h-4 w-4 text-[#1081C7] focus:ring-[#1081C7] border-[#1081C7] rounded"
                    >
                    <label for="${optionId}" class="ml-2 block text-sm text-[#094F8B]">${option.text}</label>
                </div>
            `;
        });
        document.getElementById('currentQuestion').textContent = index + 1;

        if (index === fagerstromQuestions.length - 1) {
            document.getElementById('nextButton').textContent = 'Finalizar';
        } else {
            document.getElementById('nextButton').textContent = 'Próxima';
        }
    }

    function updateProgress() {
        // ... (A função updateProgress permanece a mesma) ...
        const progress = (currentStep / totalSteps) * 100;
        document.getElementById('progressBar').style.width = `${progress}%`;
    }
    
    // --- NOVA ALTERAÇÃO 3: Adicionar as respostas salvas ao formulário no momento do envio ---
    document.getElementById('profileForm').addEventListener('submit', function(event) {
        // Limpa quaisquer inputs ocultos antigos para evitar duplicação
        this.querySelectorAll('input[type="hidden"][name^="fagerstrom_q"]').forEach(el => el.remove());

        // Cria e anexa um input oculto para cada resposta guardada
        for (const name in fagerstromAnswers) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = name;
            hiddenInput.value = fagerstromAnswers[name];
            this.appendChild(hiddenInput);
        }
    });

</script>
</body>
</html>