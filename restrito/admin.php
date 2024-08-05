<?php
	session_start();
	if(isset($_SESSION["usuario"])){
	include_once("topopadrao.php");
?>
	<p class="menu">
		<a href="cadnewprod.php"><i class="fa fa-shopping-cart"></i> CADASTRO DE NOVOS PRODUTOS</a>
	</p>
	<hr style="margin-top: 20px; margin-bottom: 20px;">
	<table width="100%" cellpadding="10" cellspacing="0" class="linhas">
		<tr align="center" height="40">
			<td><strong>Foto</strong></td>
			<td><strong>Produto</strong></td>
			<td><strong>Tamanho</strong></td>
			<td><strong>Preço</strong></td>
			<td><strong>Lançamento</strong></td>
			<td><strong>Promoção</strong></td>
			<td><strong>Descrição</strong></td>
		</tr>
		<?php
			//conexão com o banco de dados
			include_once("conecta.php");
		
			//buscando os dados no banco para listar
			$dados=mysqli_query($conexao, "SELECT * FROM produtos ORDER BY id DESC");
		
			//criando o laço de repetição para listar todos os produtos
			while($item=mysqli_fetch_array($dados)){ ?>
				<tr>
					<td align="center" width="5%"><img src="../imagens/produtos/<?=$item["foto"]?>" height="50"></td>
					<td align="center" width="25%"><?=$item["produto"]?></td>
					<td align="center" width="5%"><?=$item["tamanho"]?></td>
					<td align="center" width="10%">R$ <?=number_format($item["valor"],2,",",".")?></td>
					<td align="center" width="5%"><?=$item["lanc"]?></td>
					<td align="center" width="5%"><?=$item["promo"]?></td>
					<td><?=substr($item["descri"], 0, 80)." ..."?></td>
					<td class="iconedit"><a href="editaprod.php?id=<?=$item["id"]?>"><i class="fa fa-edit"></i></a></td>
					<td class="iconedit"><a href="#" onClick="verifica('<?=$item["id"]?>', '<?=$item["foto"]?>')"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
</body>
</html>
<?php
	}else{
		//criptografando a mensagem de erro
		$erro=md5(2);
		header("location: index.php?e=$erro");
	}
?>