<?php 

include 'admin/engine/connect.php';

?>
<!DOCTYPE html>
<html>

	<head>

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="js/slick/slick.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<meta charset="UTF-8">
		<title>Humberto Andriolli</title>

	</head>

	<body>

		<?php include('includes/header.php'); ?>

		<?php include('includes/menu.php'); ?>

		<section id="painel">

			<a class="paginador anterior" href=""></a>
			<a class="paginador proximo" href=""></a>

			<ul>

				<li>

					<div class="img" style="background-image: url(img/painel/painel-1.jpg)"></div>

				</li>

				<li>

					<div class="img" style="background-image: url(img/painel/painel-2.jpg)"></div>

				</li>

				<li>

					<div class="img" style="background-image: url(img/painel/painel-3.jpg)"></div>

				</li>

				<li>

					<div class="img" style="background-image: url(img/painel/painel-4.jpg)"></div>

				</li>

			</ul>

		</section>

		<div class="container">
			
			<section id="conteudo">
				
				<div id="produtos">
					
					<div class="titulo-secao">Conheça Nossos Produtos</div>

					<ul class="row">

						<?php

						include_once 'engine/URLify.php';

						$lista_produtos = $mysqli->query('

							SELECT

								`id`,
								`titulo`,
								`preco`
							
							FROM `produtos`

							ORDER BY RAND()

							LIMIT 4

						');

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

						?>

					</ul>

				</div>

				<div id="noticias">

					<div class="titulo-secao">Últimas Notícias</div>

					<ul class="row">

						<?php

						$lista_noticias = $mysqli->query('

							SELECT

								`id`,
								`titulo`,
								`data`
							
							FROM `noticias`

							ORDER BY `id` DESC

							LIMIT 4

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

						?>

					</ul>

				</div>

			</section>

		</div>

		<footer>

			<div class="container">

				<span class="copyright">&copy; 2016 Humberto Andriolli</span>
				<span class="desenvolvimento">Desenvolvido por <a href="http://www.facebook.com.br/" target="_blank"><b>Dian Carlos</b></a></span>

			</div>

		</footer>

		<script src="js/jquery.js"></script>

		<script src="js/slick/slick.min.js"></script>

		<script>

			$(document).ready(function(){

				$('#painel ul').slick({

					autoplay: true,
					autoplaySpeed: 3000,
					prevArrow : '#painel .paginador.anterior',
					nextArrow: '#painel .paginador.proximo',
					pauseOnHover: false,
					pauseOnFocus: false,
					fade: true

				});

				$('#mostra-menu').click(function(event){

					event.preventDefault();

					$('#menu').slideToggle();

				});

				$('#menu .submenu').click(function(event){

					event.preventDefault();

					$(this).siblings('ul').slideToggle();

				});

			});
			
		</script>

	</body>

</html>