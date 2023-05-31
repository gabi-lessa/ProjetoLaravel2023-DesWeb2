@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-9 col-sm-10 col-12 mt-4 p-2 g-2">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="btn btn-outline-primary" href="{{ route('endereco.index') }}">Gerenciar Enderecos <i
                                class="fa-solid fa-location-dot"></i></a>
                        <a class="btn btn-outline-primary" href="#">Gerenciar Pedidos <i
                                class="fa-solid fa-clipboard-list"></i></a>
                        <a class="btn btn-outline-primary" href="{{ route('userinfo.index') }}">Gerenciar Informações
                            Adicionais <i class="fa-regular fa-address-card"></i></a>
                        <a class="btn btn-outline-secondary float-end" href="{{ url('/') }}">Voltar <i
                                class="fa-solid fa-arrow-rotate-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
