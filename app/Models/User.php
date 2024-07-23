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
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * RELATIONSHIP: The profile that is associated with the user
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * HELPER: Whether the user is an admin or not
     *
     * @param $strict If true, the user must have the exact role of "ADMIN"
     */
    public function isAdmin(bool $strict = false)
    {
        if ($strict) {
            return $this->role === "ADMIN";
        }
        return $this->role !== "BASIC";
    }

    /**
     * HELPER: Whether the user is a super admin or not
     */
    public function isSuperAdmin()
    {
        return $this->role === "SUPER_ADMIN";
    }
}
