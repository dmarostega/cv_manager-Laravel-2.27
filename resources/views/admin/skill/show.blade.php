@extends('admin.layouts.default')

@section('title','Show Sill')

@section('content')      
    <div class="row  justify-content-md-center">
        <div class="col-6">
            <div>
                <label for="name-skill">Name</label>
                <p   id="name-skill" aria-describedby="nameHelp" >{{ $skill->name }}</p>
                {{-- <small id="titleHelp" class="form-text text-muted">Verifique</small> --}}
            </div>
            <div>
                <label for="description-skill">Description</label>
                <p id="description-skill" cols="30" rows="10"   >{{ $skill->description }}</p>
            </div>          
        </div>
    </div>
@endsection