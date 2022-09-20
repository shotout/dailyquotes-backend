<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feel extends Model
{
    use HasFactory;

    // list status
    const ACTIVE = 2;

    public function icon()
    {
        return $this->hasOne('\App\Models\Media', 'owner_id')->where('type', 'feel');
    }
}
