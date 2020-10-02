<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileHasSocialMedia extends Model
{
    protected $table = 'profile_has_social_media';

    public function Profile(){
        return $this->belongsTo('App\Models\Profile', 'profile_id', 'id');
    }

    public function SocialMedia(){
        return $this->belongsTo('App\Models\SocialMedia', 'social_media_id', 'id');
    }
}
