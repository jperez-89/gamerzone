<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura {{ $nFact }}</title>

</head>

<style>
    .table-container {
        width: 100%;
        height: auto;
        background: #fff;
        float: left;
        padding: 5px;
        margin-top: 20px;
    }

    .table-border {
        width: 100%;
        height: auto;
        background-color: rgba(14, 62, 118, 0.04);
        padding: 5px;
        border: 1px solid #e0e0e0;
        border-radius: 3px;
        float: left;
        background: #ffffff !important;
    }

    .text-center {
        text-align: center !important
    }

    .mb-1 {
        margin-bottom: .25rem !important
    }

    .mb-2 {
        margin-bottom: .5rem !important
    }

    .mb-3 {
        margin-bottom: 1rem !important
    }

    .mb-4 {
        margin-bottom: 1.5rem !important
    }

    .mb-5 {
        margin-bottom: 3rem !important
    }

    .mt10 {
        margin-top: 25px !important
    }

    .ml65 {
        margin-left: 65px !important
    }

    .mt0 {
        margin-top: 0px !important
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch
    }

    .table-borderless>:not(caption)>*>* {
        border-bottom-width: 0
    }

    .table-sm>:not(caption)>*>* {
        padding: .25rem .25rem
    }

    .text-dark {
        color: #212529 !important
    }

    .divPrincipal {
        display: flex;
    }

    .texto {
        float: left;
    }

    .data {
        float: right;
    }

    .titulos {
        background-color: firebrick;
        color: aliceblue;
    }

    .colr {
        text-align: right;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2
    }

    .h2,
    h2 {
        font-size: calc(1.325rem + .9vw)
    }

    .h6,
    h6 {
        font-size: 1rem
    }

    table {
        caption-side: bottom;
        border-collapse: collapse
    }

    .table {
        --bs-table-bg: transparent;
        --bs-table-striped-color: #212529;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #212529;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #212529;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6
    }

    .table>:not(caption)>*>* {
        padding: .5rem .5rem;
        background-color: var(--bs-table-bg);
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg)
    }

    .table>tbody {
        vertical-align: inherit
    }

    .table>thead {
        vertical-align: bottom
    }

    .table>:not(:last-child)>:last-child>* {
        border-bottom-color: currentColor
    }

    .table-sm>:not(caption)>*>* {
        padding: .25rem .25rem
    }

    .table-bordered>:not(caption)>* {
        border-width: 1px 0
    }

    .table-bordered>:not(caption)>*>* {
        border-width: 0 1px
    }

    .table-borderless>:not(caption)>*>* {
        border-bottom-width: 0
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: var(--bs-table-striped-bg);
        color: var(--bs-table-striped-color)
    }

    .table-active {
        --bs-table-accent-bg: var(--bs-table-active-bg);
        color: var(--bs-table-active-color)
    }

    .table-hover>tbody>tr:hover {
        --bs-table-accent-bg: var(--bs-table-hover-bg);
        color: var(--bs-table-hover-color)
    }

    .table-primary {
        --bs-table-bg: #cfe2ff;
        --bs-table-striped-bg: #c5d7f2;
        --bs-table-striped-color: #000;
        --bs-table-active-bg: #bacbe6;
        --bs-table-active-color: #000;
        --bs-table-hover-bg: #bfd1ec;
        --bs-table-hover-color: #000;
        color: #000;
        border-color: #bacbe6
    }

    .table-secondary {
        --bs-table-bg: #e2e3e5;
        --bs-table-striped-bg: #d7d8da;
        --bs-table-striped-color: #000;
        --bs-table-active-bg: #cbccce;
        --bs-table-active-color: #000;
        --bs-table-hover-bg: #d1d2d4;
        --bs-table-hover-color: #000;
        color: #000;
        border-color: #cbccce
    }

    .table-success {
        --bs-table-bg: #d1e7dd;
        --bs-table-striped-bg: #c7dbd2;
        --bs-table-striped-color: #000;
        --bs-table-active-bg: #bcd0c7;
        --bs-table-active-color: #000;
        --bs-table-hover-bg: #c1d6cc;
        --bs-table-hover-color: #000;
        color: #000;
        border-color: #bcd0c7
    }

    .table-info {
        --bs-table-bg: #cff4fc;
        --bs-table-striped-bg: #c5e8ef;
        --bs-table-striped-color: #000;
        --bs-table-active-bg: #badce3;
        --bs-table-active-color: #000;
        --bs-table-hover-bg: #bfe2e9;
        --bs-table-hover-color: #000;
        color: #000;
        border-color: #badce3
    }

    .table-warning {
        --bs-table-bg: #fff3cd;
        --bs-table-striped-bg: #f2e7c3;
        --bs-table-striped-color: #000;
        --bs-table-active-bg: #e6dbb9;
        --bs-table-active-color: #000;
        --bs-table-hover-bg: #ece1be;
        --bs-table-hover-color: #000;
        color: #000;
        border-color: #e6dbb9
    }

    .table-danger {
        --bs-table-bg: #f8d7da;
        --bs-table-striped-bg: #eccccf;
        --bs-table-striped-color: #000;
        --bs-table-active-bg: #dfc2c4;
        --bs-table-active-color: #000;
        --bs-table-hover-bg: #e5c7ca;
        --bs-table-hover-color: #000;
        color: #000;
        border-color: #dfc2c4
    }

    .table-light {
        --bs-table-bg: #f8f9fa;
        --bs-table-striped-bg: #ecedee;
        --bs-table-striped-color: #000;
        --bs-table-active-bg: #dfe0e1;
        --bs-table-active-color: #000;
        --bs-table-hover-bg: #e5e6e7;
        --bs-table-hover-color: #000;
        color: #000;
        border-color: #dfe0e1
    }

    .table-dark {
        --bs-table-bg: #212529;
        --bs-table-striped-bg: #2c3034;
        --bs-table-striped-color: #fff;
        --bs-table-active-bg: #373b3e;
        --bs-table-active-color: #fff;
        --bs-table-hover-bg: #323539;
        --bs-table-hover-color: #fff;
        color: #fff;
        border-color: #373b3e
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch
    }

    @media (max-width:575.98px) {
        .table-responsive-sm {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch
        }
    }

    @media (max-width:767.98px) {
        .table-responsive-md {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch
        }
    }

    @media (max-width:991.98px) {
        .table-responsive-lg {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch
        }
    }

    @media (max-width:1199.98px) {
        .table-responsive-xl {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch
        }
    }

    @media (max-width:1399.98px) {
        .table-responsive-xxl {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch
        }
    }
