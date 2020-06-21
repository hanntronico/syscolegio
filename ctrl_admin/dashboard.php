<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='../';</script>";
}
include("conexion/config.php");

$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombre"];


$variable = $_GET["key"];
$tem = $_GET["tema"];
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
                
                  <?php  
                    $sqlvista="SELECT *
                               FROM estudiantes AS e, usuarios AS u 
                               WHERE e.user_id = u.id 
                               AND u.id = ".$_SESSION["idu"];
                    $rspv=$linkdocu->query($sqlvista);
                    $rwpv=$rspv->fetch_array();
                    $codest = $rwpv[0];


// id_estudiante
// dni
// apellido_paterno
// apellido_materno
// nombre
// genero
// fecha_nac
// apoderado
// num_cel
// direccion
// estado
// fecha_reg
// user_id
// id
// id_prof
// name
// lastname
// username
// password
// email
// image
// status
// kind
// created_at


                    $sqldatcur="SELECT g.* FROM notas AS n, 
                                             estudiantes as e, 
                                             bloque_cal AS bc, 
                                             grados AS g 
                               WHERE n.id_estudiante = e.id_estudiante
                               AND n.id_bloque = bc.id
                               AND bc.id_grado = g.id_grado
                               AND n.id_estudiante = ".$codest;
                    $rspvv=$linkdocu->query($sqldatcur);
                    $rwpvv=$rspvv->fetch_array();
                    $grado = $rwpvv["nombre"];
                    $nivel = $rwpvv["nivel"];

                  ?>

                <!-- <center><h2>Mis Cursos : <?php //echo $grado." - ".$nivel; ?></h2></center> -->

                 <div class="panel panel-container">

                    <h3>Datos del estudiante</h3>

                  <div class="row">
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <?php 
                            if ($rwpv['image'] == null) {
                              $jj = "no_imagen.jpg"; 
                            } else {
                              $jj = $rwpv['image'];
                            }
                            ?>



                          <img src="images/faces/<?php echo $jj ?>" alt="Card image" width="100%">
                          
                        </div>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModalregdoce">Subir imagen</a>
                  

                        <!-- <input class="btn btn-primary" type="file" name="" value="" placeholder=""> -->
                      </div>
                    </div>    

                    <div class="col-sm-8">

                      <div class="card">
                        <div class="card-body">

                          <table class="table table-striped table-md">
                              <tr>
                                <td> <b>DNI : </b></td>
                                <td><?php echo $rwpv["dni"]; ?></td>
                              </tr>
                              <tr>
                                <td> <b>Nombre completo : </b></td>
                                <td><?php echo $rwpv["apellido_paterno"]." ".$rwpv["apellido_materno"]." ".$rwpv["nombre"]; ?></td>
                              </tr>
                              <tr>
                                <td> <b>Fecha Nacimiento : </b></td>
                                <td><?php echo $rwpv["fecha_nac"]; ?> </td>
                              </tr>
                              <tr>
                                <td> <b>Apoderado : </b></td>
                                <td><?php echo $rwpv["apoderado"]; ?> </td>
                              </tr>
                              <tr>
                                <td> <b>Dirección : </b></td>
                                <td><?php echo $rwpv["direccion"]; ?> </td>
                              </tr>                                                                                           
                          </table>

                          <p class="card-text">Esta inforrmación corresponde a los datos proporcionados del alumno, cualquier modificación ponerse en contacto con personal del colegio.</p>
                          
                        </div>
                      </div>
                    
                    </div>

                    <div class="col-sm-1">&nbsp;</div>


            <?php 
                      // $sqlvista1="SELECT * FROM notas AS n, bloque_cal AS bc, grados AS g 
                      // WHERE n.id_bloque = bc.id
                      // AND bc.id_grado = g.id_grado
                      // AND n.id_estudiante = ".$codest;
                      // $rspv=$linkdocu->query($sqlvista1);

// id, id_estudiante, id_bloque
                      // if($rspv->num_rows>0){
                      //   while($rwpv=$rspv->fetch_array()){
                      //     $cca = $cca + 1;
                      //     $grado = $rwpv["nombre"];
                      //     $nivel = $rwpv["nivel"];
                      //     $curso = $rwpv["nom_cal"];
                      //     $idcurso = $rwpv["id_bloque"];       
            ?>

<!--         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-open-page-variant text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right"><?php //echo $grado; ?></p>
                  <div class="fluid-container" style="font-size: 20px;"> -->

                    <!-- <h3 class="font-weight-small text-right mb-0"><?php //echo $curso; ?></h3> -->
                    
                    <?php //echo $curso; ?>
<!--                   </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <a href="detalle_curso.php?idcurso=<?php //echo $idcurso; ?>" class="btn btn-primary btn-block"><i class="mdi mdi-format-list-numbers mr-1" aria-hidden="true"></i> Ver detalle aqui..</a>
              </p>
            </div>
          </div>
        </div> -->

