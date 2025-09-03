<?php

// app/Http/Controllers/OnboardingController.php
namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function create()
    {
        // Verificar se usuário já completou onboarding
        if (Auth::user()->profile && Auth::user()->profile->onboarding_concluido) {
            return redirect()->route('dashboard');
        }

        return view('auth.onboarding');
    }

    public function store(Request $request)
    {

    //DEBUG: para ver oq está sendo enviado
    //dd($request->all());

    \Log::info('Dados recebidos: ', $request->all());

    // Validando os dados do formulário com o request



     $validated = $request->validate([
        'cigarros_por_dia_inicial' => 'required|integer|min:0|max:100',
        'tempo_fumando_anos' => 'required|integer|min:0|max:100',
        'pratica_atividade_fisica' => 'required|boolean',
        'fagerstrom_q1' => 'required|integer',
        'fagerstrom_q2' => 'required|integer',
        'fagerstrom_q3' => 'required|integer',
        'fagerstrom_q4' => 'required|integer',
        'fagerstrom_q5' => 'required|integer',
        'fagerstrom_q6' => 'required|integer',

    ]);

    \Log::info('Validação passou: ', $validated);
    // Calcular pontuação total do Fagerström

    $fagerstromScore =
        $validated['fagerstrom_q1'] +
        $validated['fagerstrom_q2'] +
        $validated['fagerstrom_q3'] +
        $validated['fagerstrom_q4'] +
        $validated['fagerstrom_q5'] +
        $validated['fagerstrom_q6'];

    try{
        // Criar ou atualizar perfil
        $profile = Auth::user()->profile ?? new UserProfile();
        $profile->user_id = Auth::id();

        // Atribuir os valores validados aos campos do perfil
        $profile->cigarros_por_dia_inicial = $validated['cigarros_por_dia_inicial'];
        $profile->tempo_fumando_anos = $validated['tempo_fumando_anos'];
        $profile->pratica_atividade_fisica = $validated['pratica_atividade_fisica'];
        $profile->fagerstrom_score = $fagerstromScore;
        $profile->onboarding_concluido = true;

        // Se tiver outros campos no formulário, adicione aqui:
        // $profile->frequencia_semanal_exercicio = $request->frequencia_semanal_exercicio;
        // $profile->objetivo_reducao = $request->objetivo_reducao;
        // etc.

        $profile->save();

        // Atualizar também o campo na tabela users para controler
        Auth::user()->update([
            'has_completed_onboarding' => true
        ]);

    }catch(\Exception $e){
        \Log::error('Erro ao salvar perfil: ' . $e->getMessage());
        return back()->with('error', 'Erro ao salvar dados: ' . $e->getMessage());
    }

        return redirect()->route('dashboard')
            ->with('success', 'Perfil configurado com sucesso!');
    }
}
