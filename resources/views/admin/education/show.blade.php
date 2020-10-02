@extends('admin.layouts.default')

@section('title','Show Education')

@section('content')      
    <div class="row  justify-content-md-center">
        <div class="col-6">
            <div>
                <label for="title-education">Title</label>
                <p   id="title-education" aria-describedby="titleHelp" >{{ $education->title }}</p>
            </div>            
            <div>
                <label for="institution-education">Institution</label>
                <p   id="institution-education" aria-describedby="institutionHelp" >{{ $education->institution }}</p>
            </div>
            <div>
                <label for="formation-education">Formation</label>
                <p id="formation-education" cols="30" rows="10"   >{{ $education->formation }}</p>
            </div>
            <div>
                <label for="study_area-education">Study Area</label>
                <p id="study_area-education" cols="30" rows="10"   >{{ $education->study_area }}</p>
            </div>
            <div>
                <label for="activities-education">Activities</label>
                <p id="activities-education" cols="30" rows="10"   >{{ $education->activities }}</p>
            </div>
            <div>
                <label for="description-education">Description</label>
                <p id="description-education" cols="30" rows="10"   >{{ $education->description }}</p>
            </div>
            <div class="row justify-content">
                <div class="col-3">
                    <label for="period_init-education">Init</label>
                    <p id="period_init-education">{{ $education->period_init->toDateString() }}</p>
                </div>
                <div class="col-3">
                    <label for="period_end-education">End</label>
                    <p id="period_end-education">{{ $education->period_end->toDateString() }}</p>            
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        
    </div>
@endsection