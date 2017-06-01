<?php
include_once 'header.php';
?>
<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="row">


                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?EmpleadoMes=empleadomes" method="post">
                        <label>Puedes consultar el empleado del mes</label>
                        <div class="form-group">
                            <br/><br/>
                            <input class="btn btn-default" type="submit" name="buscar" value="Obtener empleado del mes"/>
                            <br/><br/><br/>
                            <?php
                            if (isset($empleadoMes)) {
                                echo 'Hasta el momento este es el empleado del mes';
                            ?>
                            <input class="form-control" type="text" id="tEmpleadoMes" name="tEmpleadoMes" value="<?php echo $empleadoMes;?>"required/>
                            <?php
                                
                                echo $empleadoMes;
                                print $empleadoMes;
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </article>		
    </section>
    <br/><br/><br/><br/><br/>
</section>

<?php
include_once 'footer.php';
?>        