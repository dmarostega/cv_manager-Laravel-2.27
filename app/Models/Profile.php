<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'user_id',
        'profile_type_id'
    ];

    public function ProfileType(){
        return $this->belongsTo(ProfileType::class,'profile_type_id','id');
    }

    public function Emails(){
        return $this->hasMany(Email::class);
    }

    public function Phones(){
        return $this->hasMany(Phone::class);
    }

    public function Addresses(){
        return $this->hasMany(Address::class);
    }
}
