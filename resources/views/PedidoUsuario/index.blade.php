@extends('layouts/app')

@section('content')
    <div class="container">
        <script src="{{ asset('js/pedidoUsuario.js') }}"></script>
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
                        <option value="0" selected>Tudo</option>
                        <option value="1">Pizza</option>
                        <option value="2">Suco</option>
                        <option value="3">Cerveja</option>
                    </select>
                </div>
            </div>
        </div>
        {{-- Parte Meio --}}
        {{-- Itens do Pedido --}}
        <div id="id-div-lista-produto">

        </div>
        {{-- Parte Inferior --}}
        <div class="my-4 border border-secondary">
            <div class="m-3">
                <h4>Itens do Pedido <i class="fa-solid fa-cart-shopping"></i></h4>
            </div>
            <div class="m-3">
                <table class="table text-center">
                    <tbody id="id-tbody-itens-pedido"></tbody>
                </table>
            </div>
            <div class="m-3">
                <a href="#" class="btn btn-outline-primary w-100">Próximo <i class="fa-solid fa-angles-right"></i></a>
            </div>
        </div>
    </div>
@endsection
