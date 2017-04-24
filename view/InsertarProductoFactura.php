<?php

include_once 'header.php';
?>
<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="boxed" id="divContenedorIngreso">
                        <br/><br/><br/>
                        <form action="?InsertarClientes=ingresar" method="post">
                            <div class="form-group">
                                <label>Ingrese La factura y el producro asociado</label>
                                <label for="id_factura">Identificacion de la factura</label>
                                <input  class="form-control" type="text" id="id_factura" name="id_factura" required/>                  
                            </div><div class="form-group">
                                <label for="nombreProducto">Nombre del Producto</label>
                                <input  class="form-control" type="text" id="nombreProducto" name="nombreProducto" required/>
                            </div>
                            <input class="btn btn-default" type="submit" id="bIngresar" name="bIngresar" value="Ingresar"/>
                        </form>
                        <br/><br/><br/>
                    </div>
                    <div class="col-sm-4"></div>
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