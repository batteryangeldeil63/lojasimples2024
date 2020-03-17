<nav id="menu">

	<div class="container">

		<ul>

			<li>

				<a href="/">Home</a>

			</li>

			<li>

				<a href="empresa/">Empresa</a>

			</li>

			<li>

				<a href="" class="submenu">Produtos</a>

				<ul>

					<?php

					include_once 'admin/engine/connect.php';
					include_once 'engine/URLify.php';

					$lista_categoria = $mysqli->query('

						SELECT

							`id`,
							`nome`

						FROM `categorias`

						ORDER BY `nome` ASC

					');

					while($dados = $lista_categoria->fetch_object()){

						echo '<li><a href="categoria/' . $dados->id . '/' . URLify::filter($dados->nome) . '/">' . $dados->nome . '</a></li>';

					}

					?>

				</ul>

			</li>

			<li>

				<a href="noticias/">Notícias</a>

			</li>

			<li>

				<a href="contato/">Contato</a>

			</li>

		</ul>

	</div>

</nav>