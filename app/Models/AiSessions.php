<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiSessions extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada a este Model.
     * @var string
     */
    protected $table = 'ai_sessions';

    /**
     * Define a chave primária da tabela.
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Os atributos que são "mass assignable" (podem ser preenchidos em massa).
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'conversa_json',
        'situacao_contexto',
        'data_inicio',
        'data_fim',
        'duracao_minutos',
        'resolvida',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array<string, string>
     */
    protected $casts = [
        'conversa_json' => 'array', // Converte a string JSON do banco para um array/objeto PHP
        'data_inicio' => 'datetime',
        'data_fim' => 'datetime',
        'resolvida' => 'boolean',
    ];

    /**
     * Define o relacionamento: Uma sessão de IA pertence a um usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
