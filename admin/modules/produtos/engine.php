<?php 

include '../../engine/connect.php';

if(isset($_GET['q'])){

	if($_GET['q'] == 'add'){

		$titulo = $_POST['titulo'];
		$preco = $_POST['preco'];
		$categoria = $_POST['categoria'];
		$descricao = $_POST['descricao'];

		$grava_produto = $mysqli->query('

			INSERT

			INTO `produtos`

			(

				`titulo`,
				`preco`,
				`categoria`,
				`descricao`

			) VALUES (
				
				"' . $titulo . '",
				"' . $preco . '",
				"' . $categoria . '",
				"' . $descricao . '"
				
			)

		');

		if($grava_produto){

			$id = $mysqli->insert_id;

			if($_FILES['foto']){

				$caminho_final = '../../../img/produtos/' . $id . '.jpg';

				$move = move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_final);

			}

			header('Location: /admin/?module=produtos&page=edit&id=' . $id . '&status=sucesso');
			
		} else {

			echo 'Erro no cadastro';

		}		

	}

	if($_GET['q'] == 'edit'){

		$id = $_GET['id'];

		$titulo = $_POST['titulo'];
		$preco = $_POST['preco'];
		$categoria = $_POST['categoria'];
		$descricao = $_POST['descricao'];

		$edita_produto = $mysqli->query('

			UPDATE `produtos`

			SET

			`titulo` = "' . $titulo . '",
			`preco` = "' . $preco . '",
			`categoria` = "' . $categoria . '",
			`descricao` = "' . $descricao . '"

			WHERE

				`id` = ' . $id . '

		');

		if($_FILES['foto']){

			$caminho_final = '../../../img/produtos/' . $id . '.jpg';

			$move = move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_final);

		}

		if($edita_produto){

			header('Location: /admin/?module=produtos&page=edit&id=' . $id . '&status=editado');
			
		} else {

			echo 'Erro no cadastro';

		}
		
	}

	if($_GET['q'] == 'delete'){

		$id = $_GET['id'];

		$deleta_produto = $mysqli->query('

			DELETE

			FROM `produtos`

			WHERE

				`id` = ' . $id . '

		');

		if($deleta_produto){

			$caminho_final = '../../../img/produtos/' . $id . '.jpg';

			unlink($caminho_final);

			header('Location: /admin/?module=produtos&page=index&status=deletado');
			
		} else {

			echo 'Erro no cadastro';

		}

	}

}