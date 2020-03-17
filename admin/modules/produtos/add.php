<?php

include 'engine/connect.php';

?>
<div id="modulo">

	<div class="box">

		<div class="nome">Adicionar novo produto</div>

		<div class="acoes">
			
			<ul>

				<li><a href="/admin/?module=produtos&page=index"><i class="material-icons">arrow_back</i>Voltar</a></li>

			</ul>

		</div>

		<div class="formulario">

			<form enctype="multipart/form-data" action="modules/produtos/engine.php?q=add" method="POST">

				<div class="col-xs-12">
				
					<div class="campo">

						<input type="text" name="titulo" required>
						<label>Título</label>

					</div>

				</div>

				<div class="col-xs-6">
				
					<div class="campo">

						<input type="text" name="preco" required>
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

								echo '<option value="' . $dados->id . '">' . $dados->nome . '</option>';

							}

							?>

						</select>
						<label>Categoria</label>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo textarea">
						
						<textarea name="descricao" rows="1" required></textarea>
						<label>Descrição</label>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo upload">
						
						<input type="file" name="foto" accept="image/*">
						<label>Foto de Capa</label>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo submit">

						<button type="submit"><i class="material-icons">check</i>Salvar</button>

					</div>

				</div>

			</form>

		</div>

	</div>

</div>