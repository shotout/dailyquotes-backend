<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // list status
    const ACTIVE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function schedule()
    {
        return $this->hasOne('\App\Models\Schedule');
    }

    public function style()
    {
        return $this->belongsTo('\App\Models\Style');
    }

    public function feel()
    {
        return $this->belongsTo('\App\Models\Feel');
    }

    public function ways()
    {
        return $this->belongsToMany('\App\Models\Way', 'user_way');
    }

    public function areas()
    {
        return $this->belongsToMany('\App\Models\Area', 'user_area');
    }

    public function theme()
    {
        return $this->belongsTo('\App\Models\Theme')->with('background');
    }

    public function categories()
    {
        return $this->belongsToMany('\App\Models\Category', 'user_category');
    }

    public function subscription()
    {
        return $this->hasOne('\App\Models\Subscription')->where('status', 2);
    }
}
