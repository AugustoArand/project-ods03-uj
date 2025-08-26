<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengesParticipants extends Model
{
    use HasFactory;

    protected $table = 'challenge_participants';

    protected $fillable = [
        'challenge_id',
        'user_id',
        'data_participacao',
        'completou',
        'pontuacao_final',
        'posicao_ranking'
    ];

    protected $casts = [
        'data_participacao' => 'datetime',
        'completou' => 'boolean',
        'pontuacao_final' => 'integer',
        'posicao_ranking' => 'integer'
    ];

    /**
     * Relacionamento com o usuário participante
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento com o desafio
     */
    public function challenge()
    {
        return $this->belongsTo(Challenges::class);
    }

    /**
     * Escopo para participantes que completaram o desafio
     */
    public function scopeCompletos($query)
    {
        return $query->where('completou', true);
    }

    /**
     * Escopo para participantes em andamento
     */
    public function scopeEmAndamento($query)
    {
        return $query->where('completou', false);
    }

    /**
     * Escopo para ordenar por ranking
     */
    public function scopeOrdenadosPorRanking($query)
    {
        return $query->orderBy('posicao_ranking')->orderBy('pontuacao_final', 'desc');
    }
}