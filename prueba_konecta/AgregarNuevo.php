<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();

	try{
		$date=date('Y-m-d h:m:s');
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO productos (nom_product, referencia, precio, peso, categoria, stock, fecha_creacion) VALUES (:nom_product, :referencia, :precio, :peso, :categoria, :stock, :fecha_creacion)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ($stmt->execute(array(':nom_product' => $_POST['nom_product'] , ':referencia' => $_POST['referencia'] , ':precio' => $_POST['precio'], ':peso' => $_POST['peso'], ':categoria' => $_POST['categoria'], ':stock' => $_POST['stock'], ':fecha_creacion' => $date))) ? 'Nuevo Producto Registrado.' : 'Algo salió mal. No se pudo Agregar el Producto';
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
		//$_SESSION['message'] = $_POST['stock'];
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: index.php');
	
?>