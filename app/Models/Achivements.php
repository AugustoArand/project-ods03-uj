<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achivements extends Model
{
     use HasFactory;

    protected $table = 'achievements';

    protected $fillable = [
        'nome',
        'descricao',
        'icone',
        'pontos_necessarios',
        'criterio',
        'ativa'
    ];

    protected $casts = [
        'pontos_necessarios' => 'integer',
        'ativa' => 'boolean'
    ];

    /**
     * Relacionamento com usuários (muitos para muitos)
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_achievements')
                    ->withPivot('data_conquista')
                    ->withTimestamps();
    }
}
