<!-- .uc-mobile-menu-pusher -->

<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>



    <div>
        <div>
            <ul id="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="contactanos.php">Contactanos</a></li>
                <li><a href="preregistro.php">CREAR CUENTA</a></li>
                <?php if (isset($_SESSION['usuario'])){ ?>
                    <li class="phone"><button class="btn btn-primary"><i class="fa fa-user" aria-hidden="true"></i>  <?php echo $_SESSION['nombre']; ?></button></li>
                    <li class="get-a-quote"><a href="../logout/" class="text-danger" title=""><button class="btn btn-danger">Cerrar Sesión</button></a></li>
                    <?php }else{ ?>
                    <li class="get-a-quote"><a href="ingresar/" title=""><button class="btn btn-primary">Inicia Sesión</button></a></li>
                    
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!-- .uc-mobile-menu -->


<?php mysqli_close($linkdocu); ?>