<!-- .navbar-top -->
<nav class="navbar m-menu navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="../img/Logo_VAB.png" alt="" width="240px" height="60px"></a>
        </div>

<?php 

// idegresado, nom_egresado, ape_paterno, ape_materno, fec_nac, foto, lug_nac, lug_dom_actual, telefono, email, password, link_conf, redes_sociales, info_contacto, estado

$sqlegre = "SELECT * FROM egresados WHERE idegresado = ".$_SESSION["idegresado"]." and estado=1";
$rsegre=$linkdocu->query($sqlegre);

if($rsegre->num_rows>0){
while($rwegre=$rsegre->fetch_array()){
    $egrenombre = $rwegre["nom_egresado"];
    $egreapepat = $rwegre["ape_paterno"];
    $egreapemat = $rwegre["ape_materno"];
    $egremail = $rwegre["email"];
    $egredni = $rwegre["dni"];
    $lc = $rwegre["link_conf"]; 
}
}else{
  $menso1 = "";
}

?>

<?php if ($lc=='C') { ?>
    <div class="collapse navbar-collapse" id="#navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right main-nav">
        <li <?=$activeini;?> ><a href="index.php">Inicio</a></li>
        <li><a href="registro.php">REGISTRO DE EGRESADOS</a></li>
        <li <?=$activecontac;?> ><a href="contactanos.php">Contactanos</a></li>
      </ul>
    </div>
<?php } ?>



        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>
<!-- .nav -->


  