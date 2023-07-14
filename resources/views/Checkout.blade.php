@extends('main')

@section('title', '| Carrito de Compras ')
@section('style')
    <style>
        .btn-danger:hover {
            background-color: #7e0005;
        }
    </style>

@endsection

@section('content')
    <div class="table-container">
        @include('partials/_message')
        <div class="table-border" style="float:left; margin-top:-15px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xxs form-bord"
                style="float:left; margin-bottom:25px;background:#fff;padding-top:5px !important; solid #d8d8d8">
                <div class="col-lg-7 col-md-7 mb-7 mb-lg-7"
                    style="height: 400px; overflow: auto; float: left;padding-left: 10px;padding-right: 10px;">
                    <h3 class="text-center">Juegos en el carrito</h3>
                    @if (count($compras) > 0)
                        <table class="table table-striped table-dark table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                    <tr>
                                        @if ($compra->rutafoto !== '')
                                            <td scope="row">
                                                <img src="/images/{{ $compra->rutafoto }}"
                                                    style="width: 80px; height: 50px" />
                                            </td>
                                        @else
                                        @endif
                                        <td scope="row">{{ $compra->juego }}</td>
                                        <td scope="row">{{ $compra->nombre }}</td>
                                        <td scope="row">{{ $compra->precio }}</td>
                                        <td scope="row">
                                            <form action="{{ route('Compra.BorrarCompra') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="idCompra" value="{{ $compra->id }}">
                                                <button class="btn btn-link btn-sm btn-danger" type="submit">x</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div align="right" class="">
                            <a target="_blank" class="btn btn-success" onclick='recargar(1)'
                                href="{{ route('Compra.ProcesarCompra', session('CodigoUsuario')) }}">Procesar Compra</a>
                        </div>
                    @else
                        <div class="mt-5">
                            <span>No tienes juegos reservados</span>
                        </div>
                    @endif
                </div>
                <div class="col-lg-5 col-md-5 h-100"
                    style=" overflow: auto; float: left;padding-left: 10px;padding-right: 10px;">
                    <h3 class="text-center mb-4">Informacion de Compra</h3>
                    <div class="table-border center" style="margin-top:-15px;">
                        <img class="w-100" src="/images/juegos/forma_pago.webp" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/main.js"></script>
@endsection

@section('script')

@endsection
