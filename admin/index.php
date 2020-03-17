<?php

session_start();

if(!isset($_SESSION['nome_usuario'])){

	header('Location: /admin/login.php');

}

?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<?php include 'layout/head.php'; ?>

		<title>Área Administrativa</title>

	</head>

	<body>

		<div id="header">

			<div class="container">

				<a class="logo" href="/admin/">

					<span class="icone"></span>
					<span class="hidden-xs">Área Administrativa</span>

				</a>

				<div class="usuario"><span class="hidden-xs">Olá, <?php echo $_SESSION['nome_usuario']; ?>!</span></div>

			</div>

		</div>

		<div id="conteudo">

			<div class="container">

				<div class="row">

					<div class="col-md-3">

						<div id="menu">

							<ul>

								<li>

									<a href="/admin/"><i class="material-icons">dashboard</i>Dashboard</a>

								</li>

								<li>

									<a href="/admin/?module=produtos&page=index"><i class="material-icons">shopping_cart</i>Produtos</a>

								</li>

								<li>

									<a href="/admin/?module=noticias&page=index"><i class="material-icons">book</i>Notícias</a>

								</li>

								<li>

									<a class="logoff" href="engine/logoff.php"><i class="material-icons">close</i>Sair do Painel</a>

								</li>

							</ul>

						</div>

					</div>

					<div class="col-md-9">

						<?php

						$module = isset($_GET['module']) ? $_GET['module'] : false;
						$page = isset($_GET['page']) ? $_GET['page'] : false;

						if($module == false || $page == false){

							include 'modules/dashboard/index.php';

						} else {

							include 'modules/' . $module . '/' . $page . '.php';

						}

						?>

					</div>

				</div>

			</div>

		</div>

	</body>

</html>