<aside id="sidebar-wrapper">
    <div class="sidebar-brand" style="background-color: green;">
        
        <a href="{{ url('/') }}"><img class="navbar-brand-full app-header-logo" src="{{ asset('img/libreria.jpg') }}" width="60"
        alt="Infyom Logo"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm" style="background-color: green;">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/libreria.jpg') }}" width="65px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu" >
        @include('layouts.menu')
    </ul>

</aside>
