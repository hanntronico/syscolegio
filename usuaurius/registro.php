<?php include 'inic.php'; ?>
<?php include 'funciones.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("title.php"); ?>
    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="../css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Flat Icon -->
    <link href="../fonts/flaticon/flaticon.css" rel="stylesheet">
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link href="../css/popup.css" rel="stylesheet" type="text/css" />
    <link href="../css/style.css" rel="stylesheet">

    <style type="text/css" media="screen">
      [type="date"]::-webkit-inner-spin-button {
        display: none;
      }          

        h1 { 
            color:green; 
        } 
        .xyz { 
            background-size: auto; 
            text-align: center; 
            padding-top: 100px; 
        } 
        .btn-circle.btn-sm { 
            width: 30px; 
            height: 30px; 
            padding: 6px 0px; 
            border-radius: 15px; 
            font-size: 8px; 
            text-align: center; 
        } 
        .btn-circle.btn-md { 
            width: 50px; 
            height: 50px; 
            padding: 7px 10px; 
            border-radius: 25px; 
            font-size: 10px; 
            text-align: center; 
        } 
        .btn-circle.btn-xl { 
            width: 70px; 
            height: 70px; 
            padding: 10px 16px; 
            border-radius: 35px; 
            font-size: 12px; 
            text-align: center; 
        } 

    </style>

</head>

<body>
<div id="main-wrapper">
<!-- Page Preloader -->
  <div id="preloader">
      <div id="status">
          <div class="status-mes"></div>
      </div>
  </div>




<div class="uc-mobile-menu-pusher">

<div class="content-wrapper">
  
  <?php 
    include("menu_superior.php");  
    include("menu.php");
  ?>

    <?php //include ("slider.php"); ?>

<section class="single-page-title single-page-title-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Complete sus datos personales</h2>
            </div>
        </div>
    </div>
</section>

<section class="contact-section">
  <div class="container">

    <?php if($_GET["msn"]==1){ ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alerta!</strong> el registro fue grabado correctamente.
      </div>
    <?php } ?>

    <?php if($_GET["msn"]==2){ ?>
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alerta!</strong> Error al grabar el registro.
      </div>
    <?php } ?>


<!--     <div class="section-title text-center">
      <h2>Debe ingresar sus datos para registrar en el padrón de egresados</h2>
    </div> -->
                  
<!--     <div class="row">
      <div class="col-md-6">
        <p><img class="img-responsive" src="img/prestamo.jpg"> </p>
      </div>
    
      <div class="col-md-6">
        <p>
          <b>PRÉSTAMO DE MATERIAL BIBLIOGRÁFICO</b><br>
            Solicita el prestamo de libros para la revisión en tu hogar, siempre que cumplas los siguientes requisitos:</p>
          <b>*</b> Estar matriculado en nuestra plataforma de biblioteca virtual. <br>
          <b>*</b> Identifica o busca el libro de tu interes en la web. <br>
          <b>*</b> Solicita el libro de tu interes dando click en la opcion "Solicitar Prestamo". <br>
          <b>*</b> Acercate a la biblioteca al módulo de atención con tu carnet de alumno o DNI para registrar el prestamo. <br>
          <b>*</b> Toma nota para la fecha de devolución del libro. <br>
          <b>*</b> Llévate el libro y devuélvelo a tiempo.    
      </div>
    </div> -->

<?php 

// idegresado, nom_egresado, ape_paterno, ape_materno, dni, fec_nac, foto, lug_nac, lug_dom_actual, telefono, email, password, link_conf, redes_sociales, info_contacto, estado

$sqlegre = "SELECT * FROM egresados WHERE idegresado = ".$_SESSION["idegresado"]." and estado=1";
$rsegre=$linkdocu->query($sqlegre);

