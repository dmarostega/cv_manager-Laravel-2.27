@extends('admin.layouts.default')

@section('title','Skills')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success float-right" href="{{ route('skill.create') }}">Create</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <th>Name</th>
            <th>Description</th>          
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->description }}</td>                   
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('skill.edit',['skill' => $skill->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-secondary" href="{{ route('skill.show',['skill' => $skill->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('skill.destroy', ['skill' => $skill->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="skill" value="{{ $skill->id }}">
                            <input class="btn btn-xs btn-danger" type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            @endforeach               
        </tbody>
    </table>    
@endsection
