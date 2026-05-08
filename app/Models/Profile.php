<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'title',
        'description',
    ];

    public function ProfileType()
    {
        return $this->belongsTo(ProfileType::class, 'profile_type_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Abouts()
    {
        return $this->hasMany(About::class, 'profile_id', 'id');
    }

    public function Educations()
    {
        return $this->hasMany(Education::class, 'profile_id', 'id')->orderByDesc('period_init');
    }

    public function Experiences()
    {
        return $this->hasMany(Experience::class, 'profile_id', 'id')->orderByDesc('period_init');
    }

    public function Skills()
    {
        return $this->hasMany(ProfileHasSkill::class, 'profile_id', 'id');
    }

    public function SocialMedias()
    {
        return $this->hasMany(ProfileHasSocialMedia::class, 'profile_id', 'id');
    }

    public function Emails()
    {
        return $this->hasMany(Email::class, 'profile_id', 'id');
    }

    public function Phones()
    {
        return $this->hasMany(Phone::class, 'profile_id', 'id');
    }

    public function Addresses()
    {
        return $this->hasMany(Address::class, 'profile_id', 'id');
    }
}
