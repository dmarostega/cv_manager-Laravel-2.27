<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Person;
use App\Models\User;
use App\Models\Profile;
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
        $addresses = $profile->Addresses()->first();
        
        //to selects
        $states = State::all();

        return view('admin.profile.index',[
            'user' => $user,
            'profile' => $profile,
            'person' => $person,
            'emails' => $emails,
            'phone' => $phones,
            'address' => $addresses,
            'states' => $states,
            'my_city' => ($addresses !== null ? City::find($addresses->city_id)->first() : null )
        ]);
    }

    public function update(Request $request, Profile $profile){
      //  dd($request,User::find( $profile->user_id ), $profile->Addresses()->first());
        $user = User::find( $profile->user_id );
        $person = $user->Person()->first();
        $emails = $profile->Emails()->first();
        $phones = $profile->Phones()->first();
        $addresses = $profile->Addresses()->first();     
        
        $user->name = $request->name;
        $user->email = $request->email;
        
        $person->name = $request->name;
        $person->birthday = $request->birthday;

        if($request->phone !== null){
            if($phones === null){
                $phones = new Phone();
                $phones->profile_id = $profile->id;
            }
            
            $area_code = substr($request->phone, 0, 2);
            $number = substr($request->phone,2);

            $phones->is_main = 1;
            $phones->phone_type_id = 1;
            $phones->area_code = $area_code;
            $phones->number = $number;

            $phones->save();
        }
        
        if($addresses === null){
            $addresses = new Address();
            $addresses->profile_id = $profile->id;
        }

        $addresses->public_place = $request->address;
        $addresses->number = $request->number;
        $addresses->complement = $request->complement;
        $addresses->district = $request->district;
        $addresses->zip_code = $request->zip_code;
        $addresses->is_main = 1; //Por enquanto será apenas um endereços por perfil
        $addresses->city_id = (isset($request->city_id) ? $request->city_id : null );

        $addresses->save();
        $person->save();
        $user->save();
        $profile->save();

        return redirect()->route('my_profile');
    }
}
