<?php 

$nome = $_POST['nome_usuario'];
$email = $_POST['email_usuario'];
$telefone = $_POST['telefone_usuario'];
$cep = $_POST['cep_usuario'];
$cidade = $_POST['cidade_usuario'];
$uf = $_POST['uf_usuario'];
$mensagem = $_POST['mensagem_usuario'];

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->CharSet = 'utf-8';

$mail->setFrom('naoresponda@humbertoandriolli.com.br', 'Humberto Andriolli');

$mail->addAddress('dian.cabral.wp@hotmail.com', 'Dian Carlos');     // Add a recipient
$mail->addAddress($email, $nome);               // Name is optional

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Contato - Humberto Andriolli';
$mail->Body    = '

<div style="font-family: sans-serif;">

<h1 style="color: #d32020;">Contato - Humberto Andriolli</h1>

<b>Nome:</b> ' . $nome . '<br />
<b>E-mail:</b> ' . $email . '<br />
<b>Telefone:</b> ' . $telefone . '<br />
<b>CEP:</b> ' . $cep . '<br />
<b>Cidade:</b> ' . $cidade . ' - ' . $uf . '<br /><br />

<b>Mensagem:</b> ' . nl2br($mensagem) . '

</div>

';

if(!$mail->send()) {

   header('Location: /contato.php?status=erro');

} else {

    header('Location: /contato.php?status=sucesso');

}