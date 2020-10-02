<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="{{  URL::asset('panel\img\AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Rock Code!</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{  URL::asset('panel\img\user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name  }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
          
              <a class="nav-link" href="{{ route('my_profile') }}">
                  <i class="nav-icon fas fa-th"></i>
                   My Profile
              </a>
          </li>
            <li class="nav-item">
            
                <a class="nav-link" href="{{ route('about.index') }}">
                    <i class="nav-icon fas fa-th"></i>
                     About
                </a>
            </li>
            <li class="nav-item">            
                <a class="nav-link" href="{{ route('education.index') }}">
                    <i class="nav-icon fas fa-th"></i>
                     Educations
                </a>
            </li>
            <li class="nav-item">
            
                <a class="nav-link" href="{{ route('experience.index') }}">
                    <i class="nav-icon fas fa-th"></i>
                     Experiences
                </a>
            </li>
            <li class="nav-item">            
                <a class="nav-link" href="{{ route('my_skill.index') }}">
                    <i class="nav-icon fas fa-th"></i>
                     My Skills
                </a>
            </li>   
            <li class="nav-item">            
                <a class="nav-link" href="{{ route('my_social_media.index') }}">
                    <i class="nav-icon fas fa-th"></i>
                     My Social Medias
                </a>
            </li>            
            <hr>
            <li class="nav-item">
            
                <a class="nav-link" href="{{ route('skill.index') }}">
                    <i class="nav-icon fas fa-th"></i>
                     Skills
                </a>
            </li>
            <li class="nav-item">            
                <a class="nav-link" href="{{ route('social_media.index') }}">
                    <i class="nav-icon fas fa-th"></i>
                     Social Media
                </a>
            </li>
            <li class="nav-item">            
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="nav-icon fas fa-th"></i>
                     Users
                </a>
            </li>
            <hr>
            
            <li class="nav-item">            
                <a class="nav-link" href="{{ route('home.logout') }}">
                    <i class="nav-icon fas fa-th"></i>
                     Logout
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>