@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Cadastrar Endereço</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        <form action="{{ route('endereco.store') }}" method="post" class="row p-2 g-3" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id-input-id" id="id-input-id" value="#" disabled>
                <div id="id-input-id" class="form-text">Não é necessário informar um ID para o cadastro.</div>
            </div>
            <div>
                <label for="id-input-logradouro" class="form-label">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" id="id-input-logradouro"
                    placeholder="Digite o logradouro.">
            </div>
            <div>
                <label for="id-input-bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="id-input-bairro"
                    placeholder="Digite o bairro.">
            </div>
            <div class="col-6">
                <label for="id-input-numero" class="form-label">Número</label>
                <input type="number" class="form-control" name="numero" id="id-input-numero"
                    placeholder="Digite o número.">
            </div>
            <div class="col-6">
                <label for="id-input-complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" name="complemento" id="id-input-complemento"
                    placeholder="Digite o complemento.">
            </div>
            <div>
                <button type="submit" class="btn btn-outline-primary col-3">Enviar</button>
                <button type="reset" class="btn btn-outline-danger col-3">Limpar</button>
                <a href="{{ route('endereco.index') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </form>
    </div>
@endsection
