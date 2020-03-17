<?php

include 'admin/engine/connect.php';

$url = isset($_GET['url']) ? $_GET['url'] : false;
$id = isset($_GET['id']) ? $_GET['id'] : false;

$seleciona_noticia = $mysqli->query('

	SELECT

		`id`,
		`titulo`,
		`texto`,
		`data`

	FROM `noticias`

	WHERE

		`id` = ' . $id . '

	LIMIT 1

');

if($seleciona_noticia->num_rows == 0){

	echo 'Notícia não encontrado!';
	exit;

}

$dados = $seleciona_noticia->fetch_object();

$id = $dados->id;
$titulo = $dados->titulo;

$texto = $dados->texto;

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

?>
<!DOCTYPE html>
<html>

	<head>

		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/js/fancybox/jquery.fancybox.css">
		<link rel="stylesheet" href="/js/fancybox/helpers/jquery.fancybox-thumbs.css">

		<base href="http://<?php echo $_SERVER['SERVER_NAME'] ?>" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<meta charset="UTF-8">

		<title><?php echo $titulo ?> - Notícias - Humberto Andriolli</title>

	</head>

	<body>

		<?php include('includes/header.php'); ?>

		<?php include('includes/menu.php'); ?>

		<h2 class="titulo-pagina">
			
			<div class="container">Notícias</div>

		</h2>

		<div class="container">
			
			<div id="noticia">
				
				<div class="row">
					
					<div class="col-lg-4 col-md-6">
						
						<a class="foto" href="/img/noticias/<?php echo $id ?>.jpg">

							<div class="capa" style="background-image: url(/img/noticias/<?php echo $id ?>.jpg);"></div>

						</a>

					</div>

					<div class="col-lg-8 col-md-6">
						
						<div class="info">

							<div class="data"><?php echo $data_final ?></div>
							
							<div class="titulo"><?php echo $titulo ?></div>

							<div class="texto"><?php echo $texto ?></div>

						</div>

					</div>

				</div>

			</div>

			<div id="noticias" class="interno">

				<div class="titulo-secao">Veja mais notícias</div>

				<ul class="row">

					<?php

					$lista_noticias = $mysqli->query('

						SELECT

							`id`,
							`titulo`,
							`data`
						
						FROM `noticias`

						WHERE

							`id` != ' . $id . '

						ORDER BY `id` DESC

						LIMIT 6

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

					<li class="col-md-2 col-sm-4 col-xs-6">

						<a href="<?php echo $url ?>">

							<span class="img" style="background-image: url(/img/noticias/<?php echo $id ?>.jpg"></span>

							<span class="data"><?php echo $data_final ?></span>
							<span class="titulo"><?php echo $titulo ?></span>

						</a>

					</li>

					<?php

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

		<script type="text/javascript" src="js/fancybox/jquery.fancybox.js"></script>
		<script type="text/javascript" src="js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>

		<script type="text/javascript" src="js/menu.js"></script>

		<script>
			
			$(document).ready(function(){

				$('.foto').fancybox({

					padding: 3,
					openEffect: 'elastic',
					closeEffect: 'elastic',
					helpers: {

						thumbs: {

							width: 50,
							height: 50
						}

					}

				});

			});

		</script>
 
	</body>

</html>