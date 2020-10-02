@extends('admin.layouts.default')

@section('title','Social Medias')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success float-right" href="{{ route('social_media.create') }}">Create</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <th>Title</th>
            <th>Comment</th>
            <th>Period</th>
        </thead>
        <tbody>
            @foreach($social_medias as $social_media)
                <tr>
                    <td>{{ $social_media->title }}</td>
                    <td>{{ $social_media->comment }}</td>                   
                    <td>                      
                        <a class="btn btn-xs btn-primary" href="{{ route('social_media.edit',['social_media' => $social_media->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-secondary" href="{{ route('social_media.show',['social_media' => $social_media->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('social_media.destroy', ['social_media' => $social_media->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="social_media" value="{{ $social_media->id }}">
                            <input class="btn btn-xs btn-danger" type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            @endforeach               
        </tbody>
    </table>    
@endsection
