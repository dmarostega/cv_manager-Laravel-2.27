<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::where('profile_id','=',    User::find( Auth::user()->id )->Profile()->first()->user_id )->get();

        return view('admin.education.index',[
            'educations' => $educations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.create');
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
            'institution' => 'required'
        ]);

        $education = new Education();
        $education->title = $request->title;
        $education->institution = $request->institution;
        $education->formation = $request->formation;
        $education->study_area = $request->study_area;
        $education->activities = $request->activities;
        $education->note = (double) $request->note;
        $education->description = $request->description;
        $education->period_init = $request->period_init;
        $education->period_end = $request->period_end;

        $education->profile_id = User::find(    Auth::user()->id  )->Profile()->first()->user_id;
        $education->save();
        
        return Redirect()->route('education.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        if($education !== null){
            return view('admin.education.show',[
                'education' => $education
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('admin.education.edit',[
            'education' => $education
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institution' => 'required'
        ]);
        
        if($request){
            $education->title = $request->title;
            $education->institution = $request->institution;
            $education->formation = $request->formation;
            $education->study_area = $request->study_area;
            $education->activities = $request->activities;
            $education->note = (double) $request->note;
            $education->description = $request->description;
            $education->period_init = $request->period_init;
            $education->period_end = $request->period_end;

            $education->save();
        }

        return redirect()->route('education.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('education.index');
    }
}
