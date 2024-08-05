<?php
	//conexão com o banco de dados
	include_once("conecta.php");

	//recebendo os dados enviados pelo formulário de cadastros de produtos
	$recproduto=$_POST["fproduto"];
	$recpreco=$_POST["fpreco"];
	$rectamanho=$_POST["ftamanho"];
	if(isset($_POST["fpromo"])){$recpromo=$_POST["fpromo"];}else{$recpromo="";};
	if(isset($_POST["flanc"])){$reclanc=$_POST["flanc"];}else{$reclanc="";};
	$recdescri=$_POST["fdescri"];
	$recfoto=$_FILES["ffoto"]["name"];

	//renomeando as imagens antes de gravar no banco
	//primeiro passo é separar a extenção do arquivo
	$ext=pathinfo($recfoto, PATHINFO_EXTENSION);
	date_default_timezone_set("America/Sao_Paulo");
	$data=date("d-m-Y");
	$hora=date("H-i-s");
	$novonome="princess_".md5($recfoto)."_".$data."_".$hora.".".$ext;

	//fazer o upload da imagem para uma pasta específica
	move_uploaded_file($_FILES["ffoto"]["tmp_name"], "../imagens/produtos/$novonome");

	//ajustar o preço para o padrão de valores do banco de dados
	$recpreco=str_replace("R$ ", "", $recpreco);
	$recpreco=str_replace(".", "", $recpreco);
	$recpreco=str_replace(",", ".", $recpreco);

	//comando para remover aspas e apostrofos do texto
	$recdescri=addslashes($recdescri);

	//gravando os dados no banco
	mysqli_query($conexao, "INSERT INTO produtos (produto, valor, tamanho, promo, lanc, descri, foto) VALUES ('$recproduto', '$recpreco', '$rectamanho', '$recpromo', '$reclanc', '$recdescri', '$novonome')");

	//redirecionamento
	header("location:admin.php");
?>



