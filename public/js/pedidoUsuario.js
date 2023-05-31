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

$(document).ready( function() {
   // Pelo jQuery HIDE/SHOW
$("#id-button-busca").click( function() {
    // alert('Botão pressionado');
    const selectFiltroTipo = $("#id-select-filtro-tipo");
    if (selectFiltroTipo.is(":hidden")) {
        selectFiltroTipo.show(400);
    } else {
        selectFiltroTipo.hide(400);
    }
});

// Pelo jQuery fadeIn/fadeOut
$("#id-button-busca").click( function() {
    // alert('Botão pressionado');
    const selectFiltroTipo = $("#id-select-filtro-tipo");
    if (selectFiltroTipo.is(":hidden")) {
        selectFiltroTipo.fadeIn(600);
    } else {
        selectFiltroTipo.fadeOut(600);
    }
});

// Pelo jQuery slideUp/slideDown
$("#id-button-busca").click( function() {
    // alert('Botão pressionado');
    const selectFiltroTipo = $("#id-select-filtro-tipo");
    if (selectFiltroTipo.is(":hidden")) {
        selectFiltroTipo.slideUp(600);
    } else {
        selectFiltroTipo.slideDown(600);
    }
});

// Animação customizada
// Declaro uma variável em escopo mais alto
let isAnimating = false;
//Pelo jQuery slideUp/slideDown
$("#id-button-busca").click( function(){
    //Busco o objeto para realizar a animação
    const selectFiltroTipo = $("#id-select-filtro-tipo");
    // Tem alguma animação acontecendo?
    if (!isAnimating) {
        isAnimating = true;
        if ( selectFiltroTipo.is(":hidden")) {
            selectFiltroTipo.css("display", "inline-block");
            selectFiltroTipo.animate({width: "+-250px"}, 1000).promise().done(function (){
                isAnimating = false;
            });
        } else {
            selectFiltroTipo.animate({width: "+-250px"}, 1000).promise().done(function (){
            selectFiltroTipo.css("display", "none");
                isAnimating = false;
            });
        }
    }
});


const selectFiltroTipo = $("#id-select-filtro-tipo");
selectFiltroTipo.on('change', function() {
    updateProdutos();
});

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
});