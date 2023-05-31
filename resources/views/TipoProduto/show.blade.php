@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Show TipoProduto</h2>
        <div class="row p-2 g-3">
            <div>
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" value="{{ $tipoProduto->id }}" readonly>
                <div id="id-input-id" class="form-text">Não é necessário informar um ID para cadastrar um novo dado</div>
            </div>
            <div>
                <label for="id-input-descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="id-input-descricao" value="{{ $tipoProduto->descricao }}"
                    readonly>
            </div>
            <div class="col-6">
                <label for="id-input-updated_at" class="form-label">Updated At</label>
                <input type="text" class="form-control" id="id-input-updated_at" value="{{ $tipoProduto->updated_at }}"
                    readonly>
            </div>
            <div class="col-6">
                <label for="id-input-created_at" class="form-label">Created At</label>
                <input type="text" class="form-control" id="id-input-created_at" value="{{ $tipoProduto->created_at }}"
                    readonly>
            </div>
            <div>
                <a href="{{ route('tipoproduto.index') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </div>
    </div>
@endsection
