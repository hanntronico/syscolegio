<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='../';</script>";
}
include("conexion/config.php");

$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombre"];
$idcur = $_GET["idcurso"];

$mensa = $_GET["var"];

?>
<?php include '../usuaurius/funciones.php'; ?>
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
  <script>
function confirmar2(){
	if(confirm('Estas seguro de eliminar este registro ? \n Si ACEPTAS se eliminara el registro !'))
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
          
          <div class="row">
            <div class="col-md-12 text-right">
              <a href="cursos.php" class="btn btn-dark" style="color: #fff;" >Regresar</a>  
            </div>
          </div>


          <?php if($mensa=="delete"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se elimino el registro correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="okya"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se creo el registro nuevo correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="yes"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se modifico el registro correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>

          <?php if($mensa=="error"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> Uno o mas campos vacios, verifique. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="form"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> No se puede subir imagen, formato no permitido, verifique. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>

          <?php if($mensa=="gran"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> No se puede subir imagen porque excede su peso permitido de 2MB, ajuste el peso de la imagen, intentelo nuevamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>

          <?php if($mensa=="yaexit"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> El registro que intenta grabar ya existe.</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>


          <?php  

              $sqlvista="SELECT e.id_estudiante 
                         FROM estudiantes AS e, usuarios AS u 
                         WHERE e.user_id = u.id 
                         AND u.id = ".$_SESSION["idu"];
                         $rspv=$linkdocu->query($sqlvista);
                         $rwpv=$rspv->fetch_array();
              $codest = $rwpv[0];

              $sqlvista2="SELECT * 
                          FROM notas AS n, bloque_cal AS bc, grados AS g, profesores as p
                          WHERE n.id_bloque = bc.id 
                          AND bc.id_grado = g.id_grado 
                          AND g.id_prof = p.id_prof
                          AND n.id_estudiante = ".$codest." AND n.id_bloque = ".$idcur;

              $rspv=$linkdocu->query($sqlvista2);
              $rwpv=$rspv->fetch_array();

          ?>

<!-- <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
  <table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
    <caption>List of users</caption>
    <thead class="thead-dark|thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
</div> -->

          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="font-size:20px;">
                    <?php echo "Datos del Curso"; ?>
                  </h4>

                  <table class="table table-hover" cellspacing="0" cellpadding="0" style="width: 50%">
                    <thead>
                      <tr width="50">
                        <th><span style="font-weight: bolder;">Curso</span></th>
                        <th><span style="font-weight: bolder;"> : </span></th>
                        <th><?php echo $rwpv["nom_cal"]; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>Profesor </th>
                        <th> : </th>
                        <td><?php echo $rwpv["nombres"]." ".$rwpv["apellidos"]; ?></td>
                      </tr>
                      <tr>
                        <th>Email - profesor </th>
                        <th> : </th>
                        <td><?php echo $rwpv["email"]; ?></td>
                      </tr>
                      <tr>
                        <th>Sala virtual :</th>
                        <th> : </th>
                        <td>
                          <?php 
                            if ($rwpv["linksala"]==NULL) {
                              $lsala="#";
                              $targete="target='_self'";
                            }elseif ($rwpv["linksala"]!="") {
                              $lsala=$rwpv["linksala"];
                              $targete="target='_blank'";
                            }
                          ?>
                          <a href="<?php echo $lsala; ?>" class="btn btn-primary" style="color: #fff;" <?php echo $targete; ?> >Sala virtual</a>
                        </td>
                      </tr> 
<!--                       <tr>
                        <td colspan="3">&nbsp;</td>
                      </tr> -->
                      <tr>
                        <th>Nota del Curso :</th>
                        <th> : </th>
                        <td><span style="font-size:18px; font-weight: bolder;">
                          <?php  
                            if ($rwpv["nota"]=="N") {
                              echo "Sin calificar";
                            }else{
                              echo $rwpv["nota"];
                            }
                          ?>
                          </span></td>
                      </tr>                      
                                                       
                    </tbody>
                  </table>

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

  var iddepart;
  var idprov;

  $('#opcDepart').change(function(){
    iddepart = $('#opcDepart').val();
    $.ajax({
      url: 'carga_cbos.php',
      type: 'POST',
      data: {sw:1,id: iddepart},
    })
    .done(function(htmlexterno) {
      // console.log(htmlexterno);
      $("#content_prov").html(htmlexterno);
    })
    .fail(function() {
      // console.log("error");
    })
    .always(function() {
      // console.log("completadooooo");
    });
  });

});
	</script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>