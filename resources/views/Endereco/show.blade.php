@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Show Endereços</h2>
        <div class="row p-2 g-3">
            <div class="col-6">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" value="{{ $endereco->id }}" readonly>
            </div>
            <div class="col-6">
                <label for="id-input-Users_id" class="form-label">Users_id</label>
                <input type="text" class="form-control" id="id-input-Users_id" value="{{ $endereco->Users_id }}"
                    readonly>
            </div>
            <div>
                <label for="id-input-logradouro" class="form-label">Logradouro</label>
                <input type="text" class="form-control" id="id-input-logradouro" value="{{ $endereco->logradouro }}"
                    readonly>
            </div>
            <div>
                <label for="id-input-bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="id-input-bairro" value="{{ $endereco->bairro }}" readonly>
            </div>
            <div class="col-6">
                <label for="id-input-numero" class="form-label">Número</label>
                <input type="number" class="form-control" id="id-input-numero" value="{{ $endereco->numero }}" readonly>
            </div>
            <div class="col-6">
                <label for="id-input-complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="id-input-complemento" value="{{ $endereco->complemento }}"
                    readonly>
            </div>

            <div class="col-6">
                <label for="id-input-updated_at" class="form-label">Updated At</label>
                <input type="text" class="form-control" id="id-input-updated_at" value="{{ $endereco->updated_at }}"
                    readonly>
            </div>
            <div class="col-6">
                <label for="id-input-created_at" class="form-label">Created At</label>
                <input type="text" class="form-control" id="id-input-created_at" value="{{ $endereco->created_at }}"
                    readonly>
            </div>
            <div>
                <a href="{{ route('endereco.index') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </div>
    </div>
@endsection
