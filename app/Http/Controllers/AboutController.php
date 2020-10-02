<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use DB;
class AboutController extends Controller
{
    //
    public function index(){
        $abouts = About::where('profile_id','=',User::find(  Auth::user()->id )->Profile()->first()->id )->get();
        return view('admin.about.index', [
            'abouts' => $abouts
        ]);
    }

    public function create(){
        return view('admin.about.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => ['required','max:50'],
            'text' => ['required']
        ]);

        $about = new About();
        $about->title = $request->title;
        $about->text = $request->text;

        $about->profile_id = User::find(  Auth::user()->id  )->Profile()->first()->user_id;
        $about->save();


       return Redirect()->route('about.index');
    }

    public function edit(About $about){
        return view('admin.about.edit',[
            'about' => $about
        ]);
    }

    public function update(About $about, Request $request){

        $request->validate([
            'title' => ['required','max:50'],
            'text' => ['required']
        ]);

        if(!empty($request->title) && !empty($request->title)){
            $about->title = $request->title;
            $about->text = $request->text;
            $about->save();
        }
        return Redirect()->route('about.index');        
    }

    public function destroy(About $about){
        $about->delete();
        return Redirect()->route('about.index');
    }
}
