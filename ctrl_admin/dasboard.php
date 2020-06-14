<?php
session_start();


if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='index.php';</script>";
}
include("conexion/config.php");

$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombre"];


$variable = $_GET["key"];
$tem = $_GET["tema"];
$mensa = $_GET["var"];


//funcion corta palabras en un largo texto
function cortar_palabras($texto, $largor = 6, $puntos = "...") 
{ 
   $palabras = explode(' ', $texto); 
   if (count($palabras) > $largor) 
   { 
     return implode(' ', array_slice($palabras, 0, $largor)) ." ". $puntos; 
   } else
         {
           return $texto; 
         } 
} 


	$totahr = 0;
	$totapre = 0;
  $totarese = 0;
	$totauuse = 0;


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
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- script para descargar archivos en la misma pagina sin recargar -->
  <script src="js/modernizr.js"></script>
   
    <script>
function confirmar2(){
	if(confirm('Estas seguro de eliminar este registro ? \n Si ACEPTAS se borrara de la BASE DE DATOS !'))
		return true;
	else
		return false;
}
</script>
      
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include("menu_superior.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include("menu_lateral_izquierdo.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        
        <?php if($mensa=="delete"){ ?>
         <!--<div class="row purchace-popup">-->
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se elimino el registro satisfactoriamente ! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <!--<i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>-->
              </span>
            </div>
          <!--</div>-->
          <?php } ?>
           <?php if($mensa=="ok"){ ?>
         <!--<div class="row purchace-popup">-->
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se modifico el registro satisfactoriamente ! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <!--<i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>-->
              </span>
            </div>
          <!--</div>-->
          <?php } ?>
          <?php if($mensa=="vok"){ ?>
         <!--<div class="row purchace-popup">-->
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se registro satisfactoriamente la visita! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <!--<i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>-->
              </span>
            </div>
          <!--</div>-->
          <?php } ?>
          <?php if($mensa=="ok-pass"){ ?>
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> tu clave se cambio  satisfactoriamente ! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
              </span>
            </div>
          <?php } ?>
          <?php if($mensa=="faild-pass"){ ?>
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Mensaje !</strong> tu clave no se cambio  verificalo ! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
              </span>
            </div>
          <?php } ?>

         <center><img src="images/logo-scj-ini.png"></center><br>
          <div class="row purchace-popup">
            <div class="col-12">
              <h1 align="center">Plataforma Educativa</h1>
            </div>
          </div>
          
          
          <div class="row">
           
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                
                <center><h2>Mis Cursos</h2></center>

                 <div class="panel panel-container">
                  <div class="row">
            <?php 

                      
                      $sqlvista="SELECT e.id_estudiante 
                                 FROM estudiantes AS e, usuarios AS u 
                                 WHERE e.user_id = u.id 
                                 AND u.id = ".$_SESSION["idu"];
                      $rspv=$linkdocu->query($sqlvista);
                      $rwpv=$rspv->fetch_array();
                      $codest = $rwpv[0];


                      $sqlvista1="SELECT * FROM notas AS n, bloque_cal AS bc, grados AS g 
                      WHERE n.id_bloque = bc.id
                      AND bc.id_grado = g.id_grado
                      AND n.id_estudiante = ".$codest;
                      $rspv=$linkdocu->query($sqlvista1);

// id, id_estudiante, id_bloque
                      if($rspv->num_rows>0){
                        while($rwpv=$rspv->fetch_array()){
                          $cca = $cca + 1;
                          $grado = $rwpv["nombre"];
                          $nivel = $rwpv["nivel"];
                          $curso = $rwpv["nom_cal"];
                          $idcurso = $rwpv["id_bloque"];       
            ?>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-open-page-variant text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right"><?php echo $grado; ?></p>
                  <div class="fluid-container" style="font-size: 20px;">
                    <!-- <h3 class="font-weight-small text-right mb-0"><?php //echo $curso; ?></h3> -->
                    <?php echo $curso; ?>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <a href="detalle_curso.php?idcurso=<?php echo $idcurso; ?>" class="btn btn-primary btn-block"><i class="mdi mdi-format-list-numbers mr-1" aria-hidden="true"></i> Ver detalle aqui..</a>
              </p>
            </div>
          </div>
        </div>

<?php    
    }
  }

?> 


<!-- 				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-open-page-variant text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">PRESTAMOS</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?=$totapre;?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <a href="prestamos.php" class="btn btn-primary btn-block"><i class="mdi mdi-format-list-numbers mr-1" aria-hidden="true"></i> Ver detalle aqui..</a>
              </p>
            </div>
          </div>
        </div> -->
				
<!--         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-book-multiple text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">RESERVADOS</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?=$totarese;?></h3>
                      </div>
                    </div>
                  </div>
                 <p class="text-muted mt-3 mb-0">
                    <a href="reservacion.php" class="btn btn-primary btn-block"><i class="mdi mdi-format-list-numbers mr-1" aria-hidden="true"></i> Ver detalle aqui..</a>
                  </p>
                  
                </div>
              </div>
            </div> -->

            
<!-- 				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-account-multiple text-info icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">USUARIOS</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?=$totauuse;?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <a href="user-admin.php" class="btn btn-primary btn-block"><i class="mdi mdi-format-list-numbers mr-1" aria-hidden="true"></i> Ver detalle aqui..</a>
              </p>
            </div>
          </div>
        </div> -->


			</div>
                 </div>
                  
                </div>
                
              </div>
            </div>
          </div>
          

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include("footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <?php if($variable!=""){ ?>
  <script> 
   $(document).ready(function()
   {
      $("#Modal").modal("show");
   });
</script>
 <?php } ?>
  <script>
	$(document).ready(function () {
  $('#dtBasicExample').DataTable({
	  
	  language: {
        "decimal":        "",
    "emptyTable":     "No hay datos",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
    "infoFiltered":   "(Filtro de _MAX_ total registros)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron coincidencias",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Próximo",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": Activar orden de columna ascendente",
        "sortDescending": ": Activar orden de columna desendente"
    }
      }
	  
  });
  $('.dataTables_length').addClass('bs-select');
});
	</script>
	
	<!-- script para descargar archivos en la misma pagina sin recargar -->
<script src="js/scripts_descarga.js"></script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>