if($rsegre->num_rows>0){
while($rwegre=$rsegre->fetch_array()){
    $egrenombre = $rwegre["nom_egresado"];
    $egreapepat = $rwegre["ape_paterno"];
    $egreapemat = $rwegre["ape_materno"];
    $egremail = $rwegre["email"];
    $egredni = $rwegre["dni"];
    $fechanac = $rwegre["fec_nac"];
    $telefono = $rwegre["telefono"];
    $redes = $rwegre["redes_sociales"];
    $info = $rwegre["info_contacto"];
    $foto = $rwegre["foto"];
    $lugnac = $rwegre["lug_nac"];
    $pass = $rwegre["password"];

}

if ($lugnac=='') {$lugnac=0;}

$sqlcombo = "SELECT dp.iddepartamento, p.idprovincia, d.iddistrito
                  FROM distritos as d INNER JOIN provincias as p
                  ON d.idprovincia = p.idprovincia
                  INNER JOIN departamentos as dp
                  ON p.iddepartamento = dp.iddepartamento 
                  WHERE iddistrito=".$lugnac;
$rscombo=$linkdocu->query($sqlcombo);
$rwcombo=$rscombo->fetch_array();

$iddepart = $rwcombo["iddepartamento"];
$idprov = $rwcombo["idprovincia"];
$iddist = $rwcombo["iddistrito"];

// iddistrito, distritos, idprovincia
// idprovincia, provincias, iddepartamento
// iddepartamento, departamento


}else{
  $menso1 = "";
}

?>




<?php 

  $ide = $_SESSION["idegresado"];
  $sqlegre1 = "SELECT * FROM detalle_carreras as dc, carreras as c 
               WHERE dc.idcarrera = c.idcarrera 
               AND dc.idegresado = ".$ide;
  $rsegre1=$linkdocu->query($sqlegre1);
  $cant1 = $rsegre1->num_rows;
  // echo "<br>";
  $sqlegre2 = "SELECT * FROM detalle_especialidades as de, especialidades as e 
               WHERE de.idespecialidad = e.idespecialidad 
               AND de.idegresado = ".$ide;
  $rsegre2=$linkdocu->query($sqlegre2);
  $cant2 = $rsegre2->num_rows;


  if ($fechanac== '' || $telefono=='' || $redes=='' || $info=='') {
 
    $opc2 = "disabled";
    $opc3 = "disabled";
    $opc4 = "disabled";

  }else {
    if ($cant1==0) {
      $opc3 = "disabled";
    }else {
      $opc3 = "";
    }     

    if ($cant2==0) {
      $opc4 = "disabled"; 
    }else {
      $opc4 = "";
    } 
  }

  $act1="btn-danger";
  $act2="btn-primary";
  $act3="btn-primary";
  $act4="btn-primary";


  if ($lc=='C') {
    include 'botpasos.php'; 
  }elseif ($lc=='NC') {
    echo "Ud. aún no ha sido verificado en el sistema, se le enviará un correo cuando se le verifique en la institución, gracias.";
  }
?>

  <br>
