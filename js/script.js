// JavaScript Document
$(function(){
	$(".slides").slick({
		autoplay:true,
		pauseOnHover: true,
		dots: true
	})
	$(".fotoempresa").colorbox({rel:'fotoempresa'});
})

$(document).ready(function() {
   // Define a ação do redirecionamento no clique do botão submit
   $('#redbotao').on('click', function(event) {
   event.preventDefault(); // Impede o envio padrão do formulário
   window.open("https://pagseguro.uol.com.br/checkout", "_blank"); // Abre a URL desejada em uma nova aba
    });
});
