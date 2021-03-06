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
                    <span><a class="btn btn-primary" href="?InsertarClientes"><div>Insertar un cliente</div></a></span><br/><br/>
                    <span><a class="btn btn-primary" href="?ModificarCliente"><div>Modificar cliente</div></a></span><br/><br/>
                    <span><a class="btn btn-primary" href="?EliminarCliente"><div>Eliminar cliente</div></a></span><br/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?BuscarCliente=buscar" method="post">
                        <label>Ingrese la cédula del cliente que desea buscar, o precione buscar para obtener todos los clientes:</label><br/><br/><br/>

                        <label for="tCedula">Cédula</label>
                        <input class="form-control" type="text" id="tCedula" name="tCedula"/><br/><br/>
                        <input class="btn btn-default"  type="submit" id="bIngresar" name="bIngresar" value="Buscar"/><br/><br/>                
                    </form>

                    <table border="3" id="tablaClientes">
                        <thead>
                            <tr>
                        <br/><br/>
                        <th colspan="1">
                            <a href="?insertarEmpleado">Ingresar Empleado</a>
                        </th>
                        <th colspan="7" style="text-align: center">Clientes</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cédula</td>
                                <td>Nombre</td>
                                <td>Apellidos</td>
                                <td>Fecha</td>
                                <td>Puntaje acumulado</td>
                                <td>Premios canjeados</td>
                                <td colspan="2">Editar</td>
                            </tr>
                            <?php
                            if (isset($resultadoBusqueda)) {
                                if (count($resultadoBusqueda) == 1) {
                                    ?>                   
                                    <tr>
                                        <td> <?php echo $resultadoBusqueda->getCedula(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getNombre(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getApellidos(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getFechaNacimiento(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getPuntajeAcumulado(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getPremiosCanjeados(); ?></td>
                                        <td><a href="?BuscarCliente=buscar&modificarCliente=<?php echo $resultadoBusqueda->getCedula(); ?>"> Modificar</a></td>
                                        <td><a href="?BuscarCliente=buscar&eliminarCliente=<?php echo $resultadoBusqueda->getCedula(); ?>">Eliminar</a></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($resultadoBusqueda as $clienteRecuperado) {
                                        ?>                   
                                        <tr>
                                            <td> <?php echo $clienteRecuperado->getCedula(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getNombre(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getApellidos(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getFechaNacimiento(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getPuntajeAcumulado(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getPremiosCanjeados(); ?></td>
                                            <td><a href="?BuscarCliente=buscar&modificarCliente=<?php echo $clienteRecuperado->getCedula(); ?>"> Modificar</a></td>
                                            <td><a href="?BuscarCliente=buscar&eliminarCliente=<?php echo $clienteRecuperado->getCedula(); ?>">Eliminar</a></td>
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