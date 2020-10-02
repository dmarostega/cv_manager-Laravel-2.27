<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $tablename = 'people';
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name'
    ];

    protected $casts = [
        'birthday' => 'datetime:d/m/Y'
    ];

    protected $date = [
        'birthday'
    ];
}
