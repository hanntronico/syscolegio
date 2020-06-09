<?php
$ale = $_GET["var"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include("title.php"); ?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css?f=87">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
 
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">

        <div class="row w-100" style="border: none; margin: 0px auto; text-align: center;">
         <center style="margin: 0px auto; text-align: center;">
          <img class="img-fluid" src="images/logo-scj-ini.png" width="100%"></center>

          <div class="col-lg-4 mx-auto">
           <center><font color="#000000"><font size="6">Plataforma Educativa</font> </font></center><br>
            <div class="auto-form-wrapper">
            <?php if($ale=="yes"){ ?>
            <div class="alert alert-success">
    <strong>Felicitaciones!</strong> su usuario se registro satisfactoriamente, revise su correo electronico porque ahi le acabamos de enviar sus datos de acceso. Si no encuentra el mensaje en su bandeja de entrada busquelo como SPAM o correos no deseados.
  </div>
            <?php } ?>
            <?php if($ale=="yespass"){ ?>
            <div class="alert alert-success">
    <strong>Felicitaciones!</strong> Acabamos de enviarte un correo con la solicitud de recuperacion de acceso.
  </div>
            <?php } ?>
             <p align="center">Ingresa tus datos de acceso.</p>
              <form method="post" action="login.php">
                <div class="form-group" style="text-align: left;">
                  <label class="label">Usuario</label>
                  <div class="input-group">
                    <input type="text" name="userini" class="form-control" placeholder="Usuario / Correo" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group" style="text-align: left;">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="claveini" class="form-control" placeholder="*********" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-danger submit-btn btn-block">Ingresar</button>
                </div>

                
              </form>
            </div>
            <div style="background-color: rgba(217, 83, 79, 0.6);
background: rgba(217, 83, 79, 0.6);
color: rgba(217, 83, 79, 0.6);">
            <p class="footer-text text-center"><br><br><font color="#FFFFFF">copyright © 2020. All rights reserved.<br>IEP SAGRADO CORAZÓN DE JESÚS<br><br>Desarrollado Por </font> <a href="http://www.macberri.pe/" target="_blank"><font color="#FFFFFF"> <b>MACBERRI</b> </font></a> </p>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
</body>

</html>