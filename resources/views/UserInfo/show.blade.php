@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        @if (@isset($message))
            <div class="alert alert-{{ $message[1] }} alert-dismissible fade show" role="alert">
                {{ $message[0] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <h2 class="text-center">Show UserInfo</h2>
        <div class="row p-2 g-3">
            <div class="col-6">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" value="{{ $userInfo->Users_id }}" disabled>
                <div id="id-input-id" class="form-text">Não é necessário informar um ID.</div>
            </div>
            <div class="col-6">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" value="{{ $userInfo->status }}" disabled>
                <div id="id-input-status" class="form-text">O status não é controlado pelo usuário.</div>
            </div>
            <div>
                <label for="id-input-profileImg" class="form-label">Profile Image</label>
                <input type="text" class="form-control" id="id-input-profileImg" value="{{ $userInfo->profileImg }}"
                    readonly>
            </div>
            <div class="col-6">
                <label for="id-input-dataNasc" class="form-label">Data Nascimento</label>
                <input type="date" class="form-control" id="id-input-dataNasc" value="{{ $userInfo->dataNasc }}"
                    readonly>
            </div>
            <div class="col-6">
                <label for="id-input-genero" class="form-label">Gênero</label>
                <input type="text" class="form-control" id="id-input-genero" value="{{ $userInfo->genero }}" readonly>
            </div>
            <div class="col-6">
                <label for="id-input-updated_at" class="form-label">Updated At</label>
                <input type="text" class="form-control" id="id-input-updated_at" value="{{ $userInfo->updated_at }}"
                    readonly>
            </div>
            <div class="col-6">
                <label for="id-input-created_at" class="form-label">Created At</label>
                <input type="text" class="form-control" id="id-input-created_at" value="{{ $userInfo->created_at }}"
                    readonly>
            </div>
            <div>
                <a href="{{ route('userinfo.edit', $userInfo->Users_id) }}"
                    class="btn btn-outline-secondary col-3">Editar</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#id-modal-destroy"
                    class="btn btn-outline-danger col-3">Remover</a>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="id-modal-destroy" tabindex="-1" aria-labelledby="id-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="id-modal-label">Mensagem de Confirmação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente remover este recurso?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('userinfo.destroy', $userInfo->Users_id) }}" method="post"
                        id="id-form-modal-botao-remover">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
