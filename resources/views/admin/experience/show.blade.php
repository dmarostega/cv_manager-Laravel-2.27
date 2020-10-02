@extends('admin.layouts.default')

@section('title','Show Experience')

@section('content')      
    <div class="row  justify-content-md-center">
        <div class="col-6">
            <div>
                <label for="title-experience">Title</label>
                <p   id="title-experience" aria-describedby="titleHelp" >{{ $experience->title }}</p>
                {{-- <small id="titleHelp" class="form-text text-muted">Verifique</small> --}}
            </div>
            <div>
                <label for="description-experience">Comment</label>
                <p id="description-experience" cols="30" rows="10"   >{{ $experience->comment }}</p>
            </div>
            <div class="row justify-content">
                <div class="col-3">
                    <label for="period_init-experience">Init</label>
                    <p id="period_init-experience">{{ $experience->period_init }}</p>
                </div>
                <div class="col-3">
                    @if($experience->period_end !== null)
                    <label for="period_end-experience">End</label>
                    <p id="period_end-experience">{{ $experience->period_end }}</p>            
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        
    </div>
@endsection