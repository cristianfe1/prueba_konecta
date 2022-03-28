<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar_venta'])){
	$database = new Connection();
	$db = $database->open();

	$id=$_POST['id'];
	$cantidad=$_POST['cantidad'];
	$validacion = "SELECT stock FROM productos WHERE id = '$id'";
	foreach ($db->query($validacion) as $row) {
		$valor=$row['stock'];
	}
	try{
		if ($valor>0) {
			$stmt = $db->prepare("INSERT INTO ventas (id_producto, cantidad) VALUES (:id_producto, :cantidad)");
			$_SESSION['message'] = ($stmt->execute(array(':id_producto' => $_POST['id'] , ':cantidad' => $_POST['cantidad']))) ? 'Nueva Venta Registrada.' : 'Algo salió mal. No se pudo Agregar el Producto';
			if ($_SESSION['message']=='Nueva Venta Registrada.') {
				$sql = "UPDATE productos SET stock = productos.stock - '$cantidad' WHERE id = '$id'";
				$db->exec($sql);
			}
		}else{
			$_SESSION['message'] = "Este producto no cuenta con Stock.";
		}
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