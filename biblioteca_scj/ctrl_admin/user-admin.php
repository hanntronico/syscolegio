<?php
session_start();
if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='../';</script>";
}
include("conexion/config.php");

$datuser = $_SESSION["usuario"];
$datnomuser = $_SESSION["nombre"];

$mensa = $_GET["var"];

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
  <script>
function confirmar2(){
	if(confirm('Estas seguro de eliminar a este usuario ? \n Si ACEPTAS se borrara de la BASE DE DATOS !'))
		return true;
	else
		return false;
}
	  function confirmar3(){
	if(confirm('Estas seguro de dar acceso a este usuario ? \n Si ACEPTAS tendra acceso a la bilioteca'))
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
                <p class="text-success"><strong>Mensaje !</strong> Se elimino el registro del usuario correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="okya"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se creo el registro del usuario nuevo correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="yes"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se modifico el registro del usuario  correctamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="axe"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-success"><strong>Mensaje !</strong> Se registro el acceso al usuario  registrado. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
           <?php if($mensa=="yaexit"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Mensaje !</strong> Error, no se registro el usuario porque ya se encuentra registrado. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
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
          <?php if($mensa=="faild"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> Uno o mas campos vacios, verifique. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>
          <?php if($mensa=="errordni"){ ?>
         <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p class="text-danger"><strong>Error !</strong> Numero de DNI ingresado es incorrecto, verifiquelo nuevamente. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
          <?php } ?>

          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                  <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalregdoce">Registrar Nuevo Usuario</button>
                  </h4>
                  <h4 class="card-title">Usuarios Creados</h4>
                  <div class="table-responsive">
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Correo</th>
                          <th>Celular</th>
                          <th>Dni</th>
                          <th>Nivel</th>
                          <th>Usuarios</th>
                          <!--<th>Clave</th>-->
                          <th>Acceso</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
						  $sqlvista="SELECT * FROM usuario WHERE estado = 'A' ORDER BY idu DESC";
						  $rspv=$linkdocu->query($sqlvista);
if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $cca = $cca + 1;
	  $dde1 = $rwpv["idu"];
	  $dde2 = $rwpv["nombre"];
	  $dde3 = $rwpv["apellido"];
	  $dde4 = $rwpv["dni"];
	  $dde5 = $rwpv["correo"];
	  $dde6 = $rwpv["celular"];
	  $dde7 = $rwpv["usuario"];
	  $dde8 = $rwpv["clave"];
	  $dde9 = $rwpv["nivel"];
	$dde10 = $rwpv["acceso"];
	if($dde10=="Si"){ $btnvs = "<button class='btn btn-success btn-sm'>Si</button>"; }else{
		$btnaxe = "<a href='update_aceso.php?dat=$dde1' onClick='return confirmar3()' class='btn btn-icons btn-rounded btn-warning' title='Dar Acceso'><i class='mdi mdi-pencil'></i></a>";
		$btnvs = "<button class='btn btn-danger btn-sm'>No</button>";
	}
	  
	  echo"<tr>";
	  echo"<td class='font-weight-medium'>$cca</td>";
	  echo"<td>$dde3 $dde2 </td>";
	  echo"<td>$dde5</td>";
	  echo"<td>$dde6</td>";
	echo"<td>$dde4</td>";
	echo"<td>$dde9</td>";
	echo"<td>$dde7</td>";
	  //echo"<td>******</td>";
	  echo"<td>$btnvs</td>";
	  //echo"<td>$dde5</td>";
	  echo"<td>
	  <button data-toggle='modal' data-target='#myModal$cca' class='btn btn-icons btn-rounded btn-success' title='Editar'><i class='mdi mdi-pencil'></i></button>
	  $btnaxe
	  <a href='delete-admin.php?dat=$dde1' onClick='return confirmar2()'>
      <button class='btn btn-icons btn-rounded btn-danger' title='Eliminar'><i class='mdi mdi-delete'></i></button>
	  </a>
	  </td>";
	  echo"</tr>";

	  //modal editar
	  echo"<div class='modal fade' id='myModal$cca' role='dialog'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <!--<h4 class='modal-title'>Modal Header</h4>-->
        </div>
        <div class='modal-body'>
          <p>Modifica registro del usuario</p>
		  <form class='forms-sample' method='post' action='update_user.php'>
						  <input type='hidden' name='cod' value='$dde1' >";
	?>
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombres</label>
                          <input type="text" name="nombredoce" class="form-control" id="exampleInputEmail1" placeholder="Nombres completos" value="<?=$dde2;?>" required >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Apellidos</label>
                          <input type="text" name="nomape" class="form-control" placeholder="Apellidos completos" value="<?=$dde3;?>" required >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Num. DNI <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="dni" class="form-control" placeholder="Ingrese DNI" value="<?=$dde4;?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Correo</label>
                          <input type="email" name="correo" class="form-control" placeholder="Ingrese correo" value="<?=$dde5;?>" required >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Numero Celular <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="celu" class="form-control" placeholder="Ingrese Numero Celular" value="<?=$dde6;?>" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nivel de acceso</label>
                          <select name="nive" class="form-control" required>
                          	<option value="<?=$dde9;?>"><?=$dde9;?></option>
                          	<option value="Administrador">Administrador</option>
                          	<option value="Estudiante">Estudiante</option>
                          	<option value="Docente">Docente</option>
                          </select>
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Usuario</label>
                          <input type="text" name="nomuse" class="form-control" id="exampleInputEmail1" maxlength="100" placeholder="Ingrese nombre usuario" value="<?=$dde7;?>" required >
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Clave</label>
                          <input type="text" name="nomclave" class="form-control" id="exampleInputEmail1" placeholder="Ingrese clave" value="<?=$dde8;?>" required >
                          </div>
                        </div>
                        </div>

                        <center><button type="submit" class="btn btn-success mr-2">Actualizar</button></center>
                     <?php
                      echo"</form>
		  
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
        </div>";
	  
  
  }
}
						  ?>
                     
                      </tbody>
                    </table>
                    
                    <!-- modal nuevo registro docente-->
                    <div class="modal fade" id="myModalregdoce" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <p>Crea un nuevo usuario.</p>
          <form class="forms-sample" method="post" action="insert_usu.php">
                       <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nombres</label>
                          <input type="text" name="nombredoce" class="form-control" id="exampleInputEmail1" placeholder="Nombres completos" required >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Apellidos</label>
                          <input type="text" name="nomape" class="form-control" placeholder="Apellidos completos" required >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Num. DNI <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="dni" class="form-control" placeholder="Ingrese DNI" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Correo</label>
                          <input type="email" name="correo" class="form-control" placeholder="Ingrese correo" required >
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Numero Celular <small style="font-size: 8; color: #ED0F13;">(Opcional)</small></label>
                          <input type="number" name="celu" class="form-control" placeholder="Ingrese Numero Celular" >
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nivel de acceso</label>
                          <select name="nive" class="form-control" required>
                          	<option value="">Seleccionar</option>
                          	<option value="Administrador">Administrador</option>
                          	<option value="Estudiante">Estudiante</option>
                          	<option value="Docente">Docente</option>
                          </select>
                          </div>
                        </div>
			           </div>
                        <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Usuario</label>
                          <input type="text" name="nomuse" class="form-control" id="exampleInputEmail1" maxlength="100" placeholder="Ingrese nombre usuario" required >
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Clave</label>
                          <input type="text" name="nomclave" class="form-control" id="exampleInputEmail1" placeholder="Ingrese clave" required >
                          </div>
                        </div>
                        </div>

                        <center><button type="submit" class="btn btn-success mr-2">Registrar</button></center>
                      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
	</script>
	
	<?php mysqli_close($linkdocu); ?>
</body>

</html>