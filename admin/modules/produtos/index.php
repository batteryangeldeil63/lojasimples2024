<?php

include 'engine/connect.php';
include 'engine/Zebra_Pagination.php';

?>
<div id="modulo">

	<div class="box">

		<div class="nome">Produtos</div>

		<div class="acoes">
			
			<ul>

				<li><a href="/admin/?module=produtos&page=add"><i class="material-icons">add</i>Adicionar novo produto</a></li>

			</ul>

		</div>

		<ul class="lista">

			<?php

			$records_per_page = 10;

			$pagination = new Zebra_Pagination();

			$total_resultados = $mysqli->query('SELECT COUNT(`id`) AS `total` FROM `produtos`')->fetch_object()->total;

			$pagination->records($total_resultados);
			$pagination->records_per_page($records_per_page);

			$pagination->variable_name('p');

			$lista_produtos = $mysqli->query('

				SELECT

					`produtos`.`id`,
					`produtos`.`titulo`,
					`produtos`.`categoria`,
					`categorias`.`nome` AS `categoria_nome`

				FROM `produtos`

				INNER JOIN `categorias`
				ON `categorias`.`id` = `produtos`.`categoria`

				ORDER BY `produtos`.`id` DESC

				LIMIT
        			' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '

			');

			while($dados = $lista_produtos->fetch_object()){

				$id = $dados->id;
				$titulo = $dados->titulo;
				$categoria = $dados->categoria_nome;

			?>

			<li>

				<a href="/admin/?module=produtos&page=edit&id=<?php echo $id ?>">

					<div class="row">

						<div class="col-sm-12">

							<div class="img-case">
								
								<div class="img" style="background-image: url(/img/produtos/<?php echo $id ?>.jpg)"></div>

							</div>

							<div class="info">

								<div class="titulo"><?php echo $titulo ?></div>

								<div class="itens">

									<div class="info-item"><i class="material-icons">turned_in</i><?php echo $categoria ?></div>

								</div>

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
		
			alert(\'Produto excluido com sucesso!\');

		</script>

		';

	}

}

?>