</style>

<body>
    <div class="table-container">
        <div class="table-border">
            <div class="text-center mb-4">
                <h2>GAMER ZONE</h2>
                <h6>facturacion@gamerzone.com</h6>
                <h6>3-101-5684768</h6>
                <h6>San José, Costa Rica</h6>
            </div>
            <div class="divPrincipal">
                <div class="texto">
                    <h6>Cliente:</h6>
                </div>
                <div class="ml65">
                    <h6> {{ $compras[0]->nombreUsuario }}</h6>
                </div>
            </div>
            <div class="divPrincipal">
                <div class="texto">
                    <h6>Correo: </h6>
                </div>
                <div class="ml65">
                    <h6> {{ session('CodigoUsuario') }}</h6>
                </div>
            </div>
            <div class="divPrincipal">
                <div class="texto">
                    <h6>Factura: </h6>
                </div>
                <div class="ml65">
                    <h6>{{ $nFact }}</h6>
                </div>
            </div>
            <div class="divPrincipal">
                <div class="texto">
                    <h6>Fecha: </h6>
                </div>
                <div class="ml65">
                    <h6>{{ $factura->created_at }}</h6>
                </div>
            </div>
            <table class="table mt10">
                <thead>
                    <tr class="titulos">
                        <th style="text-align: left">Codigo</th>
                        <th style="text-align: left">Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr>
                            <td>{{ $compra->codigojuego }}</td>
                            <td>{{ $compra->juego }}</td>
                            <td style="text-align: center">{{ $compra->precio }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td align="left">
                            <h6 style="text-align: center" class="text-dark">Total {{ $total }}</h6>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
