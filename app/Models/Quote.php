<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id'
    ];
    // list status
    const ACTIVE = 2;

    public function like()
    {
        return $this->hasOne('\App\Models\UserQuote')->where('user_id', auth('sanctum')->user()->id);
    }

    public function counterLike()
    {
        return $this->hasMany('\App\Models\UserQuote')
            ->where('type', 1);
    }

    public function counterDislike()
    {
        return $this->hasMany('\App\Models\UserQuote')
            ->where('type', 2);
    }
}
