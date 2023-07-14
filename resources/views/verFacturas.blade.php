@extends('main')

@section('title', '| Lista de Facturas ')
@section('style')

@endsection

@section('content')
    <div class="submenu-bar" id="bar-round-corners">
        <!--============== ARBOL DE SEGUIMIENTO (MAPA DEL SISTEMA) ===================-->
        <!-- CONTENEDOR DEL MAPA DEL SISTEMA -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 mostrar-subbutton map-bar" id="user-welcome">
            <h4 style="font-weight:600;">
                <span class="glyphicon glyphicon-map-marker"></span> &nbsp;
                <span style="color:#a0a0a0;">
                    Lista |
                    <span style="color:#fff;">
                        Facturas
                    </span>
                </span>
            </h4>
        </div>
        <!-- CONTENEDOR DEL MAPA DEL SISTEMA -->
    </div>

    <div class="table-container">
        <div class="table-border" style="float:left; margin-top:-15px;">
            <table class="table table-striped table-dark table-hover" style="">
                <thead>
                    <tr>
                        <th scope="col"># Factura</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Total</th>
                        <th scope="col">Ver PDF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Facturas as $Factura)
                        <tr>
                            <th>{{ $Factura->numeroFactura }}</th>
                            <td>{{ $Factura->Fecha }}</td>
                            <td>{{ $Factura->nombre }}</td>
                            <td>{{ $Factura->costoTotal }}</td>
                            <td>
                                <a target="_blank" href="{{ asset('/facturas_pdf/' . $Factura->numeroFactura . '.pdf') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                        <path
                                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                        <path
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
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
