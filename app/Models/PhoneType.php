<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneType extends Model
{
    //
    protected $table = 'phone_types';

    protected $fillable = [
        'title'
    ];
}
