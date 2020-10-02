@extends('admin.layouts.default')

@section('title','Editing My Social Media')

@section('content')     
     <form action="{{ route('my_social_media.update',[  'my_social_media' => $my_social_media->id ]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="social_media_id">Social Media</label>
            <select id="social_media_id" name="social_media_id" class="form-control">
                <option value="">Select</option>
                @foreach ($social_medias as $item)
                    <option @if( $item->id === $my_social_media->social_media_id) selected @endif value="{{   $item->id  }}"> {{  $item->title }}</option>
                @endforeach                
            </select>
            @error('social_media_id')
                <div class="alert alert-danger" role="alert">
                    {{  $message  }}
                </div>
            @enderror
        </div>     
        {{-- <input class="form-control" type="text" name="link"> --}}

        <div class="form-group">
            <label for="link">Personal Link</label>
            <input id="link" class="form-control" type="text" name="link" value="{{ $my_social_media->link }}">
             @error('link')
                <div class="alert alert-danger" role="alert">
                    {{  $message  }}
                </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection