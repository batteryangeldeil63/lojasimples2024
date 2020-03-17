<?php

include 'admin/engine/connect.php';
include 'engine/Zebra_Pagination.php';

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
		<title>Notícias - Humberto Andriolli</title>

	</head>

	<body>

		<?php include('includes/header.php'); ?>

		<?php include('includes/menu.php'); ?>

		<h2 class="titulo-pagina">

			<div class="container">Notícias</div>

		</h2>

		<div class="container">

			<div id="noticias">

				<ul class="row">

					<?php

					include_once 'engine/URLify.php';

					$total_produtos = $mysqli->query('

						SELECT

							COUNT(`id`) AS `total`

						FROM `noticias`

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
					
							Nenhum notícia encontrada.<br />
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

						$lista_noticias = $mysqli->query('

							SELECT

								`id`,
								`titulo`,
								`data`
							
							FROM `noticias`

							ORDER BY `id` DESC

							LIMIT
	        					' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '

						');

						while($dados = $lista_noticias->fetch_object()){

							$id = $dados->id;
							$titulo = $dados->titulo;

							$dia = date('d', strtotime($dados->data));
							$mes = date('m', strtotime($dados->data));
							$ano = date('Y', strtotime($dados->data));
							$hora = date('H\hi', strtotime($dados->data));

							switch($mes){

								case '01' : $mes_extenso = 'Janeiro'; break;
								case '02' : $mes_extenso = 'Fevereiro'; break;
								case '03' : $mes_extenso = 'Março'; break;
								case '04' : $mes_extenso = 'Abril'; break;
								case '05' : $mes_extenso = 'Maio'; break;
								case '06' : $mes_extenso = 'Junho'; break;
								case '07' : $mes_extenso = 'Julho'; break;
								case '08' : $mes_extenso = 'Agosto'; break;
								case '09' : $mes_extenso = 'Setembro'; break;
								case '10' : $mes_extenso = 'Outubro'; break;
								case '11' : $mes_extenso = 'Novembro'; break;
								case '12' : $mes_extenso = 'Dezembro'; break;

							}

							$data_final = $dia . ' de ' . $mes_extenso . ' de ' . $ano . ' às ' . $hora;

							$url = '/noticias/' . URLify::filter($titulo) . '-' . $id . '.html';

						?>

						<li class="col-md-3 col-xs-6">

							<a href="<?php echo $url ?>">

								<span class="img" style="background-image: url(/img/noticias/<?php echo $id ?>.jpg"></span>

								<span class="data"><?php echo $data_final ?></span>
								<span class="titulo"><?php echo $titulo ?></span>

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

		<script type="text/javascript" src="js/jquery.js"></script>

		<script type="text/javascript" src="js/menu.js"></script>

	</body>

</html>