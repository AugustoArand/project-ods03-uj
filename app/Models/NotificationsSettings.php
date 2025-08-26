<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationsSettings extends Model
{
    use HasFactory;

    protected $table = 'notification_settings';

    protected $fillable = [
        'user_id',
        'lembrete_registro',
        'horario_lembrete',
        'motivacao_diaria',
        'ranking_semanal',
        'conquistas',
        'desafios'
    ];

    protected $casts = [
        'lembrete_registro' => 'boolean',
        'motivacao_diaria' => 'boolean',
        'ranking_semanal' => 'boolean',
        'conquistas' => 'boolean',
        'desafios' => 'boolean'
    ];

    /**
     * Relacionamento com o usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Escopo para configurações com lembretes ativos
     */
    public function scopeComLembretesAtivos($query)
    {
        return $query->where('lembrete_registro', true);
    }

    /**
     * Ativar todos os tipos de notificação
     */
    public function ativarTodasNotificacoes()
    {
        $this->update([
            'lembrete_registro' => true,
            'motivacao_diaria' => true,
            'ranking_semanal' => true,
            'conquistas' => true,
            'desafios' => true
        ]);
    }

    /**
     * Desativar todos os tipos de notificação
     */
    public function desativarTodasNotificacoes()
    {
        $this->update([
            'lembrete_registro' => false,
            'motivacao_diaria' => false,
            'ranking_semanal' => false,
            'conquistas' => false,
            'desafios' => false
        ]);
    }
}