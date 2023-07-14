@extends('main')

@section('title', '| Juegos ')
@section('style')
@endsection

@section('content')
    {{ csrf_field() }}
    <div class="submenu-bar" id="bar-round-corners" style="float:left;">
        <!-- INPUT BUSCADOR -->
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" id="user-welcome">
            <div class="input-group" style="width: 100%;margin-top: 8px;height: 35px;">
                <input type="text" class="form-control" aria-label="" placeholder="Digite el juego a buscar..."
                    style="width: 65%;">
                <button class="btn btn-outline-secondary" type="button" style="width: 10%;">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                            </path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        {{-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="submenu-buttons" style="Float: right;">
            @include('partials/_message')
        </div> --}}
    </div>

    <!-- CAROUSEL -->
    <div style="float:left; width: 100%;">
        <div style="text-align: center;">
            <!-- Carousel wrapper -->
            <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel"
                style="margin-top: 10px;">
                <!-- Controls -->
                <div class="d-flex justify-content-center mb-4">
                    <button class="carousel-control-prev position-relative" type="button"
                        data-mdb-target="#carouselMultiItemExample" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next position-relative" type="button"
                        data-mdb-target="#carouselMultiItemExample" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Inner -->
                <div class="carousel-inner">
                    @php
                        $contador = 1;
                        $primerbloque = true;
                    @endphp
                    @foreach ($juegos as $juego)
                        @if ($contador == 1)
                            <div class="carousel-item  {{ $primerbloque ? 'active' : '' }}">
                                <div class="contenedor-juegos">
                                    <div class="row" style="margin-bottom: 25px;max-width: 1155px;">
                                    @else
                                        @if ($contador == 4)
                                    </div>
                                    <div class="row" style="margin-bottom: 25px;max-width: 1155px;">
                        @endif
                    @endif

                    <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                        <div class="card shadow card-hover">
                            <img src="/images/{{ $juego->rutafoto }}" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">{{ $juego->nombre }}</h5>
                                <p class="card-text">
                                    {{ strlen($juego->descripcion) > 37 ? substr($juego->descripcion, 0, 37) . '...' : $juego->descripcion }}
                                </p>
                                @if (session('CodigoUsuario') !== null)
                                    @if (session('CodigoUsuario') !== '')
                                        <button type="button" id="btnAgregar" name="btnAgregar" class="btn btn-primary"
                                            onclick="AgregarCarrito('{{ route('Home.AgregarCarrito') }}', {{ $juego->id }})">¢
                                            {{ $juego->precio }}</button>
                                    @else
                                        <a href="{{ route('logueo.index') }}" class="btn btn-primary">Accede para ver
                                            precio</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    @if ($contador == 6)
                        @php
                            $contador = 1;
                        @endphp
                </div>
            </div>
        </div>
    @else
        @php
            $contador = $contador + 1;
        @endphp
        @endif
        @php
            $primerbloque = false;
        @endphp
        @endforeach
    </div>
    <!-- Inner -->
    </div>
    <!-- Carousel wrapper -->
@endsection

@if (session('mensaje') && session('tipo'))
    @section('script')
        <script>
            alertify.success(@php echo "'" . session('mensaje') . "'" @endphp);
        </script>
    @endsection
@endif
