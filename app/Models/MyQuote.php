<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyQuote extends Model
{
    use HasFactory;

    protected $casts = [
        'quotes' => 'json'
    ];
}
