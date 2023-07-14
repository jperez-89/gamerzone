@extends('main')

@section('title', '| Lista de Juegos ')
@section('style')
@endsection

@section('content')
    <div class="submenu-bar" id="bar-round-corners">
        <!--============== BOTONES ===================-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="menu-4buttons">
            <div style="height:30px;text-align:left;margin:0 auto;" class="mostrar-subbutton">
                <button id="btnNuevo" class="button-submenu mostrar-subbutton elimina-boton-izquierdo" title="Nuevo"
                    onclick="window.location='{{ route('Juegos.Detalle', 0) }}'">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file" viewBox="0 0 16 16" style="margin-top: -5px;">
                            <path
                                d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                        </svg>
                    </span>
                    <b style="margin-left:2px;font-weight:400;position:relative;top:-3px;">Nuevo</b>
                </button>
                <button id="btnSalir" class="button-submenu mostrar-subbutton elimina-boton-derecho" title="Nuevo"
                    onclick="window.location='{{ url('/') }}'">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-save2" viewBox="0 0 16 16" style="margin-top: -5px;">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                    <b style="margin-left:2px;font-weight:400;position:relative;top:-3px;">Salir</b>
                </button>
            </div>
        </div>
        <!--============== BOTONES ===================-->
        <!--============== ARBOL DE SEGUIMIENTO (MAPA DEL SISTEMA) ===================-->
        <!-- CONTENEDOR DEL MAPA DEL SISTEMA -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 mostrar-subbutton map-bar" id="user-welcome">
            <h4 style="font-weight:600;">
                <span class="glyphicon glyphicon-map-marker"></span> &nbsp;
                <span style="color:#a0a0a0;">
                    Juego |
                    <span style="color:#fff;">
                        Lista
                    </span>
                </span>
            </h4>
        </div>
        <!-- CONTENEDOR DEL MAPA DEL SISTEMA -->

        <!--============== ARBOL DE SEGUIMIENTO (MAPA DEL SISTEMA) ===================-->

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 mostrar-subbutton map-bar" id="user-welcome">

        </div>
    </div>

    <div class="table-container">
        @include('partials/_message')

        <div class="table-border" style="float:left; margin-top:-15px;">
            <table class="table table-striped table-dark table-hover" style="">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Existencia</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($juegos as $vloJuego)
                        <tr>
                            <th scope="row">{{ $vloJuego->id }}</th>
                            <td>{{ $vloJuego->nombre }}</td>
                            <td>{{ $vloJuego->categoria }}</td>
                            <td>{{ $vloJuego->stock }}</td>
                            <td>
                                <a href="{{ route('Juegos.Detalle', $vloJuego->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                        <path
                                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                        <path
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('Juegos.Borrar', $vloJuego->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-file-x" viewBox="0 0 16 16">
                                        <path
                                            d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z" />
                                        <path
                                            d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection

@section('script')

@endsection
