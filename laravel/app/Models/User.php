<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_password',
        'role_id',
        'organization',
        'address',
        'phone',
        'city',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'confirm_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function generateMemberId($userId)
    {
        $kodeku = str_pad($userId, 4, '0', STR_PAD_LEFT);
        $memberId = 'MEM' . date('y') . $kodeku;
        return $memberId;
    }

    public function conferences() {
        return $this->belongsToMany(Conference::class, 'transactions', 'user_id', 'conference_id')
                    ->withPivot('transaction_status', 'expired_at')
                    ->withTimestamps();
    }


}
