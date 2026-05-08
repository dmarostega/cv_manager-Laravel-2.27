<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\JobType;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('admin.experience.index', [
            'experiences' => Experience::where('profile_id', $this->currentProfile()->id)->orderByDesc('period_init')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.experience.create', [
            'job_types' => JobType::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validateExperience($request);

        $experience = new Experience();
        $this->fillExperience($experience, $request);
        $experience->profile_id = $this->currentProfile()->id;
        $experience->save();

        return redirect()->route('experience.index')->with('success', 'Experiência cadastrada com sucesso.');
    }

    public function show(Experience $experience)
    {
        $this->authorizeProfileRecord($experience);

        return view('admin.experience.show', [
            'experience' => $experience,
        ]);
    }

    public function edit(Experience $experience)
    {
        $this->authorizeProfileRecord($experience);

        return view('admin.experience.edit', [
            'experience' => $experience,
            'job_types' => JobType::all(),
        ]);
    }

    public function update(Request $request, Experience $experience)
    {
        $this->authorizeProfileRecord($experience);
        $this->validateExperience($request);

        $this->fillExperience($experience, $request);
        $experience->save();

        return redirect()->route('experience.index')->with('success', 'Experiência atualizada com sucesso.');
    }

    public function destroy(Experience $experience)
    {
        $this->authorizeProfileRecord($experience);
        $experience->delete();

        return redirect()->route('experience.index')->with('success', 'Experiência removida com sucesso.');
    }

    private function validateExperience(Request $request): void
    {
        $request->validate([
            'office' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'period_init' => ['nullable', 'date'],
            'period_end' => ['nullable', 'date', 'after_or_equal:period_init'],
        ]);
    }

    private function fillExperience(Experience $experience, Request $request): void
    {
        $experience->office = $request->office;
        $experience->title = $request->title;
        $experience->description = $request->description;
        $experience->company = $request->company;
        $experience->job_type_id = $request->job_type_id;
        $experience->local = $request->local;
        $experience->period_init = $request->period_init;
        $experience->is_actual = $request->has('is_actual') ? 1 : 0;
        $experience->period_end = $experience->is_actual ? null : $request->period_end;
    }
}
