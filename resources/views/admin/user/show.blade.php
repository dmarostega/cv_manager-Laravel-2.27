@extends('admin.layouts.default')

@section('title','Viewing User')

@section('content')         
    <div class="row justify-content-md-center ">
        <div class="col-6 ">
            <div>
                <label for="name">Name</label>
                <div>{{ $user->name }}</div>
            </div>
            <div>
                <label for="email">Email</label>
                <div>{{ $user->email }}</div>
            </div>
            <div>
                <label for="brithday">BirthDay</label>
                <div>{{ $person->birthday }}</div>
            </div>
            <div>
                <label for="profile_type">Type</label>
                <div>{{ $profile->title }}</div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="Created_at">Created At</label>
                    <div>{{ $user->created_at }}</div>
                </div>
                <div class="col-6">
                    <label for="updated_at">Updated At</label>
                    <div>{{ $user->updated_at }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col">                        
                    @if ($user->email_verified_at !== null)
                        <div class="alert alert-success text-center" role="alert">
                            Verified!
                        </div>
                    @else                        
                        <div class="alert alert-danger text-center" role="alert">
                            Not Verified!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
            
@endsection