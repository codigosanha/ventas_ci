
<div class="row">
	<div class="col-xs-12 text-center">
		<b>Empresa de Ventas</b><br>
		Calle Moquegua 430 <br>
		Tel. 481890 <br>
		Email:yonybrondy17@gmail.com
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>CLIENTE</b><br>
		<b>Nombre:</b> <?php echo $venta->nombre;?> <br>
		<b>Nro Documento:</b> <?php echo $venta->documento;?><br>
		<b>Telefono:</b> <?php echo $venta->telefono;?> <br>
		<b>Direccion</b> <?php echo $venta->direccion;?><br>
	</div>	
	<div class="col-xs-6">	
		<b>COMPROBANTE</b> <br>
		<b>Nro de Comprobante:</b><?php echo "A-".str_pad($venta->id, 6, "0", STR_PAD_LEFT);?><br>
		<b>Fecha</b> <?php echo $venta->fecha;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Descuento</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->codigo;?></td>
					<td><?php echo $detalle->nombre;?></td>
					<td><?php echo $detalle->precio;?></td>
					<td><?php echo $detalle->cantidad;?></td>
					<td><?php echo $detalle->descuento;?></td>
					<td><?php echo $detalle->importe;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $venta->subtotal;?></td>
				</tr>
				<tr>
					<td colspan="5" class="text-right"><strong>IVA:</strong></td>
					<td><?php echo $venta->iva;?></td>
				</tr>
				<tr>
					<td colspan="5" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $venta->descuento;?></td>
				</tr>
				<tr>
					<td colspan="5" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $venta->total;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>