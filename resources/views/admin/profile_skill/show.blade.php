@extends('admin.layouts.default')

@section('title','Show My Skill')

@section('content')      
    <div class="row  justify-content-md-center">
        <div class="col-6">
            <div>
                <label for="title-my_skill">Name</label>
                <p   id="title-my_skill" aria-describedby="titleHelp" >{{ $my_skill->name }}</p>
                {{-- <small id="titleHelp" class="form-text text-muted">Verifique</small> --}}
            </div>
            <div>
                <label for="description-my_skill">Percent</label>
                <p id="description-my_skill" cols="30" rows="10"   >{{ $my_skill->knowledge_percent }}</p>
            </div>
        </div>
    </div>
@endsection