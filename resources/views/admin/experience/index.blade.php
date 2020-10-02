@extends('admin.layouts.default')

@section('title','Experiences')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success float-right" href="{{ route('experience.create') }}">Create</a>
        </div>
    </div>
    @if(    session('custom-error')  )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Ops!</strong> {{ $message }}.
    </div>   
    @endif
    @if(    session('success')  )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Sucess! </strong> {{ session('success') }}.
    </div>   
    @endif
    <table class="table table-bordered">
        <thead class="thead-dark">
            <th>Title</th>
            <th>Comment</th>
            <th>Period</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($experiences as $experience)
                <tr>
                    <td>{{ $experience->title }}</td>
                    <td>{{ $experience->description }}</td>
                    <td>
                        <p>{{ ( $experience->period_init !== null ? $experience->period_init->toDateString() :'') }}</p>

                        <p>{{ ( $experience->period_end !== null ? $experience->period_end->toDateString() :'') }}</p>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('experience.edit',['experience' => $experience->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-secondary" href="{{ route('experience.show',['experience' => $experience->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('experience.destroy', ['experience' => $experience->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="experience" value="{{ $experience->id }}">
                            <input class="btn btn-xs btn-danger" type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            @endforeach               
        </tbody>
    </table>    
@endsection
