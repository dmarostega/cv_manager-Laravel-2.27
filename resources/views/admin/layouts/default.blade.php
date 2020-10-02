
@push('styles')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome --> <!-- AMD --> <!-- Theme style --> <!-- AMD --> <!-- icheck bootstrap -->   <!-- my custom.css from AdminLTE -->
    <link rel="stylesheet" href="{{ URL::asset('panel/css/adminlte.min.css') }}">      
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endpush

@include('admin.layouts._partials.header')

@include('admin.layouts._partials.navigation')

@include('admin.layouts._partials.siderbarmenu')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->     
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
                @yield('content')
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@push('script')
    <!-- jQuery --><!-- AND --><!-- Bootstrap 4 -->
    <script src="{{ URL::asset('panel/js/admin-init-script.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('panel/js/admin-script.js') }}"></script>

    <script>
        $("select#state_id").change(function(){
            // alert($(this).val());

            $.ajax({
                url: "{{ route('state.all_cities') }}",
                data: { state: $(this).val() },
                dataType: 'json',
                type: 'get',
                success: function(response){
                    var cities_element = $('select#city_id');

                    for(i=0; i<response.length; i++){
                       $('select#city_id').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                    }

                    $('select#city_id').attr('disabled',false);
                }
            })
        })
     </script>

@endpush

@include('admin.layouts._partials.footer')