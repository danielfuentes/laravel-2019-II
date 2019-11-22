@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifca tu Dirección de Correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un enlace de verificación a su dirección de correo.') }}
                        </div>
                    @endif

                    {{ __('Después de este procedimiento, por favor chequee su email para verificar el enlace.') }}
                    {{ __('Si tu no recives aun el email de verificación') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click aquí para recibir otro') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
