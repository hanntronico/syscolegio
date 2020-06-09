<!-- Header Top -->
<!-- <div class="header-top visible-md visible-lg" style="background-color: #ff2227"> -->
<div class="header-top visible-md visible-lg" style="background-color: #fe1c1e">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <ul class="social-icon">
                <li><a href="#" target="_blank" class="fa fa-facebook" aria-hidden="true"> </a></li>
                <li><a href="#" target="_blank" class="fa fa-twitter" aria-hidden="true"> </a></li>
                <li><a href="#" target="_blank" class="fa fa-youtube" aria-hidden="true"> </a></li>
                <!--<li><a href="" class="fa fa-google-plus" aria-hidden="true"> </a></li>
                <li><a href="" class="fa fa-linkedin" aria-hidden="true"> </a></li>-->
                    
                </ul>
            </div>

            <div class="col-sm-12 col-md-8">
                <ul class="top-contact pull-right">
                    <li class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i> 999 312 294</li>
                    <li class="email"><i class="fa fa-envelope" aria-hidden="true"></i>scdj@sagradocorazondejesus.edu.pe</li>
                    
                    <?php if (isset($_SESSION['usuario'])){ ?>
                      <li class="phone"><i class="fa fa-user" aria-hidden="true"></i> ****</li>
                      <li class="get-a-quote" style="background-color: #D9534F; font-weight: bold;"><a href="logout/" class="text-danger" title="">Cerrar Sesión</a></li>
                    <?php }else{ ?>
<!--                       <li class="get-a-quote"><a href="ingresar/" title="" style="background-color: #FC6D72;">Inicia Sesión</a></li> -->
<!--                       <li class="get-a-quote"><a href="ingresar/" style="background-color: #D9534F; font-weight: bold;" target="_blank">Inicia Sesión</a></li> -->
                       <li class="get-a-quote"><a href="ctrl_admin/" style="background-color: #D9534F; font-weight: bold;" target="_blank">Inicia Sesión</a></li>
                    <?php } ?>
                
                </ul>
            </div>
        </div>
    </div>
</div> 