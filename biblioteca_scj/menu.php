<!-- .navbar-top -->
<nav class="navbar m-menu navbar-default" style="border: none; padding-top:15px;padding-bottom: 30px;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/Logo_SCJ.png" alt="" width="300px" height="80px"></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="#navbar-collapse-1" style="border: none; padding-top: 20px;">
            <ul class="nav navbar-nav navbar-right main-nav">
                <li <?=$activeini;?> ><a href="index.php">Inicio</a></li>
                <!--<li><a href="about.html">About</a></li>-->
                <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Servicios <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="prestamolib.php">Prestamo de Libros</a></li>
                            <li><a href="alquilerlib.php">Reserva de Libros</a></li>
                    </ul>
                </li>
                
                <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Libros <span><i class="fa fa-angle-down"></i></span></a>
                   
                   <?php
		$sqlcateMe = "SELECT * FROM categoria WHERE estado = 'A' ORDER BY categoria ASC";
						  $rscatme=$linkdocu->query($sqlcateMe);
if($rscatme->num_rows>0){
	echo"<ul class='dropdown-menu'>";
while($rwcatme=$rscatme->fetch_array()){
	  $catme1 = $rwcatme["idc"];
	  $catme2 = $rwcatme["categoria"];
	$catemecurl = urls_amigables($catme2);
	echo"<li><a href='searchcat.php?cat=$catme1&categoria=$catemecurl'> $catme2</a></li>";
}
	echo"</ul>";
}else{
	echo"<ul class='dropdown-menu'>";
	echo"<li><a href='#'> Sin Datos</a></li>";
	echo"</ul>";
}
		?>
                </li>
                <!-- <li <?=$activecontac;?> ><a href="contactanos.php">Contactanos</a></li> -->
            </ul>

        </div>
        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>
<!-- .nav -->


  