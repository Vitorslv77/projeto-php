<?php
	//recebendo os dados do formulário para enviarmos para um e-mail
    $recnome=$_POST["fnome"];
    $recemail=$_POST["femail"];
    $recassunto=$_POST["fassunto"];
    $recmsg=$_POST["fmsg"];

	//configurar a mensagem que será enviada
    $mensagem="
        <p align='center'>
            <img src='https://cd6.com.br/img/logo-white.png' width='200'>
        </p>
        <h2>Contato Site</h2>
        <br><br>
        <strong>Assunto: </strong> $recassunto<br>
        <strong>Nome: </strong> $recnome<br>
        <strong>E-Mail: </strong> $recemail<br>
        <strong>Mensagem: </strong> $recmsg<br>
    ";
	
	//definir o destinatário
    $destinatario="profrodrigo@cd6.com.br";//quem vai receber o e-mail

	//configuração do envio
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=utf-8";
    $headers[] = "To: Princess Model";
    $headers[] = "From: salleswebdesign@gmail.com";//email que fará o envio

	//comando de envio
    mail($destinatario, $recassunto, $mensagem, implode("\r\n", $headers));
    
    header("location:index.php");
?>