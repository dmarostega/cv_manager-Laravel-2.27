<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\ProfileHasSocialMedia;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileHasSocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        // return view('admin.profile_social_media.index',[
        //     'profile_social_medias' => ProfileHasSocialMedia::where('profile_id','=', User::find( Auth::user()->id )->Profile()->first()->id )->get()
        // ]);     
        return view('admin.profile_social_media.index',[
            'profile_social_medias' => DB::table('profile_has_social_media')
                                            ->join('social_media','social_media.id','=','profile_has_social_media.social_media_id')
                                            ->select('profile_has_social_media.*','social_media.title')
                                            ->where('profile_id','=', User::find( Auth::user()->id )->Profile()->first()->id )
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
        return view('admin.profile_social_media.create', [
            'social_medias' => SocialMedia::all()
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
            'link' => 'required|max:255',
            'social_media_id' => 'required'
        ]);

        $profile_social_media = new ProfileHasSocialMedia();

        $profile_social_media->profile_id = User::find( Auth::user()->id )->Profile()->first()->id;
        $profile_social_media->social_media_id = $request->social_media_id;
        $profile_social_media->link = $request->link;

        $profile_social_media->save();
        
        return redirect()->route('my_social_media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfileHasSocialMedia  $profileHasSocialMedia
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileHasSocialMedia $my_social_media)
    {
        if($my_social_media->profile_id === User::find( Auth::user()->id )->Profile()->first()->id ){
            //dd( $my_social_media->SocialMedia()->first()->title);
            $my_social_media->title = $my_social_media->SocialMedia()->first()->title;
            return view('admin.profile_social_media.show',[
                'my_social_media' => $my_social_media
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfileHasSocialMedia  $profileHasSocialMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileHasSocialMedia $my_social_media)
    {
        if($my_social_media->profile_id === User::find( Auth::user()->id )->Profile()->first()->id ){
            //dd( $my_social_media->SocialMedia()->first()->title);
            $my_social_media->title = $my_social_media->SocialMedia()->first()->title;

            return view('admin.profile_social_media.edit',[
                'my_social_media' => $my_social_media,
                'social_medias' => SocialMedia::all()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfileHasSocialMedia  $profileHasSocialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileHasSocialMedia $my_social_media)
    {
        $request->validate([
            'link' => 'required|max:255',
            'social_media_id' => 'required'
        ]);
        
        if($my_social_media->profile_id === User::find( Auth::user()->id )->Profile()->first()->id ){    
            // dd($request->link)    ;
            $my_social_media->link = $request->link;
            $my_social_media->social_media_id = $request->social_media_id;
            $my_social_media->save();
        }

        return redirect()->route('my_social_media.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfileHasSocialMedia  $profileHasSocialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileHasSocialMedia $my_social_media)
    {
        if($my_social_media->profile_id === User::find( Auth::user()->id )->Profile()->first()->id ){      
            $my_social_media->delete();
        }

        return redirect()->route('my_social_media.index');
    }
}
