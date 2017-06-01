<?php
include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">           
            </div><div class="col-sm-18">
                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?Factura=ingresar" method="post">
                        <div class="form-group">
                            <label>Ingrese los datos de la factura:</label><br/>
                            <label>Código cliente</label>
                            <select class="form-control" id ="tipoEmpleado" name="tipoEmpleado">
                                <?php
                                if(isset($resultadoClientes)){
                                foreach ($resultadoClientes as $cliente){
                                    ?>
                                    <option value="cliente"><?php echo $cliente->getCedula(); ?></option>
                                    <?php
                                }
                                }
                                ?>                                  
                            </select>
                        </div><div class="form-group">
                            <label>Id vendedor</label>
                            <select class="form-control" id ="tipoEmpleado" name="tipoEmpleado">
                                <?php
                                if(isset($resultadoVendedores)){
                                foreach ($resultadoVendedores as $vendedor){
                                    ?>
                                    <option value="vendedor"><?php echo $vendedor->getId(); ?></option>
                                    <?php
                                }
                                }
                                ?>                             
                            </select>                            
                        </div><div class="form-group">
                            <label for="tNombre">Código de factura</label>
                            <input  class="form-control" type="text" id="tNombre" name="tNombre" required/>
                        </div><div class="form-group">
                            <label for="tApellido1">Producto</label>
                            <select class="form-control" id ="tipoEmpleado" name="tipoEmpleado">
                                <?php
                                if(isset($resultadoProductos)){
                                foreach ($resultadoProductos as $producto){
                                    ?>
                                    <option value="producto"><?php echo $producto->getNombre(); ?></option>
                                    <?php
                                }
                                }
                                ?>                                  
                            </select>                       
                        </div><div class="form-group">
                            <label for="tDireccion">Fecha de nacimiento</label>
                            <input  class="form-control" type="date" id="tFecha" name="tFecha" value="<?php echo $fechaActual; ?>" required/>
                        </div>
                        <input class="btn btn-default" type="submit" id="bIngresar" name="bIngresar" value="Ingresar"/>
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