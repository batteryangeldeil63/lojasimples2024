<?php

include 'engine/connect.php';
include 'engine/Zebra_Pagination.php';

?>
<div id="modulo">

	<div class="box">

		<div class="nome">Notícias</div>

		<div class="acoes">
			
			<ul>

				<li><a href="/admin/?module=noticias&page=add"><i class="material-icons">add</i>Adicionar nova notícia</a></li>

			</ul>

		</div>

		<ul class="lista">

			<?php

			$records_per_page = 10;

			$pagination = new Zebra_Pagination();

			$total_resultados = $mysqli->query('SELECT COUNT(`id`) AS `total` FROM `noticias`')->fetch_object()->total;

			$pagination->records($total_resultados);
			$pagination->records_per_page($records_per_page);

			$pagination->variable_name('p');

			$lista_noticias = $mysqli->query('

				SELECT

					`id`,
					`titulo`,

					`texto`,

					`data`

				FROM `noticias`

				ORDER BY `id` DESC

				LIMIT
        			' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '

			');

			while($dados = $lista_noticias->fetch_object()){

				$id = $dados->id;
				$titulo = $dados->titulo;

				$texto = substr($dados->texto, 0, 200);

				$data = date('d/m/Y H\hi', strtotime($dados->data));

			?>

			<li>

				<a href="/admin/?module=noticias&page=edit&id=<?php echo $id ?>">

					<div class="row">

						<div class="col-sm-12">

							<div class="img-case">
								
								<div class="img" style="background-image: url(/img/noticias/<?php echo $id ?>.jpg)"></div>

							</div>

							<div class="info">

								<div class="titulo"><?php echo $titulo ?></div>
								<div class="texto"><b><?php echo $data ?></b> - <?php echo $texto ?></div>

							</div>

						</div>
					
					</div>

				</a>

			</li>

			<?php 

			}

			?>

		</ul>

		<?php

		$pagination->render();

		?>

	</div>

</div>
<?php

if(isset($_GET['status'])){

	if($_GET['status'] == 'deletado'){

		echo '
			
		<script>
		
			alert(\'Notícia excluido com sucesso!\');

		</script>

		';

	}

}

?>