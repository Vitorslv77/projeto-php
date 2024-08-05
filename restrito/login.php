<?php
	//conexão com o banco de dados
	include_once("conecta.php");

	//recebendo os dados enviados pelo formulário
	$recuser=$_POST["fuser"];
	$recpass=$_POST["fpass"];

	//buscando na tabela de usuários um cadastro que corresponda aos dados recebidos
	$login=mysqli_query($conexao, "SELECT * FROM usuarios WHERE user='$recuser' AND pass='$recpass' ");

	//validando o login
	if(mysqli_num_rows($login) > 0){
		$dados=mysqli_fetch_array($login);
		$recnome=$dados["nome"];
		session_start();
		$_SESSION["usuario"]=$recnome;
		header("location:admin.php");
	}else{
		//criptografando a mensagem de erro
		$erro=md5(1);
		header("location:index.php?e=$erro");
	}
?>






