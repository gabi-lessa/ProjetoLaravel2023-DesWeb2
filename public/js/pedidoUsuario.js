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

function updateProdutos(){
    // Pego o valor da propriedade VALUE do elemento selecionado
    // e coloco na variável tipoProdutoID
    const tipoProdutoId = selectFiltroTipo.val();
    console.log(tipoProdutoId);
    $.ajax({
        type: "GET",
        url: `/pedido/usuario/getprodutos/${tipoProdutoId}`,
        data: null,
        dataType: "json",
        success: function(response){
            // Produto onde quero imprimir as informações
            divProduto = $("#id-div-lista-produto");
            // Apago qualquer informação dentro do local selecionado
            divProduto.html("");
            // Imprimo os dados recebidos
            response.return.forEach(produto => {
                divProduto.append(`<p>${produto.id} - ${produto.nome}</p>`);
            });
        },
        error: function(error){
            console.log("caiu no erro");
            console.log(error);
        }
    });
}