@extends('admin.layouts.default')

@section('title','Edit my_skill')

@section('content')     
     <form action="{{ route('my_skill.update', ['my_skill' => $my_skill->id ]) }}" method="post">
        @csrf
        @method('PUT')        
         {{-- <div class="mb-3">
             <label for="description-my_skill">Description</label>
             <textarea name="description" id="description-my_skill" cols="30" rows="10" class="form-control" >{{ $my_skill->description }}</textarea>
         </div> --}}
         <div class="form-group">
            <label for="skill_id">Skills</label>
            <select class="form-control" name="skill_id" id="skill_id">
              <option value="">Select</option>            
              @foreach ($skills as $item)
                 <option value="{{ $item->id }}"    @if($item->id === $my_skill->skill_id)  selected @endif > {{  $item->name }}</option>
              @endforeach
            </select>
          </div>
  
        <div class="form-group">
          <label for="">Knowledege</label>
          <input type="number" step="0.5"
            class="form-control" name="knowledge_percent" id="knowledge_percent" aria-describedby="helpId" value="{{ $my_skill->knowledge_percent }}">
          <small id="helpId" class="form-text text-muted">Your Knowledge Percent</small>
        </div>
  
        
         <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection