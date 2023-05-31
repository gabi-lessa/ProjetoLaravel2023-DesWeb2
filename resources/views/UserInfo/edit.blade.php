@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        <h2 class="text-center">Editar UserInfo</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        {{-- {{route("userinfo.store")}} == /userinfo --}}
        <form action="{{ route('userinfo.update', $userInfo->Users_id) }}" method="post" class="row p-2 g-3"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-6">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" value="{{ $userInfo->Users_id }}" disabled>
                <div id="id-input-id" class="form-text">Não é necessário informar um ID.</div>
            </div>
            <div class="col-6">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" value="{{ $userInfo->status }}" disabled>
                <div id="id-input-id" class="form-text">O status não é controlado pelo usuário.</div>
            </div>
            <div>
                <label for="id-input-profileImg" class="form-label">Profile Img</label>
                <input type="text" class="form-control" name="profileImg" id="id-input-profileImg"
                    value="{{ $userInfo->profileImg }}">
            </div>
            <div class="col-6">
                <label for="id-input-dataNasc" class="form-label">Data Nascimento</label>
                <input type="date" class="form-control" name="dataNasc" id="id-input-dataNasc"
                    value="{{ $userInfo->dataNasc }}">
            </div>
            <div class="col-6">
                <label for="id-input-genero" class="form-label">Gênero</label>
                <select class="form-select" name="genero" id="id-input-genero">
                    <option selected>{{ $userInfo->genero }}</option>
                    <option value="F">Feminino</option>
                    <option value="M">Masculino</option>
                    <option value="NB">Não-Binárie</option>
                    <option value="T">Travesti</option>
                    <option value="TF">Trans Feminino</option>
                    <option value="TM">Trans Masculino</option>
                    <option value="O">Outro</option>
                    <option value="NI">Prefiro não informar</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-success col-5">Salvar Alterações</button>
                <a href="{{ route('userinfo.index') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </form>
    </div>
@endsection
