<?php
	//conexão com o banco de dados
	include_once("conecta.php");
	
	//recebendo os dados enviados pelo formulário
	$recbanner=$_FILES["fbanner"]["name"];

	//separando a extensão e gerando um novo nome criptografado
	$ext=pathinfo($recbanner, PATHINFO_EXTENSION);
	$data=date("d/m/Y");
	$hora=time();
	$novonome=md5($recbanner.$data.$hora).".".$ext;

	//movendo o arquivo para a pasta dos banners
	move_uploaded_file($_FILES["fbanner"]["tmp_name"], "../imagens/banners/$novonome");

	//gravando os dados no banco
	mysqli_query($conexao, "INSERT INTO banners (banner) VALUES ('$novonome')");

	//redirecionando
	header("location:banners.php");
?>

