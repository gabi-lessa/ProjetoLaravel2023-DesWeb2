@extends('layouts/app')

@section('content')
    <div class="container">
        {{-- <?php $message = ['Mensagem a ser exibida', 'danger']; ?> --}}
        @if (@isset($message))
            <div class="alert alert-{{ $message[1] }} alert-dismissible fade show" role="alert">
                {{ $message[0] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="py-2 float-end">
            <a href="{{ route('produto.create') }}" class="btn btn-outline-success">Criar Produto <i
                    class="fa-regular fa-plus"></i></a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Voltar <i
                    class="fa-solid fa-arrow-rotate-left"></i></a>
        </div>

        <table class="table text-center table-hover" id="table">
            <thead>
                <tr>
                    <th scope="col" width="5%">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" width="25%">Nome</th>
                    <th scope="col">Preço</th>

                    <th scope="col"></i></th>
                    <th scope="col"></i></th>
                    <th scope="col"></i></th>
                </tr>
            </thead>
            <tbody>
                {{-- Array e elemento atual --}}
                @foreach ($produtos as $produto)
                    <tr>
                        <td class="text-center">{{ $produto->id }}</td>
                        <td class="text-center">{{ $produto->descricao }}</td>
                        <td class="text-center">{{ $produto->nome }}</td>
                        <td class="text-center">{{ $produto->preco }}</td>

                        <td><a class="link link-primary" href="{{ route('produto.show', $produto->id) }}"><i
                                    class="fa-solid fa-magnifying-glass fa-lg"></i></a></td>
                        <td><a class="link link-info" href="{{ route('produto.edit', $produto->id) }}"><i
                                    class="fa-regular fa-pen-to-square fa-lg"></i></a></td>
                        <td><a class="link link-danger btnRemover" href="#" data-bs-toggle="modal"
                                data-bs-target="#id-modal-destroy" value="{{ route('produto.destroy', $produto->id) }}"><i
                                    class="fa-regular fa-trash-can fa-lg"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                    <form action="" method="post" id="id-form-modal-botao-remover">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Buscando na minha página os elementos que possuem a classe btnRemover
        let arrayBotaoRemover = document.querySelectorAll(".btnRemover");
        let formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");
        // console.log(arrayBotaoRemover);
        arrayBotaoRemover.forEach(element => {
            element.addEventListener('click', function() {
                // Imprimindo a propriedade "value" dentro do elemento que chamou essa função
                // console.log(this.getAttribute("value"));
                // Modifico o atributo action
                formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
            });
        });
    </script>
@endsection
