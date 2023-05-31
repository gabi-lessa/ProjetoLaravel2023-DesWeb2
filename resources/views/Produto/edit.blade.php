@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Editar Produto</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        <form action="{{ route('produto.update', $produto->id) }}" method="POST" class="row p-2 g-3"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-2">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id-input-id" id="id-input-id" value="{{ $produto->id }}"
                    disabled>
                <div id="id-input-id" class="form-text">Não alterar</div>
            </div>
            <div class="col-10">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="id-input-nome" value="{{ $produto->nome }}">
            </div>
            <div class="col-6">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input type="number" class="form-control" name="preco" id="id-input-preco" min="0" step="0.05"
                    value="{{ $produto->preco }}">
            </div>

            <div class="col-6">
                <label for="id-input-Tipo_Produtos_id" class="form-label">Tipo</label>
                <select name="Tipo_Produtos_id" id="id-input-Tipo_Produtos_id" class="form-select">
                    <option selected>Tipo do produto</option>
                    @foreach ($tipoProdutos as $tipoProduto)
                        {{-- Verifico se o option deve ser selecionado --}}
                        @if ($tipoProduto->id == $produto->Tipo_Produtos_id)
                            <option value="{{ $tipoProduto->id }}" selected>{{ $tipoProduto->descricao }}</option>
                        @else
                            <option value="{{ $tipoProduto->id }}">{{ $tipoProduto->descricao }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
                <textarea name="ingredientes" id="id-input-ingredientes" cols="20" rows="3" class="form-control"
                    size="255">{{ $produto->ingredientes }}</textarea>
            </div>
            <div>
                <label for="id-input-urlImage" class="form-label">urlImage</label>
                <input type="text" class="form-control" name="urlImage" id="id-input-urlImage"
                    value="{{ $produto->urlImage }}">
            </div>
            <div>
                <button type="submit" class="btn btn-outline-success col-3">Salvar Alterações</button>
                <button type="reset" class="btn btn-outline-danger col-2">Limpar</button>
                <a href="{{ route('produto.index') }}" class="btn btn-outline-secondary col-2 float-end">Voltar</a>
            </div>
        </form>
    </div>
@endsection
