<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::with('User.Person')->first();

        if ($profile) {
            return $this->show($profile);
        }

        return view('main.index', [
            'profile' => null,
            'user' => null,
            'person' => null,
            'about' => null,
            'experiences' => collect(),
            'educations' => collect(),
            'skills' => collect(),
            'socialMedias' => collect(),
            'email' => null,
            'phone' => null,
            'address' => null,
        ]);
    }

    public function show(Profile $profile)
    {
        $profile->load(['User.Person', 'Abouts', 'Experiences', 'Educations', 'Skills.Skill', 'SocialMedias.SocialMedia', 'Emails', 'Phones', 'Addresses']);
        $user = $profile->User()->first();

        return view('main.index', [
            'profile' => $profile,
            'user' => $user,
            'person' => $user ? $user->Person()->first() : null,
            'about' => $profile->Abouts()->orderByDesc('is_main')->first(),
            'experiences' => $profile->Experiences()->get(),
            'educations' => $profile->Educations()->get(),
            'skills' => $profile->Skills()->with('Skill')->orderByDesc('knowledge_percent')->get(),
            'socialMedias' => $profile->SocialMedias()->with('SocialMedia')->get(),
            'email' => $profile->Emails()->where('is_main', 1)->first() ?: $profile->Emails()->first(),
            'phone' => $profile->Phones()->where('is_main', 1)->first() ?: $profile->Phones()->first(),
            'address' => $profile->Addresses()->where('is_main', 1)->first() ?: $profile->Addresses()->first(),
        ]);
    }

    public function showByUser(User $user)
    {
        return $this->show($user->Profile()->firstOrFail());
    }
}
