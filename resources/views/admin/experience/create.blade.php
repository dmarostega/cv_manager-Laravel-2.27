@extends('admin.layouts.default')

@section('title','Create Experience')

@section('content')     
     <form action="{{ route('experience.store') }}" method="post">
        @csrf
        <div class="input-group-prepend">
            <div class="input-group-text">
                <span class="badge badge-secondary m-1">Is Actual</span>        
                <input type="checkbox" name="is_actual" aria-label="Checkbox for following text input">             
            </div>            
        </div>
        <div class="form-group">
               <label for="office-experience">Office</label>
               <input type="text" name="office" class="form-control" id="office-experience" aria-describedby="officeHelp" >
               @error('office')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
        </div>
        <div class="form-group">
            <label for="company-experience">Company</label>
            <input type="text" name="company" class="form-control" id="company-experience" aria-describedby="titleHelp" >
            @error('company')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>        
        <div class="form-group">
               <label for="title-experience">Title</label>
               <input type="text" name="title" class="form-control" id="title-experience" aria-describedby="titleHelp" >
               @error('title')
                   <div class="alert alert-danger">{{ $message }}</div>
               @enderror
        </div>
        <div class="mb-3">
            <label for="description-experience">Description</label>
            <textarea name="description" id="description-experience" cols="30" rows="10" class="form-control"></textarea>
            @error('description')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror             
        </div>
        <div class="mb-3">
            <label for="local-experience">Local</label>
            <input type="text" name="local" class="form-control" id="local-experience" aria-describedby="localHelp" >
            @error('local')
               <div class="alert alert-danger">{{ $message }}</div>
            @enderror             
        </div>
        <div class="form-group">
            <label for="job_type_id-experience">Job Type</label>
            <select id="job_type_id-experience" class="custom-select" name="job_type_id">
                <option value="">Select</option>
                @foreach($job_types as $job_type)
                <option value="{{ $job_type->id }}">{{ $job_type->title }}</option>
            @endforeach
            </select>
        </div>
         <div class="row mb-5">
            <div class="col-6">
                <label for="period_init">Initial</label>
                <input class="form-control" type="date" name="period_init" id="period_init">
                @error('period_init')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror   
            </div>
            <div class="col-6 ">
                <label for="period_end">Finally</label>
                <input class="form-control" type="date" name="period_end" id="period_end">  
                @error('period_end')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror   
            </div>
        </div>
         <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection