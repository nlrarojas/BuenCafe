<?php
include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="col-sm-3"></div>
            <div class="col-sm-2">
                <div class="form-group">    
                    <span><a class="btn btn-primary" href="?ModificarProducto"><div>Modificar producto</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?BuscarProducto">   <div>Buscar  producto</div></a></span><br/><br>
                    <span><a class="btn btn-primary" href="?EliminarProducto"> <div>Eliminar producto</div></a></span>
                </div>
            </div><div class="col-sm-3">
                <div class="boxed" id="divContenedorIngreso">
                    <br/><br/><br/>
                    <form action="?InsertarProductos=ingresar" method="post">
                        <div class="form-group">
                            <label>Ingrese los datos del nuevo producto:</label>                            
                        </div><div class="form-group">                            
                            <label for="tNombre">Nombre del producto</label>
                            <input  class="form-control" type="text" id="tNombre" name="tNombre" required/>                            
                        </div><div class="form-group">
                            <label for="tDescripcion">Descripción del producto</label>
                            <input class="form-control" type="text" id="tDescripcion" name="tDescripcion" required/>                  
                        </div><div class="form-group">
                            <label for="tPrecio">Precio</label>
                            <input  class="form-control" type="number" id="tPrecio" name="tPrecio" required/>                   
                        </div><div class="form-group">
                            <label for="tPuntos">Valor en puntos</label>
                            <input  class="form-control" type="number" id="tPuntos" name="tPuntos" required/>
                        </div>
                        <div class="form-group">
                            <label for="tOtorga">Puntos que otorga</label>
                            <input  class="form-control" type="number" id="tOtorga" name="tOtorga" required/>
                        </div>
                        <div class="form-group">
                            <label for="tCedulaAdmin">Cédula del administrador</label>
                            <input  class="form-control" type="number" id="tCedulaAdmin" name="tCedulaAdmin" required/>
                        </div>
                        <input class="btn btn-default" type="submit" id="bIngresar" name="bIngresar" value="Ingresar"/><br/><br/>
                        </div>
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