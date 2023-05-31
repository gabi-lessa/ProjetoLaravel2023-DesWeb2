@extends('layouts/app')

@section('content')
    <div class="container col-md-6 col-sm-8 col-10 border p-2 g-2">
        @if (@isset($message))
            <div class="alert alert-{{ $message[1] }} alert-dismissible fade show" role="alert">
                {{ $message[0] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <h2 class="text-center">Cadastrar UserInfo</h2>
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão encaminhados --}}
        {{-- {{route("userinfo.store")}} == /userinfo --}}
        <form action="{{ route('userinfo.store') }}" method="post" class="row p-2 g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-6">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" value="#" disabled>
                <div id="id-input-id" class="form-text">Não é necessário informar um ID.</div>
            </div>
            <div class="col-6">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" value="#" disabled>
                <div id="id-input-id" class="form-text">O status não é controlado pelo usuário.</div>
            </div>
            <div>
                <label for="id-input-profileImg" class="form-label">Profile Img</label>
                <input type="text" class="form-control" name="profileImg" id="id-input-profileImg"
                    placeholder="Digite o caminho para a imagem">
            </div>
            <div class="col-6">
                <label for="id-input-dataNasc" class="form-label">Data Nascimento</label>
                <input type="date" class="form-control" name="dataNasc" id="id-input-dataNasc"
                    placeholder="Digite o número.">
            </div>
            <div class="col-6">
                <label for="id-input-genero" class="form-label">Gênero</label>
                <select class="form-select" name="genero" id="id-input-genero">
                    <option selected>Informe seu gênero</option>
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
                <button type="submit" class="btn btn-outline-primary col-3">Enviar</button>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary col-3 float-end">Voltar</a>
            </div>
        </form>
    </div>
@endsection
