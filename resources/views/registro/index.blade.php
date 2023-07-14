@extends('main')

@section('title', '| Registro ')
@section('style')
    <link href="{{ asset('/css/logueo.css') }}" rel='stylesheet' type='text/css' />
@endsection

@section('content')
    @include('partials/_message')
    <form action="{{ route('registro.store') }}" id="frmDetalle" class="form-horizontal" method="post" role="form">
        {{ csrf_field() }}
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1 col-md-6 mx-auto">
                    <h3 style="margin-bottom: 6%;">Formulario de Registro</h3>
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-10">
                                <div class="form-group">
                                    <input required type="email" id="email" name="email" class="form-control"
                                        placeholder="Digite su correo de usuario" value="" required />
                                </div>
                                <div class="form-group">
                                    <input required type="text" id="nombre" name="nombre" class="form-control"
                                        placeholder="Digite su nombre" value="" required />
                                </div>
                                <div class="form-group">
                                    <input required type="password" id="password" name="password" class="form-control"
                                        placeholder="Digite su contraseña" value="" />
                                </div>
                                <div class="form-group">
                                    <input required type="password" id="confirmpassword" name="confirmpassword"
                                        class="form-control" placeholder="Confirme su contraseña" value="" />
                                </div>
                                <div class="form-group" style="text-align:center;">
                                    <input type="submit" class="btnSubmit" value="Registro" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($invalid !== null)
                        @if ($invalid !== '')
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $invalid }}
                            </div>
                            {{ $invalid = '' }}
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
