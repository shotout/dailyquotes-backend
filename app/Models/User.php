<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

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

    public function themes()
    {
        return $this->belongsToMany('\App\Models\Theme', 'user_themes')->with('background');
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
