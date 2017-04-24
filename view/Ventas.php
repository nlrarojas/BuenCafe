<?php

include_once 'header.php';
?>

<section id="contenido">
    <br/><br/><br/><br/><br/>
    <section id="principal">
        <article id="contenidoIngresoAsociado">
            <div class="boxed" id="menuIngresoAsociado"><br/>
                <span><a href="indexPrincipal.php?altaBaja"><div>Dar alta o baja a un asociado</div></a></span><br/>
                <span><a href="?buscarAsociado"><div>Buscar asociado</div></a></span>
            </div>
            <div class="boxed" id="divContenedorIngreso">
                <br/><br/><br/>
                <form action="?nuevoSocio=ingresar" method="post">
                    
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