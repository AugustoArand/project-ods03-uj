<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupsMembers extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada a este Model.
     * @var string
     */
    protected $table = 'group_members';

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
        'group_id',
        'user_id',
        'papel',
        'data_entrada',
        'ativo',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array<string, string>
     */
    protected $casts = [
        'data_entrada' => 'datetime',
        'ativo' => 'boolean',
    ];

    /**
     * Define o relacionamento: Um membro de grupo pertence a um grupo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Groups::class);
    }

    /**
     * Define o relacionamento: Um membro de grupo pertence a um usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
