<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OnboardingController extends Controller
{
    /**
     * Exibe o formulário de onboarding se o usuário ainda não o completou.
     */
    public function create()
    {
        // Verificar se usuário já completou onboarding
        if (Auth::user()->profile && Auth::user()->profile->onboarding_concluido) {
            return redirect()->route('dashboard');
        }

        return view('auth.onboarding');
    }

    /**
     * Salva os dados do formulário de onboarding.
     */
    public function store(Request $request)
    {
        // Validando os dados do formulário
        $validated = $request->validate([
            'cigarros_por_dia_inicial' => 'required|integer|min:0|max:100',
            'tempo_fumando_anos' => 'required|integer|min:0|max:100',
            // Validação de checkbox: 'pratica_atividade_fisica' será 'on' ou 'off'
            'pratica_atividade_fisica' => 'required|boolean', 
            'fagerstrom_q1' => 'required|integer',
            'fagerstrom_q2' => 'required|integer',
            'fagerstrom_q3' => 'required|integer',
            'fagerstrom_q4' => 'required|integer',
            'fagerstrom_q5' => 'required|integer',
            'fagerstrom_q6' => 'required|integer',
        ]);

        // Tratar o valor do checkbox
        $praticaAtividadeFisica = (bool) $validated['pratica_atividade_fisica'];
        
        // Calcular pontuação total do Fagerström
        $fagerstromScore = collect($validated)->only([
            'fagerstrom_q1', 'fagerstrom_q2', 'fagerstrom_q3',
            'fagerstrom_q4', 'fagerstrom_q5', 'fagerstrom_q6'
        ])->sum();

        try {
        // Criar ou atualizar perfil de forma segura
        $user = Auth::user();

        // Verificar se o usuário existe e é uma instância do seu Model User
        if ($user instanceof \App\Models\User) {
            // Criar ou atualizar o perfil
            user_profiles::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'cigarros_por_dia_inicial' => $validated['cigarros_por_dia_inicial'],
                    'tempo_fumando_anos' => $validated['tempo_fumando_anos'],
                    'pratica_atividade_fisica' => $praticaAtividadeFisica,
                    'fagerstrom_score' => $fagerstromScore,
                    'onboarding_concluido' => true,
                ]
            );

            // Agora o editor entende que $user é um Model e tem o método update()
            $user->update(['has_completed_onboarding' => true]);
        } else {
            // Lidar com o caso de usuário não autenticado, se necessário
            return back()->with('error', 'Usuário não autenticado.');
        }


        } catch (\Exception $e) {
            Log::error('Erro ao salvar perfil: ' . $e->getMessage());
            return back()->with('error', 'Erro ao salvar dados: ' . $e->getMessage());
        }

        return redirect()->route('dashboard')
            ->with('success', 'Perfil configurado com sucesso!');
    }
}
