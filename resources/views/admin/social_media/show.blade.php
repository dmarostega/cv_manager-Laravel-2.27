@extends('admin.layouts.default')

@section('title','Show Social Media')

@section('content')      
    <div class="row  justify-content-md-center">
        <div class="col-6">
            <div>
                <label for="title-social_media">Title</label>
                <p   id="title-social_media" aria-describedby="titleHelp" >{{ $social_media->title }}</p>
                {{-- <small id="titleHelp" class="form-text text-muted">Verifique</small> --}}
            </div>
            <div>
                <label for="description-social_media">Description</label>
                <p id="description-social_media" cols="30" rows="10"   >{{ $social_media->description }}</p>
            </div>
            <div>
                <label for="link-social_media">Link</label>
                <p id="link-social_media" cols="30" rows="10"   >{{ $social_media->link }}</p>
            </div> 
            <div>
                <label for="logo_address-social_media">Logo Address</label>
                <p id="logo_address-social_media" cols="30" rows="10"   >{{ $social_media->logo_address }}</p>
            </div>          
        </div>
    </div>

    <div class="row justify-content-md-center">
        
    </div>
@endsection