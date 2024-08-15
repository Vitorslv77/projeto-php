<?php
	//conexão com o banco de dados
	include_once("conecta.php");

	//recebendo os dados enviados pelo formulário para a atualização dos produtos
	$recproduto=$_POST["fproduto"];
	$recpreco=$_POST["fpreco"];
	$rectamanho=$_POST["ftamanho"];
	if(isset($_POST["fpromo"])){$recpromo=$_POST["fpromo"];}else{$recpromo="";};
	if(isset($_POST["flanc"])){$reclanc=$_POST["flanc"];}else{$reclanc="";};
	$recdescri=$_POST["fdescri"];
	$recfoto=$_FILES["ffoto"]["name"];
	$recid=$_POST["fid"];
	$recfotoantiga=$_POST["ffotoantiga"];

	//fazer o upload da imagem para uma pasta específica
	if($recfoto != ""){
		move_uploaded_file($_FILES["ffoto"]["tmp_name"], "../imagens/produtos/$recfotoantiga");
	}

	//ajustar o preço para o padrão de valores do banco de dados
	$recpreco=str_replace("R$ ", "", $recpreco);
	$recpreco=str_replace(".", "", $recpreco);
	$recpreco=str_replace(",", ".", $recpreco);

	//comando para remover aspas e apostrofos do texto
	$recdescri=addslashes($recdescri);

	//gravando os dados no banco
	mysqli_query($conexao, "UPDATE produtos SET produto='$recproduto', valor='$recpreco', tamanho='$rectamanho', promo='$recpromo', lanc='$reclanc', descri='$recdescri' WHERE id=$recid");

	//redirecionamento
	header("location:admin.php");
?>



