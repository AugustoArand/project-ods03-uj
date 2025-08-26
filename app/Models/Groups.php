<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada a este Model.
     * Por padrão, o Laravel inferiria 'groups' a partir de 'Group', então esta linha é opcional,
     * mas é boa prática para clareza.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * Define a chave primária da tabela.
     * Por padrão, o Laravel assume 'id', então esta linha é opcional.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Os atributos que são "mass assignable" (podem ser preenchidos em massa).
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'descricao',
        'creator_id',
        'limite_membros',
        'publico',
        'ativo',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array<string, string>
     */
    protected $casts = [
        'publico' => 'boolean',
        'ativo' => 'boolean',
    ];

    /**
     * Define o relacionamento: Um grupo pertence a um criador (User).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        // 'creator_id' é a chave estrangeira na tabela 'groups'
        // 'id' é a chave primária na tabela 'users'
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    /**
     * Define o relacionamento: Um grupo pode ter muitos membros (GroupMember).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(GroupsMembers::class);
    }
}
