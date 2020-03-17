<?php

include 'engine/connect.php';

if(isset($_GET['id'])){

	$id = $_GET['id'];

	$seleciona_noticia = $mysqli->query('

		SELECT

			`titulo`,
			`texto`

		FROM `noticias`

		WHERE

			`id` = ' . $id . '

		LIMIT 1

	');

	echo $mysqli->error;

	if($seleciona_noticia->num_rows == 0){

		echo 'Notícia não disponível';

	} else {

		$dados = $seleciona_noticia->fetch_object();

		$titulo = $dados->titulo;
		$texto = $dados->texto;

	}

} else {

	header('Location: /admin/');

}

?>
<div id="modulo">

	<div class="box">

		<div class="nome">Detalhes da notícia</div>

		<div class="acoes">
			
			<ul>

				<li><a href="/admin/?module=noticias&page=index"><i class="material-icons">arrow_back</i>Voltar</a></li>
				<li><a href="/admin/?module=noticias&page=add"><i class="material-icons">add</i>Adicionar nova notícia</a></li>

			</ul>

		</div>

		<div class="formulario">

			<form enctype="multipart/form-data" action="modules/noticias/engine.php?q=edit&id=<?php echo $id ?>" method="POST">

				<div class="col-xs-12">
				
					<div class="foto">
						
						<div class="img-box">

							<div class="img" style="background-image: url(/img/noticias/<?php echo $id ?>.jpg)"></div>

						</div>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo">

						<input type="text" name="titulo" required value="<?php echo $titulo ?>">
						<label>Título</label>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo textarea">
						
						<textarea name="texto" rows="1" required><?php echo $texto ?></textarea>
						<label>Texto</label>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo upload">
						
						<input type="file" name="foto" accept="image/*">
						<label>Trocar foto de Capa</label>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo submit">

						<button type="submit"><i class="material-icons">check</i>Salvar</button>
						<a class="button delete" href="modules/noticias/engine.php?q=delete&id=<?php echo $id ?>"><i class="material-icons">close</i>Excluir</a>

					</div>

				</div>

			</form>

		</div>

	</div>

</div>
<?php

if(isset($_GET['status'])){

	if($_GET['status'] == 'sucesso'){

		echo '
			
		<script>
		
			alert(\'Notícia cadastrada com sucesso!\');

		</script>

		';

	}

	if($_GET['status'] == 'editado'){

		echo '
			
		<script>
		
			alert(\'Notícia editada com sucesso!\');

		</script>

		';

	}

}

?>