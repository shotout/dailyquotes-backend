<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    // list of flag
    const CATEGORY = 1;
    const THEME = 2;

    public function categories()
    {
        return $this->hasMany('\App\Models\Category')->with('icon');
    }

    public function themes()
    {
        return $this->hasMany('\App\Models\Theme')->with('background');
    }
}
