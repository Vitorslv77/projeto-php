<?php
	//dados da conexão
	$host="localhost";
	$usuario="root";
	$senha="";
	$nomedobanco="projeto2029";

	//criando a conexão
	$conexao=mysqli_connect($host, $usuario, $senha, $nomedobanco);

	//validação
	if(!$conexao){
		print("Ocorreu uma falha de conexão com o banco de dados. Favor contactar o administrador do sistema");
	}
?>