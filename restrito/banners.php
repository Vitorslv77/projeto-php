<?php
	session_start();
	if(isset($_SESSION["usuario"])){
	include_once("topopadrao.php");
?>
	<center>
		<h3 style="margin: 2%;">Cadastro de novos banners</h3>
		<form method="post" action="gravanewbanner.php" enctype="multipart/form-data" class="formulario">
			<input type="file" name="fbanner" required class="campo">
			<input type="submit" value="SALVAR" class="botao">
		</form>
		<hr style="margin: 50px;">
		<table>
			<?php
				//conexão com o banco
				include_once("conecta.php");
		
				//buscar todos os banners para listar
				$allbanners=mysqli_query($conexao, "SELECT * FROM banners ORDER BY id DESC");
		
				while($item=mysqli_fetch_array($allbanners)){ ?>
					<tr>
						<td>
							<img src="../imagens/banners/<?=$item["banner"]?>" width="300">
						</td>
						<td class="iconedit" style="width: 40px" align="right">
							<a href="#" onClick="validabanner('<?=$item["banner"]?>')"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php } ?>
		</table>
	</center>
</body>
</html>
<?php
	}else{
		//criptografando a mensagem de erro
		$erro=md5(2);
		header("location: index.php?e=$erro");
	}
?>