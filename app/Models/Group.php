<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->hasMany('\App\Models\Category')->with('icon');
    }
}
