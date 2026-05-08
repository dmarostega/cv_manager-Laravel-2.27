<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/admin') }}" class="brand-link">
      <img src="{{ URL::asset('panel/img/AdminLTELogo.png') }}" alt="Currículo Manager" class="brand-image img-circle elevation-3" style="opacity: .9">
      <span class="brand-text">CV Manager</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('panel/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="Usuário autenticado">
        </div>
        <div class="info">
          <a href="{{ route('my_profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      @php
          $profile = Auth::user()->Profile()->first();
      @endphp

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">CURRÍCULO</li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('my_profile') ? 'active' : '' }}" href="{{ route('my_profile') }}">
                  <i class="nav-icon fas fa-user-edit"></i>
                  <p>Meu perfil</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('about.*') ? 'active' : '' }}" href="{{ route('about.index') }}">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>Resumo</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('education.*') ? 'active' : '' }}" href="{{ route('education.index') }}">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>Formação</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('experience.*') ? 'active' : '' }}" href="{{ route('experience.index') }}">
                  <i class="nav-icon fas fa-briefcase"></i>
                  <p>Experiências</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('my_skill.*') ? 'active' : '' }}" href="{{ route('my_skill.index') }}">
                  <i class="nav-icon fas fa-bolt"></i>
                  <p>Minhas habilidades</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('my_social_media.*') ? 'active' : '' }}" href="{{ route('my_social_media.index') }}">
                  <i class="nav-icon fas fa-share-alt"></i>
                  <p>Links sociais</p>
              </a>
          </li>
          @if($profile)
          <li class="nav-item">
              <a class="nav-link" href="{{ route('public.resume', $profile) }}" target="_blank" rel="noopener">
                  <i class="nav-icon fas fa-external-link-alt"></i>
                  <p>Ver link público</p>
              </a>
          </li>
          @endif

          <li class="nav-header">CATÁLOGOS</li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('skill.*') ? 'active' : '' }}" href="{{ route('skill.index') }}">
                  <i class="nav-icon fas fa-tags"></i>
                  <p>Habilidades</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('social_media.*') ? 'active' : '' }}" href="{{ route('social_media.index') }}">
                  <i class="nav-icon fas fa-globe"></i>
                  <p>Redes sociais</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Usuários</p>
              </a>
          </li>

          <li class="nav-header">SESSÃO</li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('home.logout') }}">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Sair</p>
              </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
