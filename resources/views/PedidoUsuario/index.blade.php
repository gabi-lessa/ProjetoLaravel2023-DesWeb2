@extends('layouts/app')

@section('content')
    <div class="container">
        <script src="{{asset('js/pedidoUsuario.js')}}"></script>
        {{-- Parte Superior --}}
        <div>
            <h1 class="text-center mb-4">
                Faça seu Pedido
            </h1>
            <div class="row g-2">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Filtro de nome de produto">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="buttom">
                                <i id="id-buttom-busca" class="fa-solid fa-magnifying-glass fa-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="form-select" name="" id="id-select-filtro-tipo">
                        <option selected>Filtro de tipo de produto</option>
                        <option value="0">Tudo</option>
                        <option value="1">Pizza</option>
                        <option value="2">Suco</option>
                        <option value="3">Cerveja</option>
                    </select>
                </div>
            </div>
        </div>
        {{-- Parte Meio --}}
        <div id="id-div-lista-produto">

        </div>
        {{-- Parte Inferior --}}
        <div class="my-4 border border-secondary">

        </div>
    </div>
@endsection
