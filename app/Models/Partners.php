<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;

    protected $table = 'partners';

    protected $fillable = [
        'nome',
        'categoria',
        'descricao',
        'logo_url',
        'ativo'
    ];

    protected $casts = [
        'ativo' => 'boolean'
    ];

    /**
     * Relacionamento com recompensas
     */
    public function rewards()
    {
        return $this->hasMany(Rewards::class);
    }

    /**
     * Escopo para parceiros ativos
     */
    public function scopeAtivos($query)
    {
        return $query->where('ativo', true);
    }

    /**
     * Escopo para parceiros por categoria
     */
    public function scopePorCategoria($query, $categoria)
    {
        return $query->where('categoria', $categoria);
    }

    /**
     * Obter recompensas ativas do parceiro
     */
    public function recompensasAtivas()
    {
        return $this->rewards()->where('ativa', true);
    }

    /**
     * Verificar se o parceiro tem recompensas disponíveis
     */
    public function temRecompensasDisponiveis()
    {
        return $this->recompensasAtivas()->exists();
    }
}