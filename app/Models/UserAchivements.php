<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAchivements extends Model // Nome da classe corrigido para UserAchievement (singular, CamelCase)
{
     use HasFactory;

    protected $table = 'user_achievements'; // O nome da tabela está correto

    protected $fillable = [
        'user_id',
        'achievement_id',
        'data_conquista'
    ];

    protected $casts = [
        'data_conquista' => 'datetime'
    ];

    /**
     * Relacionamento com o usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento com a conquista
     */
    public function achievement()
    {
        return $this->belongsTo(Achivements::class); // Nome do Model referenciado corrigido
    }
}
