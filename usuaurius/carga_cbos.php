<?php 
	include("../ctrl_admin/conexion/config.php");
	include 'funciones.php';
?>

<?php if ($_POST["sw"]==1) { ?>

<script src="../js/myscripts.js"></script>
<div class="form-group">
  <label for="provnac1Two">&nbsp;</label>
  <label for="provnac2Two">Provincia</label>
    <?php 
    	// echo $_POST["id"];
    	$consult = ' WHERE iddepartamento='.$_POST["id"].' ORDER BY 2';
      // $codcarrera= 1;
      llenarcombo('provincias','idprovincia, provincias', $consult, $codprovincia, '','codProvincia id=opcProvincia')
    ?> 
</div> 

<?php }elseif ($_POST["sw"]==2) { ?>

  <div class="form-group">
    <label for="distritonac1Two">&nbsp;</label>
    <label for="distritonac2Two">Distrito <?php //echo $_POST["sw"]; ?></label>
      <?php 
        $consult = ' WHERE idprovincia='.$_POST["id"].' ORDER BY 2';
         // $codcarrera= 1;
        llenarcombo('distritos','iddistrito, distritos', $consult, $coddistrito, '','codDistrito id=opcDistrito')
      ?> 
  </div> 
  
<?php } ?>