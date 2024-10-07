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
				//conexão com o bando de dados
				include_once("restrito/conecta.php");
				
				//recebendo o id enviado via GET
				$recid=$_GET["id"];
			
				//buscando o id no banco
				$recprod=mysqli_query($conexao, "SELECT * FROM produtos WHERE id=$recid");
			
				//separando os dados com Array
				$dados=mysqli_fetch_array($recprod);
			?>
			<div class="foto">
				<img src="imagens/produtos/<?=$dados["foto"]?>">
			</div>
			<div class="descri">
				Produto:
				<h2><?=$dados["produto"]?></h2>
				<br><br>
				<h2><?=$dados["tamanho"]?></h2>
				<br><br>
				Valor:
				<h2>R$ <?=number_format($dados["valor"], 2, ",", ".")?></h2>
				<br><br>
				Descri&ccedil;&atilde;o:
				<h4><?=$dados["descri"]?></h4>
			
				<form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
                <input type="hidden" name="email_cobranca" value="suporte@lojamodelo.com.br" />
                <input type="hidden" name="tipo" value="CBR" />
                <input type="hidden" name="moeda" value="BRL" />
                <input type="hidden" name="item_id" value="12345" />
                <input type="hidden" name="item_descr" value="<?=$dados["produto"]?>"/>
                <input type="hidden" name="item_quant" value="1" />
                <input type="hidden" name="item_valor" value=<?=number_format($dados["valor"], 2, ",", ".")?> />
                <input type="hidden" name="frete" value="0" />
                <input type="hidden" name="peso" value="0" />
                <input type="submit" class="describotao" value="CHECKOUT" name="submit" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/99x61-comprar-assina.gif" alt="Pague com PagBank - é rápido, grátis e seguro!" />
            </form>
			</div>
		</section>
		<?php include_once("footer.php"); ?>
	</body>
</html>