<!-- </section> -->

    <div class="contact-form mt-50">
      <form method="post" action="registrar.php" enctype="multipart/form-data">
        <div class="row">

          <input type="hidden" name="id" value="<?php echo $_SESSION["idegresado"]; ?>">
          <input type="hidden" name="pag" value="registro">

          <div class="col-md-6">

          <?php 
            if ($egrenombre != "") {$desactnom = "disabled";}else{$desactnom="";}
            if ($egreapepat != "") {$desactap = "disabled";}else{$desactap="";}
            if ($egreapemat != "") {$desactam = "disabled";}else{$desactam="";}
            if ($egremail != "") {$desactemail = "disabled";}else{$desactemail="";}
            if ($egredni != "") {$desactdni = "disabled";}else{$desactdni="";}


            if ($foto == '') {
              $reque = "required=\"\"";
            }

          ?>

            <div class="form-group">
              <label for="nameTwo">Nombres</label>
              <input type="text" name="nombres" class="form-control" required="" id="nombres" placeholder="Nombre completo" value="<?php echo $egrenombre;?>" <?php echo $desactnom; ?>>
            </div>

            <div class="form-group">
              <label for="nameTwo">Apellido Paterno</label>
              <input type="text" name="apepaterno" class="form-control" required="" id="apepaterno" placeholder="Apellido paterno" value="<?php echo $egreapepat;?>" <?php echo $desactap;?>>
            </div>

            <div class="form-group">
              <label for="nameTwo">Apellido Materno</label>
              <input type="text" name="apematerno" class="form-control" required="" id="apematerno" placeholder="Apellido materno" value="<?php echo $egreapemat;?>" <?php echo $desactam;?>>
            </div>       

            <div class="form-group">
              <label for="dniTwo">DNI</label>
              <input type="text" name="dni" class="form-control" required="" id="dni" placeholder="Número de DNI" value="<?php echo $egredni;?>" <?php echo $desactdni; ?>>
            </div>

            <div class="form-group">
              <label for="nameTwo">Fecha Nacimiento</label>
              <input type="date" name="fechanac" class="form-control" required="" id="fechanac" placeholder="Fecha Nacimiento" value="<?php echo $fechanac; ?>">
            </div>    

          </div> <!-- col-md-6 -->


          <div class="col-md-6">
            <div class="form-group">
              <label for="fotoTwo">Foto</label>
              <input type="file" name="foto" class="form-control" <?php echo $reque; ?> id="foto" placeholder="Ingrese foto">
              <input type="hidden" name="ant_foto" value="<?php echo $foto;?>"> 
              <a href="../usuaurius/fotos/<?php echo $foto;?>" target="_blank"><?php echo $foto;?></a>
              <img src="../usuaurius/fotos/<?php echo $foto;?>" alt="<?php echo $foto;?>" width="10%">                           
            </div> 

            <div class="form-group">
              <label for="telefonoTwo">Teléfono</label>
              <input type="text" name="telefono" class="form-control" required="" id="telefono" placeholder="Teléfono" value="<?php echo $telefono; ?>">
            </div>

            <div class="form-group">
              <label for="emailTwo">Email</label>
              <input type="email" name="correo" class="form-control" required="" id="emailTwo" placeholder="Email - Correo" value="<?php echo $egremail;?>" <?php echo $desactemail; ?>>
            </div>

            <div class="form-group">
              <label for="redesTwo">Redes Sociales</label>
              <input type="text" name="redes" class="form-control" required="" id="redes" placeholder="Redes Sociales" value="<?php echo $redes; ?>">
            </div>
            
            <div class="form-group">
              <label for="infocontactTwo">Información de Contacto</label>
              <input type="text" name="info" class="form-control" required="" id="info" placeholder="Informacion de contacto" value="<?php echo $info; ?>">
            </div>

          </div>




        


<!--           <div class="col-md-8">
            <div class="form-group">
              <label for="messageTwo" class="sr-only">Mensaje</label>
              <textarea class="form-control" name="mensaje" required rows="7" placeholder="Escribe el mensaje"></textarea>
            </div>
          </div> --> <!-- col-md-8 -->



          

        </div><!-- /.row-->

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="passTwo">PASSWORD</label>
                <input type="hidden" name="ant_pass" value="<?php echo $pass;?>">
                <input type="password" name="pass" class="form-control" required="" id="pass" placeholder="password" value="<?php echo $pass;?>">
              </div>      
            </div>
          </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="depart1nacTwo">Lugar de Nacimiento:</label>
              <label for="depart2nacTwo">Departamento</label>
               <?php 
                  $consult = ' ORDER BY 2';
                  // $codcarrera= 1;
                  llenarcombo2('departamentos','iddepartamento, departamento', $consult, $iddepart, '','codDepartamento id=opcDepart required=\'true\'')
                ?> 
            </div> 
          </div> <!-- col-md-4 -->

          <div class="col-md-4" id="content_prov">
            <div class="form-group">
              <label for="provnac1Two">&nbsp;</label>
              <label for="provnac2Two">Provincia</label>
               <?php 
                  // $consult = ' ORDER BY 2';
                  // $codcarrera= 1;
                  llenarcombo2('provincias','idprovincia, provincias', $consult, $idprov, '','codProvincia id=opcProvincia required=\'true\'')
                  // llenarcombo('','', $consult, $codprovincia, '','codProvincia id=opcProvincia required=\'true\'')
                ?> 
            </div> 
          </div> <!-- col-md-4 -->

          <div class="col-md-4" id="content_distrito" >
            <div class="form-group">
              <label for="distritonac1Two">&nbsp;</label>
              <label for="distritonac2Two">Distrito</label>
               <?php 
                  $consult = ' ORDER BY 2';
                  // $codcarrera= 1;
                  llenarcombo2('distritos','iddistrito, distritos', $consult, $iddist, '','codDistrito id=opcDistrito required=\'true\'')
                  // llenarcombo('','', $consult, $iddist, '','codDistrito id=opcDistrito required=\'true\'')
                ?> 
            </div> 
          </div> <!-- col-md-4 -->    
        </div>


          <div class="row">
            <div class="col-md-12" style="margin: 0px auto; text-align: center;">
              <button type="submit" name="envia" class="btn btn-primary" style="font-weight: bolder;">Grabar datos</button>
            </div>
          </div>

        <!-- <button type="submit" name="envia" class="btn btn-primary btn-lg pull-right">Enviar Mensaje</button> -->
      </form>
    </div> <!-- contact-form --> 

                                                
  </div>
