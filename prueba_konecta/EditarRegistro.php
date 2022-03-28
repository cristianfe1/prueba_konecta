<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nom_product = $_POST['nom_product'];
			$referencia = $_POST['referencia'];
			$precio = $_POST['precio'];
			$peso = $_POST['peso'];
			$categoria = $_POST['categoria'];
			$stock = $_POST['stock'];

			$sql = "UPDATE productos SET nom_product = '$nom_product', referencia = '$referencia', precio = '$precio', peso = '$peso', categoria = '$categoria', stock = '$stock' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto actualizado correctamente' : 'No se puso actualizar el Producto';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: index.php');

?>