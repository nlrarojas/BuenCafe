<?php

include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="boxed" id="menuIngresoAsociado"><br/>
                <span><a href="InsertarClientes"><div>Insertar un cliente</div></a></span><br/>
                <span><a href="?BuscarCliente"><div>Buscar cliente</div></a></span><br/>
                <span><a href="?EliminarCliente"><div>Eliminar cliente</div></a></span>
            </div>
            <div class="boxed" id="divContenedorIngreso">
                <br/><br/><br/>
                <form action="?BuscarCliente=buscar" method="post">
                    <label>Ingrese la cédula del cliente para eliminar:</label><br/><br/><br/>
                    
                    <form action="?EliminarCliente=buscar" method="post">
                        <label for="tCedula">Cédula</label>
                        <input type="submit" id="bIngresar" name="bIngresar" value="Ingresar"/>
                    </form>
                    <input type="text" id="tCedula" name="tCedula" required readonly="true"/><br/><br/>
                    <label for="tNombre">Nombre</label>
                    <input type="text" id="tNombre" name="tNombre" required readonly="true"/><br/><br/>
                    <label for="tApellidos">Apellidos</label>
                    <input type="text" id="tApellidos" name="tApellidos" required readonly="true"/><br/><br/>                    
                    <label for="tFecha">Fecha de nacimiento</label><br/><br/>
                    <input type="date" id="tFecha" name="tFecha" required readonly="true"/><br/><br/>
                    
                    <input type="submit" id="bIngresar" name="bIngresar" value="Ingresar"/>
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