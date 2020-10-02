@extends('admin.layouts.default')

@section('title','Edit Education')

@section('content')     
     <form action="{{ route('education.update', ['education' => $education->id ]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title-education">Title</label>
            <input type="text" name="title" class="form-control" id="title-education" aria-describedby="titleHelp" value="{{ $education->title }}">
            @error('title')
               <span  >
                   {{ $message }}
               </span>
           @enderror
        </div>
        <div class="form-group">
            <label for="institution-education">Institution</label>
            <input type="text" name="institution" class="form-control" id="institution-education" aria-describedby="titleHelp"  value="{{ $education->institution }}">
            @error('institution')
               <span  >
                   {{ $message }}
               </span>
           @enderror
        </div>
        <div class="form-group">
            <label for="formation-education">Formation</label>
            <input type="text" name="formation" class="form-control" id="formation-education" aria-describedby="titleHelp"  value="{{ $education->formation }}">
            @error('formation')
               <span  >
                   {{ $message }}
               </span>
           @enderror
        </div>
        <div class="form-group">
            <label for="study_area-education">Study Area</label>
            <input type="text" name="study_area" class="form-control" id="study_area-education" aria-describedby="titleHelp"  value="{{ $education->study_area}}">
            @error('study_area')
               <span  >
                   {{ $message }}
               </span>
           @enderror
        </div>
        <div class="mb-3">
           <label for="activities-education">Activities</label>
           <textarea name="activities" id="activities-education" cols="30" rows="10" class="form-control">{{ $education->activities }}</textarea>
           @error('activities')
               <span  >
                   {{ $message }}
               </span>
           @enderror
        </div>
        <div class="mb-3">
           <label for="description-education">Description</label>
           <textarea name="description" id="description-education" cols="30" rows="10" class="form-control">{{ $education->description }}</textarea>
           @error('description')
               <span  >
                   {{ $message }}
               </span>
           @enderror
        </div>        
        <div class="form-group">
            <label for="note-education">Note</label>
            <input type="text" name="note" class="form-control" id="note-education" aria-describedby="titleHelp" value="{{ $education->note}}">
            @error('note')
               <span  >
                   {{ $message }}
               </span>
           @enderror
        </div>
         <div class="row mb-5">
            <div class="col-6">
                <label for="period_init">Initial</label>
                <input class="form-control"    type="date" name="period_init" id="period_init"  value="{{ $education->period_init->toDateString() }}">
                @error('period_init')
                    <span  >
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-6 ">
                <label for="period_end">Finally</label>
                <input class="form-control" type="date" name="period_end" id="period_end"  value="{{ $education->period_end->toDateString() }}">
                @error('period_end')
                    <span  >
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
         <button type="submit" class="btn btn-primary">Send</button>
     </form>
@endsection