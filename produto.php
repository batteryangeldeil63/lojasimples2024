<?php

include 'admin/engine/connect.php';

$url = isset($_GET['url']) ? $_GET['url'] : false;
$id = isset($_GET['id']) ? $_GET['id'] : false;

$seleciona_produto = $mysqli->query('

	SELECT

		`produtos`.`id`,
		`produtos`.`titulo`,
		`produtos`.`preco`,
		`produtos`.`descricao`,
		`categorias`.`nome` AS `categoria_nome`

	FROM `produtos`

	INNER JOIN `categorias`
	ON `categorias`.`id` = `produtos`.`categoria`

	WHERE

		`produtos`.`id` = ' . $id . '

	LIMIT 1

');

if($seleciona_produto->num_rows == 0){

	echo 'Produto não encontrado!';
	exit;

}

$dados = $seleciona_produto->fetch_object();

$id = $dados->id;
$titulo = $dados->titulo;
$descricao = $dados->descricao;
$preco = $dados->preco;
$categoria = $dados->categoria_nome;

?>
<!DOCTYPE html>
<html>

	<head>

		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/css/produto.css">
		<link rel="stylesheet" href="/js/fancybox/jquery.fancybox.css">
		<link rel="stylesheet" href="/js/fancybox/helpers/jquery.fancybox-thumbs.css">

		<base href="http://<?php echo $_SERVER['SERVER_NAME'] ?>" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<meta charset="UTF-8">

		<title><?php echo $titulo ?> - Produtos - Humberto Andriolli</title>

	</head>

	<body>

		<?php include('includes/header.php'); ?>

		<?php include('includes/menu.php'); ?>

		<h2 class="titulo-pagina">
			
			<div class="container">Produtos</div>

		</h2>

		<div class="container">
			
			<div id="produto">
				
				<div class="row">
					
					<div class="col-lg-4 col-md-6">
						
						<a class="foto" href="/img/produtos/<?php echo $id ?>.jpg">

							<div class="capa" style="background-image: url(/img/produtos/<?php echo $id ?>.jpg);"></div>

						</a>

					</div>

					<div class="col-lg-8 col-md-6">
						
						<div class="info">

							<div class="codigo">Cod.: #<?php echo $id ?></div>
							
							<div class="titulo"><?php echo $titulo ?></div>
							<div class="categoria"><span><?php echo $categoria ?></span></div>
							<div class="preco"><?php echo $preco ?></div>

							<div class="texto"><?php echo $descricao ?></div>

						</div>

					</div>

				</div>

			</div>

			<div id="produtos" class="interno">

				<div class="titulo-secao">Veja mais produtos</div>

				<ul class="row">

					<?php

					include_once 'engine/URLify.php';

					$lista_produtos = $mysqli->query('

						SELECT

							`id`,
							`titulo`,
							`preco`
						
						FROM `produtos`

						WHERE

							`id` != ' . $id . '

						ORDER BY RAND()

						LIMIT 6

					');

					while($dados = $lista_produtos->fetch_object()){

						$id = $dados->id;
						$titulo = $dados->titulo;
						$preco = $dados->preco;

						$url = '/produtos/' . URLify::filter($titulo) . '-' . $id . '.html';

					?>

					<li class="col-md-2 col-sm-4 col-xs-6">

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