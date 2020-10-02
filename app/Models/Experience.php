<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = [
        'period_end'
    ];

    protected $casts = [
        'period_init' => 'datetime:d/m/Y',
        'period_end' => 'datetime:d/m/Y'
    ];
}
