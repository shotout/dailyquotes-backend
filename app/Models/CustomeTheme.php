<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomeTheme extends Model
{
    use HasFactory;

    // list status
    const ACTIVE = 2;

    public function background()
    {
        return $this->hasOne('\App\Models\Media', 'owner_id')->where('type', 'custome_theme');
    }
}
