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
		<title>Entre em contato - Humberto Andriolli</title>

		<?php

		if(isset($_GET['status'])){

			if($_GET['status'] == 'sucesso'){

				echo '<script>alert("Mensagem enviada com sucesso!");</script>';

			}

			if($_GET['status'] == 'erro'){

				echo '<script>alert("Ocorreu um erro no envio da mensagem\nRecarregue a página e tente novamente.");</script>';

			}

		}

		?>

	</head>

	<body>

		<?php include('includes/header.php'); ?>

		<?php include('includes/menu.php'); ?>

		<h2 class="titulo-pagina">
			
			<div class="container">Entre em contato</div>

		</h2>

		<div class="container">
			
			<div id="contato">

				<div class="row">
				
					<div class="col-sm-6">
						
						<div class="tel">

							<a href="tel:+552835554012">(28) 3555 - 4012</a>

						</div>

						<div class="tel">

							<a href="tel:+552835554037">(28) 3555 - 4037</a>

						</div>

						<div class="email">

							<a href="mailto:contato@humbertoandriolli.com.br">contato@humbertoandriolli.com.br</a>

						</div>

						<div class="endereco">
						
							Rua Prof. Alfredo Herkenhoff, 7, Primeiro Andar.<br /> Independência - 29306-490<br />
							Cachoeiro de Itapemirim - ES<br /><br />

						</div>

						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1864.2778924674226!2d-41.1098893420937!3d-20.8496369965239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjDCsDUwJzU4LjciUyA0McKwMDYnMzEuNyJX!5e0!3m2!1spt-BR!2sbr!4v1475366019263" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

					</div>

					<div class="col-sm-6">
						
						<form action="engine/contato.php" method="POST">

							<div class="row">
							
								<div class="campo col-xs-12">
									
									<label for="">Nome</label>
									<input type="text" name="nome_usuario" required>

								</div>

								<div class="campo col-xs-12">
									
									<label for="">E-mail</label>
									<input type="email" name="email_usuario" required>

								</div>

								<div class="campo col-xs-12">
									
									<label for="">Telefone</label>
									<input class="telefone" type="tel" name="telefone_usuario" required>

								</div>

								<div class="campo col-xs-12">
									
									<label for="">CEP</label>
									<input class="cep" type="text" name="cep_usuario" required>

								</div>

								<div class="campo col-xs-10">
									
									<label for="">Cidade</label>
									<input type="text" name="cidade_usuario" required>

								</div>

								<div class="campo col-xs-2">
									
									<label for="">UF</label>
									<input type="text" name="uf_usuario" required>

								</div>

								<div class="campo col-xs-12">
									
									<label for="">Mensagem</label>
									<textarea name="mensagem_usuario" required></textarea>

								</div>

								<div class="campo col-xs-12">
									
									<button type="submit">Enviar</button>

								</div>

							</div>

						</form>

					</div>

				</div>

			</div>
				
		</div>

		<footer>

			<div class="container">

				<span class="copyright">&copy; 2016 Humberto Andriolli</span>
				<span class="desenvolvimento">Desenvolvido por <a href="http://www.facebook.com.br/diancomd" target="_blank"><b>Dian Carlos</b></a></span>

			</div>

		</footer>

		<script src="js/jquery.js"></script>
		<script src="js/jquery.mask.min.js"></script>

		<script>
			
			$(document).ready(function(){

				var SPMaskBehavior = function (val) {
				  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
				},
				spOptions = {
				  onKeyPress: function(val, e, field, options) {
				      field.mask(SPMaskBehavior.apply({}, arguments), options);
				    },
				   	placeholder: '(__) ____-____'
				};

				$('.telefone').mask(SPMaskBehavior, spOptions);

				$('.cep').mask('00000-000', {

					placeholder: '_____-___'

				});
				
			});

		</script>
 
	</body>

</html>