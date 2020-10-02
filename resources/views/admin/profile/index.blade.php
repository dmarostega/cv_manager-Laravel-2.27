@extends('admin.layouts.default')

@section('title','My Profile')

@section('content')
    <form action="{{ route('my_profile') }}" method="post">
        <div class="row">            
            <div class="col-2" style="border: 1px solid green">
                <div class="img-editable">
                    <img src="{{ URL::asset('main/images/ElvisPresley.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">                    
                </div>    
            </div>
            <div class="col-10">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="title">Title</span>
                        </div>
                        <input class="form-control" type="text" title="title" placeholder="My title" aria-label="My title" aria-describedby="title" value="{{ $profile->title }}">
                    </div>
                </div> 
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="name">Name</span>
                        </div>
                        <input class="form-control" type="text" name="name" placeholder="My Name" aria-label="My Name" aria-describedby="name" value="{{ $person->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="profile-email">Email</span>
                        </div>
                        <input class="form-control" type="email" name="email" aria-describedby="profile-email" value="{{ $user->email }}">
                    </div>
                </div>       
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="profile-birthday">Birthday</span>
                        </div>
                        <input class="form-control" type="text" name="birthday" aria-describedby="profile-birthday" value="{{ $person->birthday->toDateString() }}">
                    </div>
                </div>      
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="profile-phone">Phone</span>
                        </div>
                        <input class="form-control" type="text" name="phone"  aria-describedby="profile-phone" value="{{ ( $phone !== null ? $phone->number : '' ) }}">
                    </div>
                </div>        
            </div>            
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h4>Address</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">                
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="profile-address">Place</span>
                        </div>
                        <input class="form-control" type="text" name="address" aria-describedby="profile-address" value="{{ '' }}">
                    </div>
                </div>      
            </div>
            <div class="col-2">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="address-number">N.</span>
                        </div>
                        <input class="form-control" type="text" name="number" aria-describedby="address-number" value="{{ '' }}">
                    </div>
                </div>      
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">                
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="address-complement">Complement</span>
                        </div>
                        <input class="form-control" type="text" name="complement" aria-describedby="address-complement" value="{{ '' }}">
                    </div>
                </div>      
            </div>
            <div class="col-2">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="address-zip_code">Zip Code</span>
                        </div>
                        <input class="form-control" type="text" name="zip_code" aria-describedby="address-zip_code" value="{{ '' }}">
                    </div>
                </div>      
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">                
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="address-district">District</span>
                        </div>
                        <input class="form-control" type="text" name="district" aria-describedby="address-district" value="{{ '' }}">
                    </div>
                </div>      
            </div>            
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-5">
                <div class="form-group">
                    <label for="city_id">City</label>
                    <select id="city_id" class="custom-select" name="city_id" disabled>
                        <option value="">Select State</option>
                    </select>
                </div>
            </div>            
            <div class="col-5">
                <div class="form-group">
                    <label for="state_id">State</label>
                    <select id="state_id" class="custom-select" name="state_id" >
                        <option value="">Select</option>
                        @foreach($states as $state)
                           <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> 
    </form>
@endsection
