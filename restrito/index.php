<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Princess Model - Área Administrativa</title>
<link href="../imagens/logos/logoicon.png" rel="icon">
<link href="css/estilo.css" rel="stylesheet">
</head>

<body>
	<img src="../imagens/logos/logo.png" alt="Princess Model" width="120">
	<center>
		<h2 style="margin-bottom: 5%">Área Administrativa</h2>
		<h3 style="background-color: #333333; color: #FFFFFF; padding: 20px; margin-bottom: 5%">Acesso Restrito</h3>
		<h4>Favor entrar com usuário e senha</h4>
		<br>
		<form method="post" action="login.php" style="width: 20%">
			<input type="text" name="fuser" required class="campo" placeholder="Usuário">
			<input type="password" name="fpass" required class="campo" placeholder="Senha">
			<input type="submit" class="botao" value="Entrar">			
		</form>
		<?php
			if(isset($_GET["e"])){
				$recerro=$_GET["e"];
				if($recerro == md5(1)){
					$resposta="Usuário e/ou Senha incorreto(s). Favor tentar novamente.";
				}else if($recerro == md5(2)){
					$resposta="A página que esta tentando acessar é Restrita. Favor entrar com usuário e senha.";
				}
				print("<h3 style='color:#FF0000; margin-top:3%;'>".$resposta."</h3>");
			}
		?>
	</center>
</body>
</html>