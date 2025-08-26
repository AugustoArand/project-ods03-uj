<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scoreHistory extends Model // Nome da classe corrigido para ScoreHistory (CamelCase singular)
{
    use HasFactory;

    protected $table = 'score_histories'; // Nome da tabela corrigido
    protected $primaryKey = 'id'; // A chave primária está correta

    protected $fillable = [
        'user_id',
        'data_pontuacao',
        'tipo_acao',
        'pontos_ganhos',
        'pontos_perdidos',
        'descricao',
        'pontuacao_total_dia',
    ];

    protected $casts = [
        'data_pontuacao' => 'date',
    ];

    /**
     * Define o relacionamento: Um registro de ScoreHistory pertence a um User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
