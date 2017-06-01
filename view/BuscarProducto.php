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
                    <span><a class="btn btn-primary" href="?ModificarProducto"><div>Modificar Producto</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?InsertarProductos"   ><div>Insertar Producto</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?EliminarProducto" ><div>Eliminar Producto</div></a></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?BuscarProducto=buscar" method="post">
                        <label>Ingrese el nombre del producto que desea buscar, o precione buscar para obtener todos los productos:</label><br/><br/><br/>

                        <label for="tCedula">Nombre del producto</label>
                        <input class="form-control" type="text" id="tCedula" name="tCedula"/><br/><br/>
                        <input class="btn btn-default"  type="submit" id="bIngresar" name="bIngresar" value="Buscar"/><br/><br/>                
                    </form>

                    <table border="3" id="tablaClientes">
                        <thead>
                            <tr>
                        <br/><br/>
                        <th colspan="1">
                            <a href="?insertarEmpleado">Ingresar Producto</a>
                        </th>
                        <th colspan="6" style="text-align: center">Productos</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre Producto</td>
                                <td>Descripcion</td>
                                <td>Precio</td>
                                <td>Valor en puntos</td>
                                <td>Puntos que otorga</td>
                                <td colspan="2">Editar</td>
                            </tr>
                            <?php
                            if (isset($resultadoBusqueda)) {
                                if (count($resultadoBusqueda) == 1) {
                                    ?>                   
                                    <tr>
                                        <td> <?php echo $resultadoBusqueda->getNombre(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getDescripcion(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getPrecio(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getValorPuntos(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getPuntosOtorga(); ?></td>
                                        <td><a href="?BuscarProducto=buscar&modificarProducto=<?php echo $resultadoBusqueda->getNombre(); ?>"> Modificar</a></td>
                                        <td><a href="?BuscarProducto=buscar&eliminarProducto=<?php echo $resultadoBusqueda->getNombre(); ?>">Eliminar</a></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($resultadoBusqueda as $clienteRecuperado) {
                                        ?>                   
                                        <tr>
                                            <td> <?php echo $clienteRecuperado->getNombre(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getDescripcion(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getPrecio(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getValorPuntos(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getPuntosOtorga(); ?></td>
                                            <td><a href="?BuscarProducto=buscar&modificarProducto=<?php echo $clienteRecuperado->getNombre(); ?>"> Modificar</a></td>
                                            <td><a href="?BuscarProducto=buscar&eliminarProducto=<?php echo $clienteRecuperado->getNombre(); ?>">Eliminar</a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table><br/><br/>                    
                </div>
            </div>
        </article>		
    </section>
    <br/><br/><br/><br/><br/>
</section>          