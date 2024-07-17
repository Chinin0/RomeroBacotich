<aside id="sidebar-wrapper">
    <div class="sidebar-brand" style="background-color: black;">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logonuevo.png') }}" width="250"
             alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm" style="background-color: black;">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logonuevoo.png') }}" width="65px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu" >
        @include('layouts.menu')
    </ul>

</aside>
