<?php

include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">
                    <div class="form-group">    
                        <span><a class="btn btn-primary" href="?ModificarCliente"><div>Modificar Empelado</div></a></span><br/>
                        <br>
                        <span><a class="btn btn-primary" href="?BuscarCliente">   <div>Buscar  Empleado</div></a></span><br/>
                        <br>
                        <span><a class="btn btn-primary" href="?EliminarCliente"> <div>Eliminar Empleado</div></a></span>
                    </div>
                </div> <div class="col-sm-3">
                    <div class="boxed" id="divContenedorIngreso">
                        <br/><br/><br/>

                        <form action="?insertarEmpleado=ingresar" method="post">
                            <div class="form-group">
                                <label>Ingrese los datos del empleado:</label>
                                <label>Tipo de empleado</label>
                                <select class="form-control" id ="tipoEmpleado" name="tipoEmpleado">
                                    <option value="vendedor">Vendedor</option>
                                    <option value="administrador">Administrador</option>                                    
                                </select>
                            </div><div class="form-group">
                                <label for="tId">Id empleado</label>
                                <input class="form-control" type="text" id="tCedula" name="tCedula" required/>                  
                            </div><div class="form-group">
                                <label for="tNombre">Nombre</label>
                                <input  class="form-control" type="text" id="tNombre" name="tNombre" required/>
                            </div><div class="form-group">
                                <label for="tApellido1">Apellidos</label>
                                <input  class="form-control" type="text" id="tApellidos" name="tApellidos" required/>                   
                            </div><div class="form-group">
                                <label for="tDireccion">Fecha de nacimiento</label>
                                <input  class="form-control" type="date" id="tFecha" name="tFecha" required/>
                            </div>
                            <input class="btn btn-default" type="submit" id="bIngresar" name="bIngresar" value="Ingresar"/>
                        </form>

                        <br/><br/><br/>
                    </div>
                </div>
            </div>
        </article>		
    </section>
    <br/><br/><br/><br/><br/>
</section>

<?php

include_once 'footer.php';
?>                    