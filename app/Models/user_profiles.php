<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_profiles extends Model
{
    use HasFactory;

    /**
     * Define o nome da tabela associada ao Model.
     * Por convenção, o Laravel infere o nome da tabela a partir do nome do Model (ex: UserProfile -> user_profiles).
     * No entanto, é boa prática especificar explicitamente para clareza e caso a convenção seja quebrada.
     *
     * @var string
     */
    protected $table = 'user_profiles';

    /**
     * Define a chave primária da tabela.
     * Por padrão, o Laravel assume que a chave primária é 'id'.
     * Não é estritamente necessário se sua PK for 'id', mas ajuda na legibilidade.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Define quais atributos são "mass assignable" (atribuíveis em massa).
     * Estes são os campos que podem ser preenchidos usando métodos como create() ou fill().
     * Campos não listados aqui não poderão ser preenchidos dessa forma por segurança.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'user_id',
    'cigarros_por_dia_inicial',
    'tempo_fumando_anos',
    'pratica_atividade_fisica',
    'frequencia_semanal_exercicio',
    'tempo_exercicio_minutos',
    'hobbies',
    'objetivo_reducao',
    'meta_cigarros_dia',
    'contato_emergencia_nome',
    'contato_emergencia_telefone',
    'fagerstrom_score', // Novo campo para pontuação do teste de Fagerström
    'onboarding_concluido',
    'pontuacao_total'
];

    /**
     * Define os atributos que devem ser convertidos para tipos de dados nativos do PHP.
     * Por exemplo, 'pratica_atividade_fisica' é um booleano no BD, então convertemos para 'boolean' no PHP.
     * 'created_at' e 'updated_at' são automaticamente tratados pelo Laravel como Carbon instances.
     *
     * @var array<string, string>
     */
    protected $casts = [
    'hobbies' => 'array',
    'pratica_atividade_fisica' => 'boolean',
    'onboarding_concluido' => 'boolean'
    ];

    /**
     * Define o relacionamento: Um UserProfile pertence a um User.
     * O Laravel assume que a chave estrangeira na tabela 'user_profiles' é 'user_id'
     * e que a chave primária na tabela 'users' é 'id'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
