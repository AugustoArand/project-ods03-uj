<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRewards extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada a este Model.
     * @var string
     */
    protected $table = 'user_rewards';

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
        'reward_id',
        'data_resgate',
        'codigo_utilizado',
        'utilizada',
        'data_utilizacao',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array<string, string>
     */
    protected $casts = [
        'data_resgate' => 'datetime',
        'utilizada' => 'boolean',
        'data_utilizacao' => 'datetime',
    ];

    /**
     * Define o relacionamento: Um resgate de recompensa pertence a um usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define o relacionamento: Um resgate de recompensa pertence a uma recompensa.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reward()
    {
        return $this->belongsTo(Rewards::class);
    }
}
