@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Cadastrar Produto</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        <form action="{{ route('produto.store') }}" method="post" class="row p-2 g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-2">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id-input-id" id="id-input-id" value="#" disabled>
                <div id="id-input-id" class="form-text">Não informar</div>
            </div>
            <div class="col-10">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="id-input-nome" placeholder="Nome do produto">
            </div>
            <div class="col-6">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input type="number" class="form-control" name="preco" id="id-input-preco" min="0" step="0.05"
                    placeholder="Preço do produto">
            </div>

            <div class="col-6">
                <label for="id-input-Tipo_Produtos_id" class="form-label">Tipo</label>
                <select name="Tipo_Produtos_id" id="id-input-Tipo_Produtos_id" class="form-select">
                    <option selected>Tipo do produto</option>
                    @foreach ($tipoProdutos as $tipoProduto)
                        <option value="{{ $tipoProduto->id }}">{{ $tipoProduto->descricao }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
                <textarea name="ingredientes" id="id-input-ingredientes" cols="20" rows="3" class="form-control"
                    size="255" placeholder="Ingredientes do produto"></textarea>
            </div>
            <div>
                <label for="id-input-urlImage" class="form-label">urlImage</label>
                <input type="text" class="form-control" name="urlImage" id="id-input-urlImage"
                    placeholder="Url da imagem do produto">
            </div>
            <div>
                <button type="submit" class="btn btn-outline-primary col-4">Enviar</button>
                <button type="reset" class="btn btn-outline-danger col-4">Limpar</button>
                <a href="{{ route('produto.index') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </form>
    </div>
@endsection
