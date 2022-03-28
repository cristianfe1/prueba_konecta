
<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar Producto</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="AgregarNuevo.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre Producto:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nom_product">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Referencia:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="referencia">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Precio:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="precio">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Peso:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="peso">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Categoria:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="categoria">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Stock:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="stock">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Producto</button>
			</form>
            </div>

        </div>
    </div>
</div>

<?php
//Conexion con Konecta_db
include_once('dbconect.php');

$database = new Connection();
$db = $database->open();

$sql = 'SELECT id,nom_product FROM productos';

?>
<div class="modal fade" id="addnewventa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Registrar Venta</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="AgregarVenta.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">ID Producto:</label>
					</div>
					<div class="col-sm-10">
						<select name="id" id="id" class="form-control">
                    	<option selected disabled>Seleccione el Producto</option>
		                <?php 
		                foreach ($db->query($sql) as $row) {
		                ?>
		                    <option value="<?php echo $row['id'] ?>"><?php echo $row['id']. ' '.$row['nom_product'] ?></option>
		                <?php } ?>
		            	</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Cantidad:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cantidad">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="agregar_venta" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Venta</button>
			</form>
            </div>

        </div>
    </div>
</div>