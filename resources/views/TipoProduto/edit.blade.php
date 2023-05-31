@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Editar TipoProduto</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        <form action="{{ route('tipoproduto.update', $tipoProduto->id) }}" method="post" class="row p-2 g-3"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" id="id-input-id" value="{{ $tipoProduto->id }}"
                    disabled>
                <div id="id-input-id" class="form-text">Não é possível alterar o ID.</div>
            </div>
            <div>
                <label for="id-input-descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="id-input-descricao"
                    value="{{ $tipoProduto->descricao }}">
            </div>
            <div>
                <button type="submit" class="btn btn-outline-success col-5">Salvar Alterações</button>
                <a href="{{ route('tipoproduto.index') }}" class="btn btn-outline-secondary col-2 float-end">Voltar</a>
            </div>
        </form>
    </div>
@endsection
