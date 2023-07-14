@extends('main')

@section('title', '| Login ')
@section('style')
    <link href="{{ asset('/css/logueo.css') }}" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <!-- FORM LOGIN -->
    <form action="{{ route('logueo.store') }}" id="frmDetalle" class="form-horizontal" method="post" role="form">
        {{ csrf_field() }}
        <div class="login-container2">
            @if ($invalid !== null)
                @if ($invalid !== '')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ $invalid }}
                    </div>
                    {{ $invalid = '' }}
                @endif
            @endif
            <div class="form-group">
                <input class="form-control" id="email" name="email" type="email"
                    placeholder="Digite su correo de usuario" value="" required>
            </div>
            <div class="form-group">
                <input class="form-control" id="contrasena" name="contrasena" type="password"
                    placeholder="Digite su contraseña" value="" required>
                <i class="fa fa-eye text-muted"
                    style="position: relative;top: -25px;right: 10px;float: right;font-size: 16px;"
                    onclick="if($('#contrasena').attr('type')=='text'){$('#contrasena').attr('type','password');$(this).attr('class','fa fa-eye text-muted');}else{$('#contrasena').attr('type','text');$(this).attr('class','fa fa-eye-slash text-muted');}"></i>
            </div>

            <div class="pt-4 pb-3">
                <div class="col-lg-6 col-md-6" style="float:left;width: 50%; text-align:center;">
                    <input type="submit" class="btnSubmit" value="Ingresar" />
                </div>
                <div class="col-lg-6 col-md-6" style="float:left;width: 50%; text-align:center;">
                    <button class="btnRegister" type="button" style="">
                        <a href="{{ route('registro.index') }}" style="color: white;">Registrarse</a>
                    </button>
                </div>
            </div>

            <div class="text-center pt-5">
                <a href="#">
                    <p>Olvidó su contraseña?</p>
                </a>
            </div>
        </div>
    </form>
@endsection
