<?php 
// $sqlmenso = "SELECT * FROM mensajes WHERE id_msj = '1' and habilitado='Habilitado'";
// $rsmen=$linkdocu->query($sqlmenso);

  function llenarcombo($tabla,$campos,$condicion,$seleccionado,$parametroselect,$name){
      Global $linkdocu;
			$sqlegre = "select $campos from $tabla".$condicion;
			$rsegre=$linkdocu->query($sqlegre);
      echo "<select name=".$name." ".$parametroselect." data-placeholder='Seleccione ".$tabla."...' class='form-control chzn-select' tabindex='2'>";
        //echo "<option value=''></option>";
  			if ($rsegre->num_rows>0) {
	        while($cur = $rsegre->fetch_array()){
	          $seleccionar="";
	          if($cur[0]==$seleccionado) $seleccionar="selected";
	          echo "<option value=".$cur[0]." ".$seleccionar.">".$cur[1]."</option>";
	        }
  			}      
      echo "</select>";
  }


  function llenarcombo2($tabla,$campos,$condicion,$seleccionado,$parametroselect,$name){
      Global $linkdocu;
			$sqlegre = "select $campos from $tabla".$condicion;
			$rsegre=$linkdocu->query($sqlegre);
      echo "<select name=".$name." ".$parametroselect." data-placeholder='Seleccione ".$tabla."...' class='form-control chzn-select' tabindex='2'>";
        echo "<option value=''></option>";
  			if ($rsegre->num_rows>0) {
	        while($cur = $rsegre->fetch_array()){
	          $seleccionar="";
	          if($cur[0]==$seleccionado) $seleccionar="selected";
	          echo "<option value=".$cur[0]." ".$seleccionar.">".$cur[1]."</option>";
	        }
  			}      
      echo "</select>";
  }

  function dma_shora($fec)
    {
      list($fecha,$hora)=explode(" ",$fec);
      list($anio,$mes,$dia)=explode("-",$fecha); 
      $fecresult = $dia."/".$mes."/".$anio;
      return $fecresult;
    }

  function fechas_hann($fecha)
    {
      list($dia,$mes,$anio)=explode("/",$fecha); 
      $fec_em = $anio."-".$mes."-".$dia;
      return $fec_em;
    }


?>