<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

// Arquivos middleware são responsáveis por filtrar requisições HTTP
// Antes que elas cheguem aos controllers
// Neste caso, vamos garantir que usuários que não completaram o onboarding
// Sejam redirecionados para a página de onboarding
// Exceto se estiverem tentando acessar as rotas de onboarding ou logout

// Arquivo editado por Sandynesk

class CheckOnboarding
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Verificar se o usuário está logado
        if (Auth::check()) {
            $user = Auth::user(); // Armazena o usuário autenticado na variavel $user

            // 2. Verificar se tem perfil E se onboarding NÃO foi concluído
            if (!$user->profile || !$user->profile->onboarding_concluido) {

                // 3. Permitir acesso APENAS às rotas de onboarding e logout
                if (!$request->is('onboarding*') && !$request->is('logout')) {

                    // 4. Redirecionar para onboarding se tentar acessar outras rotas
                    return redirect()->route('onboarding.show');
                }
            }
        }

        // 5. Se tudo ok, deixar a requisição passar para o controller
        return $next($request);
    }
}
