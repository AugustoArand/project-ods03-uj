<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'titulo',
        'mensagem',
        'tipo',
        'lida',
        'data_envio',
        'data_leitura'
    ];

    protected $casts = [
        'lida' => 'boolean',
        'data_envio' => 'datetime',
        'data_leitura' => 'datetime'
    ];

    /**
     * Relacionamento com o usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Escopo para notificações não lidas
     */
    public function scopeNaoLidas($query)
    {
        return $query->where('lida', false);
    }

    /**
     * Escopo para notificações lidas
     */
    public function scopeLidas($query)
    {
        return $query->where('lida', true);
    }

    /**
     * Escopo para notificações por tipo
     */
    public function scopePorTipo($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Marcar notificação como lida
     */
    public function marcarComoLida()
    {
        $this->update([
            'lida' => true,
            'data_leitura' => now()
        ]);
    }
}