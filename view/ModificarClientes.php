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
                    <span><a class="btn btn-primary" href="?InsertarClientes"><div>Insertar cliente</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?BuscarCliente"><div>Buscar cliente</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?EliminarCliente"><div>Eliminar cliente</div></a></span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?ModificarCliente=buscar" method="post">
                        <label>Ingrese la cédula del cliente para modificar:</label><br/><br/><br/>
                        <label for="tCedula">Cédula</label>
                        <?php
                        if (isset($resultadoBusqueda)) {
                            ?>
                            <input class="form-control" type="text" id="tCedula" name="tCedula" value="<?php echo $resultadoBusqueda->getCedula(); ?>"/><br/><br/>
                            <?php
                        } else {
                            ?>
                            <input class="form-control" type="text" id="tCedula" name="tCedula" required/><br/><br/>
                            <?php
                        }
                        ?>
                        <input class="btn btn-default" type="submit" id="bIngresar" name="bIngresar" value="Buscar"/><br/><br/><br/>
                    </form>
                    <form action="?ModificarCliente=modificar&cedula=<?php echo $resultadoBusqueda->getCedula(); ?>" method="post">
                        <?php
                        if (isset($resultadoBusqueda)) {
                            ?>
                            <label for="tNombre">Nombre</label>
                            <input class="form-control" type="text" id="tNombre" name="tNombre" value="<?php echo $resultadoBusqueda->getNombre(); ?>"/><br/><br/>
                            <label for="tApellidos">Apellidos</label>
                            <input class="form-control" type="text" id="tApellidos" name="tApellidos" value="<?php echo $resultadoBusqueda->getApellidos(); ?>"/><br/><br/>
                            <label for="tFecha">Fecha de nacimiento</label><br/><br/>
                            <input class="form-control" type="date" id="tFecha" name="tFecha" value="<?php echo $resultadoBusqueda->getFechaNacimiento(); ?>"/><br/><br/>
                            <label for="tPuntaje">Puntaje acumulado</label>
                            <input class="form-control" type="text" id="tPuntaje" name="tPuntaje" value="<?php echo $resultadoBusqueda->getPuntajeAcumulado(); ?>"/><br/><br/>
                            <label for="tApellidos">Premios canjeados</label>
                            <input class="form-control" type="text" id="tPremios" name="tPremios" value="<?php echo $resultadoBusqueda->getPremiosCanjeados(); ?>"/><br/><br/>                        

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