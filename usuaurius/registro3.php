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

    <link rel="stylesheet" href="../ctrl_admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">

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
                <h2>Registro de especialidades</h2>
            </div>
        </div>
    </div>
</section>

<section class="contact-section">
  <div class="container">

    <?php if($_GET["msn"]=="el1"){ ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alerta!</strong> el registro fue eliminado correctamente.
      </div>
    <?php } ?>                 


      <?php 

          $sqlegre = "SELECT * FROM egresados 
                      WHERE idegresado = ".$_SESSION["idegresado"]." and estado=1";
          $rsegre=$linkdocu->query($sqlegre);

          if($rsegre->num_rows>0){
          while($rwegre=$rsegre->fetch_array()){
              $egrenombre = $rwegre["nom_egresado"];
              $egreapepat = $rwegre["ape_paterno"];
              $egreapemat = $rwegre["ape_materno"];
              $egremail = $rwegre["email"];

          }
          }else{
            $menso1 = "";
          }

              $sqlegre = "SELECT * FROM detalle_especialidades as de, especialidades as e 
                          WHERE de.idespecialidad = e.idespecialidad 
                          AND de.idegresado = ".$_SESSION["idegresado"];
              $rsegre=$linkdocu->query($sqlegre);

              $cant2 = $rsegre->num_rows;

              if ($cant2==0) {
                $opc4 = "disabled"; 
              }else {
                 $opc4 = "";
              } 

              $act1="btn-primary";
              $act2="btn-primary";
              $act3="btn-danger";
              $act4="btn-primary";  

      ?>

  <?php include 'botpasos.php'; ?>

  <br>


  <div class="contact-form mt-50">
      <form method="post" action="registrar.php">
        <div class="row">

          <input type="hidden" name="id" value="<?php echo $_SESSION["idegresado"]; ?>">
          <input type="hidden" name="pag" value="registro3">
          
          <div class="col-md-2"></div>

  
<!-- idespecialidad
especialidad
descrip_especialida
nom_corto_esp
estado_esp -->
          <div class="col-md-8">
            <div class="form-group">
              <label for="especialidadesTwo">Especialidades</label>
               <?php 
                  $consult = ' WHERE estado_esp=1 ORDER BY 2';
                  // $codcarrera= 1;
                  llenarcombo('especialidades','idespecialidad, especialidad', $consult, $codespecial, '','codEspecialidad id=opcEspecialidad')
                ?> 
            </div>             

            <div class="form-group">
              <label for="feciniTwo">Fecha de inicio</label>
              <input type="date" name="fecini_espe" class="form-control" required="" id="fecini_espe" placeholder="Fecha de inicio">              
            </div>

            <div class="form-group">
              <label for="fecfinTwo">Fecha de fin</label>
              <input type="date" name="fecfin_esp" class="form-control" required="" id="fecfin_esp" placeholder="Fecha de fin">              
            </div>            

          </div>


          <div class="col-md-2"></div>


          <div class="col-md-12" style="margin: 0px auto; text-align: center;">
            <button type="submit" name="envia" class="btn btn-primary" style="font-weight: bolder;">Grabar datos</button>
          </div>

        </div><!-- /.row-->



        <!-- <button type="submit" name="envia" class="btn btn-primary btn-lg pull-right">Enviar Mensaje</button> -->
      </form>
  </div> <!-- contact-form --> 

  <br>

  <div class="contact-form">
    <div class="row" style="margin: 0px auto; text-align: center;">

      <div class="col-md-12">

      <div class="table-responsive container">
        <table class="table table-bordered">
          <thead style="background-color: #E9ECEF;">
            <tr>
              <th style="text-align: center;">#</th>
              <th>Especialidades</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th style="text-align: center;">OPC.</th>
            </tr>
          </thead>
        
          <tbody>


            <?php 
              $ide = $_SESSION["idegresado"];
              $sqlegre = "SELECT * FROM detalle_especialidades as de, especialidades as e 
                          WHERE de.idespecialidad = e.idespecialidad 
                          AND de.idegresado = ".$ide;
              $rsegre=$linkdocu->query($sqlegre);

              if($rsegre->num_rows>0){
                $xx=0;
                while($rwegre=$rsegre->fetch_array()){
                  $idesp=$rwegre ["idespecialidad"];
            ?>
                <tr>
                  <td><?php echo $xx+1; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre ["especialidad"]; ?></td>
                  <td style="text-align: left;"><?php echo dma_shora($rwegre ["fec_ini_esp"]); ?></td>
                  <td style="text-align: left;"><?php echo dma_shora($rwegre ["fec_fin_esp"]); ?></td>
                  <td style="text-align: center;">
                    <a href='eli_det_esp.php?idesp=<?php echo $idesp.'&ide='.$ide; ?>' onClick='return confirmar2()'>
                      <button class='btn btn-icons btn-circle btn-danger btn-sm' style="font-size: 12px;" title='Eliminar'><i class='mdi mdi-delete'></i></button>
                    </a>                    

                  </td>
                </tr>    

            <?php
                $xx++;}
              }else {
            ?>    

                <tr>
                  <td colspan="5"><?php echo "No se encontraron registros"; ?></td>
                </tr>
                          
            <?php 
              }
             ?>



          </tbody>

        </table>
      </div>

      </div>

      <!-- <div class="col-md-2"></div> -->
    </div>
  </div>


  </div>
</section> <!-- contact-section -->




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


<?php if($menso1!=""){ ?>
	<script>
		$("#btn_modal").get(0).click();
	</script>
	<?php } ?>
	
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="https://www.azasof.com/">Web Diseño: Azasof</a>

</body>
</html>