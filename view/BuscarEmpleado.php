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
                    <span><a class="btn btn-primary" href="?ModificarEmpleado"><div>Modificar Empleado</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?BuscarEmpleado"   ><div>Buscar  Empleado  </div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?EliminarEmpleado" ><div>Eliminar Empleado </div></a></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?BuscarEmpleado=buscar" method="post">
                        <label>Ingrese el id del empleado que desea buscar, o precione buscar para obtener todos los empleados:</label><br/><br/><br/>

                        <label for="tCedula">ID empleado</label>
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
                        <th colspan="5" style="text-align: center">Empleados</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Id empleado</td>
                                <td>Nombre</td>
                                <td>Apellidos</td>
                                <td>Fecha</td>                                
                                <td colspan="2">Editar</td>
                            </tr>
                            <?php
                            if (isset($resultadoBusqueda)) {
                                if (count($resultadoBusqueda) == 1) {
                                    ?>                   
                                    <tr>
                                        <td> <?php echo $resultadoBusqueda->getId(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getNombre(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getApellidos(); ?></td>
                                        <td> <?php echo $resultadoBusqueda->getFecha(); ?></td>
                                        <td><a href="?BuscarEmpleado=buscar&modificarEmpleado=<?php echo $resultadoBusqueda->getId(); ?>"> Modificar</a></td>
                                        <td><a href="?BuscarEmpleado=buscar&eliminarEmpleado=<?php echo $resultadoBusqueda->getId(); ?>">Eliminar</a></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($resultadoBusqueda as $clienteRecuperado) {
                                        ?>                   
                                        <tr>
                                            <td> <?php echo $clienteRecuperado->getId(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getNombre(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getApellidos(); ?></td>
                                            <td> <?php echo $clienteRecuperado->getFecha(); ?></td>
                                            <td><a href="?BuscarEmpleado=buscar&modificarEmpleado=<?php echo $clienteRecuperado->getId(); ?>"> Modificar</a></td>
                                            <td><a href="?BuscarEmpleado=buscar&eliminarEmpleado=<?php echo $clienteRecuperado->getId(); ?>">Eliminar</a></td>
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