</section> <!-- contact-section -->

<!-- <section class="testimonial">
    <div class="container">
       <form method="post" action="search.php">
      <div class="row">
      	<div class="col-lg-8">
      		<input type="text" name="consultar" class="form-control" placeholder="Ingrese dato a consultar" required>
      	</div>
      	<div class="col-lg-4">
      		<button class="btn btn-primary btn-lg uppercase"><b>Consultar</b></button>
      	</div>
      </div>
      <p>Busqueda por: Autor, libro, palabra clave, categoria, codigo ISBN.</p>
       </form>
        <div id="testimonialSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#testimonialSlider" data-slide-to="0" class="active"></li>
                <li data-target="#testimonialSlider" data-slide-to="1"></li>
                <li data-target="#testimonialSlider" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <blockquote>
                    
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egetvel lacus
                            pretium rhoncus a quis nisly Ut vehicula gravida dui in pulvinar donec diam elit
                            consequat eget augue vitae aliquet sollicitudin.
                        </p>

                        <ul class="user-details">
                            <li class="avatar"><img src="img/img-testimonial-1.jpg" class="img-responsive" alt=""/></li>
                            <li class="name">Justus Kühn</li>
                            <li class="company">uiCookies</li>
                        </ul>

                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egetvel lacus
                            pretium rhoncus a quis nisly Ut vehicula gravida dui in pulvinar donec diam elit
                            consequat eget augue vitae aliquet sollicitudin.
                        </p>
                         <ul class="user-details">
                            <li class="avatar"><img src="img/img-testimonial-2.jpg" class="img-responsive" alt=""/></li>
                            <li class="name">Lennox Arnold</li>
                            <li class="company">uiCookies</li>
                        </ul>

                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egetvel lacus
                            pretium rhoncus a quis nisly Ut vehicula gravida dui in pulvinar donec diam elit
                            consequat eget augue vitae aliquet sollicitudin.
                        </p>
                         <ul class="user-details">
                            <li class="avatar"><img src="img/img-testimonial-3.jpg" class="img-responsive" alt=""/></li>
                            <li class="name">Paulina Berger</li>
                            <li class="company">uiCookies</li>
                        </ul>

                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /.testimonial -->

<?php //include 'contenido.php'; ?>

<!-- /.client-logo -->

<?php //include 'logos_clientes.php'; ?>
<!-- /.client-logo -->

<?php include 'mensaje_popup.php'; ?>

<?php include("footer.php"); ?>

</div>
<!-- .content-wrapper -->
</div>
<?php include("menu_movil.php"); ?>

</div>
<!-- #main-wrapper -->


<!-- Script -->
<script src="../js/jquery-2.1.4.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="../js/smoothscroll.js"></script>
<script src="../js/mobile-menu.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/myscripts.js"></script>

<?php if($menso1!=""){ ?>
	<script>
		$("#btn_modal").get(0).click();
	</script>
	<?php } ?>
	
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="https://www.azasof.com/">Web Diseño: Azasof</a>

</body>
</html>