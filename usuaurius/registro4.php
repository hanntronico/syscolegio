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
                <h2>Registro de Grados y títulos</h2>
            </div>
        </div>
    </div>
</section>

<section class="contact-section">
  <div class="container">

    <?php if($_GET["msn"]=="1g"){ ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>EXITO!</strong> el registro fue grabado correctamente.
      </div>
    <?php } ?>


    <?php if($_GET["msn"]=="el1"){ ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alerta!</strong> el registro fue eliminado correctamente.
      </div>
    <?php } ?>                 

<?php if ($_GET["msn"]=="err1"): ?>
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> se produjo un error al grabar el registro.
      </div>
<?php endif ?>


<?php if ($_GET["msn"]=="err2"): ?>
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> el archivo no es de tipo PDF.
      </div>
<?php endif ?>

<?php if ($_GET["msn"]=="err3"): ?>
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> el archivo que intenta subir es muy grande.
      </div>
<?php endif ?>


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

          $act1="btn-primary";
          $act2="btn-primary";
          $act3="btn-primary";  
          $act4="btn-danger";

      ?>

  <?php include 'botpasos.php'; ?>

  <br>


  <div class="contact-form mt-50">
      <form id="form" method="post" action="registrar.php" enctype="multipart/form-data">
        <div class="row">

          <input type="hidden" name="id" value="<?php echo $_SESSION["idegresado"]; ?>">
          <input type="hidden" name="pag" value="registro4">
          
          <div class="col-md-2"></div>

          <div class="col-md-8">
            <div class="form-group">
              <label for="institucionTwo">Institución educativa</label>
               <?php 
                  $consult = ' WHERE estado_institu=1 ORDER BY 2';
                  // $codcarrera= 1;
                  llenarcombo('instituciones','idinstitucion, institucion', $consult, $codespecial, '','codInstituto id=opcInstituto')
                ?> 
            </div>             
          </div>

          <div class="col-md-2"></div>

        </div><!-- /.row-->

        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">

            <div class="form-group">
              <label for="tipoTwo">Tipo</label>
              <?php 
                  $consult = ' WHERE estado_tipogr=1 ORDER BY 1';
                  // $codcarrera= 1;
                  llenarcombo('tipo_grado','idtipo_grado, tipogrado', $consult, $codtipogrado, '','codTipogrado id=opcTipogrado')
                ?>
            </div>

            <div class="form-group">
              <label for="archivopdfTwo">Documento</label>
              <input type="file" name="documento" class="form-control" required="" id="documento" placeholder="documento">
            </div>

            <div class="form-group">
              <label for="mencionTwo">Mencion</label>
              <input type="text" name="mencion" class="form-control" required="" id="mencion" placeholder="mención">
            </div>            

            <div class="form-group">
              <label for="horasTwo">Horas</label>
              <input type="text" name="horas" class="form-control" required="" id="horas" placeholder="horas">
            </div>  
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="yeariniTwo">Año de inicio</label>
<!--               <input type="date" name="yearini" class="form-control" required="" id="yearini" placeholder="Año de inicio">    -->
               <select name="yearini" class="form-control" required="" id="yearini">
                  <?php 
                    $yy = 1940;
                    while ( $yy <= 2099 ) {
                    $seleccionar=""; 
                    if($yy==date('Y')) $seleccionar="selected";  
                  ?>
                    <option value="<?php echo $yy;?>" <?php echo $seleccionar;?> ><?php echo $yy;?></option>
                  <?php $yy++;} ?>
                </select> 

            </div>

            <div class="form-group">
              <label for="yearfinTwo">Año de fin</label>
              <!-- <input type="date" name="yearfin" class="form-control" required="" id="yearfin" placeholder="Año de fin">               -->
               <select name="yearfin" class="form-control" required="" id="yearfin">
                  <?php 
                    $yy = 1940;
                    while ( $yy <= 2099 ) {
                    $seleccionar=""; 
                    if($yy==date('Y')) $seleccionar="selected";  
                  ?>
                    <option value="<?php echo $yy;?>" <?php echo $seleccionar;?> ><?php echo $yy;?></option>
                  <?php $yy++;} ?>
                </select>               
            </div>

            <div class="form-group">
              <label for="periodoTwo">Periodo</label>
              <input type="text" name="periodo" class="form-control" required="" id="periodo" placeholder="periodo">
            </div>            

            <div class="form-group">
              <label for="linkTwo">Link de consulta</label>
              <input type="text" name="link" class="form-control" required="" id="link" placeholder="link">
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>

          <div class="col-md-12" style="margin: 0px auto; text-align: center;">
            <button type="submit" name="envia" class="btn btn-primary" style="font-weight: bolder;">Grabar datos</button>
          </div>

        <!-- <button type="submit" name="envia" class="btn btn-primary btn-lg pull-right">Enviar Mensaje</button> -->
      </form>
  </div> <!-- contact-form --> 


  <div class="contact-form" style="margin-top: 80px;">
    <div class="row" style="margin: 0px auto; text-align: center;">

      <div class="col-md-12">

      <div class="table-responsive container">
        <table class="table table-bordered">
          <thead style="background-color: #E9ECEF;">
            <tr>
              <th style="text-align: center;">#</th>
              <th>TIPO GRADO</th>
              <th>INSTITUCION</th>
              <th>MENCION</th>
              <th>DURACION</th>
              <th style="text-align: center;">OPC.</th>
            </tr>
          </thead>
        
          <tbody>

<!-- // idgrados_titulos idinstitucion idtipo  documento mencion horas year_inicio year_fin  periodo link_consulta
// idinstitucion institucion desc_inst estado_institu
// idtipo_grado, tipogrado, descrip_tipogr, estado_tipogr -->


            <?php 
              $ide = $_SESSION["idegresado"];
              $sqlegre = "SELECT tg.tipogrado, inst.institucion, gt.mencion, gt.year_inicio, gt.year_fin, gt.documento, gt.idgrados_titulos
                          FROM det_grados_tit as dtg 
                          INNER JOIN grados_titulos as gt ON dtg.idgrados_titulos = gt.idgrados_titulos 
                          INNER JOIN tipo_grado as tg ON gt.idtipo = tg.idtipo_grado
                          INNER JOIN instituciones as inst ON gt.idinstitucion = inst.idinstitucion
                          WHERE dtg.idegresado =".$ide;

              $rsegre=$linkdocu->query($sqlegre);

              if($rsegre->num_rows>0){
                $xx=0;
                while($rwegre=$rsegre->fetch_array()){;
                  $idgt = $rwegre ["idgrados_titulos"];
            ?>
                <tr>
                  <td><?php echo $xx+1; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre [0]; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre [1]; ?></td>
                  <td style="text-align: left;"><a href="<?php echo "documentos/".$rwegre [5]; ?>" target="_blank"><?php echo $rwegre [2]; ?></a></td>
                  <td style="text-align: left;"><?php echo $rwegre [3]." - ".$rwegre [4]; ?></td>
                  <td style="text-align: center;">
                    <a href='delete_grad_tit.php?idgt=<?php echo $idgt.'&ide='.$ide; ?>' onClick='return confirmar2()'>
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