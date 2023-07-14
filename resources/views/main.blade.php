<!DOCTYPE html>
<html @lang('en')>

<head>
    @include('partials/_head')
</head>

<body id="page-top">
    @include('partials/_nav')

    <div class="header">
        <!-- Imagen Central del Header -->
        <div class="for-center-header">
            <div class="central-header">
                <div class="row">
                    <!-- Contenedor del logo -->
                    <div class="col-lg-3 col-md-3 col-sm-3 ml-5" id="">
                        <div class="logo-header">
                            <a class="" href="{{ route('Home.Index') }}">
                                <img class="logo-img" src="{{ asset('/images/Logo.png') }}" alt="Logo"
                                    srcset=""></a>
                        </div>
                    </div>
                    <div id="nombre" class="col-lg-9 col-md-9 col-sm-9" id="">
                        <div class="title-header">
                            <h1>GAMER ZONE VIDEO JUEGOS</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Imagen Central del Header -->
    </div>

    <div class="main-container">
        <div class="center-all">
            <div class="central-wraper">
                @yield('content')
            </div>
        </div>
    </div>

    @include('partials/_footer')

    @include('partials/_script')

    @yield('script')
</body>

</html>
