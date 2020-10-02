@extends('admin.layouts.default')

@section('title','Create Skill')

@section('content')     
     <form action="{{ route('my_social_media.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="social_media_id">Social Media</label>
                <select id="social_media_id" name="social_media_id" class="form-control">
                    <option>Select</option>
                @foreach ($social_medias as $item)
                    <option value="{{   $item->id  }}"> {{  $item->title }}</option>
                @endforeach
                    
                </select>
        </div>     
        {{-- <input class="form-control" type="text" name="link"> --}}

        <div class="form-group">
            <label for="link">Personal Link</label>
            <input id="link" class="form-control" type="text" name="link">
        </div>
        
        <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection