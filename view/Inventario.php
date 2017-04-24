<?php
//header
include_once 'header.php';
?>

<div class="container">
    <table class="table table-striped table-hover">
        <thead
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad en existencia</th>
                <th>Cantidad Adquirida</th>
                <th>Cantidad Vendida</th>
            </tr>
        </thead>

        <?php
        if (isset($resultadoBusqueda)) {
            foreach ($resultadoBusqueda as $inventarioActual) {
                ?>                   
                <tr>
                    <td> <?php echo $inventarioActual->getNombreProducto(); ?></td>
                    <td> <?php echo $inventarioActual->getCantExistente(); ?></td>
                    <td> <?php echo $inventarioActual->getCantAdquirido(); ?></td>
                    <td> <?php echo $inventarioActual->getCantVendido(); ?></td>

                </tr>
                <?php
            }
        }
        ?>

    </table>
</div>
<?php
//footer
include_once 'footer.php';
?>