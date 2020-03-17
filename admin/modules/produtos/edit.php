<?php

include 'engine/connect.php';

if(isset($_GET['id'])){

	$id = $_GET['id'];

	$seleciona_produto = $mysqli->query('

		SELECT

			`titulo`,
			`preco`,
			`categoria`,
			`descricao`

		FROM `produtos`

		WHERE

			`id` = ' . $id . '

		LIMIT 1

	');

	echo $mysqli->error;

	if($seleciona_produto->num_rows == 0){

		echo 'Produto não disponível';

	} else {

		$dados = $seleciona_produto->fetch_object();

		$titulo = $dados->titulo;
		$preco = $dados->preco;
		$categoria = $dados->categoria;
		$descricao = $dados->descricao;

	}

} else {

	header('Location: /admin/');

}

?>
<div id="modulo">

	<div class="box">

		<div class="nome">Detalhes do produto</div>

		<div class="acoes">
			
			<ul>

				<li><a href="/admin/?module=produtos&page=index"><i class="material-icons">arrow_back</i>Voltar</a></li>
				<li><a href="/admin/?module=produtos&page=add"><i class="material-icons">add</i>Adicionar novo produto</a></li>

			</ul>

		</div>

		<div class="formulario">

			<form enctype="multipart/form-data" action="modules/produtos/engine.php?q=edit&id=<?php echo $id ?>" method="POST">

				<div class="col-xs-12">
				
					<div class="foto">
						
						<div class="img-box">

							<div class="img" style="background-image: url(/img/produtos/<?php echo $id ?>.jpg)"></div>

						</div>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo">

						<input type="text" name="titulo" required value="<?php echo $titulo ?>">
						<label>Título</label>

					</div>

				</div>

				<div class="col-xs-6">
				
					<div class="campo">

						<input type="text" name="preco" required value="<?php echo $preco ?>">
						<label>Preço</label>

					</div>

				</div>

				<div class="col-xs-6">
				
					<div class="campo select">
						
						<select name="categoria" required>
							
							<option value=""></option>

							<?php

							$lista_categoria = $mysqli->query('

								SELECT

									`id`,
									`nome`

								FROM `categorias`

								ORDER BY `nome` ASC

							');

							while($dados = $lista_categoria->fetch_object()){

								$selected = ($categoria == $dados->id) ? 'selected' : '';

								echo '<option ' . $selected . ' value="' . $dados->id . '">' . $dados->nome . '</option>';

							}

							?>

						</select>
						<label>Categoria</label>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo textarea">
						
						<textarea name="descricao" rows="1" required><?php echo $descricao ?></textarea>
						<label>Descrição</label>

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
						<a class="button delete" href="modules/produtos/engine.php?q=delete&id=<?php echo $id ?>"><i class="material-icons">close</i>Excluir</a>

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
		
			alert(\'Produto cadastrado com sucesso!\');

		</script>

		';

	}

	if($_GET['status'] == 'editado'){

		echo '
			
		<script>
		
			alert(\'Produto editado com sucesso!\');

		</script>

		';

	}

}

?>