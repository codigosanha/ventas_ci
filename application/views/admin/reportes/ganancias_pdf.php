<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ganancia</title>
    <style>
        table, th,td{
            border: 1px solid #000;
            width: 100%;
        }
        h1{
            text-align: center;
        }
        p{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>REPORTE DE GANANCIA</h1>
    <?php
        $datafechainicio = explode("-", $fechainicio);
        $datafechafin = explode("-", $fechafin);
    ?>
    <p><?php echo $datafechainicio[2]."/".$datafechainicio[1]."/".$datafechainicio[0]." - ".$datafechafin[2]."/".$datafechafin[1]."/".$datafechafin[0]?></p>
    <table cellspacing="0" cellpadding="3">
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
    <br> <br>
    <table cellspacing="0" cellpadding="3">
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
</body>
</html>
