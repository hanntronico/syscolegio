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
                <h2>Consejo Directivo</h2>
            </div>
        </div>
    </div>
</section>


<!-- <section class="testimonial">
    <div class="container">
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

<section class="case-studies">
    <div class="container">
      <div class="col-lg-12">

        <div class="section-title text-center">
          <div class="row">

            <div class="col-sm-6">
              <div class="case-studies-content">
                <img class="img-responsive" src="img/img-rrepresentante-legal.jpg" alt="case sudies.png" style="margin: 0px auto; text-align: center;">
                <ul style="margin-top: 10px;">
                  <li><b>NOMBRE Y APELLIDOS :</b> MIRKO VERA LEÓN</li>
                  <li><b>CARGO:</b> REPRESENTANTE LEGAL</li>
                  <li><b>TÍTULO PROFESIONAL :</b> INGENIERO CIVIL</li>
                </ul>
              </div>                      
            </div>

            <div class="col-sm-6">
              <div class="case-studies-content">
                <img class="img-responsive" src="img/img-directora.jpg" alt="case sudies.png" style="margin: 0px auto; text-align: center;">
                <ul style="margin-top: 10px;">
                  <li><b>NOMBRES Y APELLIDOS :</b> GLADIS CONSUELO LEÓN RODRÍGUEZ</li>
                  <li><b>CARGO :</b> DIRECTORA DEL PLANTEL</li>
                  <li><b>TÍTULO PROFESIONAL  :</b> PROFESORA DEL ÁREA DE LENGUA Y LITERATURA</li>
                </ul>
              </div>                      
            </div>            

<!--             <div class="col-sm-8">
              <div class="case-studies-content" style="text-align: left;">
                <ul>
                  <li>NOMBRE Y APELLIDOS : MIRKO VERA LEÓN</li>
                  <li>CARGO: REPRESENTANTE LEGAL</li>
                  <li>TÍTULO PROFESIONAL . INGENIRO CIVIL</li>
                </ul>
              </div>                      
            </div>             -->

          </div>    
        </div>

<!--         <div class="section-title text-center">
                <div class="row">
                    <div class="col-sm-4">
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
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-sm-4">
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
                    </div>
                </div>
        </div> -->

    </div>
  </div>
</section>

<!-- /.client-logo -->

<?php include 'logos_clientes.php'; ?>
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
<script src="js/myscripts.js"></script>

<?php if($menso1!=""){ ?>
	<script>
		$("#btn_modal").get(0).click();
	</script>
	<?php } ?>
	
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="#">Web Diseño: MACBERRI</a>        
</body>
</html>