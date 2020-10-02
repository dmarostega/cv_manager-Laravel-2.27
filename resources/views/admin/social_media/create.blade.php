@extends('admin.layouts.default')

@section('title','Create Social Media')

@section('content')     
    <form action="{{ route('social_media.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title-social_media">Title</label>
            <input type="text" name="title" class="form-control" id="title-social_media" aria-describedby="titleHelp" >
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description-social_media">Description</label>
            <textarea name="description" id="description-social_media" cols="30" rows="5" class="form-control"></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror             
        </div> 
        <div class="form-group">
            <label for="link-social_media">Link</label>
            <input id="link-social_media" class="form-control" type="text" name="link">
            @error('link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror   
        </div>        
        <div class="form-group">
          <label for="logo_address">Logo Address</label>
          <input type="text"
            class="form-control" name="logo_address" id="logo_address" aria-describedby="helpLogoAddress" placeholder="Logo Address">
          <small id="helpLogoAddress" class="form-text text-muted">Insert path to Logo.</small>
            @error('logo_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror   
        </div>  
        <div class="form-group">
            <label for="logo-social_media">Logo</label>
            <input id="logo-social_media" class="form-control-file" type="file" name="logo">
            @error('logo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror   
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection