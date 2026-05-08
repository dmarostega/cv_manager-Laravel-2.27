<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $fillable = [
        'profile_id',
        'title',
        'text',
        'image',
        'is_main',
    ];

    public function Profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
}
