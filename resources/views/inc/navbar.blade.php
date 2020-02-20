<nav class="navbar navbar-expand-sm navbar-light fixed-top shadow-sm">
    <a class="navbar-brand" href="#">TimeBlock</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navCollapse">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/posts">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/{{Auth::id()}}">Perfil</a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                <div class="dropdown-menu" aria-labelledby="menu">
                    <a class="dropdown-item" href="#"></a>
                </div>
            </li> --}}
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <ul class="navbar-nav mt-2 mt-lg-0 ml-auto mr-0">
            <li class="nav-item active">
                <div class="nav-link"><strong>Hola {{Auth::user()->name}}</strong></div>
                {{-- <a class="nav-link" href="#"><span class="sr-only">(current)</span></a> --}}
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Salir') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        <a class="nav-link" href="logout">Salir<span class="sr-only">(current)</span></a>
                </form> --}}
                {{-- <form action="/logout" method="POST"> --}}
                    {{-- <button class="btn btn-link">Salir</button> --}}
                {{-- </form> --}}
            </li>
        </ul>
    </div>
</nav> 