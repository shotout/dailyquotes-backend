<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // list status
    const ACTIVE = 2;

    public function icon()
    {
        return $this->hasOne('\App\Models\Media', 'owner_id')->where('type', 'category');
    }

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote');
    }
}
