<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consumption_records extends Model 
{
    use HasFactory;

    protected $table = 'consumption_records'; // O nome da tabela está correto
    protected $primaryKey = 'id'; // A chave primária está correta

    protected $fillable = [
        'user_id',
        'data_registro',
        'quantidade_cigarros',
        'observacoes',
        'horario_primeiro_cigarro',
        'horario_ultimo_cigarro',
    ];

    protected $casts = [
        'data_registro' => 'date',
        'horario_primeiro_cigarro' => 'datetime:H:i',
        'horario_ultimo_cigarro' => 'datetime:H:i',
    ];

    /**
     * Define o relacionamento: Um ConsumptionRecord pertence a um User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
