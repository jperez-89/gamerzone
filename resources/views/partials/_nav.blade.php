<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('Home.Index') }}"
            style="color: rgb(249 10 10 / 90%); font-weight: bold;">Video Juegos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (session('CodigoUsuario') !== null)
                    @if (session('CodigoUsuario') !== '')
                        @if (session('RolUsuario') == 1)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Procesos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('lista_facturas') }}">Ver Facturas</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Mantenimiento
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('Categorias.Index') }}">Categoria</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('Juegos.Index') }}">Juego</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Administracion
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('Rol.Index') }}">Rol</a></li>
                                    <li><a class="dropdown-item" href="{{ route('Usuarios.Index') }}">Usuario</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Pedido
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('Compra.Checkout') }}">Ver mis
                                            Pedidos</a></li>
                                </ul>
                            </li>
                        @endif
                    @endif
                @endif

            </ul>
        </div>

        @if (session('CodigoUsuario') !== null)
            @if (session('CodigoUsuario') !== '')
                <a class="navbar-brand" href="{{ route('Compra.Checkout') }}"
                    style="color: rgb(220 218 218 / 90%); font-weight: bold; margin-right: -8px;">
                    <span class="livicon" data-name="comments" data-size="30" data-color="#fff" data-hovercolor="#fff"
                        data-duration="700" data-i="2"
                        style="position: relative; width: 30px; height: 30px; color:white;" id="livicon-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor"
                            class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </span>
                </a>
                @if (count($cantcompras))
                    <span class="badge badge-danger">
                        {{ count($cantcompras) }}
                    </span>
                @else
                    <span id="lblCantCarrito" class="badge badge-danger"></span>
                @endif

                @if (count($cantcompras))
                    <a class="navbar-brand" href="{{ route('logueo.index') }}"
                        style="color: rgb(220 218 218 / 90%); font-weight: bold; margin-right: 5px;">{{ session('NombreUsuario') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16"style="margin-left: 5px;">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                @else
                    <a class="navbar-brand" href="{{ route('logueo.index') }}"
                        style="color: rgb(220 218 218 / 90%); font-weight: bold; margin-right: 5px; margin-left: 20px;">{{ session('NombreUsuario') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16"style="margin-left: 5px;">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                @endif
            @else
                <a class="navbar-brand" href="{{ route('logueo.index') }}"
                    style="color: rgb(220 218 218 / 90%); font-weight: bold; margin-right: 5px;">Acceder
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16"style="margin-left: 5px;">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </a>
            @endif
        @endif
    </div>
</nav>

</div>
