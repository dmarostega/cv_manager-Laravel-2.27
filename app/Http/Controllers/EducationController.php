<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('admin.education.index', [
            'educations' => Education::where('profile_id', $this->currentProfile()->id)->orderByDesc('period_init')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|max:255',
            'period_init' => 'required|date',
            'period_end' => 'required|date|after_or_equal:period_init',
        ]);

        $education = new Education();
        $this->fillEducation($education, $request);
        $education->profile_id = $this->currentProfile()->id;
        $education->save();

        return redirect()->route('education.index')->with('success', 'Formação cadastrada com sucesso.');
    }

    public function show(Education $education)
    {
        $this->authorizeProfileRecord($education);

        return view('admin.education.show', [
            'education' => $education,
        ]);
    }

    public function edit(Education $education)
    {
        $this->authorizeProfileRecord($education);

        return view('admin.education.edit', [
            'education' => $education,
        ]);
    }

    public function update(Request $request, Education $education)
    {
        $this->authorizeProfileRecord($education);

        $request->validate([
            'institution' => 'required|max:255',
            'period_init' => 'required|date',
            'period_end' => 'required|date|after_or_equal:period_init',
        ]);

        $this->fillEducation($education, $request);
        $education->save();

        return redirect()->route('education.index')->with('success', 'Formação atualizada com sucesso.');
    }

    public function destroy(Education $education)
    {
        $this->authorizeProfileRecord($education);
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Formação removida com sucesso.');
    }

    private function fillEducation(Education $education, Request $request): void
    {
        $education->title = $request->title;
        $education->institution = $request->institution;
        $education->formation = $request->formation;
        $education->study_area = $request->study_area;
        $education->activities = $request->activities;
        $education->note = $request->note !== null ? (double) $request->note : null;
        $education->description = $request->description;
        $education->period_init = $request->period_init;
        $education->period_end = $request->period_end;
    }
}
