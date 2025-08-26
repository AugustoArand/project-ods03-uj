<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
        public function profile()
    {
        return $this->hasOne(user_profiles::class);
    }
        public function consumption()
    {
        return $this->hasMany(consumption_records::class);
    }
    public function dailyActivities()
    {
        return $this->hasMany(dailyActivities::class);
    }
    public function scoreHistories()
    {
    return $this->hasMany(ScoreHistory::class);
    }

    public function achievements()
    {
        return $this->belongsToMany(Achivements::class, 'user_achievements')
                    ->withPivot('data_conquista')
                    ->withTimestamps();
    }

    public function createdGroups()
        {
            // 'creator_id' é a chave estrangeira na tabela 'groups' que aponta para 'id' do user
            return $this->hasMany(Groups::class, 'creator_id', 'id');
        }

    public function groupMemberships()
    {
        return $this->hasMany(GroupsMembers::class);
    }
    public function members()
    {
        return $this->hasMany(GroupsMembers::class);
    }
        /**
     * Relacionamento com desafios que o usuário participa
     */
    public function desafios()
    {
        return $this->belongsToMany(Challenges::class, 'challenge_participants')
                    ->withPivot(['data_participacao', 'completou', 'pontuacao_final', 'posicao_ranking'])
                    ->withTimestamps();
    }

    /**
     * Relacionamento com as participações em desafios através da model pivot
     */
    public function participacoesDesafios()
    {
        return $this->hasMany(ChallengesParticipants::class);
    }
    /**
     * Relacionamento com desafios que o usuário completou
     */
    public function desafiosCompletos()
    {
        return $this->belongsToMany(Challenges::class, 'challenge_participants')
                    ->wherePivot('completou', true)
                    ->withPivot(['data_participacao', 'pontuacao_final', 'posicao_ranking'])
                    ->withTimestamps();
    }

    /**
     * Relacionamento com desafios em andamento
     */
    public function desafiosEmAndamento()
    {
        return $this->belongsToMany(Challenges::class, 'challenge_participants')
                    ->wherePivot('completou', false)
                    ->withPivot('data_participacao')
                    ->withTimestamps();
    }

    /**
     * Relacionamento com desafios criados pelo usuário (se houver coluna creator_id)
     */
    public function desafiosCriados()
    {
        return $this->hasMany(Challenges::class, 'creator_id');
    }

    public function userRewards()
    {
        return $this->hasMany(UserRewards::class);
    }
    public function diaries()
{
    return $this->hasMany(Diaries::class);
}



    
    /* Relacionamento com notificações do usuário
    */
    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }

    /**
     * Relacionamento com notificações não lidas
     */
    public function unreadNotifications()
    {
        return $this->hasMany(Notifications::class)->where('lida', false);
    }

    /**
     * Relacionamento com notificações lidas
     */
    public function readNotifications()
    {
        return $this->hasMany(Notifications::class)->where('lida', true);
    }


    public function generalRanking()
    {
        return $this->hasOne(GeneralRanking::class);
    }

    // App\Models\User.php

    /**
     * Relacionamento com configurações de notificação do usuário
     */
    public function notificationSettings()
    {
        return $this->hasOne(NotificationsSettings::class);
    }
    public function aiSessions()
    {
        return $this->hasMany(AiSessions::class);
    }
}