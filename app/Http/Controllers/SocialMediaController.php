<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.social_media.index',[
            'social_medias' => SocialMedia::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.social_media.create');
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
            'title' => ['required','max:150'],
            'link' => ['required'],
            'logo_address' => 'required'
        ]);

        $social_media = new SocialMedia();
        $social_media->title = $request->title;
        $social_media->description = $request->description;
        $social_media->link = $request->link;
        $social_media->logo = $request->logo;
        $social_media->logo_address = $request->logo_address;

        $social_media->save();

        return redirect()->route('social_media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\social_media  $social_media
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $social_media)
    {
        return view('admin.social_media.show',[
            'social_media' => $social_media
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\social_media  $social_media
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $social_media)
    {
        return view('admin.social_media.edit',[
            'social_media' => $social_media
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\social_media  $social_media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMedia $social_media)
    {
        $request->validate([
            'title' => ['required','max:150'],
            'link' => ['required'],
            'logo_address' => 'required'
        ]);
       
        $social_media->title = $request->title;
        $social_media->description = $request->description;
        $social_media->link = $request->link;
        $social_media->logo = $request->logo;
        $social_media->logo_address = $request->logo_address;

        $social_media->save();

        return redirect()->route('social_media.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $social_media)
    {
        $social_media->delete();

        return redirect()->route('social_media.index');
    }
}
