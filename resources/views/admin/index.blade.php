@extends('admin.layouts.default')

@section('title','Painel do currículo')

@section('content')
@php
    $profile = Auth::user()->Profile()->first();
    $experiences = $profile ? $profile->Experiences()->count() : 0;
    $educations = $profile ? $profile->Educations()->count() : 0;
    $skills = $profile ? $profile->Skills()->count() : 0;
    $completion = 0;
    if ($profile) {
        $completion += $profile->Abouts()->exists() ? 25 : 0;
        $completion += $experiences > 0 ? 25 : 0;
        $completion += $educations > 0 ? 25 : 0;
        $completion += $skills > 0 ? 25 : 0;
    }
@endphp

<section class="cv-hero mb-4">
    <div>
        <span class="text-uppercase font-weight-bold">Gerenciamento de Currículo</span>
        <h2>Construa, publique e compartilhe seu currículo.</h2>
        <p class="mb-0">Atualize experiências, formação, habilidades e links sociais. O link público pode ser impresso ou salvo como PDF pelo navegador.</p>
    </div>
    @if($profile)
        <a href="{{ route('public.resume', $profile) }}" target="_blank" rel="noopener" class="btn btn-light font-weight-bold">Abrir currículo</a>
    @endif
</section>

<div class="row">
    <div class="col-md-3 mb-3"><div class="cv-stat"><span>Conclusão</span><strong>{{ $completion }}%</strong></div></div>
    <div class="col-md-3 mb-3"><div class="cv-stat"><span>Experiências</span><strong>{{ $experiences }}</strong></div></div>
    <div class="col-md-3 mb-3"><div class="cv-stat"><span>Formações</span><strong>{{ $educations }}</strong></div></div>
    <div class="col-md-3 mb-3"><div class="cv-stat"><span>Habilidades</span><strong>{{ $skills }}</strong></div></div>
</div>

<div class="card cv-card mt-2">
    <div class="card-body">
        <h3 class="font-weight-bold">Próximas ações recomendadas</h3>
        <div class="row mt-3">
            <div class="col-md-4 mb-3"><a class="btn btn-primary btn-block" href="{{ route('experience.create') }}">Cadastrar experiência</a></div>
            <div class="col-md-4 mb-3"><a class="btn btn-primary btn-block" href="{{ route('education.create') }}">Cadastrar formação</a></div>
            <div class="col-md-4 mb-3"><a class="btn btn-primary btn-block" href="{{ route('my_skill.create') }}">Adicionar habilidade</a></div>
        </div>
    </div>
</div>
@endsection
