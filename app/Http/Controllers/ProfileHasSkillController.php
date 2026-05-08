<?php

namespace App\Http\Controllers;

use App\Models\ProfileHasSkill;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileHasSkillController extends Controller
{
    public function index()
    {
        return view('admin.profile_skill.index', [
            'my_skills' => DB::table('profile_has_skills')
                ->join('skills', 'skills.id', '=', 'profile_has_skills.skill_id')
                ->where('profile_id', $this->currentProfile()->id)
                ->select('profile_has_skills.*', 'skills.name')
                ->orderByDesc('knowledge_percent')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('admin.profile_skill.create', [
            'skills' => Skill::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'knowledge_percent' => 'required|numeric|min:0|max:100',
        ]);

        $my_skill = new ProfileHasSkill();
        $my_skill->profile_id = $this->currentProfile()->id;
        $my_skill->skill_id = $request->skill_id;
        $my_skill->knowledge_percent = $request->knowledge_percent;
        $my_skill->save();

        return redirect()->route('my_skill.index')->with('success', 'Habilidade vinculada com sucesso.');
    }

    public function show(ProfileHasSkill $my_skill)
    {
        $this->authorizeProfileRecord($my_skill);
        $my_skill->load('Skill');

        return view('admin.profile_skill.show', [
            'my_skill' => $my_skill,
        ]);
    }

    public function edit(ProfileHasSkill $my_skill)
    {
        $this->authorizeProfileRecord($my_skill);
        $my_skill->name = optional($my_skill->Skill()->first())->name;

        return view('admin.profile_skill.edit', [
            'my_skill' => $my_skill,
            'skills' => Skill::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, ProfileHasSkill $my_skill)
    {
        $this->authorizeProfileRecord($my_skill);

        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'knowledge_percent' => 'required|numeric|min:0|max:100',
        ]);

        $my_skill->skill_id = $request->skill_id;
        $my_skill->knowledge_percent = $request->knowledge_percent;
        $my_skill->save();

        return redirect()->route('my_skill.index')->with('success', 'Habilidade atualizada com sucesso.');
    }

    public function destroy(ProfileHasSkill $my_skill)
    {
        $this->authorizeProfileRecord($my_skill);
        $my_skill->delete();

        return redirect()->route('my_skill.index')->with('success', 'Habilidade removida com sucesso.');
    }
}
