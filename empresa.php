<?php

include 'engine/compress_html.php';

?>
<!DOCTYPE html>
<html>

	<head>

		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/bootstrap.css">

		<base href="http://<?php echo $_SERVER['SERVER_NAME'] ?>" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<meta charset="UTF-8">

		<title>Conheça a nossa empresa - Humberto Andriolli</title>

	</head>

	<body>

		<?php include('includes/header.php'); ?>

		<?php include('includes/menu.php'); ?>

		<h2 class="titulo-pagina">
			
			<div class="container">Conheça a empresa</div>

		</h2>

		<div class="container">
			
			<div id="empresa">
				
				<div class="texto">
					
					<p>A marca de moda Humberto Andriolli foi lançada em nível nacional em uma Feira de Moda, em agosto de 1988, tendo obtido grande receptividade junto aos lojistas e consumidores finais. Posteriormente, em 1990, a marca se consagrou com sua participação na FENIT, na época a 3ª maior Feira de Moda em nível mundial. O sucesso foi imediato! Foram efetuados negócios e parcerias com os melhores lojistas multimarcas e pontos de venda do país.</p>

					<p>Atualmente, a marca Humberto Andriolli está presente em cerca de 12 mil pontos de venda, em 2.000 municípios dos 27 estados brasileiros, sendo uma das marcas de moda masculina  preferidas do nosso país.</p>

					<p>Ao longo da sua trajetória foram investidos recursos acima de R$ 150 milhões em ações de comunicação e marketing e mais de 11 milhões de consumidores já usaram a marca. Anualmente são lançados cerca de 2.000 novos produtos.</p>

					<p>A Humberto Andriolli foi eleita em 2010 e 2011, pela CNDL (Confederação Nacional de Dirigentes Lojistas), a melhor marca de moda jovem nacional, sendo agraciada em Brasília com o troféu "A Deusa da Fortuna", considerado o Oscar do Varejo Brasileiro.</p>

					<p>Para entender melhor o conceito da marca, temos que entender o "Manifesto Humberto Andriolli" que diz:</p>

					<p>"Ser Humberto Andriolli é ser atraente, saber seduzir e despertar fantasias de romance e sensualidade. Com leveza, do seu próprio jeito. Usar Humberto Andriolli é mostrar como você se idealiza, pronto para grandes conquistas, um vencedor, confiante e competitivo. Isso é ser Humberto Andriolli!”</p>

				</div>

				<div class="galeria">
					
					<ul class="row">

						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-1.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-1.jpg)"></div>

							</a>

						</li>

						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-2.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-2.jpg)"></div>

							</a>

						</li>

						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-12.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-12.jpg)"></div>

							</a>

						</li>

						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-3.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-3.jpg)"></div>

							</a>

						</li>


						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-4.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-4.jpg)"></div>

							</a>

						</li>


						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-5.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-5.jpg)"></div>

							</a>

						</li>


						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-6.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-6.jpg)"></div>

							</a>

						</li>


						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-7.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-7.jpg)"></div>

							</a>

						</li>


						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-8.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-8.jpg)"></div>

							</a>

						</li>


						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-9.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-9.jpg)"></div>

							</a>

						</li>


						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-10.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-10.jpg)"></div>

							</a>

						</li>


						<li class="col-md-3">

							<a class="fancybox" rel="galeria" href="img/empresa/empresa-11.jpg">

								<div class="img" style="background-image: url(img/empresa/empresa-11.jpg)"></div>

							</a>

						</li>

					</ul>

				</div>

			</div>

		</div>

		<footer>

			<div class="container">

				<span class="copyright">&copy; 2016 Humberto Andriolli</span>
				<span class="desenvolvimento">Desenvolvido por <a href="http://www.facebook.com.br/" target="_blank"><b>Dian Carlos</b></a></span>

			</div>

		</footer>

		<script src="js/jquery.js"></script>

		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>

		<script>
			
			$(document).ready(function(){

				$('.fancybox').fancybox({

					padding: 5,
					openEffect: 'elastic',
					closeEffect: 'elastic'

				});

			});

		</script>
	 
	</body>

</html>