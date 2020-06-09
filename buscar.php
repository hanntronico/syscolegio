<?php 
	// echo "aquí van los resultados de la busqueda ".$_POST["consultar"];
	include("ctrl_admin/conexion/config.php");
?>


      <div class="table-responsive container">
        <table class="table table-bordered">
          <thead style="background-color: #E9ECEF;">
            <tr>
              <th style="text-align: center;">#</th>
              <th>NOMBRES</th>
              <th>APELLIDOS</th>
              <th>GRADO</th>
              <th>AÑO INGRESO</th>
              <th>AÑO EGRESO</th>
            </tr>
          </thead>
        
          <tbody>


            <?php 
              $sqlegre = "SELECT * FROM egresados as e INNER JOIN det_grados_tit as dgt
              								 ON e.idegresado = dgt.idegresado INNER JOIN grados_titulos as gt
              								 ON dgt.idgrados_titulos = gt.idgrados_titulos INNER JOIN tipo_grado as tg
              								 ON gt.idtipo = tg.idtipo_grado
              								 WHERE (e.dni = '".$_POST["consultar"]."' OR e.nom_egresado like '%".$_POST["consultar"]."%' OR e.ape_paterno like '%".$_POST["consultar"]."%' OR e.ape_materno like '%".$_POST["consultar"]."%' OR concat_ws(' ', ape_paterno, ape_materno) LIKE '%".$_POST["consultar"]."%') AND e.estado = 1";
              $rsegre=$linkdocu->query($sqlegre);

              if($rsegre->num_rows>0){
                $count = 0;
                while($rwegre=$rsegre->fetch_array()){
            ?>
	
<!-- idegresado
nom_egresado
ape_paterno
ape_materno
dni
fec_nac
foto
lug_nac
lug_dom_actual
telefono
email
password
link_conf
redes_sociales
info_contacto
estado -->

                <tr>
                  <!-- <td><?php //echo $idc=$rwegre ["idegresado"]; ?></td> -->
                  <td style="text-align: center;"> <?php echo $count+1; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre ["nom_egresado"]; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre ["ape_paterno"]." ".$rwegre ["ape_materno"]; ?></td>
                  <td style="text-align: left;"><?php echo $rwegre ["tipogrado"] ?></td>
                  <td style="text-align: left;"><?php echo $rwegre ["year_inicio"] ?></td>
                  <td style="text-align: left;"><?php echo $rwegre ["year_fin"] ?></td>
                </tr>    

            <?php
                $count++;}
              }else {
            ?>    

                <tr>
                  <td colspan="6"><?php echo "No se encontraron registros"; ?></td>
                </tr>
                          
            <?php 
              }
             ?>



          </tbody>

        </table>
      </div>

