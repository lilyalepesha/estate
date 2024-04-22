<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()?->name }}
            </a>

            @auth
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="button__profile-out" href="{{ route('logout') }}">Выйти</a>
                </div>
            @endauth
            @if(auth()->guard('architects')->check())
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="button__profile-out" href="{{ route('architects.logout') }}">Выйти</a>
                </div>
            @endif
        </li>
        @auth
            <div class="header__avatar-wrapper">
                <div class="header__avatar">
                    @if(!\Illuminate\Support\Facades\Storage::exists('avatars/' . auth()->user()?->avatar_url))
                        <img width="40" height="40" src="{{ asset('storage/' . auth()->user()?->avatar_url) }}"
                             alt="Avatar">
                    @else
                        <span class="load__img">Загрузите изображение</span>
                    @endif
                </div>
            </div>
        @endauth
        @if(auth()->guard('architects')->check())
            <div class="header__avatar">
                <img width="40" height="40"
                     src="{{ asset('storage/' . auth()->guard('architects')->user()?->avatar_url) }}"
                     alt="Avatar">
            </div>
        @endif
    </ul>
</nav>
<!-- /.navbar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column pt-3">
            @if(!auth()->guard('architects')->check())
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="fas fa-user mr-2"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{route('admin.architects.index')}}" class="nav-link">
                    <i class="fas fa-archway mr-2"></i>
                    <p>
                        Архитекторы
                    </p>
                </a>
            </li>
            @if(!auth()->guard('architects')->check())
                <li class="nav-item">
                    <a href="{{route("admin.region.index")}}" class="nav-link">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <p>
                            Регионы
                        </p>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{route("admin.project.index")}}" class="nav-link">
                    <i class="fas fa-project-diagram mr-2"></i>
                    <p>
                        Проекты
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
