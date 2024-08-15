<?php
	session_start();
	if(isset($_SESSION["usuario"])){
	include_once("topopadrao.php");
?>
	<?php
		//conexão com o banco de dados
		include_once("conecta.php");
		
		//recebendo os dados passados via GET
		$recid=$_GET["id"];
		
		//buscando os dados no banco para preencher o formulário
		$dados=mysqli_query($conexao, "SELECT * FROM produtos WHERE id=$recid");
		
		//separando os dados com Array
		$item=mysqli_fetch_array($dados);
	?>
	<center>
		<h3 class="titulo">ALTERAÇÃO DE PRODUTOS</h3>
		<form method="post" action="atualizaprod.php" class="formulario" enctype="multipart/form-data">
			<input type="hidden" name="fid" value="<?=$item["id"]?>">
			<input type="hidden" name="ffotoantiga" value="<?=$item["foto"]?>">
			<input type="text" name="fproduto" placeholder="Produto" required class="campo" value="<?=$item["produto"]?>">
			<input type="text" name="fpreco" required placeholder="Valor" class="campo" onKeyPress="mascara(this, moeda)" value="<?="R$ ".number_format($item["valor"], 2, ",", ".")?>">
			<select name="ftamanho" class="campo" required>
				<option value="">Escolha um tamanho</option>
				<option value="P" <?php if($item["tamanho"] == "P"){print("selected");};?>> P </option>
				<option value="M" <?php if($item["tamanho"] == "M"){print("selected");};?>> M </option>
				<option value="G" <?php if($item["tamanho"] == "G"){print("selected");};?>> G </option>
				<option value="GG" <?php if($item["tamanho"] == "GG"){print("selected");};?>> GG </option>
			</select>
			<p style="margin: 4%">
				<label><input type="checkbox" name="fpromo" <?php if($item["promo"] == "on"){print("checked");};?>> Promoção</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="flanc" <?php if($item["lanc"] == "on"){print("checked");};?>> Lançamento</label>
			</p>
			<textarea name="fdescri" required placeholder="Descrição" class="campo" rows="10"><?=$item["descri"]?></textarea>
			<img src="../imagens/produtos/<?=$item["foto"]?>" width="100" align="middle">
			<input type="file" name="ffoto">
			<br><br>
			<input type="submit" value="Salvar" class="botao">
		</form>
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