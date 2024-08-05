<?php
	//conexão com o banco de dados
	include_once("conecta.php");

	//recebendo o nome do banner que foi passado via GET
	$recbanner=$_GET["banner"];

	//excluindo o banner da pasta banners
	unlink("../imagens/banners/$recbanner");

	//excluindo o resgistro do banco de dados
	mysqli_query($conexao, "DELETE FROM banners WHERE banner='$recbanner' ");

	//redirecionamento
	header("location:banners.php");
?>