<?php

include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="boxed" id="menuIngresoAsociado"><br/>
                <span><a href="?ModificarCliente"><div>Modificar un cliente</div></a></span><br/>
                <span><a href="?BuscarCliente"><div>Buscar cliente</div></a></span><br/>
                <span><a href="?EliminarCliente"><div>Eliminar cliente</div></a></span>
            </div>
            <div class="boxed" id="divContenedorIngreso">
                <br/><br/><br/>
                <form action="?InsertarClientes=ingresar" method="post">
                    <label>Ingrese los datos del cliente:</label><br/><br/><br/>
                    <label for="tApellido2">Cédula</label>
                    <input type="text" id="tCedula" name="tCedula" required/><br/><br/>                    
                    <label for="tNombre">Nombre</label>
                    <input type="text" id="tNombre" name="tNombre" required/><br/><br/>
                    <label for="tApellido1">Apellidos</label>
                    <input type="text" id="tApellidos" name="tApellidos" required/><br/><br/>                    
                    <label for="tDireccion">Fecha de nacimiento</label><br/><br/>
                    <input type="date" id="tFecha" name="tFecha" required/><br/><br/>
                    
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