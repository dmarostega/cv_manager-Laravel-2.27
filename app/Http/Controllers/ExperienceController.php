<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\User;
use App\Models\JobType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::where('profile_id','=',User::find(   Auth::user()->id    )->Profile()->first()->user_id )->get();

        return view('admin.experience.index',[
            'experiences' => $experiences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experience.create',[
            'job_types' => JobType::all()
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
            'office' => ['required','max:255'],
            'title' => ['required','max:255']
        ]);

        $experience = new Experience();
        $experience->office = $request->office;
        $experience->title = $request->title;
        $experience->description = $request->description;
        $experience->company = $request->company;
        $experience->job_type_id = $request->job_type_id;
        $experience->local = $request->local;
        $experience->period_init = $request->period_init;
        $experience->period_end = $request->period_end;
        
        $experience->is_actual = $request->is_actual;

        if($experience->is_actual === 'on'){
            $experience->is_actual = 1;
            $experience->period_end = null;
        }else{
            $experience->is_actual = 0;
        }

        $experience->profile_id =  User::find(  Auth::user()->id  )->Profile()->first()->id;

        if( $experience->save()){
            return redirect()->route('experience.index')->with(['success' => 'New Experience created with success!']);
        }else{
            return redirect()->route('experience.index')->with(['custom-error' => 'The record could not be saved!!']);
        }         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return view('admin.experience.show',[
            'experience' => $experience
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('admin.experience.edit',[
            'experience' => $experience,
            'job_types' => JobType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
   /*    $request->validate([
            'office' => ['required','max:255'],
            'title' => ['required','max:255']
        ]);
*/
        $experience->office = $request->office;
        $experience->title = $request->title;
        $experience->description = $request->description;
        $experience->company = $request->company;
        $experience->job_type_id = $request->job_type_id;
        $experience->local = $request->local;
        $experience->period_init = $request->period_init;
        $experience->period_end = $request->period_end;

        $experience->is_actual = $request->is_actual;

        if($experience->is_actual === 'on'){
            $experience->is_actual = 1;
            $experience->period_end = null;
        }else{
            $experience->is_actual = 0;
        }

        if( $experience->save()){
            return redirect()->route('experience.index')->with(['success' => 'Experience save with sucess!']);
        }else{
            return redirect()->route('experience.index')->with(['custom-error' => 'Não deu!']);
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        if($experience->profile_id === User::find(  Auth::user()->id )->Profile()->first()->id){
            $experience->delete();
            return redirect()->route('experience.index');
        }
    }
}
