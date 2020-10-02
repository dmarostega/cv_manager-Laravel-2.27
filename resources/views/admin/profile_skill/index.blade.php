@extends('admin.layouts.default')

@section('title','My Skills')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success float-right" href="{{ route('my_skill.create') }}">Create</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <th>Name</th>
            <th>Yout Percents</th>   
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($my_skills as $my_skill)
                <tr>
                    <td>{{ $my_skill->name }}</td>
                    <td>{{ $my_skill->knowledge_percent }}</td>                   
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('my_skill.edit',['my_skill' => $my_skill->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-secondary" href="{{ route('my_skill.show',['my_skill' => $my_skill->id]) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('my_skill.destroy', ['my_skill' => $my_skill->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="my_skill" value="{{ $my_skill->id }}">
                            <input class="btn btn-xs btn-danger" type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
            @endforeach               
        </tbody>
    </table>    
@endsection
