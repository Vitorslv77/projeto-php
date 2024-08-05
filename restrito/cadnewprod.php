<?php
	session_start();
	if(isset($_SESSION["usuario"])){
	include_once("topopadrao.php");
?>
	<center>
		<h3 class="titulo">CADASTRO DE NOVOS PRODUTOS</h3>
		<form method="post" action="gravanewprod.php" class="formulario" enctype="multipart/form-data">
			<input type="text" name="fproduto" placeholder="Produto" required class="campo">
			<input type="text" name="fpreco" required placeholder="Valor" class="campo" onKeyPress="mascara(this, moeda)">
			<select name="ftamanho" class="campo" required>
				<option value="">Escolha um tamanho</option>
				<option value="P"> P </option>
				<option value="M"> M </option>
				<option value="G"> G </option>
				<option value="GG"> GG </option>
			</select>
			<p style="margin: 4%">
				<label><input type="checkbox" name="fpromo"> Promoção</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="flanc"> Lançamento</label>
			</p>
			<textarea name="fdescri" required placeholder="Descrição" class="campo" rows="10"></textarea>
			<input type="file" name="ffoto" required class="campo">
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