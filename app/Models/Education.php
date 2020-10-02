<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $casts = [
        'period_init' => 'datetime:d/m/Y',
        'period_end' => 'datetime:d/m/Y'
    ];
}
