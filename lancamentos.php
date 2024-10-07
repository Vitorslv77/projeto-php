<!doctype html>
<html>
	<?php include_once("head.php"); ?>
	<body>
		<?php
			include_once("nav.php");
			include_once("header.php");
		?>
		<section class="corpo">
			<?php
				//conexão com o banc8980 o de dados
				include_once("restrito/conecta.php");
			
				//buscando todos os produtos no banco, mas serão mostrados apenas 8
				$recprod=mysqli_query($conexao, "SELECT * FROM produtos WHERE lanc='on' ORDER BY RAND()");
			
				//fazendo o loop para mostrar os produtos
				while($dados=mysqli_fetch_array($recprod)){ ?>
					<div class="produtos">
						<img src="imagens/produtos/<?=$dados["foto"]?>" height="200">
						<h4><?=$dados["produto"]?></h4>
						<h3>R$ <?=number_format($dados["valor"], 2, ",", ".") ?></h3>
						<a href="descricompra.php?id=<?=$dados["id"]?>"><input type="button" value="COMPRAR"></a>
					</div>
				<?php } ?>
		</section>
		<?php include_once("footer.php"); ?>
	</body>
</html>