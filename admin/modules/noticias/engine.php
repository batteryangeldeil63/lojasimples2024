<?php 

include '../../engine/connect.php';

if(isset($_GET['q'])){

	if($_GET['q'] == 'add'){

		$titulo = $_POST['titulo'];
		$texto = $_POST['texto'];

		$grava_noticia = $mysqli->query('

			INSERT

			INTO `noticias`

			(

				`titulo`,
				`texto`,

				`data`

			) VALUES (
				
				"' . $titulo . '",
				"' . $texto . '",

				NOW()
				
			)

		');

		if($grava_noticia){

			$id = $mysqli->insert_id;

			if($_FILES['foto']){

				$caminho_final = '../../../img/noticias/' . $id . '.jpg';

				$move = move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_final);

			}

			header('Location: /admin/?module=noticias&page=edit&id=' . $id . '&status=sucesso');
			
		} else {

			echo 'Erro no cadastro';

		}		

	}

	if($_GET['q'] == 'edit'){

		$id = $_GET['id'];

		$titulo = $_POST['titulo'];
		$texto = $_POST['texto'];

		$edita_noticia = $mysqli->query('

			UPDATE `noticias`

			SET

			`titulo` = "' . $titulo . '",
			`texto` = "' . $texto . '"

			WHERE

				`id` = ' . $id . '

		');

		if($_FILES['foto']){

			$caminho_final = '../../../img/noticias/' . $id . '.jpg';

			$move = move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_final);

		}

		if($edita_noticia){

			header('Location: /admin/?module=noticias&page=edit&id=' . $id . '&status=editado');
			
		} else {

			echo 'Erro no cadastro';

		}
		
	}

	if($_GET['q'] == 'delete'){

		$id = $_GET['id'];

		$deleta_noticia = $mysqli->query('

			DELETE

			FROM `noticias`

			WHERE

				`id` = ' . $id . '

		');

		if($deleta_noticia){

			$caminho_final = '../../../img/noticias/' . $id . '.jpg';

			unlink($caminho_final);

			header('Location: /admin/?module=noticias&page=index&status=deletado');
			
		} else {

			echo 'Erro no cadastro';

		}

	}

}