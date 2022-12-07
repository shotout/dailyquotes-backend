<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionQuote extends Model
{
    use HasFactory;

    public function quote()
    {
        return $this->belongsTo('\App\Models\Quote')->with('like');
    }
}
