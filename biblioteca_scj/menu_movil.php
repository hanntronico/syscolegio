<!-- .uc-mobile-menu-pusher -->

<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <div>
            <ul id="menu">
                <li><a href="index.php">Inicio</a></li>
                <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Servicios <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="prestamolib.php">Prestamo</a></li>
                            <li><a href="alquilerlib.php">Reserva</a></li>
                    </ul>
                </li>
                <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Libros <span><i class="fa fa-angle-down"></i></span></a>
                   
                   <?php
		$sqlcateMo = "SELECT * FROM categoria WHERE estado = 'A' ORDER BY categoria ASC";
						  $rscatmo=$linkdocu->query($sqlcateMo);
if($rscatmo->num_rows>0){
	echo"<ul class='dropdown-menu'>";
while($rwcatmo=$rscatmo->fetch_array()){
	  $catmo1 = $rwcatmo["idc"];
	  $catmo2 = $rwcatmo["categoria"];
	$catemocurl = urls_amigables($catmo2);
	echo"<li><a href='searchcat.php?cat=$catmo1&categoria=$catemocurl'> $catmo2</a></li>";
}
	echo"</ul>";
}else{
	echo"<ul class='dropdown-menu'>";
	echo"<li><a href='#'> Sin Datos</a></li>";
	echo"</ul>";
}
		?>
                </li>
                <li><a href="contactanos.php">Contactanos</a></li>
                <?php if (isset($_SESSION['usuario'])){ ?>
                    <li class="phone"><button class="btn btn-primary"><i class="fa fa-user" aria-hidden="true"></i> Jose</button></li>
                    <li class="get-a-quote"><a href="logout/" class="text-danger" title=""><button class="btn btn-danger">Cerrar Sesión</button></a></li>
                    <?php }else{ ?>
                    <li class="get-a-quote"><a href="ingresar/" title=""><button class="btn btn-primary">Inicia Sesión</button></a></li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!-- .uc-mobile-menu -->


<?php mysqli_close($linkdocu); ?>