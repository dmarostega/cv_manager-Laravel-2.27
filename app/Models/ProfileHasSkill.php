<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileHasSkill extends Model
{
    protected $table = 'profile_has_skills';

    public function Profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function Skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }
}
