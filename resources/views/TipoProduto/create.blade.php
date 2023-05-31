@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Cadastrar TipoProduto</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        <form action="{{ route('tipoproduto.store') }}" method="post" class="row p-2 g-3" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id-input-id" id="id-input-id" value="#" disabled>
                <div id="id-input-id" class="form-text">Não é necessário informar um ID para cadastrar um novo dado</div>
            </div>
            <div>
                <label for="id-input-descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="id-input-descricao"
                    placeholder="Digite uma descrição. Ex: 'Pizza'.">
            </div>
            <div>
                <button type="submit" class="btn btn-outline-primary col-5">Enviar</button>
                <a href="{{ route('tipoproduto.index') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </form>
    </div>
@endsection
