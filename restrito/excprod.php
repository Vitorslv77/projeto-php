<?php
	//conexão com o banco de dados
	include_once("conecta.php");

	//recebendo os dados enviados via get
	$recid=$_GET["id"];
	$recfoto=$_GET["foto"];

	//excluindo os dados do banco
	mysqli_query($conexao, "DELETE FROM produtos WHERE id=$recid");

	//excluindo a foto do cadastro
	if(file_exists("../imagens/produtos/$recfoto")){
		unlink("../imagens/produtos/$recfoto");
	}

	//redirecionamento
	header("location:admin.php");
?>