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

          
          <div class="row">
           
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                
                  <?php  
                    // $sqlvista="SELECT e.id_estudiante 
                    //            FROM estudiantes AS e, usuarios AS u 
                    //            WHERE e.user_id = u.id 
                    //            AND u.id = ".$_SESSION["idu"];
                    // $rspv=$linkdocu->query($sqlvista);
                    // $rwpv=$rspv->fetch_array();
                    // $codest = $rwpv[0];


                    // $sqldatcur="SELECT g.* FROM notas AS n, 
                    //                          estudiantes as e, 
                    //                          bloque_cal AS bc, 
                    //                          grados AS g 
                    //            WHERE n.id_estudiante = e.id_estudiante
                    //            AND n.id_bloque = bc.id
                    //            AND bc.id_grado = g.id_grado
                    //            AND n.id_estudiante = ".$codest;

                    // exit();                               
                    // $rspvv=$linkdocu->query($sqldatcur);
                    // $rwpvv=$rspvv->fetch_array();
                    // $grado = $rwpvv["nombre"];
                    // $nivel = $rwpvv["nivel"];

                  ?>

                <!-- <center><h2>Mis Áreas : <?php //echo $grado." - ".$nivel; ?></h2></center> -->

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm"># <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Idcurso<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">nombre<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Curso<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Enlace<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                          <th class="th-sm">Opciones <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                        </tr>
                      </thead>
                      <tbody>



            

            <?php 
                      $sqlvista1="SELECT * FROM CURSOS WHERE id_prof<>0 order by 1";
                      $rspv=$linkdocu->query($sqlvista1);

// id_curso
// nombre
// profesor
// id_prof
                      if($rspv->num_rows>0){
                        while($rwpv=$rspv->fetch_array()){
                          $cca = $cca + 1;
                          $idcurso = $rwpv["id_curso"];
                          $nombre = $rwpv["nombre"];
                          $profesor = $rwpv["profesor"];
                          $idprof = $rwpv["id_prof"];       
            ?>


            <tr>
              <td class='font-weight-medium'><?php //echo $cca; ?></td>
              <td><?php echo $idcurso; ?></td>
              <td><?php //echo $nombre; ?></td>
              <td><?php //echo $profesor; ?></td>
              <td>
<!--                 <a href='egresados_edit.php?dat=<?php //echo $id;?>' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-pencil'></i></a>
                <a href='delete_egresado.php?dat=<?php //echo $id;?>' onClick='return confirmar2()'>
                  <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
                </a> -->

                <?php  
                  $sqlvista2="SELECT * FROM bloque_cal where nom_cal='".$nombre."'";
                  $rspvalt=$linkdocu->query($sqlvista2);
                  while($rwpvalt=$rspvalt->fetch_array()){

              echo "INSERT INTO bloq_cur(id_curso, id_bloque_cal) VALUES (".$idcurso.",".$rwpvalt["id"].")"."<br>";
                    // echo $rwpvalt["id"]."-"; 
                  }

                ?>


                <?php if ($rwpv["link_conf"]=='C'): ?>
<!--                   <a href='egresados_detalles.php?dat=<?php //echo $id;?>' class='btn btn-icons btn-rounded btn-warning' title='Agregar más datos'><i class='mdi mdi-note-plus'></i></a>     -->            
                <?php endif ?>
              
              </td>
              <td></td>
            </tr>

<?php    
    }
  }

?> 
           </tbody>
          </table>


            



<!-- 			</div>
                 </div> -->
                  
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