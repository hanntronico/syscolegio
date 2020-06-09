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
                <h2>Fotos</h2>
            </div>
        </div>
    </div>
</section>

<iframe src="galery.php" width="100%" height="800px"></iframe>

<!-- <section class="case-studies">
    <div class="container">
      <div class="col-lg-12">

        <div class="section-title text-center">
          <div class="row">
            <div class="col-sm-4">
              <div class="case-studies-content">
                <a href="#popup01" id="btn_modal"><img class="img-responsive" src="img/galeria/foto01.jpg" alt="case sudies.png" style="margin: 0px auto; text-align: center;"></a>
                <h2>Foto 01 : descripcion</h2>
              </div>                      
            </div>

            <div class="col-sm-4">
              <div class="case-studies-content">
                <img class="img-responsive" src="img/galeria/foto02.jpg" alt="case sudies.png" style="margin: 0px auto; text-align: center;">
                <h2>Foto 02 : descripcion</h2>
              </div>                      
            </div>

            <div class="col-sm-4">
              <div class="case-studies-content">
                <img class="img-responsive" src="img/galeria/foto03.jpg" alt="case sudies.png" style="margin: 0px auto; text-align: center;">
                <h2>Foto 03 : descripcion</h2>
              </div>                      
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <div class="case-studies-content">
                <img class="img-responsive" src="img/galeria/foto04.jpg" alt="case sudies.png" style="margin: 0px auto; text-align: center;">
                <h2>Foto 04 : descripcion</h2>
              </div>                      
            </div>

            <div class="col-sm-4">
              <div class="case-studies-content">
                <img class="img-responsive" src="img/galeria/foto05.jpg" alt="case sudies.png" style="margin: 0px auto; text-align: center;">
                <h2>Foto 05 : descripcion</h2>
              </div>                      
            </div>

            <div class="col-sm-4">
              <div class="case-studies-content">
                <img class="img-responsive" src="img/galeria/foto06.jpg" alt="case sudies.png" style="margin: 0px auto; text-align: center;">
                <h2>Foto 06 : descripcion</h2>
              </div>                      
            </div>
          </div>
        </div>
    </div>
  </div>
</section> -->






<!-- /.client-logo -->

<?php include 'logos_clientes.php'; ?>
<!-- /.client-logo -->

<?php //include 'mensaje_popup.php'; ?>

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
<script src="js/myscripts.js"></script>


<?php if($menso1!=""){ ?>
	<script>
		$("#btn_modal").get(0).click();
	</script>
	<?php } ?>


		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="#">Web Diseño: MACBERRI</a>        
</body>
</html>