<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;


    protected $tablename = 'people';
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'birthday'
    ];

    protected $casts = [
        'birthday' => 'datetime:d/m/Y'
    ];

    protected $date = [
        'birthday'
    ];
}
