<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{route('home')}}" class="simple-text logo-normal">
      {{ __('La Gran Ceiba') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
     <li class="nav-item{{ $activePage == 'home' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      <!--
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
-->

      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#Mantenimiento" aria-expanded="true">
            <i class="material-icons">build</i>
          <p>{{ __('Mantenimientos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="Mantenimiento">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('Categoria.index') }}">
                <span class="sidebar-mini"> C </span>
                <span class="sidebar-normal">{{ __('Categoria') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('miner.index') }}">
                <span class="sidebar-mini"> M </span>
                <span class="sidebar-normal">{{ __('Mineral') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('Pajilla.index') }}">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal">{{ __('Pajilla') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('permisos.index') }}">
                <span class="sidebar-mini"> Pe </span>
                <span class="sidebar-normal">{{ __('Permisos') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('Raza.index') }}">
                <span class="sidebar-mini"> R </span>
                <span class="sidebar-normal">{{ __('Razas') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('roles.index') }}">
                <span class="sidebar-mini"> Ro </span>
                <span class="sidebar-normal">{{ __('Roles') }} </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('TipoEvento.index') }}">
                <span class="sidebar-mini"> TE </span>
                <span class="sidebar-normal">{{ __('Tipo Eventos') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>




      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>

    </ul>
  </div>
</div>
