@extends('admin.layouts.default')

@section('title','My Skills')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success float-right" href="{{ route('user.create') }}">Create</a>
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
            <th>Name</th>
            <th>Email</th>   
            <th>Verify At</th>   
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>                   
                    <td>{{ $user->email_verified_at }}</td>                   
                    <td>
                    
                        <a class="btn btn-xs btn-primary" href="{{ route('user.edit',['user' => $user->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-secondary" href="{{ route('user.show',['user' => $user->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <input class="btn btn-xs btn-danger" type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            @endforeach               
        </tbody>
    </table>    
@endsection
