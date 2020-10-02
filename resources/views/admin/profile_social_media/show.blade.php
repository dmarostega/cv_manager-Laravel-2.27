@extends('admin.layouts.default')

@section('title','My Social Media')

@section('content')      
    <div class="row  justify-content-md-center">
        <div class="col-6">
            <div>
                <label for="title-my_social_media">Title</label>
                <p   id="title-my_social_media" aria-describedby="titleHelp" >{{ $my_social_media->title }}</p>
                {{-- <small id="titleHelp" class="form-text text-muted">Verifique</small> --}}
            </div>
            <div>
                <label for="description-my_social_media">Your Link</label>
                <p id="description-my_social_media" cols="30" rows="10"   >{{ $my_social_media->link }}</p>
            </div>          
        </div>
    </div>
@endsection