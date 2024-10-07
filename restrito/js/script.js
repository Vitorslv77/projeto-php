// JavaScript Document
//---------------------------- Função para converter para reais
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function moeda(v){
    v=v.replace(/\D/g,"") // permite digitar apenas numero
    v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // 1.000.000.000,00
    v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // 1.000.000,00
    v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // 1.000,00
    v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // 1,00
    return "R$ " + v;
}

//---------------------------- Função para exclusão de produtos
function verifica(recid, recfoto){
	if(confirm("Tem certeza de que deseja excluir este prduto definitivamente?")){
		window.location="excprod.php?id=" + recid + "&foto=" + recfoto
	}
}

//---------------------------- Função para exclusão de banners
function validabanner(recbanner){
	if(confirm("Tem certeza de que deseja excluir este banner?")){
		window.location="excluirbanner.php?banner=" + recbanner
	}
}



