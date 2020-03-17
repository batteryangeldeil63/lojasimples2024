<?php

session_start();

if(isset($_SESSION['nome_usuario'])){

	header('Location: /admin/');

}

?>
<!DOCTYPE html>
<html>

	<head>

		<?php include 'layout/head.php'; ?>

		<title>Área Administrativa</title>

		<?php

		if(isset($_GET['error'])){

			echo '
				
			<script>
			
				alert(\'Usuário e senha incorretos!\');

			</script>
	
			';

		}

		?>

	</head>

	<body>

		<div id="login">

			<div class="container">

				<div class="col-xs-4 col-xs-offset-4">

					<div class="box">

						<div class="logo">

							<span class="icone"></span>
							<div class="titulo">Área Administrativa</div>

						</div>

						<form action="engine/login.php" method="POST">

							<div class="field">

								<input type="text" placeholder="Usuário" name="usuario">

							</div>

							<div class="field">

								<input type="password" placeholder="Senha" name="senha">

							</div>

							<div class="field">

								<button type="submit">Entrar</button>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

	</body>

</html>