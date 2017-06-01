<?php
include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
                <div class="form-group">   
                    <span><a class="btn btn-primary" href="?InsertarProductos"><div>Insertar producto</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?BuscarProducto"><div>Buscar producto</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?EliminarProducto"><div>Eliminar producto</div></a></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?ModificarProducto=buscar" method="post">
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
                    <form action="?ModificarProducto=modificar&id=<?php echo $resultadoBusqueda->getNombre(); ?>" method="post">
                        <?php
                        if (isset($resultadoBusqueda)) {
                            ?>
                            <label for="tNombre">Descripcion</label>
                            <input class="form-control" type="text" id="tDescripcion" name="tDescripcion" value="<?php echo $resultadoBusqueda->getDescripcion(); ?>"/><br/><br/>
                            <label for="tApellidos">Precio</label>
                            <input class="form-control" type="text" id="tPrecio" name="tPrecio" value="<?php echo $resultadoBusqueda->getPrecio(); ?>"/><br/><br/>
                            <label for="tFecha">Valor en puntos</label><br/><br/>
                            <input class="form-control" type="text" id="tPuntos" name="tPuntos" value="<?php echo $resultadoBusqueda->getValorPuntos(); ?>"/><br/><br/>
                            <label for="tFecha">Puntos que otorga</label><br/><br/>
                            <input class="form-control" type="text" id="tOtorga" name="tOtorga" value="<?php echo $resultadoBusqueda->getPuntosOtorga(); ?>"/><br/><br/>
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