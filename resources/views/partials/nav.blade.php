<nav class="custom-wrapper" id="menu">
    <div class="pure-menu"></div>
    <ul class="container-flex list-unstyled">
        <li><a href="{{route('pages.home')}}" class="text-uppercase c-gris-2 {{setActiveRoute('pages.home')}}">Inico</a></li>
        <li><a href="{{route('pages.about')}}" class="text-uppercase c-gris-2 {{setActiveRoute('pages.about') }}">Nosotros</a></li>
        <li><a href="{{route('pages.archive')}}" class="text-uppercase c-gris-2 {{setActiveRoute('pages.archive')}}">Archivo</a></li>
        <li><a href="{{route('pages.contact')}}" class="text-uppercase c-gris-2 {{setActiveRoute('pages.contact') }}">Contacto</a></li>
    </ul>
</nav>