<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =[
        'title',
        'description'
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
