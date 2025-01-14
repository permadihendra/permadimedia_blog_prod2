<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */


     public function role(): BelongsTo 
     {
        return $this->belongsTo(Roles::class, 'role_id')->withDefault();
     }

    //  public function hasRole($role){
    //     return User::with('roles')->where('role_id', function ($query) {
    //         $query->where('name', $role);
    //     })
    //     ->exist();
    //  }


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Scope search to add search functionality in eloquent query
    public function scopeSearch($query, $value){
        $query->where('name', 'like', "%{$value}%")->orWhere('email', 'like', "%{$value}%");
    }
}
