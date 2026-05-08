<?php

namespace App\Http\Controllers;

use App\Models\ProfileHasSocialMedia;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileHasSocialMediaController extends Controller
{
    public function index()
    {
        return view('admin.profile_social_media.index', [
            'profile_social_medias' => DB::table('profile_has_social_media')
                ->join('social_media', 'social_media.id', '=', 'profile_has_social_media.social_media_id')
                ->select('profile_has_social_media.*', 'social_media.title')
                ->where('profile_id', $this->currentProfile()->id)
                ->orderBy('social_media.title')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('admin.profile_social_media.create', [
            'social_medias' => SocialMedia::orderBy('title')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|max:255',
            'social_media_id' => 'required|exists:social_media,id',
        ]);

        $profile_social_media = new ProfileHasSocialMedia();
        $profile_social_media->profile_id = $this->currentProfile()->id;
        $profile_social_media->social_media_id = $request->social_media_id;
        $profile_social_media->link = $request->link;
        $profile_social_media->save();

        return redirect()->route('my_social_media.index')->with('success', 'Rede social vinculada com sucesso.');
    }

    public function show(ProfileHasSocialMedia $my_social_media)
    {
        $this->authorizeProfileRecord($my_social_media);
        $my_social_media->title = optional($my_social_media->SocialMedia()->first())->title;

        return view('admin.profile_social_media.show', [
            'my_social_media' => $my_social_media,
        ]);
    }

    public function edit(ProfileHasSocialMedia $my_social_media)
    {
        $this->authorizeProfileRecord($my_social_media);
        $my_social_media->title = optional($my_social_media->SocialMedia()->first())->title;

        return view('admin.profile_social_media.edit', [
            'my_social_media' => $my_social_media,
            'social_medias' => SocialMedia::orderBy('title')->get(),
        ]);
    }

    public function update(Request $request, ProfileHasSocialMedia $my_social_media)
    {
        $this->authorizeProfileRecord($my_social_media);

        $request->validate([
            'link' => 'required|max:255',
            'social_media_id' => 'required|exists:social_media,id',
        ]);

        $my_social_media->link = $request->link;
        $my_social_media->social_media_id = $request->social_media_id;
        $my_social_media->save();

        return redirect()->route('my_social_media.index')->with('success', 'Rede social atualizada com sucesso.');
    }

    public function destroy(ProfileHasSocialMedia $my_social_media)
    {
        $this->authorizeProfileRecord($my_social_media);
        $my_social_media->delete();

        return redirect()->route('my_social_media.index')->with('success', 'Rede social removida com sucesso.');
    }
}
