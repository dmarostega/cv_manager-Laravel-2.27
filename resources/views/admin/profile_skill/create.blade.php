@extends('admin.layouts.default')

@section('title','Create Skill')

@section('content')     
     <form action="{{ route('my_skill.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="skill_id">Skills</label>
          <select class="form-control" name="skill_id" id="skill_id">
            <option value="">Select</option>            
            @foreach ($skills as $item)
               <option value="{{ $item->id }}">{{  $item->name }}</option>
            @endforeach
          </select>
        </div>

      <div class="form-group">
        <label for="">Knowledege</label>
        <input type="number" step="0.5"
          class="form-control" name="knowledge_percent" id="knowledge_percent" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Your Knowledge Percent</small>
      </div>

        
        <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection