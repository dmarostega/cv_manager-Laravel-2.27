@extends('admin.layouts.default')

@section('title','Your Social Medias')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success float-right" href="{{ route('my_social_media.create') }}">Create</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <th>Name</th>
            <th>Your Link</th>          
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($profile_social_medias as $profile_social_media)
                <tr>
                    <td>{{ $profile_social_media->title }}</td>                
                    <td>{{ $profile_social_media->link }}</td>                
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('my_social_media.edit',['my_social_media' => $profile_social_media->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-secondary" href="{{ route('my_social_media.show',['my_social_media' => $profile_social_media->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('my_social_media.destroy', ['my_social_media' => $profile_social_media->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="my_social_media" value="{{ $profile_social_media->id }}">
                            <input class="btn btn-xs btn-danger" type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            @endforeach               
        </tbody>
    </table>    
@endsection
