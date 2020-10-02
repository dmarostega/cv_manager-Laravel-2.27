<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Skill;
use App\Models\ProfileHasSkill;
use Illuminate\Http\Request;

class ProfileHasSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile_skill.index',[
            'my_skills' => DB::table('profile_has_skills')
                            ->join('skills','skills.id','=','profile_has_skills.skill_id')
                            ->where('profile_id','=', User::find(   Auth::user()->id   )->Profile()->first()->id )
                            ->select('profile_has_skills.*','skills.name')
                            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile_skill.create',[
            'skills' => Skill::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'skill_id' => 'required',
            'knowledge_percent' => 'required|numeric'
        ]);

        $my_skill = new ProfileHasSkill();

        $my_skill->profile_id = User::find( Auth::user()->id)->Profile()->first()->id;
        $my_skill->skill_id = $request->skill_id;
        $my_skill->knowledge_percent = $request->knowledge_percent;

        $my_skill->save();

        return redirect()->route('my_skill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\\ProfileHasSkill  $profileHasSkill
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileHasSkill $my_skill)
    {
        if($my_skill->profile_id === User::find(    Auth::user()->id    )->Profile()->first()->id ){
            return view('admin.profile_skill.show',[
                'my_skill' => DB::table('profile_has_skills')
                                ->join('skills','skills.id','=','profile_has_skills.skill_id')
                                ->where('profile_id','=',User::find(    Auth::user()->id    )->Profile()->first()->id)
                                ->first()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\\ProfileHasSkill  $profileHasSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileHasSkill $my_skill)
    {
        $skil =  Skill::find($my_skill->skill_id);
        $my_skill->name =  $skil->name;

        if($my_skill->profile_id === User::find(    Auth::user()->id    )->Profile()->first()->id ){
            return view('admin.profile_skill.edit',[
                'my_skill' => $my_skill,
                'skills' => Skill::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\\ProfileHasSkill  $profileHasSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileHasSkill $my_skill)
    {       
        $request->validate([
            'skill_id' => 'required',
            'knowledge_percent' => 'required|numeric'
        ]);

        if($my_skill->profile_id === User::find(    Auth::user()->id    )->Profile()->first()->id ) {
            $my_skill->skill_id = $request->skill_id;
            $my_skill->knowledge_percent = $request->knowledge_percent;

            $my_skill->save();
        }

        return redirect()->route('my_skill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\\ProfileHasSkill  $profileHasSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileHasSkill $my_skill)
    {
        if($my_skill->profile_id === User::find( Auth::user()->id  )->Profile()->first()->id ){
            $my_skill->delete();
        }

        return redirect()->route('my_skill.index');
    }
}
