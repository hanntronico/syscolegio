<section class="case-studies">
    <div class="container">
       <div class="col-lg-9">
        <div class="section-title text-center">
            <h1>Nuestra biblioteca virtual</h1>
            <p>Podras encontrar el libro que este a tu disponibilidad, solicitar o reservarlo el libro, tambien encontraras libros digitales en nesutar biblioteca virtual.</p>
        </div>
        <?php
						  $sqllib="SELECT l.idl, l.idc, l.titulo, l.tema, l.autor, l.anio, l.edicion, l.lugar, l.editorial, l.cod_isbn, l.detalle, l.canti_ejemplar, l.canti_pagina, l.disponible, l.foto, l.archivo, l.estado, c.categoria, e.nom_edi FROM libro AS l INNER JOIN categoria AS c ON l.idc = c.idc INNER JOIN editorial AS e ON l.editorial = e.idid WHERE l.estado = 'A' ORDER BY l.idl DESC LIMIT 6";
						  $rslib=$linkdocu->query($sqllib);
if($rslib->num_rows>0){
while($rwlib=$rslib->fetch_array()){
	 // $lib = $lib + 1;
	  $libro1 = $rwlib["idl"];
	  $libro2 = $rwlib["titulo"];
	$libro3 = $rwlib["tema"];
	$libro4 = $rwlib["autor"];
	$libro5 = $rwlib["anio"];
	$libro6 = $rwlib["edicion"];
	$libro7 = $rwlib["lugar"];
	$libro8 = $rwlib["editorial"];
	$libro9 = $rwlib["cod_isbn"];
	$libro10 = $rwlib["detalle"];
	$libro11 = $rwlib["canti_ejemplar"];
	$libro12 = $rwlib["canti_pagina"];
	$libro13 = $rwlib["disponible"];
	$libro14 = $rwlib["foto"];
	$libro15 = $rwlib["archivo"];
	$libro16 = $rwlib["categoria"];
	$libro17 = $rwlib["nom_edi"];
	$nomcurl = urls_amigables($libro2);
	
	echo"<div class='col-sm-4'>
                <div class='case-studies-content'>
				<center>
                    <img class='img-responsive' src='ctrl_admin/libro/$libro14' style='height:387px;' alt=''>
					<div style='height:80px;padding: 2% 5% 2%'>
					<a href='libro.php?cap=$libro1&libro=$nomcurl'>$libro2</a><br>
					<b>Autor:</b> $libro4 <br>
					<a href='libro.php?cap=$libro1&libro=$nomcurl' class='btn btn-info'><b>Leer</b></a>
					</div>
					</center>
                </div>
            </div>";
}
}
		   ?>
        <!--<div class="row">-->
           <!-- <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-1.png" alt="case sudies.png">
                    <h2>Solving the problem</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-2.png" alt="case sudies.png">
                    <h2>Analysis of the enterprise's activity</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-3.png" alt="case sudies.png">
                    <h2>Methods of the recruitment</h2>
                </div>
            </div>-->
        <!--</div>-->
		
        <!--<div class="row">-->
            <!--<div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-4.png" alt="case sudies.png">
                    <h2>SEO and Web development</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-5.png" alt="case sudies.png">
                    <h2>Thinking only of profits</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-6.png" alt="case sudies.png">
                    <h2>The main objectives of the marketer</h2>
                </div>
            </div>-->
        <!--</div>-->
        <div class="row">
        <div class="col-lg-12">
        <center><a href="libros.php" class="btn btn-primary btn-lg">Ver todos</a></center>
        </div>
        </div>
    </div>
    
    <div class="col-lg-3">
    	 <div class="section-title text-center">
            <h1>Categoria</h1>
    </div>
    <hr>
    
           	<?php
		$sqlcate = "SELECT * FROM categoria WHERE estado = 'A' ORDER BY categoria DESC";
						  $rscat=$linkdocu->query($sqlcate);
if($rscat->num_rows>0){
	echo"<ul style='padding: 0% 12% 2%'>";
while($rwcat=$rscat->fetch_array()){
	  //$cate = $cate + 1;
	  $cat1 = $rwcat["idc"];
	  $cat2 = $rwcat["categoria"];
	$catecurl = urls_amigables($cat2);
	echo"<li><a href='searchcat.php?cat=$cat1&categoria=$catecurl'><i class='glyphicon glyphicon-menu-right'></i> $cat2</a></li>";
}
	echo"</ul>";
}
		?>
            
            <br><br>
            <h1>Autores</h1>
    <hr>
    <?php
		$sqlauto = "SELECT autor FROM libro WHERE estado = 'A' GROUP BY autor ORDER BY autor ASC";
		$rsauto=$linkdocu->query($sqlauto);
if($rsauto->num_rows>0){
	echo"<ul class='list-inline'>";
while($rwau=$rsauto->fetch_array()){
	  //$auto = $auto + 1;
	  $auto1 = $rwau["autor"];
	$autorurl = urls_amigables($auto1);
	echo"<li><a href='searchautor.php?auto=$auto1&autor=$autorurl'><i class='glyphicon glyphicon-file'></i> $auto1</a></li>";
}
	echo"</ul>";
}
		
		?>
    </div>
</section>