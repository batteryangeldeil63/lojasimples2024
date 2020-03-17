<?php

include 'engine/connect.php';

?>
<div id="modulo">

	<div class="box">

		<div class="nome">Adicionar nova notícia</div>

		<div class="acoes">
			
			<ul>

				<li><a href="/admin/?module=noticias&page=index"><i class="material-icons">arrow_back</i>Voltar</a></li>

			</ul>

		</div>

		<div class="formulario">

			<form enctype="multipart/form-data" action="modules/noticias/engine.php?q=add" method="POST">

				<div class="col-xs-12">
				
					<div class="campo">

						<input type="text" name="titulo" required>
						<label>Título</label>

					</div>

				</div>

				<div class="col-xs-12">
				
					<div class="campo textarea">
						
						<textarea name="texto" rows="1" required></textarea>
						<label>Texto</label>

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