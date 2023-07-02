<div class="sidebar" data-color="jaune" data-background-color="jaune"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            <img src="{{ asset('images') }}/steg.png" alt="">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Accueil') }}</p>
                </a>
            </li>
            @if (Auth::user()->role <= 1)
                <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('admins') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Liste adminstrateurs</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role <= 1)
                <li class="nav-item{{ $activePage == 'users_table' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('users') }}">
                        <i class="fas fa-users-cog"></i>
                        <p>Liste utilisateurs</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role <= -1)
                <li class="nav-item {{ $activePage == 'material_table' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('material')}}">
                        <i class="fas fa-cog"></i>
                        <p>Matériel</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role <= 1)
                <li class="nav-item{{ $activePage == 'reclamation_table' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('reclamations')}}">
                        <i class="fas fa-exchange-alt"></i>
                        <p>Réclamation</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role <= 1)
                <li class="nav-item{{ $activePage == 'stats' ? ' active' : '' }}">
                    <a class="nav-link" href="/stats">
                        <i class="fa fa-bar-chart"></i>
                        <p>Statistique</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 2)
            <li class="nav-item{{ $activePage == 'reclamation_table' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('reclamations')}}">
                    <i class="fas fa-exchange-alt"></i>
                    <p>Ordre de travail</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->role <= 1)
            <li class="nav-item{{ $activePage == 'inbox' ? ' active' : '' }}">
                <a class="nav-link" href="/contact">
                    <i class="fas fa-inbox"></i>
                    <p>Boite de réception</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
