@push('styles')
        <link rel="icon" type="image/png" href="{{ URL::asset('main/images/favicon.ico') }}">
        <meta charset="UTF-8">
        {{-- without mix helpers --}}
        {{-- <link charset="UTF-8" href="{{ URL::asset('main/css/personalite.css') }}" rel="stylesheet" type="text/css">         --}}
        {{-- get partial path --}}
        {{-- <link rel="stylesheet" href="{{ mix('main/css/personalite.css') }}"> --}}

        {{-- get full path --}}
        <link rel="stylesheet" href="{{ url(mix('main/css/personalite.css')) }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
@endpush

@push('scripts')
        <script src="{{ url(mix('main/js/jquery.js')) }}"></script>
@endpush

@include('main.layouts._partials.header')

@yield('content')

@include('main.layouts._partials.footer')