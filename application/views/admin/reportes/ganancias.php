
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ganancias
        <small>Reporte</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Desde:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:date('Y-m-d');?>">
                            </div>
                            <label for="" class="col-md-1 control-label">Hasta:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechafin) ? $fechafin:date('Y-m-d');?>">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>reportes/ventas" class="btn btn-danger">Restablecer</a>
                            </div>
                        </div>
                    </form>
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Producto</th>
                                    <th>Precio de Compra</th>
                                    <th>Tipo Precio de Venta</th>
                                    <th>Precio de Venta</th>
                                    <th>Cantidades</th>
                                    <th>Descuentos</th>
                                    <th>Importes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $totalVentas = 0;
                                    $totalCompras = 0;
                                ?>
                                <?php if (!empty($productos)): ?>
                                    <?php foreach($productos as $producto):?>
                                        <tr>
                                            <td><?php echo $producto->nombre;?></td>
                                            <td><?php echo $producto->precio_compra;?></td>
                                            <td><?php echo $producto->tipo_precio==1 ? 'Unidad':'Mayoreo';?></td>
                                            <td><?php echo $producto->precio;?></td>
                                            <td><?php echo $producto->cantidades;?></td>
                                            <td><?php echo $producto->descuentos;?></td>
                                            <td><?php echo $producto->importes;?></td>

                                            <?php 
                                                $totalCompras = $totalCompras + ($producto->cantidades * $producto->precio_compra);
                                                $totalVentas = $totalVentas + $producto->importes;
                                                ?>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Monto de Ventas</th>
                                    <th>Monto de Compras</th>
                                    <th>Monto de Ganancia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color:green;"><?php echo number_format($totalVentas, 2, '.', ''); ?></td>
                                    <td style="color:red;"><?php echo number_format($totalCompras, 2, '.', ''); ?></td>
                                    <td style="color:blue;"><?php echo number_format($totalVentas - $totalCompras, 2, '.', '');?></td>
                                </tr>
                            </tbody>
                        </table>
                    <form action="<?php echo base_url();?>reportes/ganancias/pdf" method="POST" target="_blank">
                        <input type="hidden" name="fechainicio" value="<?php echo $fechainicio;?>">
                        <input type="hidden" name="fechafin" value="<?php echo $fechafin;?>">
                        <button type="submit" class="btn btn-danger">Generar PDF</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la venta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
