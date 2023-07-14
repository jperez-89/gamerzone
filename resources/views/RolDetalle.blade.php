@extends('main')

@section('title', '| Lista de Roles ')
@section('style')

@endsection


@section('content')
    <form action="{{ route('Rol.Guardar') }}" id="frmDetalle" class="form-horizontal" method="post" role="form">

        <div class="submenu-bar" id="bar-round-corners">
            <!--============== BOTONES ===================-->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="menu-4buttons">
                <div style="height:30px;text-align:left;margin:0 auto;" class="mostrar-subbutton">
                    <button id="btnNuevo" class="button-submenu mostrar-subbutton elimina-boton-izquierdo" title="Nuevo"
                        onclick="window.location='{{ route('Rol.Detalle', 0) }}'">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file" viewBox="0 0 16 16" style="margin-top: -5px;">
                                <path
                                    d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                            </svg>
                        </span>
                        <b style="margin-left:2px;font-weight:400;position:relative;top:-3px;">Nuevo</b>
                    </button>

                    <button type="submit" id="btn_Guardar" class="button-submenu mostrar-subbutton " title="Save">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-save2" viewBox="0 0 16 16" style="margin-top: -5px;">
                                <path
                                    d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                            </svg>
                        </span>
                        <b style="margin-left:2px;font-weight:400;position:relative;top:-3px">Guardar</b>
                    </button>
                    <button id="btnSalir" class="button-submenu mostrar-subbutton elimina-boton-derecho" title="Nuevo"
                        onclick="window.location='{{ route('Rol.Index') }}'">
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
                        Rol |
                        <span style="color:#fff;">
                            Detalle
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

            <div class="table-border" style="float:left; margin-top:-15px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxs div-border form-bord"
                    style="float:left; margin-bottom:0px;background:#fff;padding-top:5px !important;border:1px solid #d8d8d8">
                    <!-- CONTENEDOR DE LOS INPUTS DEL FORMULARIO -->


                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" id="idold" name="idold" value="{{ $rol->id }}">
                    <div class="mb-3 ml-10 mr-10" style="margin-left: 10px; margin-right: 10px;">
                        <label for="id" class="form-label">Codigo</label>
                        <input type="text" required class="form-control{{ $rol->id == 0 ? '' : '-plaintext' }}"
                            id="id" name="id" value="{{ $rol->id == 0 ? '' : $rol->id }}"
                            {{ $rol->id == 0 ? '' : 'readonly' }}>

                    </div>
                    <div class="mb-3" style="margin-left: 10px; margin-right: 10px;">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" required class="form-control" id="nombre" name="nombre"
                            value="{{ $rol->nombre }}">
                    </div>

                </div>
            </div>

        </div>
    </form>

@endsection

@section('script')

@endsection
