@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
    </div>
@endif

@if(session('custom-error') || session('res-error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('custom-error') ?? session('res-error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>Revise os campos:</strong>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
