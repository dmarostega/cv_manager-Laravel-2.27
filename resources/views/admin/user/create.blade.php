@extends('admin.layouts.default')

@section('title','Create User')

@section('content')     
     <form class="was-validated" action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"
              class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="">     
            @error('name')
                <span  >
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email"
                class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
            @error('email')
                <span  >
                    {{ $message }}
                </span>
            @enderror
        </div>  
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password"
            class="form-control  @error('password') is-invalid @enderror" name="password" id="password" aria-describedby="helpId" placeholder="">
            @error('password')
                <span  >
                    {{ $message }}
                </span>
            @enderror
        </div>  
        <div class="form-group">
          <label for="password-confirm">Pass Confirm!</label>
          <input type="password"
            class="form-control" name="password_confirmation" id="password-confirm" aria-describedby="helpId" placeholder="">
        </div>      
        
        <div class="form-group">
          <label for="profile_type">Profile Type</label>
          <select id="profile_type" class="custom-select" name="profile_type_id">
            <option value="">Select</option>
            @foreach ($profile_types as $item)
              <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
          </select>
            @error('profile_type_id')
                <div > {{ $message }} </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection