<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Informações de Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Atualize suas informações de conta e endereço de e-mail.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Seu endereço de e-mail não está verificado.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- INÍCIO DOS CAMPOS PERSONALIZADOS DO SEU PERFIL --}}
        <h3 class="mt-8 text-lg font-medium text-white">
            {{ __('Informações de Saúde e Hábitos') }}
        </h3>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize seus dados para uma experiência personalizada.') }}
        </p>

        {{-- Campo de entrada para 'cigarros_por_dia_inicial' --}}
        <div>
            <x-input-label for="cigarros_por_dia_inicial" :value="__('Cigarros por dia (inicial)')" />
            <x-text-input id="cigarros_por_dia_inicial" name="cigarros_por_dia_inicial" type="number" class="mt-1 block w-full" :value="old('cigarros_por_dia_inicial', $user->userProfile->cigarros_por_dia_inicial ?? '')" autocomplete="cigarros_por_dia_inicial" />
            <x-input-error class="mt-2" :messages="$errors->get('cigarros_por_dia_inicial')" />
        </div>
        
        {{-- Campo de entrada para 'tempo_fumando_anos' --}}
        <div>
            <x-input-label for="tempo_fumando_anos" :value="__('Tempo fumando (anos)')" />
            <x-text-input id="tempo_fumando_anos" name="tempo_fumando_anos" type="number" class="mt-1 block w-full" :value="old('tempo_fumando_anos', $user->userProfile->tempo_fumando_anos ?? '')" autocomplete="tempo_fumando_anos" />
            <x-input-error class="mt-2" :messages="$errors->get('tempo_fumando_anos')" />
        </div>

        {{-- Campo para 'pratica_atividade_fisica' (Checkbox) --}}
        <div class="flex items-center">
            <input type="checkbox" id="pratica_atividade_fisica" name="pratica_atividade_fisica" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('pratica_atividade_fisica', $user->userProfile->pratica_atividade_fisica ?? false) ? 'checked' : '' }}>
            <x-input-label for="pratica_atividade_fisica" :value="__('Pratica atividade física?')" class="ml-2" />
            <x-input-error class="mt-2" :messages="$errors->get('pratica_atividade_fisica')" />
        </div>

        {{-- Campo de entrada para 'frequencia_semanal_exercicio' --}}
        <div>
            <x-input-label for="frequencia_semanal_exercicio" :value="__('Frequência semanal de exercício (dias)')" />
            <x-text-input id="frequencia_semanal_exercicio" name="frequencia_semanal_exercicio" type="number" class="mt-1 block w-full" :value="old('frequencia_semanal_exercicio', $user->userProfile->frequencia_semanal_exercicio ?? '')" autocomplete="frequencia_semanal_exercicio" />
            <x-input-error class="mt-2" :messages="$errors->get('frequencia_semanal_exercicio')" />
        </div>

        {{-- Campo de entrada para 'tempo_exercicio_minutos' --}}
        <div>
            <x-input-label for="tempo_exercicio_minutos" :value="__('Tempo de exercício por dia (minutos)')" />
            <x-text-input id="tempo_exercicio_minutos" name="tempo_exercicio_minutos" type="number" class="mt-1 block w-full" :value="old('tempo_exercicio_minutos', $user->userProfile->tempo_exercicio_minutos ?? '')" autocomplete="tempo_exercicio_minutos" />
            <x-input-error class="mt-2" :messages="$errors->get('tempo_exercicio_minutos')" />
        </div>
        
        {{-- Campo de texto para 'hobbies' --}}
        <div>
            <x-input-label for="hobbies" :value="__('Hobbies')" />
            <x-text-input id="hobbies" name="hobbies" type="text" class="mt-1 block w-full" :value="old('hobbies', $user->userProfile->hobbies ?? '')" autocomplete="hobbies" />
            <x-input-error class="mt-2" :messages="$errors->get('hobbies')" />
        </div>

        {{-- Campo de entrada para 'objetivo_reducao' --}}
        <div>
            <x-input-label for="objetivo_reducao" :value="__('Objetivo de Redução')" />
            <x-text-input id="objetivo_reducao" name="objetivo_reducao" type="text" class="mt-1 block w-full" :value="old('objetivo_reducao', $user->userProfile->objetivo_reducao ?? '')" autocomplete="objetivo_reducao" />
            <x-input-error class="mt-2" :messages="$errors->get('objetivo_reducao')" />
        </div>

        {{-- Campo de entrada para 'meta_cigarros_dia' --}}
        <div>
            <x-input-label for="meta_cigarros_dia" :value="__('Meta de cigarros por dia')" />
            <x-text-input id="meta_cigarros_dia" name="meta_cigarros_dia" type="number" class="mt-1 block w-full" :value="old('meta_cigarros_dia', $user->userProfile->meta_cigarros_dia ?? '')" autocomplete="meta_cigarros_dia" />
            <x-input-error class="mt-2" :messages="$errors->get('meta_cigarros_dia')" />
        </div>

        {{-- Campo de entrada para 'contato_emergencia_nome' --}}
        <div>
            <x-input-label for="contato_emergencia_nome" :value="__('Nome do Contato de Emergência')" />
            <x-text-input id="contato_emergencia_nome" name="contato_emergencia_nome" type="text" class="mt-1 block w-full" :value="old('contato_emergencia_nome', $user->userProfile->contato_emergencia_nome ?? '')" autocomplete="contato_emergencia_nome" />
            <x-input-error class="mt-2" :messages="$errors->get('contato_emergencia_nome')" />
        </div>

        {{-- Campo de entrada para 'contato_emergencia_telefone' --}}
        <div>
            <x-input-label for="contato_emergencia_telefone" :value="__('Telefone do Contato de Emergência')" />
            <x-text-input id="contato_emergencia_telefone" name="contato_emergencia_telefone" type="tel" class="mt-1 block w-full" :value="old('contato_emergencia_telefone', $user->userProfile->contato_emergencia_telefone ?? '')" autocomplete="contato_emergencia_telefone" />
            <x-input-error class="mt-2" :messages="$errors->get('contato_emergencia_telefone')" />
        </div>
        
        {{-- FIM DOS CAMPOS PERSONALIZADOS DO SEU PERFIL --}}

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>
