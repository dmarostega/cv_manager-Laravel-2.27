@extends('admin.layouts.default')

@section('title','Editing User')

@section('content')     
     <form class="" action="{{ route('user.update',['user'=>$user->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"
              class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="" value="{{ $user->name }}">      
            @error('name')
                <span  >
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email"
                class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="" value="{{ $user->email }}">
            @error('email')
                <span  >
                    {{ $message }}
                </span>
            @enderror
        </div>  
     
        
        <div class="form-group">
          <label for="profile_type">Profile Type</label>
          <select id="profile_type" class="custom-select" name="profile_type_id">
            <option value="">Select</option>
            @foreach ($profile_types as $item)
              <option value="{{ $item->id }}" @if($profile_type_id === $item->id) selected @endif>{{ $item->title }}</option>
            @endforeach
          </select>
            @error('profile_type_id')
                <div > {{ $message }} </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection