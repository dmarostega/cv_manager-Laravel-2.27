<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use App\Models\Profile;
use App\Models\ProfileType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create',[            
            'profile_types' => ProfileType::all()
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
            'name' => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_type_id' => ['required']
        ]);

        $person = new Person();
        $person->name = $request->name;
        $person->save();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $profile = new Profile();
        $profile->title = '';
        $profile->profile_type_id = $request->profile_type_id;
        
        $profile->user_id = $user->id;
        $user->person_id = $person->id;

        $profile->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //### Verificar melhor forma de regras para usuarios etc
       // dd(User::find(Auth::user()->id)->Profile()->first()->profile_type_id );
       // if(User::find(Auth::user()->id)->Profile()->first()->profile_type_id === 1){
            return view('admin.user.show',[
                'user' => $user,
                'profile' => $user->Profile()->first()->ProfileType()->first(),
                'person' => $user->Person()->first() 
            ]);
        //}

        //return redirect()->route('user.index')->withErrors(['custom-error'=>'Acesso Não permitido!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('admin.user.edit',[            
            'user' => $user,
            'profile_type_id' => $user->Profile()->first()->ProfileType()->first()->id,
            'profile_types' => ProfileType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],           
            'profile_type_id' => ['required']
        ]);

        if(User::find(Auth::user()->id)->Profile()->first()->profile_type_id === 1){
        //    $user = new User();
            $user->name = $request->name;
            // dd($user->email, $request->email, $user->email  !== $request->email );
            if($user->email  !== $request->email){
                $user->email = $request->email;
            }
            $user->Profile()->first()->profile_type_id = $request->profile_type_id;
            $user->save();
            return redirect()->route('user.index')->with(['res-message' => " Usuário: {$user->name}, alterado com sucesso!"]);   
        }        
        return redirect()->route('user.index')->withErrors(['res-error' => " Não foi possível alterar usuário {$user->name} !"]);  ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(User::find(Auth::user()->id)->Profile()->first()->profile_type_id === 1){
            if( $user->delete() === true ){
                return redirect()->route('user.index')->with(['res-message' => " Usuário: {$user->name}, removido com sucesso!"]);   
            }
        }
        return redirect()->route('user.index')->withErrors(['res-error' => ' Não foi possível remover !']);        
    }
}
