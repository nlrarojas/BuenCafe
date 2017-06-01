<?php
include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">            
            <div class="col-sm-16">
                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?ModificarInventario=buscar" method="post">
                        <label>Ingrese el nombre del producto para modificar:</label><br/><br/><br/>
                        <label for="tCedula">Nombre del producto</label>
                        <?php
                        if (isset($resultadoBusqueda)) {
                            ?>
                            <input class="form-control" type="text" id="tCedula" name="tCedula" value="<?php echo $resultadoBusqueda->getNombre(); ?>"/><br/><br/>
                            <?php
                        } else {
                            ?>
                            <input class="form-control" type="text" id="tCedula" name="tCedula" required/><br/><br/>
                            <?php
                        }
                        ?>
                        <input class="btn btn-default" type="submit" id="bIngresar" name="bIngresar" value="Buscar"/><br/><br/><br/>
                    </form>
                    <form action="?ModificarInventario=modificar&id=<?php echo $resultadoBusqueda->getNombre(); ?>" method="post">
                        <?php
                        if (isset($resultadoBusqueda)) {
                            ?>
                            <label for="tNombre">Cantidad en existencia</label>
                            <input class="form-control" type="text" id="tDescripcion" name="tExistencia" value="<?php echo $resultadoBusqueda->getExistencia(); ?>"/><br/><br/>
                            <label for="tApellidos">Cantidad Adquirida</label>
                            <input class="form-control" type="text" id="tPrecio" name="tAdquirida" value="<?php echo $resultadoBusqueda->getAquirida(); ?>"/><br/><br/>
                            <label for="tFecha">Cantidad vendida</label><br/><br/>
                            <input class="form-control" type="text" id="tPuntos" name="tVendida" value="<?php echo $resultadoBusqueda->getVendida(); ?>"/><br/><br/>
                            <label for="tFecha">Código administrador</label><br/><br/>
                            <input class="form-control" type="text" id="tOtorga" name="tCodigoAdministrador" value="<?php echo $resultadoBusqueda->getCedulaAdministrador(); ?>"/><br/><br/>
                            <input class="btn btn-default" type="submit" id="bIngresar" name="bIngresar" value = "Modificar"/>
                            <?php
                        }
                        ?>
                    </form>
                    <br/><br/><br/>
                </div>
            </div>
        </article>		
    </section>
    <br/><br/><br/><br/><br/>
</section>

<?php
include_once 'footer.php';
?>                    