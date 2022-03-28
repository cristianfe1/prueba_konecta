<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Prueba Tecnica Konecta</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

<!-- Navbar Konecta -->
<nav class="navbar navbar-default">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="">Prueba Tecnica Konecta</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container">
	<h1 class="page-header text-center">Productos Konecta</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Producto</a>
<?php 
	session_start();
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-info text-center" style="margin-top:20px;">
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php

		unset($_SESSION['message']);
	}
?>
<table class="table table-bordered table-striped" style="margin-top:20px;">
	<thead>
		<th>ID</th>
		<th>Nombre Producto</th>
		<th>Referencia</th>
		<th>Precio</th>
		<th>Peso</th>
		<th>Categoria</th>
		<th>Stock</th>
		<th>Fecha de Creacion</th>
		<th>Acción</th>
	</thead>
	<tbody>
		<?php
			//Conexion con Konecta_db
			include_once('dbconect.php');

			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM productos';
				foreach ($db->query($sql) as $row) {
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['nom_product']; ?></td>
						<td><?php echo $row['referencia']; ?></td>
						<td><?php echo $row['precio']; ?></td>
						<td><?php echo $row['peso']; ?></td>
						<td><?php echo $row['categoria']; ?></td>
						<td><?php echo $row['stock']; ?></td>
						<td><?php echo $row['fecha_creacion']; ?></td>
						<td>
							<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
							<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
						</td>
						<?php include('BorrarEditarModal.php'); ?>
					</tr>
					<?php 
				}
			}
			catch(PDOException $e){
				echo "Hubo un problema en la conexión: " . $e->getMessage();
			}

			//Cerrar la Conexion
			$database->close();

		?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Tabla de Ventas -->
	<h1 class="page-header text-center">Ventas Konecta</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="#addnewventa" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Venta</a>

<table class="table table-bordered table-striped" style="margin-top:20px;">
	<thead>
		<th>ID</th>
		<th>ID Producto</th>
		<th>Cantidad</th>
	</thead>
	<tbody>
		<?php
			//Conexion con Konecta_db
			include_once('dbconect.php');

			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM ventas';
				foreach ($db->query($sql) as $row) {
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['id_producto']; ?></td>
						<td><?php echo $row['cantidad']; ?></td>
					</tr>
					<?php 
				}
			}
			catch(PDOException $e){
				echo "Hubo un problema en la conexión: " . $e->getMessage();
			}

			//Cerrar Conexion
			$database->close();

		?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('AgregarModal.php'); ?>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>