<?php

include 'admin/engine/connect.php';
include 'engine/Zebra_Pagination.php';

$url = isset($_GET['url']) ? $_GET['url'] : false;
$id = isset($_GET['id']) ? $_GET['id'] : false;

?>
<!DOCTYPE html>
<html>

	<head>

		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/css/zebra_pagination.css">

		<base href="http://<?php echo $_SERVER['SERVER_NAME'] ?>" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<meta charset="UTF-8">
		<title>Produtos - Humberto Andriolli</title>

	</head>

	<body>

		<?php include('includes/header.php'); ?>

		<?php include('includes/menu.php'); ?>

		<h2 class="titulo-pagina">

			<div class="container">Produtos</div>

		</h2>

		<div class="container">

			<div id="produtos" class="interno">

				<ul class="row">
								
					<?php

					include_once 'engine/URLify.php';

					$total_produtos = $mysqli->query('

						SELECT

							COUNT(`id`) AS `total`

						FROM `produtos`

						WHERE

							`categoria` = ' . $id . '

					')->fetch_object()->total;

					if($total_produtos == 0){

						echo '

						<style>

						.texto {

							padding: 0 15px;
							margin-bottom: 30px;

							font-family: "Open Sans", sans-serif;
							font-size: 16px;
							font-weight: 300;
							line-height: 1.2;

						}

						</style>
			
						<div class="texto">
					
							Nenhum produto encontrado nessa categoria.<br />
							Por favor, aguarde por novas atualizações.
		
						</div>
		
						';

					} else {

						$records_per_page = 12;

						$pagination = new Zebra_Pagination();

						$pagination->records($total_produtos);
						$pagination->records_per_page($records_per_page);

						$pagination->variable_name('p');
						$pagination->method('url');
						$pagination->base_url('', false);

						$lista_produtos = $mysqli->query('

							SELECT

								`produtos`.`id`,
								`produtos`.`titulo`,
								`produtos`.`preco`
							
							FROM `produtos`

							INNER JOIN `categorias`
							ON `categorias`.`id` = `produtos`.`categoria`

							WHERE

								`categorias`.`id` = ' . $id . '

							ORDER BY `produtos`.`id` DESC

							LIMIT
        						' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '

						');

						echo $mysqli->error;

						while($dados = $lista_produtos->fetch_object()){

							$id = $dados->id;
							$titulo = $dados->titulo;
							$preco = $dados->preco;

							$url = '/produtos/' . URLify::filter($titulo) . '-' . $id . '.html';

						?>

						<li class="col-md-3 col-xs-6">

							<a href="<?php echo $url ?>">

								<span class="img" style="background-image: url(/img/produtos/<?php echo $id ?>.jpg"></span>

								<span class="codigo">Cod. <?php echo $id ?></span>
								<span class="titulo"><?php echo $titulo ?></span>
								<span class="preco"><?php echo $preco ?></span>

							</a>

						</li>

						<?php

						}

						$pagination->render();

					}

					?>

				</ul>

			</div>

		</div>

		<footer>

			<div class="container">

				<span class="copyright">&copy; 2016 Humberto Andriolli</span>
				<span class="desenvolvimento">Desenvolvido por <a href="http://www.facebook.com.br/" target="_blank"><b>Dian Carlos</b></a></span>

			</div>

		</footer>

	</body>

</html>