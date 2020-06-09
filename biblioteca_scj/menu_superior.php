<!-- Header Top -->
<div class="header-top visible-md visible-lg" style="background-color: #fe1c1e">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <ul class="social-icon">
                <li><a href="https://web.facebook.com/iesppvab/" target="_blank" class="fa fa-facebook" aria-hidden="true"> </a></li>
                <li><a href="https://twitter.com/iesppvab" target="_blank" class="fa fa-twitter" aria-hidden="true"> </a></li>
                <li><a href="https://www.youtube.com/channel/UCdSnHL99lLmSazxZ9ctRedA" target="_blank" class="fa fa-youtube" aria-hidden="true"> </a></li>
                <!--<li><a href="" class="fa fa-google-plus" aria-hidden="true"> </a></li>
                <li><a href="" class="fa fa-linkedin" aria-hidden="true"> </a></li>-->
                    
                </ul>
            </div>

            <div class="col-sm-12 col-md-8">
                <ul class="top-contact pull-right">
                    <!-- <li class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i> 999 312 294</li> -->
                    <li class="email"><i class="fa fa-envelope" aria-hidden="true"></i>scdj@sagradocorazondejesus.edu.pe</li>
                    <?php if (isset($_SESSION['usuario'])){ ?>
                      <li class="phone"><i class="fa fa-user" aria-hidden="true"></i> 
                        <?php echo $_SESSION['nombre']; ?>
                      </li>
                      <li class="get-a-quote"><a href="logout/" class="text-danger" title="" style="background-color: #D9534F; font-weight: bold;">Cerrar Sesión</a></li>
                    <?php }else{ ?>
                    <li class="get-a-quote"><a href="ingresar/" style="background-color: #D9534F; font-weight: bold;" target="_blank">Inicia Sesión</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div> 