<?php    
  //   }
  // }

?> 

  <div class="modal fade" id="myModalregdoce" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Imagen de Alumno</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         <!-- <p style="color: #E10D11;font-size: 12px;"><b>Campos requeridos (*)</b></p> -->

          <form class="forms-sample" method="post" action="subir_imagen.php" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-12">

                <input type="hidden" name="userid" value="<?php echo $rwpv["user_id"]; ?>">
                <input type="hidden" name="dni" value="<?php echo $rwpv["dni"]; ?>">

                <div class="form-group">
                  <label for="foto">Foto <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="file" name="foto" class="form-control" placeholder="Ingrese foto" required >
                </div>

              </div>
            </div>

            <center>
              <button type="submit" class="btn btn-success mr-2">Registrar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </center>

          </form>
        </div>

      </div>
    </div>
  </div>   



			</div>
                 </div>
                  
                </div>
                
              </div>
            </div>
          </div>








<!--           <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                   <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalregdoce"> 
                  Crear Nuevo Registro</button>
                  </h4>

                  <h4 class="card-title">Cursos</h4>
                  <div class="table-responsive"> -->
     
     <!-- Button trigger modal -->
<!--                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                     Launch demo modal
                   </button> -->
                   
                   <!-- Modal -->
<!--                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-scrollable" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body">
                           ...
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-dark">Save changes</button>
                         </div>
                       </div>
                     </div>
                   </div>  -->             
                    
                    <!-- modal nuevo registro docente-->

<!--   <div class="modal fade" id="myModalregdoce" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
         <p style="color: #E10D11;font-size: 12px;"><b>Campos requeridos (*)</b></p>
          <form class="forms-sample" method="post" action="insert_egresado.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nombres">Nombres <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="nombres" class="form-control" placeholder="Ingrese nombres" required >
                </div>

                <div class="form-group">
                  <label for="apepaterno">Ape. Paterno <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="apepaterno" class="form-control" placeholder="Ingrese apellido paterno" required >
                </div>                      

                <div class="form-group">
                  <label for="apematerno">Ape. Materno <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="apematerno" class="form-control" placeholder="Ingrese apellido materno" required >
                </div>  

                <div class="form-group">
                  <label for="dni">DNI <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="dni" class="form-control" placeholder="Ingrese número de dni" required >
                </div>  

                <div class="form-group">
                  <label for="fechanac">Fecha Nac. <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="date" name="fechanac" class="form-control" required="" id="fechanac" placeholder="Ingrese fecha de nacimiento">
                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">
                  <label for="foto">Foto <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="file" name="foto" class="form-control" placeholder="Ingrese foto" required >
                </div>

                <div class="form-group">
                  <label for="telefono">Teléfono <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="telefono" class="form-control" placeholder="Ingrese teléfono" required >
                </div>

                <div class="form-group">
                  <label for="correo">Correo <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="correo" class="form-control" placeholder="Ingrese correo" required >
                </div>

                <div class="form-group">
                  <label for="redes">Redes <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="redes" class="form-control" placeholder="Ingrese redes" required >
                </div>      

                <div class="form-group">
                  <label for="info">Info <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <input type="text" name="info" class="form-control" placeholder="Ingrese info" required >
                </div>                             
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                Lugar de Nacimiento <br>

                <div class="form-group">
                  <label for="lugnac">Departamento <b style="color: #DD070B;font-size: 12px;">(*)</b></label>
                  <?php 
                    //$consult = ' ORDER BY 2';
                    //llenarcombo2('departamentos','iddepartamento, departamento', $consult, $coddeparta, '','codDepartamento id=opcDepart required=\'true\'')
                  ?>
                </div>
              </div>

              <div class="col-md-4" id="content_prov">
                <br>
                <div class="form-group">
                <label for="lugnac2">Provincia <b style="color: #DD070B;font-size: 12px;">(*)</b></label>                  
                  <?php 
                    //llenarcombo('','', $consult, $codprovincia, '','codProvincia id=opcProvincia required=\'true\'')
                  ?>
                </div>
              </div>  

              <div class="col-md-4" id="content_distrito">
                <br>
                <div class="form-group">
                  <label for="lugnac3">Distrito <b style="color: #DD070B;font-size: 12px;">(*)</b></label>                  
                  <?php 
                    //$consult = ' ORDER BY 2';
                    //llenarcombo('','', $consult, $coddistrito, '','codDistrito id=opcDistrito required=\'true\'')
                  ?>
                </div>
              </div>  



            </div>



            <center>
              <button type="submit" class="btn btn-success mr-2">Registrar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </center>
          </form>
        </div>

      </div>
    </div>
  </div>     -->                
                    
<!--                   </div>
                </div>
              </div>
            </div>
          </div> -->

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