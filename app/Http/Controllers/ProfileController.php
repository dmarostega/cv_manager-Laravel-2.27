<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\Email;
use App\Models\Person;
use App\Models\Phone;
use App\Models\Profile;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = $this->currentUser();
        $profile = $this->currentProfile();
        $person = $user->Person()->first() ?: new Person(['name' => $user->name]);
        $email = $profile->Emails()->where('is_main', 1)->first() ?: $profile->Emails()->first();
        $phone = $profile->Phones()->where('is_main', 1)->first() ?: $profile->Phones()->first();
        $address = $profile->Addresses()->where('is_main', 1)->first() ?: $profile->Addresses()->first();

        return view('admin.profile.index', [
            'user' => $user,
            'profile' => $profile,
            'person' => $person,
            'emails' => $email,
            'phone' => $phone,
            'address' => $address,
            'states' => State::all(),
            'my_city' => $address ? City::find($address->city_id) : null,
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        abort_unless((int) $profile->id === (int) $this->currentProfile()->id, 403);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $profile->user_id,
            'title' => 'nullable|max:100',
            'birthday' => 'nullable|date',
            'phone' => 'nullable|max:30',
            'zip_code' => 'nullable|max:20',
        ]);

        $user = User::findOrFail($profile->user_id);
        $person = $user->Person()->first() ?: new Person();
        $email = $profile->Emails()->where('is_main', 1)->first() ?: new Email();
        $phone = $profile->Phones()->where('is_main', 1)->first() ?: new Phone();
        $address = $profile->Addresses()->where('is_main', 1)->first() ?: new Address();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $profile->title = $request->title ?: $profile->title;
        $profile->save();

        $person->name = $request->name;
        $person->birthday = $request->birthday;
        $person->save();

        if ((int) $user->person_id !== (int) $person->id) {
            $user->person_id = $person->id;
            $user->save();
        }

        $email->profile_id = $profile->id;
        $email->address = $request->email;
        $email->is_main = 1;
        $email->status = 1;
        $email->save();

        if ($request->filled('phone')) {
            $digits = preg_replace('/\D+/', '', $request->phone);
            $phone->profile_id = $profile->id;
            $phone->is_main = 1;
            $phone->status = 1;
            $phone->phone_type_id = 1;
            $phone->area_code = substr($digits, 0, 2) ?: 0;
            $phone->number = substr($digits, 2) ?: $digits;
            $phone->save();
        }

        $address->profile_id = $profile->id;
        $address->public_place = $request->address;
        $address->number = $request->number;
        $address->complement = $request->complement;
        $address->district = $request->district;
        $address->zip_code = $request->zip_code;
        $address->is_main = 1;
        $address->city_id = $request->city_id ?: $address->city_id;
        $address->save();

        return redirect()->route('my_profile')->with('success', 'Perfil atualizado com sucesso.');
    }
}
