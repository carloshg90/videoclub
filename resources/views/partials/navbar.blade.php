<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt">&#9820;</span> Videoclub</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- Boto per anar al llistat de pelicules -->
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Catálogo
                        </a>
                    </li>
                    <!-- Boto per crear una pelicula nova -->
                    <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/create')}}">
                            <span>&#10010</span> Nueva película
                        </a>
                    </li>
                    <!-- Boto per veure les categories de pelicules -->
                    <li class="nav-item {{  Request::is('category') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/category')}}">
                        <span class="glyphicon glyphicon-filter"></span> Ver categorias
                        </a>
                    </li>
                    <li>
                    <!-- Barra de cerca de pelicules per nom o director -->
                    <li class="nav-item">
                        <form class="form-inline" action="{{ action('CatalogController@buscar')}}" method="GET" style="margin-top: 0.5em">
                        <input class="form-control nav-link"  type="text" name="buscador" placeholder="Buscar pelicula" aria-label="Buscar pelicula">
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav mr-auto navbar-right">
                    <!-- Boto per tancar sessio -->
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="margin-top: 0.4em; margin-left: 5em">
                            {{ csrf_field() }}
                            <button type="submit" class="nav-link" style="display:inline;cursor:pointer">
                            <span class="glyphicon glyphicon-off"></span>Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
