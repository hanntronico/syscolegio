<?php include 'inic.php'; ?>
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
    <link href="css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Flat Icon -->
    <link href="fonts/flaticon/flaticon.css" rel="stylesheet">
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link href="css/popup.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet">

    <style type="text/css" media="screen">
      [type="date"]::-webkit-inner-spin-button {
        display: none;
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
                <h2>Registro de Egresados</h2>
            </div>
        </div>
    </div>
</section>

<section class="contact-section">
  <div class="container">

    <?php if($_GET["mens"]==1){ ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alerta!</strong> el usuario fue registrado, se le ha enviado un correo de verificación (revisa tu bandeja de entrada o en correo no deseado o SPAM).
      </div>
    <?php } ?>

    <?php if($_GET["mens"]==2){ ?>
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alerta!</strong> las contraseñas no coinciden.
      </div>
    <?php } ?>

    <?php if($_GET["mens"]=='err1'){ ?>
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alerta!</strong> el DNI ingresado, ya existe.
      </div>
    <?php } ?>

    <div class="section-title text-center">
      <h2>Debe ingresar sus usuario y contraseña egresados</h2>
    </div>
                  
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

    <div class="contact-form mt-50">
      <form method="post" action="preregistrar.php">
        <div class="row">

          <div class="col-md-2"></div>
          
          <div class="col-md-4">
            <div class="form-group">
              <label for="nameTwo">Nombres</label>
              <input type="text" name="nombres" class="form-control" required="" id="nombres" placeholder="Nombre completo">
            </div>

            <div class="form-group">
              <label for="nameTwo">Apellido Paterno</label>
              <input type="text" name="apepaterno" class="form-control" required="" id="apepaterno" placeholder="Apellido paterno">
            </div>

            <div class="form-group">
              <label for="nameTwo">Apellido Materno</label>
              <input type="text" name="apematerno" class="form-control" required="" id="apematerno" placeholder="Apellido materno">
            </div>  

            <div class="form-group">
              <label for="dniTwo">DNI</label>
              <input type="text" name="dni" class="form-control" required="" id="dni" placeholder="número de DNI">
            </div> 

          </div> <!-- col-md-4 -->

          <div class="col-md-4">

            <div class="form-group">
              <label for="emailTwo">Email</label>
              <input type="email" name="correo" class="form-control" required="" id="emailTwo" placeholder="Email - Correo">
            </div>

            <div class="form-group">
              <label for="nameTwo">Password</label>
              <input type="password" name="password" class="form-control" required="" id="password" placeholder="password">
            </div>

            <div class="form-group">
              <label for="nameTwo">Confirmar password</label>
              <input type="password" name="confpassword" class="form-control" required="" id="confpassword" placeholder="confirma password">
            </div>

            <div class="form-group">
              <input type="text" name="captcha" id="captcha" required="" maxlength="6" size="6"/>
              <img src="captcha.php"/>
            </div>
          </div> <!-- col-md-4 -->
          
          <div class="col-md-2"></div>


          <div class="col-md-12" style="margin: 0px auto; text-align: center;">
            <button type="submit" name="envia" class="btn btn-primary" style="font-weight: bolder;">Enviar</button>
          </div>

        </div><!-- /.row-->



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
<script src="js/jquery-2.1.4.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="js/smoothscroll.js"></script>
<script src="js/mobile-menu.js"></script>
<script src="js/scripts.js"></script>


<?php if($menso1!=""){ ?>
	<script>
		$("#btn_modal").get(0).click();
	</script>
	<?php } ?>
	
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="https://www.azasof.com/">Web Diseño: Azasof</a>

</body>
</html>