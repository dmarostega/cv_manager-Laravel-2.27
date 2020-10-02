@extends('admin.layouts.default')

@section('title','Educations')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success float-right" href="{{ route('education.create') }}">Create</a>
        </div>
    </div>
    @error('custom-error')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Ops!</strong> {{ $message }}.
    </div>   
    @enderror
    @if(    session('res-message')  )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Sucess! </strong> {{ session('res-message') }}.
    </div>   
    @endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <th>Title</th>
            <th>Description</th>
            <th>Period</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($educations as $education)
                <tr>
                    <td>{{ $education->title }}</td>
                    <td>{{ $education->description }}</td>
                    <td>
                        <p>{{ $education->period_init->toDateString() }}</p>
                        <p>{{ $education->period_end->toDateString() }}</p>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('education.edit',['education' => $education->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-secondary" href="{{ route('education.show',['education' => $education->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('education.destroy', ['education' => $education->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input  type="hidden" name="education" value="{{ $education->id }}">
                            <input class="btn btn-xs btn-danger" type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            @endforeach               
        </tbody>
    </table>    
@endsection
