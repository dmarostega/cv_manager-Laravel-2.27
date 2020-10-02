<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Person;
use App\Models\User;
use App\Models\ProfileType;
use App\Models\Email;
use App\Models\Phone;
use App\Models\City;
use App\Models\State;

class ProfileController extends Controller
{
    public function index(){

        $user = User::find( Auth::user()->id );
        $profile = $user->Profile()->first();
        $person = $user->Person()->first();
        $emails = $profile->Emails()->first();
        $phones = $profile->Phones()->first();
        $addresses = $profile->Addresses();
        $cities = City::all();
        $states = State::all();

//  dd($phones);
        return view('admin.profile.index',[
            'user' => $user,
            'profile' => $profile,
            'person' => $person,
            'emails' => $emails,
            'phone' => $phones,
            'addresses' => $addresses,
            'states' => $states,
            'cities' => $cities
        ]);
    }
}
