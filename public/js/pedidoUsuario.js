// executa o JS depois de todo o HTML ser carregado;
// $(document).ready( function() {
// no JS, a busca retorna um objeto mais simples
// const listaProduto = document.querySelector("#id-div-lista-produto");
// console.log(listaProduto);

// no JQuery, a busca retorna um objeto mais completo
// const listaProduto = $("#id-div-lista-produto");
// console.log(listaProduto);

// Procurar um botão na página e add um evento de click

// No JS
// document.querySelector("#id-buttom-busca").addEventListener("click", function(){
//     alert("Botão clicado");
// });

// No JQuery
// $("#id-buttom-busca").click( function(){
//         alert("Botão clicado");
//     });
// });

//     // Pelo jQuery HIDE/SHOW
//     $("#id-button-busca").click(function () {
//         // alert('Botão pressionado');
//         const selectFiltroTipo = $("#id-select-filtro-tipo");
//         if (selectFiltroTipo.is(":hidden")) {
//             selectFiltroTipo.show(400);
//         } else {
//             selectFiltroTipo.hide(400);
//         }
//     });

//     // Pelo jQuery fadeIn/fadeOut
//     $("#id-button-busca").click(function () {
//         // alert('Botão pressionado');
//         const selectFiltroTipo = $("#id-select-filtro-tipo");
//         if (selectFiltroTipo.is(":hidden")) {
//             selectFiltroTipo.fadeIn(600);
//         } else {
//             selectFiltroTipo.fadeOut(600);
//         }
//     });

//     // Pelo jQuery slideUp/slideDown
//     $("#id-button-busca").click(function () {
//         // alert('Botão pressionado');
//         const selectFiltroTipo = $("#id-select-filtro-tipo");
//         if (selectFiltroTipo.is(":hidden")) {
//             selectFiltroTipo.slideUp(600);
//         } else {
//             selectFiltroTipo.slideDown(600);
//         }
//     });

//     // Animação customizada
//     // Declaro uma variável em escopo mais alto
//     let isAnimating = false;
//     //Pelo jQuery slideUp/slideDown
//     $("#id-button-busca").click(function () {
//         //Busco o objeto para realizar a animação
//         const selectFiltroTipo = $("#id-select-filtro-tipo");
//         // Tem alguma animação acontecendo?
//         if (!isAnimating) {
//             isAnimating = true;
//             if (selectFiltroTipo.is(":hidden")) {
//                 selectFiltroTipo.css("display", "inline-block");
//                 selectFiltroTipo
//                     .animate({ width: "+-250px" }, 1000)
//                     .promise()
//                     .done(function () {
//                         isAnimating = false;
//                     });
//             } else {
//                 selectFiltroTipo
//                     .animate({ width: "+-250px" }, 1000)
//                     .promise()
//                     .done(function () {
//                         selectFiltroTipo.css("display", "none");
//                         isAnimating = false;
//                     });
//             }
//         }
//     });
$(document).ready(function () {
    function groupBy(arr, property) {
        return arr.reduce(function (anterior, atual) {
            if (!anterior[atual[property]]) {
                anterior[atual[property]] = [];
            }
            anterior[atual[property]].push(atual);
            return anterior;
        }, []);
    }

    const selectFiltroTipo = $("#id-select-filtro-tipo");
    selectFiltroTipo.on("change", function () {
        updateProdutos();
    });

    function updateProdutos() {
        // Pego o valor da propriedade VALUE do elemento selecionado
        // e coloco na variável tipoProdutoID
        const tipoProdutoId = selectFiltroTipo.val();
        console.log(tipoProdutoId);
        $.ajax({
            type: "GET",
            url: `/pedido/usuario/getprodutos/${tipoProdutoId}`,
            data: null,
            dataType: "json",
            success: function (response) {
                // Imprimo os dados recebidos
                produtos_group = groupBy(response.return, "Tipo_Produtos_id");
                // console.log(produtos_group);
                showUpdatedProdutos(produtos_group);
                // Buscando todos os botões de adicionar produtos
                const arrayBtnAddProduto = $(".btn-add-produto");
                // Faço o forEach no array e chamo a posição corrente de btnAddProduto
                arrayBtnAddProduto.each(function (position, btnAddProduto) {
                    btnAddProduto.addEventListener("click", addProdutoNoPedido);
                });
            },
            error: function (error) {
                console.log("caiu no erro");
                console.log(error);
            },
        });
    }

    // Função que irá adicionar visualmente os produtos dentro de um pedido
    function addProdutoNoPedido() {
        // O this dentro de uma função normal acessa o objeto que chamou essa função
        const idProdutoAdicionado = this.getAttribute("value");
        const idTipoProdutoAdicionado = this.getAttribute("value-tipo");
        const quantProdutoAdicionado = $(`#id-quant-produto-${idProdutoAdicionado}`).val();
        const produto = produtos_group[idTipoProdutoAdicionado].find(obj => obj.id == idProdutoAdicionado);
        const tabela = $(`#id-quant-produto-${idProdutoAdicionado}`);
    }

    function showUpdatedProdutos(produtos_group) {
        // Produto onde quero imprimir as informações
        divProduto = $("#id-div-lista-produto");
        // Apago qualquer informação dentro do local selecionado
        divProduto.html("");
        produtos_group.forEach((produtos_tipo) => {
            // Imprimir inforções do tipo
            divProduto.append(`
            <div class="my-4 border border-dark">
                <div class="row m-4">
                    <div class="col-md-8">
                        <h4>${produtos_tipo[0].descricao}</h4>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option value="">Ordem do sistema</option>
                            <option value="">Menor para maior</option>
                            <option value="">Maior para menor</option>
                        </select>
                    </div>
                </div>
                <div class="my-4 produto">
                </div>
            </div>
        `);
            produtos_tipo.forEach((produto) => {
                // Imprimir as informação da variável produto
                $(".my-4.produto:last").append(`
                <div class="row m-3 border border-dark">
                    <div class="col-md-3 my-3">
                        <img class="w-100 h-100" src="${produto.urlImage}">
                    </div>
                    <div class="col-md-6 my-auto">
                        <h5>${produto.nome}</h5>
                        <h6>Ingredientes:</h6>
                        <p>${produto.ingredientes}</p>
                    </div>
                    <div class="col-md-3 my-auto">
                        <div class="my-3">
                            <input type="text" class="form-control" value="R$ ${produto.preco}" readonly>
                        </div>
                        <div class="my-3">
                            <input type="number" class="form-control" id="id-quant-produto-${produto.id}" value="1">
                        </div>
                        <div class="my-3">
                            <a class="btn btn-outline-success w-100 btn-add-produto" value="${produto.id}" value-tipo="${produto.Tipo_Produtos_id}">Adicionar Produto <i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            `);
            });
        });
    }

    // Depois de ter carregado o HTML e declarado todo comportamento do JS, executa o updateProdutos
    updateProdutos();
});
