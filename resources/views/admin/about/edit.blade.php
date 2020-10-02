@extends('admin.layouts.default')

@section('title','Create About')

@section('content')     
     <form action="{{ route('about.update', ['about' => $about->id ]) }}" method="post">
        @csrf
        @method('PUT')
         <div class="form-group">
             <label for="title-about">Title</label>
             <input type="text" name="title" class="form-control" id="title-about" aria-describedby="titleHelp" value="{{ $about->title }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         </div>
         <div class="mb-3">
             <label for="text-about">Text</label>
             <textarea name="text" id="text-about" cols="30" rows="10" class="form-control" >{{ $about->text }}</textarea>
             @error('text')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         </div>
         <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection