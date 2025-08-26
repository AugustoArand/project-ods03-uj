<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyActivities extends Model
{
    use HasFactory;

    protected $table = 'daily_activities'; // Define o nome da tabela

    protected $primaryKey = 'id'; // Define a chave primária

     protected $fillable = [
        'user_id',
        'data_atividade',           // Corresponde à migration
        'consumiu_agua_suficiente', // Corresponde à migration  
        'quantidade_agua_ml',       // Corresponde à migration
        'alimentacao_equilibrada',  // Corresponde à migration
        'realizou_exercicio',       // Corresponde à migration
        'tipo_exercicio',           // Corresponde à migration
        'duracao_exercicio_min',    // Corresponde à migration
        'consumiu_junk_food',       // Corresponde à migration
        
    ];

    protected $casts = [
        'data_atividade' => 'date',
        'consumiu_agua_suficiente' => 'integer',
        'quantidade_agua_ml' => 'integer',
        'alimentacao_equilibrada' => 'boolean',
        'realizou_exercicio' => 'boolean',
        'duracao_exercicio_min' => 'integer',
        'consumiu_junk_food' => 'boolean',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
