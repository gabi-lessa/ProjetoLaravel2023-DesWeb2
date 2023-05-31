@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Editar Endereço</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        <form action="{{ route('endereco.update', $endereco->id) }}" method="post" class="row p-2 g-3"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" id="id-input-id" value="{{ $endereco->id }}"
                    disabled>
            </div>
            <div>
                <label for="id-input-logradouro" class="form-label">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" id="id-input-logradouro"
                    value="{{ $endereco->logradouro }}">
            </div>
            <div>
                <label for="id-input-bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="id-input-bairro"
                    value="{{ $endereco->bairro }}">
            </div>
            <div class="col-6">
                <label for="id-input-numero" class="form-label">Número</label>
                <input type="number" class="form-control" name="numero" id="id-input-numero"
                    value="{{ $endereco->numero }}">
            </div>
            <div class="col-6">
                <label for="id-input-complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" name="complemento" id="id-input-complemento"
                    value="{{ $endereco->complemento }}">
            </div>
            <div>
                <button type="submit" class="btn btn-outline-success col-5">Salvar Alterações</button>
                <a href="{{ route('endereco.index') }}" class="btn btn-outline-secondary col-2 float-end">Voltar</a>
            </div>
        </form>
    </div>
@endsection
