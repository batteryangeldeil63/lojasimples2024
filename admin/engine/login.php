<?php

session_start();

include 'connect.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$verifica_usuario = $mysqli->query('

	SELECT

		`nome`,
		`id`

	FROM `usuarios`

	WHERE

		`usuario` = "' . $usuario . '" AND
		`senha` = "' . $senha . '"

	LIMIT 1

');

if($verifica_usuario->num_rows == 0){

	header('Location: /admin/login.php?error=1');

} else {

	// Logado com sucesso!

	$dados = $verifica_usuario->fetch_object();

	$_SESSION['nome_usuario'] = $dados->nome;

	header('Location: /admin/');

}

?>