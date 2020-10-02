@extends('admin.layouts.default')

@section('title','Create Skill')

@section('content')     
     <form action="{{ route('skill.store') }}" method="post">
        @csrf
         <div class="form-group">
                <label for="name-skill">Name</label>
                <input type="text" name="name" class="form-control" id="name-skill" aria-describedby="nameHelp" >
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
         </div>
         <div class="mb-3">
             <label for="description-skill">Description</label>
             <textarea name="description" id="description-skill" cols="30" rows="5" class="form-control"></textarea>
             @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror             
         </div>       
         <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection