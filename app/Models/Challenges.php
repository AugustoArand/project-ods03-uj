<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenges extends Model
{
    use HasFactory;

    protected $table = 'challenges';

    protected $fillable = [
        'titulo',
        'descricao',
        'tipo_desafio',
        'criterios_vitoria',
        'data_inicio',
        'data_fim',
        'pontos_premio',
        'max_participantes',
        'ativo'
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
        'pontos_premio' => 'integer',
        'max_participantes' => 'integer',
        'ativo' => 'boolean'
    ];

    /**
     * Relacionamento com participantes do desafio
     */
    public function participantes()
    {
        return $this->belongsToMany(User::class, 'challenge_participants')
                    ->withPivot(['data_participacao', 'completou', 'pontuacao_final', 'posicao_ranking'])
                    ->withTimestamps();
    }

    /**
     * Relacionamento com criador do desafio (se aplicável)
     */
    public function criador()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Escopo para desafios ativos
     */
    public function scopeAtivos($query)
    {
        return $query->where('ativo', true);
    }

    /**
     * Escopo para desafios dentro do período
     */
    public function scopeDentroDoPeriodo($query)
    {
        return $query->where('data_inicio', '<=', now())
                    ->where('data_fim', '>=', now());
    }

    // App\Models\Challenge.php

    /**
     * Relacionamento com os participantes através da model pivot
     */
    public function participantesPivot()
    {
        return $this->hasMany(ChallengesParticipants::class);
    }
}