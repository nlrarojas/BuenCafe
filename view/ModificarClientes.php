<?php
include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="boxed" id="menuIngresoAsociado"><br/>
                <span><a href="?InsertarClientes"><div>Insertar cliente</div></a></span><br/>
                <span><a href="?BuscarCliente"><div>Buscar cliente</div></a></span><br/>
                <span><a href="?EliminarCliente"><div>Eliminar cliente</div></a></span>
            </div>
            <div class="boxed" id="divContenedorIngreso">
                <br/><br/><br/>
                <form action="?ModificarCliente=buscar" method="post">
                        <label>Ingrese la cédula del cliente para modificar:</label><br/><br/><br/>
                        <label for="tCedula">Cédula</label>
                        <?php
                        if (isset($resultadoBusqueda)) {
                            ?>
                            <input type="text" id="tCedula" name="tCedula" value="<?php echo $resultadoBusqueda->getCedula(); ?>"/><br/><br/>
                            <?php
                        }else{
                            ?>
                            <input type="text" id="tCedula" name="tCedula" required/><br/><br/>
                            <?php
                        }
                        ?>
                        <input type="submit" id="bIngresar" name="bIngresar" value="Buscar"/><br/><br/><br/>
                    </form>
                <form action="?ModificarCliente=modificar&cedula=<?php echo $resultadoBusqueda->getCedula(); ?>" method="post">
                    <?php
                    if (isset($resultadoBusqueda)) {
                        ?>
                        <label for="tNombre">Nombre</label>
                        <input type="text" id="tNombre" name="tNombre" value="<?php echo $resultadoBusqueda->getNombre(); ?>"/><br/><br/>
                        <label for="tApellidos">Apellidos</label>
                        <input type="text" id="tApellidos" name="tApellidos" value="<?php echo $resultadoBusqueda->getApellidos(); ?>"/><br/><br/>
                        <label for="tFecha">Fecha de nacimiento</label><br/><br/>
                        <input type="date" id="tFecha" name="tFecha" value="<?php echo $resultadoBusqueda->getFechaNacimiento(); ?>"/><br/><br/>
                        <label for="tPuntaje">Puntaje acumulado</label>
                        <input type="text" id="tPuntaje" name="tPuntaje" value="<?php echo $resultadoBusqueda->getPuntajeAcumulado(); ?>"/><br/><br/>
                        <label for="tApellidos">Premios canjeados</label>
                        <input type="text" id="tPremios" name="tPremios" value="<?php echo $resultadoBusqueda->getPremiosCanjeados(); ?>"/><br/><br/>                        

                        <input type="submit" id="bIngresar" name="bIngresar" value = "Modificar"/>
                        <?php
                    }
                    ?>
                </form>
                <br/><br/><br/>
            </div>
        </article>		
    </section>
    <br/><br/><br/><br/><br/>
</section>

<?php
include_once 'footer.php';
?>                    