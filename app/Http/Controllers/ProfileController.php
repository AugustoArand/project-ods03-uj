<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\user_profiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
       // Valida os dados da requisição
        $validated = $request->validated();

        // 1. Atualiza os dados do usuário na tabela 'users'
        $request->user()->fill($validated);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        // 2. Atualiza ou cria os dados do perfil na tabela 'user_profiles'
        // Extrai os dados específicos do perfil da requisição
        $profileData = $request->only([
            'cigarros_por_dia_inicial',
            'tempo_fumando_anos',
            'pratica_atividade_fisica',
            'frequencia_semanal_exercicio',
            'tempo_exercicio_minutos',
            'hobbies',
            'objetivo_reducao',
            'meta_cigarros_dia',
            'contato_emergencia_nome',
            'contato_emergencia_telefone',
            'pontuacao_total',
        ]);
        
        if (isset($profileData['pratica_atividade_fisica'])) {
            $profileData['pratica_atividade_fisica'] = true;
        } else {
            $profileData['pratica_atividade_fisica'] = false;
        }

        // Usa o método 'updateOrCreate' para evitar duplicatas
        // Ele vai buscar o perfil do usuário logado e, se não encontrar, vai criar um novo
        user_profiles::updateOrCreate(
            ['user_id' => $request->user()->id],
            $profileData
        );
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
