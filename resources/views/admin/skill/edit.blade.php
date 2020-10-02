@extends('admin.layouts.default')

@section('title','Edit skill')

@section('content')     
     <form action="{{ route('skill.update', ['skill' => $skill->id ]) }}" method="post">
        @csrf
        @method('PUT')
         <div class="form-group">
             <label for="name-skill">Name</label>
             <input type="text" name="name" class="form-control" id="name-skill" aria-describedby="titleHelp" value="{{ $skill->name }}">
             {{-- <small id="titleHelp" class="form-text text-muted">Verifique</small> --}}
         </div>
         <div class="mb-3">
             <label for="description-skill">Description</label>
             <textarea name="description" id="description-skill" cols="30" rows="10" class="form-control" >{{ $skill->description }}</textarea>
         </div>
       
         <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection