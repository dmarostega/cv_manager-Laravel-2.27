@extends('main.layouts.default')

@section('title', ($user->name ?? 'Currículo') . ' - Currículo online')

@section('content')
@php
    $displayName = $user->name ?? ($person->name ?? 'Seu nome');
    $headline = $profile->title ?? 'Profissional em evolução';
    $summary = $about->text ?? 'Cadastre seu resumo profissional no painel administrativo para publicar uma apresentação objetiva sobre sua carreira.';
    $publicUrl = $profile ? route('public.resume', $profile) : url('/');
@endphp
<div class="resume-shell">
    <section class="resume-hero">
        <div>
            <span class="resume-kicker">Currículo online</span>
            <h1>{{ $displayName }}</h1>
            <h2>{{ $headline }}</h2>
            <div class="resume-actions">
                <a class="resume-btn" href="javascript:window.print()">Gerar PDF</a>
                <a class="resume-btn secondary" href="{{ $publicUrl }}">Link compartilhável</a>
                @auth
                    <a class="resume-btn secondary" href="{{ url('/admin') }}">Editar no painel</a>
                @endauth
            </div>
        </div>
        <div class="resume-card">
            <strong>Contato</strong>
            <ul class="contact-list" style="margin-top: 16px">
                @if($email)<li>{{ $email->address }}</li>@endif
                @if($phone)<li>+{{ $phone->country_code ?? 55 }} ({{ $phone->area_code }}) {{ $phone->number }}</li>@endif
                @if($address)<li>{{ $address->public_place }}{{ $address->number ? ', ' . $address->number : '' }}</li>@endif
            </ul>
        </div>
    </section>

    <div class="resume-grid">
        <main>
            <section id="about" class="resume-card resume-section">
                <h3>Sobre</h3>
                <p>{{ $summary }}</p>
            </section>

            <section id="experience" class="resume-card resume-section">
                <h3>Experiências profissionais</h3>
                @forelse($experiences as $experience)
                    <article class="timeline-item">
                        <h4>{{ $experience->office }} <span class="resume-muted">{{ $experience->company ? '· ' . $experience->company : '' }}</span></h4>
                        <div class="timeline-meta">
                            {{ optional($experience->period_init)->format('m/Y') ?? 'Início não informado' }} —
                            {{ $experience->is_actual ? 'Atual' : (optional($experience->period_end)->format('m/Y') ?? 'Fim não informado') }}
                            {{ $experience->local ? ' · ' . $experience->local : '' }}
                        </div>
                        <p>{{ $experience->description }}</p>
                    </article>
                @empty
                    <p class="resume-muted">Nenhuma experiência cadastrada ainda.</p>
                @endforelse
            </section>

            <section id="education" class="resume-card resume-section">
                <h3>Formação</h3>
                @forelse($educations as $education)
                    <article class="timeline-item">
                        <h4>{{ $education->formation ?? $education->title }} <span class="resume-muted">{{ $education->institution ? '· ' . $education->institution : '' }}</span></h4>
                        <div class="timeline-meta">
                            {{ optional($education->period_init)->format('m/Y') }} — {{ optional($education->period_end)->format('m/Y') }}
                        </div>
                        <p>{{ $education->description }}</p>
                    </article>
                @empty
                    <p class="resume-muted">Nenhuma formação cadastrada ainda.</p>
                @endforelse
            </section>
        </main>

        <aside>
            <section class="resume-card resume-section">
                <h3>Habilidades</h3>
                @forelse($skills as $mySkill)
                    <div class="skill-line">
                        <header>
                            <strong>{{ optional($mySkill->Skill)->name ?? 'Habilidade' }}</strong>
                            <span>{{ $mySkill->knowledge_percent }}%</span>
                        </header>
                        <div class="skill-bar"><span style="width: {{ min(100, max(0, (int) $mySkill->knowledge_percent)) }}%"></span></div>
                    </div>
                @empty
                    <p class="resume-muted">Nenhuma habilidade cadastrada ainda.</p>
                @endforelse
            </section>

            <section id="contact" class="resume-card resume-section">
                <h3>Links</h3>
                <ul class="contact-list">
                    @forelse($socialMedias as $social)
                        <li><a href="{{ $social->link }}" target="_blank" rel="noopener">{{ optional($social->SocialMedia)->title ?? $social->link }}</a></li>
                    @empty
                        <li class="resume-muted">Nenhum link social cadastrado ainda.</li>
                    @endforelse
                </ul>
            </section>
        </aside>
    </div>
</div>
@endsection
