<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralRanking extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada a este Model.
     * @var string
     */
    protected $table = 'general_rankings';

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
        'posicao',
        'pontuacao_total',
        'periodo',
        'data_referencia',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array<string, string>
     */
    protected $casts = [
        'data_referencia' => 'date',
    ];

    /**
     * Define o relacionamento: Um registro de ranking geral pertence a um usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
