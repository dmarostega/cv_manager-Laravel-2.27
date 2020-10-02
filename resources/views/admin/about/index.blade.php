@extends('admin.layouts.default')

@section('title','Abouts')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success float-right" href="{{ route('about.create') }}">Create</a>
        </div>
    </div>
    <table class="table table-light ">
        <thead class="thead-dark">
            <th>Title</th>
            <th>Text</th>
            <th>Signature Img</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($abouts as $about)
                <tr>
                    <td>{{ $about->title }}</td>
                    <td>{{ $about->text }}</td>
                    <td>
                        <img style="width: 100px; height: 70px;" src="{{ $about->image }}" alt="{{ $about->image }}">
                    </td>
                    <td  style="width: 10%;">
                        <a class="btn btn-xs btn-primary" href="{{ route('about.edit',['about' => $about->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-secondary" href="{{ route('about.show',['about' => $about->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('about.destroy', ['about' => $about->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="about" value="{{ $about->id }}">
                            <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach               
        </tbody>
    </table>    
@endsection
