<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // list type
    const FREE = 1;
    const ONE_YEAR = 2;

    // list status
    const ACTIVE = 2;
}
