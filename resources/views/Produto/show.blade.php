@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Show Produto</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        <div class="row p-2 g-3">
            <div class="col-2">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id-input-id" id="id-input-id" value="{{ $produto->id }}"
                    readonly>
            </div>
            <div class="col-10">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="id-input-nome" value="{{ $produto->nome }}" readonly>
            </div>
            <div class="col-6">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input type="text" class="form-control" id="id-input-preco" value="{{ $produto->preco }}" readonly>
            </div>
            <div class="col-6">
                <label for="id-input-Tipo_Produtos_id" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="id-input-Tipo_Produtos_id" value="{{ $produto->descricao }}"
                    readonly>
            </div>
            <div>
                <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
                <textarea id="id-input-ingredientes" cols="20" rows="3" class="form-control" readonly>{{ $produto->ingredientes }}</textarea>

            </div>
            <div>
                <label for="id-input-urlImage" class="form-label">urlImage</label>
                <input type="text" class="form-control" id="id-input-urlImage" value="{{ $produto->urlImage }}" readonly>
            </div>
            <div class="col-6">
                <label for="id-input-updatedAt" class="form-label">Updated At</label>
                <input type="text" class="form-control" id="id-input-urlImage" value="{{ $produto->updated_at }}"
                    readonly>
            </div>
            <div class="col-6">
                <label for="id-input-createdAt" class="form-label">Created At</label>
                <input type="text" class="form-control" id="id-input-urlImage" value="{{ $produto->created_at }}"
                    readonly>
            </div>
            <div>
                <a href="{{ route('produto.index') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </div>
    </div>
@endsection
