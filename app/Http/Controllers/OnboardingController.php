<?php

// app/Http/Controllers/OnboardingController.php
namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function show()
    {
        // Verificar se usuário já completou onboarding
        if (Auth::user()->profile && Auth::user()->profile->onboarding_concluido) {
            return redirect()->route('dashboard');
        }

        return view('auth.onboarding');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cigarros_por_dia_inicial' => 'required|integer|min:1|max:100',
            'tempo_fumando_anos' => 'required|integer|min:0|max:80',
            'pratica_atividade_fisica' => 'required|boolean',
            'frequencia_semanal_exercicio' => 'required_if:pratica_atividade_fisica,true|integer|min:0|max:7|nullable',
            'tempo_exercicio_minutos' => 'required_if:pratica_atividade_fisica,true|integer|min:1|nullable',
            'hobbies' => 'required|array|min:1',
            'hobbies.*' => 'string|max:255',
            'objetivo_reducao' => 'required|in:parar_completamente,reduzir_gradualmente,manter_controle',
            'meta_cigarros_dia' => 'required_if:objetivo_reducao,reduzir_gradualmente|integer|min:0|nullable',
            'contato_emergencia_nome' => 'required|string|max:255',
            'contato_emergencia_telefone' => 'required|string|max:20'
        ]);

        // Criar ou atualizar perfil
        $profile = Auth::user()->profile ?? new UserProfile();
        $profile->user_id = Auth::id();
        $profile->fill($validated);
        $profile->onboarding_concluido = true;
        $profile->save();

        return redirect()->route('dashboard')
            ->with('success', 'Perfil configurado com sucesso!');
    }
}
