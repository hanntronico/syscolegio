<!-- .navbar-top -->
<nav class="navbar m-menu navbar-default" style="border: none; padding-top:15px;padding-bottom: 50px;">
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
            <!-- <a class="navbar-brand" href="#"><img src="img/Logo_SCJ.png" alt="" width="300px" height="80px"></a> -->
            
            <a class="navbar-brand" href="#"><img src="img/Logo_SCJ.png" alt="logo SCJ" width="38%" ></a>            
        
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="#navbar-collapse-1" style="border: none; padding-top: 20px;">
            <ul class="nav navbar-nav navbar-right main-nav">
                <li <?=$activeini?> style="border: none; margin-right:0px;">
                  <a href="index.php" style="color: #fe1c1e; font-size: 16px;">Inicio</a></li>
                
                <li class="dropdown dropdown-toggle" style="border: none; margin-right:0px;">
                  <a href="#" data-toggle="dropdown" style="font-size: 16px;">Nosotros <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="historia.php">Historia institucional</a></li>
                            <li><a href="consejdirect.php">Consejo directivo</a></li>
                            <li><a href="organigrama.php">Organigrama</a></li>
                            <!-- <li><a href="#">Directores</a></li> -->
                            <li><a href="#">Himno del colegio</a></li>
                            <li><a href="logros.php">Logros académicos</a></li>
                            <li><a href="comunicados.php">Comunicados</a></li>
                    </ul>
                </li>

                <li class="dropdown dropdown-toggle" style="border: none; margin-right:0px;">
                  <a href="#" data-toggle="dropdown" style="font-size: 16px;">Proyecto Educativo <span><i class="fa fa-angle-down"></i></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="mision_vision.php">Misión - Visión</a></li>
                    <li><a href="obj_estrat.php">Objetivos estratégicos</a></li>
                    <li><a href="valores.php">Valores</a></li>
                    <li><a href="files/ejes_curriculares.pdf" target="_blank">Ejes curriculares</a></li>
                    <li><a href="files/eje_transversales.pdf" target="_blank">Ejes transversales</a></li>
                  </ul>

                </li>

                <!-- <li><a href="#">CREAR CUENTA</a></li> -->
                
                <li class="dropdown dropdown-toggle" style="border: none; margin-right:0px;">
                  <a href="#" data-toggle="dropdown" style="font-size: 16px;">Galería <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="galeria.php">Fotos</a></li>
                            <li><a href="videos.php">Videos</a></li>
                    </ul>
                </li>
                
               <!--  <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Libros <span><i class="fa fa-angle-down"></i></span></a> -->
                   
                   <?php
                    	// $sqlcateMe = "SELECT * FROM categoria WHERE estado = 'A' ORDER BY categoria ASC";
                    	// $rscatme=$linkdocu->query($sqlcateMe);
                     //    if($rscatme->num_rows>0){
                     //    	echo"<ul class='dropdown-menu'>";
                     //    while($rwcatme=$rscatme->fetch_array()){
                     //    	  $catme1 = $rwcatme["idc"];
                     //    	  $catme2 = $rwcatme["categoria"];
                     //    	$catemecurl = urls_amigables($catme2);
                     //    	echo"<li><a href='searchcat.php?cat=$catme1&categoria=$catemecurl'> $catme2</a></li>";
                     //    }
                     //    	echo"</ul>";
                     //    }else{
                     //    	echo"<ul class='dropdown-menu'>";
                     //    	echo"<li><a href='#'> Sin Datos</a></li>";
                     //    	echo"</ul>";
                     //    }
		                ?>
                
                <!-- </li> -->
                <!-- <li <?=$activecontac;?> ><a href="contactanos.php">Contactanos</a></li> -->
                <li style="border: none; margin-right:0px;">
                  <a href="contactanos.php" style="font-size: 16px;">Contactanos</a>
                </li>
            </ul>

        </div>
        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>
<!-- .nav -->


  