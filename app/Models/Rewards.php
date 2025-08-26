<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada a este Model.
     * @var string
     */
    protected $table = 'rewards';

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
        'partner_id',
        'titulo',
        'descricao',
        'pontos_necessarios',
        'desconto_percentual',
        'codigo_desconto',
        'validade_inicio',
        'validade_fim',
        'quantidade_disponivel',
        'ativa',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array<string, string>
     */
    protected $casts = [
        'desconto_percentual' => 'decimal:2',
        'validade_inicio' => 'date',
        'validade_fim' => 'date',
        'ativa' => 'boolean',
    ];

    /**
     * Define o relacionamento: Uma recompensa pertence a um parceiro.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo(Partners::class);
    }

    /**
     * Define o relacionamento: Uma recompensa pode ser resgatada por muitos usuários (UserReward).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRewards()
    {
        return $this->hasMany(UserRewards::class); 
    }
}
